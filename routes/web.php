<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\adminloginController;
use App\Http\Controllers\student\biodataController;
use App\Http\Controllers\student\registerController;


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


Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [homeController::class, 'index'])->name('home');
    Route::get('/home', [homeController::class, 'index'])->name('home');

    // STUDENT VIEW ACCOUNT
    Route::get('/biodata', [biodataController::class, 'index'])->name('biodatastudent');
    Route::get('/editbiodata', [biodataController::class, 'create'])->name('editbiodatastudent');
});



// LOGIN ROUTE
Route::get('/login', [adminloginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/loginadmin', [adminloginController::class, 'login'])->name('loginadmin');


// Register Mahasiswa
Route::get('/register', [registerController::class, 'index'])->name('register');







Route::get('/logout', [adminloginController::class, 'logout'])->name('logout');