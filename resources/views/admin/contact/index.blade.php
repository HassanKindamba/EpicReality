@extends('layouts.admin')

@section('title','Contact Messages')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Contact Messages</h1>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Sent At</th>
            <th>Actions</th> <!-- Action column -->
        </tr>
    </thead>
    <tbody>
        @forelse($messages as $msg)
        <tr>
            <td>{{ $msg->name }}</td>
            <td>{{ $msg->email }}</td>
            <td>{{ $msg->subject }}</td>
            <td>{{ $msg->message }}</td>
            <td>{{ $msg->created_at->format('d M Y H:i') }}</td>
            <td>
                <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this message?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">No messages yet</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
