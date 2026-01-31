@extends('layouts.auth')

@section('title', 'Registrasi')

@section('styles')
<style>
    .login-illustration {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
    }
    
    .login-illustration::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 30px 30px;
        animation: float 20s linear infinite;
    }
    
    @keyframes float {
        0% { transform: translate(0, 0) rotate(0deg); }
        100% { transform: translate(-30px, -30px) rotate(360deg); }
    }
    
    .card-hover {
        transition: all 0.3s ease;
    }
    
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection

@section('content')
<div class="container mx-auto px-4">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <!-- Left Column - Illustration & Info -->
            <div class="hidden lg:block">
                <div class="login-illustration rounded-3xl p-12 h-full min-h-[600px] flex flex-col justify-between text-white card-hover">
                    <!-- Logo & Brand -->
                    <div class="mb-8">
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center logo-glow">
                                <i class="fas fa-city text-2xl"></i>
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold">E-Kelurahan</h1>
                                <p class="text-white/80">Pelayanan Digital</p>
                            </div>
                        </div>
                        <p class="text-lg mb-6">
                            Bergabunglah dengan sistem pelayanan administrasi kelurahan digital dan nikmati kemudahan dalam mengurus berbagai keperluan surat-menyurat.
                        </p>
                    </div>

                    <!-- Features List -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-4">Keuntungan Mendaftar</h2>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <span>Pengajuan Surat 24/7</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <span>Proses Lebih Cepat</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <span>Akses dari Mana Saja</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-history"></i>
                                </div>
                                <span>Riwayat Lengkap</span>
                            </div>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white/10 rounded-xl p-4 backdrop-blur-sm">
                            <div class="text-2xl font-bold">5000+</div>
                            <div class="text-sm opacity-90">Warga Terdaftar</div>
                        </div>
                        <div class="bg-white/10 rounded-xl p-4 backdrop-blur-sm">
                            <div class="text-2xl font-bold">98%</div>
                            <div class="text-sm opacity-90">Kepuasan Pengguna</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Registration Form -->
            <div class="fade-in">
                <div class="auth-container rounded-3xl shadow-2xl p-8 md:p-12 card-hover">
                    <!-- Mobile Logo -->
                    <div class="lg:hidden mb-8">
                        <div class="flex items-center justify-center space-x-3">
                            <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-city text-indigo-600 text-2xl"></i>
                            </div>
                            <div class="text-center">
                                <h1 class="text-2xl font-bold text-gray-800">E-Kelurahan</h1>
                                <p class="text-gray-600">Daftar akun baru</p>
                            </div>
                        </div>
                    </div>

                    <!-- Welcome Text -->
                    <div class="mb-8">
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">
                            Daftar Akun Baru
                        </h2>
                        <p class="text-gray-600">
                            Lengkapi data diri untuk membuat akun E-Kelurahan
                        </p>
                    </div>

                    <!-- Error Messages -->
                    @if($errors->any())
                    <div class="mb-6 error-alert opacity-0 transition-opacity duration-500">
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-exclamation-circle text-red-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-red-700">
                                        @foreach($errors->all() as $error)
                                            {{ $error }}<br>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Success Messages -->
                    @if(session('success'))
                    <div class="mb-6">
                        <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-check-circle text-green-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-green-700">{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Registration Form -->
                    <form id="registerForm" action="{{ route('register') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- NIK Input -->
                        <div class="input-group">
                            <div class="relative">
                                <input type="text" 
                                       id="nik" 
                                       name="nik" 
                                       value="{{ old('nik') }}"
                                       oninput="formatNIK(this)"
                                       placeholder=" "
                                       required
                                       class="input-field w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:outline-none focus:border-indigo-500 transition duration-300 text-gray-800 placeholder-transparent">
                                
                                <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                    <i class="fas fa-id-card text-gray-400"></i>
                                </div>
                                
                                <label for="nik" class="floating-label absolute left-12 top-1/2 transform -translate-y-1/2 text-gray-500 cursor-text transition-all duration-200">
                                    Nomor Induk Kependudukan (NIK)
                                </label>
                            </div>
                            <p class="mt-2 text-xs text-gray-500">
                                Masukkan 16 digit NIK sesuai KTP
                            </p>
                        </div>

                        <!-- Nama Input -->
                        <div class="input-group">
                            <div class="relative">
                                <input type="text" 
                                       id="nama" 
                                       name="nama" 
                                       value="{{ old('nama') }}"
                                       placeholder=" "
                                       required
                                       class="input-field w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:outline-none focus:border-indigo-500 transition duration-300 text-gray-800 placeholder-transparent">
                                
                                <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                
                                <label for="nama" class="floating-label absolute left-12 top-1/2 transform -translate-y-1/2 text-gray-500 cursor-text transition-all duration-200">
                                    Nama Lengkap
                                </label>
                            </div>
                            <p class="mt-2 text-xs text-gray-500">
                                Sesuai dengan KTP
                            </p>
                        </div>

                        <!-- Tempat Lahir Input -->
                        <div class="input-group">
                            <div class="relative">
                                <input type="text" 
                                       id="tempat_lahir" 
                                       name="tempat_lahir" 
                                       value="{{ old('tempat_lahir') }}"
                                       placeholder=" "
                                       required
                                       class="input-field w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:outline-none focus:border-indigo-500 transition duration-300 text-gray-800 placeholder-transparent">
                                
                                <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                                </div>
                                
                                <label for="tempat_lahir" class="floating-label absolute left-12 top-1/2 transform -translate-y-1/2 text-gray-500 cursor-text transition-all duration-200">
                                    Tempat Lahir
                                </label>
                            </div>
                        </div>

                        <!-- Tanggal Lahir & Jenis Kelamin -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Tanggal Lahir -->
                            <div class="input-group">
                                <div class="relative">
                                    <input type="date" 
                                           id="tanggal_lahir" 
                                           name="tanggal_lahir" 
                                           value="{{ old('tanggal_lahir') }}"
                                           required
                                           class="input-field w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:outline-none focus:border-indigo-500 transition duration-300 text-gray-800">
                                    
                                    <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                        <i class="fas fa-calendar text-gray-400"></i>
                                    </div>
                                    
                                    <label for="tanggal_lahir" class="floating-label-date absolute left-12 -top-2 text-xs text-indigo-600 bg-white px-1">
                                        Tanggal Lahir
                                    </label>
                                </div>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="input-group">
                                <div class="relative">
                                    <select id="jenis_kelamin" 
                                            name="jenis_kelamin" 
                                            required
                                            class="input-field w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:outline-none focus:border-indigo-500 transition duration-300 text-gray-800">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    
                                    <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                        <i class="fas fa-venus-mars text-gray-400"></i>
                                    </div>
                                    
                                    <label for="jenis_kelamin" class="floating-label-select absolute left-12 -top-2 text-xs text-indigo-600 bg-white px-1">
                                        Jenis Kelamin
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Email Input -->
                        <div class="input-group">
                            <div class="relative">
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}"
                                       placeholder=" "
                                       required
                                       class="input-field w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:outline-none focus:border-indigo-500 transition duration-300 text-gray-800 placeholder-transparent">
                                
                                <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                
                                <label for="email" class="floating-label absolute left-12 top-1/2 transform -translate-y-1/2 text-gray-500 cursor-text transition-all duration-200">
                                    Alamat Email
                                </label>
                            </div>
                            <p class="mt-2 text-xs text-gray-500">
                                Email akan digunakan untuk notifikasi
                            </p>
                        </div>

                        <!-- Password Input -->
                        <div class="input-group">
                            <div class="relative">
                                <input type="password" 
                                       id="password" 
                                       name="password" 
                                       placeholder=" "
                                       required
                                       class="input-field w-full px-4 py-3 pl-12 pr-12 border border-gray-300 rounded-xl focus:outline-none focus:border-indigo-500 transition duration-300 text-gray-800 placeholder-transparent">
                                
                                <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                
                                <button type="button" 
                                        onclick="togglePassword('password')"
                                        class="toggle-password absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none">
                                    <i class="fas fa-eye"></i>
                                </button>
                                
                                <label for="password" class="floating-label absolute left-12 top-1/2 transform -translate-y-1/2 text-gray-500 cursor-text transition-all duration-200">
                                    Password
                                </label>
                            </div>
                            <p class="mt-2 text-xs text-gray-500">
                                Minimal 8 karakter, kombinasi huruf dan angka
                            </p>
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="input-group">
                            <div class="relative">
                                <input type="password" 
                                       id="password_confirmation" 
                                       name="password_confirmation" 
                                       placeholder=" "
                                       required
                                       class="input-field w-full px-4 py-3 pl-12 pr-12 border border-gray-300 rounded-xl focus:outline-none focus:border-indigo-500 transition duration-300 text-gray-800 placeholder-transparent">
                                
                                <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                
                                <button type="button" 
                                        onclick="togglePassword('password_confirmation')"
                                        class="toggle-password absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none">
                                    <i class="fas fa-eye"></i>
                                </button>
                                
                                <label for="password_confirmation" class="floating-label absolute left-12 top-1/2 transform -translate-y-1/2 text-gray-500 cursor-text transition-all duration-200">
                                    Konfirmasi Password
                                </label>
                            </div>
                            <p class="mt-2 text-xs text-gray-500">
                                Ulangi password yang sama
                            </p>
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="flex items-start">
                            <input type="checkbox" 
                                   id="terms" 
                                   name="terms"
                                   required
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded mt-1">
                            <label for="terms" class="ml-3 block text-sm text-gray-700">
                                Saya menyetujui 
                                <a href="#" class="text-indigo-600 hover:text-indigo-800 underline">Syarat & Ketentuan</a> 
                                dan 
                                <a href="#" class="text-indigo-600 hover:text-indigo-800 underline">Kebijakan Privasi</a>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="btn-gradient w-full py-3 px-4 rounded-xl text-blackl font-semibold shadow-lg">
                            <i class="fas fa-user-plus mr-2"></i>
                            Daftar Sekarang
                        </button>
                    </form>

                    <!-- Login Link -->
                    <div class="mt-8 pt-6 border-t border-gray-200 text-center">
                        <p class="text-gray-600">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" 
                               class="text-indigo-600 hover:text-indigo-800 font-semibold ml-1">
                                Masuk disini
                            </a>
                        </p>
                    </div>

                    <!-- Help & Support -->
                    <div class="mt-6 p-4 bg-blue-50 rounded-xl">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                <i class="fas fa-question-circle text-blue-500 mt-1"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-blue-800 mb-1">Butuh Bantuan?</h4>
                                <p class="text-xs text-blue-700">
                                    Hubungi kelurahan di (021) 12345678 atau email ke 
                                    <a href="mailto:help@ekelurahan.id" class="underline">help@ekelurahan.id</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Security Info -->
                    <div class="mt-4 text-center">
                        <p class="text-xs text-gray-500">
                            <i class="fas fa-shield-alt mr-1"></i>
                            Data Anda dilindungi dengan enkripsi SSL 256-bit
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Floating Elements -->
<div class="fixed top-10 left-10 w-24 h-24 bg-indigo-200/20 rounded-full blur-xl z-0"></div>
<div class="fixed bottom-10 right-10 w-32 h-32 bg-purple-200/20 rounded-full blur-xl z-0"></div>

