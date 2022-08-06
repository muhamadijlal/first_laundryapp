@extends('master')
@section('titletab','Dashboard')
@section('content')
<div class="content">
  <div class="card">
    <div class="card-header text-center">
      <h3>Laundry Name</h3>
    </div>
    <!-- Section Widget Data Masuk start -->
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $transaksiMasuk }}</h3>
              <p>Transaksi Belum Lunas</p>
              </div>
              <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="/list-data-transaksi/masuk" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-6 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $transaksiKeluar }}</h3>
              <p>Transaksi Selesai</p>
              </div>
              <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="/list-data-transaksi/keluar" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Section Widget Data Masuk End -->
  </div>
  <div class="container my-5">
    <h2 class="text-center text-white" style="font-family: Verdana, Geneva, Tahoma, sans-serif">MENU</h2>
  </div>
  <div class="container text-center my-5">
    <div class="row justify-content-center">
      <div class="col-lg-2 col-md-6 col-4">
        <a href="/input-data-laundry">
          <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
          </svg>
          <p class="text-white">Input Laundry</p>
        </a>
      </div>
  
      <div class="col-lg-2 col-md-6 col-4">
          <a href="/list-data-transaksi/masuk">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
              <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>
              <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
            </svg>
            <p class="text-white">Transaksi Masuk</p>
          </a>
      </div>
  
      <div class="col-lg-2 col-md-6 col-4">
        <a href="/list-data-transaksi/keluar">
          <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
            <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707V11.5z"/>
            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
          </svg>
          <p class="text-white">Transaksi Keluar</p>
        </a>
      </div>
  
      <div class="col-lg-2 col-md-6 col-4">
        <a href="/laporan-harian">
          <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-collection" viewBox="0 0 16 16">
            <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z"/>
          </svg>
          <p class="text-white">Laporan Harian</p>
        </a>
      </div>
  
      <div class="col-lg-2 col-md-6 col-4">
        <a href="/laporan-bulanan">
          <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
            <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
          </svg>
          <p class="text-white">Laporan Bulanan</p>
        </a>
      </div>
  
      <div class="col-lg-2 col-md-6 col-4">
        <a href="/sampah">
          <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
          </svg>
          <p class="text-white">Sampah</p>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @if(Session::has('update_success'))
  <script>
    swal("Sukses!", "{{Session::get('update_success')}}", "success", {
      button: "Ok",
    });
  </script>
  @elseif(Session::has('error_updateStatus'))
  <script>
    swal("Gagal!", "{{Session::get('error_updateStatus')}}", "error", {
      button: "Ok",
    });
  </script>
  @endif
@endpush