<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;

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
    return view('welcome');
});

Route::post('/getkabupaten', [RegisteredUserController::class, 'getkabupaten'])->name('getkabupaten');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');

    Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
    
    Route::post('/news/update/{id}', [NewsController::class, 'update'])->name('news.update');

    Route::get('/news/destroy/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    Route::get('/news/json', [NewsController::class, 'json'])->name('news.json');
   
});

require __DIR__.'/auth.php';
