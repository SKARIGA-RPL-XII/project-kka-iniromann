<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - E-Kelurahan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = { theme: { extend: { colors: { 'primary': '#16a34a', 'primary-dark': '#15803d' } } } }</script>
</head>
<body class="bg-gray-50 min-h-screen">

    <div class="bg-primary text-white text-xs py-1.5 px-4">
        <div class="max-w-6xl mx-auto flex justify-between">
            <span>Kelurahan Kota Malang &mdash; Sistem Pelayanan Online</span>
            <span id="current-time"></span>
        </div>
    </div>

    <nav class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-primary rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800 text-sm leading-tight">E-Kelurahan</p>
                        <p class="text-xs text-gray-400 leading-tight">Kota Malang</p>
                    </div>
                </div>
                <div class="hidden md:flex items-center gap-1">
                    <a href="{{ route('dashboard') }}" class="px-3 py-2 text-sm text-gray-600 hover:text-primary border-b-2 border-transparent hover:border-primary transition-colors">Beranda</a>
                    <a href="{{ route('pengajuan.create') }}" class="px-3 py-2 text-sm text-gray-600 hover:text-primary border-b-2 border-transparent hover:border-primary transition-colors">Ajukan Surat</a>
                    <a href="{{ route('pengajuan.index') }}" class="px-3 py-2 text-sm text-gray-600 hover:text-primary border-b-2 border-transparent hover:border-primary transition-colors">Riwayat</a>
                    <a href="{{ route('profil.show') }}" class="px-3 py-2 text-sm font-medium text-primary border-b-2 border-primary">Profil Saya</a>
                </div>
                <div class="flex items-center gap-3">
                    <div class="hidden sm:flex items-center gap-2">
                        <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                            <span class="text-primary font-bold text-sm">{{ substr($penduduk->nama, 0, 1) }}</span>
                        </div>
                        <span class="text-sm text-gray-700 font-medium">{{ explode(' ', $penduduk->nama)[0] }}</span>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-1.5 text-xs text-gray-500 hover:text-red-500 border border-gray-200 hover:border-red-200 px-3 py-1.5 rounded-md transition-colors">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Keluar
                        </button>
                    </form>
                    <button id="mobile-btn" class="md:hidden text-gray-500 p-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100 bg-white px-4 py-2 space-y-1">
            <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded">Beranda</a>
            <a href="{{ route('pengajuan.create') }}" class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded">Ajukan Surat</a>
            <a href="{{ route('pengajuan.index') }}" class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded">Riwayat</a>
            <a href="{{ route('profil.show') }}" class="block px-3 py-2 text-sm font-medium text-primary bg-primary/5 rounded">Profil Saya</a>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 py-8">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-xl font-bold text-gray-800">Profil Saya</h1>
                <p class="text-sm text-gray-500 mt-0.5">Data pribadi dan informasi akun Anda</p>
            </div>
            <a href="{{ route('profil.edit') }}" class="flex items-center gap-2 border border-primary text-primary hover:bg-primary hover:text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit Profil
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3 rounded-lg mb-5 flex items-center gap-2">
                <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Profile header -->
        <div class="bg-white border border-gray-200 rounded-xl p-6 mb-5 flex flex-col sm:flex-row items-center sm:items-start gap-5">
            <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center flex-shrink-0">
                <span class="text-3xl font-bold text-primary">{{ substr($penduduk->nama, 0, 1) }}</span>
            </div>
            <div class="text-center sm:text-left">
                <h2 class="text-xl font-bold text-gray-900">{{ $penduduk->nama }}</h2>
                <p class="text-sm text-gray-500 mt-1">NIK: {{ $penduduk->nik }}</p>
                <p class="text-sm text-gray-500">No. KK: {{ $penduduk->no_kk }}</p>
            </div>
        </div>

        <!-- Data Pribadi -->
        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden mb-5">
            <div class="px-5 py-3.5 border-b border-gray-100 bg-gray-50">
                <h3 class="text-sm font-semibold text-gray-700">Data Pribadi</h3>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 divide-y sm:divide-y-0 sm:divide-x divide-gray-100">
                <div class="px-5 py-4">
                    <p class="text-xs text-gray-400 mb-1">Tempat Lahir</p>
                    <p class="text-sm font-medium text-gray-800">{{ $penduduk->tempat_lahir ?: '-' }}</p>
                </div>
                <div class="px-5 py-4">
                    <p class="text-xs text-gray-400 mb-1">Tanggal Lahir</p>
                    <p class="text-sm font-medium text-gray-800">{{ $penduduk->tanggal_lahir ? $penduduk->tanggal_lahir->format('d M Y') : '-' }}</p>
                </div>
                <div class="px-5 py-4 border-t border-gray-100">
                    <p class="text-xs text-gray-400 mb-1">Jenis Kelamin</p>
                    <p class="text-sm font-medium text-gray-800">{{ $penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                </div>
                <div class="px-5 py-4 border-t border-gray-100">
                    <p class="text-xs text-gray-400 mb-1">RT / RW</p>
                    <p class="text-sm font-medium text-gray-800">{{ $penduduk->rt }} / {{ $penduduk->rw }}</p>
                </div>
            </div>
        </div>

        <!-- Kontak -->
        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden mb-5">
            <div class="px-5 py-3.5 border-b border-gray-100 bg-gray-50">
                <h3 class="text-sm font-semibold text-gray-700">Informasi Kontak</h3>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 divide-y sm:divide-y-0 sm:divide-x divide-gray-100">
                <div class="px-5 py-4">
                    <p class="text-xs text-gray-400 mb-1">Nomor Telepon</p>
                    <p class="text-sm font-medium text-gray-800">{{ $penduduk->telepon ?: '-' }}</p>
                </div>
                <div class="px-5 py-4">
                    <p class="text-xs text-gray-400 mb-1">Email</p>
                    <p class="text-sm font-medium text-gray-800">{{ $penduduk->email ?: '-' }}</p>
                </div>
            </div>
        </div>

        <!-- Alamat -->
        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
            <div class="px-5 py-3.5 border-b border-gray-100 bg-gray-50">
                <h3 class="text-sm font-semibold text-gray-700">Alamat</h3>
            </div>
            <div class="px-5 py-4">
                <p class="text-sm text-gray-800 leading-relaxed">{{ $penduduk->alamat ?: '-' }}</p>
            </div>
        </div>

    </div>

    <script>
        document.getElementById('mobile-btn').addEventListener('click', () => document.getElementById('mobile-menu').classList.toggle('hidden'));

        function updateClock() {
            const now = new Date();
            const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
            const d = now.getDate().toString().padStart(2,'0'), m = months[now.getMonth()], y = now.getFullYear();
            const h = now.getHours().toString().padStart(2,'0'), min = now.getMinutes().toString().padStart(2,'0'), s = now.getSeconds().toString().padStart(2,'0');
            document.getElementById('current-time').textContent = `${d} ${m} ${y}, ${h}:${min}:${s} WIB`;
        }
        updateClock(); setInterval(updateClock, 1000);
    </script>
</body>
</html>
