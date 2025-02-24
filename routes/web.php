<?php

use App\Http\Controllers\home\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Secured\Auth\AuthController;
use App\Http\Controllers\secured\BasicInformationController;
use App\Http\Controllers\secured\SecuredController;
use App\Http\Controllers\secured\SkillController;
use App\Http\Controllers\secured\AttachmentController;



Route::redirect('/', '/auth/login');

Route::group(["prefix"=>"home", "middleware" => 'TrackLocation'],function (){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/success', [HomeController::class, 'success']);
    Route::post('/send-mail', [HomeController::class, 'send_mail'])->name('home.send_mail');
});


Route::group(["prefix" => "/auth" , "middleware" => 'LoginMiddleware'], function () {
    Route::group(["prefix" => "/login"], function () {
        // LOGIN PAGE 
        Route::get('/', function () {
            return view('pages.secured.auth.login');
        })->name('auth.login');

        // LOGIN AUTHORIZE
        Route::post('/authorize', [AuthController::class, 'login_authorize'])->name('auth.login.authorize');
        Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    });
});

// Secured routes with AuthMiddleware
Route::group(["prefix" => "/secured", "middleware" => 'AuthMiddleware'], function () {

    // DASHBOARD PAGE
    Route::get('/dashboard', [SecuredController::class, 'dashboard'])->name('secured.dashboard');

    // Basic Information Page
    Route::group(["prefix" => "basic-information"], function() {
        Route::get('/', [BasicInformationController::class, 'basic_information_get'])->name('secured.basic.info.get');
        Route::get('/save', function () {
            return view('pages.secured.dashboard.basic_information.add');
        })->name('secured.basic.info.save');
        Route::post('/', [BasicInformationController::class, 'basic_information_save'])->name('secured.basic.info.save.post');
        Route::get('/edit/{id}', [BasicInformationController::class, 'basic_information_update_get'])->name('secured.basic.info.edit');
        Route::post('/edit/post', [BasicInformationController::class, 'basic_information_update'])->name('secured.basic.info.edit.post');
        Route::get('/delete/{id}', [BasicInformationController::class, 'basic_information_delete'])->name('secured.basic.info.delete');
    });

    // Skills Page
    Route::group(["prefix" => "skill"], function() {
        Route::get('/', [SkillController::class, 'get_skill'])->name('secured.skill.get');
        Route::get('/save', [SkillController::class, 'save_skill_get_data'])->name('secured.skill.save');
        Route::post('/', [SkillController::class, 'save_skill'])->name('secured.skill.save.post');
        Route::get('/edit/{id}', [SkillController::class, 'update_get_skill'])->name('secured.skill.edit');
        Route::post('/edit/post', [SkillController::class, 'update_skill'])->name('secured.skill.edit.post');
        Route::get('/reset/{id}', [SkillController::class, 'reset_skill'])->name('secured.skill.reset');
    });

    // Attachments Page
    Route::group(["prefix" => "attachment"], function() {
        Route::get('/', [AttachmentController::class, 'get_attachment'])->name('secured.attachment.get');
        Route::get('/save', [AttachmentController::class, 'save_attachment_get_data'])->name('secured.attachment.save');
        Route::post('/', [AttachmentController::class, 'save_attachment'])->name('secured.attachment.save.post');
        Route::get('/edit/{id}', [AttachmentController::class, 'update_get_attachment'])->name('secured.attachment.edit');
        Route::post('/edit/post', [AttachmentController::class, 'update_attachment'])->name('secured.attachment.edit.post');
        Route::get('/reset/{id}', [AttachmentController::class, 'reset_attachment'])->name('secured.attachment.reset');
    });
});
