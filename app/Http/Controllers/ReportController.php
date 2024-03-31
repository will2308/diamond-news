<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Berita;
use App\models\Category;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    public function index(){
        return view('contents.report.report');
    }

    public function day(Request $req){
        $day = $req->date;
        $berita = Berita::where('created_at','LIKE',$day.'%')->orwhere('updated_at','LIKE',$day.'%')->get();
        $user = User::where('created_at','LIKE',$day.'%')->orwhere('updated_at','LIKE',$day.'%')->get();
        $category = Category::where('created_at','LIKE',$day.'%')->orwhere('updated_at','LIKE',$day.'%')->get();
        return view('contents.report.day', compact('day', 'berita', 'user', 'category'));
    }

    public function week(Request $req){
        $week = $req->date;
        $getweek = Carbon::parse($week);
        $startweek = $getweek->startOfWeek()->format('Y-m-d');
        $endweek = $getweek->endOfWeek()->format('Y-m-d');
        $berita = Berita::whereBetween('created_at', [$startweek,$endweek])->orwhereBetween('updated_at', [$startweek,$endweek])->get();
        $user = User::whereBetween('created_at', [$startweek,$endweek])->orwhereBetween('updated_at', [$startweek,$endweek])->get();
        $category = Category::whereBetween('created_at', [$startweek,$endweek])->orwhereBetween('updated_at', [$startweek,$endweek])->get();
        return view('contents.report.week', compact('week', 'berita', 'user', 'category'));
    }

    public function month(Request $req){
        $getmonth = $req->date;
        $month = Carbon::parse($getmonth)->month;
        $berita = Berita::whereMonth('created_at', $month)->orwhereMonth('updated_at', $month)->get();
        $user = User::whereMonth('created_at', $month)->orwhereMonth('updated_at', $month)->get();
        $category = Category::whereMonth('created_at', $month)->orwhereMonth('updated_at', $month)->get();
        return view('contents.report.month', compact('month', 'berita', 'user', 'category'));
    }

    public function year(Request $req){
        $year = $req->date;
        $berita = Berita::whereYear('created_at', $year)->orwhereYear('updated_at', $year)->get();
        $user = User::whereYear('created_at', $year)->orwhereYear('updated_at', $year)->get();
        $category = Category::whereYear('created_at', $year)->orwhereYear('updated_at', $year)->get();
        return view('contents.report.year', compact('year', 'berita', 'user', 'category'));
    }
}
