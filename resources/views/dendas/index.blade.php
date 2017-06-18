@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-sm-10 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title">Input Harga Denda</h2>
					</div>
					<div class="panel-body">
						{!! Form::open(['url' => route('dendas.store'), 'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
							<div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
								{!! Form::label('harga', 'Harga', ['class'=>'col-md-2 control-label']) !!}
								<div class="col-md-4">
									{!! Form::number('harga', null, ['class'=>'form-control']) !!}
									{!! $errors->first('harga', '<p class="help-block">:message</p>') !!}
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-2 col-md-offset-2">
									<button type="submit" class="btn btn-primary">
										Input
									</button>
								</div>
							</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection