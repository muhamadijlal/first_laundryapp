@extends('master')
@section('titletab','Sampah')
@section('content')

<div class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="class-title">Data transaksi masuk</h3>
        </div>
        <div class="card-body">
          <div class="box">
            <div class="box-header with-border">
              <a href="/sampah/restoreall" class="btn btn-primary btn-md">Restore all data</a>
              <a href="/sampah/destroyall" class="btn btn-danger btn-md">Delete all data</a>
            </div>
            <br>
            <div class="box-body table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <th>No</th>
                  <th>Nama</th>
                  <th>No Hp</th>
                  <th>Qty</th>
                  <th>Jenis Laundry</th>
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
  <a href="/logout" class="btn btn-outline-warning btn-back shadow"><b>Kembali</b></a>
</div>

@endsection

@push('script')
<!-- Swall -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @if(Session::has('error_destroyall'))
    <script>
        swal("Eror!", "{{Session::get('error_destroyall')}}", "error", {
          button: "Ok",
        });
      </script>
  @elseif(Session::has('error_deleteall'))
    <script>
        swal("Eror!", "{{Session::get('error_deleteall')}}", "error", {
          button: "Ok",
        });
      </script>
  @elseif(Session::has('success_restoreall'))
    <script>
        swal("Sukses!", "{{Session::get('success_restoreall')}}", "success", {
          button: "Ok",
        });
      </script>
  @elseif(Session::has('success_deleteall'))
    <script>
        swal("Sukses!", "{{Session::get('success_deleteall')}}", "success", {
          button: "Ok",
        });
      </script>
  @elseif(Session::has('delete_success'))
    <script>
        swal("Sukses!", "{{Session::get('delete_success')}}", "success", {
          button: "Ok",
        });
      </script>
  @elseif(Session::has('restore_success'))
    <script>
        swal("Sukses!", "{{Session::get('restore_success')}}", "success", {
          button: "Ok",
        });
      </script>
  @endif

  <!-- dataTable Section -->
  <script>
    let table;

    $(function () {
      table = $('.table').DataTable({
        processing: true,
        autoWidth: false, 
        ajax: {
          url: '/sampah/json',
        },
        columns: [
          {data: 'DT_RowIndex', searchable: false, sortable: false},
          {data: 'nama'},
          {data: 'nohp'},
          {data: 'qty'},
          {data: 'jenis'},
          {data: 'status'},
          {data: 'status_pembayaran'},
          {data: 'aksi', searchable: false, sortable: false}
        ]
      });
    });
  </script>
@endpush
