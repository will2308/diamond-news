<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use session;

class UserController extends Controller
{
    public function index(){
        $user = User::paginate(5);
        return view('contents.user.user', compact('user'));
        // echo 'kdjasd;';
    }

    public function create(Request $req){
        $data = new User();

        $data->name = $req->name;
        $data->email = $req->email;
        $data->password =  Hash::make($req->password);
        $data->category = $req->cat_user;
        // $data->token = $req->token;
        if($req->hasfile('pict')){
            $upload_image_name = $req->id.date('dmY').'_'.$req->name.'.'.$req->file('pict')->extension();
            $req->pict->move('assets/berita_profil', $upload_image_name);
            $data->pic = $upload_image_name;        
        }
        $data->desc = $req->desc;
        $data->save();

        return redirect()->route('user');
        // echo $req->pict;
        // echo $req->hasFile('pict');
        // print_r($req->all());
    }

    public function update(User $user,Request $req)
    {
        // edit from admin
        $data = User::find($req->id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->password = $data->password;
        if ($req->password) {
            $data->password = Hash::make($req->password);
        }
        $data->category = $req->cat_user;
        if($req->hasfile('pict')){
            $upload_image_name = $req->id.date('dmY').'_'.$req->name.'.'.$req->file('pict')->extension();
            $req->pict->move('assets/berita_profil', $upload_image_name);        
        }
        else {
            $upload_image_name = $data->pic;
        }
        $data->pic = $upload_image_name;
        $data->desc = $req->desc;
        $data->save();

        return redirect()->route('user');
        // echo $req->pict;
        // if($req->hasfile('pict')){
        //     echo 'aaaa';
        // }
        // dd($req->all());
    }

    public function delete($id){

        $data = User::destroy($id);
        return redirect()->route('user');
        // echo 'ok';

    }

    public function profil(){
        $getid = Session()->get('loginid');
        $data = User::find($getid);
        return view('contents.home.profil', compact('data'));
    }

    public function edit(Request $req)
    {
        // edit from profil

        $data = User::find($req->id);
        $data->name = $req->name;
        $data->email = $req->email;
        if($req->hasfile('pic')){
            $upload_image_name = $req->id.date('dmY').'_'.$req->name.'.'.$req->file('pic')->extension();
            $req->pic->move('assets/berita_profil', $upload_image_name);        
        }
        else {
            $upload_image_name = $data->pic;
        }
        $data->pic = $upload_image_name;
        $data->desc = $req->desc;
        $data->save();

        return redirect()->route('profil');
        // print_r($data->pic);
        // echo 'ok';
    }

     public function cg_pass(Request $req)
    {
        if ($req->password == $req->cnfrpassword) {
            $data = User::find($req->id);
            $data->password =  Hash::make($req->password);
            $data->save();

            return redirect()->route('profil');
            // print_r($data);
        } else {
            return view('contents.home.profil#privasi')->with('error', 'Password yang anda masukan tidak sama!');
        }
    }
}
