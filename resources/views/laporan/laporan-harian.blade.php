@extends('master')
@section('titletab','Laporan Harian')
@section('content')
<div class="card">
  <div class="container">
    <div class="card-header">
      <h3 class="text-center">Laporan Harian Ini</h3>
    </div>
    <br>
    <div class="card-body table-responsive p-0">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>QTY</th>
            <th>Total Harga</th>
          </tr>
        </thead>      
      </table>
      </div>
      <hr>
      <div class="card-footer">
        <div class="row">
          <div class="col">
            <div class="mb-3">
              <h4>Total Transaksi : {{ $order }}</h4>
            </div>
          </div>
          <div class="col">
            <div class="mb-3">
              <h4>Total Uang Masuk : Rp {{ format_uang($uang) }},-</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid text-center">
  <a href="/" class="btn btn-outline-warning btn-back shadow"><b>Kembali</b></a>
</div>
@endsection

@push('script')
  <!-- dataTable Section -->
  <script>
    let table;

    $(function () {
      table = $('.table').DataTable({
        processing: true,
        autoWidth: false, 
        ajax: {
          url: '/laporan-harian/json',
        },
        columns: [
          {data: 'DT_RowIndex', searchable: false, sortable: false},
          {data: 'nama'},
          {data: 'tanggal'},
          {data: 'qty'},
          {data: 'total'},
          // {data: 'aksi', searchable: false, sortable: false}
        ]
      });
    });
  </script>
@endpush