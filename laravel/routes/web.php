<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,"index"])->name('home');

Route::group(['prefix' => 'ContactUs'], function () {
    Route::get('/',[ContactUsController::class,'index'])->name('ContactUs.index');
    Route::post('/',[ContactUsController::class,'store'])->name('ContactUs.store');
});
