<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laporan Mingguan</title>

        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/styles.css') }}">
        <link rel="stylesheet" href="{{ url('assets/fontawesome/css/all.min.css') }}"/>

        <style media="print">
            @page {
             size: auto;
             margin: 0;
            }
        </style>

    </head>
    <body>

        <div id="page-content-wrapper" id="print_area">          
            <h2 class="text-center">Diamond News</h2>
            <h5 class="text-center">Laporan minggu : <b>{{ $week }}</b></h5>
            <center>
                <hr class="text-center" style="width: 50%; opacity:1">
                <hr class="text-center" style="width: 25%; opacity:1">
            </center>
            <div class="container">
                <section>
                    <h3>1. berita</h3>
                    <table class="table">
                        <thead class="table-light">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">judul</th>
                            <th scope="col">penulis</th>
                            <th scope="col">status</th>
                            <th scope="col">ulasan</th>
                            <th scope="col">jumlah suka/komentar</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($berita) > 0)
                                @foreach($berita as $data)
                                <tr class="table-active">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ App\models\User::find($data->user)->name }}</td>
                                    <td>{{ $data->verify }}</td>
                                    <td>{{ $data->verify_desc }}</td>
                                    <td>{{ count(json_decode($data->like, true))-1 }} / {{ App\models\Comment::where('berita', '=', $data->id)->count() }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">tidak ada penambahan atau perubahan data</td>
                                </tr>
                            @endif 
                        </tbody>
                    </table>
                </section>
                <section>
                    <h3>2. User</h3>
                    <table class="table">
                        <thead class="table-light">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">nama</th>
                            <th scope="col">email</th>
                            <th scope="col">role/jabatan</th>
                            <th scope="col">deskripsi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($user) > 0)
                                @foreach($user as $users)
                                <tr class="table-active">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $users->name }}</td>
                                    <td>{{ $users->email }}</td>
                                    <td>{{ $users->category }}</td>
                                    <td>{{ $users->desc }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">tidak ada penambahan atau perubahan data</td>
                                </tr>
                            @endif 
                        </tbody>
                    </table>
                </section>
                <section>
                    <h3>3. Kategori</h3>
                    <table class="table">
                        <thead class="table-light">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">nama</th>
                            <th scope="col">deskripsi</th>
                            <th scope="col">dibuat</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($category) > 0)
                                @foreach($category as $cat)
                                <tr class="table-active">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cat->name }}</td>
                                    <td>{{ $cat->desc }}</td>
                                    <td>{{ $cat->created_at }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">tidak ada penambahan atau perubahan data</td>
                                </tr>
                            @endif 
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
        <button class="btn btn-primary position-fixed bottom-0 end-0 m-4" id="btn_print" title="Go to top" style="z-index: 1;">print <i class="fa fa-print"></i></button>

        
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('assets/js/jquery.min.js') }}"></script>
        <script type="text/javascript">
            mybutton = document.getElementById("btn_print");
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
                }
            }

            $("#btn_print").click(function () {
                $("#btn_print").prop('hidden', true);
                window.print();
                $("#btn_print").prop('hidden', false);
            });
        </script>
    </body>
</html>