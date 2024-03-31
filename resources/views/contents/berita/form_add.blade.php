@extends('layout.main')
@section('contents')
	<div class="container">
		
		<h1>Tambah Berita</h1>
		
		<div class="card">
			<form id="frm" action="{{ route('sv_berita') }}" method="POST" enctype="multipart/form-data">
				 @csrf
				<div class="card-header">
					<h5 class="modal-title" id="exampleModalLabel">Form Berita</h5>
				</div>
			    <div class="card-body">
				    <div class="row">
				        <div class="col-xs-12 col-sm-12 col-md-12">
				            <div class="form-group">
				                <strong>Judul</strong>
				                <input  type="text" name="title" class="form-control" placeholder="judul" required>
				            </div>
				        </div>
				        <div class="col-xs-12 col-sm-12 col-md-12">
				            <div class="form-group">
				                <strong>Penulis</strong>
				                <input  type="text" name="user" class="form-control" placeholder="" value="{{ session('loginid') }}" hidden ="true">
				                <input class="form-control" placeholder="{{ App\models\User::find(session('loginid'))->name }}"readonly="true">
				            </div>
				        </div>
				        <div class="col-xs-12 col-sm-12 col-md-12">
				            <div class="form-group">
				                <strong>Kategori</strong>
				                <select class="form-select" name="category">
					                	<option selected>Pilih Kategori</option>
				                	@foreach ($cat as $cat)
					                	<option value="{{ $cat->id }}">{{ $cat->name }}</option>
				                	@endforeach
								</select>
				            </div>
				        </div>
				        <div class="col-xs-12 col-sm-12 col-md-12">
				            <div class="form-group">
				                <strong>Gambar</strong>
				                <input id="prev_img" class="form-control" type="file" name="pic" accept=".jpg,.jpeg,.png">
								<div class="img-thumbnail img-fluid rounded m-2" id="img_prev" style="height: 300px; width:400px"></div>
				            </div>
				        </div>
				        <div class="col-xs-12 col-sm-12 col-md-12">
				            <div class="form-group">
				                <strong>Deskripsi</strong>
				                <textarea type="text" name="desc" class="form-control" placeholder="Deskripsi" required></textarea>
				            </div>
				        </div>
				    </div>
			    </div>
			    <div class="card-footer">
			    	<div class="d-grid gap-2">
				        <button id="btn_sv" type="submit" class="btn btn-primary">Simpan</button>
			    	</div>
			    </div>
			</form>
		</div>
	</div>

<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<script>
	$(document).ready(function() {
	$("#prev_img").on("change", function()
	{
		var files = !!this.files ? this.files : [];
		if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

		if (/^image/.test( files[0].type)){ // only image file
			var reader = new FileReader(); // instance of the FileReader
			reader.readAsDataURL(files[0]); // read the local file

			reader.onloadend = function(){ // set image data as background of div
				$("#img_prev").css({"background-image":"url("+this.result+")","background-size":"contain", "background-repeat":"no-repeat","background-position":"center"});
			}
		}
	});
});
</script>

@endsection