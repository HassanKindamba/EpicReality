@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Add New User</h2>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control" required>
                <option value="">-- Select Role --</option>
                <option value="admin">Admin</option>
                <option value="agent">Agent</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">
            Create User
        </button>
    </form>
</div>
@endsection