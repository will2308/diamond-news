@extends('layout.main')
@section('contents')

<div class="container">
    {{-- <div class="col-4"> --}}
        <div class="btn-group m-2" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary">Left</button>
            <button type="button" class="btn btn-primary">Middle</button>
            <button type="button" class="btn btn-primary">Right</button>
          </div>
      {{-- <div class="list-group">
        <a class="list-group-item list-group-item-action active" data-bs-toggle="tab" href="#prs">Proses <span class="badge bg-primary rounded-pill">{{ App\models\Berita::where('verify', '=', 'p')->count() }}</span></a>
        <a class="list-group-item list-group-item-action" data-bs-toggle="tab" href="#agr">Disetujui <span class="badge bg-primary rounded-pill">{{ App\models\Berita::where('verify', '=', 'y')->count() }}</span></a>
        <a class="list-group-item list-group-item-action" data-bs-toggle="tab" href="#dagr">Ditolak <span class="badge bg-primary rounded-pill">{{ App\models\Berita::where('verify', '=', 'n')->count() }}</span></a>
        <a href="{{ route('add_berita') }}" class="list-group-item list-group-item-action">Tambah Berita <span class="badge bg-primary rounded-pill"><i class="fa fa-plus"></i></span></a>
        <a class="list-group-item list-group-item-action" data-bs-toggle="tab" href="#src">Cari <span class="badge bg-primary rounded-pill"><i class="fa fa-search"></i></span></a>
      </div> --}}
    {{-- </div> --}}
    {{-- <div class="col-8"> --}}
        <div id="myTabContent" class="tab-content" tabindex="0">
            <div class="tab-pane fade active show" id="prs">
                @php
                if (App\models\User::find(session()->get('loginid'))->category == 'admin') {
                    $proses = App\models\Berita::where('verify', '=', 'p')->get();
                } else {
                    $proses = App\models\Berita::where('user', '=', session()->get('loginid'))->where('verify', '=', 'p')->get();
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
                        <button type="button" class="btn btn-outline-secondary"  data-bs-toggle="modal" data-bs-target="#{{ str_replace(' ', '_', $element->title) }}">Detail</button>
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#del{{ $element->title }}">Hapus</button>
                    </div>
                </div>
                <div class="modal fade" id="{{ str_replace(' ', '_', $element->title) }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="del{{ $element->title }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">{{ $element->title }}</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="tab-pane fade" id="agr">
                @php
                    $agree = App\models\Berita::where('user', '=', session()->get('loginid'))->where('verify', '=', 'y')->paginate(5);
                    // print_r($proses);
                @endphp
                @foreach ($agree as $element)
                <div class="card border-primary border-start-0 border-top-0 mb-3 p-2">
                    <h4 class="card-header">{{ $element->title }}</h4>
                    <table class="card-body table table-hover">
                        <tr>
                            <td><b>Dibuat : </b>{{ App\models\User::find($element->user)->name }}</td>
                            {{-- <td><b>Diupload : </b>{{ $data->updated_at->diffForHumans() }}</td> --}}
                            {{-- <td><b>Kategori : </b>{{ App\models\Category::find($element->category)->name }}</td> --}}
                        </tr>
                        <tr>
                            <td><b>Suka : </b>{{ count(json_decode($element->like, true))-1 }}</td>
                            <td><b>Komentar : </b>{{ App\models\Comment::where('berita', '=', $element->id)->count() }}</td>
                        </tr>
                    </table>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-secondary" type="button">Detail</button>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="tab-pane fade" id="dagr">
                @php
                    $dagree = App\models\Berita::where('user', '=', session()->get('loginid'))->where('verify', '=', 'n')->paginate(5);
                    // print_r($proses);
                @endphp
                @foreach ($dagree as $tes)
                <div class="card border-light mb-3">
                    <h4 class="card-header">{{ $tes->title }}</h4>
                    <p class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                @endforeach
            </div>
            <div class="tab-pane fade" id="src">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    {{-- </div> --}}
</div>

@endsection