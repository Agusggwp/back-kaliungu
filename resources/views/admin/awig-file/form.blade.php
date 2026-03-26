@extends('layouts.admin')

@section('title', isset($item) ? 'Edit Awig File' : 'Tambah Awig File')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">
        {{ isset($item) ? 'Edit Awig File' : 'Tambah Awig File' }}
    </h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ isset($item) ? route('admin.awig-file.update', $item->id) : route('admin.awig-file.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($item))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="nama_file" class="block text-sm font-medium text-gray-700">Nama File</label>
            <input type="text" name="nama_file" id="nama_file" value="{{ old('nama_file', $item->nama_file ?? '') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('nama_file')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="file_path" class="block text-sm font-medium text-gray-700">File/Dokumen</label>
            <input type="file" name="file_path" id="file_path" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.gif,.zip" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            <p class="text-gray-500 text-sm mt-1">Format: PDF, DOC, DOCX, JPG, PNG, GIF, ZIP (maks 5MB)</p>
            @error('file_path')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            @if (isset($item) && $item->file_path)
                <p class="text-sm text-gray-600 mt-2">File saat ini: <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="text-indigo-600 hover:text-indigo-700">Lihat File</a></p>
            @endif
        </div>

        <div class="mb-4">
            <label for="tanggal_upload" class="block text-sm font-medium text-gray-700">Tanggal Upload</label>
            <input type="date" name="tanggal_upload" id="tanggal_upload" value="{{ old('tanggal_upload', $item->tanggal_upload ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('tanggal_upload')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('admin.awig-file.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Batal</a>
        </div>
    </form>
</div>
@endsection
