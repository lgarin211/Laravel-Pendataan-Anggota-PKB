@extends('Admin.Mazer')
@section('title')
    Pembuatan Data User
@stop
 @section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
{{-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
{{-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
{{-- responsif --}}
<link href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
<script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
{{-- select --}}
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
      <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script> --}}
@endsection 
@section('content')
<section class="section">
 <div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <h4 class="card-title">Data Anggota Di Seluruh Indonesia</h4>
        {{-- <p class="card-description"> Add class <code></code> --}}
        </p>
      </div>
      <div class="col-md-6 text-right">
        <h4 class="card-title">Export Data</h4>
        <a href="{{url('/')}}/users/export/" target="_blank" class="btn btn-success mb-1 mt-1">expord</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ArdaAdduser">
          Buat Akun User
        </button>
      </div>
    </div>
    <table class="table table-striped data-table table-responsive">
      <thead>
        <tr>
          <th>nama</th>
          <th>email</th>
          <th>Role</th>
          <th width="100px">Aksi</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</div>
</section>
<!-- Modal -->
{{-- @include('Admin.modaladduser') --}}
@include('Admin.modalusers')
@endsection 
@section('js') 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
  $(function() {
    var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      select: true,
      ajax: "{{ route('users.index') }}",
      columns: [
         {data: 'name',name: 'name',},
         {data: 'email', name: 'email',"visible": true},
         {data: 'role', name: 'role',"visible": true},
         {data: 'action', name: 'action',orderable: false,searchable: false},
         ],
    });
  });
</script> 
@endsection