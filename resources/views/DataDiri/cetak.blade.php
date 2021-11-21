<!DOCTYPE html>
<html>
<head>
	<title class="title">TEMPLATE CETAK KARTU</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<style>

		body{
			width: 650px;
			height: 415px;
			-webkit-print-color-adjust: exact !important;
			margin: 10px;
		}

		.gprofil{
			margin-top: 20px;
			margin-left: 10px;
			height: 150px;
			width: 115px;
			border: 2px solid;
			border-color: lightgrey;
		}

		.gbcode{
			margin-top: 15px;
			margin-left: 10px;
			height: 115px;
			width: 115px;
			border: 2px solid;
		}

		.brcode{
			height: 110px;
			width: 110px; 
			padding: 2px;
		}

		.judul{
			width: 150px;
			height: 20px; 

		}
		
		@media print{
			@page { margin: 0; }
			.title{
				display: none;
			}

			.nomorkuku{
			background-color: orange;
		}
		}
	</style>
</head>
<body>
 	
 	<div class="container">
 		<div class="card" style="border: 2px solid black;">
 			<div class="row g-2">
 			<div class="col-9">
 			<table class="table" style="border-bottom: solid;  border-color: orange">
 				
    				<tr>
      					<th style="background-color: orange; color: white; font-size: 20px; width: 150px; height: 20px; text-align: center;">Nomor KTA</th>
      					<th style="font-size: 20px;">11.22.03.4050.000067</th>
    				</tr>
 			</table>
 		<table class="table table-borderless">
    <tr>
      <td class="judul">Nama</td>
      <td>: {{$data->nama}}</td>
    </tr>
{{--     <tr>
      <td class="judul">Tempat Tgl Lahir</td>
      <td>: Bogor, 11 Oktober 1998</td>
    </tr> --}}
    <tr>
      <td class="judul">Jenis Kelamin</td>
      <td>: {{$data->jenis_kelamin}}</td>
    </tr>
    <tr>
      <td class="judul">NIK</td>
      <td>: {{$data->NIK}}</td>
    </tr>
    <tr>
      <td class="judul">Alamat</td>
      <td>: {{$data->Alamat}}</td>
    </tr>
    
</table>
<table class="table table-borderless" style="margin-top: 50px;">
	<tr>
      <td class="judul">Berlaku Sejak</td>
      <td>: {{date('now')}}</td>
    </tr>
	</table>
	</div>

	<div class="col-3">
		<img class="gprofil" src="http://localhost:8000/{{$data->Upload_Foto}}">
		<div class="card gbcode">
			<img class="brcode" src="https://upload.wikimedia.org/wikipedia/commons/6/65/QR_code_for_QRpedia.png">
		</div>
	</div>
</div>
 	</div>
 </div>
	
 
	<script>
		window.print();
	</script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
