<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Pharmacy Website')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app">
        <nav>
            <ul>
                <li><a href="{{ route('pharmacy.index') }}">Home</a></li>
                <li><a href="{{ route('pharmacy.create') }}">Add Pharmacy</a></li>
            </ul>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>