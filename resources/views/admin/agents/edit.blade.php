@extends('layouts.admin')

@section('title','Edit Agent')

@section('content')
<h1>Edit Agent</h1>
<form action="{{ route('agents.update', $agent->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $agent->name }}" required>
    </div>
    <!-- <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $agent->email }}" required>
    </div> -->
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ $agent->phone }}" required>
    </div>
    <div class="mb-3">
        <label>Photo</label>
        <input type="file" name="photo" class="form-control">
        @if($agent->photo)
            <img src="{{ asset('storage/'.$agent->photo) }}" width="100" class="mt-2">
        @endif
    </div>
    <button class="btn btn-success">Update</button>
</form>
@endsection
