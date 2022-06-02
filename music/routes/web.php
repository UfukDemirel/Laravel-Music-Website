<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Search\SearchController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/')->middleware('isLogout')->group(function (){
Route::get('login',[BackendController::class,"login"])->name('login');
Route::post('loginpost',[BackendController::class,"loginpost"])->name('loginpost');
});

Route::prefix('/')->middleware('isAdmin')->group(function (){
Route::get('dashboard',[BackendController::class,"dashboard"])->name('dashboard');
Route::get('exit',[BackendController::class,"exit"])->name('exit');
Route::get('music',[BackendController::class,"music"])->name('music');
Route::get('addmusic',[BackendController::class,"addmusic"])->name('addmusic');
Route::post('addmusicpost',[BackendController::class,"addmusicpost"])->name('addmusicpost');
Route::get('edit/{id}',[BackendController::class,"edit"])->name('edit');
Route::post('editpost/{id}',[BackendController::class,"editpost"])->name('editpost');
Route::get('delete/{id}',[BackendController::class,"delete"])->name('delete');
Route::get('searchmusic',[SearchController::class,"searchmusic"])->name('searchmusic');
});

Route::get('home',[FrontendController::class,"home"])->name('home');

