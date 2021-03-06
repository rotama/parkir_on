@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-sm-10 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title">Upload Bukti Transfer</h2>
					</div>
					<div class="panel-body">
						{!! Form::open(['url' => route('bukti_trans.store'), 'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
							<div class="form-group{{ $errors->has('tgl_upload') ? ' has-error' : '' }}">
								{!! Form::label('tgl_upload', 'Tanggal Upload', ['class'=>'col-md-2 control-label']) !!}
								<div class="col-md-4">
									{!! Form::text('tgl_upload', $tanggal, ['class'=>'form-control', 'readonly']) !!}
									{!! $errors->first('tgl_upload', '<p class="help-block">:message</p>') !!}
								</div>
							</div>
							<div class="form-group{{ $errors->has('bukti_id') ? ' has-error' : '' }}">
								{!! Form::label('bukti_id', 'Kode Booking', ['class'=>'col-md-2 control-label']) !!}
								<div class="col-md-4">
									{!! Form::select('bukti_id',\App\Booking::select('kode_trans')->where('user_id',$user_id)->where('status','Belum Transfer')->pluck('kode_trans', 'kode_trans')->toArray(), null, ['class'=>'form-control']) !!}
									{!! $errors->first('bukti_id', '<p class="help-block">:message</p>') !!}
								</div>
							</div>
							<div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
								{!! Form::label('gambar', 'Bukti Transfer', ['class'=>'col-md-2 control-label']) !!}
								<div class="col-md-4">
									{!! Form::file('gambar') !!}
									{!! $errors->first('gambar', '<p class="help-block">:message</p>') !!}
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-2 col-md-offset-2">
									<button type="submit" class="btn btn-primary">
										Simpan
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