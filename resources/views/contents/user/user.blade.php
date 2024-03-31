@extends('Layout.admin')
@section('admin')

<br>
<!-- Button trigger modal -->
<button id="add_usr" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_cat">
  Tambah
</button>

<table class="table">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">username</th>
      <th scope="col">email</th>
      {{-- <th scope="col">password</th> --}}
      <th scope="col">kategori</th>
      <th scope="col">desc</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($user as $data)
    <tr class="table-active">
      <td>{{ $loop->iteration }}</td>
      <td>{{ $data->name }}</td>
      <td>{{ $data->email }}</td>
      {{-- <td>{{ $data->password }}</td> --}}
      <td>{{ $data->category }}</td>
      <td>{{ $data->desc }}</td>
      <td>
      	<a id="edt_usr" class="btn" href="#" data-bs-toggle="modal" data-bs-target="#modal_cat" data-id_usr="{{ $data->id }}" data-name_usr="{{ $data->name }}" data-email="{{ $data->email }}" data-password="{{ $data->password }}" data-cat_usr="{{ $data->category }}"  data-desc_usr="{{ $data->desc }}" data-pic_usr="{{ $data->pic }}"><i class="fa fa-pencil"></i></a>
      	<a id="shw_usr" class="btn" href="#" data-bs-toggle="modal" data-bs-target="#modal_cat" data-id_usr="{{ $data->id }}" data-name_usr="{{ $data->name }}" data-email="{{ $data->email }}" data-password="{{ $data->password }}" data-cat_usr="{{ $data->category }}"  data-desc_usr="{{ $data->desc }}" data-pic_usr="{{ $data->pic }}" ><i class="fa fa-eye"></i></a>
      	<a id="dlt_usr" class="btn" href="#!" data-bs-toggle="modal" data-bs-target="#modal_dlt" data-id_usr="{{ $data->id }}"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
   	@endforeach
  </tbody>

</table>

<div class="d-flex">
	<div class="mx-auto">
		{{ $user->links() }}
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_cat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="frm" enctype="multipart/form-data" method="post">
		@csrf
		@method('get')
      	<div class="modal-header">
      		<h5 class="modal-title" id="exampleModalLabel">Form User</h5>
      		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      	</div>
		    <div class="modal-body">
			    <div class="row">
			        <div class="col-xs-12 col-sm-12 col-md-12">
			            <div class="form-group">
			                <strong>Nama </strong>
			                <input id="val_id_usr" type="number" name="id" hidden>
			                <input id="val_username" type="text" name="name" class="form-control" placeholder="username" required>
			            </div>
			        </div>
			        <div class="col-xs-12 col-sm-12 col-md-12">
			            <div class="form-group">
			                <strong>Email </strong>
			                <input id="val_email" type="email" name="email" class="form-control" placeholder="email" required>
			            </div>
			        </div>
			        <div class="col-xs-12 col-sm-12 col-md-12">
			            <div class="form-group">
			                <strong>Passoword </strong>
			                <input id="val_password" type="password" name="password" class="form-control" placeholder="password" required>
			            </div>
			        </div>
			        <div class="col-xs-12 col-sm-12 col-md-12">
			            <div class="form-group">
			                <strong>Kategori </strong>
							<select id="val_cat_user" class="form-control form-select" name="cat_user" required>
								<option disabled>Pilih Kategori</option>
								<option value="admin">Admin</option>
								<option value="user">User</option>
						</select>
						</div>
			        </div>
					<div class="col-xs-12 col-sm-12 col-md-12">
			        	<div class="form-group">
							<strong>Foto profil </strong>
							<input id="val_pic" class="form-control" type="file" name="pict" accept=".jpg,.jpeg,.png" required>
							<div class="img-thumbnail img-fluid rounded m-2" id="img_prev_usr" style="height: 300px; width:400px;"></div>
						</div>
			        </div>
					<div class="col-xs-12 col-sm-12 col-md-12">
			            <div class="form-group">
			                <strong>Deskripsi </strong>
			                <textarea id="val_desc" type="text" name="desc" class="form-control" placeholder="Deskripsi" required></textarea>
			            </div>
			        </div>
			    </div>
		    </div>
		    <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		        <button id="btn_sv" type="submit" class="btn btn-primary">Simpan</button>
		    </div>
			</form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_dlt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      	<div class="modal-header">
      		<h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
      	</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<a id="dlt_btn_usr" type="button" class="btn btn-primary">YA</a>
			</div>
    </div>
  </div>
