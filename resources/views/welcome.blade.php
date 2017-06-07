@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    
    <!-- Jumbotron Header -->
    <header class="jumbotron hero-spacer">
        <h1>Welcome to Parkir Online!</h1>
        <p>Parkir Kendaraan menjadi mudah, Silahkan Booking</p>
        <p><a class="btn btn-primary btn-large">Call to action!</a></p>
    </header>
    <hr>
    
    <!-- Title -->
    <div class="row">
        <div class="col-lg-12">
            <h3>Slot Parkir</h3>
        </div>
    </div>
    <!-- /.row -->
    
    <!-- Page Features -->
    <div class="row text-center">
        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="{{ asset('/gambar/open.png') }}" alt="" width="200" height="200">
                <div class="caption">
                    <h3>GR-001</h3>
                    <p>
                        Posisi : Lt. 1<br>
                        Harga : 50000 /hari<br>
                    </p>
                    <p>
                        <a href="#" class="btn btn-success">Booking</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="{{ asset('/gambar/open.png') }}" alt="" width="200" height="200">
                <div class="caption">
                    <h3>GR-002</h3>
                    <p>
                        Posisi : Lt. 1<br>
                        Harga : 50000 /hari<br>
                    </p>
                    <p>
                        <a href="#" class="btn btn-success">Booking</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="{{ asset('/gambar/closed.jpg') }}" alt="" width="200" height="200">
                <div class="caption">
                    <h3>GR-003</h3>
                    <p>
                        Posisi : Lt. 1<br>
                        Harga : 50000 /hari<br>
                    </p>
                    <p>
                        <a href="#" class="btn btn-danger">Booked</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="{{ asset('/gambar/open.png') }}" alt="" width="200" height="200">
                <div class="caption">
                    <h3>GR-004</h3>
                    <p>
                        Posisi : Lt. 1<br>
                        Harga : 50000 /hari<br>
                    </p>
                    <p>
                        <a href="#" class="btn btn-success">Booking</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="{{ asset('/gambar/open.png') }}" alt="" width="200" height="200">
                <div class="caption">
                    <h3>GR-005</h3>
                    <p>
                        Posisi : Lt. 2<br>
                        Harga : 100000 /hari<br>
                    </p>
                    <p>
                        <a href="#" class="btn btn-success">Booking</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="{{ asset('/gambar/closed.jpg') }}" alt="" width="200" height="200">
                <div class="caption">
                    <h3>GR-006</h3>
                    <p>
                        Posisi : Lt. 2<br>
                        Harga : 100000 /hari<br>
                    </p>
                    <p>
                        <a href="#" class="btn btn-danger">Booked</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="{{ asset('/gambar/closed.jpg') }}" alt="" width="200" height="200">
                <div class="caption">
                    <h3>GR-007</h3>
                    <p>
                        Posisi : Lt. 2<br>
                        Harga : 100000 /hari<br>
                    </p>
                    <p>
                        <a href="#" class="btn btn-danger">Booked</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="{{ asset('/gambar/open.png') }}" alt="" width="200" height="200">
                <div class="caption">
                    <h3>GR-008</h3>
                    <p>
                        Posisi : Lt. 2<br>
                        Harga : 100000 /hari<br>
                    </p>
                    <p>
                        <a href="#" class="btn btn-success">Booking</a>
                    </p>
                </div>
            </div>
        </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{{ asset('/gambar/closed.jpg') }}" alt="" width="200" height="200">
                    <div class="caption">
                        <h3>GR-009</h3>
                        <p>
                            Posisi : Lt. 3<br>
                            Harga : 150000 /hari<br>
                        </p>
                        <p>
                            <a href="#" class="btn btn-danger">Booked</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{{ asset('/gambar/open.png') }}" alt="" width="200" height="200">
                    <div class="caption">
                        <h3>GR-010</h3>
                        <p>
                            Posisi : Lt. 3<br>
                            Harga : 150000 /hari<br>
                        </p>
                        <p>
                            <a href="#" class="btn btn-success">Booking</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        


@endsection