@extends('layouts.app')

@section('content')

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
                    <a href="#"><i class="fa fa-fw fa-th"></i> Slot Parkir</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Denda</a
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-heart"></i> Perawatan</a
                </li>
            </ul>
        </li>
        <li>
            <a href="tables.html"><i class="fa fa-fw fa-th-list"></i> Bookings</a>
        </li>
        <li>
            <a href="tables.html"><i class="fa fa-fw fa-file"></i> Bukti Transfer</a>
        </li>
        <li>
            <a href="forms.html"><i class="fa fa-fw fa-book"></i> Data Transaksi</a>
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
<div class="container container-fluid">
    <div class="row">
        <div class="col-md-10 col-lg-10 col-sm-10 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
            <div class="panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>
                <div class="panel-body">
                    Selamat Datang {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>     
@endsection
