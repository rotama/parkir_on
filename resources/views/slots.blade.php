@extends('layouts.app')

@section('content')
    <!-- Title -->
    <div class="row">
        <div class="col-lg-12">
            <h3>Slot Parkir</h3>
        </div>
    </div>
    <!-- /.row -->
    
    <!-- Page Features -->
    <div class="container">
        <div class="row text-center">
            @foreach($a as $data)
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    @if($data->posisi=='Mobil')
                        <img src="{{ asset('/images/31126.png') }}" alt="" width="82" height="82">
                    @else
                        <img src="{{ asset('/images/motor-icon.png') }}" alt="" width="100" height="100">
                    @endif
                    <div class="caption">
                        <h3>{{ $data->slot }}</h3>
                        <p>
                            Tipe Kendaraan : {{ $data->posisi }}<br>
                            Harga : {{ $data->harga }} /hari<br>
                        </p>
                        <p>
                            @if($data->status=='Available')
                                <a href="{{ url('/login') }}" class="btn btn-success">Booking</a>
                            @else
                                <a href="{{ url('/login') }}" class="btn btn-danger">Booked</a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    <hr>
@endsection