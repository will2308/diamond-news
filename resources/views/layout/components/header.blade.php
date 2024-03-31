<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light mt-1">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}"><h3 >Diamonds</h3></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav me-auto">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('latest') }}">Tebaru</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('top') }}">Teratas</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Kategori</a>
            <div class="dropdown-menu">
              @php
                $gtcat = App\models\Category::all();
              @endphp
              @foreach ($gtcat as $cat)
                <a class="dropdown-item" href="{{ route('cat', ['id' => $cat->id ]) }}">{{$cat->name}}</a>
              @endforeach
            </div>
          </li>
        </ul>
      </ul>
      <div>
        <ul class="navbar-nav">
          <form action="{{ route('search_nav') }}" class="d-flex">
            <input class="form-control me-sm-2" name="search" type="text" placeholder="Cari Berita">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
          </form>
          @if (session()->get('loginid'))
            <li class="nav-item">
                <a href="{{ route('add_berita') }}" class="nav-link p-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Berita"><i class="fa fa-square-plus fa-2xl"></i></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle p-3 ps-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-xl"></i></a>
              <div class="dropdown-menu" style="left: -100;">
                <a class="dropdown-item" href="{{ route('profil') }}">Profil</a>
                @if (App\models\User::find(session()->get('loginid'))->category == 'admin')
                  <a class="dropdown-item" href="{{ route('dashboard') }}">Admin page</a>
                @endif
                <div class="dropdown-divider"></div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}">keluar</a>
              </div>
            </li>
          @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Masuk</a>
              <div class="dropdown-menu" style="left: -100;">
                <a class="dropdown-item" href="{{ route('login') }}">Masuk</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('register') }}">Daftar</a>
              </div>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</nav>