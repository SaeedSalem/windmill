<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', \App\Http\Controllers\WelcomeController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::as('settings.')->prefix('settings')->group(function(){
        Route::get('/', [App\Http\Controllers\SettingController::class, 'index'])->name('index');
        Route::post('general', [App\Http\Controllers\SettingController::class, 'general'])->name('general');
    });
});
