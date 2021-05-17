<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
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

Route::group(['prefix'=>'admin', 'as' => 'admin.'], function(){ 
    Route::get('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'index']);
    // Route::group(['middleware' => 'auth'], function () {
    //     Route::group(['middleware' => 'is_admin'], function () {
    //         Route::get('', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
    //     });
    // });
});