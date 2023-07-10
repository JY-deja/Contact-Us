<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Test;


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

//Route::get("/getame",function(){ return response()->json(["name"=>"ELABIDI MOHAMMED"]); });
//Route::resource('contacts', ContactController::class);
//post des donner ==> kanabghiw nsayfto des donnee


Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('Team/', [ContactUsController::class, 'team'])->name("contactUs.team");
    Route::get('ContactUs/', [ContactUsController::class, 'index'])->name("contactUs.index");
    Route::get('/category', [ContactUsController::class, 'selectCategory'])->name("contactUs.selectCategory");
    Route::get('ContactUs/{typeTeam}', [ContactUsController::class, 'indexTeam'])->name("contactUs.indexTeam");
    Route::post('/ContactUs', [ContactUsController::class, 'store'])->name("contactUs.store");
    Route::post('/newCategory', [CategorieController::class, 'store'])->name("contactUs.storeCategory");
    Route::get('/newCategory/{id}/edit', [CategorieController::class, 'edit'])->name("contactUs.editCategory");
    Route::put('/ContactUs/{id}', [ContactUsController::class, 'update'])->name('contactUs.update');
    Route::post('/updateCategory/{id}', [CategorieController::class, 'update'])->name("contactUs.updateCategory");
    Route::delete('/ContactUs/{id}',[ContactUsController::class, 'destroy'])->name('contactUs.destroy');
    Route::delete('/delCategory/{id}',[CategorieController::class, 'destroy'])->name('contactUs.destroyCategory');
    Route::post('/updateProfile/{id}',[LoginController::class, 'update'])->name('contactUs.updateProfile');
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
});

Route::get('/log_in', [LoginController::class, 'index'])->name("Login.login");
Route::get('/send',function(){
    Mail::to('khadija.deja.58@gmail.com')->send(new Test());
    return response('sending succefully');
});

