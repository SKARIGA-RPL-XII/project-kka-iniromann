<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Surat' }}</title>
    <style>
        @page {
            margin: 0;
        }
        body {
            font-family: 'Arial', sans-serif;
            margin: 20mm;
            color: #000;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .content {
            line-height: 1.6;
        }
        .footer {
            margin-top: 50px;
            text-align: right;
        }
        .ttd {
            margin-top: 100px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    @yield('content')
</body>
</html>