@extends('layouts.admin')

@section('title', 'Awig Rules')

@section('content')
<div class="space-y-4 md:space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-emerald-500 to-cyan-500 rounded-lg md:rounded-2xl shadow-lg p-4 sm:p-6 text-white">
        <div class="flex flex-col sm:flex-row items-start sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold flex items-center gap-2">📜 Awig-Awig Rules</h1>
                <p class="text-emerald-100 mt-1 text-xs sm:text-sm md:text-base">Kelola peraturan awig-awig Banjar</p>
            </div>
            <a href="{{ route('admin.awig-rule.create') }}"
                class="bg-white text-emerald-600 px-4 sm:px-6 py-2 sm:py-3 rounded-lg font-bold hover:bg-gray-100 transition flex items-center gap-2 whitespace-nowrap text-sm sm:text-base">
                ➕ Tambah
            </a>
        </div>
    </div>

    @if ($items->isEmpty())
        <!-- Empty State -->
        <div class="bg-white rounded-lg md:rounded-2xl shadow-lg p-6 md:p-8 text-center">
            <div class="flex flex-col items-center gap-3">
                <span class="text-3xl sm:text-4xl">📭</span>
                <p class="text-sm md:text-base text-gray-500">Tidak ada data awig-awig</p>
                <a href="{{ route('admin.awig-rule.create') }}" class="mt-4 text-emerald-600 hover:text-emerald-800 font-medium text-sm md:text-base">Buat yang pertama →</a>
            </div>
        </div>
    @else
        <!-- Table Responsive -->
        <div class="bg-white rounded-lg md:rounded-2xl shadow-lg overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-emerald-50 to-cyan-50 border-b">
                        <tr>
                            <th class="px-3 sm:px-6 py-3 text-left font-bold text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Bab</th>
                            <th class="hidden sm:table-cell px-3 sm:px-6 py-3 text-left font-bold text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Judul</th>
                            <th class="px-3 sm:px-6 py-3 text-left font-bold text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($items as $item)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-3 sm:px-6 py-3 text-gray-900 font-semibold text-xs sm:text-sm">{{ $item->bab }}</td>
                                <td class="hidden sm:table-cell px-3 sm:px-6 py-3 text-gray-600 text-xs sm:text-sm">{{ $item->judul }}</td>
                                <td class="px-3 sm:px-6 py-3">
                                    <div class="flex flex-col sm:flex-row gap-1 sm:gap-2">
                                        <a href="{{ route('admin.awig-rule.edit', $item->id) }}"
                                            class="bg-emerald-500 text-white px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm hover:bg-emerald-600 transition font-medium text-center">
                                            ✏️ Edit
                                        </a>
                                        <form action="{{ route('admin.awig-rule.destroy', $item->id) }}" method="POST" class="w-full sm:w-auto">
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
