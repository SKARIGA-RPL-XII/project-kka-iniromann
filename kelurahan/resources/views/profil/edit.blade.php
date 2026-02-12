<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profil - E-Kelurahan</title>
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
                            <span class="font-bold text-lg">E-Kelurahan</span>
                        </div>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('dashboard') }}" class="nav-item text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium hover:bg-white hover:bg-opacity-10">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('pengajuan.create') }}" class="nav-item text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium hover:bg-white hover:bg-opacity-10">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Ajukan Surat
                    </a>
                    <a href="{{ route('pengajuan.index') }}" class="nav-item text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium hover:bg-white hover:bg-opacity-10">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Riwayat
                    </a>
                </div>

                <!-- User Info and Time -->
                <div class="flex items-center space-x-4">
                    <div id="current-time" class="hidden sm:block text-sm text-green-100">
                        {{ now()->format('d M Y, H:i') }} WIB
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('profil.show') }}" class="w-8 h-8 bg-white rounded-full flex items-center justify-center hover:bg-gray-50 transition-colors">
                            <span class="text-primary font-semibold text-sm">{{ substr($penduduk->nama, 0, 1) }}</span>
                        </a>
                        <div class="hidden sm:block text-white">
                            <p class="text-sm font-medium">{{ $penduduk->nama }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
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
                <a href="{{ route('dashboard') }}" class="nav-item block text-white hover:text-green-200 px-3 py-2 rounded-md text-base font-medium hover:bg-white hover:bg-opacity-10">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('pengajuan.create') }}" class="nav-item block text-white hover:text-green-200 px-3 py-2 rounded-md text-base font-medium hover:bg-white hover:bg-opacity-10">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Ajukan Surat
                </a>
                <a href="{{ route('pengajuan.index') }}" class="nav-item block text-white hover:text-green-200 px-3 py-2 rounded-md text-base font-medium hover:bg-white hover:bg-opacity-10">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Riwayat Pengajuan
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex items-center mb-4">
                <a href="{{ route('profil.show') }}" class="text-primary hover:text-primary-dark mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Update Profil</h1>
                    <p class="text-gray-600 mt-1">Perbarui informasi kontak dan password Anda</p>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-lg mb-6">
                <div class="flex">
                    <svg class="w-5 h-5 text-red-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        @foreach ($errors->all() as $error)
                            <p class="text-sm text-red-700">{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- Info Alert -->
        <div class="mb-6 bg-blue-50 border-l-4 border-blue-400 p-4 rounded-lg">
            <div class="flex">
                <svg class="w-5 h-5 text-blue-400 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <p class="text-sm font-medium text-blue-800">Lengkapi Profil Anda</p>
                    <p class="text-sm text-blue-700 mt-1">Silakan lengkapi data profil Anda untuk memudahkan proses pengajuan surat.</p>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('profil.update') }}">
            @csrf
            @method('PUT')

            <!-- Personal Information Card -->
            <div class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 p-6 mb-6">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Data Pribadi</h2>
                        <p class="text-sm text-gray-600">Informasi identitas diri</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-2">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}" 
                               class="w-full px-3 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                               placeholder="{{ $penduduk->tempat_lahir ?: 'Contoh: Malang' }}">
                    </div>

                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                        <div class="grid grid-cols-3 gap-2">
                            <select id="tgl_lahir" name="tgl_lahir" class="px-3 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                                <option value="">Tgl</option>
                                @for($i = 1; $i <= 31; $i++)
                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{ old('tgl_lahir', $penduduk->tanggal_lahir ? date('d', strtotime($penduduk->tanggal_lahir)) : '') == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                            <select id="bln_lahir" name="bln_lahir" class="px-3 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                                <option value="">Bulan</option>
                                @php
                                    $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                @endphp
                                @foreach($bulan as $key => $value)
                                    <option value="{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}" {{ old('bln_lahir', $penduduk->tanggal_lahir ? date('m', strtotime($penduduk->tanggal_lahir)) : '') == str_pad($key + 1, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <select id="thn_lahir" name="thn_lahir" class="px-3 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                                <option value="">Tahun</option>
                                @for($i = date('Y'); $i >= date('Y') - 100; $i--)
                                    <option value="{{ $i }}" {{ old('thn_lahir', $penduduk->tanggal_lahir ? date('Y', strtotime($penduduk->tanggal_lahir)) : '') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <input type="hidden" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir) }}">
                    </div>

                    <div>
                        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" 
                                class="w-full px-3 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                            <option value="">{{ $penduduk->jenis_kelamin ? ($penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan') : 'Pilih Jenis Kelamin' }}</option>
                            <option value="L" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label for="no_kk" class="block text-sm font-medium text-gray-700 mb-2">No. KK <span class="text-xs text-gray-500">(16 digit)</span></label>
                        <input type="text" id="no_kk" name="no_kk" value="{{ old('no_kk', $penduduk->no_kk != '0000000000000000' && $penduduk->no_kk != '000' ? $penduduk->no_kk : '') }}" 
                               class="w-full px-3 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                               placeholder="Contoh: 3573010101010001" maxlength="16" pattern="[0-9]{16}">
                        <p class="text-xs text-gray-500 mt-1">Masukkan 16 digit angka</p>
                    </div>
                </div>
            </div>

            <!-- Address Information Card -->
            <div class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 p-6 mb-6">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Alamat</h2>
                        <p class="text-sm text-gray-600">Informasi tempat tinggal</p>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                    <textarea id="alamat" name="alamat" rows="3" 
                              class="w-full px-3 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                              placeholder="{{ $penduduk->alamat ?: 'Contoh: Jl. Soekarno Hatta No. 123' }}">{{ old('alamat', $penduduk->alamat) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="rt" class="block text-sm font-medium text-gray-700 mb-2">RT</label>
                        <input type="text" id="rt" name="rt" value="{{ old('rt', $penduduk->rt) }}" 
                               class="w-full px-3 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                               placeholder="{{ $penduduk->rt ?: 'Contoh: 001' }}">
                    </div>

                    <div>
                        <label for="rw" class="block text-sm font-medium text-gray-700 mb-2">RW</label>
                        <input type="text" id="rw" name="rw" value="{{ old('rw', $penduduk->rw) }}" 
                               class="w-full px-3 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                               placeholder="{{ $penduduk->rw ?: 'Contoh: 002' }}">
                    </div>

                    <div>
                        <label for="kecamatan" class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                        <input type="text" id="kecamatan" name="kecamatan" value="{{ old('kecamatan', $penduduk->kecamatan) }}" 
                               class="w-full px-3 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                               placeholder="{{ $penduduk->kecamatan ?: 'Contoh: Lowokwaru' }}">
                    </div>

                    <div>
                        <label for="kelurahan" class="block text-sm font-medium text-gray-700 mb-2">Kelurahan</label>
                        <input type="text" id="kelurahan" name="kelurahan" value="{{ old('kelurahan', $penduduk->kelurahan) }}" 
                               class="w-full px-3 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                               placeholder="{{ $penduduk->kelurahan ?: 'Contoh: Jatimulyo' }}">
                    </div>

                    <div>
                        <label for="kabupaten" class="block text-sm font-medium text-gray-700 mb-2">Kabupaten/Kota</label>
                        <input type="text" id="kabupaten" name="kabupaten" value="{{ old('kabupaten', $penduduk->kabupaten) }}" 
                               class="w-full px-3 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                               placeholder="{{ $penduduk->kabupaten ?: 'Contoh: Kota Malang' }}">
                    </div>

                    <div class="md:col-span-2">
                        <label for="provinsi" class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                        <input type="text" id="provinsi" name="provinsi" value="{{ old('provinsi', $penduduk->provinsi) }}" 
                               class="w-full px-3 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                               placeholder="{{ $penduduk->provinsi ?: 'Contoh: Jawa Timur' }}">
                    </div>
                </div>
            </div>

            <!-- Additional Information Card -->
            <div class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 p-6 mb-6">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Informasi Tambahan</h2>
                        <p class="text-sm text-gray-600">Data pelengkap profil</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="agama" class="block text-sm font-medium text-gray-700 mb-2">Agama</label>
                        <select id="agama" name="agama" 
                                class="w-full px-3 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                            <option value="">{{ $penduduk->agama ?: 'Pilih Agama' }}</option>
                            <option value="Islam" {{ old('agama', $penduduk->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Kristen" {{ old('agama', $penduduk->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            <option value="Katolik" {{ old('agama', $penduduk->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="Hindu" {{ old('agama', $penduduk->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Buddha" {{ old('agama', $penduduk->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option value="Konghucu" {{ old('agama', $penduduk->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        </select>
                    </div>

                    <div>
                        <label for="status_perkawinan" class="block text-sm font-medium text-gray-700 mb-2">Status Perkawinan</label>
                        <select id="status_perkawinan" name="status_perkawinan" 
                                class="w-full px-3 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                            <option value="">{{ $penduduk->status_perkawinan ?: 'Pilih Status' }}</option>
                            <option value="Belum Kawin" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                            <option value="Kawin" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                            <option value="Cerai Hidup" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                            <option value="Cerai Mati" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label for="pekerjaan" class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan</label>
                        <input type="text" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}" 
                               class="w-full px-3 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                               placeholder="{{ $penduduk->pekerjaan ?: 'Contoh: Pegawai Swasta' }}">
                    </div>
                </div>
            </div>

            <!-- Contact Information Card -->
            <div class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 p-6 mb-6">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Informasi Kontak</h2>
                        <p class="text-sm text-gray-600">Update nomor telepon dan email Anda</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="telepon" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <input type="text" id="telepon" name="telepon" value="{{ old('telepon', $penduduk->telepon) }}" 
                                   class="w-full pl-10 pr-4 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all" 
                                   placeholder="08123456789">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                            <input type="email" id="email" name="email" value="{{ old('email', $penduduk->email) }}" 
                                   class="w-full pl-10 pr-4 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all" 
                                   placeholder="contoh@email.com">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Password Card -->
            <div class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 p-6 mb-6">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Ubah Password</h2>
                        <p class="text-sm text-gray-600">Kosongkan jika tidak ingin mengubah password</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                                </svg>
                            </div>
                            <input type="password" id="password" name="password" 
                                   class="w-full pl-10 pr-4 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all" 
                                   placeholder="Minimal 6 karakter">
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <input type="password" id="password_confirmation" name="password_confirmation" 
                                   class="w-full pl-10 pr-4 py-3 border-[3px] border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all" 
                                   placeholder="Ulangi password baru">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-end gap-4">
                <a href="{{ route('profil.show') }}" class="px-8 py-3 border-2 border-gray-300 rounded-xl text-gray-700 font-semibold hover:bg-gray-50 hover:scale-105 transition-all text-center">
                    Batal
                </a>
                <button type="submit" class="px-8 py-3 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-semibold hover:shadow-lg hover:scale-105 transition-all">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <script>
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
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

        // Combine date fields into tanggal_lahir
        function updateTanggalLahir() {
            const tgl = document.getElementById('tgl_lahir').value;
            const bln = document.getElementById('bln_lahir').value;
            const thn = document.getElementById('thn_lahir').value;
            
            if (tgl && bln && thn) {
                document.getElementById('tanggal_lahir').value = `${thn}-${bln}-${tgl}`;
            }
        }

        document.getElementById('tgl_lahir').addEventListener('change', updateTanggalLahir);
        document.getElementById('bln_lahir').addEventListener('change', updateTanggalLahir);
        document.getElementById('thn_lahir').addEventListener('change', updateTanggalLahir);

        // Format No. KK - only allow numbers and max 16 digits
        document.getElementById('no_kk').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16);
        });
    </script>
</body>
</html>
