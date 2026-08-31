<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Website Sekolah</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col justify-between font-sans">

    <!-- Top Navigation -->
    <nav class="bg-blue-900 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('public.home') }}" class="font-bold text-xl tracking-wide">SMK NEGERI DEMO</a>
            <div class="space-x-4">
                <a href="{{ route('public.home') }}" class="hover:text-blue-200">Beranda</a>
                <a href="{{ route('public.profil') }}" class="hover:text-blue-200">Profil</a>
                <a href="{{ route('public.hubin') }}" class="hover:text-blue-200">Hubin</a>
            </div>
        </div>
    </nav>

    <!-- Login Card Center -->
    <div class="flex-grow flex items-center justify-center px-4 my-8">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full border border-gray-200">
            
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-blue-900">Login Portal Sekolah</h1>
                <p class="text-sm text-gray-500 mt-1">Masukkan akun Anda untuk melanjutkan</p>
            </div>

            <form action="{{ route('login.attempt') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="username" class="block text-sm font-semibold text-gray-700 mb-1">Username / Email</label>
                    <input type="text" id="username" name="username" required placeholder="Masukkan username"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-800 focus:border-transparent">
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                    <input type="password" id="password" name="password" required placeholder="••••••••"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-800 focus:border-transparent">
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center text-gray-600">
                        <input type="checkbox" name="remember" class="rounded text-blue-900 focus:ring-blue-800 mr-2">
                        Ingat saya
                    </label>
                </div>

                <button type="submit" 
                    class="w-full bg-blue-900 hover:bg-blue-800 text-white font-semibold py-2.5 rounded-md transition shadow">
                    Masuk
                </button>
            </form>

        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-4 text-center text-sm">
        <p>&copy; 2026 Website Sekolah. All rights reserved.</p>
    </footer>

</body>
</html>