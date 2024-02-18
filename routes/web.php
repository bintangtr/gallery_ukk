<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PreviewController;
use App\Http\Controllers\UploadController;
use App\Livewire\Upload;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/masuk', [AuthController::class, 'v_login'])->name('login');
Route::post('/masuk', [AuthController::class, 'login']);
Route::get('/daftar', [AuthController::class, 'v_register']);
Route::post('/daftar', [AuthController::class, 'register']);
Route::get('/keluar', [AuthController::class, 'logout']);

Route::get('/', [HomeController::class, 'home']);

Route::middleware('auth')->group(function(){
    Route::get('/album', [AlbumController::class, 'album']);
    Route::get('/upload', [UploadController::class, 'upload']);
    Route::post('/proses_upload', [UploadController::class, 'proses_upload']);

    Route::get('/preview/{foto_id}', [PreviewController::class, 'preview'])->name('page.upload.detail.preview');
    Route::post('/preview/{foto_id}/like', [PreviewController::class, 'toggleLike'])->name('like.toggle');
    Route::post('/preview/{id}/comment', [PreviewController::class, 'storeKomentar'])->name('comment.add');
    Route::delete('/preview/{data}/delete', [PreviewController::class, 'delete'])->name('preview.delete');
});
