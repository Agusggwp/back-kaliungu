@extends('layouts.admin')

@section('title', 'Slider')

@section('content')
<div class="space-y-4 md:space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg md:rounded-2xl shadow-lg p-4 sm:p-6 text-white">
        <div class="flex flex-col sm:flex-row items-start sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold flex items-center gap-2">
                    <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
                    Slider
                </h1>
                <p class="text-orange-100 mt-1 text-xs sm:text-sm md:text-base">Kelola gambar slider banner di halaman depan</p>
            </div>
            <a href="{{ route('admin.slider.create') }}"
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
                <p class="text-sm md:text-base text-gray-500">Tidak ada data slider</p>
                <a href="{{ route('admin.slider.create') }}" class="mt-4 text-orange-600 hover:text-orange-800 font-medium text-sm md:text-base">Buat yang pertama →</a>
            </div>
        </div>
    @else
        <!-- Table Responsive -->
        <div class="bg-white rounded-lg md:rounded-2xl shadow-lg overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-orange-50 to-orange-50 border-b">
                        <tr>
                            <th class="px-3 sm:px-6 py-3 text-left font-bold text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Title</th>
                            <th class="hidden sm:table-cell px-3 sm:px-6 py-3 text-left font-bold text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Image</th>
                            <th class="hidden md:table-cell px-3 sm:px-6 py-3 text-left font-bold text-gray-700 text-xs sm:text-sm uppercase tracking-wider">URL</th>
                            <th class="px-3 sm:px-6 py-3 text-left font-bold text-gray-700 text-xs sm:text-sm uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($items as $item)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-3 sm:px-6 py-3 text-gray-900 font-semibold text-xs sm:text-sm">{{ $item->title }}</td>
                                <td class="hidden sm:table-cell px-3 sm:px-6 py-3 text-gray-600 text-xs sm:text-sm">{{ substr($item->image, 0, 15) }}{{ strlen($item->image) > 15 ? '...' : '' }}</td>
                                <td class="hidden md:table-cell px-3 sm:px-6 py-3 text-gray-600 text-xs sm:text-sm">{{ $item->url ?? '-' }}</td>
                                <td class="px-3 sm:px-6 py-3">
                                    <div class="flex flex-col sm:flex-row gap-1 sm:gap-2">
                                        <a href="{{ route('admin.slider.edit', $item->id) }}"
                                            class="bg-orange-500 text-white px-2 sm:px-3 py-1 sm:py-2 rounded-lg text-xs sm:text-sm hover:bg-orange-600 transition font-medium text-center">
                                            ✏️ Edit
                                        </a>
                                        <form action="{{ route('admin.slider.destroy', $item->id) }}" method="POST" class="w-full sm:w-auto">
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

