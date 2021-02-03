<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CMARS</title>

        
       
        <style>
            body {
                font-family: 'candara';
            }
        </style>
    </head>
    <body class="antialiased">
    <div class="relative flex items-cener justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
    
    @if (Route::has('login'))
                <div class="hidden fixed center-0 center-0 px-6 py-4 sm:block">
                YOUR HEALTH MATTERS<br>

                <br>
                <br>
                OLD USER: LOGIN<br>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                     
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a><br><br><br>
                        NEW USER:REGISTER<br>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>      
    </body>
</html>
