<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Human Resource Management System developed by Wishers Tech">
    <meta name="author" content="Suraj Raghubansh">
    <meta name="keywords" content="hrm, human resource, management system, system, wisherstech, wishers">

    <title>HRM System :: Wishers Tech</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{asset('assets/vendors/flatpickr/flatpickr.min.css')}}">
	<!-- End plugin css for this page -->
	<!-- Plugin css for Data Table -->
	<link rel="stylesheet" href="{{asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
	<!-- End plugin css for Data Table -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
	<!-- endinject -->

	<!-- SweetAlert Plugin css for this page -->
	<link rel="stylesheet" href="{{asset('assets/vendors/sweetalert2/sweetalert2.min.css')}}">
	<!-- End SweetAlert plugin css for this page -->

	<!-- Select2 Plugin css for this page -->
	<link rel="stylesheet" href="{{asset('assets/vendors/select2/select2.min.css')}}">
	<!-- End Select2 plugin css for this page -->
    <!-- Datepicker Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets/vendors/flatpickr/flatpickr.min.css')}}">

  <!-- Layout styles -->
	<link rel="stylesheet" href="{{asset('assets/css/demo2/style.css')}}">
  <!-- End layout styles -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

  <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}"/>
    @yield('style')
</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.components.sidebar')
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('admin.components.header')
            <!-- partial -->

            @yield('content')

            <!-- partial:partials/_footer.html -->
            @include('admin.components.footer')
            <!-- partial -->

        </div>
    </div>

    <!-- core:js -->
	<script src="{{asset('assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="{{asset('assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
  <script src="{{asset('assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
	<!-- End plugin js for this page -->

	<!-- Plugin js for Data Table -->
	<script src="{{asset('assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  	<script src="{{asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
  	<script src="{{asset('assets/js/data-table.js')}}"></script>
	<!-- End of Plugin js for Data Table -->

	<!-- inject:js -->
	<script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset('assets/js/template.js')}}"></script>
	<!-- endinject -->
	<!-- Sweet Alert Plugin js for this page -->
	<script src="{{asset('assets/vendors/sweetalert2/sweetalert2.min.js')}}"></script>
	<!-- Select2 Plugin js for this page -->
	<script src="{{asset('assets/vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
    <!-- Datepicker Plugin js for this page -->
    <script src="{{asset('assets/js/flatpickr.js')}}"></script>
	<script src="{{asset('assets/js/select2.js')}}"></script>
	<script src="{{asset('assets/js/core/custom.js')}}"></script>
	<!-- End plugin js for this page -->


	<!-- Custom js for this page -->

	<!-- End custom js for this page -->
	<script src="{{asset('assets/js/validate.min.js')}}"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
	@if(Session::has('message'))
	var type = "{{Session::get('alert_type','info')}}"
	switch(type){
		case 'info':
			toastr.info("{{Session::get('message')}}");
			break;
		case 'success':
			toastr.success("{{Session::get('message')}}");
			break;
		case 'warning':
			toastr.warning("{{Session::get('message')}}");
			break;
		case 'error':
			toastr.error("{{Session::get('message')}}");
			break;
	}
	@endif
</script>
    @yield('script')

</body>

</html>