</div>

<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript">

	$(document).ready(function() {
		$(document).on('click', '#add_usr', function() {
			$('#frm').attr('action', '{{ route('sv_user') }}');
			$('#val_username').val('').prop('disabled', false);
			$('#val_email').val('').prop('disabled', false);
			$('#val_password').val('').prop({'hidden': false, 'required': true});
			$('#val_cat_user').val('').prop('disabled', false);
			$('#val_desc').val('').prop('disabled', false);
			$('#val_pic').val('').prop('disabled', false);
			$('#btn_sv').css('visibility', 'visible');
		});
	});

	$(document).ready(function() {
		$(document).on('click', '#edt_usr', function() {
			var id = $(this).data('id_usr');
			var username = $(this).data('name_usr');
			var email = $(this).data('email');
			var password = $(this).data('password');
			var cat_user = $(this).data('cat_usr');
			var desc = $(this).data('desc_usr');
			var pic =  $(this).data('pic_usr');

			$('#frm').attr('action', '{{ route('edt_user') }}');
			$('#val_id_usr').val(id);
			$('#val_username').val(username).prop('disabled', false);
			$('#val_email').val(email).prop('disabled', false);
			$('#val_password').val('').prop({'hidden': false, 'required': false});
			$('#val_cat_user').val(cat_user).prop('disabled', false);
			$('#val_desc').val(desc).prop('disabled', false);
			$("#img_prev_usr").css({"background-image":"url({{url('assets/berita_profil/')}}"+"/"+pic+")","background-size":"contain", "background-repeat":"no-repeat","background-position":"center"});
			$('#val_pic').val('').prop('disabled', false);
			$('#btn_sv').css('visibility', 'visible');
		})
	});

	$(document).ready(function() {
		$(document).on('click', '#shw_usr', function() {
			var id = $(this).data('id_usr');
			var username = $(this).data('name_usr');
			var email = $(this).data('email');
			var password = $(this).data('password');
			var cat_user = $(this).data('cat_usr');
			var pic =  $(this).data('pic_usr');
			var desc = $(this).data('desc_usr');
			
			$('#val_username').val(username).prop('disabled', true);
			$('#val_email').val(email).prop('disabled', true);
			$('#val_password').val(password).prop('disabled', true);
			$('#val_cat_user').val(cat_user).prop('disabled', true);
			$('#val_desc').val(desc).prop('disabled', true);
			$("#img_prev_usr").css({"background-image":"url({{url('assets/berita_profil/')}}"+"/"+pic+")","background-size":"contain", "background-repeat":"no-repeat","background-position":"center"});
			$('#val_pic').val(pic).prop('disabled', true);
			$('#btn_sv').css('visibility', 'hidden');
		});
	});

	$(document).ready(function() {
		$(document).on('click', '#dlt_usr', function() {
			var id = $(this).data('id_usr');
			$('#dlt_btn_usr').attr('href', '{{ url('dlt_user') }}'+'/'+id);
		});
	});

	$(document).ready(function() {
		$("#val_pic").on("change", function(){
			var files = !!this.files ? this.files : [];
			if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

			if (/^image/.test( files[0].type)){ // only image file
				var reader = new FileReader(); // instance of the FileReader
				reader.readAsDataURL(files[0]); // read the local file

				reader.onloadend = function(){ // set image data as background of div
					$("#img_prev_usr").css({"background-image":"url("+this.result+")","background-size":"contain", "background-repeat":"no-repeat","background-position":"center"});
				}
			}
		});
	});
</script>

@endsection()