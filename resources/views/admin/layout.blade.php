<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME', 'DataSiswa') }} - @yield('title', 'Data Siswa')</title>

    @vite('resources/css/app.css')

    <style>
        .show {
            position: absolute;
        }
    </style>
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

</head>

<body>
    @include('sweetalert::alert')
    <main class="grid grid-cols-12 h-screen">
        <aside class="col-span-2 dark:bg-gray-900 dark:text-gray-100">
            <div class="flex flex-col h-full p-3 w-full ">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <h2>Selamat Datang</h2>
                    </div>
                    <div class="flex-1">
                        <ul class="pt-2 pb-4 space-y-1 text-base">
                            <li class="rounded-sm">
                                <a href="{{ route('dashboard') }}" class="flex items-center p-2 space-x-3 rounded-md">
                                    <span>Siswa</span>
                                </a>
                            </li>
                            <li class="rounded-sm">
                                <a href="{{ route('profile') }}" class="flex items-center p-2 space-x-3 rounded-md">
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li class="rounded-sm">
                                <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('POST')

                                <button type="submit" class="flex items-center p-2 space-x-3 rounded-md">

                                    <span>Logout</span>
                                </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        {{-- Content --}}
        <div class="col-span-10 left-0 md:left-60 overflow-auto">
            <header class=" py-1.5 md:py-4 px-2 md:px-10 w-full bg-gray-900">
                <h3 class="text-2xl text-white font-bold">@yield('title', 'Data Siswa')</h3>
            </header>
            <div class="w-full">
                @yield('section')
            </div>
        </div>
    </main>

    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("myDropdown");
            dropdown.classList.toggle("show");
            if (dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
            }
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                    if (!openDropdown.classList.contains('hidden')) {
                        openDropdown.classList.add('hidden');
                    }else{
                        openDropdown.classList.remove('hidden');

                    }
                }
            }
        };
    </script>
</body>

</html>
