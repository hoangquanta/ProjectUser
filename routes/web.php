<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController; 
use App\Http\Controllers\CustomAuthController; 

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

//Index
Route::get('/', [UserController::class,'index'])->middleware('auth')->name('index');

//Authenticate
Route::get('/login', [CustomAuthController::class, 'login'])->name('login');
Route::post('/login', [CustomAuthController::class, 'submitLogin'])->name('login.submit');
Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');
Route::get('/admin', [CustomAuthController::class, 'createAdmin'])->name('admin.create');

//Delete
Route::delete('/{id}', [UserController::class, 'deleteUser'])->name('users.delete');
//Create
Route::get('/create', [UserController::class, 'openCreateForm'])->name('users.create.open');
Route::post('/create', [UserController::class, 'submitCreateForm'])->name('users.create.submit');
//Update
Route::get('/update/{id}', [UserController::class, 'openUpdateForm'])->name('users.update.open');
Route::patch('/update/{id}', [UserController::class, 'submitUpdateForm'])->name('users.update.submit');

