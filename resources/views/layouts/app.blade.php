<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Sekolah</title>
</head>
<body>
    <header>
        <nav>
            <!-- Navigation Bar Sementara -->
            <a href="/">Beranda</a> | 
            <a href="/profil">Profil</a> | 
            <a href="/hubin">Hubin</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2026 Website Sekolah</p>
    </footer>
</body>
</html>