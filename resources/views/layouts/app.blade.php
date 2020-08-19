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
    <link href="vendors/@coreui/chartjs/dist/css/coreui-chartjs.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="vendors/toastr/css/toastr.min.css" rel="stylesheet">

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
{{-- snippet --}}
  <link href="{{asset('css/dataTables.bootstrap4.css')}}" rel="stylesheet" />

    <!-- Plugins and scripts required by this view-->
    <link href="{{ asset('vendors/toastr/css/toastr.min.css')}}" rel="stylesheet">
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
    <link href="{{ asset('vendors/toastr/css/toastr.min.css') }}" rel="stylesheet">
        @include('layouts.newsidebar')
        @include('layouts.aside')
        <div class="c-wrapper">

        @include('layouts.header')

        <div class="c-body">
            @include('flash-message')

                   @yield('content')

        </div>

        @include('layouts.footer')
        </div>

        <script src="{{ asset('vendors/@coreui/chartjs/dist/js/coreui-chartjs.bundle.js') }}"></script>
<script src="{{ asset('vendors/@coreui/utils/dist/coreui-utils.js') }}"></script>
 <script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
<script src="{{ asset('vendors/@coreui/coreui-pro/dist/js/coreui.bundle.min.js') }}"></script>
<!--[if IE]><!-->
<script src="{{ asset('vendors/@coreui/icons/js/svgxuse.min.js') }}"></script>
<!--<![endif]-->
<!-- Plugins and scripts required by this view-->

<script src="js/main.js"></script>
<script src="{{ asset('vendors/jquery/js/jquery.min.js') }}"></script>
<script src="{{ asset('vendors/toastr/js/toastr.js') }}"></script>
<script src="js/toastr.js"></script>

<script>
    @if(Session::has('message'))
      var type = "{{ Session::get('alert-type', 'info') }}";
      switch(type){
          case 'info':
              toastr.info("{{ Session::get('message') }}");
              break;

          case 'warning':
              toastr.warning("{{ Session::get('message') }}");
              break;

          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;

          case 'error':
              toastr.error("{{ Session::get('message') }}");
              break;
      }
    @endif
  </script>

{{-- rbtny --}}

</body>
</html>


