@extends('master')
@section('titletab','Data Laundry')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Data Laundry</h3>
        </div>
        <div class="card-body">
        <form action="/data/{{ $edit->id }}" method="POST">
        @csrf
        @method('put')
        <div class="container my-3">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="no_transaksi">Nomor Transaksi</label>
                        <input type="text" class="form-control" name="no_transaksi" id="no_transaksi" value="{{ $edit->no_transaksi }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama">Nama Customer</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ $edit->nama }}">
                        @error('nama')
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="qty">Qty</label>
                        <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror" id="qty" value="{{ $edit->qty }}">
                        @error('qty')
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>                             
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="nohp">No Hp</label>
                        <input type="text" class="form-control" name="nohp" id="nohp" value="{{ $edit->nohp }}">
                    </div>
                    <div class="mb-3">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control" required>
                            @foreach ($dataNamaJenis as $data)
                                <option {{ $data->nama_jenis == $edit->jenis ? 'selected' : '' }} value="{{$data->nama_jenis}}">{{ $data->nama_jenis }}</option>
                            @endforeach                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" value="{{ $edit->tanggal }}">
                        @error('tanggal')
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>            
                </div>                    
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-primary">Update Data Laundry</button>
            </div>
            </div>
        </form>
        </div>

        </div>

        <div class="container text-center">
            <a href="/" class="btn btn-outline-warning btn-back shadow"><b>Kembali</b></a>
        </div>
@endsection