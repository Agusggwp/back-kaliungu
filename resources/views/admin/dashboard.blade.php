@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div>
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700">Struktur Organisasi</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-4">{{ \App\Models\StrukturOrganisasi::count() }}</p>
            <a href="{{ route('admin.struktur-organisasi.index') }}" class="mt-4 inline-block text-indigo-600 hover:text-indigo-800">Kelola →</a>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700">Slider</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-4">{{ \App\Models\Slider::count() }}</p>
            <a href="{{ route('admin.slider.index') }}" class="mt-4 inline-block text-indigo-600 hover:text-indigo-800">Kelola →</a>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700">Galeri</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-4">{{ \App\Models\Galeri::count() }}</p>
            <a href="{{ route('admin.galeri.index') }}" class="mt-4 inline-block text-indigo-600 hover:text-indigo-800">Kelola →</a>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700">Kategori</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-4">{{ \App\Models\Kategori::count() }}</p>
            <a href="{{ route('admin.kategori.index') }}" class="mt-4 inline-block text-indigo-600 hover:text-indigo-800">Kelola →</a>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700">Penduduk Banjar</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-4">{{ \App\Models\PendudukBanjar::count() }}</p>
            <a href="{{ route('admin.penduduk-banjar.index') }}" class="mt-4 inline-block text-indigo-600 hover:text-indigo-800">Kelola →</a>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700">Awig Rules</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-4">{{ \App\Models\AwigRule::count() }}</p>
            <a href="{{ route('admin.awig-rule.index') }}" class="mt-4 inline-block text-indigo-600 hover:text-indigo-800">Kelola →</a>
        </div>
    </div>
</div>
@endsection
