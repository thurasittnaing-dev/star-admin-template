<?php

use App\Http\Controllers\Backend\AjaxController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

# Redirect Route
Route::get('/', function () {
    return redirect('dashboard');
});

# Authentication Routes
Auth::routes(['register' => false, 'reset' => false, 'verify' => false, 'login' => true]);

# Backend Routes
Route::group(['middleware' => 'auth'], function () {

    # Pages Route
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

    # User Routes
    Route::resource('/users', UserController::class);
    Route::get('users/change_password/{id}', [UserController::class, 'change_password'])->name('users.change_password');
    Route::post('users/change_password/{id}', [UserController::class, 'updatePassword'])->name('users.update_password');

    # AJAX Route
    Route::post('clean_session', [AjaxController::class, 'cleanSession'])->name('ajax.cleanSession');
});
