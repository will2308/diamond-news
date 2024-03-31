@extends('layout.admin')
@section('admin')

	{{-- <h1>Verivikasi Berita</h1> --}}
	
	<div class="card">
		<form>				
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Berita </h5>
			</div>
		    <div class="modal-body">
			    <div class="row">
			        <div class="col-xs-6 col-sm-6 col-md-6">
			            <div class="form-group">
			                <strong>Title</strong>
			                <input  type="text" name="title" class="form-control" placeholder="title" value="{{ $data->title }}" disabled>
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-6 col-md-6">
			            <div class="form-group">
			                <strong>User</strong>
			                <input  type="text" name="user" class="form-control" placeholder="user" value="{{ $data->user }}" disabled>
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-6 col-md-6">
			            <div class="form-group">
			                <strong>Category</strong>
			                <select class="form-select" name="category"  disabled>
				                	<option selected value="{{ $cat->id }}" >{{ $cat->name }}</option>
				                	@<?php foreach ($cat_all as $catall): ?>
				                		<option value="{{ $catall->id }}" >{{ $catall->name }}</option>
				                	<?php endforeach ?>
							</select>
			            </div>
			        </div>
					<div class="col-xs-6 col-sm-6 col-md-6">
			            <div class="form-group">
			                <strong>Waktu Unggah</strong>
			                <input  type="text" name="user" class="form-control" value="{{ $data->created_at }}" disabled>
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-6 col-md-6">
			            <div class="form-group">
			                <strong>Picture</strong>
								{{-- <input id="prev_img" class="form-control" type="file" name="pic" accept=".jpg,.jpeg,.png" disabled>	 --}}
								<img class="img-fluid img-thumbnail mx-auto form-control" src="{{ url('assets/berita_img/'.$data->pic) }}" width="500" height="500" />
								{{-- <div class="img-thumbnail img-fluid rounded m-2" id="img_prev" style="height: 300px; width:400px;background-image: url({{ url('assets/berita_img/'.$data->pic)}});background-size:contain; background-repeat:no-repeat; background-position:center"></div> --}}
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-6 col-md-6">
			            <div class="form-group">
			                <strong>Desc</strong>
			                <textarea type="text" name="desc" class="form-control" placeholder="desc" disabled>{{ $data->desc }}</textarea>
			            </div>
			        </div>
			    </div>
		    </div>
		</form>
		<form action="{{ route('update_berita', ['id' => $data->id ]) }}"  enctype="multipart/form-data">				
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form verifikasi </h5>
			</div>
		    <div class="modal-body">
			    <div class="row">
			        
			        <div class="col-xs-6 col-sm-6 col-md-6">
			            <div class="form-group">
			                <strong>Verifikasi</strong>
			                <select class="form-select" name="verify" required>
									<option value="p" disabled selected>pilih verifikasi</option>
				                	<option value="y" >Terima</option>
				                	<option value="n" >Tolak</option>
				                	
							</select>
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-6 col-md-6">
			            <div class="form-group">
			                <strong>Ulasan</strong>
			                <textarea type="text" name="verify_desc" class="form-control" placeholder="tulis Ulasan" required></textarea>
			            </div>
			        </div>
			    </div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			        <button id="btn_sv" type="submit" class="btn btn-primary">Simpan</button>
			    </div>
		    </div>
		</form>
	</div>

@endsection