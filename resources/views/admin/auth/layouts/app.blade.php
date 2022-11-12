<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title')</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
	<link href="{{ asset('employee/assets/css/themes/lite-purple.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('employee/assets/css/plugins/perfect-scrollbar.min.css') }}" rel="stylesheet" />
</head>

<body>

	@yield('content')

	<script src="{{ asset('employee/assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('employee/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('employee/assets/js/es5/script.min.js') }}"></script>
</body>

</html>
