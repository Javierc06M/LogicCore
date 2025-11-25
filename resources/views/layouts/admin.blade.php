<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('resources/css/dashboard.css') }}">
    <title>@yield('title')</title>

    @switch(Route::currentRouteName())

    @case('admin.clients.index')
        {{-- Código o scripts para clientes --}}
        <link rel="stylesheet" href="{{ asset('resources/css/admin-clients.css') }}">
        <script src="{{ asset('resources/js/admin-clients.js') }}"></script>
        @break

@endswitch

</head>
<body>
     <div class="overlay" id="overlay"></div>
    @include('layouts.partials.sidebar')
    <div class="main-content">

        @include('layouts.partials.header')

        <main class="content">
            @yield('content')
        </main>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="{{ asset('resources/js/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>