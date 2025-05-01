<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\MedicalHistoryController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
})->name('home');

Auth::routes();
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index']);




// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//     ], function(){

    Route::group( [ 'prefix' => 'admin' , 'middleware' => ['auth'] ], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin')->middleware('admin');

    // Route::view('admin' , 'admin.city.index');


    Route::get('branches' , [BranchController::class , 'index'])->name('branches.index')->middleware('admin');
    Route::get('branch/create' , [BranchController::class , 'create'])->name('branch.create')->middleware('admin');
    Route::post('branch/create' ,[BranchController::class , 'store'] )->name('branch.store')->middleware('admin');
    Route::get('branch/edit/{id}' , [BranchController::class , 'edit'])->name('branch.edit')->middleware('admin');
    Route::put('branch/edit/{id}' , [BranchController::class , 'update'])->name('branch.update')->middleware('admin');
    Route::get('branch/delete/{id}' , [BranchController::class , 'delete'])->name('branch.delete')->middleware('admin');
    Route::delete('branch/delete/{id}' , [BranchController::class , 'destroy'])->name('branch.destroy')->middleware('admin');


    Route::get('hospitals' , [HospitalController::class , 'index'])->name('hospitals.index')->middleware('admin');
    Route::get('hospital/create' , [HospitalController::class , 'create'])->name('hospital.create')->middleware('admin');
    Route::post('hospital/create' ,[HospitalController::class , 'store'] )->name('hospital.store')->middleware('admin');
    Route::get('hospital/edit/{id}' , [HospitalController::class , 'edit'])->name('hospital.edit')->middleware('admin');
    Route::put('hospital/edit/{id}' , [HospitalController::class , 'update'])->name('hospital.update')->middleware('admin');
    Route::delete('hospital/delete/{id}' , [HospitalController::class , 'destroy'])->name('hospital.destroy')->middleware('admin');

    Route::resource('patients' , UserController::class)->middleware('admin');

    Route::resource('medicalHistories' , MedicalHistoryController::class);

    Route::get('get_hospital/{id}' , [MedicalHistoryController::class , 'get_hospital'])->middleware('admin');
    Route::get('get_national/{id}' , [MedicalHistoryController::class , 'get_national'])->middleware('admin');
    Route::post('search' , [MedicalHistoryController::class , 'search'])->name('search');
});
// } );
