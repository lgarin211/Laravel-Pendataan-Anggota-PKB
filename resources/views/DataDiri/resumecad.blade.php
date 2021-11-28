@extends('Admin.Mazer')
@section('css')
    <title>RESUME</title>
    <style type="text/css">
/*      body{
        margin: 0;
        padding: 0;
      }*/

/*      .kartu{
        margin: 20px;
        width: 100vh;
        height: 110vh;
        border: 1px solid;
      }*/


      .konten{
        width: 100%;
        height: 100%;
      }

      .profil{
        max-width: 3cm;
        max-height: 4cm;
        margin-top: 20px;
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
      }

      .h{
        text-align: center;
        font-size: 40px;
        margin-top: 10px;
      }

</style>

<style type="text/css">

/*      body{
        background-color: blue !important; 
      }*/
</style>
@endsection
@section('content')
    <div class="card kartu col-md-12">
      <h1 class="h">RESUME PENDAFTARAN</h1>
      <div class="container konten">
        <div class="row">
          <div class="col-3">
            <img class="ml-3 img-thumbnail" src="{{url($data->Upload_Foto)}}" style="max-width:200px;">
          </div>
          <div class="col-6">
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
                      <div class="col-md-9"><button type="button" class="btn btn-success" data-bs-toggle="modal" style="margin-left: 200px;" data-bs-target="#ModalFL">
                      Lihat File
                      </button>
                    </div>
                    </td>
                  </tr>
                  <tr id="gktp" style="display: none;">
                  </tr>

                  <tr id="surat">
                    <td class="row">
                      <div class="col-md-3">Surat Pernyataan</div>
                      <div class="col-md-9"><button type="button" class="btn btn-success" data-bs-toggle="modal" style="margin-left: 200px;" data-bs-target="#ModalFL">
                      Lihat File
                      </button>
                    </div>
                    </td>
                  </tr>
                  <tr id="file">
                    <td class="row">
                      <div class="col-md-3">File Lainnya  </div>
                      <div class="col-md-9"><button type="button" class="btn btn-success" data-bs-toggle="modal" style="margin-left: 200px;" data-bs-target="#ModalFL">
                      Lihat File
                      </button>
                    </div>
                    </td>
                  </tr>
                </table>
          </div>


      </div>
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
@endsection