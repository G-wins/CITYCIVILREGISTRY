<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

    <style>

#notificationDropdown {
    position: absolute;
    top: 50px;
    right: 0;
    z-index: 50;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 0.5rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 400px;
    
}
.notification-count {
    position: absolute;
    top: -5px;
    right: -5px;
    background-color: #dc2626;
    color: #fff;
    font-size: 0.75rem;
    font-weight: bold;
    padding: 0.2rem 0.4rem;
    border-radius: 9999px;
}


        #notificationDropdownButton {
            position: relative;
            width: auto;
            height: auto;
        }

        #notificationDropdownButton .fa-bell {
            font-size: 1.5rem; /* Adjust size of bell */
            color: #4b5563; /* Default gray color */
            transition: color 0.3s ease;
        }

        #notificationDropdownButton .fa-bell:hover {
            color: #1d4ed8; /* Hover color (blue) */
        }

        #notificationDropdownButton span {
            position: absolute;
            top: -5px; /* Adjust position for the badge */
            right: -5px;
            font-size: 0.75rem; /* Font size for the number */
            padding: 0.2rem 0.4rem; /* Adjust padding */
            border-radius: 9999px; /* Make it rounded */
            background-color: #dc2626; /* Red background */
            color: #fff; /* White text */
        }
</style>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
