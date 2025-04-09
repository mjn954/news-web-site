<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CulturalController;
use App\Http\Controllers\EconomicController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Political as ControllersPolitical;
use App\Http\Controllers\PoliticalController;
use App\Http\Controllers\SportController;
use App\Models\Political;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,"index"])->name('home');
Route::get('/{homenews}/show', [HomeController::class, 'show'])->name('news.show');






Route::group(['prefix' => 'ContactUs'], function () {
    Route::get('/',[ContactUsController::class,'index'])->name('ContactUs.index');
    Route::post('/',[ContactUsController::class,'store'])->name('ContactUs.store');
});




Route::group(['prefix' => 'Cultural'], function () {
    Route::get('/', [CulturalController::class, 'index'])->name('Cultural.index');
    Route::get('/Cultural/{show}', [CulturalController::class, 'show'])->name('Cultural.show');
});


Route::group(['prefix' => 'Political'], function () {
    Route::get('/', [PoliticalController::class, 'index'])->name('Political.index');
    Route::get('/political/{show}', [PoliticalController::class, 'show'])->name('Political.show');
});



Route::group(['prefix' => 'Economic'], function () {
    Route::get('/', [EconomicController::class, 'index'])->name('Economic.index');
    Route::get('/Economic/{show}', [EconomicController::class, 'show'])->name('Economic.show');
});

Route::group(['prefix' => 'Sport'], function () {
    Route::get('/', [SportController::class, 'index'])->name('Sport.index');
    Route::get('/Sport/{show}', [SportController::class, 'show'])->name('Sport.show');
});