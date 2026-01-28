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
<body class="bg-gradient-to-br from-blue-50 to-gray-100">
    @yield('content')
    
    <!-- Simple footer untuk auth pages -->
    <footer class="text-center py-4 text-gray-600 text-sm">
        &copy; {{ date('Y') }} Sistem E-Kelurahan
    </footer>
    
    @yield('scripts')
</body>
</html>