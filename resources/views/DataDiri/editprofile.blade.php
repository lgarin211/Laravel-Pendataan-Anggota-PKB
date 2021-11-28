     <form id="regForm" action="{{url('/')}}/kelengkapandata/simpan" method="POST" enctype="multipart/form-data">
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
        <input placeholder="Nama..." name="nama" @if(!empty($data->nama)) value="{{$data->nama}}" @endif>
       </p>
       <h6>NIK</h6>
       <p>
        <input placeholder="3271..." name="NIK" @if(!empty($data->NIK)) value="{{$data->NIK}}" @endif>
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
       <p>
            <select class="form-select" name="Provinsi" id="Provinsi" onchange="gokob()">
        @if(!empty($data->Provinsi))   
        <option value="{{$data->Provinsi}}" selected>{{$data->Provinsi}}</option>
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
          binding=document.getElementById('Provinsi').innerHTML
          document.getElementById('Provinsi').innerHTML =binding+fora
         });
        </script>
       <h6>Kota/Kab</h6>
       <p>
        <select class="form-select" name="Kabupaten" id="kob" onchange="gokec()">
        @if(!empty($data->Kabupaten))   
        <option value="{{$data->Kabupaten}}" selected>{{$data->Kabupaten}}</option>
        @endif
        </select>
        <script type="text/javascript">
         function gokob() {
          var da = document.getElementById('Provinsi').value
          console.log(da)
          var ba = document.getElementById(da).attributes.cal.value
          fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/regencies/` + ba + `.json`).then(response => response.json()).then(regencies => {
           var fora = '';
           for (var i = regencies.length - 1; i >= 0; i--) {
            // console.log(regencies[i])
            fora = fora + `<option id="` + regencies[i].name + `" value="` + regencies[i].name + `" cal='` + regencies[i].id + `'>` + regencies[i].name + `</option>`
           }
           binding=document.getElementById('kob').innerHTML
           document.getElementById('kob').innerHTML =binding+fora

          });
         }
        </script>
       </p>
       <h6>Kecamatan</h6>
       <p>
        <select class="form-select" name="Kecamatan" id="kec" onchange="gokelu()">
        @if(!empty($data->Kecamatan))   
        <option value="{{$data->Kecamatan}}" selected>{{$data->Kecamatan}}</option>
        @endif
        </select>
        <script type="text/javascript">
         function gokec() {
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
           binding=document.getElementById('kec').innerHTML 
           document.getElementById('kec').innerHTML =binding+fora

          });
         }
        </script>
       </p>
       <h6>Kelurahan</h6>
       <p>
        <select class="form-select" name="Kelurahan" id="kel">
        @if(!empty($data->Kelurahan))   
        <option value="{{$data->Kelurahan}}" selected>{{$data->Kelurahan}}</option>
        @endif
        </select>
        <script type="text/javascript">
         function gokelu() {
          var bas = document.getElementById('kec').value
          console.log(bas)
          var bac = document.getElementById(bas).attributes.cal.value
          fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/villages/` + bac + `.json`).then(response => response.json()).then(vilage => {
           var fora = '';
           for (var i = vilage.length - 1; i >= 0; i--) {
            // console.log(vilage[i])
            fora = fora + `<option id="` + vilage[i].name + `" value="` + vilage[i].name + `" cal='` + vilage[i].id + `'>` + vilage[i].name + `</option>`
           }
           binding=document.getElementById('kel').innerHTML
           document.getElementById('kel').innerHTML =binding+fora
          });
         }
        </script>
       </p>
       <div class="row">
        <div class="col-md-6">
         <h6>RT</h6>
         <p>
          <input placeholder="001 " name="RT" @if(!empty($data->RT)) value="{{$data->RT}}" @endif>
         </p>
        </div>
        <div class="col-md-6">
         <h6>RW</h6>
         <p>
          <input placeholder="001" name="RW" @if(!empty($data->RW)) value="{{$data->RW}}" @endif>
         </p>
        </div>
       </div>
       <h6>Alamat Lengkap</h6>
       <p>
        <textarea class='form-control col-md-12' name="Alamat">@if(!empty($data->NIK)){{$data->Alamat}}@endif</textarea>
       </p>
      </div>
      <div class="tab">
       <h6>Email</h6>
       <p>
        <input placeholder="expel@exm.com" name="email" type="email"
        @if(!empty($data->email)) value="{{$data->email}}" @endif>
       </p>
       <h6>Nomor Handphone</h6>
       <p>
        <input placeholder="08xxxxxxxx" name="No_Hape" type="number"
        @if(!empty($data->No_Hape)) value="{{$data->No_Hape}}" @endif>
       </p>
      </div>
      <div class="tab">
       <h6>Rekomendasi</h6>
       <p>
        <input placeholder="Favourite car" name="Rekomendasi"
        @if(!empty($data->Rekomendasi)) value="{{$data->Rekomendasi}}" @endif>
       </p>
      </div>
      <div class="tab">
       <h6>Pilih Photo Profile</h6>
       <p>
        {{-- <input placeholder="Favourite Song" name="uname"> --}}
        <input id="pp-up" type="file" class="file" data-preview-file-type="text" name="Upload_Foto">
       </p>
       <h6>Pilih Photo KTP</h6>
       <p>
        {{-- <input placeholder="Favourite Song" name="uname"> --}}
        <input id="ktp-up" type="file" class="file" data-preview-file-type="text" name="Upload_KTP">
       </p>
       <h6>Pilih Photo Surat Pernyataan</h6>
       <p>
        {{-- <input placeholder="Favourite Song" name="uname"> --}}
        <input id="spt-up" type="file" class="file" data-preview-file-type="text" name="Upload_Surat_Pernyataan">
       </p>
       <h6>Pilih file Lainnya</h6>
       <p>
        {{-- <input placeholder="Favourite Song" name="uname"> --}}
        <input id="lny-up" type="file" class="file" data-preview-file-type="text" name="filelainnya">
       </p>
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