@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6 md:space-y-8">
    <!-- Header -->
    <div class="bg-gradient-to-r from-orange-700 to-orange-800 rounded-xl md:rounded-2xl shadow-lg p-4 sm:p-6 md:p-8 text-white border border-orange-900">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-1 sm:mb-2">Selamat Datang ke KALIKA</h1>
        <p class="text-xs sm:text-sm md:text-base text-orange-100">Manajemen Informasi Banjar Kaliungu Kaja</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        <!-- Struktur Organisasi -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-orange-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Struktur Organisasi</h3>
                <svg class="w-6 h-6 md:w-8 md:h-8 text-orange-600" viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.89 1.97 1.74 1.97 2.95V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-orange-600">{{ \App\Models\StrukturOrganisasi::count() }}</p>
            <a href="{{ route('admin.struktur-organisasi.index') }}" class="mt-3 md:mt-4 inline-block text-orange-600 hover:text-orange-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>

        <!-- Slider -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-orange-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Slider</h3>
                <svg class="w-6 h-6 md:w-8 md:h-8 text-orange-600" viewBox="0 0 24 24" fill="currentColor"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-orange-600">{{ \App\Models\Slider::count() }}</p>
            <a href="{{ route('admin.slider.index') }}" class="mt-3 md:mt-4 inline-block text-orange-600 hover:text-orange-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>

        <!-- Galeri -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-orange-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Galeri</h3>
                <svg class="w-6 h-6 md:w-8 md:h-8 text-orange-600" viewBox="0 0 24 24" fill="currentColor"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zm-12-3l2.03-2.71 2.97 3.96 4-5.5H5l6 7z"/></svg>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-orange-600">{{ \App\Models\Galeri::count() }}</p>
            <a href="{{ route('admin.galeri.index') }}" class="mt-3 md:mt-4 inline-block text-orange-600 hover:text-orange-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>

        <!-- Kategori -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-orange-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Kategori</h3>
                <svg class="w-6 h-6 md:w-8 md:h-8 text-orange-600" viewBox="0 0 24 24" fill="currentColor"><path d="M5.5 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2m6.5.5c-.83 0-1.5.67-1.5 1.5s.67 1.5 1.5 1.5 1.5-.67 1.5-1.5-.67-1.5-1.5-1.5zm6-1c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-12-4C3.13 5.5 2 6.63 2 8v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.37-1.13-2.5-2.5-2.5H5.5z"/></svg>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-orange-600">{{ \App\Models\Kategori::count() }}</p>
            <a href="{{ route('admin.kategori.index') }}" class="mt-3 md:mt-4 inline-block text-orange-600 hover:text-orange-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>

        <!-- Penduduk Banjar -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-orange-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Penduduk Banjar</h3>
                <svg class="w-6 h-6 md:w-8 md:h-8 text-orange-600" viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.89 1.97 1.74 1.97 2.95V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-orange-600">{{ \App\Models\PendudukBanjar::count() }}</p>
            <a href="{{ route('admin.penduduk-banjar.index') }}" class="mt-3 md:mt-4 inline-block text-orange-600 hover:text-orange-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>

        <!-- Awig Rules -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-orange-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Awig Rules</h3>
                <svg class="w-6 h-6 md:w-8 md:h-8 text-orange-600" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-orange-600">{{ \App\Models\AwigRule::count() }}</p>
            <a href="{{ route('admin.awig-rule.index') }}" class="mt-3 md:mt-4 inline-block text-orange-600 hover:text-orange-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>

        <!-- Layanan -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-orange-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Layanan</h3>
                <svg class="w-6 h-6 md:w-8 md:h-8 text-orange-600" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-orange-600">{{ \App\Models\Layanan::count() }}</p>
            <a href="{{ route('admin.layanan.index') }}" class="mt-3 md:mt-4 inline-block text-orange-600 hover:text-orange-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>

        <!-- Sejarah -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-orange-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Sejarah</h3>
                <svg class="w-6 h-6 md:w-8 md:h-8 text-orange-600" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-orange-600">{{ \App\Models\Sejarah::count() }}</p>
            <a href="{{ route('admin.sejarah.index') }}" class="mt-3 md:mt-4 inline-block text-orange-600 hover:text-orange-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>

        <!-- Profil -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-orange-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Profil</h3>
                <svg class="w-6 h-6 md:w-8 md:h-8 text-orange-600" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-orange-600">{{ \App\Models\Profil::count() }}</p>
            <a href="{{ route('admin.profil.index') }}" class="mt-3 md:mt-4 inline-block text-orange-600 hover:text-orange-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>

        <!-- Awig File -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-orange-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Awig File</h3>
                <svg class="w-6 h-6 md:w-8 md:h-8 text-orange-600" viewBox="0 0 24 24" fill="currentColor"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-8-6z"/><polyline points="14 2 14 8 20 8" style="fill:none;stroke:currentColor;stroke-width:2"/></svg>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-orange-600">{{ \App\Models\AwigFile::count() }}</p>
            <a href="{{ route('admin.awig-file.index') }}" class="mt-3 md:mt-4 inline-block text-orange-600 hover:text-orange-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>
    </div>

    <!-- Info Section -->
    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 sm:p-6 flex items-start gap-3 sm:gap-4">
        <span class="text-2xl md:text-3xl flex-shrink-0">ℹ️</span>
        <div>
            <h3 class="font-semibold text-blue-900 mb-1 sm:mb-2 text-sm md:text-base">Panduan Penggunaan</h3>
            <p class="text-blue-800 text-xs sm:text-sm leading-relaxed">
                KALIKA adalah sistem manajemen informasi terpadu untuk Banjar Kaliungu Kaja. Gunakan menu di sebelah kiri untuk mengelola berbagai data dan konten. 
                Setiap modul dilengkapi dengan fitur tambah, ubah, dan hapus data. Pastikan Anda mengisi semua informasi dengan benar sebelum menyimpan.
            </p>
        </div>
    </div>
</div>
@endsection

