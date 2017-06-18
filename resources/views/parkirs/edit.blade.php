@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-sm-10 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title">Edit Slot Parkir</h2>
					</div>
					<div class="panel-body">
						{!! Form::model($parkir, ['url' => route('parkirs.update', $parkir->id),'method' => 'put', 'files'=>'true', 'class'=>'form-horizontal']) !!}
							@include('parkirs._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection