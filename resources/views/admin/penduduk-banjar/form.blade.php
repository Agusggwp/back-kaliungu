@extends('layouts.admin')

@section('title', isset($item) ? 'Edit Penduduk' : 'Tambah Penduduk')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
        <svg class="w-8 h-8 text-orange-600" viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.89 1.97 1.74 1.97 2.95V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
        {{ isset($item) ? 'Edit Data Penduduk Banjar' : 'Tambah Data Penduduk Banjar' }}
    </h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ isset($item) ? route('admin.penduduk-banjar.update', $item->id) : route('admin.penduduk-banjar.store') }}" method="POST">
        @csrf
        @if (isset($item))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="jumlah_laki_laki" class="block text-sm font-medium text-gray-700">Jumlah Laki-laki</label>
            <input type="number" name="jumlah_laki_laki" id="jumlah_laki_laki" value="{{ old('jumlah_laki_laki', $item->jumlah_laki_laki ?? '') }}" required min="0" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
            @error('jumlah_laki_laki')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="jumlah_perempuan" class="block text-sm font-medium text-gray-700">Jumlah Perempuan</label>
            <input type="number" name="jumlah_perempuan" id="jumlah_perempuan" value="{{ old('jumlah_perempuan', $item->jumlah_perempuan ?? '') }}" required min="0" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
            @error('jumlah_perempuan')
                <p class="text-orange-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="bg-blue-50 border border-blue-200 rounded p-4 mb-4">
            <p class="text-sm text-blue-800"><strong>Total Penduduk:</strong> <span id="total">0</span> orang</p>
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('admin.penduduk-banjar.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Batal</a>
        </div>
    </form>
</div>

<script>
    function updateTotal() {
        const lakiLaki = parseInt(document.getElementById('jumlah_laki_laki').value) || 0;
        const perempuan = parseInt(document.getElementById('jumlah_perempuan').value) || 0;
        document.getElementById('total').textContent = lakiLaki + perempuan;
    }

    document.getElementById('jumlah_laki_laki').addEventListener('input', updateTotal);
    document.getElementById('jumlah_perempuan').addEventListener('input', updateTotal);
    updateTotal();
</script>
@endsection


