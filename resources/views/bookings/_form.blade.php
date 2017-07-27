<div class="form-group{{ $errors->has('kode_trans') ? ' has-error' : '' }}">
	{!! Form::label('kode_trans', 'Kode Booking', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('kode_trans', $kd, ['class'=>'form-control', 'readonly']) !!}
		{!! $errors->first('kode_trans', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
	{!! Form::label('user_id', 'User ID', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('user_id', Auth::user()->id, ['class'=>'form-control', 'readonly']) !!}
		{!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	{!! Form::label('name', 'Nama', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('name', Auth::user()->name, ['class'=>'form-control', 'readonly']) !!}
		{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('parkir_id') ? ' has-error' : '' }}">
	{!! Form::label('parkir_id', 'Parkir ID', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('parkir_id', $data->id, ['class'=>'form-control','readonly']) !!}
		{!! $errors->first('parkir_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('slot') ? ' has-error' : '' }}">
	{!! Form::label('slot', 'Slot Parkir', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('slot', $data->slot, ['class'=>'form-control','readonly']) !!}
		{!! $errors->first('slot', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
	{!! Form::label('harga', 'Harga', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::number('harga', $data->harga, ['class'=>'form-control','readonly']) !!}
		{!! $errors->first('harga', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('posisi') ? ' has-error' : '' }}">
	{!! Form::label('posisi', 'Tipe Kendaraan', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('posisi', $data->posisi, ['class'=>'form-control','readonly']) !!}
		{!! $errors->first('posisi', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('tgl_booking') ? ' has-error' : '' }}">
	<label for="datetimepicker" class="col-md-2 control-label">Tanggal Booking</label>
	<div class="col-md-4">
		{!! Form::text('tgl_booking', null, ['class'=>'form-control tanggal']) !!}
		{!! $errors->first('tgl_booking', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('tgl_keluar') ? ' has-error' : '' }}">
	<label for="datetimepicker" class="col-md-2 control-label">Tanggal Keluar</label>
	<div class="col-md-4">
		{!! Form::text('tgl_keluar', null, ['class'=>'form-control tanggal']) !!}
		{!! $errors->first('tgl_keluar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('perawatan') ? 'has-error' : '' !!}">
	{!! Form::label('perawatan', 'Perawatan Kendaraan', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
    	{{ Form::radio('perawatan', 'Ya',['class'=>'form-control']) }} Ya<br>
		{{ Form::radio('perawatan', 'Tidak',['class'=>'form-control']) }} Tidak<br>
   		{!! $errors->first('perawatan', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-2 col-md-offset-2">
		<button type="submit" class="btn btn-primary">
			<i class="fa fa-btn fa-save"></i> Simpan
		</button>
	</div>
</div>

<pre>
	Note:
	1. Harga Perawatan : {{ $servis->harga }}
	2. Servis yang diberikan : {{ $servis->servis }}

</pre> 

