@extends('master')
@section('titletab','Data Selesai')
@section('content')

<div class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="class-title">Data transaksi keluar</h3>
        </div>
        <div class="card-body">
          <div class="box">
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <th>No</th>
                  <th>Nama</th>
                  <th>No Hp</th>
                  <th>Qty</th>
                  <th>Jenis Laundry</th>
                  <th>Tanggal</th>
                  <th>Status laundry</th>
                  <th>Status Pembayaran</th>
                  <th>Aksi</th>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container text-center">
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
          url: '/list-data-transaksi/keluar/jsonDataKeluar',
        },
        columns: [
          {data: 'DT_RowIndex', searchable: false, sortable: false},
          {data: 'nama'},
          {data: 'nohp'},
          {data: 'qty'},
          {data: 'jenis'},
          {data: 'tanggal'},
          {data: 'status'},
          {data: 'status_pembayaran'},
          {data: 'aksi', searchable: false, sortable: false}
        ]
      });
    });
  </script>
@endpush