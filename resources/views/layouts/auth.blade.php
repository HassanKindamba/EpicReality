<!-- Layout File: resources/views/layouts/auth.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Auth' }} - Real Estate</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="w-full max-w-md">
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-blue-600">Real Estate Manager</h1>
        <p class="text-gray-500 text-sm">Manage properties with ease</p>
    </div>

    <div class="bg-white p-8 rounded-2xl shadow-lg">
        @yield('content')
    </div>

    <p class="text-center text-xs text-gray-400 mt-4">
        © {{ date('Y') }} Real Estate System
    </p>
</div>

</body>
</html>