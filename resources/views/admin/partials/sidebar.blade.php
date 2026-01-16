<!-- resources/views/admin/partials/sidebar.blade.php -->

<aside class="admin-sidebar">
    
        <nav>
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <!-- <li><a href="{{ url('/admin/users') }}">Users</a></li> -->
        <!-- <li><a href="{{ url('/admin/settings') }}">Settings</a></li> -->
        </li>
        </nav>
    <h1>EpicReality</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="background:none;border:none;">Logout</button>
            </form>
       
    
</aside>
