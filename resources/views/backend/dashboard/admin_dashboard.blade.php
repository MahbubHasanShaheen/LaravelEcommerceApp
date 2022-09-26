
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ecom Admin</title>

    <link rel="stylesheet" href="{{asset('frontend/css')}}/font-awesome.min.css" type="text/css">

   <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css')}}/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/')}}/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{asset('assets/css')}}/style.css">
    <link rel="stylesheet" href="{{asset('assets/css')}}/datatables.min.css">
    <link rel="shortcut icon" href="{{asset('assets/images')}}/favicon.ico" />
      <style>
       .container-scroller{ overflow-x: scroll;}

      </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include('backend.dashboard.navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('backend.dashboard.sidebar')
      
        <!-- partial -->


        <!-- Main panel----->
        
        @yield('content')
      
        <!-- footer start*-->

     
  <!-- End Footer..-->
      @include('backend.dashboard.footer')

     </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->


    <script src="{{asset('assets/vendors/js')}}/vendor.bundle.base.js"></script>
    <script src="{{asset('assets/vendors/js')}}/datatables.min.js"></script>
    
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('assets/vendors/chart.js')}}/Chart.min.js"></script>
    <script src="{{asset('assets/js')}}/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets/js')}}/off-canvas.js"></script>
    <script src="{{asset('assets/js')}}/hoverable-collapse.js"></script>
    <script src="{{asset('assets/js')}}/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('assets/js')}}/dashboard.js"></script>
    <script src="{{asset('assets/js')}}/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>










    <!--<div class="container">
    <div class="row">
        <hr>
        <h2 class="text-center">Welcome To Admin Dashboard</h2>
        <hr>
        <a class="btn btn-primary w-25 m-auto" href="{{ url('admin/logout') }}">Logout</a>
    </div>
</div>-->


