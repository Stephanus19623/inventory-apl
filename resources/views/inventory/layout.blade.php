<!-- filepath: c:\laragon\www\inventory-apl\resources\views\inventory\layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inventory App</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            /* Main header styling */
            .header {
                background-color: #343a40;
                color: white;
                padding: 15px;
                text-align: center;
            }

            /* New top header styling */
            .top-header {
                background-color: #007bff; /* Blue background */
                color: white;
                padding: 10px;
                text-align: center;
            }

            /* Running text styling */
            .running-text {
                display: inline-block;
                white-space: nowrap;
                overflow: hidden;
                width: 200px;
                vertical-align: middle;
            }

            .running-text span {
                display: inline-block;
                animation: scrollText 10s linear infinite;
            }

            @keyframes scrollText {
                from {
                    transform: translateX(100%);
                }
                to {
                    transform: translateX(-100%);
                }
            }
        </style>
    </head>
    <body>
        <!-- New Top Header -->
        <div class="top-header">
            <a href="{{ route('login') }}" class="btn btn-light btn-sm me-3">Log In</a>
            <div class="running-text">
                <span>Selamat Datang. Silahkan Log in terlebih dahulu!</span>
            </div>
        </div>

        <!-- Main Header -->
        <div class="header">
            <a href="{{ route('inventory.index') }}">
                <img src="https://media-hosting.imagekit.io/b67e209c45614fa9/atmilogo-white.png?Expires=1840523856&Key-Pair-Id=K2ZIVPTIP2VGHC&Signature=axNfNlV-x~PxY3hzFXHchh8CcI5F1FrIX6JtUBnrLXWltUMpjjJXIsKoS5huyKWglic0t3y6WMcNrFmIQfwxfaQZgdXJUFfRfv7GlWaZ16jUfiJz6lrBvviIMndvKR6N4gTEOtpYyPtxpfy3MwEokLcUh8jrM~8R8FA1axvtgJCm6b61jVrM0ejKZkIsoZFtWZdJ7-gEm57GnPtNf9QBc8tp~c5QrjMX3NJQaEZPvq7jheFP0wcBc4ZR4joU71-~pRG93hCBa6necYPVGLMja9QFzTGnhLZlauo-pEoKVMbQK-NEN0CJ-IepOLm76ffpXTzSxe0dMXnbprTh9wI4ew__" alt="Logo" class="me-3" style="width: 45px; height: 50px;">
            </a>
            <h1>Politeknik Industri ATMI Cikarang</h1>
        </div>

        <div class="container mt-4">
            <div class="d-flex align-items-center justify-content-center">
                <a href="{{ route('inventory.index') }}">
                    <img src="https://cdn-icons-png.flaticon.com/512/842/842482.png" alt="Logo" class="me-3" style="width: 45px; height: 50px;">
                </a>
                <!-- Subheading -->
                <h1>Center of Tools Management System</h1>
            </div>
            <br>
            @yield('content')
        </div>
    </body>
</html>