@extends('layout.admin')
@section('admin')

    <style>
        .ui-datepicker-calendar {
            display: none;
        }
    </style>

    <div class="row container">
        <div class="col-6">
            <div class="card border-primary m-2" data-bs-toggle="modal" data-bs-target="#day">
                <div class="card-header">
                    <h3>Laporan Harian</h3>
                </div>
            </div> 
        </div>
        <div class="modal fade" id="day" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Laporan Harian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('day') }}" method="get">
                            @csrf
                            @method('post')
                            <div class="input-group">
                                <input type="date" class="form-control" placeholder="Cari berita..." name="date">
                                <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i></button>
                            </div>	
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6" data-bs-toggle="modal" data-bs-target="#week">
            <div class="card border-secondary m-2">
                <div class="card-header">
                    <h3>Laporan Mingguan</h3>
                </div>
            </div>
        </div>
        <div class="modal fade" id="week" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Laporan Harian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('week') }}" method="get">
                            @csrf
                            @method('post')
                            <div class="input-group">
                                <input type="week" class="form-control" name="date" min="2024-W01">
                                <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i></button>
                            </div>	
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card border-info m-2" data-bs-toggle="modal" data-bs-target="#month">
                <div class="card-header">
                    <h3>Laporan Bulanan</h3>
                </div>
            </div>
        </div>
        <div class="modal fade" id="month" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Laporan Harian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('month') }}" method="get">
                            @csrf
                            @method('post')
                            <div class="input-group">
                                <input type="month" class="form-control" placeholder="Cari berita..." name="date">
                                <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i></button>
                            </div>	
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card border-danger m-2" data-bs-toggle="modal" data-bs-target="#year">
                <div class="card-header">
                    <h3>Laporan tahunan</h3>
                </div>
            </div>
        </div>
        <div class="modal fade" id="year" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Laporan Harian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('year') }}" method="get">
                            @csrf
                            @method('post')
                            <div class="input-group">
                                <select class="form-select" name="date">
                                    <option value="2024" selected>2024</option>
                                    <option value="2023" >2023</option>
                                    <option value="2022" >2022</option>
                                    <option value="2021" >2021</option>
                                </select>
                                <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i></button>
                            </div>	
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection