@extends('master')
@section('titletab','Invoice')
@section('content')
<div class="container">
  <div class="invoice p-3 mb-3">
    <div class="row">
      <div class="col-12">
      <h4>
      <i class="fas fa-globe"></i> Laundry Berkah.
      <small class="float-right">Tanggal pembayaran : {{ date('d-F-Y') }}</small>
      </h4>
    </div>
  </div>

  <div class="col-sm-4 invoice-col">
      {{-- <div class="row invoice-info">
      <address>
        <strong>{{ $data->nama }}</strong><br>    
        Phone: {{$data->nohp}}<br>
      </address>
    </div> --}}

    <div class="col-sm-12 invoice-col mt-3">
      <b>No Transkasi</b> : {{ $data->id}}<br>
      <b>Nama</b>         : {{ $data->nama}}<br>    
      <b>Tanggal Transaksi</b>  : {{ $data->tanggal }}<br>
      <br>
    </div>
  </div>

  <div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Berat</th>
            <th>Jenis Laundry</th>
            <th>Jasa Laundry</th>
            <th>Status Laundry</th>
            <th>Status Pembayaran</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>{{ $data->berat }}</td>          
            <td>{{ $data->jenis }}</td>          
            <td>{{ $data->jasa }}</td>          
            <td>{{ $data->status }}</td>          
            <td>{{ $data->status_pembayaran }}</td>          
            <td>Rp. {{ format_uang($data->total) }}</td>          
          </tr>
        </tbody>
      </table>
    </div>
  </div>        
</div>
<div class="container-fluid text-center">
  <a href="/" class="btn btn-outline-warning btn-back shadow"><b>Kembali</b></a>
</div>  
@endsection