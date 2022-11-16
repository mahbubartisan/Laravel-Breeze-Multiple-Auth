<!DOCTYPE html>
<html lang="en" dir="">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>@yield('title')</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/themes/lite-purple.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/css/plugins/perfect-scrollbar.min.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('backend/assets/css/plugins/datatables.min.css') }}" />
	<!--Font Awesome CSS-->
	<link rel="stylesheet" href="{{ asset('backend/assets/fonts/font-awesome/css/font-awesome.min.css') }}" />

</head>

<body class="text-left">
	<div class="app-admin-wrap layout-sidebar-large">
		<div class="main-header">
			<div class="logo">
				<h1 class="text-success text-center">EAS</h1>
			</div>
			<div class="menu-toggle">
				<div></div>
				<div></div>
				<div></div>
			</div>

			<div style="margin: auto"></div>
			<!-- ============ Header Start ============= -->
			@include('admin.includes.header')
			<!-- ============ Header End ============= -->
		</div>

		<!-- =============== Left Side Start ================-->
		@include('admin.includes.sidenav')
		<!-- =============== Left side End ================-->

		<div class="main-content-wrap sidenav-open d-flex flex-column">
			<!-- ============ Body Content Start ============= -->
			@yield('content')
			<!-- ============ Body Content End ============= -->

			<!-- ============ Footer Start ============= -->
			{{-- @include('admin.body.footer') --}}
			<!-- ============ Footer End ============= -->
		</div>
	</div>

	<script src="{{ asset('backend/assets/js/plugins/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/plugins/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/scripts/script.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/scripts/sidebar.large.script.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/scripts/dashboard.v1.script.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/plugins/datatables.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/scripts/datatables.script.min.js') }}"></script>

	<script>
		function preview() {

			showImage.src = URL.createObjectURL(event.target.files[0]);
		}
	</script>
</body>

</html>