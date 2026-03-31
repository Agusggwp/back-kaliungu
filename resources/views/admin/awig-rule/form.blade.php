@extends('layouts.admin')

@section('title', isset($item) ? 'Edit Awig Rule' : 'Tambah Awig Rule')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
        <svg class="w-8 h-8 text-orange-600" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        {{ isset($item) ? 'Edit Awig Rule' : 'Tambah Awig Rule' }}
    </h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ isset($item) ? route('admin.awig-rule.update', $item->id) : route('admin.awig-rule.store') }}" method="POST">
        @csrf
        @if (isset($item))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="bab" class="block text-sm font-medium text-gray-700">Bab</label>
            <input type="text" name="bab" id="bab" value="{{ old('bab', $item->bab ?? '') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
            <p class="text-gray-500 text-sm mt-1">Contoh: I, II, III, dst</p>
            @error('bab')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul', $item->judul ?? '') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
            @error('judul')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="isi" class="block text-sm font-medium text-gray-700">Isi</label>
            <textarea name="isi" id="isi" rows="6" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">{{ old('isi', $item->isi ?? '') }}</textarea>
            @error('isi')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('admin.awig-rule.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Batal</a>
        </div>
    </form>
</div>
@endsection


