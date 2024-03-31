<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('contents.home');
// });
// Route::get('/admin', function(){
//     return view('contents.dashboard');
// });

// login
Route::get('/',[AuthController::class, 'home'])->name('home');
Route::get('/load_more',[AuthController::class, 'load_more'])->name('load_more');
Route::get('login',[AuthController::class, 'login'])->name('login')->middleware('rd_logged');
Route::get('register',[AuthController::class, 'register'])->name('register')->middleware('rd_logged');
Route::get('dologin',[AuthController::class, 'dologin'])->name('dologin');
Route::post('doregist',[AuthController::class, 'doregist'])->name('doregist');
Route::get('logout',[AuthController::class, 'logout'])->name('logout');

Route::middleware('nd_logged')->group(function(){

    Route::get('dashboard',[AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin',[AuthController::class, 'dashboard'])->name('admin');
    
    // user
    Route::get('user',[UserController::class, 'index'])->name('user');
    Route::get('sv_user',[UserController::class, 'create'])->name('sv_user');
    Route::get('edt_user',[UserController::class, 'update'])->name('edt_user');
    Route::get('dlt_user/{id}',[UserController::class, 'delete'])->name('dlt_user');
    Route::get('profil',[UserController::class, 'profil'])->name('profil');
    Route::post('edit_user',[UserController::class, 'edit'])->name('edit_user');
    Route::post('cg_pass',[UserController::class, 'cg_pass'])->name('cg_pass');

    // category
    Route::get('category',[CategoryController::class, 'index'])->name('category');
    Route::get('sv_cat',[CategoryController::class, 'create'])->name('sv_cat');
    Route::get('edt_cat',[CategoryController::class, 'update'])->name('edt_cat');
    Route::get('dlt_cat/{id}',[CategoryController::class, 'delete'])->name('dlt_cat');

    // berita
    Route::get('berita',[BeritaController::class, 'index'])->name('berita');
    Route::get('add_berita',[BeritaController::class, 'add'])->name('add_berita');
    Route::post('sv_berita',[BeritaController::class, 'save'])->name('sv_berita');
    Route::get('shw_berita/{id}',[BeritaController::class, 'show'])->name('shw_berita');
    Route::get('edt_berita/{id}',[BeritaController::class, 'edit'])->name('edt_berita');
    Route::get('update_berita/{id}',[BeritaController::class, 'update'])->name('update_berita');
    Route::get('dlt_berita/{id}',[BeritaController::class, 'delete'])->name('dlt_berita');
    Route::post('add_comment',[BeritaController::class, 'comment'])->name('add_comment');
    Route::get('add_like/{id}',[BeritaController::class, 'like'])->name('add_like');
    Route::get('approve',[BeritaController::class, 'approve'])->name('approve');
    Route::get('edit_berita/{id}',[BeritaController::class, 'edt_berita'])->name('edit_berita');
    Route::get('search',[BeritaController::class, 'search'])->name('search');
    Route::get('latest',[BeritaController::class, 'latest'])->name('latest');
    Route::get('top',[BeritaController::class, 'top'])->name('top');
    Route::get('cat/{id}',[BeritaController::class, 'cat'])->name('cat');
    Route::get('search_nav',[BeritaController::class, 'search_nav'])->name('search_nav');

    // report
    Route::get('report',[ReportController::class, 'index'])->name('report');
    Route::get('day',[ReportController::class, 'day'])->name('day');
    Route::get('week',[ReportController::class, 'week'])->name('week');
    Route::get('month',[ReportController::class, 'month'])->name('month');
    Route::get('year',[ReportController::class, 'year'])->name('year');


});

