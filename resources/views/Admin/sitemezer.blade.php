      <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
          <div class="sidebar-header">
            <div class="d-flex justify-content-between">
              <div class="logo">
                <a href="{{url('/')}}">
                  <img src="{{url('/')}}/PKB/LOGOPKB.png" alt="Logo" style="min-width: 200px; min-height: 200px;" srcset="">
                </a>
              </div>
              <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block">
                  <i class="bi bi-x bi-middle"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="sidebar-menu">
            <ul class="menu">
              <li class="sidebar-title">Menu</li>
              <li class="sidebar-item  ">
                <a href="{{url('/')}}" class='sidebar-link'>
                  <i class="bi bi-grid-fill"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              @if(auth()->user()->role=='Admin')
              <li class="sidebar-item  ">
                <a href="{{url('/data_users')}}" class='sidebar-link'>
                  <i class="bi bi-person-lines-fill"></i>
                  <span>Buat Data User</span>
                </a>
              </li>
              <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                  <i class="bi bi-person-badge-fill"></i>
                  <span>Database</span>
                </a>
                <ul class="submenu">
                  <li class="submenu-item">
                    <a href="{{url('/anggota')}}">Seluruh Data</a>
                  </li>
                  <li class="submenu-item ">
                    <a href="{{url('/Fbylok')}}">Filter Dari Lokasi</a>
                  </li>
                </ul>
              </li>
              @else

              @endif
               <li class="sidebar-item  ">
                  <form action="{{url('/')}}/logout" method="POST" class="dropdown-item">
                    @csrf
                    <button type="submit" class="btn btn-dangger">
                          <i class="bi bi-power"></i> Signout                    
                    </button>
                  </form>
              </li>
            </ul>
          </div>
          <button class="sidebar-toggler btn x">
            <i data-feather="x"></i>
          </button>
        </div>
      </div> 