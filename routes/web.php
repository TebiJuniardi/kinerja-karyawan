<?php

use App\Http\Controllers\admin\driverController;
use App\Http\Controllers\Admin\paketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('paket-list', [AuthController::class, 'paket-list'])->name('paket-list');

Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('paket', [paketController::class, 'index'])->name('admin/paket');
        Route::get('driver', [driverController::class, 'index'])->name('admin/driver');
    });
    // your routes
});
// Route::group(['middleware' => 'auth'], function () {
    // Route::group(['prefix' => 'admin'], function () {
    // });
// });
