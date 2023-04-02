<?php

use App\Http\Controllers\DocController;
use App\Http\Livewire\Docs;
use App\Http\Livewire\DocsList;
use App\Http\Livewire\Projects;
use App\Http\Livewire\ProjectsList;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('lang/{lang}', [
    'as' => 'lang.switch',
    'uses' => 'App\Http\Controllers\LanguageController@switchLang',
]);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::get('/dashboard', [BinaController::class, 'dashboard'])
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

require __DIR__ . '/auth.php';




Route::middleware(['auth'])->group(function () {


    Route::get('/dochome', [DocController::class, 'new']);
    // Route::get('/docnew', [DocController::class, 'form']);
    // Route::get('/docview/{id}', Docs::class, 'view')->name('viewdoc');
    //Route::get('/docview/{id}', [DocController::class, 'view'])->name('viewdoc');
    // Route::post('/docadd', [DocController::class, 'add']);


    // Route::get('/docs/add', Docs::class, 'add');
    // Route::get('/docs/{id}', Docs::class, 'view');

    Route::get('/docs/list', DocsList::class);
    Route::get('/docs/{idDoc?}/{idContent?}', Docs::class);

    
    Route::get('/projects/list', ProjectsList::class);
    Route::get('/projects/{idProject?}', Projects::class);







    // Route::get('/bina-list', BinaList::class)->name('binalar');



    // Route::get('/bina-view/{id}', BinaView::class)->name('binaview');
    // Route::get('/bina-form', [BinaController::class, 'formBina']);
    // Route::get('/bina-form/{id}', [BinaController::class, 'formBina']);
    // Route::post('/bina-add', [BinaController::class, 'addBina']);
    // Route::post('/bina-update/{id}', [BinaController::class, 'updateBina']);
    // Route::get('/bina-ayar/{id}', [BinaController::class, 'ayarView']);
    // Route::get('/bina-ayar-form/{id}', [BinaController::class, 'ayarForm']);
    // Route::post('/bina-ayar-add/{id}', [BinaController::class, 'ayarAdd']);
    // Route::post('/bina-ayar-update/{id}/{ayarid}', [
    //     BinaController::class,
    //     'ayarUpdate',
    // ]);

    // Route::get('/okuma-durum/{id}', [OkumaController::class, 'durum']);
    // Route::get('/okuma-form/{id}', [OkumaController::class, 'form']);

    // Route::get('/bedel-form/{id}', [BedelController::class, 'form']);
    // Route::get('/bedel-form/{id}/{bedelid}', [BedelController::class, 'form']);
    // Route::post('/bedel-upd/{id}/{bedelid}', [BedelController::class, 'upd']);

    // Route::get('/bedel-list/{id}', BedelList::class)->name('bedeller');
    // Route::post('/bedel-add/{id}', [BedelController::class, 'add']);

    // Route::get('/kalem-list/{id}', KalemList::class)->name('kalemler');
    // Route::get('/kalem-form/{id}', [KalemController::class, 'form']);
    // Route::get('/kalem-form/{id}/{kalemid}', [KalemController::class, 'form']);
    // Route::post('/kalem-add/{id}', [KalemController::class, 'add']);
    // Route::post('/kalem-update/{id}/{kalemid}', [
    //     KalemController::class,
    //     'update',
    // ]);

    // Route::get('/sakin-list/{id}', SakinList::class);
    // Route::get('/sakin-form/{id}', [SakinController::class, 'formSakin']);
    // Route::get('/sakin-form/{id}/{sakinid}', [
    //     SakinController::class,
    //     'formSakin',
    // ]);
    // Route::post('/sakin-add/{id}', [SakinController::class, 'addSakin']);
    // Route::post('/sakin-update/{id}/{sakinid}', [
    //     SakinController::class,
    //     'updateSakin',
    // ]);
    // Route::get('/sakin-view/{id}/{sakinid}', [
    //     SakinController::class,
    //     'viewSakin',
    // ])->name('sakinview');

    // Route::get('/kayit-form/{tur}', [KayitController::class, 'kayitForm']);
    // Route::get('/kayit-form/{tur}/{id}', [KayitController::class, 'kayitForm']);

    // Route::get('/okuma-form', [KayitController::class, 'okuma']);
    // Route::get('/okuma-form/{id}', [KayitController::class, 'okuma']);
    // Route::post('/okuma-add', [KayitController::class, 'okumaAdd']);

    // Route::post('/kayit-add/{tur}', [KayitController::class, 'kayitAdd']);
    // Route::post('/kayit-dosya-add/{id}/{tur}', [
    //     KayitController::class,
    //     'dosyaEkle',
    // ]);

    // Route::get('/kayit-dosya-gor/{id}', [DosyaController::class, 'dosya']);
    // Route::get('/select-active/{id}', [BinaController::class, 'selectActive']);
    // Route::get('/durum/{tur}', DurumList::class)->name('durum');
    // //Route::get('/dokum', [DokumController::class, 'dokum'])->name('dokum');
    // Route::get('/dokum', [PDFController::class, 'dokum']);
    // Route::get('/sayaclar', OkumaList::class);
    // Route::get('/makbuz/{record?}', [DokumController::class, 'makbuz'])->name(
    //     'makbuz'
    // );

    // Route::get('/karar/{id?}', KararList::class);

    // Route::get('/help', function () {
    //     return View::make('help');
    // });

    // Route::get('/makbuzpdf/{record}', [PDFController::class, 'index']);
});
