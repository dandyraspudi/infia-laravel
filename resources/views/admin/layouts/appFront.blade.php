<!DOCTYPE html>
<html lang="id_ID">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Infia Compro Dashboard @yield('title')</title>
    <!-- core:css -->
	<link rel="stylesheet" href="{{ asset('admins/assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admins/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- end plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('admins/assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('admins/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admins/assets/css/demo_1/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="#" />
</head>
<body>
	<div class="main-wrapper">

		@yield('content')

	</div>

	<!-- core:js -->
	<script src="{{ asset('admins/assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->

	<!-- plugin js for this page -->
	<script src="{{ asset('admins/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('admins/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
	<!-- end plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('admins/assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{ asset('admins/assets/js/template.js')}}"></script>
	<!-- endinject -->

	<!-- custom js for this page -->
	@yield('customjs')
	<!-- end custom js for this page -->

</body>
</html>
