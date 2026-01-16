@extends('layouts.admin')

@section('title','Edit Service')

@section('content')
<h1>Edit Service</h1>
<form action="{{ route('services.update', $service->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $service->name }}" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="4" required>{{ $service->description }}</textarea>
    </div>
    <button class="btn btn-success">Update</button>
</form>
@endsection
