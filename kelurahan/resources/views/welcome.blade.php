<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Kelurahan</title>
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

                <!-- Navigation -->
                <div class="flex items-center space-x-4">
                    <div id="current-time" class="hidden sm:block text-sm text-green-100">
                        Loading...
                    </div>
                    <button onclick="openLoginModal()" class="bg-white bg-opacity-20 hover:bg-opacity-30 hover:scale-105 text-white px-4 py-2 rounded-lg transition-all duration-300 active:scale-95">
                        Masuk
                    </button>
                    <button onclick="openRegisterModal()" class="bg-white text-primary px-4 py-2 rounded-lg hover:bg-gray-100 hover:scale-105 transition-all duration-300 active:scale-95">
                        Daftar
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-gradient-to-br from-primary to-secondary text-white py-20 relative overflow-hidden">
        <!-- Decorative circles -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-white opacity-5 rounded-full -ml-48 -mb-48"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="animate-fade-in">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-slide-down">
                    Selamat Datang di<br>
                    <span class="text-yellow-300 animate-pulse">E-Kelurahan</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90 animate-slide-up">
                    Layanan Digital Kelurahan untuk Kemudahan Administrasi Masyarakat
                </p>
                <p class="text-lg mb-12 opacity-80 max-w-3xl mx-auto">
                    Ajukan surat keterangan secara online dengan mudah dan cepat. 
                    Tidak perlu antri, cukup dari rumah Anda.
                </p>
                <div class="space-x-4">
                    <button onclick="openLoginModal()" class="bg-white text-primary px-8 py-4 rounded-xl font-semibold hover:bg-gray-100 hover:scale-105 hover:shadow-2xl transition-all duration-300 inline-block active:scale-95">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Mulai Sekarang
                    </button>
                    <a href="#layanan" class="border-2 border-white text-white px-8 py-4 rounded-xl font-semibold hover:bg-white hover:text-primary hover:scale-105 hover:shadow-2xl transition-all duration-300 inline-block">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div id="layanan" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-primary font-semibold text-sm uppercase tracking-wide">Layanan Kami</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 mt-2">
                    Berbagai Jenis Surat Keterangan
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Ajukan surat keterangan yang Anda butuhkan secara online dengan mudah
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-8 hover:shadow-2xl hover:scale-105 hover:-translate-y-2 transition-all duration-300 cursor-pointer border-2 border-transparent hover:border-blue-200 group">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 group-hover:text-blue-600 transition-colors">Surat Keterangan Tidak Mampu</h3>
                    <p class="text-gray-600">Untuk keperluan bantuan sosial, beasiswa, dan kebutuhan lainnya.</p>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-white rounded-2xl p-8 hover:shadow-2xl hover:scale-105 hover:-translate-y-2 transition-all duration-300 cursor-pointer border-2 border-transparent hover:border-green-200 group">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 group-hover:text-green-600 transition-colors">Surat Keterangan Domisili</h3>
                    <p class="text-gray-600">Untuk keperluan administrasi tempat tinggal dan domisili.</p>
                </div>

                <div class="bg-gradient-to-br from-yellow-50 to-white rounded-2xl p-8 hover:shadow-2xl hover:scale-105 hover:-translate-y-2 transition-all duration-300 cursor-pointer border-2 border-transparent hover:border-yellow-200 group">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 group-hover:text-yellow-600 transition-colors">Surat Keterangan Usaha</h3>
                    <p class="text-gray-600">Untuk keperluan perizinan usaha dan administrasi bisnis.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- How It Works Section -->
    <div class="py-20 bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-primary font-semibold text-sm uppercase tracking-wide">Cara Menggunakan</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 mt-2">
                    Mudah & Cepat
                </h2>
                <p class="text-xl text-gray-600">
                    Hanya 3 langkah untuk mendapatkan surat keterangan Anda
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center hover:scale-105 transition-all duration-300 cursor-pointer group">
                    <div class="relative inline-block mb-6">
                        <div class="w-24 h-24 bg-gradient-to-br from-primary to-secondary rounded-2xl flex items-center justify-center mx-auto group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-xl">
                            <span class="text-3xl font-bold text-white">1</span>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-400 rounded-full animate-ping"></div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 group-hover:text-primary transition-colors">Daftar & Masuk</h3>
                    <p class="text-gray-600">Buat akun atau masuk dengan NIK dan password Anda</p>
                </div>

                <div class="text-center hover:scale-105 transition-all duration-300 cursor-pointer group">
                    <div class="relative inline-block mb-6">
                        <div class="w-24 h-24 bg-gradient-to-br from-secondary to-primary rounded-2xl flex items-center justify-center mx-auto group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-xl">
                            <span class="text-3xl font-bold text-white">2</span>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-400 rounded-full animate-ping"></div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 group-hover:text-secondary transition-colors">Ajukan Surat</h3>
                    <p class="text-gray-600">Pilih jenis surat dan isi formulir pengajuan online</p>
                </div>

                <div class="text-center hover:scale-105 transition-all duration-300 cursor-pointer group">
                    <div class="relative inline-block mb-6">
                        <div class="w-24 h-24 bg-gradient-to-br from-accent to-yellow-500 rounded-2xl flex items-center justify-center mx-auto group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-xl">
                            <span class="text-3xl font-bold text-white">3</span>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-green-400 rounded-full animate-ping"></div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 group-hover:text-accent transition-colors">Ambil Surat</h3>
                    <p class="text-gray-600">Download surat yang sudah jadi atau ambil di kantor kelurahan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-gradient-to-r from-primary to-secondary text-white py-20 relative overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute top-0 left-0 w-64 h-64 bg-white opacity-5 rounded-full -ml-32 -mt-32"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-white opacity-5 rounded-full -mr-48 -mb-48"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                Siap Menggunakan Layanan Kami?
            </h2>
            <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                Daftar sekarang dan nikmati kemudahan layanan digital kelurahan
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button onclick="openRegisterModal()" class="bg-white text-primary px-8 py-4 rounded-xl font-semibold hover:bg-gray-100 hover:scale-105 hover:shadow-2xl transition-all duration-300 inline-flex items-center justify-center active:scale-95">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Daftar Sekarang
                </button>
                <button onclick="openLoginModal()" class="border-2 border-white text-white px-8 py-4 rounded-xl font-semibold hover:bg-white hover:text-primary hover:scale-105 hover:shadow-2xl transition-all duration-300 inline-flex items-center justify-center active:scale-95">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    Sudah Punya Akun?
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"></path>
                            </svg>
                        </div>
                        <span class="font-bold text-lg">E-Kelurahan</span>
                    </div>
                    <p class="text-gray-400">
                        Layanan digital untuk memudahkan masyarakat dalam mengurus administrasi kelurahan.
                    </p>
                </div>
                
                <div>
                    <h3 class="font-semibold text-lg mb-4">Layanan</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>Surat Keterangan Tidak Mampu</li>
                        <li>Surat Keterangan Domisili</li>
                        <li>Surat Keterangan Usaha</li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="font-semibold text-lg mb-4">Kontak</h3>
                    <div class="space-y-2 text-gray-400">
                        <p>Kelurahan</p>
                        <p>Jl. MT Haryono No. 143, Dinoyo, Kec. Lowokwaru.</p>
                        <p>Kota Malang, Jawa Timur</p>
                        <p>Telp: (0341) 551818</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2026 E-Kelurahan. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg max-w-sm w-full text-center p-8 transform scale-0 transition-transform duration-300" id="successModalContent">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-green-500 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Login Berhasil!</h3>
            <p class="text-gray-600 mb-4">Selamat datang di E-Kelurahan</p>
            <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-primary mx-auto"></div>
        </div>
    </div>

    <!-- Login Modal -->
    <div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full">
            <!-- Header -->
            <div class="bg-gradient-to-r from-primary to-secondary p-6 rounded-t-2xl">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Masuk</h2>
                            <p class="text-green-100 text-sm">Selamat datang kembali</p>
                        </div>
                    </div>
                    <button onclick="closeLoginModal()" class="text-white hover:text-gray-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <div class="p-6">
                
                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf
                    
                    <!-- Error Alert -->
                    <div id="loginError" class="hidden mb-4 bg-red-50 border-l-4 border-red-400 p-4 rounded-lg">
                        <div class="flex">
                            <svg class="w-5 h-5 text-red-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="text-sm text-red-700" id="loginErrorMessage">NIK atau password salah.</p>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="login_nik" class="block text-sm font-medium text-gray-700 mb-2">NIK</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="login_nik" name="nik" required 
                                   class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                   placeholder="Masukkan NIK Anda">
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label for="login_password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="password" id="login_password" name="password" required 
                                   class="w-full pl-10 pr-12 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                   placeholder="Masukkan password">
                            <button type="button" onclick="togglePassword('login_password')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <button type="submit" class="w-full bg-gradient-to-r from-primary to-secondary text-white py-3 px-4 rounded-xl font-semibold hover:shadow-lg hover:scale-105 transition-all mb-4">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Masuk
                    </button>
                    
                    <div class="text-center">
                        <p class="text-sm text-gray-600">
                            Belum punya akun? 
                            <button type="button" onclick="switchToRegister()" class="text-primary hover:text-primary-dark font-medium">
                                Daftar di sini
                            </button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="registerModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-3xl w-full max-h-screen overflow-y-auto">
            <!-- Header -->
            <div class="bg-gradient-to-r from-primary to-secondary p-6">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Daftar Akun</h2>
                            <p class="text-green-100 text-sm">Lengkapi data diri Anda</p>
                        </div>
                    </div>
                    <button onclick="closeRegisterModal()" class="text-white hover:text-gray-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <div class="p-6">
                
                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf
                    
                    <!-- Error Alert -->
                    <div id="registerError" class="hidden mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                        <div class="flex">
                            <svg class="w-5 h-5 text-red-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            <div id="registerErrorMessages" class="text-sm"></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="register_nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" id="register_nama" name="nama" required 
                                   class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                        </div>
                        
                        <div>
                            <label for="register_nik" class="block text-sm font-medium text-gray-700 mb-2">NIK</label>
                            <input type="text" id="register_nik" name="nik" required 
                                   class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="register_tempat_lahir" class="block text-sm font-medium text-gray-700 mb-2">Tempat Lahir</label>
                            <input type="text" id="register_tempat_lahir" name="tempat_lahir" required 
                                   class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                        </div>
                        
                        <div>
                            <label for="register_tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                            <div class="grid grid-cols-3 gap-2">
                                <select id="register_tanggal" name="tanggal" required class="px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                                    <option value="">Tgl</option>
                                    <option value="01">1</option>
                                    <option value="02">2</option>
                                    <option value="03">3</option>
                                    <option value="04">4</option>
                                    <option value="05">5</option>
                                    <option value="06">6</option>
                                    <option value="07">7</option>
                                    <option value="08">8</option>
                                    <option value="09">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                                <select id="register_bulan" name="bulan" required class="px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                                    <option value="">Bulan</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                                <select id="register_tahun" name="tahun" required class="px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                                    <option value="">Tahun</option>
                                </select>
                            </div>
                            <input type="hidden" id="register_tanggal_lahir" name="tanggal_lahir">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="register_jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                            <select id="register_jenis_kelamin" name="jenis_kelamin" required 
                                    class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="register_no_kk" class="block text-sm font-medium text-gray-700 mb-2">No. KK</label>
                            <input type="text" id="register_no_kk" name="no_kk" required 
                                   class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="register_alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                        <textarea id="register_alamat" name="alamat" rows="3" required 
                                  class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary"></textarea>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="register_rt" class="block text-sm font-medium text-gray-700 mb-2">RT</label>
                            <input type="text" id="register_rt" name="rt" required 
                                   class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                        </div>
                        
                        <div>
                            <label for="register_rw" class="block text-sm font-medium text-gray-700 mb-2">RW</label>
                            <input type="text" id="register_rw" name="rw" required 
                                   class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="register_kecamatan" class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                            <input type="text" id="register_kecamatan" name="kecamatan" required 
                                   class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                        </div>
                        
                        <div>
                            <label for="register_kabupaten" class="block text-sm font-medium text-gray-700 mb-2">Kabupaten/Kota</label>
                            <input type="text" id="register_kabupaten" name="kabupaten" required 
                                   class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="register_provinsi" class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                        <input type="text" id="register_provinsi" name="provinsi" required 
                               class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="register_agama" class="block text-sm font-medium text-gray-700 mb-2">Agama</label>
                            <select id="register_agama" name="agama" required 
                                    class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="register_status_perkawinan" class="block text-sm font-medium text-gray-700 mb-2">Status Perkawinan</label>
                            <select id="register_status_perkawinan" name="status_perkawinan" required 
                                    class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                                <option value="">Pilih Status</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="register_pekerjaan" class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan</label>
                        <input type="text" id="register_pekerjaan" name="pekerjaan" required 
                               class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="register_telepon" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="text" id="register_telepon" name="telepon" 
                                   class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary"
                                   placeholder="08123456789">
                        </div>
                        
                        <div>
                            <label for="register_email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" id="register_email" name="email" 
                                   class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary"
                                   placeholder="contoh@email.com">
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label for="register_password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <input type="password" id="register_password" name="password" required 
                                   class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary pr-10">
                            <button type="button" onclick="togglePassword('register_password')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <button type="submit" class="w-full bg-primary text-white py-2 px-4 rounded-lg hover:bg-primary-dark transition-colors mb-4">
                        Daftar
                    </button>
                    
                    <div class="text-center">
                        <p class="text-sm text-gray-600">
                            Sudah punya akun? 
                            <button type="button" onclick="switchToLogin()" class="text-primary hover:text-primary-dark font-medium">
                                Masuk di sini
                            </button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Modal functions
        function openLoginModal() {
            const button = event.target;
            button.classList.add('animate-pulse');
            
            setTimeout(() => {
                button.classList.remove('animate-pulse');
                document.getElementById('loginModal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                hideLoginError();
                
                // Animate modal entrance
                const modal = document.getElementById('loginModal').querySelector('.bg-white');
                modal.style.transform = 'scale(0.9)';
                modal.style.opacity = '0';
                setTimeout(() => {
                    modal.style.transition = 'all 0.3s ease-out';
                    modal.style.transform = 'scale(1)';
                    modal.style.opacity = '1';
                }, 10);
            }, 200);
        }
        
        function closeLoginModal() {
            document.getElementById('loginModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            hideLoginError();
        }
        
        function showLoginError(message) {
            const errorDiv = document.getElementById('loginError');
            const errorMessage = document.getElementById('loginErrorMessage');
            errorMessage.textContent = message;
            errorDiv.classList.remove('hidden');
        }
        
        function hideLoginError() {
            document.getElementById('loginError').classList.add('hidden');
        }
        
        function showSuccessModal() {
            const modal = document.getElementById('successModal');
            const content = document.getElementById('successModalContent');
            
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            // Animate modal appearance
            setTimeout(() => {
                content.classList.remove('scale-0');
                content.classList.add('scale-100');
            }, 50);
        }
        
        function hideSuccessModal() {
            const modal = document.getElementById('successModal');
            const content = document.getElementById('successModalContent');
            
            content.classList.remove('scale-100');
            content.classList.add('scale-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }
        
        function openRegisterModal() {
            const button = event.target;
            button.classList.add('animate-pulse');
            
            setTimeout(() => {
                button.classList.remove('animate-pulse');
                document.getElementById('registerModal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                hideRegisterError();
                
                // Animate modal entrance
                const modal = document.getElementById('registerModal').querySelector('.bg-white');
                modal.style.transform = 'scale(0.9)';
                modal.style.opacity = '0';
                setTimeout(() => {
                    modal.style.transition = 'all 0.3s ease-out';
                    modal.style.transform = 'scale(1)';
                    modal.style.opacity = '1';
                }, 10);
            }, 200);
        }
        
        function closeRegisterModal() {
            document.getElementById('registerModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            hideRegisterError();
        }
        
        function showRegisterError(errors) {
            const errorDiv = document.getElementById('registerError');
            const errorMessages = document.getElementById('registerErrorMessages');
            
            let errorHtml = '';
            if (typeof errors === 'string') {
                errorHtml = errors;
            } else {
                for (const field in errors) {
                    errors[field].forEach(error => {
                        errorHtml += `<p>${error}</p>`;
                    });
                }
            }
            
            errorMessages.innerHTML = errorHtml;
            errorDiv.classList.remove('hidden');
        }
        
        function hideRegisterError() {
            document.getElementById('registerError').classList.add('hidden');
        }
        
        function switchToRegister() {
            closeLoginModal();
            openRegisterModal();
        }
        
        function switchToLogin() {
            closeRegisterModal();
            openLoginModal();
        }
        
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
            } else {
                input.type = 'password';
            }
        }
        
        // Close modal when clicking outside
        document.getElementById('loginModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLoginModal();
            }
        });
        
        document.getElementById('registerModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeRegisterModal();
            }
        });
        
        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLoginModal();
                closeRegisterModal();
            }
        });
        
        // Handle login form submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            
            // Show loading state
            submitButton.textContent = 'Memproses...';
            submitButton.disabled = true;
            hideLoginError();
            
            fetch('{{ route("login") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closeLoginModal();
                    showSuccessModal();
                    
                    // Redirect after showing success animation
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 2000);
                } else {
                    showLoginError(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showLoginError('Terjadi kesalahan. Silakan coba lagi.');
            })
            .finally(() => {
                // Reset button state
                submitButton.textContent = originalText;
                submitButton.disabled = false;
            });
        });
        
        // Handle register form submission
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            
            // Show loading state
            submitButton.textContent = 'Memproses...';
            submitButton.disabled = true;
            hideRegisterError();
            
            fetch('{{ route("register") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    return response.json().then(data => Promise.reject(data));
                }
            })
            .then(data => {
                if (data.success) {
                    closeRegisterModal();
                    showSuccessModal();
                    
                    // Show success message and switch to login
                    setTimeout(() => {
                        hideSuccessModal();
                        openLoginModal();
                    }, 2000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                if (error.errors) {
                    showRegisterError(error.errors);
                } else {
                    showRegisterError('Terjadi kesalahan. Silakan coba lagi.');
                }
            })
            .finally(() => {
                // Reset button state
                submitButton.textContent = originalText;
                submitButton.disabled = false;
            });
        });

        // Populate year dropdown
        const yearSelect = document.getElementById('register_tahun');
        const currentYear = new Date().getFullYear();
        for (let year = currentYear; year >= currentYear - 100; year--) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            yearSelect.appendChild(option);
        }

        // Combine date fields into tanggal_lahir
        function updateTanggalLahir() {
            const tanggal = document.getElementById('register_tanggal').value;
            const bulan = document.getElementById('register_bulan').value;
            const tahun = document.getElementById('register_tahun').value;
            
            if (tanggal && bulan && tahun) {
                document.getElementById('register_tanggal_lahir').value = `${tahun}-${bulan}-${tanggal}`;
            }
        }

        document.getElementById('register_tanggal').addEventListener('change', updateTanggalLahir);
        document.getElementById('register_bulan').addEventListener('change', updateTanggalLahir);
        document.getElementById('register_tahun').addEventListener('change', updateTanggalLahir);

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

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>