@extends('layouts.admin')

@section('title', isset($item) ? 'Edit Sejarah' : 'Tambah Sejarah')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
        <svg class="w-8 h-8 text-orange-600" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
        {{ isset($item) ? 'Edit Sejarah' : 'Tambah Sejarah' }}
    </h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ isset($item) ? route('admin.sejarah.update', $item->id) : route('admin.sejarah.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($item))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="title" id="title" value="{{ old('title', $item->title ?? '') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
            @error('title')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Isi</label>
            <textarea name="content" id="content" rows="6" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">{{ old('content', $item->content ?? '') }}</textarea>
            @error('content')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="lokasi" class="block text-sm font-medium text-gray-700">Keterangan Lokasi</label>
            <textarea name="lokasi" id="lokasi" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">{{ old('lokasi', $item->lokasi ?? '') }}</textarea>
            @error('lokasi')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="year_founded" class="block text-sm font-medium text-gray-700">Tahun Didirikan</label>
            <input type="number" name="year_founded" id="year_founded" value="{{ old('year_founded', $item->year_founded ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
            @error('year_founded')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Foto/Gambar</label>
            <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
            @error('image')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            @if (isset($item) && $item->image)
                <div class="mt-4">
                    <p class="text-sm text-gray-600 mb-2">Foto saat ini:</p>
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="h-32 w-32 object-cover rounded border border-gray-300">
                </div>
            @endif
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('admin.sejarah.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Batal</a>
        </div>
    </form>
</div>
@endsection


