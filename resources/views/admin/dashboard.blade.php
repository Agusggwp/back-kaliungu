@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6 md:space-y-8">
    <!-- Header -->
    <div class="bg-gradient-to-r from-red-700 to-red-800 rounded-xl md:rounded-2xl shadow-lg p-4 sm:p-6 md:p-8 text-white border border-red-900">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-1 sm:mb-2">Selamat Datang ke KALIKA</h1>
        <p class="text-xs sm:text-sm md:text-base text-red-100">Manajemen Informasi Banjar Kaliungu Kaja</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        <!-- Struktur Organisasi -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-green-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Struktur Organisasi</h3>
                <span class="text-2xl md:text-3xl">👥</span>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-green-600">{{ \App\Models\StrukturOrganisasi::count() }}</p>
            <a href="{{ route('admin.struktur-organisasi.index') }}" class="mt-3 md:mt-4 inline-block text-green-600 hover:text-green-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>

        <!-- Slider -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-green-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Slider</h3>
                <span class="text-2xl md:text-3xl">🎠</span>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-green-600">{{ \App\Models\Slider::count() }}</p>
            <a href="{{ route('admin.slider.index') }}" class="mt-3 md:mt-4 inline-block text-green-600 hover:text-green-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>

        <!-- Galeri -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-green-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Galeri</h3>
                <span class="text-2xl md:text-3xl">🖼️</span>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-green-600">{{ \App\Models\Galeri::count() }}</p>
            <a href="{{ route('admin.galeri.index') }}" class="mt-3 md:mt-4 inline-block text-green-600 hover:text-green-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>

        <!-- Kategori -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-green-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Kategori</h3>
                <span class="text-2xl md:text-3xl">🏷️</span>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-green-600">{{ \App\Models\Kategori::count() }}</p>
            <a href="{{ route('admin.kategori.index') }}" class="mt-3 md:mt-4 inline-block text-green-600 hover:text-green-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>

        <!-- Penduduk Banjar -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-green-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Penduduk Banjar</h3>
                <span class="text-2xl md:text-3xl">👨‍👩‍👧‍👦</span>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-green-600">{{ \App\Models\PendudukBanjar::count() }}</p>
            <a href="{{ route('admin.penduduk-banjar.index') }}" class="mt-3 md:mt-4 inline-block text-green-600 hover:text-green-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>

        <!-- Awig Rules -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-green-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Awig Rules</h3>
                <span class="text-2xl md:text-3xl">⚖️</span>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-green-600">{{ \App\Models\AwigRule::count() }}</p>
            <a href="{{ route('admin.awig-rule.index') }}" class="mt-3 md:mt-4 inline-block text-green-600 hover:text-green-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>

        <!-- Layanan -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-green-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Layanan</h3>
                <span class="text-2xl md:text-3xl">📋</span>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-green-600">{{ \App\Models\Layanan::count() }}</p>
            <a href="{{ route('admin.layanan.index') }}" class="mt-3 md:mt-4 inline-block text-green-600 hover:text-green-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>

        <!-- Sejarah -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-green-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Sejarah</h3>
                <span class="text-2xl md:text-3xl">📖</span>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-green-600">{{ \App\Models\Sejarah::count() }}</p>
            <a href="{{ route('admin.sejarah.index') }}" class="mt-3 md:mt-4 inline-block text-green-600 hover:text-green-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>

        <!-- Profil -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-green-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Profil</h3>
                <span class="text-2xl md:text-3xl">🏢</span>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-green-600">{{ \App\Models\Profil::count() }}</p>
            <a href="{{ route('admin.profil.index') }}" class="mt-3 md:mt-4 inline-block text-green-600 hover:text-green-800 font-medium text-xs md:text-sm">Kelola →</a>
        </div>

        <!-- Awig File -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border-l-4 border-green-500 p-4 md:p-6">
            <div class="flex items-center justify-between mb-3 md:mb-4">
                <h3 class="text-sm md:text-lg font-semibold text-gray-800 truncate">Awig File</h3>
                <span class="text-2xl md:text-3xl">📁</span>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-green-600">{{ \App\Models\AwigFile::count() }}</p>
            <a href="{{ route('admin.awig-file.index') }}" class="mt-3 md:mt-4 inline-block text-green-600 hover:text-green-800 font-medium text-xs md:text-sm">Kelola →</a>
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
