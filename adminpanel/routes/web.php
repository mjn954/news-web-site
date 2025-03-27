<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CulturalController;
use App\Http\Controllers\CulturalnewsController;
use App\Http\Controllers\dashbordContoller;
use App\Http\Controllers\EconomicController;
use App\Http\Controllers\EconomicnewsController;
use App\Http\Controllers\HomenewsController;
use App\Http\Controllers\PoliticalnewsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PoliticalController;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\SportsnewsController;
use Illuminate\Support\Facades\Route;

Route::get('/',[dashbordContoller::class,'index'])->name("dashbord");

Route::group(['prefix' => 'sliders'], function () {

    Route::get('/',[SliderController::class,"index"])->name('slider.index');
    Route::get('create',[SliderController::class,"create"])->name('slider.create');
    Route::post('/', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/{slider}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('/{slider}', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/{slider}', [SliderController::class, 'destroy'])->name('slider.destroy');
    Route::get('/{slider}/show',[SliderController::class,"show"])->name('slider.show');
} );


Route::group(['prefix' => 'Political'], function () {
    Route::get('/', [PoliticalController::class, "index"])->name('Politicalslider.index');
    Route::get('/create', [PoliticalController::class, "create"])->name('Politicalslider.create');
    Route::post('/', [PoliticalController::class, 'store'])->name('Politicalslider.store');
    Route::get('/{Political}/show', [PoliticalController::class, "show"])->name('Politicalslider.show'); // مسیر show با پارامتر Political
    Route::get('/{Political}/edit', [PoliticalController::class, 'edit'])->name('Politicalslider.edit'); // مسیر edit با پارامتر Political
    Route::put('/{Political}', [PoliticalController::class, 'update'])->name('Politicalslider.update'); // مسیر update با پارامتر Political
    Route::delete('/{Political}', [PoliticalController::class, 'destroy'])->name('Politicalslider.destroy'); // مسیر destroy با پارامتر Political
});

Route::group(['prefix' => 'Economic'], function () {
    Route::get('/', [EconomicController::class, "index"])->name('Economicslider.index');
    Route::get('/Economic', [EconomicController::class, "create"])->name('Economicslider.create');
    Route::post('/', [EconomicController::class, 'store'])->name('Economicslider.store');
    Route::get('/{Economic}/show', [EconomicController::class, "show"])->name('Economicslider.show'); // مسیر show با پارامتر Political
    Route::get('/{Economic}/edit', [EconomicController::class, 'edit'])->name('Economicslider.edit'); // مسیر edit با پارامتر Political
    Route::put('/{Economic}', [EconomicController::class, 'update'])->name('Economicslider.update'); // مسیر update با پارامتر Political
    Route::delete('/{Economic}', [EconomicController::class, 'destroy'])->name('Economicslider.destroy'); // مسیر destroy با پارامتر Political
});

Route::group(['prefix' => 'Sports'], function () {
    Route::get('/', [SportsController::class, "index"])->name('Sportsslider.index');
    Route::get('/Sports', [SportsController::class, "create"])->name('Sportsslider.create');
    Route::post('/', [SportsController::class, 'store'])->name('Sportsslider.store');
    Route::get('/{Sport}/show', [SportsController::class, "show"])->name('Sportsslider.show'); // مسیر show با پارامتر Political
    Route::get('/{Sport}/edit', [SportsController::class, 'edit'])->name('Sportsslider.edit'); // مسیر edit با پارامتر Political
    Route::put('/{Sport}', [SportsController::class, 'update'])->name('Sportsslider.update');// مسیر update با پارامتر Political
    Route::delete('/{Sport}', [SportsController::class, 'destroy'])->name('Sportsslider.destroy');
});

Route::group(['prefix' => 'Cultural'], function () {
    Route::get('/', [CulturalController::class, "index"])->name('Culturalslider.index');
    Route::get('/Cultural', [CulturalController::class, "create"])->name('Culturalslider.create');
    Route::post('/', [CulturalController::class, 'store'])->name('Culturalslider.store');
    Route::get('/{Cultural}/show', [CulturalController::class, "show"])->name('Culturalslider.show'); // مسیر show با پارامتر Political
    Route::get('/{Cultural}/edit', [CulturalController::class, 'edit'])->name('Culturalslider.edit'); // مسیر edit با پارامتر Political
    Route::put('/{Cultural}', [CulturalController::class, 'update'])->name('Culturalslider.update'); // تغییر به {Cultural}
    Route::delete('/{Cultural}', [CulturalController::class, 'destroy'])->name('Culturalslider.destroy');
});

Route::group(['prefix' => 'homenews'], function () {
    Route::get('/', [HomenewsController::class, "index"])->name('homenews.index');
    Route::get('/homenews', [HomenewsController::class, "create"])->name('homenews.create');
    Route::post('/', [HomenewsController::class, 'store'])->name('homenews.store');
    Route::get('/{homenews}/show', [HomenewsController::class, "show"])->name('homenews.show'); // مسیر show با پارامتر Political
    Route::get('/{homenews}/edit', [HomenewsController::class, 'edit'])->name('homenews.edit'); // مسیر edit با پارامتر Political
    Route::put('/{homenews}', [HomenewsController::class, 'update'])->name('homenews.update'); // تغییر به {Cultural}
    Route::delete('/{homenews}', [HomenewsController::class, 'destroy'])->name('homenews.destroy');
});

Route::group(['prefix' => 'Politicalnews'], function () {
    Route::get('/', [PoliticalnewsController::class, "index"])->name('Politicalnews.index');
    Route::get('/create', [PoliticalnewsController::class, "create"])->name('Politicalnews.create');
    Route::post('/', [PoliticalnewsController::class, 'store'])->name('Politicalnews.store');
    Route::get('/{politicalnews}/show', [PoliticalnewsController::class, "show"])->name('Politicalnews.show'); // تغییر نام پارامتر
    Route::get('/{politicalnews}/edit', [PoliticalnewsController::class, 'edit'])->name('Politicalnews.edit'); // تغییر نام پارامتر
    Route::put('/{politicalnews}', [PoliticalnewsController::class, 'update'])->name('Politicalnews.update'); // تغییر نام پارامتر
    Route::delete('/{politicalnews}', [PoliticalnewsController::class, 'destroy'])->name('Politicalnews.destroy'); // تغییر نام پارامتر
});


Route::group(['prefix' => 'Economicnews'], function () {
    Route::get('/', [EconomicnewsController::class, "index"])->name('Economicnews.index');
    Route::get('/create', [EconomicnewsController::class, "create"])->name('Economicnews.create');
    Route::post('/', [EconomicnewsController::class, 'store'])->name('Economicnews.store');
    Route::get('/{Economicnews}/show', [EconomicnewsController::class, "show"])->name('Economicnews.show'); // مسیر GET برای نمایش خبر
    Route::get('/{Economicnews}/edit', [EconomicnewsController::class, 'edit'])->name('Economicnews.edit'); // مسیر GET برای ویرایش خبر
    Route::put('/{Economicnews}', [EconomicnewsController::class, 'update'])->name('Economicnews.update'); // مسیر PUT برای بروزرسانی خبر
    Route::delete('/{Economicnews}', [EconomicnewsController::class, 'destroy'])->name('Economicnews.destroy'); // مسیر DELETE برای حذف خبر
});


Route::group(['prefix' => 'Sportsnews'], function () {
    Route::get('/', [SportsnewsController::class, 'index'])->name('Sportsnews.index');
    Route::get('/create', [SportsnewsController::class, 'create'])->name('Sportsnews.create');
    Route::post('/', [SportsnewsController::class, 'store'])->name('Sportsnews.store');
    Route::get('/{sportsnews}', [SportsnewsController::class, 'show'])->name('Sportsnews.show');
    Route::get('/{sportsnews}/edit', [SportsnewsController::class, 'edit'])->name('Sportsnews.edit');
    Route::put('/{sportsnews}', [SportsnewsController::class, 'update'])->name('Sportsnews.update');
    Route::delete('/{sportsnews}', [SportsnewsController::class, 'destroy'])->name('Sportsnews.destroy');
});



Route::group(['prefix' => 'Culturalnews'], function () {
    Route::get('/', [CulturalnewsController::class, "index"])->name('Culturalnews.index');
    Route::get('/Culturalnews', [CulturalnewsController::class, "create"])->name('Culturalnews.create');
    Route::post('/', [CulturalnewsController::class, 'store'])->name('Culturalnews.store');
    Route::get('/{Culturalnews}/show', [CulturalnewsController::class, "show"])->name('Culturalnews.show');
    Route::get('/{Culturalnews}/edit', [CulturalnewsController::class, 'edit'])->name('Culturalnews.edit');
    Route::put('/{Culturalnews}', [CulturalnewsController::class, 'update'])->name('Culturalnews.update');
    Route::delete('/culturalnews/{culturalnews}', [CulturalnewsController::class, 'destroy'])->name('Culturalnews.destroy');

 });


 Route::group(['prefix' => 'ContactUs'], function () {
    Route::get('/', [ContactUsController::class, "index"])->name('ContactUs.index');
    Route::get('/{ContactUs}/show', [ContactUsController::class, "show"])->name('ContactUs.show');
 });