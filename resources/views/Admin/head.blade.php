<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PKB</title>
    {{-- modal --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url('Template1')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{url('Template1')}}/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{url('Template1')}}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{url('Template1')}}/assets/images/favicon.ico" />
    @yield('css')
  </head>
  <body style="background-color: #D8E9A8 !important;">
    <div class="container-scroller">
      {{-- topnav --}}
      @include('Admin.topnav')
      <div class="container-fluid page-body-wrapper">
        {{-- sitenav --}}
        @include('Admin.sitenav')
        <div class="main-panel">
          <div class="content-wrapper">
          	@yield('content')
          </div>
          <!-- content-wrapper ends -->
		 {{-- foot --}}
		 @include('Admin.foot')
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @yield('js')
    <!-- container-scroller -->
    <!-- plugins:js -->
    {{-- <script src="{{url('Template1')}}/assets/vendors/js/vendor.bundle.base.js"></script> --}}
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{url('Template1')}}/assets/js/off-canvas.js"></script>
    <script src="{{url('Template1')}}/assets/js/hoverable-collapse.js"></script>
    <script src="{{url('Template1')}}/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>