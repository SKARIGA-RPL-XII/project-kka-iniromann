<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengajuan - Admin E-Kelurahan</title>
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
        <div class="border-t border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-9 h-9 bg-primary/10 rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-primary font-semibold text-sm">A</span>
                </div>
                <div class="min-w-0">
                    <p class="text-sm font-medium text-gray-900">Admin</p>
                    <p class="text-xs text-gray-400">Administrator</p>
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
        <header class="bg-white border-b border-gray-200 sticky top-0 z-40 h-16 flex items-center px-6 gap-4">
            <button id="open-sidebar" class="lg:hidden text-gray-500 hover:text-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.pengajuan.index') }}" class="text-gray-400 hover:text-primary">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <h1 class="text-base font-semibold text-gray-800">Detail Pengajuan</h1>
            </div>
            <div id="current-time" class="ml-auto text-sm text-gray-400"></div>
        </header>

        <main class="flex-1 p-6">

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3 rounded-lg mb-5 flex items-center gap-2">
                    <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

                <!-- Left: Detail -->
                <div class="lg:col-span-2 space-y-4">

                    <!-- Info Pengajuan -->
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                        <div class="px-5 py-3.5 border-b border-gray-100 bg-gray-50 flex items-center justify-between">
                            <h3 class="text-sm font-semibold text-gray-700">Informasi Pengajuan</h3>
                            <span class="text-xs px-2.5 py-1 rounded-full font-medium
                                @if($pengajuan->status == 'Selesai') bg-green-100 text-green-700
                                @elseif($pengajuan->status == 'Diproses') bg-orange-100 text-orange-700
                                @elseif($pengajuan->status == 'Ditolak') bg-red-100 text-red-600
                                @else bg-yellow-100 text-yellow-700 @endif">
                                {{ $pengajuan->status }}
                            </span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 divide-y sm:divide-y-0 sm:divide-x divide-gray-100">
                            <div class="px-5 py-4">
                                <p class="text-xs text-gray-400 mb-1">Nomor Pengajuan</p>
                                <p class="text-sm font-medium text-gray-800">{{ $pengajuan->nomor_pengajuan }}</p>
                            </div>
                            <div class="px-5 py-4">
                                <p class="text-xs text-gray-400 mb-1">Jenis Surat</p>
                                <p class="text-sm font-medium text-gray-800">{{ $pengajuan->jenis_surat }}</p>
                            </div>
                            <div class="px-5 py-4 border-t border-gray-100">
                                <p class="text-xs text-gray-400 mb-1">Tanggal Pengajuan</p>
                                <p class="text-sm font-medium text-gray-800">{{ $pengajuan->created_at->format('d M Y H:i') }}</p>
                            </div>
                            @if($pengajuan->tanggal_selesai)
                            <div class="px-5 py-4 border-t border-gray-100">
                                <p class="text-xs text-gray-400 mb-1">Tanggal Selesai</p>
                                <p class="text-sm font-medium text-gray-800">{{ $pengajuan->tanggal_selesai->format('d M Y H:i') }}</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Data Pemohon -->
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                        <div class="px-5 py-3.5 border-b border-gray-100 bg-gray-50">
                            <h3 class="text-sm font-semibold text-gray-700">Data Pemohon</h3>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 divide-y sm:divide-y-0 sm:divide-x divide-gray-100">
                            <div class="px-5 py-4">
                                <p class="text-xs text-gray-400 mb-1">Nama</p>
                                <p class="text-sm font-medium text-gray-800">{{ $pengajuan->penduduk->nama }}</p>
                            </div>
                            <div class="px-5 py-4">
                                <p class="text-xs text-gray-400 mb-1">NIK</p>
                                <p class="text-sm font-medium text-gray-800">{{ $pengajuan->penduduk->nik }}</p>
                            </div>
                            <div class="px-5 py-4 border-t border-gray-100">
                                <p class="text-xs text-gray-400 mb-1">RT / RW</p>
                                <p class="text-sm font-medium text-gray-800">{{ $pengajuan->penduduk->rt }} / {{ $pengajuan->penduduk->rw }}</p>
                            </div>
                            <div class="px-5 py-4 border-t border-gray-100">
                                <p class="text-xs text-gray-400 mb-1">Telepon</p>
                                <p class="text-sm font-medium text-gray-800">{{ $pengajuan->penduduk->telepon ?: '-' }}</p>
                            </div>
                        </div>
                        <div class="px-5 py-4 border-t border-gray-100">
                            <p class="text-xs text-gray-400 mb-1">Alamat</p>
                            <p class="text-sm font-medium text-gray-800">{{ $pengajuan->penduduk->alamat ?: '-' }}</p>
                        </div>
                    </div>

                    <!-- Keperluan -->
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                        <div class="px-5 py-3.5 border-b border-gray-100 bg-gray-50">
                            <h3 class="text-sm font-semibold text-gray-700">Keperluan</h3>
                        </div>
                        <div class="px-5 py-4">
                            <p class="text-sm text-gray-700 leading-relaxed">{{ $pengajuan->keperluan }}</p>
                        </div>
                    </div>

                    <!-- Catatan Admin -->
                    @if($pengajuan->catatan_admin)
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                        <div class="px-5 py-3.5 border-b border-gray-100 bg-gray-50">
                            <h3 class="text-sm font-semibold text-gray-700">Catatan Admin</h3>
                        </div>
                        <div class="px-5 py-4">
                            <p class="text-sm text-gray-700 leading-relaxed">{{ $pengajuan->catatan_admin }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Berkas -->
                    @if($pengajuan->berkas_pendukung && count($pengajuan->berkas_pendukung) > 0)
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                        <div class="px-5 py-3.5 border-b border-gray-100 bg-gray-50">
                            <h3 class="text-sm font-semibold text-gray-700">Berkas Pendukung</h3>
                        </div>
                        <div class="px-5 py-4 grid grid-cols-2 sm:grid-cols-3 gap-3">
                            @foreach($pengajuan->berkas_pendukung as $berkas)
                            <a href="{{ asset('storage/' . $berkas) }}" target="_blank"
                               class="flex items-center gap-2 p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                                <svg class="w-5 h-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span class="text-xs text-gray-600 truncate">{{ basename($berkas) }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Right: Actions -->
                <div class="space-y-4">
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                        <div class="px-5 py-3.5 border-b border-gray-100 bg-gray-50">
                            <h3 class="text-sm font-semibold text-gray-700">Aksi</h3>
                        </div>
                        <div class="p-5 space-y-3">
                            <a href="{{ route('admin.pengajuan.edit', $pengajuan->id) }}"
                               class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-primary hover:bg-primary-dark text-white text-sm font-medium rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit Pengajuan
                            </a>
                            <a href="{{ route('admin.pengajuan.index') }}"
                               class="w-full flex items-center justify-center gap-2 px-4 py-2.5 border border-gray-200 text-gray-600 hover:bg-gray-50 text-sm rounded-lg transition-colors">
                                Kembali ke Daftar
                            </a>
                        </div>
                    </div>

                    @if($pengajuan->file_surat)
                    <div class="bg-white border border-green-200 rounded-xl overflow-hidden">
                        <div class="px-5 py-3.5 border-b border-green-100 bg-green-50">
                            <h3 class="text-sm font-semibold text-green-700">File Surat</h3>
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-2 text-sm text-green-700 mb-3">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                {{ basename($pengajuan->file_surat) }}
                            </div>
                            <a href="{{ asset('storage/' . $pengajuan->file_surat) }}" target="_blank"
                               class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                Download Surat
                            </a>
                        </div>
                    </div>
                    @endif
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
        const d = now.getDate().toString().padStart(2,'0'), m = months[now.getMonth()], y = now.getFullYear();
        const h = now.getHours().toString().padStart(2,'0'), min = now.getMinutes().toString().padStart(2,'0'), s = now.getSeconds().toString().padStart(2,'0');
        document.getElementById('current-time').textContent = `${d} ${m} ${y}, ${h}:${min}:${s} WIB`;
    }
    updateClock(); setInterval(updateClock, 1000);

    // Page transition
    document.querySelectorAll('a[href]').forEach(a => {
        if (a.target === '_blank' || a.closest('#sidebar') || !a.getAttribute('href') || a.getAttribute('href').startsWith('#') || a.getAttribute('href').startsWith('javascript')) return;
        a.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (!href || href.startsWith('#') || href.startsWith('javascript')) return;
            e.preventDefault();
            document.getElementById('page-transition').classList.add('active');
            setTimeout(() => window.location.href = href, 250);
        });
    });
</script>
</body>
</html>
