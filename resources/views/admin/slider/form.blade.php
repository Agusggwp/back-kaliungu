@extends('layouts.admin')

@section('title', isset($item) ? 'Edit Slider' : 'Tambah Slider')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
        <svg class="w-8 h-8 text-orange-600" viewBox="0 0 24 24" fill="currentColor"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
        {{ isset($item) ? 'Edit Slider' : 'Tambah Slider' }}
    </h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ isset($item) ? route('admin.slider.update', $item->id) : route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($item))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $item->title ?? '') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
            @error('title')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" id="description" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">{{ old('description', $item->description ?? '') }}</textarea>
            @error('description')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Gambar/Image</label>
            <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
            @error('image')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            @if (isset($item) && $item->image)
                <p class="text-sm text-gray-600 mt-2">Gambar saat ini: <a href="{{ asset('storage/' . $item->image) }}" target="_blank" class="text-orange-600 hover:text-orange-700">Lihat Gambar</a></p>
            @endif
        </div>

        <div class="mb-4">
            <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
            <input type="text" name="url" id="url" value="{{ old('url', $item->url ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
            <p class="text-gray-500 text-sm mt-1">Opsional: URL link ketika slider diklik</p>
            @error('url')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('admin.slider.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Batal</a>
        </div>
    </form>
</div>
@endsection


