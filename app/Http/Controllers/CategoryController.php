<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        
        $category = Category::paginate(5);
        return view('contents.category.category', compact('category'));
        // echo 'ok';
    }

    public function create(Request $req){
        $data = new Category();

        $data->name = $req->name;
        $data->desc = $req->desc;
        $data->save();

        return redirect()->route('category');
        // print_r($data);
    }

    public function update(Request $req)
    {
        $data = Category::find($req->id);
        $data->name = $req->name;
        $data->desc = $req->desc;
        $data->save();

        return redirect()->route('category');
        // print_r($req->id);
        // echo 'ok';
    }

    public function delete($id){

        $data = Category::destroy($id);
        return redirect()->route('category');
        // echo $id;

    }
}
