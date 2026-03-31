@extends('layouts.admin')

@section('title', isset($item) ? 'Edit Struktur Organisasi' : 'Tambah Struktur Organisasi')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
        <svg class="w-8 h-8 text-orange-600" viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.89 1.97 1.74 1.97 2.95V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
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
            <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $item->jabatan ?? '') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
            @error('jabatan')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $item->nama ?? '') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
            @error('nama')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="file" class="block text-sm font-medium text-gray-700">File/Dokumen</label>
            <input type="file" name="file" id="file" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.gif" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
            <p class="text-gray-500 text-sm mt-1">Format: PDF, DOC, DOCX, JPG, PNG, GIF (maks 5MB)</p>
            @error('file')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            @if (isset($item) && $item->file)
                <p class="text-sm text-gray-600 mt-2">File saat ini: <a href="{{ asset('storage/' . $item->file) }}" target="_blank" class="text-orange-600 hover:text-orange-700">Lihat File</a></p>
            @endif
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('admin.struktur-organisasi.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Batal</a>
        </div>
    </form>
</div>
@endsection


