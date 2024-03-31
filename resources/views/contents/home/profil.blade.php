@extends('layout.main')
@section('contents')

@if (session()->has('success'))
<div class="alert alert-primary alert-dismissible fade show">
	<strong><i class="fa-regular fa-thumbs-up"></i> {{ session('success') }}</strong>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card m-4">
	<div class="card-header">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link  active" data-bs-toggle="tab" href="#profil">Profil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-bs-toggle="tab" href="#berita">Berita</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-bs-toggle="tab" href="#privasi">Privasi</a>
			</li>
		</ul>
	</div>
	<div id="myTabContent" class="tab-content">
		<div class="tab-pane fade active show" id="profil">
			<div class="card-body">
				<div class="row">
			        <div class="col-xs-5 col-sm-5 col-md-5">
			            <div class="form-group">
			            	@if (is_null($data->pic))
				                <img src="{{ url('assets/berita_profil/profil.jpg') }}" class="img-thumbnail mx-auto d-block"  width="300" height="300">
				            @else
				                <img src="{{ url('assets/berita_profil/'.$data->pic) }}" class="img-thumbnail mx-auto d-block"  width="300" height="300">
			            	@endif
			            </div>
			        </div>
			        <div class="col-xs-7 col-sm-7 col-md-7">
			            <div class="form-group p-auto">
			                <div class="form-control m-1">
				                Nama :<strong class="blockquote"> {{ $data->name }} </strong>
			                </div>
			                <div class="form-control m-1">
				                Email :<strong class="blockquote"> {{ $data->email }} </strong>
			                </div>
			                <div class="form-control m-1">
			                	@if ($data->category == 'user')
					                Kategori :<strong class="blockquote"> Penulis</strong>
			                	@else
					                Kategori :<strong class="blockquote"> {{ $data->category }}</strong>
			                	@endif
			                </div>
			                <div class="form-control">
				                <strong class="blockquote"> Deskripsi :</strong>
				                <p>{{ $data->desc }}</p>	
			                </div>
			            </div>
			        </div>
			        <div class="form-group row mb-0 mt-2">
			        	<div class="col-md-12 offset-md-12 d-grid ">
			        		<button type="button" class="btn btn-primary btn-lg"  data-bs-toggle="modal" data-bs-target="#modal_frm">Edit Profil</button>
			        	</div>
			        </div>
			    </div>
			</div>
		</div>
		<div class="tab-pane fade" id="berita">
			<div class="card-body">
				<div class="row">
				    <div class="col-4">
				      <div class="list-group">
						@php
							if (App\models\User::find(session()->get('loginid'))->category == 'admin') {
								$p = App\models\Berita::where('verify', '=', 'p')->count();
								$y = App\models\Berita::where('verify', '=', 'y')->count();
								$n = App\models\Berita::where('verify', '=', 'n')->count();
							} else {
								$p = App\models\Berita::where('user', '=', Session()->get('loginid'))->where('verify', '=', 'p')->count();
								$y = App\models\Berita::where('user', '=', Session()->get('loginid'))->where('verify', '=', 'y')->count();
								$n = App\models\Berita::where('user', '=', Session()->get('loginid'))->where('verify', '=', 'n')->count();
							}
						@endphp
				        <a class="list-group-item list-group-item-action active" data-bs-toggle="tab" href="#prs">Proses <span class="badge bg-primary rounded-pill">{{ $p }}</span></a>
				        <a class="list-group-item list-group-item-action" data-bs-toggle="tab" href="#agr">Disetujui <span class="badge bg-primary rounded-pill">{{ $y }}</span></a>
				        <a class="list-group-item list-group-item-action" data-bs-toggle="tab" href="#dagr">Ditolak <span class="badge bg-primary rounded-pill">{{ $n }}</span></a>
				        <a href="{{ route('add_berita') }}" class="list-group-item list-group-item-action">Tambah Berita <span class="badge bg-primary rounded-pill"><i class="fa fa-plus"></i></span></a>
				        <a class="list-group-item list-group-item-action" data-bs-toggle="tab" href="#src">Cari <span class="badge bg-primary rounded-pill"><i class="fa fa-search"></i></span></a>
				      </div>
				    </div>
				    <div class="col-8">
				    	<div id="myTabContent" class="tab-content" tabindex="0">
					      	<div class="tab-pane fade active show" id="prs">
					      		@php
									if (App\models\User::find(session()->get('loginid'))->category == 'admin') {
										$proses = App\models\Berita::where('verify', '=', 'p')->paginate(3);
									} else {
										$proses = App\models\Berita::where('user', '=', session()->get('loginid'))->where('verify', '=', 'p')->paginate(3);
									}
					      			// print_r(session->all());
					      		@endphp
					      		@foreach ($proses as $element)
					      		<div class="card border-light mb-3">
						      		<h4 class="card-header">{{ $element->title }}</h4>
				      				<div class="card-body">
				      					<h5>Menunggu persetujuan admin</h5>
					      				<small>{{ $element->created_at->diffForHumans() }}</small>
				      				</div>
					      			<div class="btn-group" role="group" aria-label="Basic example">
					      				<button type="button" class="btn btn-outline-secondary"  data-bs-toggle="modal" data-bs-target="#proses_{{ str_replace(' ', '_', $element->title) }}">Detail</button>
					      				<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#del_{{ str_replace(' ', '_', $element->title) }}">Hapus</button>
					      			</div>
					      		</div>
					      		<div class="modal fade" id="proses_{{ str_replace(' ', '_', $element->title) }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					      			<div class="modal-dialog modal-xl">
					      				<div class="modal-content">
					      					<div class="modal-header">
					      						<h5 class="modal-title" id="exampleModalLabel">Detail berita</h5>
					      						<button id="close_btn" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-id="{{$element->id}}"></button>
					      					</div>
					      					<div class="modal-body">
					      						<div class="row" id="dtl_berita_{{$element->id}}">
											        <div class="col-xs-12 col-sm-12 col-md-12">
											            <div class="form-group">
											                @php
											                	$gtcat = App\models\Category::find($element->category);
											                @endphp
											                <p>Judul : <b>{{ $element->title }}</b>
											                	Kategori : <b>{{ $gtcat->name }}</b>
											                </p>
											            </div>
											        </div>
											        <div class="col-xs-12 col-sm-12 col-md-12">
											            <div class="form-group">
											                <img src="{{ url('assets/berita_img/'.$element->pic) }}" class="img-thumbnail mx-auto d-block"  width="300" height="300">
											            </div>
											        </div>
											        <div class="col-xs-12 col-sm-12 col-md-12">
											            <div class="form-group">
											                <p class="m-2">{{ $element->desc }}</p>
											            </div>
											        </div>
											    </div>
											</div>
											@if (App\models\User::find(session()->get('loginid'))->category == 'user')	
											<div class="modal-body">
												<form action="{{ url('edit_berita', ['id' => $element->id ]) }}" method="post" enctype="multipart/form-data">
													@csrf
													@method('get')
													<div class="row" id="form_edit_{{$element->id}}" hidden>
														<div class="col-6">
															<div class="form-group">
																<strong>Judul</strong>
																<input  type="text" name="title" class="form-control" placeholder="judul" value="{{ $element->title }}" required>
															</div>
														</div>
														<div class="col-6">
															<div class="form-group">
																<div class="form-group">
																	@php
																		$gtcat = App\models\Category::find($element->category);
																		$cat_all = App\models\Category::all();
																	@endphp
																	<strong>Kategori</strong>
																	<select class="form-select" name="category">
																			<option value="{{ $gtcat->id }}" selected>{{ $gtcat->name }}</option>
																		@foreach ($cat_all as $cat)
																			<option value="{{ $cat->id }}">{{ $cat->name }}</option>
																		@endforeach
																	</select>
																</div>
															</div>
														</div>
														<div class="col-6">
															<div class="form-group">
																<strong>Gambar</strong>
																<input id="prev_img" class="form-control" type="file" name="pic" accept=".jpg,.jpeg,.png">
																<div class="img-thumbnail img-fluid rounded m-2" id="img_prev" style="height: 300px; width:400px;background-image: url({{ url('assets/berita_img/'.$element->pic)}});background-size:contain; background-repeat:no-repeat; background-position:center"></div>
															</div>
														</div>
														<div class="col-6">
															<div class="form-group">
																<strong>Deskripsi</strong>
																<textarea type="text" name="desc" class="form-control" placeholder="Deskripsi" required>{{ $element->desc }}</textarea>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button id="submit_btn_{{$element->id}}" type="submit" class="btn btn-primary" hidden>Simpan</button>
														<button id="edit_btn" type="button" class="btn btn-info edit_btn" data-id="{{$element->id}}">Edit</button>
														<button id="close_btn2" type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-id="{{$element->id}}">Close</button>
													</div>
												</form>
											</div>
											@endif
											@if (App\models\User::find(session()->get('loginid'))->category == 'admin')
											<div class="modal-body">
												<hr>
												<form action="{{ route('update_berita', ['id' => $element->id ]) }}"  enctype="multipart/form-data">
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
													<div class="modal-footer border-0">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
														<button id="btn_sv" type="submit" class="btn btn-primary">Simpan</button>
													</div>
												</form>
											</div>
											@endif
										</div>
					      			</div>
					      		</div>
					      		<div class="modal fade" id="del_{{ str_replace(' ', '_', $element->title) }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					      			<div class="modal-dialog">
					      				<div class="modal-content">
					      					<div class="modal-header">
					      						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					      						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      					</div>
					      					<div class="modal-body">{{ $element->title }}</div>
					      					<div class="modal-footer">
					      						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					      						<a href="{{ url('dlt_berita', ['id' => $element->id ]) }}" class="btn btn-danger">Hapus</a>
					      					</div>
					      				</div>
					      			</div>
					      		</div>
					      		@endforeach
								<div class="d-flex">
									<div class="mx-auto">
										{{ $proses->links() }}
									</div>
								</div>
					      	</div>
					      	<div class="tab-pane fade" id="agr">
					      		@php
					      			if (App\models\User::find(session()->get('loginid'))->category == 'admin') {
										$agree = App\models\Berita::where('verify', '=', 'y')->paginate(2);
									} else {
										$agree = App\models\Berita::where('user', '=', session()->get('loginid'))->where('verify', '=', 'y')->paginate(2);
									}
					      			// print_r($proses);
					      		@endphp
					      		@foreach ($agree as $element)
					      		<div class="card border-primary border-start-0 border-top-0 mb-3 p-2">
					      			<h4 class="card-header">{{ $element->title }}</h4>
				      				<table class="card-body table table-hover">
				      					<tr>
				      						<td><b>Dibuat : </b>{{ App\models\User::find($element->user)->name }}</td>
				      						<td><b>Diupload : </b>{{ $data->updated_at->diffForHumans() }}</td>
				      						{{-- <td><b>Kategori : </b>{{ App\models\Category::find($element->category)->name }}</td> --}}
				      					</tr>
				      					<tr>
				      						<td><b>Suka : </b>{{ count(json_decode($element->like, true))-1 }}</td>
				      						<td><b>Komentar : </b>{{ App\models\Comment::where('berita', '=', $element->id)->count() }}</td>
				      					</tr>
				      				</table>
				      				<div class="d-grid gap-2">
				      					<button class="btn btn-outline-secondary" type="button"   data-bs-toggle="modal" data-bs-target="#agree_{{ str_replace(' ', '_', $element->title) }}">Detail</button>
					      			</div>
									<div class="modal fade" id="agree_{{ str_replace(' ', '_', $element->title) }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-xl">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Detail berita</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<div class="row">
													  <div class="col-xs-12 col-sm-12 col-md-12">
														  <div class="form-group">
															  @php
																  $gtcat = App\models\Category::find($element->category);
															  @endphp
															  <p>Judul : <b>{{ $element->title }}</b>
																  Kategori : <b>{{ $gtcat->name }}</b>
															  </p>
														  </div>
													  </div>
													  <div class="col-xs-12 col-sm-12 col-md-12">
														  <div class="form-group">
															  <img src="{{ url('assets/berita_img/'.$element->pic) }}" class="img-thumbnail mx-auto d-block"  width="300" height="300">
														  </div>
													  </div>
													  <div class="col-xs-12 col-sm-12 col-md-12">
														  <div class="form-group">
															  <p class="m-2">{{ $element->desc }}</p>
														  </div>
													  </div>
												  </div>
												</div>
												<div class="modal-body">
													<hr>
													<div class="btn-group" role="group" aria-label="Basic example">
														<button type="button" class="btn btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#like">suka</button>
														<button type="button" class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#comment">komentar</button>
													</div>
													<div class="row m-1">
														<div class="collapse col-6" id="like">
															<p>suka ({{ count(json_decode($element->like, true))-1 }}) :</p>
															@php
																$aa = json_decode($element->like, true);
																// print_r($a);
															@endphp
															@foreach($aa as $key => $value)
																{{-- {{ $value }} --}}
																@if ($value += 0)
																{{ App\models\User::find($value)->name }},
																@endif
															@endforeach
														</div>
														<div class="collapse col-6" id="comment">
															@php
																$getcomment = App\models\Comment::where('berita', '=', $element->id)->get();
															@endphp
															<p>komentar ({{ App\models\Comment::where('berita', '=', $element->id)->count() }}) :</p>
															<p>
															@foreach ($getcomment as $comment)
															- {{ App\models\User::find($comment->user)->name }} : {{ $comment->comment }} <br>
															@endforeach
															</p>
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</div>
					      		</div>
					      		@endforeach
								<div class="d-flex">
									<div class="mx-auto">
										{{ $agree->links() }}
									</div>
								</div>
					      	</div>
					      	<div class="tab-pane fade" id="dagr">
					      		@php
					      			if (App\models\User::find(session()->get('loginid'))->category == 'admin') {
										$dagree = App\models\Berita::where('verify', '=', 'n')->paginate(2);
									} else {
										$dagree = App\models\Berita::where('user', '=', session()->get('loginid'))->where('verify', '=', 'n')->paginate(2);
									}
					      			// print_r($proses);
					      		@endphp
					      		@foreach ($dagree as $dagrees)
					      		<div class="card border-danger mb-3">
									<h4 class="card-header">{{ $dagrees->title }}</h4>
									<div class="card-body">
										<h5>{{ $dagrees->verify_desc }}</h5>
										<small>{{ $element->created_at->diffForHumans() }}</small>
									</div>
									<div class="btn-group" role="group" aria-label="Basic example">
										<button type="button" class="btn btn-outline-secondary"  data-bs-toggle="modal" data-bs-target="#dagree_{{ str_replace(' ', '_', $dagrees->title) }}">Detail</button>
										<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#del{{ $dagrees->id }}">Hapus</button>
									</div>
								</div>
								<div class="modal fade" id="dagree_{{ str_replace(' ', '_', $dagrees->title) }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-xl">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Detail berita</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<div class="row">
												  <div class="col-xs-12 col-sm-12 col-md-12">
													  <div class="form-group">
														  @php
															  $gtcat = App\models\Category::find($dagrees->category);
														  @endphp
														  <p>Judul : <b>{{ $dagrees->title }}</b>
															  Kategori : <b>{{ $gtcat->name }}</b>
														  </p>
													  </div>
												  </div>
												  <div class="col-xs-12 col-sm-12 col-md-12">
													  <div class="form-group">
														  <img src="{{ url('assets/berita_img/'.$dagrees->pic) }}" class="img-thumbnail mx-auto d-block"  width="300" height="300">
													  </div>
												  </div>
												  <div class="col-xs-12 col-sm-12 col-md-12">
													  <div class="form-group">
														  <p class="m-2">{{ $dagrees->desc }}</p>
													  </div>
												  </div>
											  </div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<div class="modal fade" id="del{{ $dagrees->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">{{ $dagrees->title }}</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												<a href="{{ url('dlt_berita', ['id' => $dagrees->id ]) }}" class="btn btn-danger">Hapus</a>												
											</div>
										</div>
									</div>
								</div>
					      		@endforeach
								  <div class="d-flex">
									<div class="mx-auto">
										{{ $dagree->links() }}
									</div>
								</div
					      	</div>
					      	<div class="tab-pane fade" id="src">
					      		<div>
									<form action="" method="get">
										<div class="input-group">
											<input id="login_id" type="text" value="{{ session()->get('loginid') }}" hidden>
											<input type="text" class="form-control" placeholder="Cari berita..." id="search">
											<button class="btn btn-outline-primary" type="button"><i class="fa fa-search"></i></button>
										</div>						
									</form>
									<div id="search_data">

									</div>
								</div>
					      	</div>
				      	</div>
				    </div>
				</div>
			</div>			
		</div>
		<div class="tab-pane fade" id="privasi">
			@if ($alert = Session::get('error'))
			<div class="alert alert-dismissible alert-warning m-5">
				<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				<h4 class="alert-heading">Mohon maaf</h4>
				<p class="mb-0">{{ $alert }}</a>.</p>
			</div>
			@endif

			<div class="card-body">
				<h3>Ganti Sandi</h3>
				<form method="post" action="{{ route('cg_pass') }}">
					<div class="form-group row">
						<label for="email" class="col-md-4 col-form-label text-md-right">Password</label>
						<div class="col-md-6">
							@csrf
							<input type="text" class="form-control" name="id" value="{{ $data->id }}" hidden>
							<input id="password" type="password" class="form-control" name="password" value="" required autocomplete="email" autofocus  required>
						</div>
					</div>
					<div class="form-group row mt-2">
						<label for="password" class="col-md-4 col-form-label text-md-right">Curent Password</label>
						<div class="col-md-6">
							<input id="cnfrpassword" type="password" class="form-control" name="cnfrpassword" required autocomplete="current-password" required>
						</div>
					</div>
					<div class="form-group row mb-0 m-1">
						<div class="col-md-8 offset-md-4">
							<button type="submit" class="btn btn-primary">
								Simpan
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_frm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <form id="frm" method="post" action="{{ route('edit_user') }}" enctype="multipart/form-data">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
		    <div class="modal-body">
			    <div class="row p-2">
			    	@csrf
			        <div class="col-xs-12 col-sm-12 col-md-12">
			            <div class="form-group">
			                <strong>Nama </strong>
			                <input type="text" name="id" value="{{ $data->id }}" hidden>
			                <input id="val_username" type="text" name="name" class="form-control" placeholder="username" value="{{ $data->name }}">
			            </div>
			        </div>
			        <div class="col-xs-12 col-sm-12 col-md-12">
			            <div class="form-group">
			                <strong>Email </strong>
			                <input id="val_email" type="email" name="email" class="form-control" placeholder="email" value="{{ $data->email }}">
			            </div>
			        </div>
			        <div class="col-xs-12 col-sm-12 col-md-12">
			            <div class="form-group">
			                <strong>Kategori </strong>
			                <input id="val_cat_user" type="text" name="cat_user" class="form-control" placeholder="Kategori" value="Penulis" readonly="true">
			            </div>
			        </div>
			        <div class="col-xs-12 col-sm-12 col-md-12">
			        	<div class="form-group">
			        		@if (is_null($data->pic))
				        		<strong>Foto profil </strong>
				        		<input class="form-control" type="file" name="pic" required>
			        		@else
				        		<strong>Foto profil </strong><sub class="text-danger">foto profil tersedia kosongi formulir jika tidak ingin mengganti foto profil<sub>
				        		<input class="form-control" type="file" name="pic" value="" accept=".jpg,.jpeg,.png">
			        		@endif
			        	</div>
			        </div>
			        <div class="col-xs-12 col-sm-12 col-md-12">
			            <div class="form-group">
			                <strong>Deskripsi </strong>
			                <textarea id="val_desc" type="text" name="desc" class="form-control" placeholder="Deskripsi">{{ $data->desc }}</textarea>
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

