@extends('Layout.admin')
@section('admin')

<br>
<!-- Button trigger modal -->
<button id="add_cat" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_cat">
  Tambah
</button>

<table class="table">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">desc</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($category as $data)
    <tr class="table-active">
      <td>{{ $loop->iteration }}</td>
      <td>{{ $data->name }}</td>
      <td>{{ $data->desc }}</td>
      <td>
      	<a id="edt_cat" class="btn" href="#" data-bs-toggle="modal" data-bs-target="#modal_cat" data-id_cat="{{ $data->id }}" data-name_cat="{{ $data->name }}" data-desc_cat="{{ $data->desc }}" ><i class="fa fa-pencil"></i></a>
      	<a id="shw_cat" class="btn" href="#" data-bs-toggle="modal" data-bs-target="#modal_cat" data-id_cat="{{ $data->id }}" data-name_cat="{{ $data->name }}" data-desc_cat="{{ $data->desc }}" ><i class="fa fa-eye"></i></a>
      	<a id="dlt_cat" class="btn" href="#!" data-bs-toggle="modal" data-bs-target="#modal_dlt" data-id_cat="{{ $data->id }}"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
   	@endforeach
  </tbody>

</table>

<div class="d-flex">
	<div class="mx-auto">
		{{ $category->links() }}
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_cat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="frm" method="">
      	<div class="modal-header">
      		<h5 class="modal-title" id="exampleModalLabel">Kategori</h5>
      		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      	</div>
		    <div class="modal-body">
			    <div class="row">
			        <div class="col-xs-12 col-sm-12 col-md-12">
			            <div class="form-group">
			                <strong>Nama </strong>
			                <input id="val_name" type="text" name="name" class="form-control" placeholder="username">
			                <input id="val_id_cat" type="number" name="id" hidden>
			            </div>
			        </div>
			        <div class="col-xs-12 col-sm-12 col-md-12">
			            <div class="form-group">
			                <strong>Deskripsi </strong>
			                <textarea id="val_desc" type="text" name="desc" class="form-control" placeholder="Deskripsi"></textarea>
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
		        <a id="dlt" href="" type="button" class="btn btn-primary">YA</a>
		    </div>
			</form>
    </div>
  </div>
</div>

<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript">

	$(document).ready(function() {
		$(document).on('click', '#add_cat', function() {
			$('#frm').attr('action', '{{ route('sv_cat') }}')
			$('#val_name').val('').prop('disabled', false);
			$('#val_desc').val('').prop('disabled', false);
			$('#btn_sv').css('visibility', 'visible');
		});
	});

	$(document).ready(function() {
		$(document).on('click', '#edt_cat', function() {
			var id = $(this).data('id_cat');
			var name = $(this).data('name_cat');
			var desc = $(this).data('desc_cat');
			$('#frm').attr('action', '{{ route('edt_cat', ['id' => $data->id ]) }}');
			// $('#frm').attr('action', '{{ route('home') }}');
			$('#val_id_cat').val(id);
			$('#val_name').val(name).prop('disabled', false);
			$('#val_desc').val(desc).prop('disabled', false);
			$('#btn_sv').css('visibility', 'visible');
		})
	});

	$(document).ready(function() {
		$(document).on('click', '#shw_cat', function() {
			var id = $(this).data('id_cat');
			var username = $(this).data('name_cat');
			var desc = $(this).data('desc_cat');
			$('#val_name').val(username).prop('disabled', true);
			$('#val_desc').val(desc).prop('disabled', true);
			$('#btn_sv').css('visibility', 'hidden');
		});
	}); 

	$(document).ready(function() {
		$(document).on('click', '#dlt_cat', function() {
			var id = $(this).data('id_cat');
			$('#dlt').attr('href', '{{ url('dlt_cat') }}'+'/'+id);
		});
	});
</script>

@endsection()