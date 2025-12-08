<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kanban</title>

    <!-- Load CSS hasil Laravel Mix -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body style="background:#f5f6fa; padding:20px;">

    <div style="max-width:1400px; margin:0 auto;">
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>
