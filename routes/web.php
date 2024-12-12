<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Secured\Auth\AuthController;
use App\Http\Controllers\secured\SecuredController;



Route::get('/', function () {
    return view('welcome');
});

Route::group(["prefix" => "/secured"], function () {
    Route::group(["prefix" => "/auth"], function () {
        Route::group(["prefix" => "/login"], function () {
            // LOGIN PAGE 
            Route::get('/', function () {
                return view('pages/secured/auth/login');
            })->name('auth.login');

            // LOGIN AUTHORIZE
            Route::post('/authorize', [AuthController::class, 'login_authorize'])->name('auth.login.authorize');
        });
    }); 

    // DASHBOARD PAGE
    Route::get('/dashboard', [SecuredController::class, 'dashboard'])->name('secured.dashboard');

});
