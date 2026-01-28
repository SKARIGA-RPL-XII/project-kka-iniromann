<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - E-Kelurahan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @yield('styles')
</head>
<body class="bg-gray-50">
    <!-- Header/Navbar -->
    <nav class="bg-blue-600 text-white shadow-lg">
        <!-- Navbar content -->
    </nav>

    <!-- Sidebar & Main Content -->
    <div class="flex">
        <!-- Sidebar untuk Warga/Admin -->
        @auth
            @if(Auth::user()->isWarga())
                <!-- Sidebar Warga -->
            @elseif(Auth::user()->isAdmin())
                <!-- Sidebar Admin -->
            @endif
        @endauth

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-8">
        <!-- Footer content -->
    </footer>

    @yield('scripts')
</body>
</html>