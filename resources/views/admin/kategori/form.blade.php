@extends('layouts.admin')

@section('title', isset($item) ? 'Edit Kategori' : 'Tambah Kategori')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
        <svg class="w-8 h-8 text-orange-600" viewBox="0 0 24 24" fill="currentColor"><path d="M5.5 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2m6.5.5c-.83 0-1.5.67-1.5 1.5s.67 1.5 1.5 1.5 1.5-.67 1.5-1.5-.67-1.5-1.5-1.5zm6-1c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-12-4C3.13 5.5 2 6.63 2 8v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.37-1.13-2.5-2.5-2.5H5.5z"/></svg>
        {{ isset($item) ? 'Edit Kategori' : 'Tambah Kategori' }}
    </h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ isset($item) ? route('admin.kategori.update', $item->id) : route('admin.kategori.store') }}" method="POST">
        @csrf
        @if (isset($item))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $item->nama ?? '') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
            @error('nama')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>
            @error('deskripsi')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('admin.kategori.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Batal</a>
        </div>
    </form>
</div>
@endsection


