<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@section('pageTitle')@show</title>
    <!-- Styles -->
    <link href="{{ asset('asset/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

</head>
<body class="bg-gradient-primary">
<div class="container">
    @yield('content')
</div>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('asset/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js' )}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('asset/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('asset/js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js')}} "></script>
@include('sweet::alert')
<script >
    $(function() {
        $("#myModal").modal();
    });
    $('#myModal').modal({backdrop: 'static', keyboard: false})
</script>
</body>
</html>

