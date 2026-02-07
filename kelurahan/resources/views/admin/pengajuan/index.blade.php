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
    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-primary to-secondary shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo and Brand -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"></path>
                            </svg>
                        </div>
                        <div class="text-white">
                            <span class="font-bold text-lg">Admin E-Kelurahan</span>
                        </div>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('admin.dashboard') }}" class="nav-item text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium hover:bg-white hover:bg-opacity-10">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.pengajuan.index') }}" class="nav-item text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium bg-white bg-opacity-20">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Kelola Pengajuan
                    </a>
                </div>

                <!-- User Info and Time -->
                <div class="flex items-center space-x-4">
                    <div id="current-time" class="hidden sm:block text-sm text-green-100">
                        {{ now()->format('d M Y, H:i') }} WIB
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center hover:bg-gray-50 transition-colors">
                            <span class="text-primary font-semibold text-sm">A</span>
                        </div>
                        <div class="hidden sm:block text-white">
                            <p class="text-sm font-medium">Admin</p>
                            <p class="text-xs text-green-100">Administrator</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-white hover:text-red-200 p-2 rounded-md hover:bg-white hover:bg-opacity-10">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                        </button>
                    </form>
                    <!-- Mobile menu button -->
                    <button id="mobile-menu-btn" class="md:hidden text-white hover:text-green-200 p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="md:hidden hidden bg-primary-dark">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="nav-item block text-white hover:text-green-200 px-3 py-2 rounded-md text-base font-medium hover:bg-white hover:bg-opacity-10">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.pengajuan.index') }}" class="nav-item block text-white hover:text-green-200 px-3 py-2 rounded-md text-base font-medium bg-white bg-opacity-20">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Kelola Pengajuan
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Kelola Pengajuan Surat</h1>
            <p class="text-gray-600 mt-2">Kelola semua pengajuan surat dari penduduk</p>
        </div>

        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    showSuccessModal('{{ session('success') }}');
                });
            </script>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900">Daftar Pengajuan</h3>
                    <a href="{{ route('admin.pengajuan.create') }}" class="bg-primary hover:bg-primary-dark text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                        Tambah Pengajuan
                    </a>
                </div>
            </div>

            <!-- Filter dan Search -->
            <div class="p-6 border-b bg-gray-50">
                <form method="GET" class="flex flex-wrap gap-4">
                    <div class="flex-1 min-w-64">
                        <input type="text" name="search" value="{{ request('search') }}" 
                               placeholder="Cari nomor pengajuan, NIK, atau nama..." 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <select name="status" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                            <option value="">Semua Status</option>
                            <option value="Menunggu Verifikasi" {{ request('status') == 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                            <option value="Diproses" {{ request('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                        Filter
                    </button>
                    <a href="{{ route('admin.pengajuan.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                        Reset
                    </a>
                </form>
            </div>

            <div class="overflow-x-auto">
                @if($pengajuan->count() > 0)
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Pengajuan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pemohon</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Surat</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($pengajuan as $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $item->nomor_pengajuan }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $item->penduduk->nama }}</div>
                                        <div class="text-sm text-gray-500">{{ $item->nik }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $item->jenis_surat }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $item->created_at->format('d M Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($item->status == 'Selesai') bg-green-100 text-green-800
                                            @elseif($item->status == 'Diproses') bg-orange-100 text-orange-800
                                            @elseif($item->status == 'Ditolak') bg-red-100 text-red-800
                                            @else bg-yellow-100 text-yellow-800 @endif">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                        <a href="{{ route('admin.pengajuan.show', $item->id) }}" 
                                           class="bg-blue-500 hover:bg-blue-700 text-white text-xs px-3 py-1 rounded transition duration-300">Detail</a>
                                        <a href="{{ route('admin.pengajuan.edit', $item->id) }}" 
                                           class="bg-yellow-500 hover:bg-yellow-700 text-white text-xs px-3 py-1 rounded transition duration-300">Edit</a>
                                        <button onclick="showDeleteModal({{ $item->id }}, '{{ $item->jenis_surat }}')" 
                                                class="bg-red-500 hover:bg-red-700 text-white text-xs px-3 py-1 rounded transition duration-300">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="px-6 py-4">
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
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
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
    </script>
</body>
</html>