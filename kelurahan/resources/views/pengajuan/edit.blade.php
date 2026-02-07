<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengajuan Surat - E-Kelurahan</title>
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
                    <h1 class="text-3xl font-bold text-gray-900">Edit Pengajuan Surat</h1>
                    <p class="text-gray-600 mt-1">Nomor: {{ $pengajuan->nomor_pengajuan }}</p>
                </div>
            </div>
        </div>

        <!-- Info Alert -->
        <div class="mb-6 bg-blue-50 border-l-4 border-blue-400 p-4 rounded-lg">
            <div class="flex">
                <svg class="w-5 h-5 text-blue-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <p class="text-sm text-blue-700">Perbarui informasi pengajuan surat Anda. Kosongkan berkas jika tidak ingin mengubah file.</p>
            </div>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('pengajuan.update', $pengajuan->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Section 1: Jenis Surat -->
            <div class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 p-6 mb-6">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold mr-4">
                        1
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Pilih Jenis Surat</h2>
                        <p class="text-sm text-gray-600">Pilih jenis surat yang ingin Anda ajukan</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <label class="relative cursor-pointer group">
                        <input type="radio" name="jenis_surat" value="SKTM" {{ old('jenis_surat', $pengajuan->jenis_surat) == 'SKTM' ? 'checked' : '' }} class="peer sr-only" required>
                        <div class="border-2 border-gray-200 rounded-xl p-4 peer-checked:border-primary peer-checked:bg-primary peer-checked:bg-opacity-5 hover:border-primary hover:shadow-md transition-all">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">SKTM</h3>
                                    <p class="text-sm text-gray-600">Surat Keterangan Tidak Mampu</p>
                                </div>
                            </div>
                        </div>
                    </label>

                    <label class="relative cursor-pointer group">
                        <input type="radio" name="jenis_surat" value="Domisili" {{ old('jenis_surat', $pengajuan->jenis_surat) == 'Domisili' ? 'checked' : '' }} class="peer sr-only">
                        <div class="border-2 border-gray-200 rounded-xl p-4 peer-checked:border-primary peer-checked:bg-primary peer-checked:bg-opacity-5 hover:border-primary hover:shadow-md transition-all">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Domisili</h3>
                                    <p class="text-sm text-gray-600">Surat Keterangan Domisili</p>
                                </div>
                            </div>
                        </div>
                    </label>

                    <label class="relative cursor-pointer group">
                        <input type="radio" name="jenis_surat" value="SKU" {{ old('jenis_surat', $pengajuan->jenis_surat) == 'SKU' ? 'checked' : '' }} class="peer sr-only">
                        <div class="border-2 border-gray-200 rounded-xl p-4 peer-checked:border-primary peer-checked:bg-primary peer-checked:bg-opacity-5 hover:border-primary hover:shadow-md transition-all">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">SKU</h3>
                                    <p class="text-sm text-gray-600">Surat Keterangan Usaha</p>
                                </div>
                            </div>
                        </div>
                    </label>

                    <label class="relative cursor-pointer group">
                        <input type="radio" name="jenis_surat" value="Keterangan Usaha" {{ old('jenis_surat', $pengajuan->jenis_surat) == 'Keterangan Usaha' ? 'checked' : '' }} class="peer sr-only">
                        <div class="border-2 border-gray-200 rounded-xl p-4 peer-checked:border-primary peer-checked:bg-primary peer-checked:bg-opacity-5 hover:border-primary hover:shadow-md transition-all">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Keterangan Usaha</h3>
                                    <p class="text-sm text-gray-600">Surat Keterangan Usaha</p>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                @error('jenis_surat')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Section 2: Keperluan -->
            <div class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 p-6 mb-6">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold mr-4">
                        2
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Keperluan Surat</h2>
                        <p class="text-sm text-gray-600">Jelaskan untuk apa surat ini diperlukan</p>
                    </div>
                </div>

                <textarea id="keperluan" name="keperluan" rows="5" 
                          class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all" 
                          placeholder="Contoh: Untuk keperluan pendaftaran beasiswa, bantuan sosial, dll..." required>{{ old('keperluan', $pengajuan->keperluan) }}</textarea>
                @error('keperluan')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Section 3: Berkas Pendukung -->
            <div class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 p-6 mb-6">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold mr-4">
                        3
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Berkas Pendukung</h2>
                        <p class="text-sm text-gray-600">Upload dokumen pendukung (opsional)</p>
                    </div>
                </div>

                @if($pengajuan->berkas_pendukung)
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-3">Berkas Saat Ini:</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                            @foreach($pengajuan->berkas_pendukung as $berkas)
                                <div class="border-2 border-gray-200 rounded-xl p-3 text-center hover:border-primary transition-colors">
                                    <svg class="w-10 h-10 mx-auto text-primary mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <p class="text-xs text-gray-600 truncate">{{ basename($berkas) }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-primary transition-colors">
                    <svg class="w-12 h-12 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    <label for="berkas" class="cursor-pointer">
                        <span class="text-primary font-semibold hover:text-primary-dark">Klik untuk upload</span>
                        <span class="text-gray-600"> atau drag & drop</span>
                    </label>
                    <input type="file" id="berkas" name="berkas[]" multiple accept=".jpg,.jpeg,.png,.pdf" class="hidden" onchange="displayFileNames(this)">
                    <p class="text-xs text-gray-500 mt-2">JPG, PNG, PDF (Max. 2MB per file)</p>
                    <p class="text-xs text-gray-500">Kosongkan jika tidak ingin mengubah berkas</p>
                </div>
                <div id="file-list" class="mt-4 space-y-2"></div>
                @error('berkas.*')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-end gap-4">
                <a href="{{ route('pengajuan.index') }}" class="px-8 py-3 border-2 border-gray-300 rounded-xl text-gray-700 font-semibold hover:bg-gray-50 hover:scale-105 transition-all text-center">
                    Batal
                </a>
                <button type="submit" class="px-8 py-3 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-semibold hover:shadow-lg hover:scale-105 transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Perbarui Pengajuan
                </button>
            </div>
        </form>
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

        // Display selected file names
        function displayFileNames(input) {
            const fileList = document.getElementById('file-list');
            fileList.innerHTML = '';
            
            if (input.files.length > 0) {
                Array.from(input.files).forEach((file, index) => {
                    const fileItem = document.createElement('div');
                    fileItem.className = 'flex items-center justify-between bg-gray-50 p-3 rounded-lg border border-gray-200';
                    fileItem.innerHTML = `
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-primary mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span class="text-sm text-gray-700">${file.name}</span>
                        </div>
                        <span class="text-xs text-gray-500">${(file.size / 1024).toFixed(2)} KB</span>
                    `;
                    fileList.appendChild(fileItem);
                });
            }
        }
    </script>
</body>
</html>