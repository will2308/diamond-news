@extends('layout.main')
@section('contents')

	<div class="card m-5">
		<div class="card-header">
			<h3>Login</h3>
		</div>
		<div class="card-body">
			<form action="{{ route('dologin') }}">
				<div class="form-group row">
					<label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
					<div class="col-md-6">
						<input id="email" type="email" class="form-control" name="email" value="" required autocomplete="email" autofocus  required>
					</div>
				</div>
				<div class="form-group row mt-2">
					<label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
					<div class="col-md-6">
						<input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" required>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-6 offset-md-4">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" name="remember" id="remember">
							<label class="form-check-label" for="remember">
								Remember me
							</label>
						</div>
					</div>
				</div>
				<div class="form-group row mb-0">
					<div class="col-md-8 offset-md-4">
						<button type="submit" class="btn btn-primary">
							Login
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>

@endsection