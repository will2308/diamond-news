<div class="border-end bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-light">
        <small for="">Diamond news</small>
        <h4>Admin Page</h4>
    </div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('berita') }}"><i class="fa fa-newspaper"></i> Berita</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('category') }}"><i class="fa fa-keyboard"></i> Categori berita</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('user') }}"><i class="fa fa-user"></i> User</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('report') }}"><i class="fa fa-bar-chart"></i> Laporan</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> keluar</a>
    </div>
</div>