<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectUsersController; 

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


Route::get('/', [ProjectUsersController::class,'index'])->name('users.show');
Route::delete('/{id}', [ProjectUsersController::class, 'deleteUser'])->name('users.delete');
Route::get('/create', [ProjectUsersController::class, 'openCreateForm'])->name('users.create.open');
Route::post('/create', [ProjectUsersController::class, 'submitCreateForm'])->name('users.create.submit');
Route::get('/update/{id}', [ProjectUsersController::class, 'openUpdateForm'])->name('users.update.open');
Route::patch('/update/{id}', [ProjectUsersController::class, 'submitUpdateForm'])->name('users.update.submit');

