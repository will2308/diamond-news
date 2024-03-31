<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Berita;
use App\models\Category;
use App\models\User;
use App\models\Comment;
use Session;
use Illuminate\Support\Arr;

class BeritaController extends Controller
{
    public function index(){
        
        $berita = Berita::paginate(5);
        return view('contents.berita.berita', compact('berita'));
        // echo 'ok';
    }

    public function latest(){
        $berita = Berita::where('verify', '=', 'y')->orderBy('updated_at', 'desc')->Paginate(5);
        return view('contents.home.home', compact('berita'));
        // print_r(count(Comment::offset(9)->limit(1)->get()));
    }

    public function top(){
        
        $berita = Berita::where('verify', '=', 'y')->groupBy()->orderBY('like')->paginate(5);
        return view('contents.home.home', compact('berita'));
    }

    public function cat($id){
        $berita = Berita::where('verify', '=', 'y')->where('category', '=', $id)->Paginate(5);
        return view('contents.home.home', compact('berita'));
    }

    public function search_nav(Request $req){
        $berita = Berita::where('verify', '=', 'y')->where('title','LIKE','%'.$req->search.'%')->Paginate(5);
        return view('contents.home.home', compact('berita'));
        // echo $req->search;
    }

    public function approve(){
        return view('contents.home.approve');
    }

    public function add(){
        
        $cat = Category::all();
        $usr = User::all();
        return view('contents.berita.form_add', compact('cat', 'usr'));
        // echo 'ok';
    }

    public function save(Request $req){


        // $path = $req->file('pic')->store('/','public');

        $data = new Berita;
        $data->title = $req->title;
        $data->category = $req->category;
        $data->user = $req->user;
        $data->desc = $req->desc;
        $data->like = '{"usrid":0}';
        $data->verify = 'p';
        $data->verify_desc = 'proses';
        if($req->hasfile('pic')){
            $upload_image_name = $req->user.date('dmY').'_'.str_replace(' ', '_', $req->title).'.'.$req->file('pic')->extension();
            $req->pic->move('assets/berita_img', $upload_image_name);        
        }
        else {
            $upload_image_name = "Noimage";
        }
        $data->pic = $upload_image_name;
        $data->save();

        return redirect()->route('profil')->with('success', 'berita ditambahkan, menunggu persetujuan admin');
        // print_r($data);
        // echo $req->file('pic');

    }

    public function show($id){

        $data = Berita::find($id);
        $cat = Category::find($data->category);
        return view('contents.berita.detail', compact('data', 'cat'));
        // print_r($cat);


    }

    public function edit($id){

        $data = Berita::find($id);
        $cat_all = Category::all();
        $cat = Category::find($data->category);
        return view('contents.berita.form_edt', compact('data', 'cat_all', 'cat'));
        // print_r($cat);


    }

    public function edt_berita(Request $req, $id){

        $data = Berita::find($id);
        $data->title = $req->title;
        $data->category = $req->category;
        $data->desc = $req->desc;
        if($req->hasfile('pic')){
            $upload_image_name = $req->user.date('dmY').'_'.str_replace(' ', '_', $req->title).'.'.$req->file('pic')->extension();
            $req->pic->move('assets/berita_img', $upload_image_name);    
            $data->pic = $upload_image_name;
        }
        else {
            $data->pic = $data->pic;
        }
        $data->save();

        return redirect()->back();
        // echo $id;
        // print_r($req->all());


    }

    public function update(Request $req, $id)
    {

        $data = Berita::find($id);
        $data->verify = $req->verify;
        $data->verify_desc = $req->verify_desc;
        $data->save();

        return redirect()->back();
        // print_r($req->all());
        // echo 'ok';
    }

    public function delete($id){

        $data = Berita::destroy($id);
        return redirect()->back();
        // echo $id;

    }

    public function comment(Request $req)
    {

        $comment = new Comment;
        $comment->user = $req->user;
        $comment->berita = $req->berita;
        $comment->comment = $req->comment;
        $comment->save();

        return redirect()->route('home');
        // print_r($comment);
        // echo 'ok';
    }

    public function like(Request $req, $id){
        // // declarate array
        $like = Berita::find($id);
        $getidusr = json_decode(Session()->get('loginid'));
        $dclrarr = '{"usrid'.$getidusr.'":'.$getidusr.'}';
        $tojson = json_decode($dclrarr, true);
        $tojsonlike = json_decode($like->like, true);
        $mergelike = json_encode(array_merge($tojsonlike,$tojson));

        // save
        $like->like = $mergelike;
        $like->save();
        return redirect()->back();

        // print_r($like->like);
        // echo $getidusr;
    }

    public function search(Request $req){
        $cat = $req->loginid;
        if (User::find($cat)->category == 'admin') {
            if($req->keyword != ''){
                $berita = Berita::where('title','LIKE','%'.$req->keyword.'%')->get();
            }
        } else {
            if($req->keyword != ''){
                $berita = Berita::where('user','=', $cat)->where('title','LIKE','%'.$req->keyword.'%')->get();
            }
        }

        if (count($berita) > 0) {
            $output = '<div>';
            foreach ($berita as $data) {
                if ($data->verify == 'p') {
                    $status = 'proses';
                } elseif($data->verify == 'y'){
                    $status = 'Disetujui';
                } else {
                    $status = 'Ditolak';
                }
                $gtcat = Category::find($data->category);
                $output .= '<div class="card m-2">
                                <div class="card-body">
                                    <h5>Judul  : '.$data->title.'</h5>
                                    <p>
                                        Dibuat : '.$data->created_at.' <br>
                                        Status : '.$status.'
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-outline-secondary"  data-bs-toggle="modal" data-bs-target="#search_'.$data->id.'">Detail</button>
                                    <button type="button" class="btn btn-outline-danger"  data-bs-toggle="modal" data-bs-target="#del_'.$data->id.'">Hapus</button>
                                </div>
                            </div>
                            <div class="modal fade" id="search_'.$data->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <p>Judul : <b>'.$data->title.'</b>
                                                            Kategori : <b>'.$gtcat->name.'</b>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <img src="'.url('assets/berita_img/'.$data->pic).'" class="img-thumbnail mx-auto d-block"  width="300" height="300">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <p class="m-2">'.$data->desc.'</p>
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
                            <div class="modal fade" id="del_'.$data->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">'.$data->title.'</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a href="'.url('dlt_berita', ['id' => $data->id ]).'" class="btn btn-danger">Hapus</a>												
                                        </div>
                                    </div>
                                </div>
                            </div>';          
            }
            $output .= '</div>';
        } else {
            $output = '<p>Kosong...</p>';
        }
       
        
        return response()->json([
            // 'berita' => $berita,
            'output'=> $output,
            'data' => $berita,
        ]);
    }
}
