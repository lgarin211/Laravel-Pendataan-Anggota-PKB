{{--     <link rel="stylesheet" href="{{url('/')}}/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
<link rel="stylesheet" href="{{url('/')}}/assets/vendors/toastify/toastify.css">
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">


<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/bootstrap.css">
    
<link rel="stylesheet" href="{{url('/')}}/assets/vendors/toastify/toastify.css">
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

    <link rel="stylesheet" href="{{url('/')}}/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/app.css"> --}}

<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
  <!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
  <!-- link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
{{--   <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'> --}}
{{--   <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> --}}
<!-- Modal -->
<div class="modal fade" id="anggotaadd" tabindex="-1" aria-labelledby="anggotaaddLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="anggotaaddLabel">Masukan Data Anggoota</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<section class="text-left" id="multiple-column-form">
    <form action="/kelengkapandata" method="POST" enctype="multipart/form-data">
    	@csrf
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form">
                                <div class="row">
                                    <div class="col-md-5 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="first-name-column">NAMA LENGKAP</label>
                                            <input class="form-control" required placeholder="Nama..." name="nama">
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="NIK">NIK</label>
                                            <input type="number" id="NIK" name="NIK" class="form-control" placeholder="3271..." name="lname-column" oninput="VAL()">
                                            <div id="KTP-cek">

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="Status">Status</label>
                                            <select name="Status" id="Status" class="form-select">
                                                <option value="Anggota">Anggota</option>
                                                <option value="Pengurus">Pengurus</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="Provinsi">Provinsi</label>
                                              <select class="form-select" id="Provinsi" name="Provinsi" onchange="gokob()">
                                                <option value="" selected>Pilih Provinsi</option>
                                            </select>
                                              <script type="text/javascript">
                                                fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`).then(response => response.json()).then(provinces => {
                                                  provinces = provinces.reverse()
                                                  var fora = '';
                                                  for (var i = provinces.length - 1; i >= 0; i--) {
                                                    // console.log(provinces[i])
                                                    fora = fora + `<option id="` + provinces[i].name + `" value="` + provinces[i].name + `" cal='` + provinces[i].id + `'>` + provinces[i].name + `</option>`
                                                  }
                                                  binding = document.getElementById('Provinsi').innerHTML
                                                  document.getElementById('Provinsi').innerHTML = binding + fora
                                                });
                                              </script>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="kob">Kota/Kabupaten</label>
                                            <select class="form-select" name="Kabupaten" id="kob" onchange="gokec()"> @if(!empty($data->Kabupaten)) <option value="{{$data->Kabupaten}}" selected>{{$data->Kabupaten}}</option> @endif </select>
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
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="kec">Kecamatan</label>
                                            <select class="form-select" name="Kecamatan" id="kec" onchange="gokelu()"> @if(!empty($data->Kecamatan)) <option value="{{$data->Kecamatan}}" selected>{{$data->Kecamatan}}</option> @endif </select>
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
                                                  fora = fora + `<option id="` + districts[i].name + `" value="` + districts[i].name + `" cal='` + districts[i].id + `'>` + districts[i].name + `</option>`
                                                  // console.log(fora)
                                                }
                                                binding = document.getElementById('kec').innerHTML
                                                document.getElementById('kec').innerHTML = binding + fora
                                              });
                                            }
                                          </script>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="kel">Kelurahan</label>
                                             <select class="form-select" name="Kelurahan" id="kel"> @if(!empty($data->Kelurahan)) <option value="{{$data->Kelurahan}}" selected>{{$data->Kelurahan}}</option> @endif </select>
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
                                                      fora = fora + `<option id="` + vilage[i].name + `" value="` + vilage[i].name + `" cal='` + vilage[i].id + `'>` + vilage[i].name + `</option>`
                                                    }
                                                    binding = document.getElementById('kel').innerHTML
                                                    document.getElementById('kel').innerHTML = binding + fora
                                                  });
                                                }
                                              </script>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="">RT</label>
                                            <input class="form-control" required placeholder="001" type="number" name="RT">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="form-group">
                                            <label for="">RW</label>
                                            <input class="form-control" required placeholder="002" type="number" name="RW">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="">Alamat Lengakap</label>
                                                <textarea class='form-control col-md-12' name="Alamat"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="">Rekomendasi</label>
                                                <input class="form-control" required placeholder="..." type="text" name="Rekomendasi">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="">Kontak</label>
                                                <input class="form-control" required placeholder="08111..." type="number" name="No_Hape">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="jenis_kelamin">jenis_kelamin</label>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                                                <option value=""></option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="card border">
                                            <div class="card-header">
                                                <h5 class="card-title">GAMBAR KTP</h5>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <p class="card-text">Silahkan Masukan Gambar KTP
                                                        <code>Format JPG,JPEG,PNG</code>-.
                                                    </p>
                                                    <!-- Auto resize image file uploader -->
                                                    <input type="file" class="imgKTP" id="ktp-up" name="Upload_KTP">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card border">
                                            <div class="card-header">
                                                <h5 class="card-title">Gambar Diri</h5>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <p class="card-text">Silahkan Masukan Gambar Diri
                                                        <code>Format JPG,JPEG,PNG</code>-.
                                                    </p>
                                                    <!-- Auto resize image file uploader -->
                                                    <input type="file" class="imgPP" id="pp-up" name="Upload_Foto">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="card border">
                                            <div class="card-header">
                                                <h5 class="card-title">Kartu Keluarga</h5>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <p class="card-text">Silahkan Masukan FILE KARTU KELUARGA
                                                        <code>Format JPG,JPEG,PNG,PDF</code>-.
                                                    </p>
                                                    <!-- Auto resize image file uploader -->
                                                    <input type="file" class="imgPP" id="kk-up" name="KK">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card border">
                                            <div class="card-header">
                                                <h5 class="card-title">Surat Pertnyataan</h5>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <p class="card-text">Silahkan Masukan File Surat Pernyataan
                                                        <code>Format PDF</code>-.
                                                    </p>
                                                    <!-- Auto resize image file uploader -->
                                                    <input type="file" class="imgSP" id="spt-up" name="Upload_Surat_Pernyataan">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card border">
                                            <div class="card-header">
                                                <h5 class="card-title">FILE LAINNYA</h5>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <p class="card-text">Silahkan Masukan File Lainnya
                                                        <code>Format JPG,JPEG,PNG,PDF</code>-.
                                                    </p>
                                                    <!-- Auto resize image file uploader -->
                                                    <input type="file" class="imgotl" id="lny-up" name="filelainnya">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1 hia" id="ba" style="display: none;">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</form>
		</section>
    </div>
  </div>
</div>
</div>

<script src="{{url('/')}}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{url('/')}}/assets/js/bootstrap.bundle.min.js"></script>
    
<!-- filepond validation -->
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

<!-- image editor -->
<script
    src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-filter/dist/filepond-plugin-image-filter.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<script type="text/javascript" src="{{url('/assets/vendors/toastify/toastify.js')}}"></script>
<script type="text/javascript" src="https://unpkg.com/filepond@4.30.3/dist/filepond.js"></script>
{{-- <script>
    // register desired plugins...
    FilePond.registerPlugin(
        // validates the size of the file...
        // FilePondPluginFileValidateSize,
        // validates the file type...
        // FilePondPluginFileValidateType,

        // calculates & dds cropping info based on the input image dimensions and the set crop ratio...
        // FilePondPluginImageCrop,
        // preview the image file type...
        FilePondPluginImagePreview,
        // filter the image file
        // FilePondPluginImageFilter,
        // corrects mobile image orientation...
        // \FilePondPluginImageExifOrientation,
        // calculates & adds resize information...
        FilePondPluginImageResize,
    );

    // Filepond: With Validation
    FilePond.create(document.querySelector('.imgKTP'), {
        allowImagePreview: true,
 		server: '/',
        allowMultiple: false,
        allowFileEncode: false,
        required: true,
        allowImageFilter: false,
        allowImageExifOrientation: false,
        allowImageCrop: false,
        allowImageResize: true,
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        imageResizeMode: 'cover',
        imageResizeUpscale: true,
        // acceptedFileTypes: ['image/png','image/jpg','image/jpeg','image/JPG','image/JPEG'],
        // fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
        //     // Do custom type detection here and return with promise
        //     resolve(type);
        // })
    });

    FilePond.create(document.querySelector('.imgPP'), {
        allowImagePreview: true,
 		server: '/',
        allowMultiple: false,
        allowFileEncode: false,
        required: true,
        allowImageFilter: false,
        allowImageExifOrientation: false,
        allowImageCrop: false,
        allowImageResize: true,
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        imageResizeMode: 'cover',
        imageResizeUpscale: true,
        // acceptedFileTypes: ['image/png','image/jpg','image/jpeg','image/JPG','image/JPEG'],
        // fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
        //     // Do custom type detection here and return with promise
        //     resolve(type);
        // })
    });

    FilePond.create(document.querySelector('.imgotl'), {
        allowImagePreview: true,
 		server: '/',
        allowMultiple: false,
        allowFileEncode: false,
        required: true,
        // fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
        //     // Do custom type detection here and return with promise
        //     resolve(type);
        // })
    });

    FilePond.create(document.querySelector('.imgSP'), {
        allowImagePreview: true,
 		server: '/',
        allowMultiple: false,
        allowFileEncode: false,
        required: true,

        // fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
        //     // Do custom type detection here and return with promise
        //     resolve(type);
        // })
    });

</script>
 --}}

   <!-- the jQuery Library -->
{{--   <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
 --}}  <!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
        wish to resize images before upload. This must be loaded before fileinput.min.js -->
  <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/piexif.min.js" type="text/javascript"></script>
  <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
        This must be loaded before fileinput.min.js -->
  <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/sortable.min.js" type="text/javascript"></script>
  <!-- bootstrap.bundle.min.js below is needed if you wish to zoom and preview file content in a detail modal
        dialog. bootstrap 5.x or 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> --}}
  <!-- the main fileinput plugin script JS file -->
  <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js"></script>
  <!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`). Uncomment if needed. -->
  <!-- script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/themes/fas/theme.min.js"></script -->
  <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
  <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/locales/LANG.js"></script>
                                              <script type="text/javascript">
                                                function VAL() {
                                                    var cas=document.getElementById('NIK').value
                                                    if (cas.length>15) {
                                                        fetch('{{url('/VAL')}}?NIK='+cas)
                                                      .then(response => response.json())
                                                      .then(data => {
                                                        document.getElementById('KTP-cek').innerHTML=data
                                                        if(data=='<p class="text-primary">Data Bisa Di masukan</p>'){
                                                        document.getElementById('ba').style=''
                                                        }
                                                        })
                                                      .catch(console.error);
                                                   }
                                                }
                                            </script>
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
    'showCancel': false,
    'previewFileType': 'any',
    'showRemove': false,
    'browseOnZoneClick ': true,
   });
   $("#kk-up").fileinput({
    'showUpload': false,
    'showCancel': false,
    'previewFileType': 'any',
    'showRemove': false,
    'browseOnZoneClick ': true,
   });
   $("#ktp-up").fileinput({
    'showUpload': false,
    'showCancel': false,
    'previewFileType': 'any',
    'showRemove': false,
    'browseOnZoneClick ': true,
   });
   $("#spt-up").fileinput({
    'showUpload': false,
    'showCancel': false,
    'previewFileType': 'any',
    'showRemove': false,
    'browseOnZoneClick ': true,
   });
   $("#lny-up").fileinput({
    'showUpload': false,
    'showCancel': false,
    'showCencel': false,
    'previewFileType': 'any',
    'showRemove': false,
    'browseOnZoneClick ': true,
   });
  </script>