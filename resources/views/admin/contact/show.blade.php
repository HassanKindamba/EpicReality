@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Message Details</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $msg->name }}</p>
            <p><strong>Email:</strong> {{ $msg->email }}</p>
            <p><strong>Subject:</strong> {{ $msg->subject }}</p>

            <p><strong>Message:</strong></p>
            <div>{!! nl2br(e($msg->message)) !!}</div>

            <p><strong>Received at:</strong> {{ $msg->created_at->format('d M Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary mt-3">
        ← Back
    </a>
</div>
@endsection