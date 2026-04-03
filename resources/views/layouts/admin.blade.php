<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.homes.index') }}">Homes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.services.index') }}">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.properties.index') }}">Properties</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.agents.index') }}">Agents</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.index') }}">Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.testimonials.index') }}">Testimonials</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.contact.index') }}">Contact</a></li>
                    <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link" style="display:inline; padding:0; border:none;">Logout</button>
                    </form>
</li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
