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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="c-app flex-row align-items-center">
    <div class="c-wrapper">
    <div class="c-body">

        <main class="c-main">
            @yield('content')
        </main>



    </div>
    </div>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
        <!-- CoreUI and necessary plugins-->
        <script src="node_modules/@coreui/coreui-pro/dist/js/coreui.bundle.min.js"></script>
        <!--[if IE]><!-->
        <script src="node_modules/@coreui/icons/js/svgxuse.min.js"></script>
        <!--<![endif]-->



        {{-- ddnjkan --}}
        <script src="{{ asset('js/jquery.min.js') }}" defer></script>
<script src="{{ asset('js/jquery.validate.js') }}" defer></script>
<script src="{{asset('js/jquery.dataTables.js')}}" defer></script>
<script src="{{asset('js/dataTables.bootstrap4.js')}}" defer></script>

<script src="{{ asset('js/datatables.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.11/js/select2.min.js"></script>


<script src="{{asset('js/select2.min.js')}}" defer></script>
<script>
    $('#select2-1, #select2-2, #select2-4').select2({
        theme: 'bootstrap'
    });
</script>
<script src="{{asset('js/advanced-forms.js')}}" defer></script>

<script src="{{ asset('js/validation.js') }}" defer></script>

<script src="{{ asset('js/popper.min.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('js/pace.min.js') }}" defer></script>
<script src="{{ asset('js/perfect-scrollbar.min.js') }}" defer></script>
<script src="{{ asset('js/coreui.min.js') }}" defer></script>
<script src="{{ asset('js/toastr.js') }}" defer>

</script>

{{-- <script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/pace-progress/pace.min.js"></script>
<script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script src="node_modules/@coreui/coreui-pro/dist/js/coreui.min.js"></script> --}}
<script>
    $('#ui-view').ajaxLoad();
    $(document).ajaxComplete(function() {
        Pace.restart()
    });
</script>

<script>
    $('#myCollapsible').collapse({
        toggle: false
    })

</script>
<script>
    $("#profileForm").validate();

 $("#loginForm").validate();
 $("#registerForm").validate();



</script>
</body>
</html>


