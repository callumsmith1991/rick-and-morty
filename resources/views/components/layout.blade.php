<!doctype html>

<html>

<head>
    <title>Callum's Rick and Morty Wiki</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        {{ $slot }}
        <!-- Scripts -->
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
