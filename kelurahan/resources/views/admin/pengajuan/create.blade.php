<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengajuan - Admin E-Kelurahan</title>
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
    <nav class="bg-gradient-to-r from-primary to-secondary shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
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

                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium">
                        Dashboard
                    </a>
                    <a href="{{ route('admin.pengajuan.index') }}" class="text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium bg-white bg-opacity-20">
                        Pengajuan
                    </a>
                    <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-white hover:text-red-200 p-2 rounded-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Tambah Pengajuan Surat</h1>
            <p class="text-gray-600 mt-2">Buat pengajuan surat baru untuk penduduk</p>
        </div>

        <div class="bg-white rounded-lg shadow-sm border">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900">Form Tambah Pengajuan</h3>
            </div>
            
            <form method="POST" action="{{ route('admin.pengajuan.store') }}" enctype="multipart/form-data" class="p-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nik" class="block text-sm font-medium text-gray-700 mb-2">Penduduk</label>
                        <select id="nik" name="nik" class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary" required>
                            <option value="">Pilih Penduduk</option>
                            @foreach($penduduk as $p)
                                <option value="{{ $p->nik }}" {{ old('nik') == $p->nik ? 'selected' : '' }}>
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
                            <option value="SKTM" {{ old('jenis_surat') == 'SKTM' ? 'selected' : '' }}>Surat Keterangan Tidak Mampu (SKTM)</option>
                            <option value="Domisili" {{ old('jenis_surat') == 'Domisili' ? 'selected' : '' }}>Surat Keterangan Domisili</option>
                            <option value="SKU" {{ old('jenis_surat') == 'SKU' ? 'selected' : '' }}>Surat Keterangan Usaha (SKU)</option>
                            <option value="Keterangan Usaha" {{ old('jenis_surat') == 'Keterangan Usaha' ? 'selected' : '' }}>Surat Keterangan Usaha</option>
                            <option value="Keterangan Tidak Mampu" {{ old('jenis_surat') == 'Keterangan Tidak Mampu' ? 'selected' : '' }}>Surat Keterangan Tidak Mampu</option>
                        </select>
                        @error('jenis_surat')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select id="status" name="status" class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary" required>
                            <option value="Menunggu Verifikasi" {{ old('status') == 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                            <option value="Diproses" {{ old('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="Ditolak" {{ old('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="berkas" class="block text-sm font-medium text-gray-700 mb-2">Berkas Pendukung</label>
                        <input type="file" id="berkas" name="berkas[]" multiple accept=".jpg,.jpeg,.png,.pdf" 
                               class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                        <p class="text-xs text-gray-500 mt-1">Format: JPG, JPEG, PNG, PDF. Maksimal 2MB per file.</p>
                        @error('berkas.*')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-6">
                    <label for="keperluan" class="block text-sm font-medium text-gray-700 mb-2">Keperluan</label>
                    <textarea id="keperluan" name="keperluan" rows="4" 
                              class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary" 
                              placeholder="Jelaskan keperluan pengajuan surat ini..." required>{{ old('keperluan') }}</textarea>
                    @error('keperluan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mt-6">
                    <label for="catatan_admin" class="block text-sm font-medium text-gray-700 mb-2">Catatan Admin</label>
                    <textarea id="catatan_admin" name="catatan_admin" rows="3" 
                              class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary" 
                              placeholder="Catatan untuk pengajuan ini...">{{ old('catatan_admin') }}</textarea>
                    @error('catatan_admin')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mt-6" id="file-surat-section" style="display: none;">
                    <label for="file_surat" class="block text-sm font-medium text-gray-700 mb-2">File Surat (PDF)</label>
                    <input type="file" id="file_surat" name="file_surat" accept=".pdf" 
                           class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                    <p class="text-xs text-gray-500 mt-1">Upload file surat jika status Selesai. Format: PDF, Maksimal 5MB.</p>
                    @error('file_surat')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex justify-end space-x-4 mt-8">
                    <a href="{{ route('admin.pengajuan.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors">
                        Simpan Pengajuan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Show/hide file surat section based on status
        document.getElementById('status').addEventListener('change', function() {
            const fileSuratSection = document.getElementById('file-surat-section');
            if (this.value === 'Selesai') {
                fileSuratSection.style.display = 'block';
            } else {
                fileSuratSection.style.display = 'none';
            }
        });
        
        // Check initial status
        if (document.getElementById('status').value === 'Selesai') {
            document.getElementById('file-surat-section').style.display = 'block';
        }
    </script>
</body>
</html>