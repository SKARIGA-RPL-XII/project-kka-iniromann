<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengajuan - Admin E-Kelurahan</title>
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
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-200 transform transition-transform duration-300 lg:translate-x-0 -translate-x-full">
            <!-- Logo -->
            <div class="flex items-center justify-between h-16 px-6 border-b border-gray-200">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-br from-primary to-secondary rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"></path>
                        </svg>
                    </div>
                    <span class="font-bold text-gray-900">Admin</span>
                </div>
                <button id="close-sidebar" class="lg:hidden text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.pengajuan.index') }}" class="flex items-center px-4 py-3 text-sm font-medium text-white bg-gradient-to-r from-primary to-secondary rounded-lg">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Kelola Pengajuan
                </a>
            </nav>

            <!-- User Info -->
            <div class="border-t border-gray-200 p-4">
                <div class="flex items-center mb-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold">A</span>
                    </div>
                    <div class="ml-3 flex-1">
                        <p class="text-sm font-medium text-gray-900">Admin</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col lg:ml-64">
            <!-- Top Bar -->
            <header class="bg-white border-b border-gray-200 sticky top-0 z-40">
                <div class="flex items-center justify-between h-16 px-6">
                    <button id="open-sidebar" class="lg:hidden text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <h1 class="text-xl font-semibold text-gray-900">Detail Pengajuan Surat</h1>
                    <div id="current-time" class="text-sm text-gray-600">
                        {{ now()->format('d M Y, H:i') }} WIB
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-6">
        <!-- Success Modal -->
        <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl max-w-sm w-full text-center p-8 transform scale-0 transition-transform duration-300" id="successModalContent">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-green-500 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Berhasil!</h3>
                <p class="text-gray-600">{{ session('success') }}</p>
            </div>
        </div>

        <!-- Header -->
        <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl shadow-lg p-6 mb-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold mb-2">Detail Pengajuan Surat</h1>
                    <p class="text-green-100">{{ $pengajuan->nomor_pengajuan }}</p>
                </div>
                <a href="{{ route('admin.pengajuan.index') }}" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-4 py-2 rounded-lg transition-all flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Detail Pengajuan -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Informasi Pengajuan Card -->
                <div class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 p-6">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Informasi Pengajuan</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 rounded-xl p-4 border-[3px] border-gray-300">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Jenis Surat</label>
                            <p class="text-gray-900 font-semibold">{{ $pengajuan->jenis_surat }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-4 border-[3px] border-gray-300">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Tanggal Pengajuan</label>
                            <p class="text-gray-900 font-semibold">{{ $pengajuan->created_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Data Pemohon Card -->
                <div class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 p-6">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Data Pemohon</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 rounded-xl p-4 border-[3px] border-gray-300">
                            <label class="block text-sm font-medium text-gray-600 mb-2">NIK</label>
                            <p class="text-gray-900 font-semibold">{{ $pengajuan->penduduk->nik }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-4 border-[3px] border-gray-300">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Nama</label>
                            <p class="text-gray-900 font-semibold">{{ $pengajuan->penduduk->nama }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-4 border-[3px] border-gray-300 md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Alamat</label>
                            <p class="text-gray-900 font-semibold">{{ $pengajuan->penduduk->alamat }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-4 border-[3px] border-gray-300">
                            <label class="block text-sm font-medium text-gray-600 mb-2">RT/RW</label>
                            <p class="text-gray-900 font-semibold">{{ $pengajuan->penduduk->rt }}/{{ $pengajuan->penduduk->rw }}</p>
                        </div>
                    </div>
                </div>

                <!-- Keperluan Card -->
                <div class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Keperluan</h2>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 border-[3px] border-gray-300">
                        <p class="text-gray-900 leading-relaxed">{{ $pengajuan->keperluan }}</p>
                    </div>
                </div>

                @if($pengajuan->catatan_admin)
                    <div class="bg-yellow-50 rounded-2xl shadow-sm border-2 border-yellow-200 p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center text-white mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-900">Catatan Admin</h2>
                        </div>
                        <p class="text-gray-900 leading-relaxed">{{ $pengajuan->catatan_admin }}</p>
                    </div>
                @endif
            </div>
            
            <!-- Form Update Status -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 p-6 sticky top-24">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Status Pengajuan</h3>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status Saat Ini</label>
                        <div class="w-full px-4 py-3 border-[3px] border-gray-300 rounded-xl bg-gray-50">
                            <span class="font-semibold text-gray-900">{{ $pengajuan->status }}</span>
                        </div>
                    </div>
                    
                    @if($pengajuan->catatan_admin)
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
                        <div class="w-full px-4 py-3 border-[3px] border-gray-300 rounded-xl bg-gray-50">
                            <p class="text-gray-900">{{ $pengajuan->catatan_admin }}</p>
                        </div>
                    </div>
                    @endif
                    
                    @if($pengajuan->file_surat)
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">File Surat</label>
                        <div class="p-3 bg-green-50 rounded-xl border-2 border-green-200">
                            <p class="text-sm text-green-700 font-medium">✓ {{ basename($pengajuan->file_surat) }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
            </main>
        </div>
    </div>
    
    <script>
        const sidebar = document.getElementById('sidebar');
        const openSidebar = document.getElementById('open-sidebar');
        const closeSidebar = document.getElementById('close-sidebar');

        openSidebar.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
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

        // Show success modal if session has success message
        @if(session('success'))
            setTimeout(() => {
                showSuccessModal();
            }, 500);
        @endif

        function showSuccessModal() {
            const modal = document.getElementById('successModal');
            const content = document.getElementById('successModalContent');
            
            modal.classList.remove('hidden');
            
            setTimeout(() => {
                content.classList.remove('scale-0');
                content.classList.add('scale-100');
            }, 50);

            setTimeout(() => {
                hideSuccessModal();
            }, 3000);
        }

        function hideSuccessModal() {
            const modal = document.getElementById('successModal');
            const content = document.getElementById('successModalContent');
            
            content.classList.remove('scale-100');
            content.classList.add('scale-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    </script>
</body>
</html>
