@extends('layouts.admin')

@section('title', isset($item) ? 'Edit Struktur Organisasi' : 'Tambah Struktur Organisasi')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">
        {{ isset($item) ? 'Edit Struktur Organisasi' : 'Tambah Struktur Organisasi' }}
    </h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ isset($item) ? route('admin.struktur-organisasi.update', $item->id) : route('admin.struktur-organisasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($item))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $item->jabatan ?? '') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('jabatan')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $item->nama ?? '') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('nama')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="file" class="block text-sm font-medium text-gray-700">File/Dokumen</label>
            <input type="file" name="file" id="file" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.gif" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            <p class="text-gray-500 text-sm mt-1">Format: PDF, DOC, DOCX, JPG, PNG, GIF (maks 5MB)</p>
            @error('file')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            @if (isset($item) && $item->file)
                <p class="text-sm text-gray-600 mt-2">File saat ini: <a href="{{ asset('storage/' . $item->file) }}" target="_blank" class="text-indigo-600 hover:text-indigo-700">Lihat File</a></p>
            @endif
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('admin.struktur-organisasi.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Batal</a>
        </div>
    </form>
</div>
@endsection
