<?php

use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Monolog\Level;

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
// Route::get('/', function () {
//     return view('blog.template');
// });

//Level
Route::get('/level', [LevelController::class, 'index']);
Route::get('/level/create', [LevelController::class, 'create']);
Route::post('/level', [LevelController::class, 'store']);
Route::get('/level/{id}/update', [LevelController::class, 'update'])->name('level.update');
Route::post('/level/{id}/edit', [LevelController::class, 'edit'])->name('level.edit');
Route::get('/level/hapus/{id}', [LevelController::class, 'destroy'])->name('level.destroy');


//User
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/create', [UserController::class, 'create']);
// Route::post('/user', [UserController::class, 'store']);
// Route::get('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
// Route::post('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
// Route::get('/user/hapus/{id}', [UserController::class, 'destroy'])->name('user.destroy');


// Kategori
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

//POS Controller
// Route::resource('user', POSController::class);
// Route::group(['prefix' => 'user'], function () {
//     Route::get('/', [POSController::class, 'index'])->name('user.index');
//     Route::get('/create', [POSController::class, 'create'])->name('user.create');
//     Route::post('/', [POSController::class, 'store'])->name('user.store');
//     Route::get('/{id}', [POSController::class, 'show'])->name('user.show');
//     Route::get('/{id}/edit', [POSController::class, 'edit'])->name('user.edit');
//     Route::put('/{id}', [POSController::class, 'update'])->name('user.update');
//     Route::delete('/{id}', [POSController::class, 'destroy'])->name('user.destroy');
// });


//Laravel Starter Code
Route::get('/', [WelcomeController::class, 'index']);
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::post('/list', [UserController::class, 'list'])->name('user.list');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});


