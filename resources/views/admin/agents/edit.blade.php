@extends('layouts.admin')

@section('title','Edit Agent')

@section('content')
<h1>Edit Agent</h1>

<form action="{{ route('agents.update', $agent->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $agent->name }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $agent->email }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ $agent->phone }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="4" required>{{ $agent->description }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Photo</label>
        <input type="file" name="photo" class="form-control">
        
        @if($agent->photo)
            <div class="mt-2">
                <img src="{{ asset('storage/'.$agent->photo) }}" width="100" class="img-thumbnail">
            </div>
        @endif
    </div>

    <button class="btn btn-success">Update Agent</button>
</form>
@endsection
