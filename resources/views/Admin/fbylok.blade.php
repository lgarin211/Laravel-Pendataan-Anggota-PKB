@extends('Admin.head')
 @section('css')
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
			<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection 
@section('content') 
<div class="">
<div class="row">
	<div class="col-md-2 card">
	   <form method="GET" action="/Fbylok"> 
	   <input type="hidden" name="data" value="true">
	   <div class="tab mr-1 ml-1">
       <h6>Provinsi</h6>
       <p>
        <select class="form-select" name="Provinsi" id="Provinsi" onchange="gokob()">
        @if(empty($data->Provinsi))   
        <option value="" selected>{{"Harap Pilih"}}</option>
        @endif
        </select>
        <script type="text/javascript">
         fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`).then(response => response.json()).then(provinces => {
          provinces = provinces.reverse()
          var fora = '';
          for (var i = provinces.length - 1; i >= 0; i--) {
           // console.log(provinces[i])
           fora = fora + `<option id="` + provinces[i].name + `" value="` + provinces[i].name + `" cal='` + provinces[i].id + `'>` + provinces[i].name + `</option>`
          }
          binding=document.getElementById('Provinsi').innerHTML
          document.getElementById('Provinsi').innerHTML =binding+fora
         });
        </script>
       <h6>Kota/Kab</h6>
       <p>
        <select class="form-select" name="Kabupaten" id="kob" onchange="gokec()">
        @if(empty($data->Kabupaten))   
        <option value="" selected>{{"Harap Pilih Provinsi"}}</option>
        @endif
        </select>
        <script type="text/javascript">
         function gokob() {
          var da = document.getElementById('Provinsi').value
          console.log(da)
          var ba = document.getElementById(da).attributes.cal.value
          fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/regencies/` + ba + `.json`).then(response => response.json()).then(regencies => {
           var fora = '';
           for (var i = regencies.length - 1; i >= 0; i--) {
            // console.log(regencies[i])
            fora = fora + `<option id="` + regencies[i].name + `" value="` + regencies[i].name + `" cal='` + regencies[i].id + `'>` + regencies[i].name + `</option>`
           }
           binding=document.getElementById('kob').innerHTML
           document.getElementById('kob').innerHTML =binding+fora

          });
         }
        </script>
       </p>
       <h6>Kecamatan</h6>
       <p>
        <select class="form-select" name="Kecamatan" id="kec" onchange="gokelu()">
        @if(empty($data->Kecamatan))   
        <option value="" selected>{{"Harap Pilih Kota/Kab"}}</option>
        @endif
        </select>
        <script type="text/javascript">
         function gokec() {
          var bas = document.getElementById('kob').value
          console.log(bas)
          var bac = document.getElementById(bas).attributes.cal.value
          fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/districts/` + bac + `.json`).then(response => response.json()).then(districts => {
           var fora = '';
           for (var i = districts.length - 1; i >= 0; i--) {
            // console.log(districts[i])
            fora = fora + `<option id="` + districts[i].name + `" value="` + districts[i].name + `" cal='` + districts[i].id + `'>` + districts[i].name + `</option>`
            // console.log(fora)
           }
           binding=document.getElementById('kec').innerHTML 
           document.getElementById('kec').innerHTML =binding+fora

          });
         }
        </script>
       </p>
       <h6>Kelurahan</h6>
       <p>
        <select class="form-select" name="Kelurahan" id="kel">
        @if(empty($data->Kelurahan))   
        <option value="" selected>{{"Harap Pilih Kecamatan"}}</option>
        @endif
        </select>
        <script type="text/javascript">
         function gokelu() {
          var bas = document.getElementById('kec').value
          console.log(bas)
          var bac = document.getElementById(bas).attributes.cal.value
          fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/villages/` + bac + `.json`).then(response => response.json()).then(vilage => {
           var fora = '';
           for (var i = vilage.length - 1; i >= 0; i--) {
            // console.log(vilage[i])
            fora = fora + `<option id="` + vilage[i].name + `" value="` + vilage[i].name + `" cal='` + vilage[i].id + `'>` + vilage[i].name + `</option>`
           }
           binding=document.getElementById('kel').innerHTML
           document.getElementById('kel').innerHTML =binding+fora
          });
         }
        </script>
       </p>
      </div>
      <button type="submit" class="btn btn-primary">Filter</button>
		</form>
	</div>
	<div class="col-md-10 card">
		@if (!empty($_GET['data']))
		<div class="card-body">
		<div class="row">
		  <div class="col-md-6">
		    <h4 class="card-title">Data Anggota Di Seluruh ... </h4>
		    {{-- <p class="card-description"> Add class <code></code> </p>--}}
		  </div>
		  <div class="col-md-6 text-right">
		    <h4 class="card-title">Export Data</h4>
		    <a href="{{url('/')}}/users/export?{{$ren}}" target="_blank" class="btn btn-success mb-1 mt-1">expord</a>
		  </div>
		</div>
			<table class="table table-striped data-table table-responsive">
			      <thead>
			        <tr>
			          <th>NIK</th>
                <th>nama</th>
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
                <th>Photo_Profile</th>
			          <th>IMG_KTP</th>
                <th>Status</th>
			          <th width="100px">Aksi</th>
			        </tr>
			      </thead>
		  		  <tbody></tbody>
			</table>
			</div>
			@endif
		</div>
	</div>
</div>

@endsection 
@section('js') <script type="text/javascript">
  @if (!empty($_GET['data']))
  var pas=document.URL
  // alert(pas)
  $(function() {
    var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      select: true,
      ajax: pas,
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
         {data: 'Status', name: 'Status'},
         {data: 'action', name: 'action',orderable: false,searchable: false},
         ],
    });
  });
  @endif
</script>
  @include('Admin.js')
 @endsection

