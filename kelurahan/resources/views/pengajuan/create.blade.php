<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Surat - E-Kelurahan</title>
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
                    <a href="{{ route('pengajuan.create') }}" class="nav-item text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium bg-white bg-opacity-20">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Ajukan Surat
                    </a>
                    <a href="{{ route('pengajuan.index') }}" class="nav-item text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium hover:bg-white hover:bg-opacity-10">
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
                            <span class="text-primary font-semibold text-sm">{{ substr(auth()->guard('penduduk')->user()->nama, 0, 1) }}</span>
                        </a>
                        <div class="hidden sm:block text-white">
                            <p class="text-sm font-medium">{{ auth()->guard('penduduk')->user()->nama }}</p>
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
                <a href="{{ route('pengajuan.create') }}" class="nav-item block text-white hover:text-green-200 px-3 py-2 rounded-md text-base font-medium bg-white bg-opacity-20">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Ajukan Surat
                </a>
                <a href="{{ route('pengajuan.index') }}" class="nav-item block text-white hover:text-green-200 px-3 py-2 rounded-md text-base font-medium hover:bg-white hover:bg-opacity-10">
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
                <a href="{{ route('dashboard') }}" class="text-primary hover:text-primary-dark mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Ajukan Surat Baru</h1>
                    <p class="text-gray-600 mt-1">Lengkapi formulir di bawah untuk mengajukan surat</p>
                </div>
            </div>
        </div>

        <!-- Progress Steps -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center flex-1">
                    <div class="flex items-center text-primary relative">
                        <div class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-primary bg-primary flex items-center justify-center">
                            <span class="text-white font-bold">1</span>
                        </div>
                        <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium text-primary">Pilih Jenis Surat</div>
                    </div>
                    <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-primary"></div>
                </div>
                <div class="flex items-center flex-1">
                    <div class="flex items-center text-gray-500 relative">
                        <div class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-gray-300 bg-white flex items-center justify-center">
                            <span class="font-bold">2</span>
                        </div>
                        <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium text-gray-500">Isi Detail</div>
                    </div>
                    <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-gray-300"></div>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center text-gray-500 relative">
                        <div class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-gray-300 bg-white flex items-center justify-center">
                            <span class="font-bold">3</span>
                        </div>
                        <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium text-gray-500">Upload Berkas</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
            <div class="p-8">
                    @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded">
                            <div class="flex">
                                <svg class="w-5 h-5 text-red-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                </svg>
                                <div class="text-sm text-red-700">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('pengajuan.store') }}" enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        
                        <!-- Step 1: Jenis Surat -->
                        <div class="space-y-4">
                            <div class="flex items-center mb-4">
                                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-primary text-white font-bold mr-3">
                                    1
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900">Pilih Jenis Surat</h3>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <label class="relative cursor-pointer">
                                    <input type="radio" name="jenis_surat" value="SKTM" class="peer sr-only" {{ old('jenis_surat') == 'SKTM' ? 'checked' : '' }} required>
                                    <div class="p-6 border-2 border-gray-200 rounded-xl hover:border-primary peer-checked:border-primary peer-checked:bg-green-50 transition-all duration-200">
                                        <div class="flex items-start">
                                            <div class="p-3 rounded-lg bg-blue-100 text-blue-600 mr-4">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-gray-900 mb-1">SKTM</h4>
                                                <p class="text-sm text-gray-600">Surat Keterangan Tidak Mampu</p>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <label class="relative cursor-pointer">
                                    <input type="radio" name="jenis_surat" value="Domisili" class="peer sr-only" {{ old('jenis_surat') == 'Domisili' ? 'checked' : '' }}>
                                    <div class="p-6 border-2 border-gray-200 rounded-xl hover:border-primary peer-checked:border-primary peer-checked:bg-green-50 transition-all duration-200">
                                        <div class="flex items-start">
                                            <div class="p-3 rounded-lg bg-green-100 text-green-600 mr-4">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-gray-900 mb-1">Domisili</h4>
                                                <p class="text-sm text-gray-600">Surat Keterangan Domisili</p>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <label class="relative cursor-pointer">
                                    <input type="radio" name="jenis_surat" value="SKU" class="peer sr-only" {{ old('jenis_surat') == 'SKU' ? 'checked' : '' }}>
                                    <div class="p-6 border-2 border-gray-200 rounded-xl hover:border-primary peer-checked:border-primary peer-checked:bg-green-50 transition-all duration-200">
                                        <div class="flex items-start">
                                            <div class="p-3 rounded-lg bg-yellow-100 text-yellow-600 mr-4">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-gray-900 mb-1">SKU</h4>
                                                <p class="text-sm text-gray-600">Surat Keterangan Usaha</p>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <label class="relative cursor-pointer">
                                    <input type="radio" name="jenis_surat" value="Keterangan Usaha" class="peer sr-only" {{ old('jenis_surat') == 'Keterangan Usaha' ? 'checked' : '' }}>
                                    <div class="p-6 border-2 border-gray-200 rounded-xl hover:border-primary peer-checked:border-primary peer-checked:bg-green-50 transition-all duration-200">
                                        <div class="flex items-start">
                                            <div class="p-3 rounded-lg bg-purple-100 text-purple-600 mr-4">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-gray-900 mb-1">Keterangan Usaha</h4>
                                                <p class="text-sm text-gray-600">Surat Keterangan Usaha</p>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="border-t border-gray-200"></div>

                        <!-- Step 2: Keperluan -->
                        <div class="space-y-4">
                            <div class="flex items-center mb-4">
                                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-primary text-white font-bold mr-3">
                                    2
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900">Detail Keperluan</h3>
                            </div>
                            
                            <div>
                                <label for="keperluan" class="block text-sm font-semibold text-gray-700 mb-3">Jelaskan Keperluan Surat *</label>
                                <textarea id="keperluan" name="keperluan" rows="5" 
                                          class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all" 
                                          placeholder="Contoh: Untuk keperluan beasiswa pendidikan anak, bantuan sosial, dll..." required>{{ old('keperluan') }}</textarea>
                                <p class="text-sm text-gray-500 mt-2">Jelaskan secara detail untuk mempercepat proses verifikasi</p>
                            </div>
                        </div>

                        <div class="border-t border-gray-200"></div>

                        <!-- Step 3: Upload Berkas -->
                        <div class="space-y-4">
                            <div class="flex items-center mb-4">
                                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-primary text-white font-bold mr-3">
                                    3
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900">Upload Berkas Pendukung</h3>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-3">Upload Dokumen *</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-primary hover:bg-green-50 transition-all duration-200 cursor-pointer">
                                    <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <input type="file" id="berkas" name="berkas[]" multiple 
                                           class="hidden" 
                                           accept=".jpg,.jpeg,.png,.pdf" 
                                           onchange="updateFileList(this)" required>
                                    <label for="berkas" class="cursor-pointer">
                                        <span class="text-primary font-semibold hover:text-primary-dark">Klik untuk upload</span>
                                        <span class="text-gray-600"> atau drag & drop</span>
                                    </label>
                                    <p class="text-sm text-gray-500 mt-2">
                                        Format: JPG, PNG, PDF • Maksimal 2MB per file
                                    </p>
                                    <div id="file-list" class="mt-4 text-left"></div>
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-green-50 to-blue-50 border-l-4 border-primary rounded-lg p-6">
                                <div class="flex items-start">
                                    <svg class="w-6 h-6 text-primary mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-2">Persyaratan Dokumen:</h4>
                                        <ul class="text-sm text-gray-700 space-y-1">
                                            <li class="flex items-center"><span class="text-primary mr-2">✓</span> Fotocopy KTP yang masih berlaku</li>
                                            <li class="flex items-center"><span class="text-primary mr-2">✓</span> Fotocopy Kartu Keluarga (KK)</li>
                                            <li class="flex items-center"><span class="text-primary mr-2">✓</span> Surat pengantar RT/RW (jika diperlukan)</li>
                                            <li class="flex items-center"><span class="text-primary mr-2">✓</span> Dokumen pendukung lainnya</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between pt-6 border-t border-gray-200">
                            <a href="{{ route('dashboard') }}" 
                               class="px-6 py-3 border-2 border-gray-300 rounded-xl text-gray-700 font-medium hover:bg-gray-50 transition-all duration-200">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Batal
                            </a>
                            <button type="submit" 
                                    class="px-8 py-3 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-semibold hover:shadow-lg hover:scale-105 transition-all duration-200">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Ajukan Surat
                            </button>
                        </div>
                    </form>
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

        // File upload handler
        function updateFileList(input) {
            const fileList = document.getElementById('file-list');
            fileList.innerHTML = '';
            
            if (input.files.length > 0) {
                const files = Array.from(input.files);
                files.forEach((file, index) => {
                    const fileItem = document.createElement('div');
                    fileItem.className = 'flex items-center justify-between p-3 bg-white border border-gray-200 rounded-lg mb-2';
                    fileItem.innerHTML = `
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-primary mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span class="text-sm font-medium text-gray-700">${file.name}</span>
                        </div>
                        <span class="text-xs text-gray-500">${(file.size / 1024).toFixed(2)} KB</span>
                    `;
                    fileList.appendChild(fileItem);
                });
            }
        }

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