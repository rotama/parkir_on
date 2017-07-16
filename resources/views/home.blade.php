@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-lg-10 col-sm-10 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
            <div class="panel-default">
                <div class="panel-heading">
                    Selamat datang {{ Auth::user()->name }}
                </div>
                <div class="panel-body">
                    @role('member')
                        <div class="col-lg-2 col-md-2 col-xs-2 thumb" align="center">
                            <a class="thumbnail" href="{{ url('/home') }}">
                                <i class="fa fa-fw fa-dashboard fa-5x"></i>
                                <h4>Dashboard<br><br></h4>
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-2 thumb" align="center">
                            <a class="thumbnail" href="{{ route('profils.index') }}">
                                <i class="fa fa-fw fa-user fa-5x"></i>
                                <h4>Profil<br><br></h4>
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-2 thumb" align="center">
                            <a class="thumbnail" href="{{ route('bookings.index') }}">
                                <i class="fa fa-fw fa-book fa-5x"></i>
                                <h4>Booking<br><br></h4>
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-2 thumb" align="center">
                            <a class="thumbnail" href="{{ route('bukti_trans.index') }}">
                                <i class="fa fa-fw fa-upload fa-5x"></i>
                                <h4>Upload Bukti Transfer</h4>
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-2 thumb" align="center">
                            <a class="thumbnail" href="{{ route('histories.index') }}">
                                <i class="fa fa-fw fa-history fa-5x"></i>
                                <h4>Data Booking<br><br></h4>
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-2 thumb" align="center">
                            <a class="thumbnail" href="#">
                                <i class="fa fa-fw fa-power-off fa-5x"></i>
                                <h4>Logout<br><br></h4>
                            </a>
                        </div>
                    @endrole
                    @role('admin')
                        <div class="col-lg-2 col-md-2 col-xs-2 thumb" align="center">
                            <a class="thumbnail" href="{{ url('/home') }}">
                                <i class="fa fa-fw fa-dashboard fa-5x"></i>
                                <h4>Dashboard<br><br></h4>
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-2 thumb" align="center">
                            <a class="thumbnail" href="{{ route('users.index') }}">
                                <i class="fa fa-fw fa-user fa-5x"></i>
                                <h4>Data User<br><br></h4>
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-2 thumb" align="center">
                            <a class="thumbnail" href="{{ route('parkirs.index') }}">
                                <i class="fa fa-fw fa-th fa-5x"></i>
                                <h4>Slot Parkir<br><br></h4>
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-2 thumb" align="center">
                            <a class="thumbnail" href="{{ route('dendas.index') }}">
                                <i class="fa fa-fw fa-remove fa-5x"></i>
                                <h4>Denda<br><br></h4>
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-2 thumb" align="center">
                            <a class="thumbnail" href="{{ route('perawatans.index') }}">
                                <i class="fa fa-fw fa-heart fa-5x"></i>
                                <h4>Perawatan<br><br></h4>
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-2 thumb" align="center">
                            <a class="thumbnail" href="{{ route('banks.index') }}">
                                <i class="fa fa-fw fa-dollar fa-5x"></i>
                                <h4>Rekening Bank<br><br></h4>
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-2 thumb" align="center">
                            <a class="thumbnail" href="{{ route('daftar_bookings.index') }}">
                                <i class="fa fa-fw fa-th-list fa-5x"></i>
                                <h4>Daftar Booking<br><br></h4>
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-2 thumb" align="center">
                            <a class="thumbnail" href="{{ route('masterbookings.index') }}">
                                <i class="fa fa-fw fa-book fa-5x"></i>
                                <h4>Data Booking<br><br></h4>
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-2 thumb" align="center">
                            <a class="thumbnail" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off fa-5x"></i>
                                <h4>Logout<br><br></h4>
                            </a>
                        </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>     
@endsection