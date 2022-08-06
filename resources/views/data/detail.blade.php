@extends('master')
@section('titletab','Detail')
@section('content')  
<div class="content">
    <div class="card">
        <div class="card-header">
            <h3>Detail Data Laundry</h3>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body">
            <form action="/list-data-laundry/proses/detail/{{ $detail->id }}" method="POST">
                @csrf
                @method('put')
                <div class="container my-3">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="nama">Nama Customer</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="{{ $detail->nama }}" required disabled>
                            </div>
                            <div class="mb-3">
                                <label for="qty">Qty</label>
                                <input type="text" name="qty" class="form-control" id="qty" value="{{ $detail->qty }} {{  $satuan->satuan }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ $detail->tanggal }}" disabled>
                            </div>                            
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="nohp">No Hp</label>
                                <input type="text" class="form-control" name="nohp" id="nohp" value="{{ $detail->nohp }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="jenis">Jenis</label>
                                <input type="text" class="form-control" name="jenis" id="jenis" value="{{ $detail->jenis }}" disabled>
                            </div>
                            <div class="mb-3 mx-auto">
                                <label for="harga">Total Harga</label>
                                <input type="text" name="total" class="form-control" value="Rp {{ format_uang($detail->total) }}" disabled>
                                <input type="text" name="total" class="form-control" value="{{ $detail->total }}" hidden>
                            </div>                            
                        </div>
                    </div>                    
                    @if($detail->status_pembayaran == 'belum lunas')
                        <div class="mb-3 mx-auto">
                            <label for="bayar">Bayar</label>
                            <input type="text" name="bayar" class="form-control @error('bayar') is-invalid @enderror">
                            @error('bayar')
                                <span class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                    @else
                    <div class="alert alert-success text-center" role="alert">
                        <strong>Lunas</strong>
                    </div>
                    @endif
                    <div class="my-3 text-center">
                        @if($detail->status_pembayaran == 'belum lunas')
                            <button type="submit" class="btn btn-success mx-2" style="width: 8rem"><b>Bayar</b></button>
                        @endif
                        <!-- <a href="#" class="btn btn-warning mx-3" style="width: 8rem"><b>Simpan</b></a> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container text-center">
    <a href="/" class="btn btn-outline-warning btn-back shadow"><b>Kembali</b></a>
  </div>
@endsection