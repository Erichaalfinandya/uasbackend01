<?php

use App\Http\Controllers\Api\Agama41Controller;
use App\Http\Controllers\api\Detaildata41Controller;
use App\Http\Controllers\api\User41Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

route::resource('/agama41', Agama41Controller::class);

route::resource('/detaildata41', DetailData41Controller::class);

route::resource('/user41', User41Controller::class);
Route::put('/user41/update/image/{id}', [User41Controller::class, 'editimage'])->name('user41.editimage');
Route::put('/user41/update/password/{id}', [User41Controller::class, 'editpassword'])->name('user41.editpassword');

// detail
route::resource('/detaildata41', Detaildata41Controller::class);
