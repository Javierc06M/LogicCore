<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('resources/css/dashboard.css') }}">
    <title>@yield('title')</title>
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
</body>
</html>