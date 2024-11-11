<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>@yield('titre', 'AdminBase')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('prism.css')}}">
    <link rel="stylesheet" href="{{asset('quill.snow.css')}}">
    <link rel="stylesheet" href="{{asset('fancybox.css')}}">
    
    <style>
        @font-face {
            font-family: 'Google';
            src: url('{{asset('ProductSans-Light.ttf')}}');
            font-weight: 500;
        }
        body {
            font-family: 'Google';
        }
    </style>
</head>

<body class=" bg-gray-900 text-gray-100 flex flex-col h-full bg-gray-50">
    @php
        setlocale(LC_TIME,'fr_FR.utf8');
        \Carbon\Carbon::setLocale('fr');
    @endphp

    <div class="container mx-auto px-4 py-2">
        <header>
            <div class="flex flex-col md:flex-row items-center justify-between pb-3 mb-4 border-b">
                <a href="{{route('admin.dashboard')}}" class="flex items-center text-gray-900 hover:text-gray-600">
                    <span class="text-2xl text-gray-100 font-semibold">Admin Panel <i>{{ Auth::user()->name }}</i></span>
                </a>

                <nav class="mt-2 md:mt-0">
                    <form method="POST" class="py-2" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-red-600 border border-red-600 rounded-md hover:bg-red-50">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </nav>
            </div>
        </header>
    </div>

    <main class="flex-1">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold mt-1">@yield('section','Bienvenu')</h1>
            @yield('contenus')
        </div>
    </main>

    <div class="container mx-auto px-4">
        <footer class="py-5">
            <div class="flex justify-between items-center py-4 my-4 border-t">
                <p class="text-gray-600">&copy; 2021 Company, Inc. All rights reserved.</p>
                <ul class="flex space-x-4">
                    <li>
                        <a href="#" class="text-gray-600 hover:text-gray-900" title="Constantin Masirika Jr.">
                            <i class="bi bi-facebook text-2xl"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-600 hover:text-gray-900" title="Constantin Masirika Jr.">
                            <i class="bi bi-twitter text-2xl"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-600 hover:text-gray-900" title="Constantin Masirika Jr.">
                            <i class="bi bi-instagram text-2xl"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </footer>
    </div>

    <script src="{{asset('quill.js')}}"></script>
    <script src="{{asset('fancybox.umd.js')}}"></script>
    <script src="{{asset('prism.js')}}"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {});
        new TomSelect('select[multiple]');
    </script>
</body>
</html>