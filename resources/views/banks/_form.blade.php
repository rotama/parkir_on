<div class="form-group{{ $errors->has('no_rek') ? ' has-error' : '' }}">
	{!! Form::label('no_rek', 'No. Rekening', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('no_rek', null, ['class'=>'form-control']) !!}
		{!! $errors->first('no_rek', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('atas_nama') ? ' has-error' : '' }}">
	{!! Form::label('atas_nama', 'Atas Nama', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('atas_nama', null, ['class'=>'form-control']) !!}
		{!! $errors->first('atas_nama', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('nm_bank') ? ' has-error' : '' }}">
	{!! Form::label('nm_bank', 'Nama Bank', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nm_bank', null, ['class'=>'form-control']) !!}
		{!! $errors->first('nm_bank', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-2 col-md-offset-2">
		<button type="submit" class="btn btn-primary">
			<i class="fa fa-btn fa-file"></i> Simpan
		</button>
	</div>
</div>