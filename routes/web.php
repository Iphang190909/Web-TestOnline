<?php

use App\Http\Controllers\DashboardController;
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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    //management-user
    Route::prefix('dashboard')->group(function () {
        //admin
        Route::resource('admin',TokenController::class);
        //peserta
        Route::resource('peserta',TokenController::class);
    });
    Route::prefix('dashboard')->group(function () {
        Route::resource('token',TokenController::class);
    });

});
require __DIR__.'/auth.php';
