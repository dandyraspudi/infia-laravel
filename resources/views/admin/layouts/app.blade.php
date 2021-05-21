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
	<link rel="stylesheet" href="{{ asset('admins/assets/vendors/select2/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admins/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admins/assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <!-- end plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('admins/assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('admins/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admins/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admins/assets/css/demo_1/style.css') }}">
	<!-- End layout styles -->

	<!-- custom css for this page -->
	@yield('customcss')
	<!-- end custom css for this page -->

    <link rel="shortcut icon" href="#" />
</head>
<body>
	<div class="main-wrapper">

        <!-- partial: Sidebar -->
        @include('admin.layouts.partials.sidebar')
        <!-- partial -->

		<div class="page-wrapper">

			<!-- partial: Navbar -->
			@include('admin.layouts.partials.navbar')
			<!-- partial -->

			<div class="page-content">

				@if (session('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong><i data-feather="thumbs-up"></i> Success...</strong> {{ session('success') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif

				@if (session('failed'))
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong><i data-feather="x-octagon"></i> Failed...</strong> {{ session('failed') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif

				@yield('content')

			</div>

			<!-- partial: Footer -->
			@include('admin.layouts.partials.footer')
			<!-- partial -->

		</div>
	</div>

	<!-- core:js -->
	<script src="{{ asset('admins/assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->

	<!-- plugin js for this page -->
	<script src="{{ asset('admins/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('admins/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
	<script src="{{ asset('admins/assets/vendors/select2/select2.min.js')}}"></script>
	<script src="{{ asset('admins/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
	{{-- <script src="../../../assets/js/sweet-alert.js"></script> --}}
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
