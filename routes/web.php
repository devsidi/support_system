<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicetypeController;
use App\Http\Controllers\RequestformController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController; 


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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/request', [RequestformController::class, 'index'])->name('request');
Route::get('/my_request', [RequestformController::class, 'show'])->name('my_request');
Route::post('/request', [RequestformController::class, 'store'])->name('submittedrequest');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/appcase/{id}', [AdminController::class, 'appcase'])->name('appcase');
Route::post('/updatecase/{id}', [AdminController::class, 'updatecase'])->name('updatecase');

Route::post('/department', [DepartmentController::class, 'store'])->name('department');
Route::get('/department', [DepartmentController::class, 'index'])->name('department');
Route::get('/editdepartment/{id}', [DepartmentController::class, 'editdepartment'])->name('editdepartment');
Route::post('/updatedepartment/{id}', [DepartmentController::class, 'update'])->name('updatedepartment');
Route::get('/deletedepartment/{id}', [DepartmentController::class, 'destroy']); 

Route::get('/service', [ServicetypeController::class, 'index'])->name('service');
Route::post('/service', [ServicetypeController::class, 'store'])->name('service');
Route::get('/editservice/{id}', [ServicetypeController::class, 'editservice'])->name('editservice');
Route::post('/updateservice/{id}', [ServicetypeController::class, 'update'])->name('updatedepartment');
Route::get('/deleteservice/{id}', [ServicetypeController::class, 'destroy']); 


