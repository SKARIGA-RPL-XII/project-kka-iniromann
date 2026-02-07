<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengajuan - E-Kelurahan</title>
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
                            <span class="font-bold text-lg">E-Kelurahan</span>
                        </div>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('dashboard') }}" class="nav-item text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium hover:bg-white hover:bg-opacity-10">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('pengajuan.create') }}" class="nav-item text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium hover:bg-white hover:bg-opacity-10">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Ajukan Surat
                    </a>
                    <a href="{{ route('pengajuan.index') }}" class="nav-item text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium bg-white bg-opacity-20">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Riwayat
                    </a>
                </div>

                <!-- User Info and Time -->
                <div class="flex items-center space-x-4">
                    <div id="current-time" class="hidden sm:block text-sm text-green-100">
                        {{ now()->format('d M Y, H:i') }} WIB
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('profil.show') }}" class="w-8 h-8 bg-white rounded-full flex items-center justify-center hover:bg-gray-50 transition-colors">
                            <span class="text-primary font-semibold text-sm">{{ substr(Auth::guard('penduduk')->user()->nama, 0, 1) }}</span>
                        </a>
                        <div class="hidden sm:block text-white">
                            <p class="text-sm font-medium">{{ Auth::guard('penduduk')->user()->nama }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
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
                <a href="{{ route('dashboard') }}" class="nav-item block text-white hover:text-green-200 px-3 py-2 rounded-md text-base font-medium hover:bg-white hover:bg-opacity-10">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('pengajuan.create') }}" class="nav-item block text-white hover:text-green-200 px-3 py-2 rounded-md text-base font-medium hover:bg-white hover:bg-opacity-10">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Ajukan Surat
                </a>
                <a href="{{ route('pengajuan.index') }}" class="nav-item block text-white hover:text-green-200 px-3 py-2 rounded-md text-base font-medium bg-white bg-opacity-20">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Riwayat Pengajuan
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex items-center mb-4">
                <a href="{{ route('pengajuan.index') }}" class="text-primary hover:text-primary-dark mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Detail Pengajuan Surat</h1>
                    <p class="text-gray-600 mt-1">{{ $pengajuan->nomor_pengajuan }}</p>
                </div>
            </div>
        </div>

        <!-- Status Banner -->
        <div class="mb-6 bg-gradient-to-r from-primary to-secondary rounded-2xl p-6 text-white">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm opacity-90">Status Pengajuan</p>
                        <p class="text-2xl font-bold">{{ $pengajuan->status }}</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm opacity-90">Jenis Surat</p>
                    <p class="text-xl font-semibold">{{ $pengajuan->jenis_surat }}</p>
                </div>
            </div>
        </div>

        <!-- Main Info Card -->
        <div class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 p-6 mb-6">
            <div class="flex items-center mb-6">
                <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Informasi Pengajuan</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-50 rounded-xl p-4 border-2 border-gray-200">
                    <label class="block text-sm font-medium text-gray-600 mb-2">Tanggal Pengajuan</label>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-primary mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-900 font-semibold">{{ $pengajuan->created_at->format('d M Y H:i') }}</p>
                    </div>
                </div>

                @if($pengajuan->tanggal_selesai)
                <div class="bg-green-50 rounded-xl p-4 border-2 border-green-200">
                    <label class="block text-sm font-medium text-green-700 mb-2">Tanggal Selesai</label>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-green-900 font-semibold">{{ $pengajuan->tanggal_selesai->format('d M Y H:i') }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Keperluan Card -->
        <div class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 p-6 mb-6">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Keperluan</h2>
            </div>
            <div class="bg-gray-50 rounded-xl p-4 border-2 border-gray-200">
                <p class="text-gray-900 leading-relaxed">{{ $pengajuan->keperluan }}</p>
            </div>
        </div>

        @if($pengajuan->catatan_admin)
        <!-- Admin Notes Card -->
        <div class="bg-white rounded-2xl shadow-sm border-2 border-blue-200 p-6 mb-6">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Catatan Admin</h2>
            </div>
            <div class="bg-blue-50 rounded-xl p-4 border-2 border-blue-300">
                <p class="text-blue-900 leading-relaxed">{{ $pengajuan->catatan_admin }}</p>
            </div>
        </div>
        @endif

        @if($pengajuan->berkas_pendukung)
        <!-- Berkas Card -->
        <div class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 p-6 mb-6">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Berkas Pendukung</h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($pengajuan->berkas_pendukung as $berkas)
                    <div class="border-2 border-gray-200 rounded-xl p-4 text-center hover:border-primary transition-colors group">
                        <svg class="w-12 h-12 mx-auto text-primary mb-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="text-xs text-gray-700 font-medium truncate">{{ basename($berkas) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Progress Timeline Card -->
        <div class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 p-6 mb-6">
            <div class="flex items-center mb-6">
                <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Timeline Progress</h2>
            </div>

            <div class="bg-white rounded-xl p-6 border-2 border-gray-200">
                <div class="relative">
                    <div class="absolute left-5 top-0 bottom-0 w-0.5 bg-gray-200"></div>
                    
                    <div class="relative flex items-start mb-8">
                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center z-10 ring-4 ring-green-100">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div class="ml-6 flex-1">
                            <p class="text-base font-semibold text-gray-900">Pengajuan Disubmit</p>
                            <p class="text-sm text-gray-600 mt-1">{{ $pengajuan->created_at->format('d M Y, H:i') }} WIB</p>
                        </div>
                    </div>
                    
                    <div class="relative flex items-start mb-8">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center z-10 {{ in_array($pengajuan->status, ['Diproses', 'Selesai']) ? 'bg-green-500 ring-4 ring-green-100' : 'bg-gray-300' }}">
                            @if(in_array($pengajuan->status, ['Diproses', 'Selesai']))
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            @else
                                <div class="w-3 h-3 bg-white rounded-full"></div>
                            @endif
                        </div>
                        <div class="ml-6 flex-1">
                            <p class="text-base font-semibold text-gray-900">Sedang Diproses</p>
                            @if(in_array($pengajuan->status, ['Diproses', 'Selesai']))
                                <p class="text-sm text-gray-600 mt-1">Dalam proses verifikasi admin</p>
                            @else
                                <p class="text-sm text-gray-500 mt-1">Menunggu proses</p>
                            @endif
                        </div>
                    </div>
                    
                    <div class="relative flex items-start">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center z-10 {{ $pengajuan->status == 'Selesai' ? 'bg-green-500 ring-4 ring-green-100' : 'bg-gray-300' }}">
                            @if($pengajuan->status == 'Selesai')
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            @else
                                <div class="w-3 h-3 bg-white rounded-full"></div>
                            @endif
                        </div>
                        <div class="ml-6 flex-1">
                            <p class="text-base font-semibold text-gray-900">Selesai</p>
                            @if($pengajuan->tanggal_selesai)
                                <p class="text-sm text-gray-600 mt-1">{{ $pengajuan->tanggal_selesai->format('d M Y, H:i') }} WIB</p>
                            @else
                                <p class="text-sm text-gray-500 mt-1">Belum selesai</p>
                            @endif
                        </div>
                    </div>
                </div>
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