<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - KALIKA CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-gradient-to-r from-red-700 to-red-800 text-white shadow-lg sticky top-0 z-50 border-b border-red-900">
        <div class="max-w-full mx-auto px-3 sm:px-4 md:px-6 lg:px-8">
            <div class="flex justify-between items-center h-14 sm:h-16">
                <div class="flex items-center gap-2 md:gap-3 min-w-0">
                    <button id="sidebarToggle" class="md:hidden p-2 hover:bg-red-800 rounded-lg transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <span class="text-lg md:text-2xl">🏘️</span>
                    <h1 class="text-lg md:text-xl font-bold truncate">KALIKA Admin</h1>
                </div>
                <div class="flex items-center gap-2 md:gap-4">
                    <span class="text-xs sm:text-sm md:text-base truncate max-w-[150px] md:max-w-none">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 px-2 sm:px-4 py-1.5 sm:py-2 rounded-lg transition font-medium text-xs sm:text-sm">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex h-[calc(100vh-56px)] sm:h-[calc(100vh-64px)] bg-gray-50 overflow-hidden">
        <!-- Sidebar -->
        <div id="sidebar" class="fixed md:static inset-y-0 left-0 z-40 w-64 bg-red-700 border-r border-red-800 overflow-y-auto transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out md:top-14 sm:md:top-16 top-14 sm:top-16">
            <div class="p-4 md:p-6">
                <nav class="space-y-2 md:space-y-3">
                    <!-- Dashboard Link - PROMINENT -->
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 md:gap-3 px-3 md:px-4 py-2 md:py-3 rounded-lg bg-gradient-to-r from-red-800 to-red-900 hover:from-red-900 hover:to-red-900 text-white font-bold transition shadow-md text-sm md:text-base transform hover:scale-105">
                        <span class="text-xl md:text-2xl">📊</span>
                        <span class="truncate">Dashboard</span>
                    </a>
                    
                    <hr class="my-4 border-red-600">

                    <!-- Section Header -->
                    <div class="text-xs uppercase text-red-50 font-black px-4 py-3 tracking-wider bg-red-800 rounded-lg">📂 Manajemen Data</div>

                    <!-- Menu Items - TEGAS & BESAR -->
                    <a href="{{ route('admin.struktur-organisasi.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-red-800 text-white transition text-sm md:text-base font-semibold hover:font-bold transform hover:translate-x-1">
                        👥 Struktur Organisasi
                    </a>
                    <a href="{{ route('admin.slider.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-red-800 text-white transition text-sm md:text-base font-semibold hover:font-bold transform hover:translate-x-1">
                        🎠 Slider
                    </a>
                    <a href="{{ route('admin.galeri.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-red-800 text-white transition text-sm md:text-base font-semibold hover:font-bold transform hover:translate-x-1">
                        🖼️ Galeri
                    </a>
                    <a href="{{ route('admin.sejarah.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-red-800 text-white transition text-sm md:text-base font-semibold hover:font-bold transform hover:translate-x-1">
                        📖 Sejarah
                    </a>
                    <a href="{{ route('admin.profil.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-red-800 text-white transition text-sm md:text-base font-semibold hover:font-bold transform hover:translate-x-1">
                        ℹ️ Profil
                    </a>
                    <a href="{{ route('admin.kategori.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-red-800 text-white transition text-sm md:text-base font-semibold hover:font-bold transform hover:translate-x-1">
                        🏷️ Kategori
                    </a>
                    <a href="{{ route('admin.layanan.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-red-800 text-white transition text-sm md:text-base font-semibold hover:font-bold transform hover:translate-x-1">
                        📋 Layanan
                    </a>
                    <a href="{{ route('admin.awig-rule.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-red-800 text-white transition text-sm md:text-base font-semibold hover:font-bold transform hover:translate-x-1">
                        ⚖️ Awig Rules
                    </a>
                    <a href="{{ route('admin.awig-file.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-red-800 text-white transition text-sm md:text-base font-semibold hover:font-bold transform hover:translate-x-1">
                        📄 Awig File
                    </a>
                    <a href="{{ route('admin.penduduk-banjar.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-red-800 text-white transition text-sm md:text-base font-semibold hover:font-bold transform hover:translate-x-1">
                        👨‍👩‍👧‍👦 Penduduk Banjar
                    </a>
                </nav>
            </div>
        </div>

        <!-- Mobile Overlay -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-30 md:hidden hidden"></div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto bg-gray-50">
            <div class="p-3 sm:p-4 md:p-8">
                <!-- Flash Messages -->
                @if ($message = session('success'))
                    <div class="mb-4 sm:mb-6 p-3 sm:p-4 bg-green-50 border border-green-200 text-green-800 rounded-lg flex items-center gap-2 sm:gap-3 text-xs sm:text-sm">
                        <span class="text-lg sm:text-xl">✅</span>
                        <span>{{ $message }}</span>
                    </div>
                @endif

                @if ($message = session('error'))
                    <div class="mb-4 sm:mb-6 p-3 sm:p-4 bg-red-50 border border-red-200 text-red-800 rounded-lg flex items-center gap-2 sm:gap-3 text-xs sm:text-sm">
                        <span class="text-lg sm:text-xl">❌</span>
                        <span>{{ $message }}</span>
                    </div>
                @endif

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="mb-4 sm:mb-6 p-3 sm:p-4 bg-red-50 border border-red-200 text-red-800 rounded-lg text-xs sm:text-sm">
                        <div class="font-semibold mb-2 flex items-center gap-2">
                            <span class="text-lg sm:text-xl">⚠️</span>
                            Terjadi kesalahan validasi:
                        </div>
                        <ul class="list-disc list-inside space-y-1 ml-2">
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

    <script>
        // Sidebar Toggle
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
            sidebarOverlay.classList.toggle('hidden');
        });

        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });

        // Close sidebar on link click
        const sidebarLinks = sidebar.querySelectorAll('a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function() {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            });
        });
    </script>
</body>
</html>
