<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Your template CSS (IMPORTANT) -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <style>
    .property-image img {
        max-height: 450px;
        width: 100%;
        object-fit: cover;
        border-radius: 12px;
        display: block;
    }
    </style>

</head>
<body>

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendor JS (if exists in your template) -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>