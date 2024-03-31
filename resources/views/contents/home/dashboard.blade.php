@extends('layout.admin')
@section('admin')

	{{-- <h1>dashboard</h1>
	<h2>wellcome {{ $data->name }}</h2>
	{{ app()->version() }}
	<a href="{{ route('logout') }}" title="" class="btn btn-primary">logout</a> --}}
	<div class="row mt-2">
		<div class="col-3">
			<div class="card shadow p-2">
				<div class="card-header">
					<label for="">berita</label>
					<h3>Total <span class="badge bg-primary rounded-pill">{{  App\models\Berita::count() }}</span></h3>
				</div>
			</div>
		</div>	
		<div class="col-3">
			<div class="card shadow p-2">
				<div class="card-header">
					<label for="">berita</label>
					<h4>proses <span class="badge bg-success rounded-pill">{{  App\models\Berita::where('verify', '=', 'p')->count() }}</span></h4>
				</div>
			</div>
		</div>
		<div class="col-3">
			<div class="card shadow p-2">
				<div class="card-header">
					<label for="">berita</label>
					<h4>diterima <span class="badge bg-info rounded-pill">{{  App\models\Berita::where('verify', '=', 'y')->count() }}</span></h4>
				</div>
			</div>
		</div>
		<div class="col-3">
			<div class="card shadow p-2">
				<div class="card-header">
					<label for="">berita</label>
					<h4>ditolak <span class="badge bg-danger rounded-pill">{{  App\models\Berita::where('verify', '=', 'n')->count() }}</span></h4>
				</div>
			</div>
		</div>
		<div class="col-4 mt-3">
			<div class="card shadow p-2">
				<div class="card-header">
					<label for="">User</label>
					<h4>Total <span class="badge bg-primary rounded-pill">{{  App\models\User::count() }}</span></h4>
				</div>
			</div>
		</div>
		<div class="col-4 mt-3">
			<div class="card shadow p-2">
				<div class="card-header">
					<label for="">User</label>
					<h4>admin <span class="badge bg-secondary rounded-pill">{{  App\models\User::where('category', '=', 'admin')->count() }}</span></h4>
				</div>
			</div>
		</div>
		<div class="col-4 mt-3">
			<div class="card shadow p-2">
				<div class="card-header">
					<label for="">User</label>
					<h4>Customer <span class="badge bg-warning rounded-pill">{{  App\models\User::where('category', '=', 'user')->count() }}</span></h4>
				</div>
			</div>
		</div>
		<div class="col-4 mt-3">
			<div class="card shadow p-2">
				<div class="card-header">
					<label for="">Kategori Berita</label>
					<h4>Total <span class="badge bg-warning rounded-pill">{{  App\models\Category::count() }}</span></h4>
				</div>
			</div>
		</div>
		<div class="col-4 mt-3">
			<div class="card shadow p-2">
				<div class="card-header">
					@php
						$berita_top = App\models\Berita::where('verify', '=', 'y')->groupBy()->orderBY('like')->limit(3)->get();
					@endphp
					<h4>Top Berita</h4>
					<ul>
					@foreach ($berita_top as $top)
						<li><b>{{ $top->title }}</b> <small>by {{  App\models\User::find($top->user)->name }}</small> <span class="badge bg-primary rounded-pill">{{  count(json_decode($top->like, true))-1 }} suka</span></li>
					@endforeach
					</ul>
				</div>
			</div>
		</div>
		<div class="col-4 mt-3">
			<div class="card shadow p-2">
				<div class="card-header">
					@php
						$user_top = App\models\Berita::where('verify', '=', 'y')->groupBy('user')->selectRaw('count(*) as count, user')->limit(3)->get();
						// $user_top = App\models\Berita::dbRaw('COUNT(user) as user')->get();
						// print_r($user_top);
					@endphp
					<h4>Top User</h4>
					<ul>
					@foreach ($user_top as $top_user)
						<li><b>{{ App\models\User::find($top_user->user)->name }} ({{ App\models\Berita::where('verify', '=', 'y')->where('user','=',$top_user->user)->count() }})</b> <small>postingan</small></li>
					@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	


@endsection