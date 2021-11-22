@extends('Admin.head') @section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
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
			<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script> --}} @endsection @section('content') <div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <h4 class="card-title">Data Anggota Di Seluruh Indonesia</h4>
        {{-- <p class="card-description"> Add class <code></code> --}}
        </p>
      </div>
      <div class="col-md-6 text-right">
        <h4 class="card-title">Aksi</h4>
        <a href="{{url('/')}}/users/export/" target="_blank" class="btn btn-success mb-1 mt-1">expord</a>
      </div>
    </div>
    <table class="table table-striped data-table table-responsive">
      <thead>
        <tr>
          <th>NIK</th>
          <th>nama</th>
          <th>Photo_Profile</th>
          <th>jenis_kelamin</th>
          <th>Alamat</th>
          <th>Provinsi</th>
          <th>Kabupaten</th>
          <th>Kecamatan</th>
          <th>Kelurahan</th>
          <th>RT</th>
          <th>RW</th>
          <th>No_Hape</th>
          <th>Rekomendasi</th>
          <th>email</th>
          <th>IMG_KTP</th>
          <th width="100px">Aksi</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"> ... </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> @endsection @section('js') <script type="text/javascript">
  $(function() {
    var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      select: true,
      ajax: "{{ route('anggota.index') }}",
      columns: [
         {data: 'NIK', name: 'NIK'},
         {data: 'nama',name: 'nama',},
         {data: 'jenis_kelamin', name: 'jenis_kelamin'},
         {data: 'Alamat', name: 'Alamat'},
         {data: 'Provinsi', name: 'Provinsi',"visible": false},
         {data: 'Kabupaten', name: 'Kabupaten',"visible": false},
         {data: 'Kecamatan', name: 'Kecamatan',"visible": false},
         {data: 'Kelurahan', name: 'Kelurahan'},
         {data: 'RT', name: 'RT'},
         {data: 'RW', name: 'RW'},
         {data: 'No_Hape', name: 'No_Hape'},
         {data: 'Rekomendasi', name: 'Rekomendasi'},
         {data: 'email', name: 'email',"visible": false},
         {data: 'Photo_Profile', name: 'Photo_Profile',"visible": true ,searchable: false,orderable: false},
         {data: 'IMG_KTP', name: 'IMG_KTP',"visible": true,searchable: false,orderable: false},
         {data: 'action', name: 'action',orderable: false,searchable: false},
         ],
    });
  });
</script>
  @include('Admin.js')
@endsection