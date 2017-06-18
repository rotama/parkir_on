<div class="form-group{{ $errors->has('kode_trans') ? ' has-error' : '' }}">
	{!! Form::label('kode_trans', 'Kode Booking', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('kode_trans', $daftar_bookings->kode_trans, ['class'=>'form-control','readonly']) !!}
		{!! $errors->first('kode_trans', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('tgl_booking') ? ' has-error' : '' }}">
	{!! Form::label('tgl_booking', 'Tanggal Booking', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('tgl_booking', $daftar_bookings->tgl_booking, ['class'=>'form-control','readonly']) !!}
		{!! $errors->first('tgl_booking', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('tgl_keluar') ? ' has-error' : '' }}">
	{!! Form::label('tgl_keluar', 'Tanggal Keluar', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('tgl_keluar', $daftar_bookings->tgl_keluar, ['class'=>'form-control','readonly']) !!}
		{!! $errors->first('tgl_keluar', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('slot') ? ' has-error' : '' }}">
	{!! Form::label('slot', 'Slot Parkir', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('slot', $daftar_bookings->parkir->slot, ['class'=>'form-control','readonly']) !!}
		{!! $errors->first('slot', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	{!! Form::label('name', 'Nama Customer', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('name', $daftar_bookings->user->name, ['class'=>'form-control','readonly']) !!}
		{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('perawatan') ? ' has-error' : '' }}">
	{!! Form::label('perawatan', 'Perawatan', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('perawatan', $daftar_bookings->perawatan, ['class'=>'form-control','readonly']) !!}
		{!! $errors->first('perawatan', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('bukti_trans') ? ' has-error' : '' }}">
	{!! Form::label('bukti_trans', 'Bukti Transfer', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		@if(count($tmp_gmbr) > 0)
			{!! Html::image(asset('img/'.$tmp_gmbr->gambar), null, ['class'=>'img-rounded img-responsive']) !!}
		@else
			Belum Melakukan Transfer
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('hrg_perawatan') ? ' has-error' : '' }}">
	{!! Form::label('hrg_perawatan', 'Harga Perawatan', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::number('hrg_perawatan', $hrg_perawatan, ['class'=>'form-control','readonly']) !!}
		{!! $errors->first('hrg_perawatan', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('hrg_parkir') ? ' has-error' : '' }}">
	{!! Form::label('hrg_parkir', 'Harga Parkir/hari', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::number('hrg_parkir', $hrg_parkir, ['class'=>'form-control','readonly']) !!}
		{!! $errors->first('hrg_parkir', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
	{!! Form::label('total', 'Total Bayar', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::number('total', $total, ['class'=>'form-control','readonly']) !!}
		{!! $errors->first('total', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group {!! $errors->has('status') ? 'has-error' : '' !!}">
	{!! Form::label('status', 'Status Pembayaran', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
    	{{ Form::select('status', [
   			'Belum Transfer' => 'Belum Transfer',
   			'Sudah Transfer' => 'Sudah Transfer',
   			'Approved' => 'Approved',
   			'Masuk' => 'Masuk',
   			'Keluar' => 'Keluar',
   			'Dibatalkan' => 'Batalkan',
   			],$daftar_bookings->status,['class'=>'form-control']
   		)}}
   		{!! $errors->first('status', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-2 col-md-offset-2">
		<button type="submit" class="btn btn-primary">
			<i class="fa fa-btn fa-confirm"></i> Konfirmasi
		</button>
	</div>
</div>