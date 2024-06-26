<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;

use App\Http\Controllers\FrontController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontController::class, 'home'])->name('home');



Route::get('/nuovo/annuncio', [AdController::class, 'createAd'])->middleware('auth')->name('ads.create');

Route::get('/annunci', [AdController::class, 'index'])->name('ads.index');

Route::get('/categoria/{category}', [FrontController::class, 'categoryShow'])->name('categoryShow');

Route::get('/dettaglio/annuncio/{ad}', [AdController::class, 'show1'])->name('ads.show');

//*Home revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('RevisorCheck')->name('revisor.index');
//*Accetta annuncio
Route::patch('/accetta/annuncio/{ad}', [RevisorController::class, 'acceptAd'])->middleware('RevisorCheck')->name('revisor.accept_ad');
//*Rifiuta annuncio
Route::patch('/rifiuta/annuncio/{ad}', [RevisorController::class, 'rejectAd'])->middleware('RevisorCheck')->name('revisor.reject_ad');

Route::post('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

Route::get('/careers', [FrontController::class, 'careers'])->name('careers');


Route::post('/careers/submit', [FrontController::class, 'careersSubmit'])->name('careers.submit');

Route::get('/rendi/revisore1/{user}', [FrontController::class, 'makeRevisor1'])->name('make.revisor1');

Route::get('/ricerca/annuncio', [FrontController::class, 'searchAds'])->name('ads.search');

Route::get('/lingua/{lang}', [FrontController::class, 'setLanguage'])->name('set_language_locale');
