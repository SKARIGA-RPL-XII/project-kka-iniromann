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
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-200 transform transition-transform duration-300 lg:translate-x-0 -translate-x-full">
            <!-- Logo -->
            <div class="flex items-center justify-between h-16 px-6 border-b border-gray-200">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-br from-primary to-secondary rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"></path>
                        </svg>
                    </div>
                    <span class="font-bold text-gray-900">Admin</span>
                </div>
                <button id="close-sidebar" class="lg:hidden text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.pengajuan.index') }}" class="flex items-center px-4 py-3 text-sm font-medium text-white bg-gradient-to-r from-primary to-secondary rounded-lg">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Kelola Pengajuan
                </a>
            </nav>

            <!-- User Info -->
            <div class="border-t border-gray-200 p-4">
                <div class="flex items-center mb-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold">A</span>
                    </div>
                    <div class="ml-3 flex-1">
                        <p class="text-sm font-medium text-gray-900">Admin</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col lg:ml-64">
            <!-- Top Bar -->
            <header class="bg-white border-b border-gray-200 sticky top-0 z-40">
                <div class="flex items-center justify-between h-16 px-6">
                    <button id="open-sidebar" class="lg:hidden text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <h1 class="text-xl font-semibold text-gray-900">Kelola Pengajuan Surat</h1>
                    <div id="current-time" class="text-sm text-gray-600">
                        {{ now()->format('d M Y, H:i') }} WIB
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    showSuccessModal('{{ session('success') }}');
                });
            </script>
        @endif

        <!-- Quick Stats -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-4">
            <div class="bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-lg p-3 text-white shadow-lg hover:shadow-xl transition-all">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs opacity-90">Menunggu</p>
                        <p class="text-xl font-bold">{{ $pengajuan->where('status', 'Menunggu Verifikasi')->count() }}</p>
                    </div>
                    <div class="p-2 bg-white bg-opacity-20 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-br from-orange-400 to-orange-500 rounded-lg p-3 text-white shadow-lg hover:shadow-xl transition-all">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs opacity-90">Diproses</p>
                        <p class="text-xl font-bold">{{ $pengajuan->where('status', 'Diproses')->count() }}</p>
                    </div>
                    <div class="p-2 bg-white bg-opacity-20 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-br from-green-400 to-green-500 rounded-lg p-3 text-white shadow-lg hover:shadow-xl transition-all">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs opacity-90">Selesai</p>
                        <p class="text-xl font-bold">{{ $pengajuan->where('status', 'Selesai')->count() }}</p>
                    </div>
                    <div class="p-2 bg-white bg-opacity-20 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-br from-red-400 to-red-500 rounded-lg p-3 text-white shadow-lg hover:shadow-xl transition-all">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs opacity-90">Ditolak</p>
                        <p class="text-xl font-bold">{{ $pengajuan->where('status', 'Ditolak')->count() }}</p>
                    </div>
                    <div class="p-2 bg-white bg-opacity-20 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-4 border-b border-gray-100">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Daftar Pengajuan</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Kelola semua pengajuan surat</p>
                    </div>
                    <a href="{{ route('admin.pengajuan.create') }}" class="bg-gradient-to-r from-primary to-secondary hover:shadow-lg text-white font-medium py-2 px-4 rounded-lg transition-all duration-300 hover:scale-105 flex items-center text-sm">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah
                    </a>
                </div>
            </div>

            <!-- Filter dan Search -->
            <div class="p-4 border-b bg-gradient-to-r from-gray-50 to-white">
                <form method="GET" id="searchForm" class="flex flex-col sm:flex-row gap-2">
                    <div class="flex-1">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" name="search" id="searchInput" value="{{ request('search') }}" 
                                   placeholder="Cari nomor pengajuan, NIK, atau nama..." 
                                   class="w-full pl-9 pr-3 py-2 text-sm border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <select name="status" id="statusSelect" class="px-3 py-2 text-sm border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all bg-white">
                            <option value="">Semua Status</option>
                            <option value="Menunggu Verifikasi" {{ request('status') == 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu</option>
                            <option value="Diproses" {{ request('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                        <a href="{{ route('admin.pengajuan.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg transition-all duration-300 flex items-center text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        </a>
                    </div>
                </form>
            </div>

            <div class="overflow-x-auto" id="tableContainer">
                @if($pengajuan->count() > 0)
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Pengajuan</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pemohon</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Surat</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="tableBody">
                            @foreach($pengajuan as $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $item->nomor_pengajuan }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $item->penduduk->nama }}</div>
                                        <div class="text-xs text-gray-500">{{ $item->nik }}</div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                        {{ $item->jenis_surat }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-xs text-gray-500">
                                        {{ $item->created_at->format('d M Y H:i') }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($item->status == 'Selesai') bg-green-100 text-green-800
                                            @elseif($item->status == 'Diproses') bg-orange-100 text-orange-800
                                            @elseif($item->status == 'Ditolak') bg-red-100 text-red-800
                                            @else bg-yellow-100 text-yellow-800 @endif">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium space-x-1">
                                        <a href="{{ route('admin.pengajuan.show', $item->id) }}" 
                                           class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white text-xs px-2.5 py-1 rounded-lg transition-all duration-300 hover:scale-105">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Detail
                                        </a>
                                        <a href="{{ route('admin.pengajuan.edit', $item->id) }}" 
                                           class="inline-flex items-center bg-yellow-500 hover:bg-yellow-600 text-white text-xs px-2.5 py-1 rounded-lg transition-all duration-300 hover:scale-105">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Edit
                                        </a>
                                        <button onclick="showDeleteModal({{ $item->id }}, '{{ $item->jenis_surat }}')" 
                                                class="inline-flex items-center bg-red-500 hover:bg-red-600 text-white text-xs px-2.5 py-1 rounded-lg transition-all duration-300 hover:scale-105">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="px-4 py-3" id="paginationContainer">
                        {{ $pengajuan->appends(request()->query())->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada pengajuan</h3>
                        <p class="mt-1 text-sm text-gray-500">Belum ada pengajuan surat yang dibuat.</p>
                        <div class="mt-6">
                            <a href="{{ route('admin.pengajuan.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-primary-dark">
                                Tambah Pengajuan
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
            </main>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 transform transition-all duration-300 scale-95 opacity-0" id="successModalContent">
            <div class="bg-gradient-to-r from-primary to-secondary p-6 text-center rounded-t-2xl">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-1">Berhasil!</h3>
                <p class="text-green-100 text-sm">Operasi telah berhasil</p>
            </div>
            <div class="p-6">
                <p class="text-gray-700 text-center mb-6" id="successMessage"></p>
                <button onclick="hideSuccessModal()" class="w-full bg-gradient-to-r from-primary to-secondary hover:from-primary-dark hover:to-primary text-white font-medium py-3 px-4 rounded-lg transition duration-300 transform hover:scale-105">
                    OK
                </button>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 transform transition-all duration-300 scale-95 opacity-0" id="deleteModalContent">
            <div class="bg-gradient-to-r from-red-500 to-red-600 p-6 text-center rounded-t-2xl">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-1">Konfirmasi Hapus</h3>
                <p class="text-red-100 text-sm">Tindakan ini tidak dapat dibatalkan</p>
            </div>
            <div class="p-6">
                <p class="text-gray-700 text-center mb-2">Apakah Anda yakin ingin menghapus pengajuan:</p>
                <p class="text-gray-900 font-semibold text-center mb-6" id="deleteItemName"></p>
                <div class="flex space-x-3">
                    <button onclick="hideDeleteModal()" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-3 px-4 rounded-lg transition duration-300">
                        Batal
                    </button>
                    <form id="deleteForm" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-medium py-3 px-4 rounded-lg transition duration-300 transform hover:scale-105">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const openSidebar = document.getElementById('open-sidebar');
        const closeSidebar = document.getElementById('close-sidebar');

        openSidebar.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });

        // Success Modal Functions
        function showSuccessModal(message) {
            const modal = document.getElementById('successModal');
            const modalContent = document.getElementById('successModalContent');
            const successMessage = document.getElementById('successMessage');
            
            successMessage.textContent = message;
            
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function hideSuccessModal() {
            const modal = document.getElementById('successModal');
            const modalContent = document.getElementById('successModalContent');
            
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        // Delete Modal Functions
        function showDeleteModal(id, itemName) {
            const modal = document.getElementById('deleteModal');
            const modalContent = document.getElementById('deleteModalContent');
            const deleteForm = document.getElementById('deleteForm');
            const deleteItemName = document.getElementById('deleteItemName');
            
            deleteForm.action = `/admin/pengajuan/${id}`;
            deleteItemName.textContent = itemName;
            
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function hideDeleteModal() {
            const modal = document.getElementById('deleteModal');
            const modalContent = document.getElementById('deleteModalContent');
            
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        // Close modals when clicking outside
        document.getElementById('successModal').addEventListener('click', function(e) {
            if (e.target === this) {
                hideSuccessModal();
            }
        });

        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                hideDeleteModal();
            }
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

        // AJAX Live search
        const searchInput = document.getElementById('searchInput');
        const statusSelect = document.getElementById('statusSelect');
        const searchForm = document.getElementById('searchForm');
        const tableContainer = document.getElementById('tableContainer');
        let searchTimeout;
        let isLoading = false;

        function fetchData() {
            if (isLoading) return;
            isLoading = true;
            const formData = new FormData(searchForm);
            const params = new URLSearchParams(formData).toString();
            tableContainer.style.opacity = '0.5';
            
            fetch(`{{ route('admin.pengajuan.index') }}?${params}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'text/html' }
            })
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newTable = doc.getElementById('tableContainer');
                if (newTable) tableContainer.innerHTML = newTable.innerHTML;
                tableContainer.style.opacity = '1';
                isLoading = false;
            })
            .catch(() => {
                tableContainer.style.opacity = '1';
                isLoading = false;
            });
        }

        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => fetchData(), 500);
        });

        statusSelect.addEventListener('change', () => fetchData());
        searchForm.addEventListener('submit', (e) => { e.preventDefault(); fetchData(); });
    </script>
</body>
</html>