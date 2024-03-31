<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Berita</title>

        <link href="{{ url('assets/css/bootstrap.min.css') }}">
        <link href="{{ url('assets/css/styles.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ url('assets/fontawesome/css/all.min.css') }}"/>
        
    </head>
    <body>
        <div class="d-flex" id="wrapper">

            @include('layout.components.admin_sidebar')

            <div id="page-content-wrapper">
                <!-- Top navigation-->
                @include('layout.components.admin_header')
                <!-- Page content-->
                <div class="container-fluid">
           
                 @yield('admin')
                    
                </div>
            </div>


        </div>

        <script src="{{ url('assets/js/scripts.js') }}"></script>
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('assets/js/popper.min.js') }}"></script>
        <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    </body>
</html>