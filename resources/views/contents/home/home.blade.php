@extends('layout.main')
@section('contents')
<div class="container p-1">
	<button class="btn btn-primary position-fixed bottom-0 end-0 m-4" onclick="topFunction()" id="myBtn" title="Go to top" style="z-index: 1;">Top<i class="fa fa-arrow-up"></i></button>
		{{-- @include('contents.home.data') --}}
	@if (count($berita) > 0)
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
						<div class="card-body p-0" id="items_comments{{$data->id}}">
							@php
								$getcomment = App\models\Comment::where('berita', '=', $data->id)->paginate(1);
							@endphp
							@if ($getcomment[0])
								@foreach ($getcomment as $comment)
								<div class="accordion-body p-0 m-1">
									<div class="card bg-light">
										<div class="card-body">
											<div class="toast-header">
												<strong class="me-auto">{{ App\models\User::find($comment->user)->name }}</strong>
												<small>{{ $comment->created_at->diffForHumans() }}</small>
											</div>
											<div class="toast-body">
											{{ $comment->comment }}
											</div>
										</div>
									</div>
								</div>
								@endforeach
							@else
								<div class="toast-header">
									<strong class="me-auto">Tidak ada komentar</strong>
								</div>
							@endif
							
						</div>
						<div class="text-center mb-1">
							<button id="load_more_button" data-cm_id="{{$data->id}}" data-page="{{ $getcomment->currentPage() + 1 }}" class="btn btn-primary load_more_button{{$data->id}}">Load More</button>
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
	@else
		<center><h2>Tidak ada berita untuk ditampilkan </h2></center>
	@endif
	
	<hr class="rounded-circle" style="opacity:1">
	<div class="d-flex">
		<div class="mx-auto">
			{!! $berita->links() !!}
		</div>
	</div>

	<script src="{{ url('assets/js/jquery.min.js') }}"></script>
	<script type="text/javascript">
		mybutton = document.getElementById("myBtn");
		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				mybutton.style.display = "block";
			} else {
				mybutton.style.display = "none";
			}
		}
		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
			document.body.scrollTop = 0; // For Safari
			document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
		}

		function cplink() {
		  navigator.clipboard.writeText(window.location.href);
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(document).on('click', '#all_desc_news', function() {
				var id_brt = $(this).data('id_brt');
				var dall = $(this).data('dall');
				var dlmt = $(this).data('dlmt');
				$('#desc_news'+id_brt).html(dall);				
				$('.all_desc_news'+id_brt).attr('hidden', true);				
				$('.lmt_desc_news'+id_brt).attr('hidden', false);				
			});
				$(document).on('click', '#lmt_desc_news', function() {
				var id_brt = $(this).data('id_brt');
				var dall = $(this).data('dall');
				var dlmt = $(this).data('dlmt');
				$('#desc_news'+id_brt).html(dlmt);				
				$('.all_desc_news'+id_brt).attr('hidden', false);				
				$('.lmt_desc_news'+id_brt).attr('hidden', true);				
			});
		});
	</script>
	<script>
        $(document).ready(function() {
			var page ={};

            $(document).on('click', '#load_more_button', function() {
				var brt = $(this).data('cm_id');
				
				if(jQuery.isEmptyObject(page)){
					var name_page = '{page_'+brt+':1}';
					var conv_name_page = JSON.parse(name_page.replaceAll(':', '":"').replaceAll('{','{"').replaceAll('}','"}').replaceAll(',','","'));
					page = $.extend({}, page, conv_name_page);
				} else if(page['page_' + brt]){
					// tes = $.extend({}, tes, tesss);
					page['page_' + brt] = parseInt(page['page_' + brt]) + parseInt('1');
				}  else {
					var name_page = '{page_'+brt+':1}';
					var conv_name_page = JSON.parse(name_page.replaceAll(':', '":"').replaceAll('{','{"').replaceAll('}','"}').replaceAll(',','","'));
					page = $.extend({}, page, conv_name_page);
				}
				// console.log(page);
			            
				$.ajax({
                    url: "{{ route('load_more') }}",
                    method: "GET",
                    data: {
						brt: brt,
                        page: page['page_' + brt],
                    },
                    dataType: "json",
                    beforeSend: function() {
                        $('.load_more_button'+brt).html('Loading...');
                        $('.load_more_button'+brt).attr('disabled', true);
                    },
                    success: function(data) {

                        if (data.data.length > 0) {

                            //append data with fade in effect
                            $('#items_comments'+brt).append($(data.data).hide().fadeIn(1000));
                            $('.load_more_button'+brt).html('Load More');
                            $('.load_more_button'+brt).attr('disabled', false);
							// console.log("berita = "+x.berita+" start = "+x.start_brt);
                        } else {
                            $('.load_more_button'+brt).html('No More Data Available');
                            $('.load_more_button'+brt).attr('disabled', true);
                        }
                    }
                });
            });
        });
    </script>

@endsection