<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome')->name('home');
});
Route::prefix('article')->group(function(){
    Route::get('/show',function(){ return view('article/show');})->name('articleshow');
    Route::get('/edit/{id}',function($id){ return view('article/show',["id",$id]);})->name('articleedit');
    Route::get('/create',function(){ return view('article/show');})->name('articlecreate');

});

Route::prefix('category')->group(function(){
    Route::get('/show',function(){ return view('category/show');})->name('categoryshow');
    Route::get('/edit/{id}',function($id){ return view('category/show',["id",$id]);})->name('categoryedit');
    Route::get('/create',function(){ return view('category/show');})->name('categorycreate');
});