<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>RESUME {{$data->nama}}_{{$data->NIK}}_{{date('Y-m-d')}}</title>

    <style type="text/css">
      body{
        margin: 0;
        padding: 0;
      }

      .kartu{
        margin: 50px;
        width: 100vw;
        height: 90vh;
        border: 0px solid;
      }

      .konten{
        width: 90%;
        height: 90%;
      }

      .profil{
        width: 3cm;
        height: 4cm;
        margin-top: 20px;
      }

      .judul{
        padding-right: 20px;
      }

      .isi{
        padding-left: 10px;
      }

      .gambar{
        min-width: 350px;
        man-width: 550px;
        height: 100px;
      }

      .h{
        text-align: center;
        font-size: 50px;
        margin-top: 10px;

      }

      @media print{
      @page { margin: 0;
          size: 21cm 29.7cm; }

      body{
        width: 100vh;
        height: 100vh;
        margin: 0;
        padding: 0;
      }

      .title{
        display: none;
      }

      .kartu{
        margin: 50px;
        width: 90%;
        height: 100%;
        border: 0px solid;
      }

      .konten {
        margin: 20px; 
      }

      .badan{
        width: 200%;
      }
    }

    </style>
  </head>
  <body>
    
    <div class="card kartu">
      <h3 class="h">RESUME PENDAFTARAN</h3>
      <div class="container konten">
        <div class="row">
          <div class="col-3">
            <img class="profil" src="{{url($data->Upload_Foto)}}" style="">
          </div>
          <div class="col-9">
             
			<table class="badan">
                  <tr>
                    <td class="judul">Nama Lengkap</td>
                    <td>  :  </td>
                    <td class="isi">{{$data->nama}}</td>
                    <td class="isi"></td>
                  </tr>
                  <tr>
                    <td class="judul">NIK</td>
                    <td>  :  </td>
                    <td class="isi">{{$data->NIK}}</td>
                    <td class="isi"></td>
                  </tr>
                  <tr>
                    <td class="judul">Status</td>
                    <td>  :  </td>
                    <td class="isi">{{$data->Status}}</td>
                    <td class="isi"></td>
                  </tr>
                  <tr>
                    <td class="judul">Jenis Kelamin</td>
                    <td>  :  </td>
                    <td class="isi">{{$data->jenis_kelamin}}</td>
                    <td class="isi"></td>
                  </tr>
                  <tr>
                    <td class="judul">Provinsi</td>
                    <td>  :  </td>
                    <td class="isi">{{$data->Provinsi}}</td>
                    <td class="isi"></td>
                  </tr>
                  <tr>
                    <td class="judul">Kota/Kab</td>
                    <td>  :  </td>
                    <td class="isi">{{$data->Kabupaten}}</td>
                    <td class="isi"></td>
                  </tr>
                  <tr>
                    <td class="judul">Kecamatan</td>
                    <td>  :  </td>
                    <td class="isi">{{$data->Kecamatan}}</td>
                    <td class="isi"></td>
                  </tr>
                  <tr>
                    <td class="judul">Kelurahan</td>
                    <td>  :  </td>
                    <td class="isi">{{$data->Kelurahan}}</td>
                    <td class="isi"></td>
                  </tr>
                  <tr>
                    <td class="judul">RT</td>
                    <td>  :  </td>
                    <td class="isi">{{$data->RT}}</td>
                    <td class="isi"></td>
                  </tr>
                  <tr>
                    <td class="judul">RW</td>
                    <td>  :  </td>
                    <td class="isi">{{$data->RW}}</td>
                    <td class="isi"></td>
                  </tr>
                  <tr>
                    <td class="judul">Alamat Lengkap</td>
                    <td>  :  </td>
                    <td class="isi">{{$data->Alamat}}</td>
                    <td class="isi"></td>
                  </tr>
                   <tr>
                    <td class="judul">Email</td>
                    <td>  :  </td>
                    <td class="isi">{{$data->email}}</td>
                    <td class="isi"></td>
                  </tr>
                  <tr>
                    <td class="judul">Nomor Handphone</td>
                    <td>  :  </td>
                    <td class="isi">{{$data->No_Hape}}</td>
                    <td class="isi"></td>
                  </tr>
                  <tr>
                    <td class="judul">Rekomendasi</td>
                    <td>  :  </td>
                    <td class="isi">{{$data->Rekomendasi}}</td>
                    <td class="isi"></td>
                  </tr>
                </table>
                <br>

                <table class="table kaki">
                  {{-- <tr>
                    <td>Data Yang Diunggah</td>
                  </tr>
                  <tr>
                    <td>Foto Ktp</td>
                  </tr>
                  <tr>
                    <td>
                      <img class="gambar" src="{{url($data->Upload_KTP)}}">
                    </td>
                  </tr> --}}

{{--                   <tr>
                    <td>File Surat Pernyataan</td>
                  </tr>
                  <tr>
                    <td>
                      <img class="gambar" src="https://dafunda.com/wp-content/uploads/2019/10/Aktris-Jepang-Terkawaii-Menurut-Survey-di-Tahun-2016-Dafunda-Otaku-9.jpg">
                    </td>
                  </tr>

                  <tr>
                    <td>File Lainnya</td>
                  </tr>
                  <tr>
                    <td>
                      <img class="gambar" src="https://cdn.keepo.me/images/post/lists/2019/09/20/main-list-image-81d9144d-d4ac-4648-b1c0-c0e5abda4acc-6.jpg">
                    </td>
                  </tr> --}}
                </table>

          </div>



        </div>

      </div>
    </div>

    <script type="text/javascript">
      window.print();
    </script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
  </body>
</html>