@extends('layouts.admin')

@section('title', 'Layanan')

@section('content')
<div class="space-y-4 md:space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-emerald-500 to-cyan-500 rounded-lg md:rounded-2xl shadow-lg p-4 sm:p-6 md:p-6 text-white">
        <div class="flex flex-col sm:flex-row items-start sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold flex items-center gap-2">📋 Kelola Layanan</h1>
                <p class="text-emerald-100 mt-1 text-xs sm:text-sm md:text-base">Manage semua layanan Banjar Kaliungu Kaja dengan informasi lengkap</p>
            </div>
            <a href="{{ route('admin.layanan.create') }}"
                class="bg-white text-emerald-600 px-4 sm:px-6 py-2 sm:py-3 rounded-lg font-bold hover:bg-gray-100 transition flex items-center gap-2 whitespace-nowrap text-sm sm:text-base">
                ➕ Tambah Layanan
            </a>
        </div>
    </div>

    <!-- Alert -->
    @if ($message = Session::get('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-3 sm:px-4 py-2 sm:py-3 rounded-lg flex items-center gap-2 text-xs sm:text-sm">
            <span>✅</span>
            {{ $message }}
        </div>
    @endif

    <!-- Table Responsive -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-emerald-50 to-cyan-50 border-b">
                    <tr>
                        <th class="px-3 sm:px-6 py-3 text-left font-bold text-gray-700 text-xs sm:text-sm uppercase tracking-wider">No</th>
                        <th class="px-3 sm:px-6 py-3 text-left font-bold text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Nama</th>
                        <th class="hidden sm:table-cell px-3 sm:px-6 py-3 text-left font-bold text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Kategori</th>
                        <th class="hidden md:table-cell px-3 sm:px-6 py-3 text-left font-bold text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Lokasi</th>
                        <th class="hidden lg:table-cell px-3 sm:px-6 py-3 text-left font-bold text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Telepon</th>
                        <th class="px-3 sm:px-6 py-3 text-left font-bold text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($items as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-3 sm:px-6 py-3 text-gray-700 font-medium text-xs sm:text-sm">{{ $loop->iteration }}</td>
                            <td class="px-3 sm:px-6 py-3 text-gray-900 font-semibold text-xs sm:text-sm">{{ $item->nama }}</td>
                            <td class="hidden sm:table-cell px-3 sm:px-6 py-3">
                                <span class="inline-block bg-emerald-100 text-emerald-800 px-2 sm:px-3 py-1 rounded-full text-xs font-medium">
                                    {{ $item->category ?? '-' }}
                                </span>
                            </td>
                            <td class="hidden md:table-cell px-3 sm:px-6 py-3 text-gray-600 text-xs sm:text-sm">{{ substr($item->lokasi ?? '-', 0, 15) }}{{ strlen($item->lokasi ?? '') > 15 ? '...' : '' }}</td>
                            <td class="hidden lg:table-cell px-3 sm:px-6 py-3 text-gray-600 text-xs sm:text-sm font-mono">{{ $item->telepon ?? '-' }}</td>
                            <td class="px-3 sm:px-6 py-3">
                                <div class="flex flex-col sm:flex-row gap-1 sm:gap-2">
                                    <a href="{{ route('admin.layanan.edit', $item->id) }}"
                                        class="bg-emerald-500 text-white px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm hover:bg-emerald-600 transition font-medium text-center">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('admin.layanan.destroy', $item->id) }}" method="POST" class="w-full sm:w-auto">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')"
                                            class="w-full sm:w-auto bg-red-500 text-white px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm hover:bg-red-600 transition font-medium">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-3 sm:px-6 py-8 sm:py-12 text-center text-gray-500">
                                <div class="flex flex-col items-center gap-2">
                                    <span class="text-3xl sm:text-4xl">📭</span>
                                    <p class="text-xs sm:text-sm">Tidak ada data layanan</p>
                                    <a href="{{ route('admin.layanan.create') }}" class="mt-3 sm:mt-4 text-emerald-600 hover:text-emerald-800 font-medium text-xs sm:text-sm">Buat yang pertama →</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Info Box -->
    <div class="bg-blue-50 border border-blue-200 rounded-xl p-3 sm:p-6 flex items-start gap-3 sm:gap-4">
        <span class="text-xl sm:text-2xl flex-shrink-0">ℹ️</span>
        <div>
            <p class="text-gray-700 font-semibold text-xs sm:text-sm mb-1">Informasi Layanan</p>
            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                Kelola semua layanan dengan informasi lengkap termasuk kategori, deskripsi, jadwal, lokasi, kontak, dan daftar layanan/persyaratan yang ditawarkan. Anda dapat menambah, mengedit, atau menghapus layanan sesuai kebutuhan.
            </p>
        </div>
    </div>
</div>
@endsection
