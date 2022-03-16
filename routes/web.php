<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\dosen\dosenController;
use App\Http\Controllers\karyawan\karyawanController;
use App\Http\Controllers\pelajar\pelajarController;
use App\Http\Controllers\pelajar\registrasiController;
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

// ROUTE FOR ALL USER
Route::group(['middleware' => 'auth:web,dosen,pelajar'], function() {
    Route::get('/', [homeController::class, 'index'])->name('home');
    Route::get('/home', [homeController::class, 'index'])->name('home');  
    Route::get('/aspiration', [homeController::class, 'aspiration'])->name('aspiration');  
    Route::post('/submitaspiration', [homeController::class, 'submitaspiration'])->name('submitaspiration');  


    //  VIEW ACCOUNT
    Route::get('/account', [viewaccountController::class, 'index'])->name('viewaccount');
    Route::get('/editaccount', [viewaccountController::class, 'create'])->name('editaccount');

});

Route::group(['middleware' => 'auth:pelajar'], function() {

    Route::post('/formulirpelajar', [pelajarController::class, 'store'])->name('formulirpelajar');

});


// Route Just For admin
Route::group(['middleware' => 'auth:web'], function() {
   
    // Admin
    Route::get('/admin', [adminController::class, 'index'])->name('admin');
    Route::get('/createadmin', [adminController::class, 'create'])->name('createadmin');
    Route::post('/storeadmin', [adminController::class, 'store'])->name('storeadmin');
    Route::get('/editadmin/{id}', [adminController::class, 'edit'])->name('editadmin');
    Route::put('/updateadmin/{id}', [adminController::class, 'update'])->name('updateadmin');
    Route::get('/deleteadmin/{id}', [adminController::class, 'destroy'])->name('deleteadmin');

    // Dosen
    Route::get('/dosen', [dosenController::class, 'index'])->name('dosen');
    Route::get('/createdosen', [dosenController::class, 'create'])->name('createdosen');
    Route::post('/storedosen', [dosenController::class, 'store'])->name('storedosen');
    Route::get('/editdosen/{nidn}', [dosenController::class, 'edit'])->name('editdosen');
    Route::put('/updatedosen/{nidn}', [dosenController::class, 'update'])->name('updatedosen');
    Route::get('/deletedosen/{nidn}', [dosenController::class, 'destroy'])->name('deletedosen');
    

    // Pelajar
    Route::get('/pelajar', [pelajarController::class, 'index'])->name('pelajar');
    Route::get('/editpelajar/{nim}', [pelajarController::class, 'edit'])->name('editpelajar');
    Route::put('/updatepelajar/{nim}', [pelajarController::class, 'update'])->name('updatepelajar');
    Route::get('/deletepelajar/{nim}', [pelajarController::class, 'destroy'])->name('deletepelajar');
   
    // Calon mahasiswa
    Route::get('/calonmahasiswa', [pelajarController::class, 'calon'])->name('calonmahasiswa');
    Route::get('/showdatacalon/{id}', [pelajarController::class, 'showdata'])->name('showdatacalon');
    Route::put('/acceptcalon/{id}', [pelajarController::class, 'accept'])->name('acceptcalon');


    // karyawan
    Route::get('/karyawan', [karyawanController::class, 'index'])->name('karyawan');
    Route::get('/createkaryawan', [karyawanController::class, 'create'])->name('createkaryawan');
    Route::post('/storekaryawan', [karyawanController::class, 'store'])->name('storekaryawan');
    Route::get('/editkaryawan/{id}', [karyawanController::class, 'edit'])->name('editkaryawan');
    Route::put('/updatekaryawan/{id}', [karyawanController::class, 'update'])->name('updatekaryawan');
    Route::get('/deletekaryawan/{id}', [karyawanController::class, 'destroy'])->name('deletekaryawan');
    

    Route::get('/listaspiration', [homeController::class, 'listaspiration'])->name('listaspiration');
    Route::get('/filter', [homeController::class, 'filteraspi'])->name('filter');
});


// LOGIN ROUTE
Route::get('/login', [logincontroller::class, 'index'])->name('login')->middleware('guest:web,dosen,pelajar');
Route::post('/loginsubmit', [logincontroller::class, 'login'])->name('loginsubmit');

// Register Mahasiswa
Route::get('/register',[registrasiController::class, 'index'])->name('register');
Route::post('/registersubmit',[registrasiController::class, 'register'])->name('registersubmit');


// Logout Route
Route::get('/logout', [loginController::class, 'logout'])->name('logout');