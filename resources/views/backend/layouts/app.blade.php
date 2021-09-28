<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>PCforAll- @yield('title')</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.4.min.js" /></script>

  {{-- Extra Styles Page Wise --}}
  @stack('styles')
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
  
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    @section('navbar')
        @include('backend.layouts.navbar')
    @show

    @section('sidebar')
        @include('backend.layouts.sidebar')
    @show

    @section('content')
        
    @show

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Version 1.0
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2020 <a href="https://iciclecorporation.com">Icicle Corporation</a>.</strong> All rights
      reserved.
    </footer>
  </div>

<!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
 
  <!-- Bootstrap 4 -->
  <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  {{-- Extra Scripts Page Wise --}}
  @stack('scripts')
  <!-- AdminLTE App -->
  <script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
  @stack('ajax')
</body>

</html>