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
    <nav class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"></path>
                            </svg>
                        </div>
                        <div>
                            <span class="font-bold text-xl text-gray-900">E-Kelurahan</span>
                            <p class="text-xs text-gray-500">Layanan Digital</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <div id="current-time" class="hidden lg:block text-sm text-gray-600 px-4 py-2 bg-gray-50 rounded-lg">
                        Loading...
                    </div>
                    <button onclick="openLoginModal()" class="text-gray-700 hover:text-primary px-4 py-2 rounded-lg hover:bg-gray-50 transition-all font-medium">
                        Masuk
                    </button>
                    <button onclick="openRegisterModal()" class="bg-gradient-to-r from-primary to-secondary text-white px-6 py-2.5 rounded-lg hover:shadow-lg transition-all font-medium">
                        Daftar
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-gradient-to-br from-blue-50 via-white to-green-50 relative overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
        <div class="absolute top-20 right-10 w-72 h-72 bg-primary/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-secondary/10 rounded-full blur-3xl"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="text-left">
                    <div class="inline-block mb-4">
                        <span class="bg-primary/10 text-primary px-4 py-2 rounded-full text-sm font-semibold">
                            🎉 Layanan Digital Terpercaya
                        </span>
                    </div>
                    <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                        Layanan Kelurahan
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">Lebih Mudah</span>
                    </h1>
                    <p class="text-lg lg:text-xl text-gray-600 mb-8 leading-relaxed">
                        Ajukan surat keterangan secara online dengan mudah dan cepat. Tidak perlu antri, cukup dari rumah Anda.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button onclick="openLoginModal()" class="bg-gradient-to-r from-primary to-secondary text-white px-8 py-4 rounded-xl font-semibold hover:shadow-xl transition-all inline-flex items-center justify-center group">
                            Mulai Sekarang
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </button>
                        <a href="#layanan" class="border-2 border-gray-300 text-gray-700 px-8 py-4 rounded-xl font-semibold hover:border-primary hover:text-primary transition-all inline-flex items-center justify-center">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                    <div class="mt-12 flex items-center gap-8">
                        <div>
                            <p class="text-3xl font-bold text-gray-900">10+</p>
                            <p class="text-sm text-gray-600">Pengguna Aktif</p>
                        </div>
                        <div class="h-12 w-px bg-gray-300"></div>
                        <div>
                            <p class="text-3xl font-bold text-gray-900">5+</p>
                            <p class="text-sm text-gray-600">Surat Terbit</p>
                        </div>
                        <div class="h-12 w-px bg-gray-300"></div>
                        <div>
                            <p class="text-3xl font-bold text-gray-900">24/7</p>
                            <p class="text-sm text-gray-600">Layanan Online</p>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-3xl transform rotate-6"></div>
                        <div class="relative bg-white p-8 rounded-3xl shadow-2xl">
                            <div class="space-y-4">
                                <div class="flex items-center gap-4 p-4 bg-green-50 rounded-xl">
                                    <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Proses Cepat</p>
                                        <p class="text-sm text-gray-600">Hanya 1-2 hari kerja</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4 p-4 bg-blue-50 rounded-xl">
                                    <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Aman & Terpercaya</p>
                                        <p class="text-sm text-gray-600">Data terenkripsi</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4 p-4 bg-yellow-50 rounded-xl">
                                    <div class="w-12 h-12 bg-yellow-500 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Akses 24/7</p>
                                        <p class="text-sm text-gray-600">Kapan saja, dimana saja</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-8 hover:shadow-2xl transition-all duration-500 cursor-pointer border-2 border-transparent hover:border-blue-200 group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-400/0 to-blue-600/0 group-hover:from-blue-400/10 group-hover:to-blue-600/10 transition-all duration-500"></div>
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-400 to-blue-600 rounded-2xl blur opacity-0 group-hover:opacity-20 transition-all duration-500"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-12 transition-all duration-500 shadow-lg group-hover:shadow-2xl">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 group-hover:text-blue-600 transition-colors duration-300">Surat Keterangan Tidak Mampu</h3>
                        <p class="text-gray-600 group-hover:text-gray-700 transition-colors duration-300">Untuk keperluan bantuan sosial, beasiswa, dan kebutuhan lainnya.</p>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-white rounded-2xl p-8 hover:shadow-2xl transition-all duration-500 cursor-pointer border-2 border-transparent hover:border-green-200 group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-400/0 to-green-600/0 group-hover:from-green-400/10 group-hover:to-green-600/10 transition-all duration-500"></div>
                    <div class="absolute -inset-1 bg-gradient-to-r from-green-400 to-green-600 rounded-2xl blur opacity-0 group-hover:opacity-20 transition-all duration-500"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-12 transition-all duration-500 shadow-lg group-hover:shadow-2xl">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 group-hover:text-green-600 transition-colors duration-300">Surat Keterangan Domisili</h3>
                        <p class="text-gray-600 group-hover:text-gray-700 transition-colors duration-300">Untuk keperluan administrasi tempat tinggal dan domisili.</p>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-yellow-50 to-white rounded-2xl p-8 hover:shadow-2xl transition-all duration-500 cursor-pointer border-2 border-transparent hover:border-yellow-200 group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-yellow-400/0 to-yellow-600/0 group-hover:from-yellow-400/10 group-hover:to-yellow-600/10 transition-all duration-500"></div>
                    <div class="absolute -inset-1 bg-gradient-to-r from-yellow-400 to-yellow-600 rounded-2xl blur opacity-0 group-hover:opacity-20 transition-all duration-500"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-12 transition-all duration-500 shadow-lg group-hover:shadow-2xl">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4 group-hover:text-yellow-600 transition-colors duration-300">Surat Keterangan Usaha</h3>
                        <p class="text-gray-600 group-hover:text-gray-700 transition-colors duration-300">Untuk keperluan perizinan usaha dan administrasi bisnis.</p>
                    </div>
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
            <h3 class="text-xl font-semibold text-gray-900 mb-2" id="successModalTitle">Login Berhasil!</h3>
            <p class="text-gray-600 mb-4" id="successModalMessage">Selamat datang di E-Kelurahan</p>
            <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-primary mx-auto"></div>
        </div>
    </div>

    <!-- Login Modal -->
    <div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-4xl w-full flex overflow-hidden">
            <!-- Left Side - Branding -->
            <div class="hidden md:flex md:w-1/2 bg-gradient-to-br from-primary to-secondary p-8 flex-col justify-center items-center text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-40 h-40 bg-white opacity-10 rounded-full -mr-20 -mt-20"></div>
                <div class="absolute bottom-0 left-0 w-60 h-60 bg-white opacity-10 rounded-full -ml-30 -mb-30"></div>
                
                <div class="relative z-10 text-center">
                    <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-xl">
                        <svg class="w-12 h-12 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold mb-4">E-Kelurahan</h3>
                    <p class="text-lg opacity-90 mb-6">Layanan Digital untuk Kemudahan Administrasi</p>
                    <div class="space-y-3 text-left">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Proses cepat & mudah</span>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Tanpa perlu antri</span>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Akses 24/7 dari rumah</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Side - Form -->
            <div class="w-full md:w-1/2">
                <!-- Header -->
                <div class="bg-gradient-to-r from-primary to-secondary p-6">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-white">Masuk</h2>
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
</div>

    <!-- Register Modal -->
    <div id="registerModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl max-w-md w-full shadow-2xl">
            <!-- Header -->
            <div class="bg-gradient-to-r from-primary to-secondary p-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center mr-2">
                            <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-white">Daftar Akun</h2>
                            <p class="text-green-100 text-xs">Buat akun baru</p>
                        </div>
                    </div>
                    <button onclick="closeRegisterModal()" class="text-white hover:text-gray-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <div class="p-5">
                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf
                    
                    <!-- Error Alert -->
                    <div id="registerError" class="hidden mb-3 bg-red-50 border-l-4 border-red-400 p-3 rounded">
                        <div class="flex">
                            <svg class="w-4 h-4 text-red-400 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            <div id="registerErrorMessages" class="text-xs text-red-700"></div>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <div>
                            <label for="register_nama" class="block text-xs font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" id="register_nama" name="nama" required 
                                   class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                        </div>
                        
                        <div>
                            <label for="register_nik" class="block text-xs font-medium text-gray-700 mb-1">NIK</label>
                            <input type="text" id="register_nik" name="nik" required maxlength="16"
                                   class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                                   placeholder="16 digit">
                        </div>
                        
                        <div>
                            <label for="register_email" class="block text-xs font-medium text-gray-700 mb-1">Email <span class="text-gray-400">(Opsional)</span></label>
                            <input type="email" id="register_email" name="email" 
                                   class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                                   placeholder="contoh@email.com">
                        </div>
                        
                        <div>
                            <label for="register_password" class="block text-xs font-medium text-gray-700 mb-1">Password</label>
                            <div class="relative">
                                <input type="password" id="register_password" name="password" required 
                                       class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary pr-10">
                                <button type="button" onclick="togglePassword('register_password')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-3 my-3 rounded">
                        <div class="flex">
                            <svg class="w-4 h-4 text-blue-400 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="text-xs text-blue-700">Data lengkap dapat dilengkapi di Edit Profil setelah login.</p>
                        </div>
                    </div>
                    
                    <button type="submit" class="w-full bg-gradient-to-r from-primary to-secondary text-white py-2.5 px-4 rounded-lg font-semibold hover:shadow-lg transition-all text-sm">
                        Daftar Sekarang
                    </button>
                    
                    <div class="text-center mt-3">
                        <p class="text-xs text-gray-600">
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
        
        function showSuccessModal(title = 'Login Berhasil!', message = 'Selamat datang di E-Kelurahan') {
            const modal = document.getElementById('successModal');
            const content = document.getElementById('successModalContent');
            const titleElement = document.getElementById('successModalTitle');
            const messageElement = document.getElementById('successModalMessage');
            
            titleElement.textContent = title;
            messageElement.textContent = message;
            
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
                    showSuccessModal('Berhasil registrasi', 'Silakan login dengan akun Anda');
                    
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