<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
<script src="{{asset('color-modes.js')}}"></script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

       
        <!-- Scripts -->
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @font-face {
                        font-family: 'Google';
                        src: url('{{asset('ProductSans-Light.ttf')}}');
                        font-weight: 500;
                        
                    }
                    body{
                        font-family: 'Google' !important;
                    }
                    
    </style>
    </head>
    <body class="d-flex flex-column h-100">
        @auth
        @livewire('messenger-icon')
    @endauth
        <div class=" bg-body-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-body shadow">
                    <div class="max-w-7xl text-body bg-body mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
