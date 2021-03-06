<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WellFit360 | </title>

    <!-- Bootstrap -->
    <link href="{{ asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('backend/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('backend/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('backend/vendors/animate.css/animate.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    {{-- Toster CSS --}}
    <link rel="stylesheet" href="{{ asset('backend/toastr/toastr.min.css')}}">
    {{-- End toster css --}}
    <link href="{{ asset('backend/build/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/auth.css') }}" rel="stylesheet">
    <script>
        var BASE_URL = "{{ URL::to('/') }}";
    </script>
  </head>

  <body class="login">
    <div class="loader"></div>
    <div id="cover-spin"></div>
    
    <div id="overlay">
      <div class="cv-spinner">
        <span class="spinner"></span>
      </div>
    </div>
