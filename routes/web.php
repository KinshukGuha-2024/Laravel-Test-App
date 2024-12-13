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
                return view('pages.secured.auth.login');
            })->name('auth.login')->middleware('LoginMiddleware');

            // LOGIN AUTHORIZE
            Route::post('/authorize', [AuthController::class, 'login_authorize'])->name('auth.login.authorize');
            Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

        });
    }) ;

    // DASHBOARD PAGE
    Route::get('/dashboard', [SecuredController::class, 'dashboard'])->name('secured.dashboard')->middleware('AuthMiddleware');

    Route::group(["prefix" => "basic-information"], function() {

        Route::get('/', [SecuredController::class, 'basic_information_get'])->name('secured.basic.info.get');
        Route::get('/save', function () {
            return view('pages.secured.dashboard.basic_information.add');
        })->name('secured.basic.info.save');
        Route::post('/', [SecuredController::class, 'basic_information_save'])->name('secured.basic.info.save.post');

        Route::get('/edit/{id}', [SecuredController::class, 'basic_information_update_get'])->name('secured.basic.info.edit');
        Route::post('/edit/post', [SecuredController::class, 'basic_information_update'])->name('secured.basic.info.edit.post');

        Route::get('/delete/{id}', [SecuredController::class, 'basic_information_delete'])->name('secured.basic.info.delete');

    })->middleware('AuthMiddleware');

    Route::group(["prefix" => "attachment"], function() {

        Route::get('/', [SecuredController::class, 'attachment_get'])->name('secured.attachment.get');
        Route::post('/', [SecuredController::class, 'attachment_save'])->name('secured.attachment.save');
        Route::post('/edit/{id}', [SecuredController::class, 'attachment_edit'])->name('secured.attachment.edit');
        Route::post('/delete/{id}', [SecuredController::class, 'attachment_delete'])->name('secured.attachment.delete');

    })->middleware('AuthMiddleware');
    



});
