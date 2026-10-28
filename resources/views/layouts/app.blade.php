<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Saya</title>
    
    <!-- CSS / Vite Assets bawaan Laravel -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Konten Utama Website Anda -->
    <div id="app">
        @yield('content')
    </div>

    <!-- ===== TAMBAHKAN SCRIPT LARAVEL ECHO DI SINI (SEBELUM </body>) ===== -->
    <script>
        window.Echo.private(`user.{{ auth()->id() }}`)
            .listen('.order.placed', (e) => {
                alert(`Order #${e.order_id} telah ditempatkan! Total: Rp ${e.total}`);
                console.log('Order Placed:', e);
            });
    </script>
</body>
</html>8