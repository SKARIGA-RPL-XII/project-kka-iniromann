<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengajuan - Admin E-Kelurahan</title>
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
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Dashboard
            </a>
            <a href="{{ route('admin.pengajuan.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-lg bg-primary/10 text-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Kelola Pengajuan
            </a>
        </nav>
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
                <h1 class="text-base font-semibold text-gray-800">Edit Pengajuan</h1>
                <span class="text-sm text-gray-400">— {{ $pengajuan->nomor_pengajuan }}</span>
            </div>
            <div id="current-time" class="ml-auto text-sm text-gray-400"></div>
        </header>

        <main class="flex-1 p-6">

            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3 rounded-lg mb-5">
                    @foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('admin.pengajuan.update', $pengajuan->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

                    <!-- Left: Form -->
                    <div class="lg:col-span-2 space-y-4">

                        <!-- Data Pengajuan -->
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                            <div class="px-5 py-3.5 border-b border-gray-100 bg-gray-50">
                                <h3 class="text-sm font-semibold text-gray-700">Data Pengajuan</h3>
                            </div>
                            <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-medium text-gray-600 mb-1.5">Penduduk</label>
                                    <select name="nik" class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none" required>
                                        <option value="">Pilih Penduduk</option>
                                        @foreach($penduduk as $p)
                                            <option value="{{ $p->nik }}" {{ old('nik', $pengajuan->nik) == $p->nik ? 'selected' : '' }}>
                                                {{ $p->nama }} — {{ $p->nik }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-gray-600 mb-1.5">Jenis Surat</label>
                                    <select name="jenis_surat" class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none" required>
                                        <option value="">Pilih Jenis Surat</option>
                                        @foreach(['SKTM','Domisili','SKU','Keterangan Usaha','Keterangan Tidak Mampu','Lainnya'] as $js)
                                            <option value="{{ $js }}" {{ old('jenis_surat', $pengajuan->jenis_surat) == $js ? 'selected' : '' }}>{{ $js }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-gray-600 mb-1.5">Status</label>
                                    <select id="status" name="status" class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none" required>
                                        @foreach(['Menunggu Verifikasi','Diproses','Selesai','Ditolak'] as $st)
                                            <option value="{{ $st }}" {{ old('status', $pengajuan->status) == $st ? 'selected' : '' }}>{{ $st }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-gray-600 mb-1.5">Berkas Baru <span class="text-gray-400">(opsional)</span></label>
                                    <input type="file" name="berkas[]" multiple accept=".jpg,.jpeg,.png,.pdf"
                                           class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                                    <p class="text-xs text-gray-400 mt-1">JPG, PNG, PDF. Maks 2MB. Kosongkan jika tidak diubah.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Keperluan & Catatan -->
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                            <div class="px-5 py-3.5 border-b border-gray-100 bg-gray-50">
                                <h3 class="text-sm font-semibold text-gray-700">Keperluan & Catatan</h3>
                            </div>
                            <div class="p-5 space-y-4">
                                <div>
                                    <label class="block text-xs font-medium text-gray-600 mb-1.5">Keperluan</label>
                                    <textarea name="keperluan" rows="4"
                                              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none"
                                              placeholder="Jelaskan keperluan pengajuan..." required>{{ old('keperluan', $pengajuan->keperluan) }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-600 mb-1.5">Catatan Admin <span class="text-gray-400">(opsional)</span></label>
                                    <textarea name="catatan_admin" rows="3"
                                              class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none"
                                              placeholder="Catatan untuk pemohon...">{{ old('catatan_admin', $pengajuan->catatan_admin) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Upload File Surat (muncul jika status Selesai) -->
                        <div id="file-surat-section" class="{{ old('status', $pengajuan->status) == 'Selesai' ? '' : 'hidden' }} bg-white border border-gray-200 rounded-xl overflow-hidden">
                            <div class="px-5 py-3.5 border-b border-gray-100 bg-gray-50">
                                <h3 class="text-sm font-semibold text-gray-700">Upload File Surat</h3>
                            </div>
                            <div class="p-5">
                                <label class="block text-xs font-medium text-gray-600 mb-1.5">File Surat (PDF)</label>
                                <input type="file" name="file_surat" accept=".pdf"
                                       class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none">
                                <p class="text-xs text-gray-400 mt-1">Format PDF, maks 5MB.</p>
                                @if($pengajuan->file_surat)
                                    <div class="mt-3 flex items-center gap-2 text-sm text-green-700 bg-green-50 border border-green-200 px-3 py-2 rounded-lg">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                        File saat ini: {{ basename($pengajuan->file_surat) }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Berkas saat ini -->
                        @if($pengajuan->berkas_pendukung && count($pengajuan->berkas_pendukung) > 0)
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                            <div class="px-5 py-3.5 border-b border-gray-100 bg-gray-50">
                                <h3 class="text-sm font-semibold text-gray-700">Berkas Saat Ini</h3>
                            </div>
                            <div class="px-5 py-4 grid grid-cols-2 sm:grid-cols-3 gap-3">
                                @foreach($pengajuan->berkas_pendukung as $berkas)
                                <div class="flex items-center gap-2 p-3 border border-gray-200 rounded-lg">
                                    <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <span class="text-xs text-gray-600 truncate">{{ basename($berkas) }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Right: Actions -->
                    <div>
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden sticky top-20">
                            <div class="px-5 py-3.5 border-b border-gray-100 bg-gray-50">
                                <h3 class="text-sm font-semibold text-gray-700">Simpan</h3>
                            </div>
                            <div class="p-5 space-y-3">
                                <button type="submit" class="w-full px-4 py-2.5 bg-primary hover:bg-primary-dark text-white text-sm font-medium rounded-lg transition-colors">
                                    Perbarui Pengajuan
                                </button>
                                <a href="{{ route('admin.pengajuan.show', $pengajuan->id) }}"
                                   class="w-full flex items-center justify-center px-4 py-2.5 border border-gray-200 text-gray-600 hover:bg-gray-50 text-sm rounded-lg transition-colors">
                                    Batal
                                </a>
                            </div>

                            <div class="px-5 pb-5">
                                <div class="border-t border-gray-100 pt-4">
                                    <p class="text-xs text-gray-400 mb-2">Info Pengajuan</p>
                                    <div class="space-y-1.5 text-xs text-gray-600">
                                        <div class="flex justify-between">
                                            <span>Nomor</span>
                                            <span class="font-medium">{{ $pengajuan->nomor_pengajuan }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span>Pemohon</span>
                                            <span class="font-medium">{{ $pengajuan->penduduk->nama }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span>Diajukan</span>
                                            <span class="font-medium">{{ $pengajuan->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    document.getElementById('open-sidebar').addEventListener('click', () => sidebar.classList.remove('-translate-x-full'));
    document.getElementById('close-sidebar').addEventListener('click', () => sidebar.classList.add('-translate-x-full'));

    document.getElementById('status').addEventListener('change', function() {
        document.getElementById('file-surat-section').classList.toggle('hidden', this.value !== 'Selesai');
    });

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
        if (a.target === '_blank' || !a.getAttribute('href') || a.getAttribute('href').startsWith('#')) return;
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
