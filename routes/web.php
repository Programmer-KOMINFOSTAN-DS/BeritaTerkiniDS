<?php

use App\Http\Controllers\BeritaDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrafikdtController;
use App\Http\Controllers\NewsController;
use App\Models\Komentar;

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
//     return view('landingpage');
// });
Route::get('/', [GrafikdtController::class, 'showLandingPage'])->name('landingpage');
Route::get('/berita', [NewsController::class, 'index']);
Route::get('detail/DetailBerita/{id}', [BeritaDetailController::class, 'show'])->name('DetailBerita.show');
Route::post('/komentar', [KomentarController::class, 'store'])->name('Komentar.store');
//Route::get('/DetailBerita/{id}', [BeritaDetailController::class, 'show'])->name('DetailBerita.show');
Route::get('/komen', [KomentarController::class, 'index'])->name('komen.dash');
Route::get('/komen/create', [KomentarController::class, 'create'])->name('komen.create');
Route::post('/komen/store', [KomentarController::class, 'store'])->name('komen.store');
Route::get('/komen/edit/{id}', [KomentarController::class, 'edit'])->name('komen.edit');

Route::post('/komen/update/{id}', [KomentarController::class, 'update'])->name('komen.update');

Route::get('/komen/destroy/{id}', [KomentarController::class, 'destroy'])->name('komen.destroy');

Route::get('/komen/json', [KomentarController::class, 'json'])->name('komen.json');
