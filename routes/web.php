<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'login']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [AdminController::class, 'dashboard']);
    Route::get('/logout', [AdminController::class, 'logout']);

    Route::get('/add-lead', [AdminController::class, 'add_lead']);

    Route::post('/add-lead', [AdminController::class, 'add_lead']);
    Route::get('/manage_leads', [AdminController::class, 'manage_leads']);

});

