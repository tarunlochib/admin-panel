<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">

        <nav class="md:flex md:justify-between md:items-center">
            
            <div>
                <a href="/">
                    <img src="/images/logo.png" alt="admin panel logo" width="165" height="16">
                </a>
            </div>
           
            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                    <span class="text-xs font-bold uppercase">welcome, {{ auth()->user()->name }}</span>

                    <form method="POST" action="/logout" class="font-semibold text-xs text-blue-500 ml-6">
                        @csrf

                        <button type="submit">Log Out</button>

                    </form>
                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="ml-6 text-xs font-bold uppercase">Log In</a>
                @endguest
            </div>
            
        
        </nav>

        @if(session()->has('success'))
            <div class="fixed  bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
                <p>{{ session('success') }}</p>
            </div>
        @endif
    </body>
</html>
