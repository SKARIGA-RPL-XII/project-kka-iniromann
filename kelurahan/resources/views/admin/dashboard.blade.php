<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - E-Kelurahan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#16a085',
                        'primary-dark': '#138d75',
                        'secondary': '#27ae60',
                        'accent': '#f39c12'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-primary to-secondary shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo and Brand -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"></path>
                            </svg>
                        </div>
                        <div class="text-white">
                            <span class="font-bold text-lg">Admin E-Kelurahan</span>
                        </div>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('admin.dashboard') }}" class="nav-item text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium bg-white bg-opacity-20">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.pengajuan.index') }}" class="nav-item text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium hover:bg-white hover:bg-opacity-10">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Kelola Pengajuan
                    </a>
                </div>

                <!-- User Info and Time -->
                <div class="flex items-center space-x-4">
                    <div id="current-time" class="hidden sm:block text-sm text-green-100">
                        {{ now()->format('d M Y, H:i') }} WIB
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center hover:bg-gray-50 transition-colors">
                            <span class="text-primary font-semibold text-sm">{{ substr($admin->nama, 0, 1) }}</span>
                        </div>
                        <div class="hidden sm:block text-white">
                            <p class="text-sm font-medium">{{ $admin->nama }}</p>
                            <p class="text-xs text-green-100">{{ ucfirst($admin->role) }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-white hover:text-red-200 p-2 rounded-md hover:bg-white hover:bg-opacity-10">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                        </button>
                    </form>
                    <!-- Mobile menu button -->
                    <button id="mobile-menu-btn" class="md:hidden text-white hover:text-green-200 p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="md:hidden hidden bg-primary-dark">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="nav-item block text-white hover:text-green-200 px-3 py-2 rounded-md text-base font-medium bg-white bg-opacity-20">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.pengajuan.index') }}" class="nav-item block text-white hover:text-green-200 px-3 py-2 rounded-md text-base font-medium hover:bg-white hover:bg-opacity-10">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Kelola Pengajuan
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Welcome Banner -->
        <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl shadow-lg p-8 mb-8 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ $admin->nama }}! 👋</h1>
                    <p class="text-green-100 text-lg">Dashboard Admin E-Kelurahan - {{ ucfirst($admin->role) }}</p>
                </div>
                <div class="hidden lg:block">
                    <svg class="w-32 h-32 text-white opacity-20" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6 mb-8">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-lg p-6 text-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer group">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-xl bg-white bg-opacity-20 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-sm font-medium text-blue-100 mb-1">Total Penduduk</p>
                <p class="text-4xl font-bold">{{ $statistik['total_penduduk'] }}</p>
            </div>
            
            <div class="bg-gradient-to-br from-primary to-primary-dark rounded-2xl shadow-lg p-6 text-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer group">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-xl bg-white bg-opacity-20 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-sm font-medium text-green-100 mb-1">Total Pengajuan</p>
                <p class="text-4xl font-bold">{{ $statistik['total_pengajuan'] }}</p>
            </div>
            
            <div class="bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-2xl shadow-lg p-6 text-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer group">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-xl bg-white bg-opacity-20 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-sm font-medium text-yellow-100 mb-1">Menunggu Verifikasi</p>
                <p class="text-4xl font-bold">{{ $statistik['menunggu'] }}</p>
            </div>
            
            <div class="bg-gradient-to-br from-orange-400 to-orange-600 rounded-2xl shadow-lg p-6 text-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer group">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-xl bg-white bg-opacity-20 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white animate-spin" style="animation-duration: 3s;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-sm font-medium text-orange-100 mb-1">Sedang Diproses</p>
                <p class="text-4xl font-bold">{{ $statistik['diproses'] }}</p>
            </div>
            
            <div class="bg-gradient-to-br from-secondary to-green-600 rounded-2xl shadow-lg p-6 text-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer group">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-xl bg-white bg-opacity-20 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-sm font-medium text-green-100 mb-1">Selesai</p>
                <p class="text-4xl font-bold">{{ $statistik['selesai'] }}</p>
            </div>
            
            <div class="bg-gradient-to-br from-red-500 to-red-600 rounded-2xl shadow-lg p-6 text-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer group">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-xl bg-white bg-opacity-20 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-sm font-medium text-red-100 mb-1">Ditolak</p>
                <p class="text-4xl font-bold">{{ $statistik['ditolak'] }}</p>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <a href="{{ route('admin.pengajuan.index') }}" class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-6 border-2 border-transparent hover:border-blue-200 hover:shadow-xl hover:scale-105 hover:-translate-y-1 transition-all duration-300 group">
                <div class="flex items-center">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 group-hover:rotate-6 transition-all shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors">Kelola Pengajuan</h3>
                        <p class="text-sm text-gray-600">Verifikasi dan proses pengajuan</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.pengajuan.index') }}?status=menunggu" class="bg-gradient-to-br from-yellow-50 to-white rounded-2xl p-6 border-2 border-transparent hover:border-yellow-200 hover:shadow-xl hover:scale-105 hover:-translate-y-1 transition-all duration-300 group">
                <div class="flex items-center">
                    <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 group-hover:rotate-6 transition-all shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-yellow-600 transition-colors">Pengajuan Menunggu</h3>
                        <p class="text-sm text-gray-600">Lihat pengajuan yang menunggu</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Recent Applications -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Pengajuan Terbaru</h3>
                    <a href="{{ route('admin.pengajuan.index') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                        Lihat Semua
                    </a>
                </div>
            </div>
            <div class="p-6">
                @if($pengajuanTerbaru->count() > 0)
                    <div class="space-y-4">
                        @foreach($pengajuanTerbaru as $pengajuan)
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <h4 class="font-medium text-gray-900">{{ $pengajuan->jenis_surat }}</h4>
                                        <span class="px-2 py-1 text-xs rounded-full font-medium
                                            @if($pengajuan->status == 'Selesai') bg-green-100 text-green-800
                                            @elseif($pengajuan->status == 'Diproses') bg-orange-100 text-orange-800
                                            @elseif($pengajuan->status == 'Ditolak') bg-red-100 text-red-800
                                            @else bg-yellow-100 text-yellow-800 @endif">
                                            {{ $pengajuan->status }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-gray-600 mt-1">{{ $pengajuan->penduduk->nama }} - {{ $pengajuan->nomor_pengajuan }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $pengajuan->created_at->format('d M Y H:i') }}</p>
                                </div>
                                <div class="ml-4">
                                    <a href="{{ route('admin.pengajuan.show', $pengajuan->id) }}" 
                                       class="bg-primary hover:bg-primary-dark text-white text-xs px-3 py-1 rounded transition duration-300">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada pengajuan</h3>
                        <p class="mt-1 text-sm text-gray-500">Belum ada pengajuan surat yang masuk.</p>
                        <div class="mt-6">
                            <a href="{{ route('admin.pengajuan.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-primary-dark">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Kelola Pengajuan
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Real-time clock functionality
        function updateClock() {
            const now = new Date();
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            
            const day = now.getDate().toString().padStart(2, '0');
            const month = months[now.getMonth()];
            const year = now.getFullYear();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            
            const timeString = `${day} ${month} ${year}, ${hours}:${minutes}:${seconds} WIB`;
            document.getElementById('current-time').textContent = timeString;
        }

        // Update clock immediately and then every second
        updateClock();
        setInterval(updateClock, 1000);
    </script>
</body>
</html>