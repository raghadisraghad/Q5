<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #121212; /* Dark background color */
                color: #ffffff; /* Light text color */
                margin: 0;
            }

            footer{
                background-color: #333;
                color: #fff;
                padding: 1em;
            }
            
            .container {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
            }

            .container h1 {
                color: #61dafb; /* Light blue heading color */
            }
            

            a:visited {
                color: #4a5568;
                text-decoration: none;
                cursor: pointer;
            }

            

            a {
                color: #4a5568;
            }

            .container table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            .container thead {
                background-color: #333; /* Dark grey header background color */
                color: #ffffff; /* Light text color */
            }

            .container th, .container td {
                padding: 12px;
                border: 1px solid #555; /* Medium grey border color */
            }
            
            .container td {
                color: black;
            }

            .container tr:nth-child(even) {
                background-color: #555; /* Medium grey background color for even rows */
            }

            .container a {
                color: #61dafb; /* Light blue link color */
                text-decoration: none;
                margin-right: 10px;
            }

            .container a:hover {
                text-decoration: underline;
            }

            .container button {
                background-color: #e44d26; /* Red button color */
                color: black; /* Light text color */
                padding: 8px 12px;
                border: none;
                cursor: pointer;
            }

            .container button:hover {
                background-color: #d5371d; /* Darker red color on hover */
            }

        </style>
        @livewireStyles
    </head>

    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                
                <h1><a href="/">Home Page</a></h1>
                @yield('content')
            </main>
        </div>

        @stack('modals')

        @livewireScripts

    </body>
    
    <footer>
        <p>
            Made by Raghad Chamlali.
        </p>
    </footer>
</html>
