<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function (){
    Route::get('/user_list', [UsersController::class,'userList']);
    Route::get('/user_edit/{id}', [UsersController::class,'userEdit']);

    Route::post('/make_user', [UsersController::class, 'makeUser']);
    Route::post('/update_user/{id}', [UsersController::class, 'updateUser']);
    Route::post('/delete_user/{id}', [UsersController::class, 'deleteUser']);
});
