<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JeniskontakController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\loginController;

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

// Route::get('/main', function () {
//     return view('/admin.main');
// });
Route::get('/homes', [ProfilController::class, "index"]);
Route::get('/login', [loginController::class, "index"])->name('login')->middleware('guest');
Route::post('/login', [loginController::class, "authenticate"])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/siswa', [SiswaController::class, "index"]);
Route::get('/project', [ProjectController::class, "index"]);
Route::get('/jeniskontak', [JeniskontakController::class, "index"]);
Route::get('/contact', [ContactController::class, "index"]);
Route::get('/dashboard',[DashboardController::class,"index"] );
Route::get('/mastersiswa/{id_siswa}/hapus',[SiswaController::class,"hapus"] )->name('mastersiswa.hapus');
Route::get('/masterproject/{id_siswa}/hapus',[projectcontroller::class,"hapus"] )->name('masterproject.hapus');
Route::get('/masterproject/create/{id_siswa}',[projectcontroller::class,"create"]);
// Route::get('/masterproject/hapus',[ProjectController::class,"hapus"] )->name('masterproject.hapus');
Route::get('/mastercontact/{id_siswa}/hapus',[ContactController::class,"hapus"] )->name('mastercontact.hapus');
Route::get('/masterjeniskontak/{id}/hapus',[JeniskontakController::class,"hapus"] )->name('masterjeniskontak.hapus');
Route::get('/mastercontact/{id}/create',[ContactController::class,"buatkontak"])->name('buat.kontak');
Route::get('/mastercontact/makekontak',[ContactController::class,"makekontak"])->name('make.kontak');
route::resource('/mastersiswa', SiswaController::class)->middleware('auth');
route::resource('/mastercontact', ContactController::class)->middleware('auth');
route::resource('/masterproject', ProjectController::class)->middleware('auth');
route::resource('/masterjeniskontak', JeniskontakController::class)->middleware('auth');
Route::get('/masterjeniskontak/create/{id}',[JeniskontakController::class,"create"]);
Route::get('/', function () {
    return view('/login');
});


