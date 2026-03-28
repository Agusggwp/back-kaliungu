@extends('layouts.admin')

@section('title', isset($item) ? 'Edit Penduduk' : 'Tambah Penduduk')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">
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
            <input type="number" name="jumlah_laki_laki" id="jumlah_laki_laki" value="{{ old('jumlah_laki_laki', $item->jumlah_laki_laki ?? '') }}" required min="0" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('jumlah_laki_laki')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="jumlah_perempuan" class="block text-sm font-medium text-gray-700">Jumlah Perempuan</label>
            <input type="number" name="jumlah_perempuan" id="jumlah_perempuan" value="{{ old('jumlah_perempuan', $item->jumlah_perempuan ?? '') }}" required min="0" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @error('jumlah_perempuan')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="bg-blue-50 border border-blue-200 rounded p-4 mb-4">
            <p class="text-sm text-blue-800"><strong>Total Penduduk:</strong> <span id="total">0</span> orang</p>
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Simpan</button>
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
