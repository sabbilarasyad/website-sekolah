<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website Sekolah')</title>
    <!-- Tailwind CSS (Gunakan Bootstrap/Tailwind bawaan project jika sudah ada) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <!-- Header / Navigasi Publik -->
    <nav class="bg-blue-900 text-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('public.home') }}" class="font-bold text-xl tracking-wide">SMK NEGERI DEMO</a>
            <div class="space-x-6 flex items-center">
                <a href="{{ route('public.home') }}" class="hover:text-blue-200 font-medium">Beranda</a>
                <a href="{{ route('public.profil') }}" class="hover:text-blue-200 font-medium">Profil</a>
                <a href="{{ route('public.berita') }}" class="hover:text-blue-200 font-medium">Berita</a>
                <a href="{{ route('public.hubin') }}" class="hover:text-blue-200 font-medium">Hubin</a>
                <a href="/login" class="bg-yellow-500 hover:bg-yellow-600 text-blue-950 font-semibold px-4 py-1.5 rounded transition">Login</a>
            </div>
        </div>
    </nav>

    <!-- Content Area -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Website Sekolah. Domain D (Syavira) Public Portal.</p>
        </div>
    </footer>

</body>
</html>