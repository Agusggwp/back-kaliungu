<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KALIKA - Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-red-50 via-orange-50 to-red-100 min-h-screen flex items-center justify-center px-3 sm:px-4 md:px-6 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute top-0 left-0 w-48 sm:w-64 md:w-96 h-48 sm:h-64 md:h-96 bg-red-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
    <div class="absolute top-0 right-0 w-48 sm:w-64 md:w-96 h-48 sm:h-64 md:h-96 bg-orange-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob-delay-2"></div>
    <div class="absolute bottom-0 left-1/2 w-48 sm:w-64 md:w-96 h-48 sm:h-64 md:h-96 bg-red-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob-delay-4"></div>
    
    <div class="relative z-10 w-full max-w-7xl px-2 sm:px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center">
            <!-- Left Section - Brand (Hidden on mobile) -->
            <div class="hidden lg:flex flex-col justify-center items-start">
                <!-- Logo/Icon -->
                <div class="mb-8 md:mb-12 animate-float">
                    <div class="w-24 sm:w-28 md:w-32 h-24 sm:h-28 md:h-32 bg-gradient-to-br from-red-300 via-red-400 to-orange-400 rounded-3xl flex items-center justify-center shadow-lg">
                        <span class="text-4xl sm:text-5xl md:text-6xl">🏘️</span>
                    </div>
                </div>
                
                <!-- Brand Text -->
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black text-red-900 mb-4 leading-tight">KALIKA</h1>
                <p class="text-lg sm:text-xl md:text-2xl text-red-700 mb-6 md:mb-8 font-light">Manajemen Informasi Banjar</p>
                
                <!-- Description -->
                <p class="text-gray-700 text-base sm:text-lg leading-relaxed max-w-md mb-6 md:mb-8">
                    Platform terpadu untuk mengelola data, informasi, dan kegiatan Banjar Kaliungu Kaja dengan mudah dan aman.
                </p>
                
                <!-- Features -->
                <div class="space-y-3 md:space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 bg-red-500 rounded-full flex-shrink-0"></div>
                        <span class="text-gray-700 text-sm md:text-base">Manajemen data terstruktur</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 bg-red-500 rounded-full flex-shrink-0"></div>
                        <span class="text-gray-700 text-sm md:text-base">Kontrol akses admin modern</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 bg-red-500 rounded-full flex-shrink-0"></div>
                        <span class="text-gray-700 text-sm md:text-base">Interface yang intuitif</span>
                    </div>
                </div>
            </div>

            <!-- Right Section - Login Form -->
            <div class="flex items-center justify-center w-full">
                <div class="w-full max-w-sm">
                    <!-- Card -->
                    <div class="bg-white/95 backdrop-blur-md rounded-2xl p-6 sm:p-8 border border-white/50 shadow-xl">
                        <!-- Header -->
                        <div class="text-center mb-6 sm:mb-8">
                            <h2 class="text-2xl sm:text-3xl font-bold text-red-900 mb-2">Selamat Datang</h2>
                            <p class="text-sm sm:text-base text-gray-600">Masukkan akun Anda untuk melanjutkan</p>
                        </div>

                        <!-- Mobile Logo (Hidden on desktop) -->
                        <div class="lg:hidden text-center mb-6 sm:mb-8">
                            <div class="flex justify-center mb-3">
                                <span class="text-4xl sm:text-5xl">🏘️</span>
                            </div>
                            <h1 class="text-3xl sm:text-4xl font-black text-red-900 mb-1">KALIKA</h1>
                            <p class="text-red-700 text-xs sm:text-sm">Manajemen Informasi Banjar</p>
                        </div>

                        <!-- Error Messages -->
                        @if ($errors->any())
                            <div class="mb-4 sm:mb-6 p-3 sm:p-4 bg-red-50 border border-red-200 text-red-800 rounded-lg text-xs sm:text-sm">
                                <div class="font-semibold mb-2 flex items-center gap-2">
                                    <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                    Terjadi kesalahan
                                </div>
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}" class="space-y-4 sm:space-y-5">
                            @csrf

                            <!-- Email Field -->
                            <div>
                                <label for="email" class="block text-xs sm:text-sm font-bold text-gray-700 mb-2 sm:mb-3">Email</label>
                                <div class="relative group">
                                    <div class="absolute inset-0 bg-gradient-to-r from-red-400 to-orange-400 rounded-lg blur opacity-0 group-hover:opacity-30 transition duration-300"></div>
                                    <input 
                                        type="email" 
                                        name="email" 
                                        id="email" 
                                        value="{{ old('email') }}" 
                                        placeholder="admin@banjar.com"
                                        required 
                                        autofocus 
                                        class="relative w-full px-4 sm:px-5 py-2.5 sm:py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-300 text-gray-900 placeholder-gray-400 transition text-sm sm:text-base"
                                    >
                                </div>
                                @error('email')
                                    <p class="text-red-600 text-xs sm:text-sm mt-1 sm:mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div>
                                <label for="password" class="block text-xs sm:text-sm font-bold text-gray-700 mb-2 sm:mb-3">Password</label>
                                <div class="relative group">
                                    <div class="absolute inset-0 bg-gradient-to-r from-red-400 to-orange-400 rounded-lg blur opacity-0 group-hover:opacity-30 transition duration-300"></div>
                                    <div class="relative">
                                        <input 
                                            type="password" 
                                            name="password" 
                                            id="password" 
                                            placeholder="••••••••••"
                                            required 
                                            class="w-full px-4 sm:px-5 py-2.5 sm:py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-300 text-gray-900 placeholder-gray-400 transition pr-12 text-sm sm:text-base"
                                        >
                                        <button 
                                            type="button" 
                                            class="absolute right-3 sm:right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-red-600 transition"
                                            onclick="togglePassword()"
                                        >
                                            <svg class="w-5 h-5" id="eyeIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                @error('password')
                                    <p class="text-red-600 text-xs sm:text-sm mt-1 sm:mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Login Button -->
                            <button 
                                type="submit" 
                                class="w-full mt-6 sm:mt-8 bg-gradient-to-r from-red-500 to-orange-500 hover:from-red-600 hover:to-orange-600 text-white font-bold py-2.5 sm:py-3 rounded-lg transition transform hover:scale-105 active:scale-95 shadow-lg text-sm sm:text-base"
                            >
                                Masuk ke Dashboard
                            </button>
                        </form>

                        <!-- Demo Credentials -->
                        <div class="mt-6 sm:mt-8 pt-6 sm:pt-8 border-t border-gray-200">
                            <p class="text-xs text-gray-600 uppercase tracking-widest font-bold mb-3 sm:mb-4">Demo Kredensial</p>
                            <div class="space-y-2 text-xs sm:text-sm">
                                <div class="flex items-center justify-between p-2.5 sm:p-3 bg-red-50 rounded-lg border border-red-200 hover:border-red-400 transition">
                                    <span class="text-gray-700">Email:</span>
                                    <code class="font-mono text-red-700 font-semibold break-all">admin@example.com</code>
                                </div>
                                <div class="flex items-center justify-between p-2.5 sm:p-3 bg-red-50 rounded-lg border border-red-200 hover:border-red-400 transition">
                                    <span class="text-gray-700">Password:</span>
                                    <code class="font-mono text-red-700 font-semibold">password</code>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const isPassword = passwordInput.getAttribute('type') === 'password';
            
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
            
            if (isPassword) {
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-4.803m5.596-3.856a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0M15 12a3 3 0 11-6 0 3 3 0 016 0z" />';
            } else {
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
            }
        }
    </script>
</body>
</html>
