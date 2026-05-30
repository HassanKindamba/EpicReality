@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Edit User</h2>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ $user->name }}"
                required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input
                type="email"
                name="email"
                class="form-control"
                value="{{ $user->email }}"
                required>
        </div>

        <div class="mb-3">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                    Admin
                </option>

                <option value="agent" {{ $user->role == 'agent' ? 'selected' : '' }}>
                    Agent
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">
            Update User
        </button>
    </form>
</div>
@endsection