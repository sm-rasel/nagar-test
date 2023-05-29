<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::get('/', function () {
//    return view('welcome');
//});
Route::group([], function (){
    Route::get('/', [ApplicantController::class, 'applicantIndex'])->name('app_index');
});
Route::group(['prefix'=> 'applicants'], function () {
    Route::post('/applicant-store', [ApplicantController::class, 'applicantStore'])->name('app_store');
    Route::get('/applicant-edit/{id}', [ApplicantController::class, 'applicantEdit'])->name('app_edit');
    Route::post('/applicant-update/{id}', [ApplicantController::class, 'applicantUpdate'])->name('app_update');
    Route::post('/applicant-delete/{id}', [ApplicantController::class, 'applicantDelete'])->name('app_delete');
});
