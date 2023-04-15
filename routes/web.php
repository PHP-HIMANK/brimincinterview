<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function() {
    Route::get('/posts', [PostController::class,'index'])->name('posts');
    Route::get('/createpost', [PostController::class,'create'])->name('createpost');
    Route::post('/storepost', [PostController::class,'store'])->name('storepost');
    Route::get('/editpost/{id}', [PostController::class,'edit'])->name('editpost');
    Route::put('/updatepost', [PostController::class,'update'])->name('updatepost');
    Route::delete('/deletepost/{id}', [PostController::class,'destroy'])->name('deletepost');
    Route::get('/userprofile', [ProfileController::class,'index'])->name('userprofile');
    Route::get('/editprofile/{id}', [ProfileController::class,'edit'])->name('editprofile');
    Route::put('/updateprofile', [ProfileController::class,'update'])->name('updateprofile');
    Route::delete('/deleteprofile/{id}', [ProfileController::class,'destroy'])->name('deleteprofile');
});

require __DIR__.'/auth.php';
