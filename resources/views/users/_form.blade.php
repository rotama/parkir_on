<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	{!! Form::label('name', 'Nama', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('name', null, ['class'=>'form-control']) !!}
		{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	{!! Form::label('email', 'Alamat Email', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::email('email', null, ['class'=>'form-control']) !!}
		{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	{!! Form::label('password', 'Password', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::password('password', ['class'=>'form-control']) !!}
		{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
	{!! Form::label('password_confirmation', 'Konfirmasi Password', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
		{!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
	{!! Form::label('id', 'Pilih Status', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{{ Form::select('id',\App\Role::select('id','display_name')->pluck('display_name', 'id')->toArray(),null,['placeholder' => '--Pilih Status--', 'class'=>'form-control'])}}
		{!! $errors->first('id', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-2 col-md-offset-2">
		<button type="submit" class="btn btn-primary">
			<i class="fa fa-btn fa-file"></i> Simpan
		</button>
	</div>
</div>