<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<script>
	$(document).ready(function() { 
		$("#prev_img").on("change", function() {
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

	$(document).ready(function() { 
		$(".edit_btn").on("click", function() {
			var id = $(this).data('id');
			$('#dtl_berita_'+id).attr('hidden', true);
			$('#form_edit_'+id).attr('hidden', false);
			$('#submit_btn_'+id).attr('hidden', false);
			console.log(id);
		});
	});	

	$(document).ready(function() { 
		var id = $(this).data('id');
		$("#close_btn").on("click", function() {
			$('#dtl_berita_'+id).attr('hidden', false);
			$('#form_edit_'+id).attr('hidden', true);
			$('#submit_btn_'+id).attr('hidden', true);
		});
	});	

	$(document).ready(function() { 
		$("#close_btn2").on("click", function() {
			var id = $(this).data('id');
			$('#dtl_berita_'+id).attr('hidden', false);
			$('#form_edit_'+id).attr('hidden', true);
			$('#submit_btn_'+id).attr('hidden', true);
		});
	});	

	$(document).ready(function() {
		$('#search').on('keyup', function(){
			var login_id = $('#login_id').val();
			var keyword = $('#search').val();
			let htmlView = '';
			$.ajax({
				url: "{{ route('search') }}",
				method: "get",
				data: {
						loginid: login_id,
						keyword: keyword,
				},
				dataType: "json",
				success: function(data) {
					// console.log(data.output);
					$('#search_data').html($(data.output).hide().fadeIn(500));
				}
			})
		});

	});

	
</script>
@endsection