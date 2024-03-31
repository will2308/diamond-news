<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\models\User;
use App\models\Berita;
use App\models\Comment;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;

class AuthController extends Controller
{

    public function home()
    {
        $berita = Berita::where('verify', '=', 'y')->Paginate(5);
        return view('contents.home.home', compact('berita'));
        // print_r(count(Comment::offset(9)->limit(1)->get()));
    }

    public function load_more(Request $req){
        $page = $req->input('page');
        $brt = $req->input('brt');
        $comment = Comment::where('berita', '=', $brt)->offset($page)->limit(1)->get();
        if (strval(count($comment)) == '0') {
           $output = 0;
        } else {
            foreach ($comment as $comm) {
                $output = '<div class="accordion-body p-0 m-1">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="toast-header">
                                    <strong class="me-auto">'.User::find($comm->user)->name.'</strong>
                                    <small>'.$comm->created_at->diffForHumans().'</small>
                                </div>
                                <div class="toast-body">
                                '.$comm->comment.'
                                </div>
                            </div>
                        </div>
                    </div>';
            }
        }
       
        return response()->json([
            'data' => $output,
        ]);
    }

    public function register(){
        return view('contents.home.register');
    }

     public function login(){
        return view('contents.home.login');
    }

    public function dashboard(){

        $data = array();
        if (session()->has('loginid')) {
            $data = User::where('id', '=', session()->get('loginid'))->first();
        }
        return view('contents.home.dashboard', compact('data'));
        // print_r($data);

    }

    public function dologin(Request $req){

        $user = User::where('email', '=', $req->email)->first();
        if ($user) {
            if (Hash::check($req->password, $user->password)) {
                $req->session()->put('loginid', $user->id);
                return redirect()->route('home');
            } else {
                // echo 'error2';
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function doregist(Request $req){

        if ($req->password == $req->cnfrpassword) {
            $data = new User();

            $data->name = $req->name;
            $data->email = $req->email;
            $data->password =  Hash::make($req->password);
            $data->category = 'user';
            $data->desc = 'hello im '.$req->name.', i love DIAMOND' ;
            $data->save();

            return redirect()->route('login');
            // print_r($data);
        } else {
            return back()->with('error', 'Password yang anda masukan tidak sama!');
        }
    }

    public function logout(){
         if (session()->has('loginid')) {
            session()->pull('loginid');
            return redirect()->route('home');
        }
    }
}
