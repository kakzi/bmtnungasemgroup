<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ArsipController;
use App\Http\Controllers\Api\KarakterController;
use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\PermissionFormController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    //API route for get Profile
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/attendance', [AttendanceController::class, 'store']);
    Route::post('/cuti', [PermissionFormController::class, 'cuti']);
    Route::post('/izin', [PermissionFormController::class, 'izin']);
    Route::get('/attendance/history', [AttendanceController::class, 'history']);
    Route::get('/attendance/get_count_present', [AttendanceController::class, 'countIn']);
    Route::get('/get_sync_date', [AttendanceController::class, 'sync']);
    Route::get('/get_izin', [PermissionFormController::class, 'get_izin']);
    Route::get('/get_cuti', [PermissionFormController::class, 'get_cuti']);
    Route::get('/sop', [ArsipController::class, 'getArsipSOP']);
    Route::get('/sop/{id}', [ArsipController::class, 'getArsipSOPbyId']);


    // Route::get('/get_sop', [ArsipController::class, 'getArsipSOP']);
    // Route::get('/get_sop_kita', [KarakterController::class, 'getArsipSOPKita']);
    // Route::get('/get_sop_tamwil', [KarakterController::class, 'getArsipSOPTamwil']);
    // Route::get('/get_sop_maal', [KarakterController::class, 'getArsipSOPmaal']);
    // Route::get('/get_sop_co', [KarakterController::class, 'getArsipSOPAusit']);

    Route::get('/get_count_tilawah', [KarakterController::class, 'get_count_tilawah']);
    Route::get('/get_count_tahajud', [KarakterController::class, 'get_count_tahajud']);
    Route::get('/get_karakter_tilawah_by_user', [KarakterController::class, 'get_karakter_tilawah_by_user']);
    Route::get('/get_karakter_tahajud_by_user', [KarakterController::class, 'get_karakter_tahajud_by_user']);
    Route::post('/store_karakter', [KarakterController::class, 'store_karakter']);
});
