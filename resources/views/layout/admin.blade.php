<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <link rel="stylesheet" href="{{asset('adminLTE-3.2/plugins/fontawesome-free/css/all.min.css')}}">
    
    <link rel="stylesheet" href="{{asset('adminLTE-3.2/dist/css/adminlte.min.css')}}">
    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('partials.header')
        @include('partials.siderbar')
        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        @include('partials.footer')
    </div>
    
    <script src="{{asset('adminLTE-3.2/plugins/jquery/jquery.min.js')}}"></script>
    
    <script src="{{asset('adminLTE-3.2/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
    <script src="{{asset('adminLTE-3.2/dist/js/adminlte.min.js')}}"></script>
@yield('js')
</body>

</html>