@extends('Admin.Mazer')
@section('css')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style type="text/css">
/*      body{
        margin: 0;
        padding: 0;
      }
*/
      .kartu{
        margin: 20px;
        width: 100vw;
        height: 120vh;
        /*border: 0px solid;*/
      }

      .konten{
        width: 100%;
        height: 100%;
      }

      .profil{
        width: 3cm;
        height: 4cm;
        margin-top: 20px;
        border: 2px solid;
      }

      .judul{
        padding-right: 20px;
      }

      .isi{
        padding-left: 10px;
      }

      .gambar{
        width: 250px;
        height: 100px;
        border: 1px solid
      }

      .h{
        text-align: center;
        font-size: 50px;
        margin-top: 10px;

      }

      @media only screen and (max-width: 500px) {
      html {
        zoom: .5;
      }
      .kartu{
        width: 150vw;
      }

      .lihat{
        padding: 0;
        width: 50px;
        height: 25px;
      }

      .h{
        font-size: 25px;
      }
		    }
    </style>
@endsection
@section('content')
    <div class="card kartu">
      <h3 class="h">RESUME PENDAFTARAN</h3>
      <div class="container konten">
        <div class="row">
          <div class="col-3">
            <img class="profil" src="{{url($data->Upload_Foto)}}" style="max-width:200px;">
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

				  <table class="table mt-1">
                  <tr>
                    <td>Data Yang Diunggah</td>
                  </tr>
                  <tr id="ktp">
                    <td class="row">
                      <div class="col-md-3">Foto KTP</div>
                      <div class="col-md-9"><button type="button" class="btn btn-success" data-bs-toggle="modal" style="margin-left: 200px;" data-bs-target="#ModalKTP">
                      Lihat 
                      </button>
                    </div>
                    </td>
                  </tr>
                  <tr id="gktp" style="display: none;">
                  </tr>
                  <tr id="surat">
                    <td class="row">
                      <div class="col-md-3">Surat Pernyataan</div>
                      <div class="col-md-9"><button type="button" class="btn btn-success" data-bs-toggle="modal" style="margin-left: 200px;" data-bs-target="#ModalSP">
                      Lihat 
                      </button>
                    </div>
                    </td>
                  </tr>
                  <tr id="surat">
                    <td class="row">
                      <div class="col-md-3">Kartu Keluarga</div>
                      <div class="col-md-9"><button type="button" class="btn btn-success" data-bs-toggle="modal" style="margin-left: 200px;" data-bs-target="#ModalKK">
                      Lihat 
                      </button>
                    </div>
                    </td>
                  </tr>
                  <tr id="file">
                    <td class="row">
                      <div class="col-md-3">File Lainnya  </div>
                      <div class="col-md-9"><button type="button" class="btn btn-success" data-bs-toggle="modal" style="margin-left: 200px;" data-bs-target="#ModalFL">
                      Lihat 
                      </button>
                    </div>
                    </td>
                  </tr>
                  </tr>
                  <tr id="file">
                    <td class="row">
                      <div class="col-md-3">Print Data  </div>
                      <div class="col-md-9">
                        <a class="btn btn-primary" href="/presume?id={{$_GET['id']}}" target="_blank"  style="margin-left: 200px;">
                        Print
                      </a>
                    </div>
                    </td>
                  </tr>
          </table>
          </div>
@endsection
@section('js')
     {{-- Modal --}}
                    <!-- Modal -->
                    <div class="modal fade" id="ModalKTP" tabindex="-1" aria-labelledby="ModalKTPLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h6 class="modal-title" id="ModalKTPLabel">File Surat Pernyataan</h6>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <h4>File Saat Ini</h4>
                                  <div>                                    
                                    <iframe src="{{url($data->Upload_KTP)}}" class="col-md-12" style="height: 50vh;" class="ratio" allowfullscreen></iframe>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <!-- Modal -->
                      <div class="modal fade" id="ModalSP" tabindex="-1" aria-labelledby="ModalSPLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="ModalSPLabel">File Surat Pernyataan</h5>
                 
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <h4>File Saat Ini</h4>
                                  <div>                                    
                                    <iframe src="{{url($data->Upload_Surat_Pernyataan)}}" class="col-md-12" style="height: 50vh;" class="ratio" allowfullscreen></iframe>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <!-- Modal -->
                    <div class="modal fade" id="ModalFL" tabindex="-1" aria-labelledby="ModalFLLabel" aria-hidden="true">                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ModalFLLabel">File lainnya</h5>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <h4>File Saat Ini</h4>
                                <div>                                    
                                  <iframe src="{{url($data->filelainnya)}}" class="col-md-12" style="height: 50vh;" class="ratio" allowfullscreen></iframe>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                     <!-- Modal -->
                    <div class="modal fade" id="ModalKK" tabindex="-1" aria-labelledby="ModalKKLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ModalKKLabel">Kartu Keluarga</h5>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <h4>File Saat Ini</h4>
                                <div>                                    
                                  <iframe src="{{url($data->KK)}}" class="col-md-12" style="height: 50vh;" class="ratio" allowfullscreen></iframe>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
</section>
@endsection