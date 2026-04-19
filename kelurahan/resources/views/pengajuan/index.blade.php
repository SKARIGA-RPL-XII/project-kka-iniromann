<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengajuan - E-Kelurahan</title>
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
                    <a href="{{ route('pengajuan.index') }}" class="px-3 py-2 text-sm font-medium text-primary border-b-2 border-primary">Riwayat</a>
                    <a href="{{ route('profil.show') }}" class="px-3 py-2 text-sm text-gray-600 hover:text-primary border-b-2 border-transparent hover:border-primary transition-colors">Profil Saya</a>
                </div>
                <div class="flex items-center gap-3">
                    <div class="hidden sm:flex items-center gap-2">
                        <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                            <span class="text-primary font-bold text-sm">{{ substr(auth()->guard('penduduk')->user()->nama, 0, 1) }}</span>
                        </div>
                        <span class="text-sm text-gray-700 font-medium">{{ explode(' ', auth()->guard('penduduk')->user()->nama)[0] }}</span>
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
            <a href="{{ route('pengajuan.index') }}" class="block px-3 py-2 text-sm font-medium text-primary bg-primary/5 rounded">Riwayat</a>
            <a href="{{ route('profil.show') }}" class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded">Profil Saya</a>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-8">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-xl font-bold text-gray-800">Riwayat Pengajuan</h1>
                <p class="text-sm text-gray-500 mt-0.5">Semua pengajuan surat yang pernah Anda buat</p>
            </div>
            <a href="{{ route('pengajuan.create') }}" class="hidden sm:flex items-center gap-2 bg-primary hover:bg-primary-dark text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Ajukan Baru
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

        @if($pengajuan->count() > 0)
            <div class="space-y-4">
                @foreach($pengajuan as $item)
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0
                                @if($item->status == 'Selesai') bg-green-100
                                @elseif($item->status == 'Diproses') bg-blue-100
                                @elseif($item->status == 'Ditolak') bg-red-100
                                @else bg-yellow-100 @endif">
                                <svg class="w-5 h-5
                                    @if($item->status == 'Selesai') text-green-600
                                    @elseif($item->status == 'Diproses') text-blue-600
                                    @elseif($item->status == 'Ditolak') text-red-500
                                    @else text-yellow-600 @endif"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">{{ $item->jenis_surat }}</p>
                                <p class="text-xs text-gray-400">{{ $item->nomor_pengajuan }} &middot; {{ $item->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                        <span class="text-xs px-3 py-1 rounded-full font-medium
                            @if($item->status == 'Selesai') bg-green-100 text-green-700
                            @elseif($item->status == 'Diproses') bg-blue-100 text-blue-700
                            @elseif($item->status == 'Ditolak') bg-red-100 text-red-600
                            @else bg-yellow-100 text-yellow-700 @endif">
                            {{ $item->status }}
                        </span>
                    </div>

                    <div class="px-5 py-4">
                        <p class="text-xs text-gray-400 mb-1">Keperluan</p>
                        <p class="text-sm text-gray-700">{{ $item->keperluan }}</p>

                        @if($item->catatan_admin)
                        <div class="mt-3 bg-blue-50 border-l-4 border-blue-400 px-4 py-2.5 rounded-r-lg">
                            <p class="text-xs font-semibold text-blue-700 mb-0.5">Catatan Admin</p>
                            <p class="text-sm text-blue-800">{{ $item->catatan_admin }}</p>
                        </div>
                        @endif

                        <!-- Progress -->
                        <div class="mt-4 flex items-center gap-2">
                            <div class="flex items-center gap-1.5">
                                <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                </div>
                                <span class="text-xs text-gray-600">Diajukan</span>
                            </div>
                            <div class="flex-1 h-px {{ in_array($item->status, ['Diproses','Selesai']) ? 'bg-green-400' : 'bg-gray-200' }}"></div>
                            <div class="flex items-center gap-1.5">
                                <div class="w-6 h-6 rounded-full flex items-center justify-center {{ in_array($item->status, ['Diproses','Selesai']) ? 'bg-green-500' : 'bg-gray-200' }}">
                                    @if(in_array($item->status, ['Diproses','Selesai']))
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                    @else
                                        <span class="text-xs text-gray-400">2</span>
                                    @endif
                                </div>
                                <span class="text-xs {{ in_array($item->status, ['Diproses','Selesai']) ? 'text-gray-600' : 'text-gray-400' }}">Diproses</span>
                            </div>
                            <div class="flex-1 h-px {{ $item->status == 'Selesai' ? 'bg-green-400' : 'bg-gray-200' }}"></div>
                            <div class="flex items-center gap-1.5">
                                <div class="w-6 h-6 rounded-full flex items-center justify-center {{ $item->status == 'Selesai' ? 'bg-green-500' : 'bg-gray-200' }}">
                                    @if($item->status == 'Selesai')
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                    @else
                                        <span class="text-xs text-gray-400">3</span>
                                    @endif
                                </div>
                                <span class="text-xs {{ $item->status == 'Selesai' ? 'text-gray-600' : 'text-gray-400' }}">Selesai</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 px-5 py-3 bg-gray-50 border-t border-gray-100">
                        <a href="{{ route('pengajuan.show', $item->id) }}" class="px-3 py-1.5 text-xs bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-lg font-medium transition-colors">Detail</a>
                        @if($item->status == 'Menunggu Verifikasi')
                            <a href="{{ route('pengajuan.edit', $item->id) }}" class="px-3 py-1.5 text-xs bg-yellow-50 text-yellow-600 hover:bg-yellow-100 rounded-lg font-medium transition-colors">Edit</a>
                            <button onclick="showDeleteModal({{ $item->id }}, '{{ $item->jenis_surat }}')" class="px-3 py-1.5 text-xs bg-red-50 text-red-500 hover:bg-red-100 rounded-lg font-medium transition-colors">Hapus</button>
                        @endif
                        @if($item->status == 'Selesai' && $item->file_surat)
                            <a href="{{ route('pengajuan.download', $item->id) }}" class="px-3 py-1.5 text-xs bg-green-50 text-green-600 hover:bg-green-100 rounded-lg font-medium transition-colors flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Download
                            </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-6">{{ $pengajuan->links() }}</div>
        @else
            <div class="bg-white border border-gray-200 rounded-xl text-center py-16">
                <svg class="w-12 h-12 text-gray-200 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <p class="text-gray-400 text-sm mb-4">Belum ada pengajuan surat</p>
                <a href="{{ route('pengajuan.create') }}" class="inline-flex items-center gap-2 bg-primary hover:bg-primary-dark text-white text-sm px-4 py-2 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Ajukan Sekarang
                </a>
            </div>
        @endif
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-sm p-6">
            <h3 class="font-semibold text-gray-900 mb-2">Hapus Pengajuan?</h3>
            <p class="text-sm text-gray-500 mb-1">Anda akan menghapus pengajuan:</p>
            <p class="text-sm font-medium text-gray-900 mb-5" id="deleteItemName"></p>
            <div class="flex gap-3">
                <button onclick="hideDeleteModal()" class="flex-1 px-4 py-2 text-sm border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">Batal</button>
                <form id="deleteForm" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-4 py-2 text-sm bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors font-medium">Hapus</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('mobile-btn').addEventListener('click', () => document.getElementById('mobile-menu').classList.toggle('hidden'));

        function showDeleteModal(id, name) {
            document.getElementById('deleteForm').action = `/pengajuan/${id}`;
            document.getElementById('deleteItemName').textContent = name;
            document.getElementById('deleteModal').classList.remove('hidden');
        }
        function hideDeleteModal() { document.getElementById('deleteModal').classList.add('hidden'); }
        document.getElementById('deleteModal').addEventListener('click', function(e) { if (e.target === this) hideDeleteModal(); });

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
