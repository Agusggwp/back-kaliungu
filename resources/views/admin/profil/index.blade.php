@extends('layouts.admin')

@section('title', 'Profil')

@section('content')
<div class="space-y-4 md:space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg md:rounded-2xl shadow-lg p-4 sm:p-6 text-white">
        <div class="flex flex-col sm:flex-row items-start sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold flex items-center gap-2">
                    <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    Profil Banjar
                </h1>
                <p class="text-orange-100 mt-1 text-xs sm:text-sm md:text-base">Kelola profil resmi Banjar Kaliungu Kaja</p>
            </div>
            <a href="{{ route('admin.profil.create') }}"
                class="bg-white text-orange-600 px-4 sm:px-6 py-2 sm:py-3 rounded-lg font-bold hover:bg-gray-100 transition flex items-center gap-2 whitespace-nowrap text-sm sm:text-base">
                ➕ Tambah Profil
            </a>
        </div>
    </div>

@if ($items->isEmpty())
    <!-- Empty State -->
    <div class="bg-white rounded-lg md:rounded-2xl shadow-lg p-6 md:p-12 text-center">
        <div class="flex flex-col items-center gap-3">
            <span class="text-3xl sm:text-4xl">📭</span>
            <p class="text-sm md:text-base text-gray-500">Belum ada data profil</p>
            <a href="{{ route('admin.profil.create') }}" class="mt-4 text-orange-600 hover:text-orange-800 font-medium text-sm md:text-base">Buat profil pertama →</a>
        </div>
    </div>
@else
    @foreach ($items as $item)
    @php
        // Decode jam_pelayanan JSON
        $jam_pelayanan = [];
        if ($item->jam_pelayanan) {
            $jam_pelayanan = is_array($item->jam_pelayanan) 
                ? $item->jam_pelayanan 
                : json_decode($item->jam_pelayanan, true) ?? [];
        }
    @endphp
    
    <div class="bg-white rounded-lg md:rounded-2xl shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-orange-600 to-orange-600 p-4 sm:p-6 md:p-8 text-white">
            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                <div>
                    <h2 class="text-xl sm:text-2xl md:text-3xl font-bold mb-1 sm:mb-2">{{ $item->nama }}</h2>
                    <p class="text-orange-100 text-xs sm:text-sm md:text-base">{{ $item->deskripsi }}</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-2">
                    <a href="{{ route('admin.profil.edit', $item->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 sm:px-4 py-2 rounded-lg font-medium transition text-center text-xs sm:text-sm">✏️ Edit</a>
                    <form action="{{ route('admin.profil.destroy', $item->id) }}" method="POST" class="w-full sm:w-auto">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-purple-500 hover:bg-purple-600 text-white px-3 sm:px-4 py-2 rounded-lg font-medium transition text-xs sm:text-sm" onclick="return confirm('Yakin ingin menghapus profil ini?')">🗑️ Hapus</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="p-4 sm:p-6 md:p-8 space-y-6 md:space-y-8">
            <!-- Informasi Kontak & Alamat -->
            <div>
                <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-3 sm:mb-4 pb-2 md:pb-3 border-b border-gray-200 flex items-center gap-2">📍 Informasi Kontak</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                    <div class="bg-gray-50 p-3 sm:p-4 rounded-lg">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Alamat</p>
                        <p class="text-gray-900 mt-1 sm:mt-2 font-medium text-xs sm:text-sm md:text-base">{{ $item->alamat ?? '-' }}</p>
                    </div>
                    <div class="bg-gray-50 p-3 sm:p-4 rounded-lg">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Telepon</p>
                        <p class="text-gray-900 mt-1 sm:mt-2 font-medium text-xs sm:text-sm md:text-base">
                            <a href="tel:{{ $item->telepon }}" class="text-orange-600 hover:text-orange-800">{{ $item->telepon ?? '-' }}</a>
                        </p>
                    </div>
                    <div class="bg-gray-50 p-3 sm:p-4 rounded-lg md:col-span-2">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Email</p>
                        <p class="text-gray-900 mt-1 sm:mt-2 font-medium text-xs sm:text-sm md:text-base">
                            <a href="mailto:{{ $item->email }}" class="text-orange-600 hover:text-orange-800">{{ $item->email ?? '-' }}</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Jam Pelayanan -->
            @if (!empty($jam_pelayanan))
            <div>
                <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-3 sm:mb-4 pb-2 md:pb-3 border-b border-gray-200 flex items-center gap-2">🕐 Jam Pelayanan</h3>
                
                <!-- Jam Reguler -->
                <div class="bg-blue-50 border-l-4 border-blue-400 p-3 sm:p-4 md:p-5 rounded-lg">
                    <h4 class="font-semibold text-blue-900 mb-2 sm:mb-3 text-sm md:text-base">Jam Reguler</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4">
                        <div>
                            <p class="text-xs text-blue-600 font-semibold uppercase">Hari</p>
                            <p class="text-base sm:text-lg font-bold text-blue-900 mt-1">{{ $jam_pelayanan['hari'] ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-blue-600 font-semibold uppercase">Jam Buka</p>
                            <p class="text-base sm:text-lg font-bold text-blue-900 mt-1">{{ $jam_pelayanan['jam_buka'] ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-blue-600 font-semibold uppercase">Jam Tutup</p>
                            <p class="text-base sm:text-lg font-bold text-blue-900 mt-1">{{ $jam_pelayanan['jam_tutup'] ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Jadwal Layanan Khusus -->
                @if (!empty($jam_pelayanan['jam_layanan_khusus']) && is_array($jam_pelayanan['jam_layanan_khusus']))
                <div class="mt-4 sm:mt-6">
                    <h4 class="font-semibold text-gray-900 mb-3 text-sm md:text-base">Jadwal Layanan Khusus</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 sm:gap-3">
                        @foreach ($jam_pelayanan['jam_layanan_khusus'] as $jadwal)
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-3 sm:p-4 rounded-lg">
                            <p class="font-semibold text-yellow-900 text-xs sm:text-sm md:text-base">{{ $jadwal['tipe'] ?? 'Layanan' }}</p>
                            <div class="mt-2 space-y-1 text-xs sm:text-sm">
                                <p class="text-gray-700"><strong>Hari:</strong> {{ $jadwal['hari'] ?? '-' }}</p>
                                <p class="text-gray-700"><strong>Jam:</strong> {{ $jadwal['jam'] ?? '-' }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            @endif

            <!-- Meta Info -->
            <div class="border-t pt-4">
                <p class="text-xs text-gray-500">
                    <strong>Created:</strong> {{ $item->created_at->format('d M Y H:i') }} | 
                    <strong>Updated:</strong> {{ $item->updated_at->format('d M Y H:i') }}
                </p>
            </div>
        </div>
    </div>
    @endforeach
@endif
</div>
@endsection

