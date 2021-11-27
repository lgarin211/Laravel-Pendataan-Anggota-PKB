<!DOCTYPE html>
<html>
   <head>
      <title class="title">TEMPLATE CETAK KARTU</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <style>
      	 hr{
      			color: white;
      		}
         body{
         -webkit-print-color-adjust: exact !important;
         }
         .judulnomor{
         background-color: orange; 
         color: white; 
         font-size: 0.4cm; 
         width: 5cm;  
         height: 0.5cm; 
         text-align: center;
         }
         .isinomor{
         font-size: 0.35cm;
         }
         .halaman{
         margin-left: 50px;
         margin-top: 15px;
         }
         .kartu{
         width: 8.5cm;
         height: 5.5cm;
         padding-left: 5px;
         padding-top: 5px;
         margin-bottom: 10px;
         margin-right: 20px;
         border: 1px solid;
         }
         .gprofil{
         margin-top: 20px;
         height: 2.2cm;
         width: 1.7cm;
         border: 2px solid;
         border-color: lightgrey;
         }
         .gbcode{
         margin-top: 15px;
         height: 1.7cm;
         width: 1.7cm;
         border: 2px solid;
         }
         .brcode{
         height: 1.6cm;
         width: 1.6cm; 
         padding: 2px;
         }
         .tabelkolom{
         margin: 0;
         padding: 0;
         }
         .judul{
         width: 3cm;
         height: 0.5cm;
         font-size: 0.3cm; 
         }
         .isi{
         width: 5cm;
         height: 0.5cm;
         font-size: 9px; 
         }
         @media print{
         @page { margin: 0;
         size: 21cm 29.7cm; }
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
      <div class="halaman">
         <div class="row g-2">
         	<table>
         		<tbody>
         			<td></td>
         		</tbody>
         	</table>
         	@php
         	$ia=0;
         	@endphp
         	@foreach ($data as $key=> $item)
         	{{-- @dd($item) --}}
         		<div class="card kartu col-6">
               <div class="row g-2">
                  <div class="col-9">
                     <table class="tabelkolom" style="border-bottom: solid;  border-color: orange">
                        <tr>
                           <th class="judulnomor">Nomor KTA</th>
                           <th class="isinomor">
                           {{-- {{$item->id}} --}}
                           {{367105101000023+$item->id}}
                         </th>
                        </tr>
                     </table>
                     <table class=" tabelkolom">
                        <tr>
                           <td class="judul">Nama</td>
                           <td class="isi">: {{$item->nama}}</td>
                        </tr>
												{{--<tr>
                           <td class="judul">Tempat Tgl Lahir</td>
                           <td class="isi">: Bogor, 11 Oktober 1998</td>
                        </tr> --}}
                        <tr>
                           <td class="judul">Jenis Kelamin</td>
                           <td class="isi">: {{$item->jenis_kelamin}}</td>
                        </tr>
                        <tr>
                           <td class="judul">NIK</td>
                           <td class="isi">: {{$item->NIK}}</td>
                        </tr>
                        <tr>
                           <td class="judul">Tempat/tgl Lahir</td>
                           {{-- <td class="isi">: {{$item->tmp}}/{{$item->tmt}}</td> --}}
                           <td class="isi">: {{$item->tmp}}/{{$item->tmt}}</td>
                        </tr>
                        <tr>
                           <td class="judul">Alamat</td>
                           <td class="isi">: 
                              {{-- {{$item->Alamat.' RT '.$item->RT.'/RW '.$item->RW.','.$item->Kelurahan.' '.$item->Kecamatan}} --}}
                              {{$item->Alamat.}}
                           </td>
                        </tr>
                     </table>
                     <table style="margin-top: 40px;">
                        <tr>
                           <td class="judul">Berlaku Sejak</td>
                           <td class="isi">: {{date('d-m-Y')}}</td>
                        </tr>
                     </table>
                  </div>
                  <div class="col-3">
                     <img class="gprofil" src="{{url($item->Upload_Foto)}}">
                     <div class="card gbcode">
                        <img class="brcode" src="https://upload.wikimedia.org/wikipedia/commons/6/65/QR_code_for_QRpedia.png">
                     </div>
                  </div>
               </div>
            </div>
           @php
           $ia++;
         	if ($ia==8) {
         		$ia=0;
         		echo '<hr><hr><hr><hr><hr><hr><hr><hr><hr>';
         	}
         	@endphp
         	@endforeach
         </div>
      </div> 

      <script>
         window.print();
      </script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   </body>
</html>