<!-- Wave Animation -->
<div class="fixed bottom-0 left-0 right-0 overflow-hidden z-0">
    <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="rgba(255,255,255,0.1)" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
</div>

<script>
function formatNIK(input) {
    let value = input.value.replace(/\D/g, '');
    if (value.length > 16) {
        value = value.substring(0, 16);
    }
    input.value = value;
}

function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const button = field.nextElementSibling.nextElementSibling;
    const icon = button.querySelector('i');
    
    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        field.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

// Floating label animation
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('.input-field');
    
    inputs.forEach(input => {
        const label = input.nextElementSibling.nextElementSibling;
        
        function updateLabel() {
            if (input.value !== '' || input === document.activeElement) {
                label.classList.add('-translate-y-6', 'text-xs', 'text-indigo-600');
                label.classList.remove('text-gray-500');
            } else {
                label.classList.remove('-translate-y-6', 'text-xs', 'text-indigo-600');
                label.classList.add('text-gray-500');
            }
        }
        
        input.addEventListener('focus', updateLabel);
        input.addEventListener('blur', updateLabel);
        input.addEventListener('input', updateLabel);
        
        // Initial check
        updateLabel();
    });
    
    // Show error alerts
    const errorAlert = document.querySelector('.error-alert');
    if (errorAlert) {
        setTimeout(() => {
            errorAlert.classList.remove('opacity-0');
            errorAlert.classList.add('opacity-100');
        }, 100);
    }
});
</script>
@endsection