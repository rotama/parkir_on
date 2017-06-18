@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-sm-10 col-lg-10 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title">Booking</h2>
					</div>
					<div class="panel-body">
						{!! Form::open(['url' => route('bookings.store'), 'method' => 'post', 'class'=>'form-horizontal']) !!}
							@include('bookings._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection