@foreach ($berita as $data)
	<div class="card mb-3" id="{{ $data->id }}">
		<h3 class="card-header">
			{{ $data->title }}
		</h3>
		<div class="card-body">
			<div class="text-center">
				<img class="img-fluid img-thumbnail mx-auto" src="{{ url('assets/berita_img/'.$data->pic) }}" width="500" height="500" />
			</div>
			<div class="d-block">
				@if (session()->get('loginid'))
					@php
						$usrid = array_search(session()->get('loginid'), json_decode($data->like,true));
						// echo $usrid;
					@endphp
					@if ($usrid != null )
						<a href="javascript:void(0)" class="card-text m-1"><i class="fa fa-solid fa-regular fa-heart fa-xl" style="color: red;"></i></a>
					@else
						<a href="{{ route('add_like', ['id' => $data->id ]) }}" class="card-text m-1"><i class="fa fa-regular fa-heart fa-xl"></i></a>
					@endif						
				@else
					<a href="{{ route('add_like', ['id' => $data->id ]) }}" class="card-text m-1"><i class="fa fa-regular fa-heart fa-xl"></i></a>
				@endif
				<a href="#" class="card-text m-1"  data-bs-toggle="collapse" data-bs-target="#collapse{{ $data->id }}" aria-expanded="true" aria-controls="collapse{{ $data->id }}"><i class="fa fa-regular fa-comment fa-xl"></i></a>
				<a id="cplink" href="javascript:void(0)" onclick="cplink()" class="card-text m-1"><i class="fa fa-share fa-xl"></i></a>
			</div>
			<p class="card-text" id="desc_news{{$data->id}}">&nbsp&nbsp{{ Str::limit($data->desc, 150) }}</p>
			@if (strlen($data->desc) >= 150 )
				<a data-dall="{{ "&nbsp&nbsp".str_replace("<br />","<br />&nbsp&nbsp",nl2br($data->desc)) }}" data-id_brt="{{ $data->id }}" href="javascript:void(0)" class="text-success all_desc_news{{$data->id}}" id="all_desc_news">Selengkapnya</a>
				<a data-id_brt="{{ $data->id }}" data-dlmt="{{ "&nbsp&nbsp".Str::limit($data->desc, 150) }}" href="javascript:void(0)" class="text-success lmt_desc_news{{$data->id}}" id="lmt_desc_news" hidden="true">Sedikit</a>
			@endif
		</div>
		<div class="card-footer text-muted">
			<p>{{ $data->updated_at->diffForHumans() }} by <b class="fs-4"> {{ App\models\User::find($data->user)->name }}</b></p>
			<div id="collapse{{ $data->id }}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
				<div class="accordion-header">
					<h5>komentar</h5>
				</div>
					<div class="card-body">
						@php
							$getcommnet = App\models\Comment::where('berita', '=', $data->id)->paginate(20);
						@endphp
						@foreach ($getcommnet as $comment)
							<div class="accordion-body">
								<div class="card bg-light mb-3">
									@if (is_null($comment))
										<div class="card-body">
											<p class="card-text">kosong</p>
										</div>
									@else
										<div class="card-body">
											<div class="toast-header">
												<strong class="me-auto">{{ App\models\User::find($comment->user)->name }}</strong>
												<small>{{ $comment->created_at->diffForHumans() }}</small>
											</div>
											<div class="toast-body">
											{{ $comment->comment }}
											</div>
										</div>
									@endif
								</div>
							</div>
						@endforeach
					</div>
				<form method="post" action="{{ route('add_comment') }}" class="d-flex">
					@csrf
					<input name="user" type="text" value="{{ session('loginid') }}" hidden="true">
					<input name="berita" type="text" value="{{ $data->id }}" hidden="true">
					<input class="form-control me-sm-2" name="comment" type="text" placeholder="tulis komentar.....">
					<button class="btn btn-secondary my-2 my-sm-0" type="submit"><i class="fa fa-regular fa-message"></i></button>
				</form>
			</div>
		</div>
	</div>
@endforeach

{{-- @foreach ($berita as $data)
<div class="col-md-4 content_box">
	<div>
		<h2>{{ $data->title }}</h2>
		<p>{{ $data->desc }}</p>
	</div>
</div>
@endforeach --}}