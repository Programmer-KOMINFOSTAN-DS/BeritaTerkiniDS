<?php

use PHPInsight\Sentiment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GrafikdtController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\SentimenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BeritaDetailController;
use App\Http\Controllers\VisitController;
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



// Route::get('detail/DetailBerita/{id}', [BeritaDetailController::class, 'show'])->name('DetailBerita.show');

Route::post('/getkabupaten', [RegisteredUserController::class, 'getkabupaten'])->name('getkabupaten');

Route::get('/landingpage', [GrafikdtController::class, 'showLandingPage'])->name('landingpage');
Route::get('/', [GrafikdtController::class, 'showLandingPage']);



Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::middleware(['user'])->group(function () {
    Route::get('detail/DetailBerita/{id}', function ($id) {
        $user = Auth::user();

        if ($user && !$user->hasVerifiedEmail()) {
            return redirect()->route('verification.notice');
        }

        return app()->call(BeritaDetailController::class . '@show', ['id' => $id]);
    })->name('DetailBerita.show');
});
Route::post('/komentar', [KomentarController::class, 'store'])->name('Komentar.store');
Route::post('/postkomentar', [KomentarController::class, 'postkomentar'])->name('Komentar.post');



Route::middleware('admin')->group(function () {
    
    //visitor
    Route::get('/visitor', [VisitController::class, 'index'])->name('visitor.index');
    Route::get('/visitor/json', [VisitController::class, 'json'])->name('visitor.json');
   
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    // Route::get('/dashboard', function () {
    //     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    //     return view('dashboard.index');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index','showLandingPage'])->name('dashboard.index');
        Route::get('/sentimen', [DashboardController::class, 'showLandingPage'])->name('sentimen.index');
    });
    
    
    //berita
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');

    Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
    
    Route::post('/news/update/{id}', [NewsController::class, 'update'])->name('news.update');

    Route::get('/news/destroy/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    Route::get('/news/json', [NewsController::class, 'json'])->name('news.json');
    Route::post('/news/{newsId}/postkomentar', [KomentarController::class, 'postkomentar'])->name('komentar.post');

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

    //sentimen
    
    Route::get('/sentimen', [SentimenController::class, 'showLandingPage'])->name('sentimen.index');
    //check status
    Route::get('/user/status/update/{id}', [UserController::class, 'status'])->name('user.status.update');

    //update password
    Route::get('/user/editpassword/{id}', [UserController::class, 'editpassword'])->name('user.editpassword');
    Route::post('/user/updatepassword/{id}', [UserController::class, 'updatepassword'])->name('user.updatepassword');

    
    
   
});


require __DIR__.'/auth.php';
