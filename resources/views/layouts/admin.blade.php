<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - KALIKA CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/iconify/icon-sets/json/solar.json">
    <style>
        .iconify { display: inline-block; color: currentColor; }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-gradient-to-r from-purple-700 to-purple-800 text-white shadow-lg sticky top-0 z-50 border-b border-purple-900">
        <div class="max-w-full mx-auto px-3 sm:px-4 md:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20 sm:h-24 md:h-28">
                <div class="flex items-center gap-3 md:gap-4 min-w-0">
                    <button id="sidebarToggle" class="md:hidden p-2 hover:bg-purple-800 rounded-lg transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <div class="bg-white rounded-full p-1 shadow-lg border-4 border-orange-500">
                        <img src="{{ asset('images/logo.png') }}" alt="KALIKA Logo" class="h-12 sm:h-14 md:h-16 w-12 sm:w-14 md:w-16 object-contain rounded-full" />
                    </div>
                    <h1 class="text-lg md:text-xl font-bold truncate">KALIKA Admin</h1>
                </div>
                <div class="flex items-center gap-2 md:gap-4">
                    <span class="text-xs sm:text-sm md:text-base truncate max-w-[150px] md:max-w-none">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-purple-600 hover:bg-purple-700 px-2 sm:px-4 py-1.5 sm:py-2 rounded-lg transition font-medium text-xs sm:text-sm">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex h-[calc(100vh-80px)] sm:h-[calc(100vh-96px)] md:h-[calc(100vh-112px)] bg-gray-50 overflow-hidden">
        <!-- Sidebar -->
        <div id="sidebar" class="fixed md:static inset-y-0 left-0 z-40 w-64 bg-purple-700 border-r border-purple-800 overflow-y-auto transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out top-20 sm:top-24 md:top-28">
            <div class="p-4 md:p-6">
                <nav class="space-y-2 md:space-y-3">
                    <!-- Dashboard Link - PROMINENT -->
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 md:gap-3 px-3 md:px-4 py-2 md:py-3 rounded-lg bg-gradient-to-r from-purple-800 to-purple-900 hover:from-purple-900 hover:to-purple-900 text-white font-bold transition shadow-md text-sm md:text-base transform hover:scale-105">
                        <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>
                        <span class="truncate">Dashboard</span>
                    </a>
                    
                    <hr class="my-4 border-purple-600">

                    <!-- Section Header -->
                    <div class="text-xs uppercase text-purple-50 font-black px-4 py-3 tracking-wider bg-purple-800 rounded-lg flex items-center">
                        <svg class="w-4 h-4 flex-shrink-0 mr-2" viewBox="0 0 24 24" fill="currentColor"><path d="M10 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h6v2h4v-2h6c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2h-6V2h-4v2zm10 14H4V6h16v12z"/></svg>
                        Manajemen Data
                    </div>

                    <!-- Menu Items - Icons match dashboard exactly -->
                    @php
                        $menuItems = [
                            ['route' => 'admin.struktur-organisasi.index', 'label' => 'Struktur Organisasi', 'icon' => 'M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.89 1.97 1.74 1.97 2.95V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z'],
                            ['route' => 'admin.slider.index', 'label' => 'Slider', 'icon' => 'M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z'],
                            ['route' => 'admin.galeri.index', 'label' => 'Galeri', 'icon' => 'M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zm-12-3l2.03-2.71 2.97 3.96 4-5.5H5l6 7z'],
                            ['route' => 'admin.kategori.index', 'label' => 'Kategori', 'icon' => 'M5.5 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2m6.5.5c-.83 0-1.5.67-1.5 1.5s.67 1.5 1.5 1.5 1.5-.67 1.5-1.5-.67-1.5-1.5-1.5zm6-1c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-12-4C3.13 5.5 2 6.63 2 8v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.37-1.13-2.5-2.5-2.5H5.5z'],
                            ['route' => 'admin.penduduk-banjar.index', 'label' => 'Penduduk Banjar', 'icon' => 'M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.89 1.97 1.74 1.97 2.95V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z'],
                            ['route' => 'admin.awig-rule.index', 'label' => 'Awig Rules', 'icon' => 'M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z'],
                            ['route' => 'admin.layanan.index', 'label' => 'Layanan', 'icon' => 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z'],
                            ['route' => 'admin.sejarah.index', 'label' => 'Sejarah', 'icon' => 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z'],
                            ['route' => 'admin.profil.index', 'label' => 'Profil', 'icon' => 'M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z'],
                            ['route' => 'admin.awig-file.index', 'label' => 'Awig File', 'icon' => 'M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-8-6z'],
                        ];
                    @endphp
                    
                    @foreach ($menuItems as $item)
                        @php
                            $isActive = request()->routeIs($item['route']) || request()->routeIs(str_replace('.index', '.*', $item['route']));
                        @endphp
                        <a href="{{ route($item['route']) }}" 
                            class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition text-sm md:text-base font-medium
                                {{ $isActive 
                                    ? 'bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold shadow-lg border-l-4 border-orange-300' 
                                    : 'text-purple-100 hover:bg-purple-800 hover:text-white transform hover:translate-x-1' 
                                }}">
                            <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                                <path d="{{ $item['icon'] }}"/>
                            </svg>
                            <span class="truncate">{{ $item['label'] }}</span>
                            @if ($isActive)
                                <span class="ml-auto">✓</span>
                            @endif
                        </a>
                    @endforeach
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
                    <div class="mb-4 sm:mb-6 p-3 sm:p-4 bg-orange-50 border border-orange-200 text-orange-800 rounded-lg flex items-center gap-2 sm:gap-3 text-xs sm:text-sm">
                        <span class="text-lg sm:text-xl">✅</span>
                        <span>{{ $message }}</span>
                    </div>
                @endif

                @if ($message = session('error'))
                    <div class="mb-4 sm:mb-6 p-3 sm:p-4 bg-purple-50 border border-purple-200 text-purple-800 rounded-lg flex items-center gap-2 sm:gap-3 text-xs sm:text-sm">
                        <span class="text-lg sm:text-xl">❌</span>
                        <span>{{ $message }}</span>
                    </div>
                @endif

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="mb-4 sm:mb-6 p-3 sm:p-4 bg-purple-50 border border-purple-200 text-purple-800 rounded-lg text-xs sm:text-sm">
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

