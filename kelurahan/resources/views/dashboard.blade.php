<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - E-Kelurahan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes slideInRight {
            from { 
                transform: translateX(100vw); 
                opacity: 0; 
            }
            to { 
                transform: translateX(0); 
                opacity: 1; 
            }
        }
        .slide-enter {
            animation: slideInRight 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
        }
        .slide-enter-nojs {
            opacity: 1 !important;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#16a34a',
                        'primary-dark': '#15803d',
                    }
                }
            }
        }
        // Remove animation class after complete
        document.addEventListener('DOMContentLoaded', function() {
            const body = document.body;
            if (body.classList.contains('slide-enter')) {
                const animationDuration = 600; // ms
                setTimeout(() => {
                    body.classList.remove('slide-enter');
                    body.classList.add('slide-enter-nojs');
                }, animationDuration);
            }
        });
    </script>
</head>

@section('navbar')
    <!-- Top bar -->
    <div class="bg-primary text-white text-xs py-1.5 px-4">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <span>Kelurahan Kota Malang &mdash; Sistem Pelayanan Online</span>
            <span id="current-time"></span>
        </div>
    </div>

    <!-- Navbar -->
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

                <!-- Desktop menu -->
                <div class="hidden md:flex items-center gap-1">
                    <a href="{{ route('dashboard') }}" data-page="dashboard" class="px-3 py-2 text-sm font-medium text-primary border-b-2 border-primary page-link">Beranda</a>
                    <a href="{{ route('pengajuan.create') }}" data-page="pengajuan-create" class="px-3 py-2 text-sm text-gray-600 hover:text-primary border-b-2 border-transparent hover:border-primary transition-colors page-link">Ajukan Surat</a>
                    <a href="{{ route('pengajuan.index') }}" data-page="pengajuan" class="px-3 py-2 text-sm text-gray-600 hover:text-primary border-b-2 border-transparent hover:border-primary transition-colors page-link">Riwayat</a>
                    <a href="{{ route('profil.show') }}" data-page="profil" class="px-3 py-2 text-sm text-gray-600 hover:text-primary border-b-2 border-transparent hover:border-primary transition-colors page-link">Profil Saya</a>
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

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100 bg-white px-4 py-2 space-y-1">
            <a href="{{ route('dashboard') }}" data-page="dashboard" class="block px-3 py-2 text-sm font-medium text-primary bg-primary/5 rounded page-link">Beranda</a>
            <a href="{{ route('pengajuan.create') }}" data-page="pengajuan-create" class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded page-link">Ajukan Surat</a>
            <a href="{{ route('pengajuan.index') }}" data-page="pengajuan" class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded page-link">Riwayat</a>
            <a href="{{ route('profil.show') }}" data-page="profil" class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded page-link">Profil Saya</a>
        </div>
    </nav>
