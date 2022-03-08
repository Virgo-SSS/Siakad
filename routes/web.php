<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\dosen\dosenController;
use App\Http\Controllers\pelajar\pelajarController;
use App\Http\Controllers\student\registerController;
use App\Http\Controllers\karyawan\karyawanController;
use App\Http\Controllers\viewaccount\viewaccountController;

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

    // Admin
    Route::get('/admin', [adminController::class, 'index'])->name('admin');
    Route::get('/createadmin', [adminController::class, 'create'])->name('createadmin');
    Route::post('/storeadmin', [adminController::class, 'store'])->name('storeadmin');
    Route::get('/editadmin/{id}', [adminController::class, 'edit'])->name('editadmin');
    Route::put('/updateadmin/{id}', [adminController::class, 'update'])->name('updateadmin');
    Route::get('/deleteadmin/{id}', [adminController::class, 'destroy'])->name('deleteadmin');

    // Dosen
    Route::get('/dosen', [dosenController::class, 'index'])->name('dosen');

    // Pelajar
    Route::get('/pelajar', [pelajarController::class, 'index'])->name('pelajar');

    // karyawan
    Route::get('/karyawan', [karyawanController::class, 'index'])->name('karyawan');


    //  VIEW ACCOUNT
    Route::get('/account', [viewaccountController::class, 'index'])->name('viewaccount');
    Route::get('/editaccount', [viewaccountController::class, 'create'])->name('editaccount');
});



// LOGIN ROUTE
Route::get('/login', [logincontroller::class, 'index'])->name('login')->middleware('guest');
Route::post('/loginadmin', [adminController::class, 'login'])->name('loginadmin');


// Register Mahasiswa
Route::get('/register', [registerController::class, 'index'])->name('register');




// Logout Route
Route::get('/logout', [loginController::class, 'logout'])->name('logout');