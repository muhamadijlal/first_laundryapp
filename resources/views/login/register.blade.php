@extends('master')
@section('titletab','Register')
@section('content')

<style>
    .card{
        width: 25rem
    }
    .container{
        margin-top: 6rem
    }
</style>
<div class="container ">   
    <div class="card mx-auto shadow">
        <div class="card-header">
            <h3 class="text-center">Daftar Akun</h3>
        </div>
        <div class="card-body">
            <form action="/register-proses" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="name" class="form-control" autofocus>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control">
                </div>
                <div class="container my-4">
                    <button type="submit" class="btn btn-primary btn-block">Mendaftar</button>
                </div>
            </form>
        </div>
</div>
@endsection

@push('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(Session::has('emailExist'))
<script>
    swal("Gagal!", "{{Session::get('emailExist')}}", "error", {
      button: "Ok",
    });
  </script>
@endif
    
@endpush