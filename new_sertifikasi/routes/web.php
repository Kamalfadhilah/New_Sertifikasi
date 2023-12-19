<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/detail_pendaftaran', function () {
    return view('pendaftaran.detail_pendaftaran');
});

Route::get('/edit_pendaftaran', function () {
    return view('pendaftaran.edit_pendaftaran');
});

Route::get('/edit_user', function () {
    return view('users.edit_user');
});

Route::get('/', function () { return view('auth.login'); });
Route::get('/register', function () { return view('auth.register');});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/getkota', [PendaftaranController::class, 'getKota']);
Route::get('/cetak_pdf/{id}', [PendaftaranController::class, 'cetakPdf']);

Route::middleware(['auth'])->group(function () {
    Route::get('/pendaftaran/show_pendaftaran', [PendaftaranController::class, 'index']);
    Route::get('/pendaftaran/add_pendaftaran', [PendaftaranController::class, 'create']);
    Route::post('/pendaftaran/add_pendaftaran', [PendaftaranController::class, 'store']);
    Route::get('/pendaftaran/detail_pendaftaran/{id}', [PendaftaranController::class, 'getDetail']);
    Route::get('/pendaftaran/edit_pendaftaran/{id}', [PendaftaranController::class, 'edit']);
    Route::put('/pendaftaran/update/{id}', [PendaftaranController::class, 'update']);
    Route::get('/pendaftaran/destroy/{id}', [PendaftaranController::class, 'destroy']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/users/show_user', [UserController::class, 'indexUser']);
    Route::get('/users/detail_user/{id}', [UserController::class, 'getDetailUser']);
    Route::get('/users/edit_user/{id}', [UserController::class, 'editUser']);
    Route::put('/users/update/{id}', [UserController::class, 'update']);
    Route::get('/users/destroy/{id}', [UserController::class, 'destroyuser']);
});