@extends('layouts.admin')

@section('title', 'Struktur Organisasi')

@section('content')
<div class="space-y-4 md:space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg md:rounded-2xl shadow-lg p-4 sm:p-6 text-white">
        <div class="flex flex-col sm:flex-row items-start sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold flex items-center gap-2">
                    <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.89 1.97 1.74 1.97 2.95V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                    Struktur Organisasi
                </h1>
                <p class="text-orange-100 mt-1 text-xs sm:text-sm md:text-base">Kelola struktur organisasi Banjar Kaliungu Kaja</p>
            </div>
            <a href="{{ route('admin.struktur-organisasi.create') }}"
                class="bg-white text-orange-600 px-4 sm:px-6 py-2 sm:py-3 rounded-lg font-bold hover:bg-gray-100 transition flex items-center gap-2 whitespace-nowrap text-sm sm:text-base">
                ➕ Tambah
            </a>
        </div>
    </div>

    @if ($items->isEmpty())
        <!-- Empty State -->
        <div class="bg-white rounded-lg md:rounded-2xl shadow-lg p-6 md:p-8 text-center">
            <div class="flex flex-col items-center gap-3">
                <span class="text-3xl sm:text-4xl">📭</span>
                <p class="text-sm md:text-base text-gray-500">Tidak ada data struktur organisasi</p>
                <a href="{{ route('admin.struktur-organisasi.create') }}" class="mt-4 text-orange-600 hover:text-orange-800 font-medium text-sm md:text-base">Buat yang pertama →</a>
            </div>
        </div>
    @else
        <!-- Table Responsive -->
        <div class="bg-white rounded-lg md:rounded-2xl shadow-lg overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-orange-50 to-orange-50 border-b">
                        <tr>
                            <th class="px-3 sm:px-6 py-3 text-left font-bold text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Jabatan</th>
                            <th class="hidden sm:table-cell px-3 sm:px-6 py-3 text-left font-bold text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Nama</th>
                            <th class="hidden md:table-cell px-3 sm:px-6 py-3 text-left font-bold text-gray-700 text-xs sm:text-sm uppercase tracking-wider">File</th>
                            <th class="px-3 sm:px-6 py-3 text-left font-bold text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($items as $item)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-3 sm:px-6 py-3 text-gray-900 font-semibold text-xs sm:text-sm">{{ $item->jabatan }}</td>
                                <td class="hidden sm:table-cell px-3 sm:px-6 py-3 text-gray-600 text-xs sm:text-sm">{{ $item->nama }}</td>
                                <td class="hidden md:table-cell px-3 sm:px-6 py-3 text-gray-600 text-xs sm:text-sm">{{ $item->file ?? '-' }}</td>
                                <td class="px-3 sm:px-6 py-3">
                                    <div class="flex flex-col sm:flex-row gap-1 sm:gap-2">
                                        <a href="{{ route('admin.struktur-organisasi.edit', $item->id) }}"
                                            class="bg-orange-500 text-white px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm hover:bg-orange-600 transition font-medium text-center">
                                            ✏️ Edit
                                        </a>
                                        <form action="{{ route('admin.struktur-organisasi.destroy', $item->id) }}" method="POST" class="w-full sm:w-auto">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                class="w-full sm:w-auto bg-purple-500 text-white px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm hover:bg-purple-600 transition font-medium">
                                                🗑️ Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection

