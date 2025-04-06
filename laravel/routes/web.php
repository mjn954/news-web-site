<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Political as ControllersPolitical;
use App\Http\Controllers\PoliticalController;
use App\Models\Political;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,"index"])->name('home');
Route::get('/{homenews}/show', [HomeController::class, 'show'])->name('news.show');






Route::group(['prefix' => 'ContactUs'], function () {
    Route::get('/',[ContactUsController::class,'index'])->name('ContactUs.index');
    Route::post('/',[ContactUsController::class,'store'])->name('ContactUs.store');
});

Route::group(['prefix' => 'Political'], function () {
    Route::get('/', [PoliticalController::class, 'index'])->name('Political.index');
    Route::get('/political/{id}', [PoliticalController::class, 'show'])->name('Political.show');
});
