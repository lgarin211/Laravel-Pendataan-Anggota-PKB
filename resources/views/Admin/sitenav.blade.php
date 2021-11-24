<!-- partial:{{url('Template1')}}/partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{url('Template1')}}/assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">{{auth()->user()->name}}</span>
                  <span class="text-secondary text-small">{{auth()->user()->role}}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            @if(auth()->user()->role=='Admin')
            <li class="nav-item">
              <a class="nav-link" href="{{url('/anggota')}}">
                <span class="menu-title">Seluruh Anggota</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Cari Anggota</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{url('/Fbylok')}}">Lokasi</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('/Fbydapil')}}">Dapil</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/data_users')}}">
                <span class="menu-title">Akun Anggota</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{url('/ard')}}">
                <span class="menu-title">Akun ku</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            @endif

          </ul>
        </nav>
        <!-- partial -->