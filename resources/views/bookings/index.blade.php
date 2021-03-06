@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-lg-10 col-sm-10 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Slot Parkir 
                </div>
                <div class="panel-body">
                    @role('member')
                        <div class="row text-center">
                            @foreach($postings as $data)
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
                                <a href="{{ route('bookings.show',$data->id) }}" class="btn btn-success">Booking</a>
                            @else
                                <a href="{{ url('/login') }}" class="btn btn-danger">Booked</a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
                        </div>
                    @endrole
                    @role('admin')
                        
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>     
@endsection