<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Banjar CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-indigo-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold">Banjar CMS Admin</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span>{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                        Dashboard
                    </a>
                    <hr class="my-2 border-gray-700">

                    <div class="text-xs uppercase text-gray-400 font-semibold px-4 py-2">Data Management</div>

                    <a href="{{ route('admin.struktur-organisasi.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                        Struktur Organisasi
                    </a>
                    <a href="{{ route('admin.slider.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                        Slider
                    </a>
                    <a href="{{ route('admin.galeri.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                        Galeri
                    </a>
                    <a href="{{ route('admin.sejarah.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                        Sejarah
                    </a>
                    <a href="{{ route('admin.profil.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                        Profil
                    </a>
                    <a href="{{ route('admin.kategori.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                        Kategori
                    </a>
                    <a href="{{ route('admin.awig-rule.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                        Awig Rules
                    </a>
                    <a href="{{ route('admin.awig-file.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                        Awig File
                    </a>
                    <a href="{{ route('admin.penduduk-banjar.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                        Penduduk Banjar
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <div class="p-8">
                <!-- Flash Messages -->
                @if ($message = session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ $message }}
                    </div>
                @endif

                @if ($message = session('error'))
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        {{ $message }}
                    </div>
                @endif

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
