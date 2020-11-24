<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;

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
    return view('home');
})->middleware('auth','cookie.session','check.session');

//Route::group(['middleware' => 'check.session'], function() {
    Auth::routes(['verify' => true]);
//});

//Auth::routes(['verify' => true])->middleware('');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('/sessions', [App\Http\Controllers\HomeController::class, 'getSessions'])->name('sessions')->middleware('verified','auth');

/**
 * Admin Routes
 */

Route::group(['prefix' => 'admin', 'middleware' => ['auth','check.session']], function () {

    // Eliminar usuarios - softdelete
    Route::get('users/delete/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('admin.users.delete');

    //Route::resource('users', 'UsersController');
    Route::resource('users', UsersController::class, ['as' => 'admin']);
    Route::resource('roles', RolesController::class, ['as' => 'admin']);
    Route::resource('permissions', PermissionsController::class, ['as' => 'admin']);

});