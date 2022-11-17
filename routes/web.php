<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagementUserAdminController;
use App\Http\Controllers\ManagementUserInstansiController;
use App\Http\Controllers\ManagementUserPesertaController;
use App\Http\Controllers\ManagementAssesmentSoalController;
use App\Http\Controllers\UserTestController;
use App\Http\Controllers\LoginTestController;
use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Route;

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
    return view('frontend.login');
});

Route::get('/register-user',[LoginTestController::class,'RegisterTest'])->name('RegisterTest');
Route::post('/login-user',[LoginTestController::class,'LoginTest'])->name('LoginTest');


// Route::middleware('peserta')->group(function () {
    Route::middleware(['auth', 'peserta'])->group(function () {
        Route::resource('test',UserTestController::class);
    });
// });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth'])->group(function () {

    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    //management-user
    Route::prefix('user-management')->group(function () {
        //admin
        Route::resource('admin',ManagementUserAdminController::class);
        //peserta
        Route::resource('peserta',ManagementUserPesertaController::class);
        //instansi
        Route::resource('instansi', ManagementUserInstansiController::class);
    });
    // token
    Route::prefix('token-management')->group(function () {
        Route::post('token-restore/{id}', [TokenController::class, 'restore'])->name('token.restore');
        Route::resource('token',TokenController::class);
        Route::delete('token-deletePermanent/{id}', [TokenController::class, 'deletePermanent'])->name('token.deletePermanent');
    });
    // management-assesment
    Route::prefix('assesment')->group(function () {
        //soal
        Route::resource('soal',ManagementAssesmentSoalController::class);
    });


});
require __DIR__.'/auth.php';
