@include('Admin.headmezer')
    <div id="app">
        @include('Admin.sitemezer')
      <div id="main">
        <header class="mb-3">
          <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
          </a>
        </header>
        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>@yield('title')</h3>
{{--                 <p class="text-subtitle text-muted">For user to check they list</p> --}}
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item">
                      <a href="index.html"></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@yield('title')</li> --}}
                  </ol>
                </nav>
              </div>
            </div>
          </div>
@yield('content')
        </div>
        <footer class="fixed-bottom">
          <div class="footer clearfix mb-0 text-muted">
            <div class="text-center">
              <p>2021 &copy; Partai Kebangkitan Bangsa</p>
            </div>
{{--             <div class="float-end">
              <p>Crafted with <span class="text-danger">
                  <i class="bi bi-heart"></i>
                </span> by <a href="http://ahmadsaugi.com">A. Saugi</a>
              </p>
            </div> --}}
          </div>
        </footer>
      </div>
    </div>
    @include('Admin.footmezer')