@endsection

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-8">

    <!-- Welcome -->
    <div class="bg-white border border-gray-200 rounded-xl p-5 mb-5 flex items-center justify-between">
        <div>
            <h1 class="text-base font-semibold text-gray-800">Selamat datang, <span class="text-primary">{{ $penduduk->nama }}</span></h1>
            <p class="text-sm text-gray-500 mt-0.5">NIK: {{ $penduduk->nik }}</p>
        </div>
        <a href="{{ route('pengajuan.create') }}" class="hidden sm:flex items-center gap-2 bg-primary hover:bg-primary-dark text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Ajukan Surat
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

        <!-- Left: Stats + Recent -->
        <div class="lg:col-span-2 space-y-5">

            <!-- Stats -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                <div class="bg-white border border-gray-200 rounded-xl p-4 text-center">
                    <p class="text-3xl font-bold text-gray-800">{{ $statistik['total'] }}</p>
                    <p class="text-sm text-gray-400 mt-1">Total</p>
                </div>
                <div class="bg-white border border-yellow-200 rounded-xl p-4 text-center">
                    <p class="text-3xl font-bold text-yellow-500">{{ $statistik['menunggu'] }}</p>
                    <p class="text-sm text-yellow-500 mt-1">Menunggu</p>
                </div>
                <div class="bg-white border border-blue-200 rounded-xl p-4 text-center">
                    <p class="text-3xl font-bold text-blue-500">{{ $statistik['diproses'] }}</p>
                    <p class="text-sm text-blue-500 mt-1">Diproses</p>
                </div>
                <div class="bg-white border border-green-200 rounded-xl p-4 text-center">
                    <p class="text-3xl font-bold text-green-600">{{ $statistik['selesai'] }}</p>
                    <p class="text-sm text-green-600 mt-1">Selesai</p>
                </div>
            </div>

            <!-- Recent pengajuan -->
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                <div class="flex items-center justify-between px-5 py-3.5 border-b border-gray-100">
                    <h2 class="text-sm font-semibold text-gray-800">Pengajuan Terbaru</h2>
                    <a href="{{ route('pengajuan.index') }}" class="text-xs text-primary hover:underline">Lihat semua →</a>
                </div>

                @if($pengajuanTerbaru->count() > 0)
                    <div class="divide-y divide-gray-50">
                        @foreach($pengajuanTerbaru as $p)
                        <div class="flex items-center gap-4 px-5 py-3.5 hover:bg-gray-50 transition-colors">
                            <div class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0
                                @if($p->status == 'Selesai') bg-green-100
                                @elseif($p->status == 'Diproses') bg-blue-100
                                @elseif($p->status == 'Ditolak') bg-red-100
                                @else bg-yellow-100 @endif">
                                <svg class="w-4 h-4
                                    @if($p->status == 'Selesai') text-green-600
                                    @elseif($p->status == 'Diproses') text-blue-600
                                    @elseif($p->status == 'Ditolak') text-red-500
                                    @else text-yellow-600 @endif"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-base font-medium text-gray-800 truncate">{{ $p->jenis_surat }}</p>
                                <p class="text-sm text-gray-400">{{ $p->nomor_pengajuan }} · {{ $p->created_at->format('d M Y') }}</p>
                            </div>
                            <div class="flex items-center gap-2 flex-shrink-0">
                                <span class="text-xs px-2 py-0.5 rounded font-medium
                                    @if($p->status == 'Selesai') bg-green-100 text-green-700
                                    @elseif($p->status == 'Diproses') bg-blue-100 text-blue-700
                                    @elseif($p->status == 'Ditolak') bg-red-100 text-red-600
                                    @else bg-yellow-100 text-yellow-700 @endif">
                                    {{ $p->status }}
                                </span>
                                <a href="{{ route('pengajuan.show', $p->id) }}" class="text-gray-300 hover:text-primary">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-10">
                        <svg class="w-10 h-10 text-gray-200 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="text-sm text-gray-400 mb-3">Belum ada pengajuan surat</p>
                        <a href="{{ route('pengajuan.create') }}" class="inline-flex items-center gap-1.5 bg-primary hover:bg-primary-dark text-white text-sm px-4 py-2 rounded-lg transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Ajukan Sekarang
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Right: Info -->
        <div class="space-y-4">

            <!-- Profil singkat -->
            <div class="bg-white border border-gray-200 rounded-xl p-5">
                <h3 class="text-base font-semibold text-gray-700 mb-4">Data Saya</h3>
                <div class="space-y-3">
                    <div>
                        <p class="text-xs text-gray-400">Nama Lengkap</p>
                        <p class="text-base font-medium text-gray-800">{{ $penduduk->nama }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400">NIK</p>
                        <p class="text-base font-medium text-gray-800">{{ $penduduk->nik }}</p>
                    </div>
                    @if($penduduk->alamat)
                    <div>
                        <p class="text-xs text-gray-400">Alamat</p>
                        <p class="text-base font-medium text-gray-800">{{ $penduduk->alamat }}</p>
                    </div>
                    @endif
                </div>
                <a href="{{ route('profil.show') }}" class="mt-4 block text-center text-xs text-primary hover:underline border border-primary/30 rounded-lg py-1.5 hover:bg-primary/5 transition-colors">
                    Lihat & Edit Profil
                </a>
            </div>

            <!-- Layanan tersedia -->
            <div class="bg-white border border-gray-200 rounded-xl p-5">
                <h3 class="text-base font-semibold text-gray-700 mb-3">Layanan Tersedia</h3>
                <div class="space-y-2">
                    @foreach(['SKTM', 'Domisili', 'SKU', 'Lainnya'] as $layanan)
                    <a href="{{ route('pengajuan.create') }}" class="flex items-center gap-2.5 p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                        <div class="w-8 h-8 bg-primary/10 rounded-md flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <span class="text-base text-gray-700 group-hover:text-primary transition-colors">{{ $layanan }}</span>
                        <svg class="w-3.5 h-3.5 text-gray-300 group-hover:text-primary ml-auto transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- Info jam layanan -->
            <div class="bg-primary/5 border border-primary/20 rounded-xl p-5">
                <h3 class="text-base font-semibold text-primary mb-3">Jam Pelayanan</h3>
                <div class="space-y-2 text-sm text-gray-600">
                    <div class="flex justify-between">
                        <span>Senin – Jumat</span>
                        <span class="font-medium">08.00 – 15.00</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Sabtu – Minggu</span>
                        <span class="font-medium text-red-500">Tutup</span>
                    </div>
                </div>
                <p class="text-sm text-gray-400 mt-3">Pengajuan online tetap bisa dilakukan 24 jam.</p>
            </div>

        </div>
    </div>
</div>
@endsection

<script>
    document.getElementById('mobile-btn').addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    function updateClock() {
        const now = new Date();
        const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
        const d = now.getDate().toString().padStart(2,'0');
        const m = months[now.getMonth()];
        const y = now.getFullYear();
        const h = now.getHours().toString().padStart(2,'0');
        const min = now.getMinutes().toString().padStart(2,'0');
        const s = now.getSeconds().toString().padStart(2,'0');
        const el = document.getElementById('current-time');
        if (el) el.textContent = `${d} ${m} ${y}, ${h}:${min}:${s} WIB`;
    }
    updateClock();
    setInterval(updateClock, 1000);
</script>
</body>
</html>
<body class="@if(session('just_logged_in'))slide-enter @endif bg-gray-50 min-h-screen">

    <!-- Top bar -->
    <div class="bg-primary text-white text-xs py-1.5 px-4">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <span>Kelurahan Kota Malang &mdash; Sistem Pelayanan Online</span>
            <span id="current-time"></span>
        </div>
    </div>

    <!-- Navbar -->
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

                <!-- Desktop menu -->
                <div class="hidden md:flex items-center gap-1">
                    <a href="{{ route('dashboard') }}" class="px-3 py-2 text-sm font-medium text-primary border-b-2 border-primary">Beranda</a>
                    <a href="{{ route('pengajuan.create') }}" class="px-3 py-2 text-sm text-gray-600 hover:text-primary border-b-2 border-transparent hover:border-primary transition-colors">Ajukan Surat</a>
                    <a href="{{ route('pengajuan.index') }}" class="px-3 py-2 text-sm text-gray-600 hover:text-primary border-b-2 border-transparent hover:border-primary transition-colors">Riwayat</a>
                    <a href="{{ route('profil.show') }}" class="px-3 py-2 text-sm text-gray-600 hover:text-primary border-b-2 border-transparent hover:border-primary transition-colors">Profil Saya</a>
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

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100 bg-white px-4 py-2 space-y-1">
            <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-sm font-medium text-primary bg-primary/5 rounded">Beranda</a>
            <a href="{{ route('pengajuan.create') }}" class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded">Ajukan Surat</a>
            <a href="{{ route('pengajuan.index') }}" class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded">Riwayat</a>
            <a href="{{ route('profil.show') }}" class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded">Profil Saya</a>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-8">

        <!-- Welcome -->
        <div class="bg-white border border-gray-200 rounded-xl p-5 mb-5 flex items-center justify-between">
            <div>
                <h1 class="text-base font-semibold text-gray-800">Selamat datang, <span class="text-primary">{{ $penduduk->nama }}</span></h1>
                <p class="text-sm text-gray-500 mt-0.5">NIK: {{ $penduduk->nik }}</p>
            </div>
            <a href="{{ route('pengajuan.create') }}" class="hidden sm:flex items-center gap-2 bg-primary hover:bg-primary-dark text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Ajukan Surat
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

            <!-- Left: Stats + Recent -->
            <div class="lg:col-span-2 space-y-5">

                <!-- Stats -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    <div class="bg-white border border-gray-200 rounded-xl p-4 text-center">
                        <p class="text-3xl font-bold text-gray-800">{{ $statistik['total'] }}</p>
                        <p class="text-sm text-gray-400 mt-1">Total</p>
                    </div>
                    <div class="bg-white border border-yellow-200 rounded-xl p-4 text-center">
                        <p class="text-3xl font-bold text-yellow-500">{{ $statistik['menunggu'] }}</p>
                        <p class="text-sm text-yellow-500 mt-1">Menunggu</p>
                    </div>
                    <div class="bg-white border border-blue-200 rounded-xl p-4 text-center">
                        <p class="text-3xl font-bold text-blue-500">{{ $statistik['diproses'] }}</p>
                        <p class="text-sm text-blue-500 mt-1">Diproses</p>
                    </div>
                    <div class="bg-white border border-green-200 rounded-xl p-4 text-center">
                        <p class="text-3xl font-bold text-green-600">{{ $statistik['selesai'] }}</p>
                        <p class="text-sm text-green-600 mt-1">Selesai</p>
                    </div>
                </div>

                <!-- Recent pengajuan -->
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                    <div class="flex items-center justify-between px-5 py-3.5 border-b border-gray-100">
                        <h2 class="text-sm font-semibold text-gray-800">Pengajuan Terbaru</h2>
                        <a href="{{ route('pengajuan.index') }}" class="text-xs text-primary hover:underline">Lihat semua →</a>
                    </div>

                    @if($pengajuanTerbaru->count() > 0)
                        <div class="divide-y divide-gray-50">
                            @foreach($pengajuanTerbaru as $p)
                            <div class="flex items-center gap-4 px-5 py-3.5 hover:bg-gray-50 transition-colors">
                                <div class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0
                                    @if($p->status == 'Selesai') bg-green-100
                                    @elseif($p->status == 'Diproses') bg-blue-100
                                    @elseif($p->status == 'Ditolak') bg-red-100
                                    @else bg-yellow-100 @endif">
                                    <svg class="w-4 h-4
                                        @if($p->status == 'Selesai') text-green-600
                                        @elseif($p->status == 'Diproses') text-blue-600
                                        @elseif($p->status == 'Ditolak') text-red-500
                                        @else text-yellow-600 @endif"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-base font-medium text-gray-800 truncate">{{ $p->jenis_surat }}</p>
                                    <p class="text-sm text-gray-400">{{ $p->nomor_pengajuan }} &middot; {{ $p->created_at->format('d M Y') }}</p>
                                </div>
                                <div class="flex items-center gap-2 flex-shrink-0">
                                    <span class="text-xs px-2 py-0.5 rounded font-medium
                                        @if($p->status == 'Selesai') bg-green-100 text-green-700
                                        @elseif($p->status == 'Diproses') bg-blue-100 text-blue-700
                                        @elseif($p->status == 'Ditolak') bg-red-100 text-red-600
                                        @else bg-yellow-100 text-yellow-700 @endif">
                                        {{ $p->status }}
                                    </span>
                                    <a href="{{ route('pengajuan.show', $p->id) }}" class="text-gray-300 hover:text-primary">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-10">
                            <svg class="w-10 h-10 text-gray-200 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p class="text-sm text-gray-400 mb-3">Belum ada pengajuan surat</p>
                            <a href="{{ route('pengajuan.create') }}" class="inline-flex items-center gap-1.5 bg-primary hover:bg-primary-dark text-white text-sm px-4 py-2 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Ajukan Sekarang
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right: Info -->
            <div class="space-y-4">

                <!-- Profil singkat -->
                <div class="bg-white border border-gray-200 rounded-xl p-5">
                    <h3 class="text-base font-semibold text-gray-700 mb-4">Data Saya</h3>
                    <div class="space-y-3">
                        <div>
                            <p class="text-xs text-gray-400">Nama Lengkap</p>
                            <p class="text-base font-medium text-gray-800">{{ $penduduk->nama }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">NIK</p>
                            <p class="text-base font-medium text-gray-800">{{ $penduduk->nik }}</p>
                        </div>
                        @if($penduduk->alamat)
                        <div>
                            <p class="text-xs text-gray-400">Alamat</p>
                            <p class="text-base font-medium text-gray-800">{{ $penduduk->alamat }}</p>
                        </div>
                        @endif
                    </div>
                    <a href="{{ route('profil.show') }}" class="mt-4 block text-center text-xs text-primary hover:underline border border-primary/30 rounded-lg py-1.5 hover:bg-primary/5 transition-colors">
                        Lihat & Edit Profil
                    </a>
                </div>

                <!-- Layanan tersedia -->
                <div class="bg-white border border-gray-200 rounded-xl p-5">
                    <h3 class="text-base font-semibold text-gray-700 mb-3">Layanan Tersedia</h3>
                    <div class="space-y-2">
                        @foreach(['SKTM', 'Domisili', 'SKU', 'Lainnya'] as $layanan)
                        <a href="{{ route('pengajuan.create') }}" class="flex items-center gap-2.5 p-3 rounded-lg hover:bg-gray-50 transition-colors group">
                            <div class="w-8 h-8 bg-primary/10 rounded-md flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <span class="text-base text-gray-700 group-hover:text-primary transition-colors">{{ $layanan }}</span>
                            <svg class="w-3.5 h-3.5 text-gray-300 group-hover:text-primary ml-auto transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Info jam layanan -->
                <div class="bg-primary/5 border border-primary/20 rounded-xl p-5">
                    <h3 class="text-base font-semibold text-primary mb-3">Jam Pelayanan</h3>
                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex justify-between">
                            <span>Senin – Jumat</span>
                            <span class="font-medium">08.00 – 15.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Sabtu – Minggu</span>
                            <span class="font-medium text-red-500">Tutup</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-400 mt-3">Pengajuan online tetap bisa dilakukan 24 jam.</p>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('mobile-btn').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        function updateClock() {
            const now = new Date();
            const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
            const d = now.getDate().toString().padStart(2,'0');
            const m = months[now.getMonth()];
            const y = now.getFullYear();
            const h = now.getHours().toString().padStart(2,'0');
            const min = now.getMinutes().toString().padStart(2,'0');
            const s = now.getSeconds().toString().padStart(2,'0');
            const el = document.getElementById('current-time');
            if (el) el.textContent = `${d} ${m} ${y}, ${h}:${min}:${s} WIB`;
        }
        updateClock();
        setInterval(updateClock, 1000);
    </script>
</body>
</html>
