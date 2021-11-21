<!doctype html>
<html>
 <head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Registrasi</title>
  <!-- default icons used in the plugin are from Bootstrap 5.x icon library (which can be enabled by loading CSS below) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
  <!-- alternatively you can use the font awesome icon library if using with `fas` theme (or Bootstrap 4.x) by uncommenting below. -->
  <!-- link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous" -->
  <!-- the fileinput plugin styling CSS file -->
  <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
  <!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
  <!-- link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <style>
   body {
    background: #1E3163
   }

   #regForm {
    background-color: #ffffff;
    margin: 0px auto;
    font-family: Raleway;
    padding: 40px;
    border-radius: 10px
   }

   #register {
    color: #2D46B9
   }

   h1 {
    text-align: center
   }

   input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
    border-radius: 10px;
    -webkit-appearance: none
   }

   .tab input:focus {
    border: 1px solid #2D46B9 !important;
    outline: none
   }

   input.invalid {
    border: 1px solid #e03a0666
   }

   .tab {
    display: none
   }

   button {
    background-color: #2D46B9;
    color: #ffffff;
    border: none;
    border-radius: 50%;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer
   }

   button:hover {
    opacity: 0.8
   }

   button:focus {
    outline: none !important
   }

   #prevBtn {
    background-color: #bbbbbb
   }

   .all-steps {
    text-align: center;
    margin-top: 30px;
    margin-bottom: 30px;
    width: 100%;
    display: inline-flex;
    justify-content: center
   }

   .step {
    height: 40px;
    width: 40px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 15px;
    color: #2D46B9;
    opacity: 0.5
   }

   .step.active {
    opacity: 1
   }

   .step.finish {
    color: #fff;
    background: #2D46B9;
    opacity: 1
   }

   .all-steps {
    text-align: center;
    margin-top: 30px;
    margin-bottom: 30px
   }

   .thanks-message {
    display: none
   }
  </style>
 </head>
 <body oncontextmenu='return false' class='snippet-body'>
  <div class="container mt-5">
   <div class="row d-flex justify-content-center align-items-center">
    <div class="col-md-8">
     <form id="regForm" action="/kelengkapandata" method="POST" enctype="multipart/form-data">
      @csrf
      <center>
       <img src="https://upload.wikimedia.org/wikipedia/id/thumb/1/11/Logo_PKB.svg/1200px-Logo_PKB.svg.png" class="text-center card-img-top mb-2" style="width:60px;height: 80px;">
      </center>
      <h5 id="register" class="text-center">REGISTRASI CALON RENGURUS DPC PKB MASA BHAKTI <br>
       <strong>2021-2026</strong>
      </h5>
      <div class="all-steps" id="all-steps">
       <span class="step">
        <i class="fa fa-user"></i>
       </span>
       <span class="step">
        <i class="fa fa-map-marker"></i>
       </span>
       <span class="step">
        <i class="fa fa-address-book"></i>
       </span>
       <span class="step">
        <i class="fa fa-address-card-o"></i>
       </span>
       <span class="step">
        <i class="fa fa-archive"></i>
       </span>
       <span class="step">
        <i class="fa fa-mobile-phone"></i>
       </span>
      </div>
      <div class="tab">
       <h6>Nama Lengkap</h6>
       <p>
        <input placeholder="Nama..." oninput="this.className = ''" name="nama" @if(!empty($data->nama)) value="{{$data->nama}}" @endif>
       </p>
       <h6>NIK</h6>
       <p>
        <input placeholder="3271..." oninput="this.className = ''" name="NIK" @if(!empty($data->NIK)) value="{{$data->NIK}}" @endif>
       </p>
       <h6>Jenis Kelamin</h6>
       <p>
        <select class="form-select" name="jenis_kelamin">
        @if(!empty($data->jenis_kelamin))   
        <option value="{{$data->jenis_kelamin}}" selected>{{$data->jenis_kelamin}}</option>
        @endif
         <option value="Laki-Laki">Laki-Laki</option>
         <option value="Perempuan">Perempuan</option>
        </select>
       </p>
      </div>
      <div class="tab">
