@extends('layout.main')
@section('contents')

	@if ($alert = Session::get('error'))
		<div class="alert alert-dismissible alert-warning m-5">
			<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
			<h4 class="alert-heading">Mohon maaf</h4>
			<p class="mb-0">{{ $alert }}</a>.</p>
		</div>
	@endif

	<div class="card m-5">
		<div class="card-header">
			<h3>Daftar</h3>
		</div>
		<div class="card-body">
			<form method="post" action="{{ route('doregist') }}">
				@csrf
				<div class="row">
			        <div class="col-xs-6 col-sm-6 col-md-6">
			            <div class="form-group">
			                <strong>Nama </strong>
			                <input id="val_username" type="text" name="name" class="form-control" placeholder="username" required>
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-6 col-md-6">
			            <div class="form-group">
			                <strong>Email </strong>
			                <input id="val_email" type="email" name="email" class="form-control" placeholder="email" required>
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-6 col-md-6">
			            <div class="form-group">
			                <strong>Passowrd </strong>
			                <input id="val_password" type="password" name="password" class="form-control" placeholder="password" required>
			            </div>
			        </div>
			         <div class="col-xs-6 col-sm-6 col-md-6">
			            <div class="form-group">
			                <strong>Confirm Passowrd </strong>
			                <input type="password" name="cnfrpassword" class="form-control" placeholder="confirm password" required>
			            </div>
			        </div>
			        <div class="form-group row mb-0 mt-2">
			        	<div class="col-md-12 offset-md-12 d-grid ">
			        		<button type="submit" class="btn btn-primary btn-lg">daftar</button>
			        	</div>
			        </div>
			    </div>
			</form>
		</div>
	</div>

@endsection