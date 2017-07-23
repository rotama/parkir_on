@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-lg-10 col-sm-10 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
            <div class="panel-default">
                <div class="panel-heading">
                    Silahkan melakukan Transfer Pembayaran
                </div>
                <div class="panel-body">
                        <div class="row">
                            <Table class="table table-striped table-hover table-bordered">
                                <tr>
                                    <td>Kode Booking</td>
                                    <td>@if(session('kode_trans')) {{ session('kode_trans') }} @endif</td>
                                </tr>
                                <tr>
                                    <td>Pemesan</td>
                                    <td>@if(session('nama')) {{ session('nama') }} @endif</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Booking</td>
                                    <td>@if(session('tgl_booking')) {{ session('tgl_booking') }} @endif</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Keluar</td>
                                    <td>@if(session('tgl_keluar')) {{ session('tgl_keluar') }} @endif</td>
                                </tr>
                                <tr>
                                    <td>Slot Parkir</td>
                                    <td>@if(session('slot')) {{ session('slot') }} @endif</td>
                                </tr>
                                <tr>
                                    <td>Harga Parkir /hari</td>
                                    <td>@if(session('hrg_parkir')) Rp. {{ number_format(session('hrg_parkir'),2) }} @endif</td>
                                </tr>
                                <tr>
                                    <td>Lama Parkir</td>
                                    <td>@if(session('selisihbaru')) {{ session('selisihbaru') }} @endif hari</td>
                                </tr>
                                @if(session('servis')=='Ya')
                                <tr>
                                    <td>Biaya Perawatan</td>
                                    <td>@if(session('hrg_perawatan')) Rp. {{ number_format(session('hrg_perawatan'),2) }} @endif</td>
                                </tr>
                                @endif
                                <tr>
                                    <td>Total Biaya</td>
                                    <td>@if(session('transfer')) Rp. {{ number_format(session('transfer'),2) }} @endif</td>
                                </tr>
                            </Table>
                            <table class="table table-hover table-bordered table-stripped">
                                <thead>
                                    <tr>
                                        <th>
                                            No. Rekening
                                        </th>
                                        <th>
                                            Atas Nama
                                        </th>
                                        <th>
                                            Nama Bank
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($postings as $data)
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
</div>     
@endsection