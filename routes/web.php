<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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
    return view('test');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/register');
});


Route::get('/user', [UsersController::class, 'index'])->name('user.index');
Route::get('/user/create', [UsersController::class, 'create']);
Route::get('/user/edit/{user}', [UsersController::class, 'edit'])->name('user.edit');
Route::post('/user/store', [UsersController::class, 'store'])->name('user.store');
