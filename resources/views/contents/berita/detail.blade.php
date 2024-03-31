@extends('layout.admin')
@section('admin')

	{{-- <h1>detail berita</h1> --}}
	
	<div class="card mt-1">
		<form>				
			{{-- <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Berita </h5>
			</div> --}}
		    <div class="modal-body">
			    <div class="row">
			        <div class="col-xs-6 col-sm-6 col-md-6">
			            <div class="form-group">
			                <strong>Title</strong>
			                <input  type="text" name="title" class="form-control" value="{{ $data->title }}" readonly="true">
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-6 col-md-6">
			            <div class="form-group">
			                <strong>User</strong>
			                <input  type="text" name="user" class="form-control" value="{{ App\models\User::find($data->user)->name }}" readonly="true">
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-6 col-md-6">
			            <div class="form-group">
			                <strong>Category</strong>
			                <select class="form-select" name="category" disabled>
				                	<option selected >{{ $cat->name }}</option>
							</select>
			            </div>
			        </div>
					<div class="col-xs-6 col-sm-6 col-md-6">
			            <div class="form-group">
			                <strong>Waktu Unggah</strong>
			                <input  type="text" name="user" class="form-control" value="{{ $data->created_at }}" readonly="true">
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-6 col-md-6">
			            <div class="form-group">
			                <strong>Picture</strong>
							<img class="img-fluid img-thumbnail mx-auto form-control m-2" src="{{ url('assets/berita_img/'.$data->pic) }}" width="500" height="500" />
							{{-- <input class="form-control" type="file" id="formFile" name="pic" placeholder="{{ $data->pic }}" readonly="true"> --}}
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-6 col-md-6">
			            <div class="form-group">
			                <strong>Desc</strong>
			                <textarea type="text" name="desc" class="form-control" readonly="true">{{ $data->desc }}</textarea>
			            </div>
			        </div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Suka</strong>
							<input  type="text" name="user" class="form-control" value="{{ (count(json_decode($data->like, true))-1) }} orang" readonly="true">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Komentar</strong>
							<input  type="text" name="user" class="form-control" value="{{ App\models\Comment::where('berita', '=', $data->id)->count() }} komentar" readonly="true">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Verifikasi</strong>
							@php
								if ($data->verify == 'p') {
									$verify = 'proses';
								} elseif($data->verify == 'y') {
									$verify = 'setuju';
								} else {
									$verify = 'tida setuju';
								}
							@endphp
							<input  type="text" name="user" class="form-control" value="{{ $verify }}" readonly="true">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Ulasan</strong>
			                <textarea type="text" name="desc" class="form-control" readonly="true">{{ $data->verify_desc }}</textarea>
						</div>
					</div>
			    </div>
		    </div>
		</form>
	</div>

@endsection