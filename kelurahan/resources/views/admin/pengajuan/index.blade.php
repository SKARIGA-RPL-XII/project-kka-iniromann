<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengajuan - Admin E-Kelurahan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#059669',
                        'primary-dark': '#047857',
                        'secondary': '#10b981',
                    }
                }
            }
        }
    </script>
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
                    <p class="text-sm font-medium text-gray-900 truncate">Admin</p>
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
        <!-- Topbar -->
        <header class="bg-white border-b border-gray-200 sticky top-0 z-40 h-16 flex items-center px-6 gap-4">
            <button id="open-sidebar" class="lg:hidden text-gray-500 hover:text-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <h1 class="text-base font-semibold text-gray-800">Kelola Pengajuan</h1>
            <div id="current-time" class="ml-auto text-sm text-gray-400"></div>
        </header>

        <!-- Content -->
        <main class="flex-1 p-6 space-y-5">

            <!-- Stats -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
                <div class="bg-yellow-50 border border-yellow-100 rounded-xl p-4">
                    <p class="text-xs text-yellow-600 mb-1">Menunggu</p>
                    <p class="text-2xl font-bold text-yellow-600">{{ $pengajuan->where('status', 'Menunggu Verifikasi')->count() }}</p>
                </div>
                <div class="bg-orange-50 border border-orange-100 rounded-xl p-4">
                    <p class="text-xs text-orange-600 mb-1">Diproses</p>
                    <p class="text-2xl font-bold text-orange-600">{{ $pengajuan->where('status', 'Diproses')->count() }}</p>
                </div>
                <div class="bg-green-50 border border-green-100 rounded-xl p-4">
                    <p class="text-xs text-green-600 mb-1">Selesai</p>
                    <p class="text-2xl font-bold text-green-600">{{ $pengajuan->where('status', 'Selesai')->count() }}</p>
                </div>
                <div class="bg-red-50 border border-red-100 rounded-xl p-4">
                    <p class="text-xs text-red-500 mb-1">Ditolak</p>
                    <p class="text-2xl font-bold text-red-500">{{ $pengajuan->where('status', 'Ditolak')->count() }}</p>
                </div>
            </div>

            <!-- Table Card -->
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm">
                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-5 py-4 border-b border-gray-100">
                    <h3 class="font-semibold text-gray-800 text-sm">Daftar Pengajuan</h3>
                    <a href="{{ route('admin.pengajuan.create') }}" class="inline-flex items-center gap-1.5 bg-primary hover:bg-primary-dark text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah
                    </a>
                </div>

                <!-- Filter -->
                <div class="px-5 py-3 border-b border-gray-100 bg-gray-50">
                    <form method="GET" id="searchForm" class="flex flex-col sm:flex-row gap-2">
                        <div class="relative flex-1">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="text" name="search" id="searchInput" value="{{ request('search') }}"
                                   placeholder="Cari nama, NIK, atau nomor pengajuan..."
                                   class="w-full pl-9 pr-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none bg-white">
                        </div>
                        <select name="status" id="statusSelect" class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none bg-white">
                            <option value="">Semua Status</option>
                            <option value="Menunggu Verifikasi" {{ request('status') == 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu</option>
                            <option value="Diproses" {{ request('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                        <a href="{{ route('admin.pengajuan.index') }}" class="px-3 py-2 text-sm border border-gray-200 rounded-lg bg-white text-gray-500 hover:bg-gray-100 transition-colors flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        </a>
                    </form>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto" id="tableContainer">
                    @if($pengajuan->count() > 0)
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="text-xs text-gray-500 uppercase tracking-wider border-b border-gray-100">
                                    <th class="px-5 py-3 text-left font-medium">No. Pengajuan</th>
                                    <th class="px-5 py-3 text-left font-medium">Pemohon</th>
                                    <th class="px-5 py-3 text-left font-medium">Jenis Surat</th>
                                    <th class="px-5 py-3 text-left font-medium">Tanggal</th>
                                    <th class="px-5 py-3 text-left font-medium">Status</th>
                                    <th class="px-5 py-3 text-left font-medium">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50" id="tableBody">
                                @foreach($pengajuan as $item)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-5 py-3.5 font-medium text-gray-900 whitespace-nowrap">{{ $item->nomor_pengajuan }}</td>
                                        <td class="px-5 py-3.5 whitespace-nowrap">
                                            <p class="font-medium text-gray-900">{{ $item->penduduk->nama }}</p>
                                            <p class="text-xs text-gray-400">{{ $item->nik }}</p>
                                        </td>
                                        <td class="px-5 py-3.5 text-gray-700 whitespace-nowrap">{{ $item->jenis_surat }}</td>
                                        <td class="px-5 py-3.5 text-gray-400 whitespace-nowrap text-xs">{{ $item->created_at->format('d M Y H:i') }}</td>
                                        <td class="px-5 py-3.5 whitespace-nowrap">
                                            <span class="text-xs px-2.5 py-1 rounded-full font-medium
                                                @if($item->status == 'Selesai') bg-green-100 text-green-700
                                                @elseif($item->status == 'Diproses') bg-orange-100 text-orange-700
                                                @elseif($item->status == 'Ditolak') bg-red-100 text-red-700
                                                @else bg-yellow-100 text-yellow-700 @endif">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-3.5 whitespace-nowrap">
                                            <div class="flex items-center gap-1.5">
                                                <a href="{{ route('admin.pengajuan.show', $item->id) }}"
                                                   class="px-2.5 py-1 text-xs bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-lg transition-colors font-medium">
                                                    Detail
                                                </a>
                                                <a href="{{ route('admin.pengajuan.edit', $item->id) }}"
                                                   class="px-2.5 py-1 text-xs bg-yellow-50 text-yellow-600 hover:bg-yellow-100 rounded-lg transition-colors font-medium">
                                                    Edit
                                                </a>
                                                <button onclick="showDeleteModal({{ $item->id }}, '{{ $item->jenis_surat }}')"
                                                        class="px-2.5 py-1 text-xs bg-red-50 text-red-500 hover:bg-red-100 rounded-lg transition-colors font-medium">
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="px-5 py-3 border-t border-gray-100" id="paginationContainer">
                            {{ $pengajuan->appends(request()->query())->links() }}
                        </div>
                    @else
                        <div class="text-center py-16 text-gray-400">
                            <svg class="w-10 h-10 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p class="text-sm">Tidak ada pengajuan ditemukan</p>
                        </div>
                    @endif
                </div>
            </div>

        </main>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm p-6">
        <h3 class="font-semibold text-gray-900 mb-2">Hapus Pengajuan?</h3>
        <p class="text-sm text-gray-500 mb-1">Anda akan menghapus pengajuan:</p>
        <p class="text-sm font-medium text-gray-900 mb-5" id="deleteItemName"></p>
        <div class="flex gap-3">
            <button onclick="hideDeleteModal()" class="flex-1 px-4 py-2.5 text-sm border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">
                Batal
            </button>
            <form id="deleteForm" method="POST" class="flex-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full px-4 py-2.5 text-sm bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors font-medium">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div id="successModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center p-4" style="opacity:0; transition: opacity 0.3s ease;">
    <div id="successModalBox" class="bg-white rounded-2xl shadow-xl w-full max-w-sm p-8 text-center" style="opacity:0; transform:scale(0.85) translateY(-10px); transition: opacity 0.35s ease, transform 0.35s ease;">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-900 mb-1">Berhasil!</h3>
        <p class="text-sm text-gray-500" id="successModalMsg"></p>
        <button onclick="hideSuccessModal()" class="mt-6 px-6 py-2.5 bg-primary hover:bg-primary-dark text-white text-sm font-medium rounded-lg transition-colors w-full">
            OK
        </button>
    </div>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    document.getElementById('open-sidebar').addEventListener('click', () => sidebar.classList.remove('-translate-x-full'));
    document.getElementById('close-sidebar').addEventListener('click', () => sidebar.classList.add('-translate-x-full'));

    function showDeleteModal(id, name) {
        document.getElementById('deleteForm').action = `/admin/pengajuan/${id}`;
        document.getElementById('deleteItemName').textContent = name;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function hideDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) hideDeleteModal();
    });

    function showSuccessModal(msg) {
        const modal = document.getElementById('successModal');
        const box = document.getElementById('successModalBox');
        document.getElementById('successModalMsg').textContent = msg;
        modal.classList.remove('hidden');
        // fade in backdrop
        requestAnimationFrame(() => {
            modal.style.opacity = '1';
            setTimeout(() => {
                box.style.opacity = '1';
                box.style.transform = 'scale(1) translateY(0)';
            }, 50);
        });
    }

    function hideSuccessModal() {
        const modal = document.getElementById('successModal');
        const box = document.getElementById('successModalBox');
        box.style.opacity = '0';
        box.style.transform = 'scale(0.85) translateY(-10px)';
        modal.style.opacity = '0';
        setTimeout(() => {
            modal.classList.add('hidden');
            // reset untuk pemakaian berikutnya
            box.style.opacity = '0';
            box.style.transform = 'scale(0.85) translateY(-10px)';
            modal.style.opacity = '0';
        }, 350);
    }

    document.getElementById('successModal').addEventListener('click', function(e) {
        if (e.target === this) hideSuccessModal();
    });

    @if(session('success'))
        document.addEventListener('DOMContentLoaded', () => showSuccessModal(@json(session('success'))));
    @endif

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

    // Live search
    const searchInput = document.getElementById('searchInput');
    const statusSelect = document.getElementById('statusSelect');
    const searchForm = document.getElementById('searchForm');
    const tableContainer = document.getElementById('tableContainer');
    let searchTimeout;

    function fetchData() {
        const params = new URLSearchParams(new FormData(searchForm)).toString();
        tableContainer.style.opacity = '0.5';
        fetch(`{{ route('admin.pengajuan.index') }}?${params}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.text())
        .then(html => {
            const doc = new DOMParser().parseFromString(html, 'text/html');
            const newTable = doc.getElementById('tableContainer');
            if (newTable) tableContainer.innerHTML = newTable.innerHTML;
            tableContainer.style.opacity = '1';
        })
        .catch(() => tableContainer.style.opacity = '1');
    }

    searchInput.addEventListener('input', () => {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(fetchData, 500);
    });
    statusSelect.addEventListener('change', fetchData);
    searchForm.addEventListener('submit', e => { e.preventDefault(); fetchData(); });

    // Page transition (skip form submits & search)
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

@php $menunggu = $pengajuan->where('status', 'Menunggu Verifikasi')->count(); @endphp
@if($menunggu > 0)
<!-- Popup Notif Kuning -->
<div id="notifPopup" class="fixed bottom-5 right-5 z-50 w-80 bg-yellow-50 border border-yellow-300 rounded-xl shadow-lg p-4 flex items-start gap-3" style="opacity:0; transform:translateX(110%); transition: opacity 0.4s ease, transform 0.4s ease;">
    <div class="w-9 h-9 bg-yellow-400 rounded-lg flex items-center justify-center flex-shrink-0">
        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
        </svg>
    </div>
    <div class="flex-1 min-w-0">
        <p class="text-sm font-semibold text-yellow-800">Pengajuan Menunggu</p>
        <p class="text-xs text-yellow-700 mt-0.5">Ada <strong>{{ $menunggu }} pengajuan</strong> yang belum diverifikasi.</p>
        <a href="?status=Menunggu+Verifikasi" onclick="closeNotif(event, '?status=Menunggu+Verifikasi')" class="inline-block mt-2 text-xs font-medium text-yellow-800 bg-yellow-200 hover:bg-yellow-300 px-3 py-1 rounded-md transition-colors">Lihat Sekarang</a>
    </div>
    <button onclick="closeNotif(event)" class="text-yellow-500 hover:text-yellow-700 flex-shrink-0 mt-0.5">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
</div>
<script>
    // Slide in dari kanan
    setTimeout(() => {
        const popup = document.getElementById('notifPopup');
        if (popup) {
            popup.style.opacity = '1';
            popup.style.transform = 'translateX(0)';
        }
    }, 400);

    function closeNotif(e, redirect) {
        e.preventDefault();
        const popup = document.getElementById('notifPopup');
        popup.style.opacity = '0';
        popup.style.transform = 'translateX(110%)';
        setTimeout(() => {
            popup.remove();
            if (redirect) window.location.href = redirect;
        }, 400);
    }
</script>
@endif
</body>
</html>
