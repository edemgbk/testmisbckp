<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
    <link href="node_modules/@coreui/chartjs/dist/css/coreui-chartjs.css" rel="stylesheet">


{{-- snippet --}}
  <link href="{{asset('css/dataTables.bootstrap4.css')}}" rel="stylesheet" />
    <!-- Plugins and scripts required by this view-->

    <link href="{{ asset('css/select2.min.css')}}" rel="stylesheet" />

    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pace.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/toastr/css/toastr.min.css') }}" rel="stylesheet" />
{{-- snipppet --}}
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="c-app c-default-layout">

        @include('layouts.sidebar')
        @include('layouts.aside')
        <div class="c-wrapper">

        @include('layouts.header')

        <div class="c-body">

                   @yield('content')

        </div>

        @include('layouts.footer')
        </div>

 <script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
<script src="node_modules/@coreui/coreui-pro/dist/js/coreui.bundle.min.js"></script>
<!--[if IE]><!-->
<script src="node_modules/@coreui/icons/js/svgxuse.min.js"></script>
<!--<![endif]-->
<!-- Plugins and scripts required by this view-->
<script src="node_modules/@coreui/chartjs/dist/js/coreui-chartjs.bundle.js"></script>
<script src="node_modules/@coreui/utils/dist/coreui-utils.js"></script>
<script src="js/main.js"></script>

{{-- rbtny --}}

</body>
</html>


