<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AhliController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KeputusanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\UpdateProfileInformationController;

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
    return view('home');
});

// Route::get('/dashboard-admin', function () {
//     return view('admin.dashboard-admin');
// });
Route::get('/adminz', function () {
    return view('admin.dashboard-admin');
});

Route::get('/tabel', function () {
    return view('admin.tabel');
});
Route::get('/keputusan', function () {
    return view('admin.keputusan');
});

Route::get('/pemohon', function () {
    return view('pemohon');
});

Route::get('/pengajuan', function () {
    return view('pengajuan');
});

// Route::get('/statuspengajuan', function () {
//     return view('statuspengajuan');
// });
Route::get('/detailstatus', function () {
    return view('detailstatus');
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
// Route::controller(GoogleController::class)->group(function() {
//     Route::get('auth/google', 'redirectToGoogle')->name('google.login');
//     Route::get('auth/google/callback', 'handleGoogleCallback')->name('google.callback');
// });



//profile
// Route::controller(UpdateProfileInformationController::class)->group(function() {
//     Route::get('edit', 'edit')->name('profileedit');
//     Route::get('update', 'update')->name('profileupdate');
// });
Route::get('edit', [UpdateProfileInformationController::class, 'edit'])->name('profileedit');
Route::put('update', [UpdateProfileInformationController::class, 'update'])->name('profileupdate');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth');


Route::get('/dashboard', function () {
    if(!auth()->check() || !auth()->user()->role){
        return view('dashboard');
    }else{
        return view('admin.dashboard-admin');
    }  
});
 


// Route::resource('/posts', PostController::class)->middleware('auth');

Route::resource('/pengajuans', PengajuanController::class)->middleware('auth', 'petugas');

Route::controller(PengajuanController::class)->group(function() {
    Route::get('/pengajuanselesais', 'pengajuanselesai')->middleware('auth');
    Route::get('/arsips', 'arsip')->middleware('petugas');
    Route::get('/pengambilans', 'pengambilan')->middleware('petugas');
    Route::get('/pengambilans/{id}/edit', 'showpengambilan')->middleware('petugas');
    Route::put('/pengambilans/{id}', 'updatepengambilan')->middleware('petugas');
    Route::get('/details/{pengajuan}', 'detailpengajuanselesai')->middleware('auth');
    Route::get('/exportpengambilan', 'exportpengambilan')->middleware('auth');
    Route::get('/exportpengajuan', 'exportpengajuan')->middleware('auth');
    // Route::get('/arsips/createpengambilan', [PengajuanController::class, 'creatarsip'])->middleware('petugas');
    // Route::get('/arsips/{{ $pengajuan->id }}/ubahh', [PengajuanController::class, 'creatarsip'])->middleware('petugas');
});

Route::resource('/dokters', DokterController::class)->middleware('petugas');
Route::resource('/ahlis', AhliController::class)->middleware('petugas');

//Export excel
Route::get('/exportexcel', [DokterController::class, 'exportexcel'])->name('exportexcel');



// Route::resource('/keputusans', KeputusanController::class)->middleware('petugas');