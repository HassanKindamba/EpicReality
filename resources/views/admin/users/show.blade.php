@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>User Details</h2>

    <div class="card shadow-sm">
        <div class="card-body">

            <p>
                <strong>Name:</strong>
                {{ $user->name }}
            </p>

            <p>
                <strong>Email:</strong>
                {{ $user->email }}
            </p>

            <p>
                <strong>Role:</strong>

                <span class="badge bg-{{ $user->role == 'admin' ? 'danger' : 'primary' }}">
                    {{ ucfirst($user->role) }}
                </span>
            </p>

            <!-- @if($user->photo)
                <p><strong>Photo:</strong></p>

                <img
                    src="{{ asset('storage/' . $user->photo) }}"
                    alt="{{ $user->name }}"
                    class="rounded shadow"
                    style="max-width:200px; max-height:200px; object-fit:cover;">
            @else
                <p>
                    <strong>Photo:</strong>
                    <span class="text-muted">No photo uploaded</span>
                </p>
            @endif -->

        </div>
    </div>

    <a href="{{ route('admin.users.index') }}"
       class="btn btn-secondary mt-3">
        ← Back
    </a>
</div>
@endsection