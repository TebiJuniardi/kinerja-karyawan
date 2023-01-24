<?php

use App\Http\Controllers\admin\driverController;
use App\Http\Controllers\Admin\jadwalController;
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

// Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('paket-list', [AuthController::class, 'paket-list'])->name('paket-list');
Route::get('send-email', [SendEmailController::class, 'index']);

Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('paket', [paketController::class, 'index'])->name('admin/paket');
        Route::post('create-paket', [paketController::class, 'createPaket'])->name('admin/createpaket');
        Route::post('edit-paket', [paketController::class, 'editPaket'])->name('admin/editpaket');
        Route::get('delete-paket/{nik}', [paketController::class, 'deletePaket']);

        Route::get('driver', [driverController::class, 'index'])->name('admin/driver');
        Route::post('create-driver', [driverController::class, 'createDriver'])->name('admin/createdriver');
        Route::post('edit-driver', [driverController::class, 'editDriver'])->name('admin/editdriver');
        Route::get('delete-driver/{nik}', [driverController::class, 'deleteDriver']);

        Route::get('jadwal-pengiriman', [jadwalController::class, 'index'])->name('admin/jadwal-pengiriman');
        Route::post('import-jadwal-pengiriman', [jadwalController::class, 'importJadwalKirim'])->name('admin/importjadwalkirim');
    });
    Route::group(['prefix' => 'pelanggan'], function () {
        Route::get('paket', [paketController::class, 'paketPelanggan'])->name('pelanggan/status-paket');
        Route::get('konfirm/{no_resi}', [paketController::class, 'konfirmPaket']);

    });
    Route::group(['prefix' => 'driver'], function () {
        Route::post('selesai-paket', [paketController::class, 'selesaiPaket'])->name('driver/selesaiPaket');
    });
    // your routes
});
// Route::group(['middleware' => 'auth'], function () {
    // Route::group(['prefix' => 'admin'], function () {
    // });
// });
