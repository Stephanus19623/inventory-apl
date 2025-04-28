<!-- filepath: c:\laragon\www\inventory-apl\resources\views\inventory\layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inventory App</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="d-flex align-items-center">
                <!-- Image with Link -->
                <a href="{{ route('inventory.index') }}">
                    <img src="https://media-hosting.imagekit.io/747463c058a1457d/atmilogo.png?Expires=1840435353&Key-Pair-Id=K2ZIVPTIP2VGHC&Signature=HrxONQBI1ZbPNi3tZOpu2nSr34pzwRHHgHA0hfWe561-QKce8XnoC~8YlK0l1H1~2omWyK5DumfLvH-qcMN1f~RNCNJmhIEEeBOeDRDkrDMP-IWGqQqMnvaINqEpmJVbC5eSdwBOu3fWGB6pMFgyaEHNGk47ObK2woGrjr0x5bFBJpqKRuq8lDsuKDMOcB8VrUPuQB4zaeBCTO6GXv-4Bq54n4dXhVU~MQ2i7oB9Y6ulswoszQrvwAkag0Zg~MBPhyM1iPxCdpCLBrWnMH4ZVu2E57L8sR~uoT3uQ3E039OPSxKxLHNcexbl0KTaOaKWRvZrf8M2AFi61BOyGKuwCg__" alt="Logo" class="me-3" style="width: 45px; height: 50px;">
                </a>
                <!-- Heading -->
                <h1>Politeknik Industri ATMI Cikarang</h1>
            </div>
            <h5>Welcome!</h5>
            <br>
            @yield('content')
        </div>
    </body>
</html>