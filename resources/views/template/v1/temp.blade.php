<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="author" content="HD Solution">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('csrf_header')
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/assets/v2/images/favicon.ico') }}">
    <title>@yield('title_bar')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('public/assets/v2') }}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ URL::asset('public/assets/v2') }}/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{ URL::asset('public/assets/v2') }}/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ URL::asset('public/assets/v2') }}/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- External Css -->
    @yield('css')
    <link href="{{ URL::asset('public/assets/v2') }}/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ URL::asset('public/assets/v2') }}/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>


    <body class="fix-header">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <!-- .Logo -->
                <div class="top-left-part">
                    <a class="logo" href="index.html">
                        <!--This is logo icon--><img src="{{ asset('public/assets/v2') }}/plugins/images/dprd.jpeg" alt="home" class="light-logo" width="55px" /></a>
                </div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li>
                        <a href="javascript:void(0)" class="logotext">
                            {{ config('app.name') }}
                        </a>
                    </li>
                </ul>
                <!-- /.Logo -->
                <!-- top right panel -->
                <ul class="nav navbar-top-links navbar-right pull-right">

                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="{{ asset('public/assets/v2') }}/plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ strtoupper($user->penanggung_jawab) }}</b> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li><a href="{{ url('password') }}/{{ $user->id }}/edit"><i class="ti-settings"></i> Ganti Password</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}" title="Logout"
                    data-close="true"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    {{ __('Logout') }}><i class="fa fa-power-off"></i> Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->

                </ul>
                <!-- top right panel -->
            </div>
        </nav>
        <!-- End Top Navigation -->

     <div class="side-mini-panel">
            <ul class="mini-nav">
                <div class="togglediv"><a href="javascript:void(0)" id="togglebtn"><i class="ti-menu"></i></a></div>
                <!-- .Dashboard -->
                <li class="selected">
                    <a href="javascript:void(0)"><i class="linea-icon linea-basic" data-icon="v"></i></a>
                    <div class="sidebarmenu">
                        <!-- Left navbar-header -->
                        <h3 class="menu-title">MENU</h3>

                        <ul class="sidebar-menu">
                            <li><a href="{{ url('dashboard') }}">DASHBOARD</a></li>

                            @if($user->level == "admin")
                                <li class="menu">
                                    <a href="{{ url('manajemen-user') }}"> <span>MANAJEMEN USER</span> </a>
                                </li>
                            @endif


                            @if($user->level == "protokoler")
                            <li class="menu">
                                <a href="{{ url('protokoler/surat-tugas') }}"> <span>PERJALANAN DINAS</span>  </a>
                            </li>
                    @endif

                    @if($user->level == "keuangan")
                    <li class="menu">
                        <a href="javascript:void(0)"> <span>LAPORAN PERJALANAN DINAS</span> <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="sub-menu">
                            <li><a href="{{ url('keuangan/laporan-perjalanan-dinas/a') }}">Komisi A</a></li>
                            <li><a href="{{ url('keuangan/laporan-perjalanan-dinas/b') }}">Komisi B</a></li>
                            <li><a href="{{ url('keuangan/laporan-perjalanan-dinas/c') }}">Komisi C</a></li>
                            <li><a href="{{ url('keuangan/laporan-perjalanan-dinas/d') }}">Komisi D</a></li>
                        </ul>
                    </li>
                    @endif


                    @if($user->level == "bendahara")
                    <li class="menu">
                        <a href="javascript:void(0)"> <span>LAPORAN PERJALANAN DINAS</span> <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="sub-menu">
                            <li><a href="{{ url('bendahara/laporan-perjalanan-dinas/a') }}">Komisi A</a></li>
                            <li><a href="{{ url('bendahara/laporan-perjalanan-dinas/b') }}">Komisi B</a></li>
                            <li><a href="{{ url('bendahara/laporan-perjalanan-dinas/c') }}">Komisi C</a></li>
                            <li><a href="{{ url('bendahara/laporan-perjalanan-dinas/d') }}">Komisi D</a></li>
                        </ul>
                    </li>
                    @endif



                    @if($user->level == "komisi")
                    <li>
                        <a href="{{ url('komisi/laporan-perjalanan-dinas') }}">LAPORAN PERJALANAN DINAS</a>
                    </li>
                    @endif

                    @if($user->level == "komisi")
                        <li><a href="{{ url('jadwal-sidang') }}">JADWAL SIDANG</a></li>
                    @endif

                    @if($user->level == "admin" or $user->level == "ketua" or $user->level == "wakil")
                        <li><a href="{{ url('data-komisi') }}">DATA KOMISI</a></li>
                    @endif

                    @if($user->level == "komisi")
                        <li><a href="{{ url('anggota-komisi') }}">ANGGOTA KOMISI</a></li>
                    @endif

                        </ul>
                        <!-- Left navbar-header end -->
                    </div>
                </li>
                <!-- /.Dashboard -->

            </ul>
        </div>
        <!-- /.Side panel -->

    @yield('konten')

    <footer class="footer text-center">  <?= date('Y') ?> &copy; HD Solution </footer>
        </div>


    </div>

    <!-- jQuery -->
    <script src="{{ asset('public/assets/v2') }}/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('public/assets/v2') }}/bootstrap/dist/js/tether.min.js"></script>
    <script src="{{ asset('public/assets/v2') }}/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/assets/v2') }}/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ asset('public/assets/v2') }}/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="{{ asset('public/assets/v2') }}/js/waves.js"></script>

    @yield('js')

    <script src="{{ asset('public/assets/v2') }}/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    @yield('myscript')

</body>

</html>
