@extends('layouts.admin')

@section('title', isset($item) ? 'Edit Layanan' : 'Tambah Layanan')

@section('content')
<div class="w-full space-y-4 md:space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg md:rounded-2xl shadow-lg p-4 sm:p-6 text-white">
        <h1 class="text-2xl sm:text-3xl font-bold flex items-center gap-2">
            <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
            {{ isset($item) ? 'Edit' : 'Tambah' }} Layanan
        </h1>
        <p class="text-orange-100 mt-1 text-xs sm:text-sm md:text-base">{{ isset($item) ? $item->nama : 'Layanan baru' }} - Kelola informasi lengkap layanan</p>
    </div>

    <!-- Form -->
    <form action="{{ isset($item) ? route('admin.layanan.update', $item->id) : route('admin.layanan.store') }}" method="POST" class="bg-white rounded-lg md:rounded-2xl shadow-lg p-4 sm:p-6 md:p-8 space-y-4 md:space-y-6">
        @csrf
        @if (isset($item))
            @method('PUT')
        @endif

        <!-- Nama & Slug -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
            <div>
                <label class="block font-bold text-gray-700 mb-2 text-sm md:text-base">Nama Layanan *</label>
                <input type="text" name="nama" value="{{ old('nama', $item->nama ?? '') }}"
                    class="w-full px-3 md:px-4 py-2 md:py-3 text-xs sm:text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                    placeholder="Contoh: Posyandu"
                    required>
                @error('nama')
                    <span class="text-purple-600 text-xs sm:text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block font-bold text-gray-700 mb-2 text-sm md:text-base">Slug (ID) *</label>
                <input type="text" name="slug" value="{{ old('slug', $item->slug ?? '') }}"
                    class="w-full px-3 md:px-4 py-2 md:py-3 text-xs sm:text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                    placeholder="Contoh: posyandu"
                    required>
                @error('slug')
                    <span class="text-purple-600 text-xs sm:text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Category & Subtitle -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
            <div>
                <label class="block font-bold text-gray-700 mb-2 text-sm md:text-base">Kategori</label>
                <input type="text" name="category" value="{{ old('category', $item->category ?? '') }}"
                    class="w-full px-3 md:px-4 py-2 md:py-3 text-xs sm:text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                    placeholder="Contoh: Kesehatan, Keamanan, Pendidikan">
                @error('category')
                    <span class="text-purple-600 text-xs sm:text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block font-bold text-gray-700 mb-2 text-sm md:text-base">Subtitle</label>
                <input type="text" name="subtitle" value="{{ old('subtitle', $item->subtitle ?? '') }}"
                    class="w-full px-3 md:px-4 py-2 md:py-3 text-xs sm:text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                    placeholder="Subtitle singkat">
                @error('subtitle')
                    <span class="text-purple-600 text-xs sm:text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Short Description -->
        <div>
            <label class="block font-bold text-gray-700 mb-2 text-sm md:text-base">Deskripsi Singkat</label>
            <textarea name="short_description" rows="2"
                class="w-full px-3 md:px-4 py-2 md:py-3 text-xs sm:text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                placeholder="Deskripsi singkat dalam 1-2 kalimat">{{ old('short_description', $item->short_description ?? '') }}</textarea>
            @error('short_description')
                <span class="text-purple-600 text-xs sm:text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Full Description -->
        <div>
            <label class="block font-bold text-gray-700 mb-2 text-sm md:text-base">Deskripsi Lengkap</label>
            <textarea name="deskripsi" rows="5"
                class="w-full px-3 md:px-4 py-2 md:py-3 text-xs sm:text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                placeholder="Deskripsi lengkap tentang layanan">{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>
            @error('deskripsi')
                <span class="text-purple-600 text-xs sm:text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Informasi Kontak Section -->
        <div class="bg-gradient-to-br from-orange-50 to-orange-50 border-l-4 border-orange-500 p-3 sm:p-4 md:p-6 rounded-lg md:rounded-xl">
            <h2 class="font-bold text-gray-800 mb-3 md:mb-4 text-sm md:text-lg flex items-center gap-2">📞 Informasi Kontak</h2>

            <!-- Jadwal -->
            <div class="mb-3 md:mb-4">
                <label class="block font-bold text-gray-700 mb-2 text-xs sm:text-sm md:text-base">Jadwal</label>
                <input type="text" name="jadwal" placeholder="Contoh: Setiap Senin & Kamis, 08:00 - 12:00 WITA"
                    value="{{ old('jadwal', $item->jadwal ?? '') }}"
                    class="w-full px-3 md:px-4 py-2 md:py-3 text-xs sm:text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                >
                @error('jadwal')
                    <span class="text-purple-600 text-xs sm:text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Lokasi -->
            <div class="mb-3 md:mb-4">
                <label class="block font-bold text-gray-700 mb-2 text-xs sm:text-sm md:text-base">Lokasi</label>
                <input type="text" name="lokasi" placeholder="Contoh: Balai Banjar Kaliungu Kaja"
                    value="{{ old('lokasi', $item->lokasi ?? '') }}"
                    class="w-full px-3 md:px-4 py-2 md:py-3 text-xs sm:text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                >
                @error('lokasi')
                    <span class="text-purple-600 text-xs sm:text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Telepon -->
            <div class="mb-3 md:mb-4">
                <label class="block font-bold text-gray-700 mb-2 text-xs sm:text-sm md:text-base">Telepon</label>
                <input type="tel" name="telepon" placeholder="Contoh: 0812-3456-7890"
                    value="{{ old('telepon', $item->telepon ?? '') }}"
                    class="w-full px-3 md:px-4 py-2 md:py-3 text-xs sm:text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                >
                @error('telepon')
                    <span class="text-purple-600 text-xs sm:text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block font-bold text-gray-700 mb-2 text-xs sm:text-sm md:text-base">Email</label>
                <input type="email" name="email" placeholder="Contoh: posyandu.kaliungu@gmail.com"
                    value="{{ old('email', $item->email ?? '') }}"
                    class="w-full px-3 md:px-4 py-2 md:py-3 text-xs sm:text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                >
                @error('email')
                    <span class="text-purple-600 text-xs sm:text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Info Box -->
        <div class="bg-blue-50 border-l-4 border-blue-500 p-3 sm:p-4 md:p-6 rounded-lg md:rounded-xl">
            <p class="text-xs sm:text-sm text-gray-700 flex gap-2 sm:gap-3">
                <span class="text-lg flex-shrink-0">ℹ️</span>
                <span><strong>Catatan:</strong> Field Services (Layanan) dan Requirements (Persyaratan) dapat diedit melalui database atau API. Data ditampilkan dalam format JSON di database.</span>
            </p>
        </div>

        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 md:gap-4 pt-4 md:pt-6 border-t">
            <button type="submit" class="flex-1 bg-gradient-to-r from-orange-500 to-orange-600 text-white py-2 sm:py-3 rounded-lg font-bold hover:from-orange-700 hover:to-orange-800 transition flex items-center justify-center gap-2 text-sm md:text-base">
                {{ isset($item) ? '✅ Perbarui Layanan' : '➕ Tambah Layanan' }}
            </button>
            <a href="{{ route('admin.layanan.index') }}"
                class="flex-1 bg-gray-300 text-gray-700 py-2 sm:py-3 rounded-lg font-bold hover:bg-gray-400 transition text-center flex items-center justify-center gap-2 text-sm md:text-base">
                ❌ Batal
            </a>
        </div>
    </form>
</div>
@endsection





