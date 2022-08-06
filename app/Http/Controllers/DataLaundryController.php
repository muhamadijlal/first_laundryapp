<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Jenis;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Facades\Session;
use Whoops\Run;

class DataLaundryController extends Controller
{
    // View index or dashboard page
    public function index() {

        $transaksiMasuk = Data::where('status','proses')
                        ->where('status_pembayaran','belum lunas')
                        ->count();

        $transaksiKeluar = Data::where('status','selesai')
                        ->where('status_pembayaran','lunas')
                        ->count();
        
        return view('dashboard/dashboard', ['transaksiMasuk' => $transaksiMasuk, 'transaksiKeluar' => $transaksiKeluar]);
    }

    public function transaksi_masuk() {       
        
        return view('data.transaksi-masuk');
    }

    public function jsonDataMasuk(){

        $data = Data::orderBy('id','desc')
                    ->where('status','proses')        
                    ->where('status_pembayaran','lunas')
                    ->orwhere('status_pembayaran','belum lunas')
                    ->get();

        return datatables()
                ->of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($data) {
                    return '
                    <div class="btn btn-group">
                        <a href="/list-data-laundry/proses/detail/'.$data->id.'" class="btn btn-success btn-sm">Detail</a>
                        <a href="/data/'.$data->id.'/edit" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/data/'.$data->id.'"class="btn btn-danger btn-sm">Delete</a>
                        <a href="/data/invoice/'.$data->id.'" class="btn btn-primary btn-sm">Invoice</a>
                        <a href="/list-data-laundry/proses/detail/'.$data->id.'/selesai" class="btn btn-outline-success btn-sm">Selesai</a>
                        <a  target="_blank" href="/struk/'.$data->id.'" class="btn btn-default btn-sm"><i class="fas fa-print"></i>Print</a>                     
                    </div>
                    ';
                })
                ->rawColumns(['aksi'])
                ->make(true);
            
    }

    public function jsonDataKeluar(){

        $data = Data::orderBy('id','desc')
                ->where('status','selesai')        
                ->where('status_pembayaran','lunas')        
                ->get();

        return datatables()
                ->of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($data) {
                    return '
                    <div class="btn btn-group">
                        <a href="/list-data-laundry/proses/detail/'.$data->id.'" class="btn btn-success btn-sm">Detail</a>                      
                        <a href="/data/'.$data->id.'"class="btn btn-danger btn-sm">Delete</a>
                        <a href="/data/invoice/'.$data->id.'" class="btn btn-primary btn-sm">Invoice</a>
                        <a  target="_blank" href="/struk/'.$data->id.'" class="btn btn-default btn-sm"><i class="fas fa-print"></i>Print</a>                  
                    </div>
                    ';
                })
                ->rawColumns(['aksi'])
                ->make(true);
            
    }

    // Get data where status pembayaran lunas
    public function transaksi_keluar() {
        $transaksiKeluar = DB::table('data')
                            ->where('status','selesai')
                            ->where('status_pembayaran','lunas')
                            ->get();
                            
        return view('data.transaksi-keluar', compact('transaksiKeluar'));
    }

    // View form input data laundry
    public function insert(){
    
        // get and count data id from table data
        $table_no = DB::table('data')->select('id')->count();        

        // ambil data tanggal
        $tgl = date('dmY');

        $no = $tgl.$table_no;
        $auto = substr($no,8);
        $auto = intval($auto)+1;

        // transaction auto code
        $auto_number = "T".substr($no,0,8).str_repeat(0,(3-strlen($auto))).$auto;

        $dataNamaJenis = DB::table('jenis')
                            ->select('*')
                            ->get();
        return view('input-data',compact('dataNamaJenis', 'auto_number'));
    }

    // Store or insert data to Database
    public function store(Request $request){        

        
        $request->validate([
            'nama'    => 'required|max:255',
            // 'nohp'    => 'required',
            'qty'     => 'required',
            'jenis'   => 'required',
            'tanggal' => 'required',
        ]);        
        
        foreach($request->jenis as $key => $insert){

            $total = DB::table('jenis')
                        ->select('harga')
                        ->where('nama_jenis',$request->jenis[$key])
                        ->first();
            
            $subtotal = floatval($request->qty[$key]) * intval($total->harga);

            $saveRecord = [
                'no_transaksi'      => $request->no_transaksi,
                'nama'              => $request->nama,
                'nohp'              => $request->nohp,
                'qty'               => $request->qty[$key],
                'jenis'             => $request->jenis[$key],   
                'tanggal'           => $request->tanggal,
                'total'             => $subtotal,
                'status'            => 'proses',
                'status_pembayaran' => 'belum lunas'
            ];

            
            DB::table('data')->insert($saveRecord);
        }

        return redirect('/list-data-transaksi/masuk')->with('sukses_input', 'Data berhasil ditambahkan!');
    }

    // View detail customer
    public function detail($id){

        $detail = DB::table('data')->where('id', $id)->first();

        $satuan = DB::table('jenis')->where('nama_jenis',$detail->jenis)->first();
        
        return view('data.detail', compact('detail','satuan'));
    }

    // Update status pembayaran ketika customer bayar
    public function update_statusPembayaran(Request $request, $id) {

        $request->validate([
            'bayar' => 'required|numeric',
        ]);

        if (intval($request->total) <= intval($request->bayar)) {
            
        $update = DB::table('data')
                    ->where('id',$id)
                    ->update([
                        "status_pembayaran" => "lunas"
                    ]);
        }
        else  {
            return redirect('/list-data-transaksi/masuk')->with('transaction_failed', 'Transaksi  gagal! (Pembayaran kurang)');
        }

        return redirect('/list-data-transaksi/masuk')->with('transaction_success', 'Transaksi  berhasil!');
    }

    public function updateProses($id){        

        $data = DB::table('data')
                    ->where('id',$id)
                    ->where('status_pembayaran','lunas')
                    ->first();

        if($data){
            DB::table('data')
                ->where('id', $id)
                ->update([
                    "status" => "selesai"
                ]);

                return redirect('/dashboard')->with('update_success', 'Proses selesai!');        
        }
        else {
            return redirect('dashboard')->with('error_updateStatus','Status pembayaran belum selesai!');
        }

    }

    public function edit($id){

        $dataNamaJenis = DB::table('jenis')
                            ->select('*')                            
                            ->get();

        $edit = DB::table('data')->where('id', $id)->first();

        return view('data.edit', compact('edit','dataNamaJenis'));
    }

    public function update($id,  Request $request){        

        $total = DB::table('jenis')
                ->select('harga')
                ->where('nama_jenis',$request->jenis)
                ->first();        

        $subtotal = floatval($request->qty) * intval($total->harga);        

        $request->validate([
            'nama'    => 'required|max:255',
            // 'nohp'    => 'digits_between:12,15',
            'qty'     => 'required',
            'jenis'   => 'required|not_in:0',
            'tanggal' => 'required',
        ]);

        DB::table('data')->where('id', $id)->update([
            'nama'    => $request['nama'],
            'nohp'    => $request['nohp'],
            'qty'     => $request['qty'],
            'jenis'   => $request['jenis'],
            'tanggal' => $request['tanggal'],
            'total' => $subtotal,
        ]);

        return redirect('/list-data-transaksi/masuk')->with('update_success','Data berhasil dirubah!');           

    }    

    // Delete Data
    public function delete($id){
        $data = Data::find($id);
        $data->delete();


        return redirect('/list-data-transaksi/masuk')->with('delete_success','data berhasil dihapus!');
    }

    public function invoice($id) {
        $data = Data::where('id',$id)->first();

        return view('data/invoice', compact('data'));
    }

    public function laporanHarian(){ 

        $laporan = DB::table('data')
                ->select('*')
                ->where('status','selesai')
                ->where('status_pembayaran','lunas')
                ->whereDate('tanggal',Carbon::today())
                ->get();

        $order = DB::table('data')
                ->where('status_pembayaran','lunas')
                ->where('status','selesai')
                ->whereDate('tanggal',Carbon::today())
                ->count('id');
        $uang = DB::table('data')
                ->where('status_pembayaran','lunas')
                ->where('status','selesai')
                ->whereDate('tanggal',Carbon::today())
                ->sum('total');
    

        return view('laporan/laporan-harian', compact('order','uang','laporan'));
    }

    public function laporanHarianJson(){

        $laporan = DB::table('data')
                ->select('*')
                ->where('status','selesai')
                ->where('status_pembayaran','lunas')
                ->whereDate('tanggal',Carbon::today())
                ->get();


        return datatables()
                ->of($laporan)
                ->addIndexColumn()
                ->make(true);                      
    }

    public function laporanBulanan(){
        $order = DB::table('data')
                    ->whereMonth('tanggal', date('m'))
                    ->whereYear('tanggal',date('Y'))
                    ->where('status','selesai')
                    ->where('status_pembayaran','lunas')
                    ->count('id');
        $uang = DB::table('data')
                    ->whereMonth('tanggal', date('m'))
                    ->whereYear('tanggal',date('Y'))
                    ->where('status','selesai')
                    ->where('status_pembayaran','lunas')
                    ->sum('total');

        return view('laporan.laporan-bulanan', compact('order','uang'));
    }

    public function laporanBulananJson(){
        $laporan = DB::table('data')
                    ->select('*')
                    ->where('status','selesai')
                    ->where('status_pembayaran','lunas')
                    ->whereMonth('tanggal', date('m'))
                    ->whereYear('tanggal',date('Y'))
                    ->get();

        return datatables()
            ->of($laporan)
            ->addIndexColumn()
            ->make(true);
    }

    public function struk($id){

        $data = DB::table('data')
                ->where('id', $id)
                ->first();

        $pesanan = DB::table('jenis')
                ->where('id',$id)
                ->first();

        return view('struk', compact('data', 'pesanan'));
    }    

}
