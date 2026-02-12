<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengajuan - Admin E-Kelurahan</title>
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
                    <h1 class="text-xl font-semibold text-gray-900">Edit Pengajuan Surat</h1>
                    <div class="text-sm text-gray-600">{{ $pengajuan->nomor_pengajuan }}</div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-6">
        <!-- Header Card -->
        <div class="bg-gradient-to-r from-primary to-secondary rounded-xl shadow-lg p-6 mb-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold mb-2">Edit Pengajuan Surat</h2>
                    <p class="text-green-100">{{ $pengajuan->nomor_pengajuan }}</p>
                </div>
                <a href="{{ route('admin.pengajuan.index') }}" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-4 py-2 rounded-lg transition-all flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.pengajuan.update', $pengajuan->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Data Pengajuan Section -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Data Pengajuan</h3>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nik" class="block text-sm font-medium text-gray-700 mb-2">Penduduk</label>
                        <select id="nik" name="nik" class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary" required>
                            <option value="">Pilih Penduduk</option>
                            @foreach($penduduk as $p)
                                <option value="{{ $p->nik }}" {{ old('nik', $pengajuan->nik) == $p->nik ? 'selected' : '' }}>
                                    {{ $p->nama }} - {{ $p->nik }}
                                </option>
                            @endforeach
                        </select>
                        @error('nik')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="jenis_surat" class="block text-sm font-medium text-gray-700 mb-2">Jenis Surat</label>
                        <select id="jenis_surat" name="jenis_surat" class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary" required>
                            <option value="">Pilih Jenis Surat</option>
                            <option value="SKTM" {{ old('jenis_surat', $pengajuan->jenis_surat) == 'SKTM' ? 'selected' : '' }}>Surat Keterangan Tidak Mampu (SKTM)</option>
                            <option value="Domisili" {{ old('jenis_surat', $pengajuan->jenis_surat) == 'Domisili' ? 'selected' : '' }}>Surat Keterangan Domisili</option>
                            <option value="SKU" {{ old('jenis_surat', $pengajuan->jenis_surat) == 'SKU' ? 'selected' : '' }}>Surat Keterangan Usaha (SKU)</option>
                            <option value="Keterangan Usaha" {{ old('jenis_surat', $pengajuan->jenis_surat) == 'Keterangan Usaha' ? 'selected' : '' }}>Surat Keterangan Usaha</option>
                            <option value="Keterangan Tidak Mampu" {{ old('jenis_surat', $pengajuan->jenis_surat) == 'Keterangan Tidak Mampu' ? 'selected' : '' }}>Surat Keterangan Tidak Mampu</option>
                        </select>
                        @error('jenis_surat')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select id="status" name="status" class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary" required>
                            <option value="Menunggu Verifikasi" {{ old('status', $pengajuan->status) == 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                            <option value="Diproses" {{ old('status', $pengajuan->status) == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="Selesai" {{ old('status', $pengajuan->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="Ditolak" {{ old('status', $pengajuan->status) == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="berkas" class="block text-sm font-medium text-gray-700 mb-2">Berkas Pendukung (Opsional)</label>
                        <input type="file" id="berkas" name="berkas[]" multiple accept=".jpg,.jpeg,.png,.pdf" 
                               class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                        <p class="text-xs text-gray-500 mt-1">Format: JPG, JPEG, PNG, PDF. Maksimal 2MB per file. Kosongkan jika tidak ingin mengubah berkas.</p>
                        @error('berkas.*')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Keperluan Section -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Keperluan & Catatan</h3>
                    </div>
                
                <div class="mb-6">
                    <label for="keperluan" class="block text-sm font-medium text-gray-700 mb-2">Keperluan</label>
                    <textarea id="keperluan" name="keperluan" rows="4" 
                              class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary" 
                              placeholder="Jelaskan keperluan pengajuan surat ini..." required>{{ old('keperluan', $pengajuan->keperluan) }}</textarea>
                    @error('keperluan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mt-6">
                    <label for="catatan_admin" class="block text-sm font-medium text-gray-700 mb-2">Catatan Admin</label>
                    <textarea id="catatan_admin" name="catatan_admin" rows="3" 
                              class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary" 
                              placeholder="Catatan untuk pengajuan ini...">{{ old('catatan_admin', $pengajuan->catatan_admin) }}</textarea>
                    @error('catatan_admin')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                </div>

                <!-- Berkas Section -->
                @if($pengajuan->berkas_pendukung)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-full flex items-center justify-center text-white mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Berkas Saat Ini</h3>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Berkas Saat Ini</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach($pengajuan->berkas_pendukung as $berkas)
                                <div class="border rounded-lg p-3 text-center">
                                    <svg class="w-8 h-8 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <p class="text-xs text-gray-600">{{ basename($berkas) }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                
                <!-- File Surat Section -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6" id="file-surat-section" style="{{ old('status', $pengajuan->status) == 'Selesai' ? 'display: block;' : 'display: none;' }}">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center text-white mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Upload File Surat</h3>
                    </div>
                    
                    <div>
                        <label for="file_surat" class="block text-sm font-medium text-gray-700 mb-2">File Surat (PDF)</label>
                    <input type="file" id="file_surat" name="file_surat" accept=".pdf" 
                           class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                    <p class="text-xs text-gray-500 mt-1">Upload file surat jika status Selesai. Format: PDF, Maksimal 5MB.</p>
                    @if($pengajuan->file_surat)
                        <div class="mt-3 p-3 bg-green-50 rounded-lg border border-green-200">
                            <p class="text-sm text-green-700 font-medium">✓ File saat ini: {{ basename($pengajuan->file_surat) }}</p>
                        </div>
                    @endif
                    @error('file_surat')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('admin.pengajuan.index') }}" class="px-6 py-2.5 border-2 border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition-all">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-primary to-secondary text-white rounded-lg font-medium hover:shadow-lg transition-all hover:scale-105">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Perbarui Pengajuan
                    </button>
                </div>
            </form>
            </main>
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
            const timeElement = document.querySelector('.text-sm.text-gray-600');
            if(timeElement) timeElement.textContent = timeString;
        }

        updateClock();
        setInterval(updateClock, 1000);

        // Show/hide file surat section based on status
        document.getElementById('status').addEventListener('change', function() {
            const fileSuratSection = document.getElementById('file-surat-section');
            if (this.value === 'Selesai') {
                fileSuratSection.style.display = 'block';
            } else {
                fileSuratSection.style.display = 'none';
            }
        });
    </script>
</body>
</html>