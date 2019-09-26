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
    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SWM <sup>Portal</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item @section('dashboard')  @show">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('messages.dashboard') }}</span></a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('messages.hosting') }}</span></a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('messages.vps') }}</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item @section('domain')  @show">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>{{ __('messages.domainservice') }}</span>
            </a>
            <div id="collapseTwo" class="collapse @section('domainshow')  @show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item @section('domainall')  @show" href="{{ route('domain.all') }}">{{ __('messages.mydomain') }}</a>
                    <h6 class="collapse-header">{{ __('messages.domaingo') }}</h6>
                    <a class="collapse-item" href="{{ route('check.global') }}">{{ __('messages.checkdomain') }}</a>
                    <a class="collapse-item" href="#">{{ __('messages.regdomain') }}</a>
                    <a class="collapse-item" href="#">{{ __('messages.tranfdomain') }}</a>
                    <h6 class="collapse-header">{{ __('messages.domainth') }}</h6>
                    <a class="collapse-item" href="{{ route('check.th') }}">{{ __('messages.checkdomainth') }}</a>
                    <a class="collapse-item" href="#">{{ __('messages.regdomainth') }}</a>
                    <a class="collapse-item" href="#">{{ __('messages.tranfdomainth') }}</a>
                </div>
            </div>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('messages.invoice') }}</span></a>
        </li>
        <!-- Nav Item - Tables -->
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ticket" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>{{ __('messages.ticket') }}</span>
            </a>
            <div id="ticket" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="#">{{ __('messages.openticket') }}</a>
                    <a class="collapse-item" href="#">{{ __('messages.histicket') }}</a>
                </div>
            </div>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('messages.payment') }}</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('messages.howto') }}</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">


                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="lang" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                {{ __('messages.credit') }} {{ Auth::user()->credit }} ฿
                            </span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="lang">
                            <a class="dropdown-item" href="#" >{{ __('messages.addcoin') }}</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="lang" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                              @if ( app()->getLocale()  == "th")
                                    <img class="img-profile rounded-circle" src="{{ asset('img/flag/th.png') }} ">  ไทย
                                @elseif ( app()->getLocale()  == "en")
                                    <img class="img-profile rounded-circle" src="{{ asset('img/flag/us.png') }} ">   English
                                @endif
                            </span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="lang">
                            <a class="dropdown-item" href="{{ url('locale/en') }}" ><img src="{{ asset('img/flag/us.png') }} "> English</a>
                            <a class="dropdown-item" href="{{ url('locale/th') }}" ><img src="{{ asset('img/flag/th.png') }} "> ไทย</a>
                        </div>
                    </li>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <img class="img-profile rounded-circle" src="{{ Auth::user()->avatar }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('messages.profile') }}
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('messages.changpass') }}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('messages.logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <!-- Nav Item - User Information -->
                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; SWM.IN.TH 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('asset/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js' )}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('asset/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('asset/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('asset/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('asset/js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js')}} "></script>
    @include('sweet::alert')

</body>
</html>
