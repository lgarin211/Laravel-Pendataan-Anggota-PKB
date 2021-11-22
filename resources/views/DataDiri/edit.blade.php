<!doctype html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Data</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <style>
      body {
        background: #D8E9A8;
      }
      .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
      }
      .profile-button {
        background: #D8E9A8;
        box-shadow: none;
        border: none
      }

      .profile-button:hover {
        background: #682773
      }

      .profile-button:focus {
        background: #682773;
        box-shadow: none
      }

      .profile-button:active {
        background: #682773;
        box-shadow: none
      }

      .back:hover {
        color: #682773;
        cursor: pointer
      }

      .labels {
        font-size: 11px
      }

      .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
      }
    </style>
  </head>
  <body oncontextmenu='return false' class='snippet-body'>
        <form action="{{url('/edit')}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
    <div class="container rounded bg-white mt-5 mb-5">
      <div class="row">
        <div class="col-md-12 mt-3 mb-4">
          <div class="text-center">
            <h4>Data Diri</h4>
          </div>
        </div>
        <div class="col-md-5 border-right">
          <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <img class="rounded-circle mt-5" src="{{url($data->Upload_Foto)}}" style="max-width:150px;">
            <span class="font-weight-bold">{{$data->nama}}</span><span class="text-black-50">{{$data->Status}}</span>
            <span>

            </span>
          </div>
            <br>
            <div class="row">
              <div class="col-md-12 mb-4">
                <h6>Foto KTP</h6>
                <iframe src="{{url($data->Upload_KTP)}}" class="col-md-12" class="ratio" allowfullscreen></iframe>
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalKTP">
                      Lihat Data
                    </button>
              </div>
              <br>
              <div class="col-md-12 mb-4">
                <h6>File Surat Pernyataan</h6>
                <iframe src="{{url($data->Upload_Surat_Pernyataan)}}" class="col-md-12" class="ratio" allowfullscreen></iframe>
                {{-- Button trigger modal --}}
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalSP">
                      Lihat Data
                    </button>

              </div>
              <br>
              <div class="col-md-12 mb-4">
                <h6>File lainnya</h6>
                <iframe src="{{url($data->filelainnya)}}" class="col-md-12"class="ratio" allowfullscreen></iframe>
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalFL">
                      Lihat File
                    </button>
              </div>
            </div>
        </div>
        <div class="col-md-4 border-right">
          <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4 class="text-right">Profile Settings</h4>
            </div>
            <div class="row mt-4">
              <div class="col-md-12">
                <h6>Nama Lengkap</h6>
                <p><input class="form-control" placeholder="Nama..." oninput="this.className = ''" name="nama" @if(!empty($data->nama)) value="{{$data->nama}}" @endif></p>
                <h6>NIK</h6>
                <p><input class="form-control" placeholder="3271..." oninput="this.className = ''" name="NIK" @if(!empty($data->NIK)) value="{{$data->NIK}}" @endif></p>

                <h6>Status</h6>
                  <select name="Status" class="form-select ">
                    <option value="{{$data->Status}}">{{$data->Status}}</option>
                    <option value="Anggota">Anggota</option>
                    <option value="Pengurus">Pengurus</option>
                  </select>
                  <div class="mb-1"></div>
                <h6>Jenis Kelamin</h6>
                <p><select class="form-select" name="jenis_kelamin"> @if(!empty($data->jenis_kelamin)) <option value="{{$data->jenis_kelamin}}" selected>{{$data->jenis_kelamin}}</option> @endif <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </p>
              </div>
              <div class="col-md-12">
                <h6>Provinsi</h6>
                <p><select class="form-select" name="Provinsi" id="Provinsi" onchange="gokob()"> @if(!empty($data->Provinsi)) <option value="{{$data->Provinsi}}" selected>{{$data->Provinsi}}</option> @endif </select>
                  <script type="text/javascript">
                    fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`).then(response => response.json()).then(provinces => {
                      provinces = provinces.reverse()
                      var fora = '';
                      for (var i = provinces.length - 1; i >= 0; i--) {
                        // console.log(provinces[i])
                        fora = fora + `
                                                <option id="` + provinces[i].name + `" value="` + provinces[i].name + `" cal='` + provinces[i].id + `'>` + provinces[i].name + `</option>`
                      }
                      binding = document.getElementById('Provinsi').innerHTML
                      document.getElementById('Provinsi').innerHTML = binding + fora
                    });
                  </script>
                <h6>Kota/Kab</h6>
                <p><select class="form-select" name="Kabupaten" id="kob" onchange="gokec()"> @if(!empty($data->Kabupaten)) <option value="{{$data->Kabupaten}}" selected>{{$data->Kabupaten}}</option> @endif </select>
                  <script type="text/javascript">
                    function gokob() {
                      document.getElementById('kob').innerHTML = `<option value="" selected>Harap Pilih Lokasi</option>`
                      document.getElementById('kec').innerHTML = `<option value="" selected>Harap Pilih Lokasi</option>`
                      document.getElementById('kel').innerHTML = `<option value="" selected>Harap Pilih Lokasi</option>`
                      var da = document.getElementById('Provinsi').value
                      var ba = document.getElementById(da).attributes.cal.value
                      fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/regencies/` + ba + `.json`).then(response => response.json()).then(regencies => {
                        var fora = '';
                        for (var i = regencies.length - 1; i >= 0; i--) {
                          // console.log(regencies[i])
                          fora = fora + `
                                                      <option id="` + regencies[i].name + `" value="` + regencies[i].name + `" cal='` + regencies[i].id + `'>` + regencies[i].name + `</option>`
                        }
                        binding = document.getElementById('kob').innerHTML
                        document.getElementById('kob').innerHTML = binding + fora
                      });
                    }
                  </script>
                </p>
                <h6>Kecamatan</h6>
                <p><select class="form-select" name="Kecamatan" id="kec" onchange="gokelu()"> @if(!empty($data->Kecamatan)) <option value="{{$data->Kecamatan}}" selected>{{$data->Kecamatan}}</option> @endif </select>
                  <script type="text/javascript">
                    function gokec() {
                      document.getElementById('kec').innerHTML = `<option value="" selected>Harap Pilih Lokasi</option>`
                      document.getElementById('kel').innerHTML = `<option value="" selected>Harap Pilih Lokasi</option>`
                      var bas = document.getElementById('kob').value
                      console.log(bas)
                      var bac = document.getElementById(bas).attributes.cal.value
                      fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/districts/` + bac + `.json`).then(response => response.json()).then(districts => {
                        var fora = '';
                        for (var i = districts.length - 1; i >= 0; i--) {
                          // console.log(districts[i])
                          fora = fora + `
                                                      <option id="` + districts[i].name + `" value="` + districts[i].name + `" cal='` + districts[i].id + `'>` + districts[i].name + `</option>`
                          // console.log(fora)
                        }
                        binding = document.getElementById('kec').innerHTML
                        document.getElementById('kec').innerHTML = binding + fora
                      });
                    }
                  </script>
                </p>
                <h6>Kelurahan</h6>
                <p><select class="form-select" name="Kelurahan" id="kel"> @if(!empty($data->Kelurahan)) <option value="{{$data->Kelurahan}}" selected>{{$data->Kelurahan}}</option> @endif </select>
                  <script type="text/javascript">
                    function gokelu() {
                      document.getElementById('kel').innerHTML = `<option value="" selected>Harap Pilih Lokasi</option>`
                      var bas = document.getElementById('kec').value
                      console.log(bas)
                      var bac = document.getElementById(bas).attributes.cal.value
                      fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/villages/` + bac + `.json`).then(response => response.json()).then(vilage => {
                        var fora = '';
                        for (var i = vilage.length - 1; i >= 0; i--) {
                          // console.log(vilage[i])
                          fora = fora + `
                                                      <option id="` + vilage[i].name + `" value="` + vilage[i].name + `" cal='` + vilage[i].id + `'>` + vilage[i].name + `</option>`
                        }
                        binding = document.getElementById('kel').innerHTML
                        document.getElementById('kel').innerHTML = binding + fora
                      });
                    }
                  </script>
                </p>
                <div class="col-md-12">
                  <h6>RT</h6>
                  <p><input class="form-control" placeholder="001 " oninput="this.className = ''" name="RT" @if(!empty($data->RT)) value="{{$data->RT}}" @endif></p>
                  <h6>RW</h6>
                  <p><input class="form-control" placeholder="001" oninput="this.className = ''" name="RW" @if(!empty($data->RW)) value="{{$data->RW}}" @endif></p>
                </div>
                <h6>Alamat Lengkap</h6>
                <p><textarea class='form-control col-md-12' oninput="this.className = ''" name="Alamat">@if(!empty($data->NIK)){{$data->Alamat}}@endif</textarea></p>
              </div>
              <div class="col-md-12">
                <h6>Email</h6>
                <p><input class="form-control" placeholder="expel@exm.com" oninput="this.className = ''" name="email" type="email" @if(!empty($data->email)) value="{{$data->email}}" @endif></p>
                <h6>Nomor Handphone</h6>
                <p><input class="form-control" placeholder="08xxxxxxxx" oninput="this.className = ''" name="No_Hape" type="number" @if(!empty($data->No_Hape)) value="{{$data->No_Hape}}" @endif></p>
              </div>
              <div class="col-md-12">
                <h6>Rekomendasi</h6>
                <p><input class="form-control" placeholder="Favourite car" oninput="this.className = ''" name="Rekomendasi" @if(!empty($data->Rekomendasi)) value="{{$data->Rekomendasi}}" @endif></p>
              </div>
              <div class="mt-5 text-center">
                <button class="btn btn-success" type="submit">Save Profile</button>
              </div>
            </div>
          </div>
        </div>
  </form>

        <div class="col-md-3 mt-5">
          @if (!empty($_GET['Dapil']))
          <h4>Data Pemilihan Sipil</h4>
          <div class="col-md-12 mt-4">
              <h6>Masukan Daerah pemilihan</h6>
                 <form method="POST" action="/Dapilset"> 
                 @csrf
                 <input type="hidden" name="user_id" value="{{$data->user_id}}">
                 <input type="hidden" name="no_keanggotaan" value="{{$data->no_keanggotaan}}">
                 <input type="hidden" name="anggota_id" value="{{$data->id}}">
                 <div class="tab mr-1 ml-1">
                   <h6>Provinsi</h6>
                   <p>
                    <select class="form-select" name="DProvinsi" id="DProvinsi" onchange="goDkob()">
                    @if(empty($data2->DProvinsi))   
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
                      binding=document.getElementById('DProvinsi').innerHTML
                      document.getElementById('DProvinsi').innerHTML =binding+fora
                     });
                    </script>
                   <h6>Kota/Kab</h6>
                   <p>
                    <select class="form-select" name="DKabupaten" id="Dkob" onchange="goDkec()">
                    @if(empty($data2->DKabupaten))   
                    <option value="" selected>{{"Harap Pilih Provinsi"}}</option>
                    @endif
                    </select>
                    <script type="text/javascript">
                     function goDkob() {
                      var da = document.getElementById('DProvinsi').value
                      console.log(da)
                      var ba = document.getElementById(da).attributes.cal.value
                      fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/regencies/` + ba + `.json`).then(response => response.json()).then(regencies => {
                       var fora = '';
                       for (var i = regencies.length - 1; i >= 0; i--) {
                        // console.log(regencies[i])
                        fora = fora + `<option id="` + regencies[i].name + `" value="` + regencies[i].name + `" cal='` + regencies[i].id + `'>` + regencies[i].name + `</option>`
                       }
                       binding=document.getElementById('Dkob').innerHTML
                       document.getElementById('Dkob').innerHTML =binding+fora

                      });
                     }
                    </script>
                   </p>
                   <h6>Kecamatan</h6>
                   <p>
                    <select class="form-select" name="DKecamatan" id="Dkec" onchange="goDkelu()">
                    @if(empty($data2->DKecamatan))   
                    <option value="" selected>{{"Harap Pilih Kota/Kab"}}</option>
                    @endif
                    </select>
                    <script type="text/javascript">
                     function goDkec() {
                      var bas = document.getElementById('Dkob').value
                      console.log(bas)
                      var bac = document.getElementById(bas).attributes.cal.value
                      fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/districts/` + bac + `.json`).then(response => response.json()).then(districts => {
                       var fora = '';
                       for (var i = districts.length - 1; i >= 0; i--) {
                        // console.log(districts[i])
                        fora = fora + `<option id="` + districts[i].name + `" value="` + districts[i].name + `" cal='` + districts[i].id + `'>` + districts[i].name + `</option>`
                        // console.log(fora)
                       }
                       binding=document.getElementById('Dkec').innerHTML 
                       document.getElementById('Dkec').innerHTML =binding+fora

                      });
                     }
                    </script>
                   </p>
                   <h6>Kelurahan</h6>
                   <p>
                    <select class="form-select" name="DKelurahan" id="Dkel">
                    @if(empty($data2->DKelurahan))   
                    <option value="" selected>{{"Harap Pilih Kecamatan"}}</option>
                    @endif
                    </select>
                    <script type="text/javascript">
                     function goDkelu() {
                      var bas = document.getElementById('Dkec').value
                      console.log(bas)
                      var bac = document.getElementById(bas).attributes.cal.value
                      fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/villages/` + bac + `.json`).then(response => response.json()).then(vilage => {
                       var fora = '';
                       for (var i = vilage.length - 1; i >= 0; i--) {
                        // console.log(vilage[i])
                        fora = fora + `<option id="` + vilage[i].name + `" value="` + vilage[i].name + `" cal='` + vilage[i].id + `'>` + vilage[i].name + `</option>`
                       }
                       binding=document.getElementById('Dkel').innerHTML
                       document.getElementById('Dkel').innerHTML =binding+fora
                      });
                     }
                    </script>
                   </p>
                  </div>
                  <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            {{--  --}}
          </div>
          @endif
        </div>

      </div>
    </div>

    </div>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src=''></script>
    <!-- the jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
        wish to resize images before upload. This must be loaded before fileinput.min.js -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/piexif.min.js" type="text/javascript"></script>
    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
        This must be loaded before fileinput.min.js -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/sortable.min.js" type="text/javascript"></script>
    <!-- bootstrap.bundle.min.js below is needed if you wish to zoom and preview file content in a detail modal
        dialog. bootstrap 5.x or 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- the main fileinput plugin script JS file -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js"></script>
    <!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`). Uncomment if needed. -->
    <!-- script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/themes/fas/theme.min.js"></script -->
    <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/locales/LANG.js"></script>
    <script type="text/javascript">
      // Optional setup: bootstrap library version will be auto-detected based on the
      // loaded bootstrap JS library bootstrap.min.js. But if you wish to override the
      // bootstrap version yourself, then you can set the following property before
      // the plugin init script (available since plugin release v5.2.5)
      // $.fn.fileinputBsVersion = "3.3.7"; // if not set, this will be auto-derived
      // initialize plugin with defaults
      // $("#input-id").fileinput();
      // with plugin options
      $("#pp-up").fileinput({
        'showUpload': false,
        'previewFileType': 'any',
        'showRemove': false,
        'browseOnZoneClick ': true,
      });
      $("#ktp-up").fileinput({
        'showUpload': false,
        'previewFileType': 'any',
        'showRemove': false,
        'browseOnZoneClick ': true,
      });
      $("#spt-up").fileinput({
        'showUpload': false,
        'previewFileType': 'any',
        'showRemove': false,
        'browseOnZoneClick ': true,
      });
      $("#lny-up").fileinput({
        'showUpload': false,
        'previewFileType': 'any',
        'showRemove': false,
        'browseOnZoneClick ': true,
      });
    </script>
     {{-- Modal --}}
                    <!-- Modal -->
                    <form action="/pasfile" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="folder" value="KTP/{{$data->user_id}}">
                      <input type="hidden" name="id" value="{{$data->id}}">
                      <input type="hidden" name="req" value="Upload_KTP">
                      <input type="hidden" name="reqi" value="KTP">
                      @csrf
                      <div class="modal fade" id="ModalKTP" tabindex="-1" aria-labelledby="ModalKTPLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="ModalKTPLabel">File Surat Pernyataan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <h4>File Saat Ini</h4>
                                  <div>                                    
                                    <iframe src="{{url($data->Upload_KTP)}}" class="col-md-12" style="height: 50vh;" class="ratio" allowfullscreen></iframe>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <h4>Udah Dengan</h4>
                                      <input id="ktp-up" type="file" class="file" data-preview-file-type="text" name="Upload_KTP">
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <!-- Modal -->
                    <form action="/pasfile" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="folder" value="SPT/{{$data->user_id}}">
                      <input type="hidden" name="id" value="{{$data->id}}">
                      @csrf
                      <input type="hidden" name="req" value="Upload_Surat_Pernyataan">
                      <div class="modal fade" id="ModalSP" tabindex="-1" aria-labelledby="ModalSPLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="ModalSPLabel">File Surat Pernyataan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <h4>File Saat Ini</h4>
                                  <div>                                    
                                    <iframe src="{{url($data->Upload_Surat_Pernyataan)}}" class="col-md-12" style="height: 50vh;" class="ratio" allowfullscreen></iframe>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <h4>Udah Dengan</h4>
                                      <input id="spt-up" type="file" class="file" data-preview-file-type="text" name="Upload_Surat_Pernyataan">
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <!-- Modal -->
                    <form action="/pasfile" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="folder" value="OTL/{{$data->user_id}}">
                      <input type="hidden" name="id" value="{{$data->id}}">
                      @csrf
                      <input type="hidden" name="req" value="filelainnya">
                    <div class="modal fade" id="ModalFL" tabindex="-1" aria-labelledby="ModalFLLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ModalFLLabel">File lainnya</h5>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-6">
                                <h4>File Saat Ini</h4>
                                <div>                                    
                                  <iframe src="{{url($data->filelainnya)}}" class="col-md-12" style="height: 50vh;" class="ratio" allowfullscreen></iframe>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <h4>Udah Dengan</h4>
                                    <input id="lny-up" type="file" class="file" data-preview-file-type="text" name="filelainnya">
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>
  </body>
</html>