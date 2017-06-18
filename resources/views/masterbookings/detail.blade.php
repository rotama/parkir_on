@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-lg-10 col-sm-10 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Detail</h2>
					</div>
					<div class="panel-body">
						<Table class="table table-striped table-hover table-bordered">
							<tr>
            					<td>No Booking</td>
								<td>{{ $masterbookings->kode_trans }}</td>
        					</tr>
        					<tr>
            					<td>Pemesan</td>
								<td>{{ $masterbookings->user->name }}</td>
        					</tr>
        					<tr>
            					<td>Tanggal Booking</td>
								<td>{{ $masterbookings->tgl_booking }}</td>
        					</tr>
        					<tr>
            					<td>Tanggal Keluar</td>
								<td>{{ $masterbookings->tgl_keluar }}</td>
        					</tr>
        					<tr>
            					<td>Slot Parkir</td>
								<td>{{ $masterbookings->parkir->slot }}</td>
        					</tr>
        					<tr>
            					<td>Perawatan Kendaraan</td>
								<td>{{ $masterbookings->perawatan }}</td>
        					</tr>
        					<tr>
            					<td>Status</td>
								<td>{{ $masterbookings->status }}</td>
        					</tr>
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
								<td>{{ $masterbookings->parkir->harga }}</td>
        					</tr>
        					<tr>
            					<td>Biaya Perawatan</td>
								<td>{{ $hrg_perawatan }}</td>
        					</tr>
                            <tr>
                                <td>Biaya Denda/hari</td>
                                <td>{{ $hrg_denda }}</td>
                            </tr>
                            <tr>
                                <td>Keterlambatan</td>
                                @if(count($keluar) > 0)
                                    <td>{{ $keluar->keterlambatan }}</td>
                                @else
                                    <td>-</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Total Denda</td>
                                @if(count($ada_denda) > 0)
                                    <td>{{ $keluar->denda }}</td>
                                @else
                                    <td>-</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Total Bayar</td>
                                <td>{{ $total }}</td>
                            </tr>
						</Table>					
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
