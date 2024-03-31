@extends('Layout.admin')
@section('admin')

<br>
<!-- Button trigger modal -->
<a href="{{ route('add_berita') }}" id="add_usr" type="button" class="btn btn-primary">
  Tambah
</a>

<table class="table">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">category</th>
      {{-- <th scope="col">pic</th> --}}
      {{-- <th scope="col">desc</th> --}}
      <th scope="col">user</th>
      <th scope="col">veryfy</th>
      <th scope="col">veryfy desc</th>
      <th scope="col">create</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($berita as $data)
    <tr class="table-active">
      <td>{{ $loop->iteration }}</td>
      <td>{{ $data->title }}</td>
      <td>{{ $data->category }}</td>
      {{-- <td><img src="{{ url('assets/berita_img/'.$data->pic) }}" height="200" width="200" alt="" /></td> --}}
      {{-- <td>{{ $data->desc }}</td> --}}
      <td>{{ App\models\User::find($data->user)->name }}</td>
      <td>{{ $data->verify }}</td>
      <td>{{ $data->verify_desc }}</td>
      <td>{{ $data->created_at }}</td>
      <td>
        @if ($data->verify == 'p')
          <a class="btn" href="{{ route('edt_berita', ['id' => $data->id ]) }}" ><i class="fa fa-pencil"></i></a>
        @endif
      	<a class="btn" href="{{ route('shw_berita', ['id' => $data->id ]) }}" ><i class="fa fa-eye"></i></a>
      	<a id="dlt_brt" class="btn" href="#!" data-bs-toggle="modal" data-bs-target="#modal_dlt" data-id="{{ $data->id }}"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
   	@endforeach
  </tbody>

</table>

<div class="d-flex">
	<div class="mx-auto">
		{{ $berita->links() }}
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
		        <a id="dlt" type="button" class="btn btn-primary">YA</a>
		    </div>
			</form>
    </div>
  </div>
</div>

<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<script>
  $(document).ready(function() {
		$(document).on('click', '#dlt_brt', function() {
			var id = $(this).data('id');
			$('#dlt').attr('href', '{{ url('dlt_berita') }}'+'/'+id);
		});
	});
</script>

@endsection()