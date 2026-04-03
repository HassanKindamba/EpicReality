@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Edit User</h2>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="is_admin" class="form-check-input" id="is_admin" {{ $user->is_admin ? 'checked' : '' }}>
            <label class="form-check-label" for="is_admin">Admin?</label>
        </div>

        <button type="submit" class="btn btn-success">Update User</button>
    </form>
</div>
@endsection
