<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GrafikdtController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\BeritaDetailController;
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




Route::post('/getkabupaten', [RegisteredUserController::class, 'getkabupaten'])->name('getkabupaten');

Route::get('/landingpage', [GrafikdtController::class, 'showLandingPage'])->name('landingpage');

Route::middleware('user')->group(function () {
    
    Route::post('/komentar', [KomentarController::class, 'store'])->name('Komentar.store');
    Route::get('detail/DetailBerita/{id}', [BeritaDetailController::class, 'show'])->name('DetailBerita.show');
});





Route::middleware('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    
    //berita
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');

    Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
    
    Route::post('/news/update/{id}', [NewsController::class, 'update'])->name('news.update');

    Route::get('/news/destroy/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    Route::get('/news/json', [NewsController::class, 'json'])->name('news.json');

    //komentar
    Route::get('/komentar', [KomentarController::class, 'index'])->name('komentar.index');
    Route::get('/komentar/json', [KomentarController::class, 'json'])->name('komentar.json');
    Route::get('/komentar/destroy/{id}', [KomentarController::class, 'destroy'])->name('komentar.destroy');
    
    //user/roles
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/json', [UserController::class, 'json'])->name('user.json');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');

    Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    //check status
    Route::get('/user/status/update/{id}', [UserController::class, 'status'])->name('user.status.update');

    //update password
    Route::get('/user/editpassword/{id}', [UserController::class, 'editpassword'])->name('user.editpassword');
    Route::post('/user/updatepassword/{id}', [UserController::class, 'updatepassword'])->name('user.updatepassword');

    

   
});


require __DIR__.'/auth.php';
