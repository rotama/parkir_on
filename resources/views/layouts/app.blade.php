<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Parkir Online') }}</title>

    <!-- Styles -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link href="{{ asset('/css/heroic-features.css') }}" rel="stylesheet" type="text/css">
    
    <link href="{{ asset('/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" media="screen">

</head>
<body>
    <div id="app">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    @if(Auth::guest())
                        <a class="navbar-brand active" href="{{ url('/') }}">www.parkir-online.com</a>
                    @else
                        <a class="navbar-brand" href="{{ url('/home') }}">www.parkir-online.com</a>
                    @endif
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    @role('admin')
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#">Beranda</a>
                        </li>
                        <li>
                            <a href="#">About Us</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                    </ul>
                    @endrole
                    @role('member')
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ url('/no_reks/index') }}">No Rekening</a>
                        </li>
                    </ul>
                    @endrole
                    @if(Auth::guest())
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ url('/slots') }}">Slot Parkir</a>
                        </li>
                        <li>
                            <a href="#">About Us</a>
                        </li>
                    </ul>
                    @endif
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        
        @role('admin')
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="{{ url('/home') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#master"><i class="fa fa-fw fa-folder-open"></i> Master Data<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="master" class="collapse">
                            <li>
                                <a href="{{ route('users.index') }}"><i class="fa fa-fw fa-user"></i> Data User</a>
                            </li>
                            <li>
                                <a href="{{ route('parkirs.index') }}"><i class="fa fa-fw fa-th"></i> Slot Parkir</a>
                            </li>
                            <li>
                                <a href="{{ route('dendas.index') }}"><i class="fa fa-fw fa-envelope"></i> Denda</a>
                            </li>
                            <li>
                                <a href="{{ route('perawatans.index') }}"><i class="fa fa-fw fa-heart"></i> Perawatan</a>
                            </li>
                            <li>
                                <a href="{{ route('banks.index') }}"><i class="fa fa-fw fa-dollar"></i> Rekening Bank</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('daftar_bookings.index') }}"><i class="fa fa-fw fa-th-list"></i> Daftar Booking</a>
                    </li>
                    <li>
                        <a href="{{ route('masterbookings.index') }}"><i class="fa fa-fw fa-book"></i> Master Data Booking</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-power-off"></i> 
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
            
        @endrole
        @role('member')
             <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="{{ url('/home') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('profils.index') }}"><i class="fa fa-fw fa-user"></i> Profil</a>
                    </li>
                    <li>
                        <a href="{{ route('bookings.index') }}"><i class="fa fa-fw fa-book"></i> Booking</a>
                    </li>
                    <li>
                        <a href="{{ route('bukti_trans.index') }}"><i class="fa fa-fw fa-upload"></i> Upload Bukti Transfer</a>
                    </li>
                    <li>
                        <a href="{{ route('histories.index') }}"><i class="fa fa-fw fa-history"></i> Data Booking</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-power-off"></i> 
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        @endrole

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-lg-10 col-sm-10 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
                    @include('layouts._flash')
                </div>
            </div>
        </div>
        <div class="container-fluid">
            @yield('content')
        </div>
        @if(Auth::guest())
        <nav class="navbar navbar-inverse" style="margin-bottom:0px;margin-top:10px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-3">
                        <h4>Information</h4>
                        <ul class="row">
                            <li class="col-lg-12 col-sm-12 col-xs-3"><a href="about.php">About</a></li>
                            <li class="col-lg-12 col-sm-12 col-xs-3"><a href="agents.php">Agents</a></li>         
                            <li class="col-lg-12 col-sm-12 col-xs-3"><a href="blog.php">Blog</a></li>
                            <li class="col-lg-12 col-sm-12 col-xs-3"><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
            
                    <div class="col-lg-3 col-sm-3">
                        <h4>Newsletter</h4>
                        <p>Get notified about the latest properties in our marketplace.</p>
                        <form class="form-inline" role="form">
                            <input type="text" placeholder="Enter Your email address" class="form-control">
                            <button class="btn btn-success" type="button">Send</button>
                        </form>
                    </div>
            
                    <div class="col-lg-3 col-sm-3">
                        <h4>Follow us</h4>
                        <a href="#"><img src="{{ asset('/images/facebook.png') }}" alt="facebook"></a>
                        <a href="#"><img src="{{ asset('/images/twitter.png') }}" alt="twitter"></a>
                        <a href="#"><img src="{{ asset('/images/linkedin.png') }}" alt="linkedin"></a>
                        <a href="#"><img src="{{ asset('/images/instagram.png') }}" alt="instagram"></a>
                    </div>

                    <div class="col-lg-3 col-sm-3">
                        <h4>Contact us</h4>
                        <p><b>Parkir-Online</b><br>
                        <span class="glyphicon glyphicon-map-marker"></span> Bandung, Jl.Sulaksana<br>
                        <span class="glyphicon glyphicon-envelope"></span> parkirsonline@gmail.com<br>
                        <span class="glyphicon glyphicon-earphone"></span> (123) 456-7890</p>
                    </div>
                </div>
                <br>
                <center><h5><b><p class="copyright">Copyright 2013. All rights reserved.    </p></b></h5></center><br>
            </div>
        
        </nav>
        @else

        @endif
        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/js/moment.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/custom.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.tanggal').datetimepicker({
                format: "yyyy-mm-dd hh:ii",
                autoclose:true
            });
        });

    </script>
    @yield('scripts')
</body>
</html>
