<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Goldfy') }}</title>

    <!-- Global stylesheets -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/atlantis.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/fonts.min.css') }}" rel="stylesheet">

    <!-- custom stylesheets -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- /global stylesheets -->
@yield('page-css')
<!-- Core JS files -->
    <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- jQuery UI -->
    <script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Theme JS files -->
    <script src="{{ asset('assets/js/atlantis.min.js') }}"></script>
    <!-- /theme JS files -->

</head>
<body>
<div class="preloader" style="display: none">

</div>
<div class="wrapper">

<!-- Main navbar -->
@include('user.layouts.navbar')
<!-- /main navbar -->

    <!-- Page content -->
    <div class="page-content">
        <!-- Sidebar area -->
        @include('user.layouts.sidebar')
        <!-- /Sidebar area -->

        <!-- Main content -->
        <div class="main-panel">

        <!-- Content area -->
        @yield('content')
        <!-- /content area -->

        <!-- Footer -->
        @include('user.layouts.footer')
        <!-- /footer -->

        </div>
        <!-- /main content -->
    </div>
</div>
<!-- /page content -->
@yield('page-js')

</body>

</html>
