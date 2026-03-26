<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AwigRuleController;
use App\Http\Controllers\AwigFileController;
use App\Http\Controllers\PendudukBanjarController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group.
|
*/

// Public API Endpoints (Read-only)
Route::get('/struktur-organisasi', [StrukturOrganisasiController::class, 'index']);
Route::get('/slider', [SliderController::class, 'index']);
Route::get('/galeri', [GaleriController::class, 'index']);
Route::get('/sejarah', [SejarahController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/awig-rules', [AwigRuleController::class, 'index']);
Route::get('/awig-file', [AwigFileController::class, 'index']);
Route::get('/penduduk-banjar', [PendudukBanjarController::class, 'index']);
