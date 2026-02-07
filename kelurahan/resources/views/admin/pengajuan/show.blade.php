<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengajuan - Admin E-Kelurahan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Admin E-Kelurahan</h1>
            <a href="{{ route('admin.pengajuan.index') }}" class="bg-gray-600 hover:bg-gray-700 px-3 py-1 rounded text-sm">
                Kembali ke Daftar
            </a>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Detail Pengajuan -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Detail Pengajuan</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Pengajuan</h3>
                            <div class="space-y-3">
                                <div>
                                    <span class="font-medium text-gray-700">Nomor Pengajuan:</span>
                                    <p class="text-gray-600">{{ $pengajuan->nomor_pengajuan }}</p>
                                </div>
                                <div>
                                    <span class="font-medium text-gray-700">Jenis Surat:</span>
                                    <p class="text-gray-600">{{ $pengajuan->jenis_surat }}</p>
                                </div>
                                <div>
                                    <span class="font-medium text-gray-700">Tanggal Pengajuan:</span>
                                    <p class="text-gray-600">{{ $pengajuan->created_at->format('d M Y H:i') }}</p>
                                </div>
                                <div>
                                    <span class="font-medium text-gray-700">Status:</span>
                                    <span class="px-2 py-1 text-xs rounded-full 
                                        @if($pengajuan->status == 'Selesai') bg-green-100 text-green-800
                                        @elseif($pengajuan->status == 'Diproses') bg-orange-100 text-orange-800
                                        @elseif($pengajuan->status == 'Ditolak') bg-red-100 text-red-800
                                        @else bg-yellow-100 text-yellow-800 @endif">
                                        {{ $pengajuan->status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Data Pemohon</h3>
                            <div class="space-y-3">
                                <div>
                                    <span class="font-medium text-gray-700">NIK:</span>
                                    <p class="text-gray-600">{{ $pengajuan->penduduk->nik }}</p>
                                </div>
                                <div>
                                    <span class="font-medium text-gray-700">Nama:</span>
                                    <p class="text-gray-600">{{ $pengajuan->penduduk->nama }}</p>
                                </div>
                                <div>
                                    <span class="font-medium text-gray-700">Alamat:</span>
                                    <p class="text-gray-600">{{ $pengajuan->penduduk->alamat }}</p>
                                </div>
                                <div>
                                    <span class="font-medium text-gray-700">RT/RW:</span>
                                    <p class="text-gray-600">{{ $pengajuan->penduduk->rt }}/{{ $pengajuan->penduduk->rw }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Keperluan</h3>
                        <p class="text-gray-600 bg-gray-50 p-4 rounded">{{ $pengajuan->keperluan }}</p>
                    </div>
                    
                    @if($pengajuan->berkas_pendukung)
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Berkas Pendukung</h3>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach($pengajuan->berkas_pendukung as $berkas)
                                    <div class="border rounded p-3">
                                        <a href="{{ Storage::url($berkas) }}" target="_blank" 
                                           class="text-blue-500 hover:text-blue-700 text-sm">
                                            📎 {{ basename($berkas) }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                    @if($pengajuan->catatan_admin)
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Catatan Admin</h3>
                            <p class="text-gray-600 bg-yellow-50 p-4 rounded border border-yellow-200">{{ $pengajuan->catatan_admin }}</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Form Update Status -->
            <div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Update Status</h3>
                    
                    <form method="POST" action="{{ route('admin.pengajuan.updateStatus', $pengajuan->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                            <select id="status" name="status" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                    required>
                                <option value="Menunggu Verifikasi" {{ $pengajuan->status == 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                                <option value="Diproses" {{ $pengajuan->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="Selesai" {{ $pengajuan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="Ditolak" {{ $pengajuan->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="catatan_admin" class="block text-gray-700 text-sm font-bold mb-2">Catatan</label>
                            <textarea id="catatan_admin" name="catatan_admin" rows="3" 
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                      placeholder="Catatan untuk pemohon...">{{ $pengajuan->catatan_admin }}</textarea>
                        </div>
                        
                        <div class="mb-6" id="file-upload" style="display: {{ $pengajuan->status == 'Selesai' ? 'block' : 'none' }}">
                            <label for="file_surat" class="block text-gray-700 text-sm font-bold mb-2">Upload Surat (PDF)</label>
                            <input type="file" id="file_surat" name="file_surat" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                   accept=".pdf">
                            <p class="text-xs text-gray-500 mt-1">Upload file surat yang sudah ditandatangani (PDF, max 5MB)</p>
                            @if($pengajuan->file_surat)
                                <p class="text-xs text-green-600 mt-1">File saat ini: {{ basename($pengajuan->file_surat) }}</p>
                            @endif
                        </div>
                        
                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                            Update Status
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.getElementById('status').addEventListener('change', function() {
            const fileUpload = document.getElementById('file-upload');
            if (this.value === 'Selesai') {
                fileUpload.style.display = 'block';
            } else {
                fileUpload.style.display = 'none';
            }
        });
    </script>
</body>
</html>