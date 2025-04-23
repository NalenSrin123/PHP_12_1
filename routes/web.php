<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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
Route::controller(StudentController::class)->group(function(){
    Route::get('/','listStudent')->name('listStudent');
    Route::post('/addStudentSubmit','addStudentSubmit')->name('addStudentSubmit');
    Route::post('/deleteStudent','deleteStudent')->name('deleteStudent');
    Route::get('/editStudent/{student}','editStudent')->name('editStudent');
    Route::post('/editStudentSubmit/{student}','editStudentSubmit')->name('editStudentSubmit');
});



