@extends('master')
@section('titletab','Login')
@section('content')

<style>
    .card{
        width: 25rem
    }
    .container{
        margin-top: 7rem
    }
</style>
<div class="container ">   
    <div class="card mx-auto">
        <div class="card-header">
            <h3 class="text-center">Login Admin</h3>
            <p class="text-center">Masuk untuk melihat halaman ini</p>
        </div>
        <div class="card-body">
            <form action="/login-proses" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" autofocus>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="container my-4">
                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <a href="/register">Daftar Akun</a>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(Session::has('loginError'))
<script>
    swal("Gagal!", "{{Session::get('loginError')}}", "error", {
      button: "Ok",
    });
  </script>
  @elseif(Session::has('register'))
  <script>
    swal("Berhasil", "{{Session::get('register')}}", "success", {
      button: "Ok",
    });
  </script>
@endif
@endpush