@extends('layouts.auth')

@section('title', 'Login')

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
                            Sistem pelayanan administrasi kelurahan berbasis digital yang memudahkan warga dalam mengurus berbagai keperluan surat-menyurat.
                        </p>
                    </div>

                    <!-- Features List -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-4">Fitur Unggulan</h2>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <span>Pengajuan Surat Online</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-search"></i>
                                </div>
                                <span>Tracking Status Real-time</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-download"></i>
                                </div>
                                <span>Download Surat Digital</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <span>Keamanan Data Terjamin</span>
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

            <!-- Right Column - Login Form -->
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
                                <p class="text-gray-600">Masuk ke akun Anda</p>
                            </div>
                        </div>
                    </div>

                    <!-- Welcome Text -->
                    <div class="mb-8">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">
                                    Selamat Datang Kembali
                                </h2>
                                <p class="text-gray-600">
                                    Masuk dengan NIK dan password untuk mengakses layanan
                                </p>
                            
                        </div>
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

                    <!-- Login Form -->
                    <form id="loginForm" action="{{ route('login') }}" method="POST" class="space-y-6">
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
                                       autocomplete="off"
                                       class="input-field w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:outline-none focus:border-indigo-500 transition duration-300 text-gray-800 placeholder-transparent">
                                
                                <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                    <i class="fas fa-id-card text-gray-400"></i>
                                </div>
                                
                                <label for="nik" class="floating-label absolute left-12 top-1/2 transform -translate-y-1/2 text-gray-500 cursor-text transition-all duration-200">
                                    Nomor Induk Kependudukan (NIK)
                                </label>
                            </div>
                            <p class="mt-2 text-xs text-gray-500">
                                Masukkan 16 digit NIK Anda
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
                                       autocomplete="off"
                                       class="input-field w-full px-4 py-3 pl-12 pr-12 border border-gray-300 rounded-xl focus:outline-none focus:border-indigo-500 transition duration-300 text-gray-800 placeholder-transparent">
                                
                                <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                
                                <button type="button" 
                                        onclick="togglePassword()"
                                        class="toggle-password absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none">
                                    <i class="fas fa-eye"></i>
                                </button>
                                
                                <label for="password" class="floating-label absolute left-12 top-1/2 transform -translate-y-1/2 text-gray-500 cursor-text transition-all duration-200">
                                    Password
                                </label>
                            </div>
                            <div class="flex justify-between items-center mt-2">
                                <p class="text-xs text-gray-500">
                                    Min. 6 karakter
                                </p>
                                <a href="{{ route('password.request') }}" class="text-xs text-indigo-600 hover:text-indigo-800">
                                    Lupa Password?
                                </a>
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   id="remember" 
                                   name="remember"
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">
                                Ingat saya di perangkat ini
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="btn-gradient w-full py-3 px-4 rounded-xl text-black font-semibold shadow-lg">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Masuk
                        </button>

                        <!-- Register Button for Mobile -->
                        <div class="sm:hidden mt-4">
                            <a href="{{ route('register') }}" 
                               class="w-full flex items-center justify-center space-x-2 py-3 px-4 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition duration-300 font-semibold">
                                <i class="fas fa-user-plus"></i>
                                <span>Belum punya akun? Daftar disini</span>
                            </a>
                        </div>

                        <!-- Divider -->
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Atau</span>
                            </div>
                        </div>

                        <!-- Alternative Login (Optional) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <a href="#" 
                               class="flex items-center justify-center space-x-2 py-3 px-4 border border-gray-300 rounded-xl hover:bg-gray-50 transition duration-300">
                                <i class="fab fa-google text-red-500"></i>
                                <span class="text-sm font-medium text-gray-700">Google</span>
                            </a>
                            <a href="#" 
                               class="flex items-center justify-center space-x-2 py-3 px-4 border border-gray-300 rounded-xl hover:bg-gray-50 transition duration-300">
                                <i class="fas fa-id-card-alt text-blue-500"></i>
                                <span class="text-sm font-medium text-gray-700">SSO Pemerintah</span>
                            </a>
                        </div>
                    </form>

                    <!-- Register Link -->
                    <div class="mt-8 pt-6 border-t border-gray-200 text-center">
                        <p class="text-gray-600">
                            Belum punya akun?
                            <a href="{{ route('register') }}" 
                               class="text-indigo-600 hover:text-indigo-800 font-semibold ml-1">
                                Daftar disini
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


<script>
function formatNIK(input) {
    let value = input.value.replace(/\D/g, '');
    if (value.length > 16) {
        value = value.substring(0, 16);
    }
    input.value = value;
}

function togglePassword() {
    const field = document.getElementById('password');
    const button = field.parentElement.querySelector('.toggle-password');
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