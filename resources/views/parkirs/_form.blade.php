<div class="form-group{{ $errors->has('slot') ? ' has-error' : '' }}">
	{!! Form::label('slot', 'Slot Parkir', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('slot', null, ['class'=>'form-control']) !!}
		{!! $errors->first('slot', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
	{!! Form::label('harga', 'Harga', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::number('harga', null, ['class'=>'form-control']) !!}
		{!! $errors->first('harga', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('posisi') ? ' has-error' : '' }}">
	{!! Form::label('posisi', 'Posisi', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('posisi', null, ['class'=>'form-control']) !!}
		{!! $errors->first('posisi', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-2 col-md-offset-2">
		<button type="submit" class="btn btn-primary">
			<i class="fa fa-btn fa-file"></i> Simpan
		</button>
	</div>
</div>