<h6>Provinsi</h6>
                <p><select class="form-select" name="Provinsi" id="Provinsi" onchange="gokob()"> @if(!empty($data->Provinsi)) <option value="{{$data->Provinsi}}" selected>{{$data->Provinsi}}</option> @endif 
                  <option value="" selected>Pilih Provinsi</option></select>
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
       <div class="row">
        <div class="col-md-6">
         <h6>RT</h6>
         <p>
          <input placeholder="001 " oninput="this.className = ''" name="RT" @if(!empty($data->RT)) value="{{$data->RT}}" @endif>
         </p>
        </div>
        <div class="col-md-6">
         <h6>RW</h6>
         <p>
          <input placeholder="001" oninput="this.className = ''" name="RW" @if(!empty($data->RW)) value="{{$data->RW}}" @endif>
         </p>
        </div>
       </div>
       <h6>Alamat Lengkap</h6>
       <p>
        <textarea class='form-control col-md-12' oninput="this.className = ''" name="Alamat">@if(!empty($data->NIK)){{$data->Alamat}}@endif</textarea>
       </p>
      </div>
      <div class="tab">
       <h6>Email</h6>
       <p>
        <input placeholder="expel@exm.com" oninput="this.className = ''" name="email" type="email"
        @if(!empty($data->email)) value="{{$data->email}}" @endif>
       </p>
       <h6>Nomor Handphone</h6>
       <p>
        <input placeholder="08xxxxxxxx" oninput="this.className = ''" name="No_Hape" type="number"
        @if(!empty($data->No_Hape)) value="{{$data->No_Hape}}" @endif>
       </p>
      </div>
      <div class="tab">
       <h6>Rekomendasi</h6>
       <p>
        <input placeholder="Favourite car" oninput="this.className = ''" name="Rekomendasi"
        @if(!empty($data->Rekomendasi)) value="{{$data->Rekomendasi}}" @endif>
       </p>
      </div>
      <div class="tab">
       <h6>Pilih Photo Profile</h6>
       <p>
        {{-- <input placeholder="Favourite Song" oninput="this.className = ''" name="uname"> --}}
        <input id="pp-up" type="file" class="file" data-preview-file-type="text" name="Upload_Foto" value="C:\\fakepath\\Logo_PKB.svg">
       </p>
       <h6>Pilih Photo KTP</h6>
       <p>
        {{-- <input placeholder="Favourite Song" oninput="this.className = ''" name="uname"> --}}
        <input id="ktp-up" type="file" class="file" data-preview-file-type="text" name="Upload_KTP">
       </p>
       <h6>Pilih Photo Surat Pernyataan</h6>
       <p>
        {{-- <input placeholder="Favourite Song" oninput="this.className = ''" name="uname"> --}}
        <input id="spt-up" type="file" class="file" data-preview-file-type="text" name="Upload_Surat_Pernyataan">
       </p>
       <h6>Pilih file Lainnya</h6>
       <p>
        {{-- <input placeholder="Favourite Song" oninput="this.className = ''" name="uname"> --}}
        <input id="lny-up" type="file" class="file" data-preview-file-type="text" name="filelainnya" value="https://laravel.com/img/logomark.min.svg">
       </p>
      </div>
      <div class="tab">
       <h6>Syarat yang harus di baca</h6>
       <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
      </div>
      <div class="thanks-message text-center" id="text-message">
       {{-- <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4"> --}}
       <button type="submit" class="btn btn-primary col-md-12">Kirim</button>
      </div>
      <div style="overflow:auto;" id="nextprevious">
       <div style="float:right;">
        <button type="button" id="prevBtn" onclick="nextPrev(-1)">
         <i class="fa fa-angle-double-left"></i>
        </button>
        <button type="button" id="nextBtn" onclick="nextPrev(1)">
         <i class="fa fa-angle-double-right"></i>
        </button>
       </div>
      </div>
     </form>
    </div>
   </div>
  </div>
  <script type='text/javascript'>
   var currentTab = 0;
   document.addEventListener("DOMContentLoaded", function(event) {
    showTab(currentTab);
   });

   function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    if (n == 0) {
     document.getElementById("prevBtn").style.display = "none";
    } else {
     document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
     document.getElementById("nextBtn").innerHTML = '   <i class = "fa fa-angle-double-right" > </i>';
    } else {
     document.getElementById("nextBtn").innerHTML = '   <i class = "fa fa-angle-double-right" > </i>';
    }
    fixStepIndicator(n)
   }

   function nextPrev(n) {
    var x = document.getElementsByClassName("tab");
    if (n == 1 && !validateForm()) return false;
    x[currentTab].style.display = "none";
    currentTab = currentTab + n;
    if (currentTab >= x.length) {
     document.getElementById("nextprevious").style.display = "none";
     document.getElementById("all-steps").style.display = "none";
     document.getElementById("register").style.display = "none";
     document.getElementById("text-message").style.display = "block";
    }
    showTab(currentTab);
   }

   function validateForm() {
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    for (i = 0; i < y.length; i++) {
     if (y[i].value == "") {
      y[i].className += " invalid";
      valid = false;
     }
    }
    if (valid) {
     document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid;
   }

   function fixStepIndicator(n) {
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
     x[i].className = x[i].className.replace(" active", "");
    }
    x[n].className += " active";
   }
  </script>
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
 </body>
</html>