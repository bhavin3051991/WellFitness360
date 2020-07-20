<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'WellFit360') }}</title>
	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css">
	<!-- <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css"> -->
	<link rel="stylesheet" href="{{ asset('backend/toastr/toastr.min.css')}}">
	<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css">
	<script>
		var BASE_URL = "{{ URL::to('/') }}";
	</script>
</head>
<body>
	<div id="cover-spin"></div>
	@yield('content')
  	<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
  	<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
  	<script src="{{ asset('frontend/js/additional-methods.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/frontend.js') }}"></script>
</body>
</html>