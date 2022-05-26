<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cutiController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\dosen\dosenController;
use App\Http\Controllers\pelajar\pelajarController;
use App\Http\Controllers\karyawan\karyawanController;
use App\Http\Controllers\pelajar\registrasiController;
use App\Http\Controllers\registerController;
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


// WEB = Admin
//  dosen = dosen
// pelajar = pelajar
// karyawan = karyawan
// registrasi = calon pelajar

// ROUTE FOR ALL guard
Route::group(['middleware' => 'auth:web'], function() {
    Route::get('/', [homeController::class, 'index'])->name('home');
    Route::get('/home', [homeController::class, 'index'])->name('home');  

    // Route::get('/aspiration', [homeController::class, 'aspiration'])->name('aspiration');  
    // Route::post('/submitaspiration', [homeController::class, 'submitaspiration'])->name('submitaspiration');  


    // //  VIEW ACCOUNT
    // Route::get('/account', [viewaccountController::class, 'index'])->name('viewaccount');
    // Route::get('/editaccount', [viewaccountController::class, 'create'])->name('editaccount');

    // // Cute Request 
    // Route::get('/cuti', [cutiController::class, 'index'])->name('cuti');
    // Route::get('/formcuti', [cutiController::class,'create'])->name('formcuti');
    // Route::post('/storecuti', [cutiController::class,'store'])->name('storecuti');
});


// Route::group(['middleware' => 'auth:web'], function() {

//     // if(auth('web')->user() || auth('karyawan')->user()->posisi == 'Marketing' ){
        
//     // }
//     Route::get('/calonmahasiswa', [pelajarController::class, 'calon'])->name('calonmahasiswa');
//     Route::get('/showdatacalon/{id}', [pelajarController::class, 'showdata'])->name('showdatacalon');
//     Route::put('/acceptcalon/{id}', [pelajarController::class, 'accept'])->name('acceptcalon');
// });



// // Route Just For admin
// Route::group(['middleware' => 'auth:web'], function() {
   
//     // Admin
//     Route::get('/admin', [adminController::class, 'index'])->name('admin');
//     Route::get('/createadmin', [adminController::class, 'create'])->name('createadmin');
//     Route::post('/storeadmin', [adminController::class, 'store'])->name('storeadmin');
//     Route::get('/editadmin/{id}', [adminController::class, 'edit'])->name('editadmin');
//     Route::put('/updateadmin/{id}', [adminController::class, 'update'])->name('updateadmin');
//     Route::get('/deleteadmin/{id}', [adminController::class, 'destroy'])->name('deleteadmin');
    

//     // Pelajar
//     Route::get('/pelajar', [adminController::class, 'indexpelajar'])->name('pelajar');
//     Route::get('/editpelajar/{nim}', [adminController::class, 'editpelajar'])->name('editpelajar');
//     Route::put('/updatepelajar/{nim}', [adminController::class, 'updatepelajar'])->name('updatepelajar');
//     Route::get('/deletepelajar/{nim}', [adminController::class, 'destroypelajar'])->name('deletepelajar');

//     Route::get('/listaspiration', [homeController::class, 'listaspiration'])->name('listaspiration');
//     Route::get('/filter', [homeController::class, 'filteraspi'])->name('filter');
// });


// LOGIN ROUTE
// Route::get('/login', [logincontroller::class, 'index'])->name('login')->middleware('guest:web');
Route::get('/login', [logincontroller::class, 'index'])->name('login');
Route::post('/loginsubmit', [logincontroller::class, 'login'])->name('loginsubmit');


Route::get('/register',[registerController::class, 'index'])->name('register');
Route::post('/registersubmit',[registerController::class, 'register'])->name('registersubmit');

// Logout Route
Route::get('/logout', [loginController::class, 'logout'])->name('logout');