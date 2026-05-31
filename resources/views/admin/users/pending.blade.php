@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Pending Agents</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->status == 'pending')
                            <a href="{{ route('admin.users.approve', $user->id) }}"
                            class="btn btn-success btn-sm">
                                Approve
                            </a>
                        @else
                            <span class="badge bg-success">Approved</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No pending agents</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection