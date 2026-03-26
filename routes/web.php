<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthWebController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StrukturOrganisasiAdminController;
use App\Http\Controllers\Admin\SliderAdminController;
use App\Http\Controllers\Admin\GaleriAdminController;
use App\Http\Controllers\Admin\SejarahAdminController;
use App\Http\Controllers\Admin\ProfilAdminController;
use App\Http\Controllers\Admin\KategoriAdminController;
use App\Http\Controllers\Admin\AwigRuleAdminController;
use App\Http\Controllers\Admin\AwigFileAdminController;
use App\Http\Controllers\Admin\PendudukBanjarAdminController;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/login', [AuthWebController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthWebController::class, 'login']);
Route::get('/register', [AuthWebController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthWebController::class, 'register']);
Route::post('/logout', [AuthWebController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware('auth', 'admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // Struktur Organisasi
    Route::resource('struktur-organisasi', StrukturOrganisasiAdminController::class)->names('struktur-organisasi');

    // Slider
    Route::resource('slider', SliderAdminController::class)->names('slider');

    // Galeri
    Route::resource('galeri', GaleriAdminController::class)->names('galeri');

    // Sejarah
    Route::resource('sejarah', SejarahAdminController::class)->names('sejarah');

    // Profil
    Route::resource('profil', ProfilAdminController::class)->names('profil');

    // Kategori
    Route::resource('kategori', KategoriAdminController::class)->names('kategori');

    // Awig Rules
    Route::resource('awig-rule', AwigRuleAdminController::class)->names('awig-rule');

    // Awig File
    Route::resource('awig-file', AwigFileAdminController::class)->names('awig-file');

    // Penduduk Banjar
    Route::resource('penduduk-banjar', PendudukBanjarAdminController::class)->names('penduduk-banjar');
});

