@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-lg-10 col-sm-10 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">My Profile</h2>
					</div>
					<div class="panel-body">
						<Table class="table table-striped table-hover table-bordered">
							<tr>
            					<td>ID</td>
								<td>{{ $tampil->user_id }}</td>
        					</tr>
        					<tr>
            					<td>Nama</td>
								<td>{{ $tampil->user->name }}</td>
        					</tr>
        					<tr>
            					<td>Email</td>
								<td>{{ $tampil->user->email }}</td>
        					</tr>
        					<tr>
            					<td>Status</td>
								<td>{{ $tampil->role->name }}</td>
        					</tr>
        					<tr>
            					<td colspan="2">
	            					<p> 
	            						<a class="btn btn-primary" href="{{ route('profils.edit',$tampil->user_id) }}">Ubah Profile</a> 
	            						<a class="btn btn-success" href="{{ url('/settings/password') }}">Ubah Password</a>	
	            					</p>
            					</td>
        					</tr>
						</Table>					
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
