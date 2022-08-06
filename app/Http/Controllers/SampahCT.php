<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class SampahCT extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Data::onlyTrashed()->get();

        return view('data/sampah');
    }

    public function indexJson(){
        $data = Data::orderBy('id','desc')
                ->onlyTrashed()
                ->get();

                return datatables()
                ->of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($data) {
                    return '
                    <div class="btn btn-group">
                        <a href="/sampah/restore/'.$data->id.'" class="btn btn-primary btn-sm">restore</a>                      
                        <a href="/sampah/destroy/'.$data->id.'"class="btn btn-danger btn-sm">Delete</a>
                    </div>
                    ';
                })
                ->rawColumns(['aksi'])
                ->make(true);
    }
  
    /**
     * soft delete data
     *
     * @return void
     */
    public function destroy($id)
    {
        $data = Data::onlyTrashed()->where('id',$id);
        $data->forceDelete();
        
        return redirect('/sampah')->with('delete_success','Data berhasil dihapus!');
    }
  
    /**
     * restore specific data
     *
     * @return void
     */
    public function restore($id)
    {
        $data = Data::onlyTrashed()->where('id',$id);
        $data->restore();

        return redirect('/sampah')->with('restore_success','Data berhasil dikembalikan!');
    }  
  
    /**
     * restore all data
     *
     * @return response()
     */
    public function restoreAll()
    {   
        $validate = Data::onlyTrashed()->get();
        if($validate->all() == []){

            return redirect('/sampah')->with('error_destroyall','Data tidak ditemukan!');
        }
        else{

            Data::onlyTrashed()->restore();
        }

        return redirect('/sampah')->with('success_restoreall','Semua data berhasil dikembalikan!');
        
    }

    /**
     * delete all data
     *
     * @return response()
     */
    public function destroyAll()
    {
        $validate = Data::onlyTrashed()->get();
        if($validate->all() == []){

            return redirect('/sampah')->with('error_deleteall','Data tidak ditemukan!');
        }

        Data::onlyTrashed()->forceDelete();
  
        return redirect('/sampah')->with('success_deleteall','Semua data berhasil didelete!');
    }
}
