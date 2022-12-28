<?php

use App\Http\Controllers\Agama41Controller;
use App\Http\Controllers\Auth41Controller;
use App\Http\Controllers\User41Controller;
use App\Http\Controllers\Detaildata41Controller;
use Illuminate\Support\Facades\Route;

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
    return view('welcome', [
        'page' => "Home"
    ]);
})->middleware('auth');


// auth
Route::get('/login41', [Auth41Controller::class, 'login'])->name('login');
Route::get('/register41', [Auth41Controller::class, 'register'])->name('auth41.register');
Route::get('/logout41', [Auth41Controller::class, 'logout'])->name('auth41.logout');

Route::post('/login41', [Auth41Controller::class, 'loginP'])->name('auth41.loginP');
Route::post('/register41', [Auth41Controller::class, 'registerP'])->name('auth41.registerP');

Route::middleware('auth')->group(function () {
    // agama
    Route::resource('/agama41', Agama41Controller::class)->middleware('admin');

    // my
    Route::get('/myprofile41', [User41Controller::class, 'myprofile'])->name('user41.myprofile');
    Route::put('/myprofile41/edit/image/{id}', [User41Controller::class, 'editimage'])->name('user41.editimage');
    Route::put('/myprofile41/edit/password/{id}', [User41Controller::class, 'editpassword'])->name('user41.editpassword');

    // user
    Route::resource('/user41', User41Controller::class)->middleware('admin');

    // detail
    Route::resource('/detaildata41', Detaildata41Controller::class);
});
