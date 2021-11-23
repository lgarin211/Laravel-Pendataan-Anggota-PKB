<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php  $users = DB::table('data_anggotas')->where('user_id',auth()->user()->id)->first();?>
@if(empty($users))
<div style=" width: 100%; min-height: 30vh;" class="text-center">
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
      <td scope="row">1</td>
      <td scope="row">{{$users->nama}}</td>
      <td scope="row">{{$users->Alamat}}</td>
      <td scope="row">{{$users->RT}}</td>
      <td scope="row">{{$users->RW}}</td>
      <td scope="row">{{$users->Kelurahan}}</td>
      <td scope="row">{{$users->No_Hape}}</td>
      <td scope="row">{{$users->Rekomendasi}}</td>
      <td scope="row">
        <div class="btn-group" role="group" aria-label="Basic example">
          <a href="/cetak?user_id={{$users->user_id}}" class="btn btn-success">Cetak Kartu</a>
          <a href="/edit?id={{$users->id}}" class="btn btn-success">Edit Data</a>
          <a href="/Hapus?id={{$users->id}}&table=anggotas"class="btn btn-success">Hapus</a>
        </div>
      </td>
    </tr>
  </tbody>
</table>
</div>
@endif