<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AlbumController;

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

Route::get('/', [HomeController::class,'index']) ->name('home');

Route::get('/criaAlbum',[AlbumController::class,'load_create_page'])->name('album.create');

Route::post('/criaAlbum',[AlbumController::class,'receive_form_data'])->name('album.data.upload');

Route::get('/albums/{id}',[AlbumController::class,'load_view_page']);

Route::get('/albums/{id}/edit',[AlbumController::class,'load_edit_page']);

Route::post('/albums/{id}/edit',[AlbumController::class,'receive_edit_data']);