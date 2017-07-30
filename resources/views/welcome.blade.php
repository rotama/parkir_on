@extends('layouts.app')

@section('content')
    <!-- Title -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert alert-mute">
                <div class="text-center">
                    {{ Html::image(asset('images/logo_parkir.png'),null, array('width'=>'75','height'=>'65px')) }} 
                    <strong>
                        <h1>
                            {{ Html::image(asset('images/car-icon.png'),null, array('width'=>'55','height'=>'40px')) }}
                            www.parkir-online.com
                            {{ Html::image(asset('images/motor-icon.png'),null, array('width'=>'55','height'=>'40px')) }}
                        </h1>
                    </strong>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-lg-8 col-sm-8">
            <div id="carousel-id" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-id" data-slide-to="0" class=""></li>
                    <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item">
                        {{ Html::image(asset('images/park_mobil.jpg'),'first slide', array('width'=>'100%','class'=>'img-rounded img-responsive')) }}
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>www.parkir-online.com</h1>
                                <p>Keamanan kendaraan Anda adalah Prioritas Kami </p>
                                <p>Tidak perlu takut untuk berpergian jauh meninggalkan kendaaran anda, karena kami menyediakan tempat parkir, yang bisa anda booking secara online</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        {{ Html::image(asset('images/Ingin-Parkir-Dengan-Benar-Ikuti-5-Tips-Ini.jpg'),'first slide', array('width'=>'100%','class'=>'img-rounded img-responsive')) }}
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>www.parkir-online.com</h1>
                                <p>Keamanan kendaraan Anda adalah Prioritas Kami </p>
                                <p>Tidak perlu takut untuk berpergian jauh meninggalkan kendaaran anda, karena kami menyediakan tempat parkir, yang bisa anda booking secara online</p>
                            </div>
                        </div>
                    </div>
                    <div class="item active">
                        {{ Html::image(asset('images/parkir motor.jpg'),'first slide', array('width'=>'100%','height'=>'100%')) }}
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>www.parkir-online.com</h1>
                                <p>Keamanan kendaraan Anda adalah Prioritas Kami </p>
                                <p>Tidak perlu takut untuk berpergian jauh meninggalkan kendaaran anda, karena kami menyediakan tempat parkir, yang bisa anda booking secara online</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Info Status Booking
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => url('slots/cari'), 'method' => 'post', 'class'=>'form-horizontal']) !!}
                        <div class="form-group{{ $errors->has('kode_trans') ? ' has-error' : '' }}">
                            {!! Form::label('kode_trans', 'Kode Booking', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('kode_trans', null, ['class'=>'form-control']) !!}
                                {!! $errors->first('kode_trans', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-search"></i> Cari
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    No. Rek kami
                </div>
                <div class="panel-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.Rek</th>
                                    <th>Atas Nama</th>
                                    <th>Nama Bank</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($a as $data)
                                    <tr>
                                        <td>{{ $data->no_rek }}</td>
                                        <td>{{ $data->atas_nama }}</td>
                                        <td>{{ $data->nm_bank }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <hr>
@endsection