<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Diamond news</title>

        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/styles.css') }}">
        <link rel="stylesheet" href="{{ url('assets/fontawesome/css/all.min.css') }}"/>
        
    </head>
    <body>

        <div id="page-content-wrapper">
            {{-- header --}}
            @include('layout.components.header')

            <!-- Page content-->
             @yield('contents')
                
        </div>
        
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    </body>
</html>