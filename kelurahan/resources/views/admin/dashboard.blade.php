<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - E-Kelurahan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = { theme: { extend: { colors: { 'primary': '#059669', 'primary-dark': '#047857', 'secondary': '#10b981' } } } }</script>
    <style>
        #page-transition { position:fixed; inset:0; background:#fff; z-index:9999; opacity:0; pointer-events:none; transition: opacity 0.25s ease; }
        #page-transition.active { opacity:1; pointer-events:all; }
        main { animation: pageFadeIn 0.3s ease both; }
        @keyframes pageFadeIn { from { opacity:0; transform:translateY(8px); } to { opacity:1; transform:translateY(0); } }
    </style>
</head>
<body class="bg-gray-50 font-sans">
<div id="page-transition"></div>
<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-60 bg-white border-r border-gray-200 flex flex-col transform transition-transform duration-300 lg:translate-x-0 -translate-x-full">
        <div class="flex items-center gap-3 px-5 h-16 border-b border-gray-100">
            <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
            <div>
                <p class="font-bold text-gray-900 text-sm">E-Kelurahan</p>
                <p class="text-xs text-gray-400">Admin Panel</p>
            </div>
            <button id="close-sidebar" class="lg:hidden ml-auto text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <nav class="flex-1 px-3 py-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-lg bg-primary/10 text-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Dashboard
            </a>
            <a href="{{ route('admin.pengajuan.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Kelola Pengajuan
                @if($statistik['menunggu'] > 0)
                    <span class="ml-auto bg-yellow-400 text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ $statistik['menunggu'] }}</span>
                @endif
            </a>
        </nav>

        <div class="border-t border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-9 h-9 bg-primary/10 rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-primary font-semibold text-sm">{{ substr($admin->nama, 0, 1) }}</span>
                </div>
                <div class="min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate">{{ $admin->nama }}</p>
                    <p class="text-xs text-gray-400">{{ ucfirst($admin->role) }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 text-sm text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Main -->
    <div class="flex-1 flex flex-col lg:ml-60">
        <!-- Topbar -->
        <header class="bg-white border-b border-gray-200 sticky top-0 z-40 h-16 flex items-center px-6 gap-4">
            <button id="open-sidebar" class="lg:hidden text-gray-500 hover:text-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <h1 class="text-base font-semibold text-gray-800">Dashboard</h1>
            <div id="current-time" class="ml-auto text-sm text-gray-400"></div>
        </header>

        <!-- Content -->
        <main class="flex-1 p-6 space-y-6">

            <!-- Welcome -->
            <div class="bg-gradient-to-r from-primary to-secondary rounded-xl p-6 text-white">
                <p class="text-sm opacity-80 mb-1">Selamat datang kembali,</p>
                <h2 class="text-xl font-bold">{{ $admin->nama }}</h2>
                <p class="text-sm opacity-70 mt-1">{{ ucfirst($admin->role) }} &mdash; E-Kelurahan Kota Malang</p>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-white rounded-xl border border-gray-100 p-5 shadow-sm">
                    <p class="text-xs text-gray-500 mb-1">Total Penduduk</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $statistik['total_penduduk'] }}</p>
                </div>
                <div class="bg-white rounded-xl border border-gray-100 p-5 shadow-sm">
                    <p class="text-xs text-gray-500 mb-1">Total Pengajuan</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $statistik['total_pengajuan'] }}</p>
                </div>
                <div class="bg-yellow-50 rounded-xl border border-yellow-100 p-5 shadow-sm">
                    <p class="text-xs text-yellow-600 mb-1">Menunggu Verifikasi</p>
                    <p class="text-3xl font-bold text-yellow-600">{{ $statistik['menunggu'] }}</p>
                </div>
                <div class="bg-orange-50 rounded-xl border border-orange-100 p-5 shadow-sm">
                    <p class="text-xs text-orange-600 mb-1">Sedang Diproses</p>
                    <p class="text-3xl font-bold text-orange-600">{{ $statistik['diproses'] }}</p>
                </div>
                <div class="bg-green-50 rounded-xl border border-green-100 p-5 shadow-sm">
                    <p class="text-xs text-green-600 mb-1">Selesai</p>
                    <p class="text-3xl font-bold text-green-600">{{ $statistik['selesai'] }}</p>
                </div>
                <div class="bg-red-50 rounded-xl border border-red-100 p-5 shadow-sm">
                    <p class="text-xs text-red-500 mb-1">Ditolak</p>
                    <p class="text-3xl font-bold text-red-500">{{ $statistik['ditolak'] }}</p>
                </div>
            </div>

            <!-- Recent -->
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm">
                <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
                    <h3 class="font-semibold text-gray-800 text-sm">Pengajuan Terbaru</h3>
                    <a href="{{ route('admin.pengajuan.index') }}" class="text-xs text-primary hover:underline">Lihat semua</a>
                </div>
                <div class="divide-y divide-gray-50">
                    @forelse($pengajuanTerbaru as $p)
                        <div class="flex items-center justify-between px-5 py-3.5 hover:bg-gray-50 transition-colors">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $p->jenis_surat }}</p>
                                <p class="text-xs text-gray-400 mt-0.5">{{ $p->penduduk->nama }} &middot; {{ $p->created_at->format('d M Y') }}</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-xs px-2.5 py-1 rounded-full font-medium
                                    @if($p->status == 'Selesai') bg-green-100 text-green-700
                                    @elseif($p->status == 'Diproses') bg-orange-100 text-orange-700
                                    @elseif($p->status == 'Ditolak') bg-red-100 text-red-700
                                    @else bg-yellow-100 text-yellow-700 @endif">
                                    {{ $p->status }}
                                </span>
                                <a href="{{ route('admin.pengajuan.show', $p->id) }}" class="text-xs text-primary hover:underline">Detail</a>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-10 text-gray-400 text-sm">Belum ada pengajuan</div>
                    @endforelse
                </div>
            </div>

        </main>
    </div>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    document.getElementById('open-sidebar').addEventListener('click', () => sidebar.classList.remove('-translate-x-full'));
    document.getElementById('close-sidebar').addEventListener('click', () => sidebar.classList.add('-translate-x-full'));

    function updateClock() {
        const now = new Date();
        const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
        const d = now.getDate().toString().padStart(2,'0');
        const m = months[now.getMonth()];
        const y = now.getFullYear();
        const h = now.getHours().toString().padStart(2,'0');
        const min = now.getMinutes().toString().padStart(2,'0');
        const s = now.getSeconds().toString().padStart(2,'0');
        document.getElementById('current-time').textContent = `${d} ${m} ${y}, ${h}:${min}:${s} WIB`;
    }
    updateClock();
    setInterval(updateClock, 1000);

    // Page transition
    document.querySelectorAll('a[href]').forEach(a => {
        if (a.target === '_blank' || a.closest('#sidebar') || a.href.startsWith('#') || a.href.startsWith('javascript')) return;
        a.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (!href || href.startsWith('#')) return;
            e.preventDefault();
            const overlay = document.getElementById('page-transition');
            overlay.classList.add('active');
            setTimeout(() => window.location.href = href, 250);
        });
    });
</script>
</body>
</html>
