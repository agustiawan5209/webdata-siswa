<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME', 'DataSiswa') }} - Home</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
   <link rel="stylesheet" href="{{ asset('build/assets/app-fc5e0ff8.css') }}">
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">

        </div>
        <section class="dark:bg-gray-800 dark:text-gray-100">
            <div
                class="container mx-auto flex flex-col items-center px-4 py-16 text-center md:py-32 md:px-10 lg:px-32 xl:max-w-3xl">
                <h1 class="text-4xl font-bold leadi sm:text-5xl">Sistem Informasi Data Siswa
                </h1>
                <p class="px-8 mt-8 mb-12 text-lg">TEST SKILL IT FULLSTACK</p>
                <div class="flex flex-wrap justify-center">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="px-8 py-3 m-2 text-lg font-semibold rounded dark:bg-violet-400 dark:text-gray-900">Home</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="px-8 py-3 m-2 text-lg font-semibold rounded dark:bg-violet-400 dark:text-gray-900">Log
                                in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="px-8 py-3 m-2 text-lg border rounded dark:text-gray-50 dark:border-gray-700">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </section>
    </div>
    <script src="{{ asset('build/assets/app-1aefb37c.js') }}"></script>

</body>

</html>
