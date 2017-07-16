@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-lg-10 col-sm-10 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
            <div class="panel-default">
                <div class="panel-heading">
                    Slot Parkir 
                </div>
                <div class="panel-body">
                    @role('member')
                        <div class="row text-center">
                            @foreach($postings as $data)
                                <div class="col-md-3 col-sm-6 hero-feature">
                                    <div class="thumbnail">
                                        @if($data->status=='Available')
                                            <img src="{{ asset('/gambar/open.png') }}" alt="" width="200" height="200">
                                        @else
                                            <img src="{{ asset('/gambar/closed.jpg') }}" alt="" width="200" height="200">
                                        @endif
                                        <div class="caption">
                                            <h3>{{ $data->slot }}</h3>
                                            <p>
                                                Posisi : {{ $data->posisi }}<br>
                                                Harga : {{ $data->harga }} /hari<br>
                                            </p>
                                            <p>
                                                @if($data->status=='Available')
                                                    <a href="{{ route('bookings.show',$data->id) }}" class="btn btn-success">Booking</a>
                                                @else
                                                    <a href="#" class="btn btn-danger disabled">Booked</a>
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