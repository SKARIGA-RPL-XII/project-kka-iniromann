<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - E-Kelurahan</title>
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
                    <a href="{{ route('pengajuan.index') }}" class="px-3 py-2 text-sm text-gray-600 hover:text-primary border-b-2 border-transparent hover:border-primary transition-colors">Riwayat</a>
                    <a href="{{ route('profil.show') }}" class="px-3 py-2 text-sm font-medium text-primary border-b-2 border-primary">Profil Saya</a>
                </div>
                <div class="flex items-center gap-3">
                    <div class="hidden sm:flex items-center gap-2">
                        <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                            <span class="text-primary font-bold text-sm">{{ substr($penduduk->nama, 0, 1) }}</span>
                        </div>
                        <span class="text-sm text-gray-700 font-medium">{{ explode(' ', $penduduk->nama)[0] }}</span>
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
            <a href="{{ route('pengajuan.index') }}" class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded">Riwayat</a>
            <a href="{{ route('profil.show') }}" class="block px-3 py-2 text-sm font-medium text-primary bg-primary/5 rounded">Profil Saya</a>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 py-8">

        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('profil.show') }}" class="text-gray-400 hover:text-primary">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h1 class="text-xl font-bold text-gray-800">Edit Profil</h1>
                <p class="text-sm text-gray-500">Perbarui informasi data diri Anda</p>
            </div>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3 rounded-lg mb-5">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="bg-blue-50 border-l-4 border-blue-400 px-4 py-3 rounded-r-lg mb-5">
            <p class="text-sm text-blue-700">Lengkapi data profil Anda untuk memudahkan proses pengajuan surat.</p>
        </div>

        <form method="POST" action="{{ route('profil.update') }}">
            @csrf
            @method('PUT')

            <!-- Data Pribadi -->
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden mb-4">
                <div class="px-5 py-3.5 border-b border-gray-100 bg-gray-50">
                    <h3 class="text-sm font-semibold text-gray-700">Data Pribadi</h3>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}"
                               class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                               placeholder="Contoh: Malang">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Tanggal Lahir</label>
                        <div class="grid grid-cols-3 gap-2">
                            <select name="tgl_lahir" id="tgl_lahir" class="px-2 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none">
                                <option value="">Tgl</option>
                                @for($i = 1; $i <= 31; $i++)
                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{ old('tgl_lahir', $penduduk->tanggal_lahir ? date('d', strtotime($penduduk->tanggal_lahir)) : '') == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                            <select name="bln_lahir" id="bln_lahir" class="px-2 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none">
                                <option value="">Bulan</option>
                                @php $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']; @endphp
                                @foreach($bulan as $k => $v)
                                    <option value="{{ str_pad($k+1, 2, '0', STR_PAD_LEFT) }}" {{ old('bln_lahir', $penduduk->tanggal_lahir ? date('m', strtotime($penduduk->tanggal_lahir)) : '') == str_pad($k+1, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>{{ $v }}</option>
                                @endforeach
                            </select>
                            <select name="thn_lahir" id="thn_lahir" class="px-2 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none">
                                <option value="">Tahun</option>
                                @for($i = date('Y'); $i >= date('Y')-100; $i--)
                                    <option value="{{ $i }}" {{ old('thn_lahir', $penduduk->tanggal_lahir ? date('Y', strtotime($penduduk->tanggal_lahir)) : '') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <input type="hidden" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir) }}">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none">
                            <option value="">Pilih</option>
                            <option value="L" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">No. KK <span class="text-gray-400">(16 digit)</span></label>
                        <input type="text" id="no_kk" name="no_kk" value="{{ old('no_kk', $penduduk->no_kk != '0000000000000000' ? $penduduk->no_kk : '') }}"
                               class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                               placeholder="3573010101010001" maxlength="16">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Agama</label>
                        <select name="agama" class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none">
                            <option value="">Pilih</option>
                            @foreach(['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $ag)
                                <option value="{{ $ag }}" {{ old('agama', $penduduk->agama) == $ag ? 'selected' : '' }}>{{ $ag }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Status Perkawinan</label>
                        <select name="status_perkawinan" class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none">
                            <option value="">Pilih</option>
                            @foreach(['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'] as $st)
                                <option value="{{ $st }}" {{ old('status_perkawinan', $penduduk->status_perkawinan) == $st ? 'selected' : '' }}>{{ $st }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Pekerjaan</label>
                        <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}"
                               class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                               placeholder="Contoh: Pegawai Swasta">
                    </div>
                </div>
            </div>

            <!-- Alamat -->
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden mb-4">
                <div class="px-5 py-3.5 border-b border-gray-100 bg-gray-50">
                    <h3 class="text-sm font-semibold text-gray-700">Alamat</h3>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Alamat Lengkap</label>
                        <textarea name="alamat" rows="3"
                                  class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                                  placeholder="Jl. Soekarno Hatta No. 123">{{ old('alamat', $penduduk->alamat) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">RT</label>
                        <input type="text" name="rt" value="{{ old('rt', $penduduk->rt) }}"
                               class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                               placeholder="001">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">RW</label>
                        <input type="text" name="rw" value="{{ old('rw', $penduduk->rw) }}"
                               class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                               placeholder="002">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Kelurahan</label>
                        <input type="text" name="kelurahan" value="{{ old('kelurahan', $penduduk->kelurahan) }}"
                               class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                               placeholder="Jatimulyo">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Kecamatan</label>
                        <input type="text" name="kecamatan" value="{{ old('kecamatan', $penduduk->kecamatan) }}"
                               class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                               placeholder="Lowokwaru">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Kabupaten/Kota</label>
                        <input type="text" name="kabupaten" value="{{ old('kabupaten', $penduduk->kabupaten) }}"
                               class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                               placeholder="Kota Malang">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Provinsi</label>
                        <input type="text" name="provinsi" value="{{ old('provinsi', $penduduk->provinsi) }}"
                               class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                               placeholder="Jawa Timur">
                    </div>
                </div>
            </div>

            <!-- Kontak -->
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden mb-4">
                <div class="px-5 py-3.5 border-b border-gray-100 bg-gray-50">
                    <h3 class="text-sm font-semibold text-gray-700">Informasi Kontak</h3>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Nomor Telepon</label>
                        <input type="text" name="telepon" value="{{ old('telepon', $penduduk->telepon) }}"
                               class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                               placeholder="08123456789">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Email</label>
                        <input type="email" name="email" value="{{ old('email', $penduduk->email) }}"
                               class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                               placeholder="contoh@gmail.com">
                    </div>
                </div>
            </div>

            <!-- Password -->
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden mb-6">
                <div class="px-5 py-3.5 border-b border-gray-100 bg-gray-50">
                    <h3 class="text-sm font-semibold text-gray-700">Ubah Password <span class="text-gray-400 font-normal">(kosongkan jika tidak ingin mengubah)</span></h3>
                </div>
                <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Password Baru</label>
                        <input type="password" name="password"
                               class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                               placeholder="Minimal 6 karakter">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation"
                               class="w-full px-3 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                               placeholder="Ulangi password baru">
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-end gap-3">
                <a href="{{ route('profil.show') }}" class="px-5 py-2.5 text-sm border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">Batal</a>
                <button type="submit" class="px-6 py-2.5 text-sm bg-primary hover:bg-primary-dark text-white rounded-lg font-medium transition-colors">Simpan Perubahan</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('mobile-btn').addEventListener('click', () => document.getElementById('mobile-menu').classList.toggle('hidden'));

        function updateClock() {
            const now = new Date();
            const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
            const d = now.getDate().toString().padStart(2,'0'), m = months[now.getMonth()], y = now.getFullYear();
            const h = now.getHours().toString().padStart(2,'0'), min = now.getMinutes().toString().padStart(2,'0'), s = now.getSeconds().toString().padStart(2,'0');
            document.getElementById('current-time').textContent = `${d} ${m} ${y}, ${h}:${min}:${s} WIB`;
        }
        updateClock(); setInterval(updateClock, 1000);

        function updateTanggalLahir() {
            const tgl = document.getElementById('tgl_lahir').value;
            const bln = document.getElementById('bln_lahir').value;
            const thn = document.getElementById('thn_lahir').value;
            if (tgl && bln && thn) document.getElementById('tanggal_lahir').value = `${thn}-${bln}-${tgl}`;
        }
        document.getElementById('tgl_lahir').addEventListener('change', updateTanggalLahir);
        document.getElementById('bln_lahir').addEventListener('change', updateTanggalLahir);
        document.getElementById('thn_lahir').addEventListener('change', updateTanggalLahir);

        document.getElementById('no_kk').addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16);
        });
    </script>
</body>
</html>
