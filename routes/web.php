<?php


use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

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
Route::controller(UserController::class)->group(function(){
    Route::get('/login','login')->name('login');
    Route::post('/loginSubmit','loginSubmit')->name('loginSubmit');
    Route::get('/signup','signup')->name('signup');
    Route::post('/signup-submit','signupSubmit')->name('signupSubmit');
    Route::get('/logout','logout')->name('logout');
});

Route::middleware(['auth'])->group(function(){
    Route::controller(StudentController::class)->group(function(){
        Route::get('/','listStudent')->name('listStudent');
        Route::post('/addStudentSubmit','addStudentSubmit')->name('addStudentSubmit');
        Route::post('/deleteStudent','deleteStudent')->name('deleteStudent');
        Route::get('/editStudent/{student}','editStudent')->name('editStudent');
        Route::post('/editStudentSubmit/{student}','editStudentSubmit')->name('editStudentSubmit');
    });
    Route::get('/user',function(){
        return view('User.user');
    });
});



