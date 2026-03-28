@extends('layouts.admin')

@section('title', isset($item) ? 'Edit Profil' : 'Tambah Profil')

@section('content')
@php
    // Decode jam_pelayanan JSON jika ada
    $jam_pelayanan = [];
    if (isset($item) && $item->jam_pelayanan) {
        $jam_pelayanan = is_array($item->jam_pelayanan) 
            ? $item->jam_pelayanan 
            : json_decode($item->jam_pelayanan, true) ?? [];
    }
@endphp

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">
        {{ isset($item) ? 'Edit Profil: ' . $item->nama : 'Tambah Profil' }}
    </h1>
    @if (isset($item))
        <a href="{{ route('admin.profil.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">← Kembali</a>
    @endif
</div>

<div class="bg-white rounded-lg shadow p-8">
    <form action="{{ isset($item) ? route('admin.profil.update', $item->id) : route('admin.profil.store') }}" method="POST">
        @csrf
        @if (isset($item))
            @method('PUT')
        @endif

        <!-- Informasi Umum -->
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">Informasi Umum</h2>
            
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $item->nama ?? '') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Kontak -->
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">Kontak & Lokasi</h2>
            
            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $item->alamat ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                @error('alamat')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="telepon" class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                    <input type="text" name="telepon" id="telepon" value="{{ old('telepon', $item->telepon ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    @error('telepon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $item->email ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Jam Pelayanan -->
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">Jam Pelayanan</h2>

            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <h3 class="font-medium text-blue-900 mb-3">Jam Reguler</h3>
                <div class="mb-4">
                    <label for="jam_hari" class="block text-sm font-medium text-gray-700 mb-1">Hari Pelayanan</label>
                    <input type="text" name="jam_hari" id="jam_hari" value="{{ old('jam_hari', $jam_pelayanan['hari'] ?? '') }}" placeholder="Contoh: Senin - Sabtu" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    @error('jam_hari')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="jam_buka" class="block text-sm font-medium text-gray-700 mb-1">Jam Buka</label>
                        <input type="time" name="jam_buka" id="jam_buka" value="{{ old('jam_buka', $jam_pelayanan['jam_buka'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        @error('jam_buka')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="jam_tutup" class="block text-sm font-medium text-gray-700 mb-1">Jam Tutup</label>
                        <input type="time" name="jam_tutup" id="jam_tutup" value="{{ old('jam_tutup', $jam_pelayanan['jam_tutup'] ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        @error('jam_tutup')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Jadwal Layanan Khusus -->
            <div>
                <h3 class="font-medium text-gray-900 mb-3">Jadwal Layanan Khusus</h3>
                <div id="jadwal-khusus-container" class="space-y-3 mb-4">
                    @php
                        $jadwal_khusus = $jam_pelayanan['jam_layanan_khusus'] ?? [];
                    @endphp
                    @foreach ($jadwal_khusus as $index => $jadwal)
                        <div class="border border-yellow-300 rounded-lg p-4 bg-yellow-50 jadwal-khusus-row">
                            <div class="grid grid-cols-3 gap-3 mb-3">
                                <input type="text" name="jadwal_khusus_tipe[]" value="{{ $jadwal['tipe'] ?? '' }}" placeholder="Tipe Layanan (Contoh: Layanan Administrasi)" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                                <input type="text" name="jadwal_khusus_hari[]" value="{{ $jadwal['hari'] ?? '' }}" placeholder="Hari (Contoh: Senin)" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                                <input type="text" name="jadwal_khusus_jam[]" value="{{ $jadwal['jam'] ?? '' }}" placeholder="Jam (Contoh: 09:00 - 12:00)" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                            </div>
                            <button type="button" class="remove-jadwal-khusus text-red-600 hover:text-red-900 text-sm font-medium">✕ Hapus</button>
                        </div>
                    @endforeach
                </div>
                <button type="button" id="add-jadwal-khusus" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium">+ Tambah Jadwal Khusus</button>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-2 pt-6 border-t border-gray-200">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg font-medium transition">
                {{ isset($item) ? '💾 Simpan Perubahan' : '✚ Tambah Profil' }}
            </button>
            <a href="{{ route('admin.profil.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-lg font-medium transition">Batal</a>
        </div>
    </form>
</div>

<script>
    document.getElementById('add-jadwal-khusus').addEventListener('click', function(e) {
        e.preventDefault();
        const container = document.getElementById('jadwal-khusus-container');
        const newRow = document.createElement('div');
        newRow.className = 'border border-yellow-300 rounded-lg p-4 bg-yellow-50 jadwal-khusus-row';
        newRow.innerHTML = `
            <div class="grid grid-cols-3 gap-3 mb-3">
                <input type="text" name="jadwal_khusus_tipe[]" placeholder="Tipe Layanan (Contoh: Layanan Administrasi)" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                <input type="text" name="jadwal_khusus_hari[]" placeholder="Hari (Contoh: Senin)" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                <input type="text" name="jadwal_khusus_jam[]" placeholder="Jam (Contoh: 09:00 - 12:00)" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>
            <button type="button" class="remove-jadwal-khusus text-red-600 hover:text-red-900 text-sm font-medium">✕ Hapus</button>
        `;
        container.appendChild(newRow);
        attachRemoveListener(newRow.querySelector('.remove-jadwal-khusus'));
    });

    function attachRemoveListener(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            this.closest('.jadwal-khusus-row').remove();
        });
    }

    document.querySelectorAll('.remove-jadwal-khusus').forEach(button => {
        attachRemoveListener(button);
    });
</script>
@endsection
