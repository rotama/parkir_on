{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm'=>$confirm_message]) !!}
		<a href="{{ $confirm_url }}">detail</a>
	{!! Form::submit('Batalkan', ['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close()!!}
