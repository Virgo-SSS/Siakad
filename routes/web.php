<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\pmbController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\biodataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\AspirationController;
use App\Http\Controllers\forgotPasswordController;

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

// ROUTE FOR ALL guard
Route::group(['middleware' => 'auth:web'], function() {
    Route::get('/', [homeController::class, 'index'])->name('home');
    Route::get('/home', [homeController::class, 'index'])->name('home');  

    Route::get('/profile', [ProfileController::class,'index'])->name('profile');
    

    Route::get('/aspiration', [AspirationController::class, 'index'])->name('aspiration');  
    Route::post('/aspiration', [AspirationController::class, 'store'])->name('aspiration.store');

    Route::post('biodata', [biodataController::class, 'store'])->name('biodata.store');

    Route::get('/pmb/{id}', [pmbController::class,'index'])->name('batchPMB');
    Route::post('/pmb/{id}', [pmbController::class,'store'])->name('pmb.store');
    // // Cuti Request 
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

// ROUTE TO CHANGE LANGUAGE
Route::get('/language/{langcode}', function($langcode){
    session()->put('lang_code', $langcode);
    return redirect()->back();
})->name('language');

// LOGIN ROUTE
Route::group(['middleware' => 'guest:web'], function() {
    Route::get('/login', [logincontroller::class, 'index'])->name('login');
    Route::post('/login', [logincontroller::class, 'login'])->name('loginsubmit');
    Route::post('/loginsess', [loginController::class, 'destroyLoginSession'])->name('destroy.Lsession');

    Route::get('/password/forgot', [forgotPasswordController::class, 'index'])->name('forgotpassword');
    Route::post('/password/forgot', [forgotPasswordController::class, 'index'])->name('forgotpassword.store');
    
    
    Route::get('/register',[registerController::class, 'index'])->name('register');
    Route::post('/register',[registerController::class, 'register'])->name('registersubmit');
});

// Logout Route
Route::get('/logout', [loginController::class, 'logout'])->name('logout');