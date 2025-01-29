<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AgreementController;

Route::get('/', function () {
    return redirect('/admin');
});

Route::group(['middleware' => ['auth']], function () {
    //API route for get Profile
    Route::get('/akad_rahn/{id}', [AgreementController::class, 'akad_rahn'])->name('akad_rahn');
});


