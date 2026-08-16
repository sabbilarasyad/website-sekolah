<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Website Sekolah')</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    @auth
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">

                <div class="flex items-center gap-6">
                    <a href="{{ route('dashboard') }}"
                       class="font-semibold text-gray-800">
                        Website Sekolah
                    </a>

                    @yield('navbar-links')
                </div>

                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600">
                        {{ auth()->user()->nama_lengkap }}

                        <span class="ml-1 inline-block px-2 py-0.5 text-xs rounded bg-gray-200 uppercase">
                            {{ auth()->user()->role }}
                        </span>
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                                class="text-sm text-red-600 hover:underline">
                            Logout
                        </button>
                    </form>
                </div>

            </div>
        </nav>
    @endauth

    <main class="max-w-7xl mx-auto px-4 py-8">

        @if (session('status'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800">
                {{ session('status') }}
            </div>
        @endif

        @yield('content')

    </main>

</body>
</html>