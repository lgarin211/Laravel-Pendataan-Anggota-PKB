<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php  $users = DB::table('data_anggotas')->where('user_id',auth()->user()->id)->first();?>
@if(empty($users))
<div style=" width: 100%; height: 70vh;" class="text-center">
  <h2>{{Auth::user()->nama}} Beberapa Data Anda Belum Lengkap Harap Lengkapi untuk Melakukan Registrasi</h2>
  <a href="/kelengkapandata" class="btn btn-primary col-md-12">Lengkapi Data</a>
</div>
@else
<div class="table-responsive">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">RT</th>
      <th scope="col">RW</th>
      <th scope="col">Kelurahan</th>
      <th scope="col">No Hape</th>
      <th scope="col">Rekomendasi</th>
      <th scope="col">Cetek Kartu</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <th scope="row">{{$users->nama}}</th>
      <th scope="row">{{$users->Alamat}}</th>
      <th scope="row">{{$users->RT}}</th>
      <th scope="row">{{$users->RW}}</th>
      <th scope="row">{{$users->Kelurahan}}</th>
      <th scope="row">{{$users->No_Hape}}</th>
      <th scope="row">{{$users->Rekomendasi}}</th>
      <th scope="row">
        <div class="btn-group" role="group" aria-label="Basic example">
          <a href="/cetak?user_id={{$users->user_id}}" class="btn btn-success">Cetak Kartu</a>
          <a href="/edit?id={{$users->id}}" class="btn btn-success">Edit Kartu</a>
          <a  class="btn btn-success">Hapus</a>
        </div>
      </th>
    </tr>
  </tbody>
</table>
</div>
@endif