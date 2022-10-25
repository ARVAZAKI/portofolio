<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
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
Route::get('/contact', [ContactController::class, "index"]);
Route::get('/dashboard',[DashboardController::class,"index"] );
Route::get('/mastersiswa/{id_siswa}/hapus',[SiswaController::class,"hapus"] )->name('mastersiswa.hapus');
Route::get('/masterproject/{id_siswa}/hapus',[projectcontroller::class,"hapus"] )->name('masterproject.hapus');
Route::get('/masterproject/create/{id_siswa}',[projectcontroller::class,"create"]);
// Route::get('/masterproject/hapus',[ProjectController::class,"hapus"] )->name('masterproject.hapus');
route::resource('/mastersiswa', SiswaController::class)->middleware('auth');
route::resource('/mastercontact', ContactController::class)->middleware('auth');
route::resource('/masterproject', ProjectController::class)->middleware('auth');

Route::get('/', function () {
    return view('/admin.app');
});


