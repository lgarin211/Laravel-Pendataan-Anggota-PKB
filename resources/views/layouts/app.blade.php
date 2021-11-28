@php
$role=Auth::user()->role;
if ($role=='Admin') {
     redirect('anggota');
}else{
     redirect('ard');
}
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{url('/')}}/{{ mix('css/app.css') }}">
        <style type="text/css">
        .bg-cas{
            background-color: #D8E9A8 !important;
        }
        </style>
        @livewireStyles
<style type="text/css">
    body{
     background-color:#e1f3af !important;
    }
    .antialiased{
     background-color:#e1f3af !important;
    }
</style>
        <!-- Scripts -->
        <script src="{{url('/')}}/{{ mix('js/app.js') }}" defer></script>
    </head >
    <body class="font-sans antialiased" >
        <x-jet-banner />

        <div class="min-h-screen bg-cas">
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
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
