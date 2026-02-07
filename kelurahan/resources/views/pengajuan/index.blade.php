<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengajuan - E-Kelurahan</title>
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
                    <a href="{{ route('pengajuan.index') }}" class="nav-item text-white hover:text-green-200 px-3 py-2 rounded-md text-sm font-medium bg-white bg-opacity-20">
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
                            <span class="text-primary font-semibold text-sm">{{ substr(auth()->guard('penduduk')->user()->nama, 0, 1) }}</span>
                        </a>
                        <div class="hidden sm:block text-white">
                            <p class="text-sm font-medium">{{ auth()->guard('penduduk')->user()->nama }}</p>
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
                <a href="{{ route('pengajuan.index') }}" class="nav-item block text-white hover:text-green-200 px-3 py-2 rounded-md text-base font-medium bg-white bg-opacity-20">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Riwayat Pengajuan
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Riwayat Pengajuan Surat</h1>
                    <p class="text-gray-600 mt-2">Daftar semua pengajuan surat yang pernah Anda ajukan</p>
                </div>
                <a href="{{ route('pengajuan.create') }}" 
                   class="hidden md:flex items-center bg-gradient-to-r from-primary to-secondary hover:shadow-lg text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Ajukan Surat Baru
                </a>
            </div>
        </div>

        <!-- Filter Tabs -->
        <div class="mb-6">
            <div class="flex flex-wrap gap-2">
                <button class="px-4 py-2 rounded-lg font-medium transition-all duration-200 bg-primary text-white">
                    Semua
                </button>
                <button class="px-4 py-2 rounded-lg font-medium transition-all duration-200 bg-white text-gray-700 hover:bg-gray-50 border border-gray-200">
                    Menunggu
                </button>
                <button class="px-4 py-2 rounded-lg font-medium transition-all duration-200 bg-white text-gray-700 hover:bg-gray-50 border border-gray-200">
                    Diproses
                </button>
                <button class="px-4 py-2 rounded-lg font-medium transition-all duration-200 bg-white text-gray-700 hover:bg-gray-50 border border-gray-200">
                    Selesai
                </button>
            </div>
        </div>
                    @if (session('success'))
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                showSuccessModal('{{ session('success') }}');
                            });
                        </script>
                    @endif
                    @if($pengajuan->count() > 0)
                        <div class="grid grid-cols-1 gap-6">
                            @foreach($pengajuan as $item)
                                <div class="bg-white border-2 border-gray-100 rounded-2xl p-6 hover:border-primary hover:shadow-xl transition-all duration-300 group">
                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                        <div class="flex-1">
                                            <div class="flex items-center mb-2">
                                                <div class="p-2 rounded-lg bg-primary bg-opacity-10 mr-3">
                                                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-primary transition-colors">{{ $item->jenis_surat }}</h3>
                                                    <p class="text-sm text-gray-500">{{ $item->nomor_pengajuan }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 md:mt-0">
                                            <span class="inline-flex items-center px-4 py-2 text-sm rounded-full font-semibold
                                                @if($item->status == 'Selesai') bg-green-100 text-green-800
                                                @elseif($item->status == 'Diproses') bg-orange-100 text-orange-800
                                                @elseif($item->status == 'Ditolak') bg-red-100 text-red-800
                                                @else bg-yellow-100 text-yellow-800 @endif">
                                                <span class="w-2 h-2 rounded-full mr-2
                                                    @if($item->status == 'Selesai') bg-green-500
                                                    @elseif($item->status == 'Diproses') bg-orange-500 animate-pulse
                                                    @elseif($item->status == 'Ditolak') bg-red-500
                                                    @else bg-yellow-500 animate-bounce @endif"></span>
                                                {{ $item->status }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 rounded-xl p-4 mb-4">
                                        <p class="text-sm text-gray-600 mb-2"><span class="font-semibold text-gray-900">Keperluan:</span></p>
                                        <p class="text-sm text-gray-700">{{ $item->keperluan }}</p>
                                    </div>

                                    <!-- Progress Timeline -->
                                    <div class="mb-4 bg-white rounded-xl p-4 border border-gray-100">
                                        <div class="flex items-center justify-between">
                                            <div class="flex flex-col items-center flex-1">
                                                <div class="w-10 h-10 rounded-full flex items-center justify-center mb-2 bg-green-500">
                                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <span class="text-xs font-medium text-gray-900">Diajukan</span>
                                                <span class="text-xs text-gray-500 mt-1">{{ $item->created_at->format('d M') }}</span>
                                            </div>
                                            <div class="flex-1 h-1 mx-2 rounded {{ in_array($item->status, ['Diproses', 'Selesai']) ? 'bg-green-500' : 'bg-gray-200' }}"></div>
                                            <div class="flex flex-col items-center flex-1">
                                                <div class="w-10 h-10 rounded-full flex items-center justify-center mb-2 {{ in_array($item->status, ['Diproses', 'Selesai']) ? 'bg-green-500' : 'bg-gray-200' }}">
                                                    @if(in_array($item->status, ['Diproses', 'Selesai']))
                                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    @else
                                                        <span class="text-gray-400 text-sm">2</span>
                                                    @endif
                                                </div>
                                                <span class="text-xs font-medium {{ in_array($item->status, ['Diproses', 'Selesai']) ? 'text-gray-900' : 'text-gray-400' }}">Diproses</span>
                                            </div>
                                            <div class="flex-1 h-1 mx-2 rounded {{ $item->status == 'Selesai' ? 'bg-green-500' : 'bg-gray-200' }}"></div>
                                            <div class="flex flex-col items-center flex-1">
                                                <div class="w-10 h-10 rounded-full flex items-center justify-center mb-2 {{ $item->status == 'Selesai' ? 'bg-green-500' : 'bg-gray-200' }}">
                                                    @if($item->status == 'Selesai')
                                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    @else
                                                        <span class="text-gray-400 text-sm">3</span>
                                                    @endif
                                                </div>
                                                <span class="text-xs font-medium {{ $item->status == 'Selesai' ? 'text-gray-900' : 'text-gray-400' }}">Selesai</span>
                                                @if($item->tanggal_selesai)
                                                    <span class="text-xs text-gray-500 mt-1">{{ $item->tanggal_selesai->format('d M') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    @if($item->catatan_admin)
                                        <div class="bg-blue-50 border-l-4 border-blue-400 rounded-lg p-4 mb-4">
                                            <div class="flex items-start">
                                                <svg class="w-5 h-5 text-blue-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                                </svg>
                                                <div>
                                                    <p class="text-sm font-semibold text-blue-900 mb-1">Catatan Admin:</p>
                                                    <p class="text-sm text-blue-800">{{ $item->catatan_admin }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="flex flex-wrap gap-2 pt-4 border-t border-gray-100">
                                        <a href="{{ route('pengajuan.show', $item->id) }}" 
                                           class="flex items-center bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded-lg transition-all duration-200 hover:scale-105">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Detail
                                        </a>
                                        @if($item->status == 'Menunggu Verifikasi')
                                            <a href="{{ route('pengajuan.edit', $item->id) }}" 
                                               class="flex items-center bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium px-4 py-2 rounded-lg transition-all duration-200 hover:scale-105">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </a>
                                            <button onclick="showDeleteModal({{ $item->id }}, '{{ $item->jenis_surat }}')" 
                                                    class="flex items-center bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-lg transition-all duration-200 hover:scale-105">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Hapus
                                            </button>
                                        @endif
                                        @if($item->status == 'Selesai' && $item->file_surat)
                                            <a href="{{ route('pengajuan.download', $item->id) }}" 
                                               class="flex items-center bg-green-500 hover:bg-green-600 text-white text-sm font-medium px-4 py-2 rounded-lg transition-all duration-200 hover:scale-105">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                                </svg>
                                                Download
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-8">
                            {{ $pengajuan->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada pengajuan</h3>
                            <p class="mt-1 text-sm text-gray-500">Mulai dengan mengajukan surat pertama Anda.</p>
                            <div class="mt-6">
                                <a href="{{ route('pengajuan.create') }}" 
                                   class="inline-flex items-center px-6 py-3 border border-transparent shadow-sm text-sm font-semibold rounded-xl text-white bg-gradient-to-r from-primary to-secondary hover:shadow-lg hover:scale-105 transition-all duration-300">
                                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Ajukan Surat Baru
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
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
                <p class="text-green-100 text-sm">Pengajuan telah diproses</p>
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
            
            deleteForm.action = `/pengajuan/${id}`;
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