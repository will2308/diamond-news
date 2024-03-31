<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
        <button class="btn btn-light" id="sidebarToggle"><i class="fa fa-bars"> </i></button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        @if (substr(URL::current(), strrpos(URL::current(), '/') + 1) == "category")
            <h4>Kategori</h4>
        @elseif (substr(URL::current(), strrpos(URL::current(), '/') + 1) == "report" )
            <h4>Laporan</h4>
        @else
            <h4 class="text-capitalize">{{ substr(URL::current(), strrpos(URL::current(), '/') + 1) }}</h4>
        @endif
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item active"><a class="nav-link text-primary" href="{{ route('home') }}">go to landing page <i class="fa fa-arrow-circle-right"></i></a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="#!">Link</a></li> --}}
            </ul>
        </circle-right
    </div>
</nav>