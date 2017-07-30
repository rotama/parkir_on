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
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Hasil Pencarian
                </div>
                <div class="panel-body">
                    @if (count($masterbookings) > 0)
                            <table class="table table-striped table-hover">
                                <thead>
                                    <th>No. Rek</th>
                                    <th>Tanggal Booking</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Nama</th>
                                    <th>Slot</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                @foreach($masterbookings as $masterbookings)
                                    <tr>
                                        <td>{{ $masterbookings->kode_trans }}</td>
                                        <td>{{ $masterbookings->tgl_booking }}</td>
                                        <td>{{ $masterbookings->tgl_keluar }}</td>
                                        <td>{{ $masterbookings->user->name }}</td>
                                        <td>{{ $masterbookings->parkir->slot }}</td>
                                        <td>{{ $masterbookings->status }}</td>
                                    </tr>                                    
                                </tbody>
                            </table>
                        @endforeach
                        <h4>Rincian Biaya</h4>
                        <table class="table table-striped table-hover">
                            @if($masterbookings->perawatan=='Ya')
                            <tr>
                                <td>Biaya Perawatan</td>
                                <td>Rp. {{ number_format($hrg_perawatan,2) }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td>Lama Parkir</td>
                                <td>{{ $lama }} hari</td>
                            </tr>
                            <tr>
                                <td>Tanggal meninggalkan tempat parkir</td>
                                @if(count($keluar) > 0)
                                    <td>{{ $keluar->tgl_kel }}</td>
                                @else
                                    <td>-</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Harga Parkir/hari</td>
                                <td>Rp. {{ number_format($masterbookings->parkir->harga,2) }}</td>
                            </tr>
                            @if($masterbookings->perawatan == 'Ya')
                            <tr>
                                <td>Biaya Perawatan</td>
                                <td>Rp. {{ number_format($hrg_perawatan,2) }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td>Biaya Denda/hari</td>
                                @if(count($keluar) > 0)
                                    <td>{{ $hrg_denda }}</td>
                                @else
                                    <td>-</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Keterlambatan</td>
                                @if(count($keluar) > 0 AND $keluar->keterlambatan > 0)
                                    <td class="danger"><font color="red">{{ $keluar->keterlambatan }} hari </font></td>
                                @else
                                    <td>0 Hari</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Kena Biaya Denda</td>
                                @if(count($ada_denda) > 0 AND $keluar->keterlambatan > 0)
                                    <td class="danger"><font color="red">Rp. {{ number_format($denda,2) }}</font></a></td>
                                @else
                                    <td>Rp. 0</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Total Bayar</td>
                                <td>Rp. {{ number_format($total,2) }}</td>
                            </tr>
                        </table>
                    @else 
                    Data tidak ditemukan.
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    @endif
                </div>
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