@extends('layouts.admin')

@section('title','Edit Service')

@section('content')
<h1>Edit Service</h1>
<form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
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

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" name="price" class="form-control" id="price" step="0.01" value="{{ old('price', $service->price) }}" required>
    </div>

    <!-- Icon upload -->
    <div class="mb-3">
        <label>Icon</label>
        <input type="file" name="icon" class="form-control">
        @if($service->icon)
            <img src="{{ asset('storage/' . $service->icon) }}" width="80" class="mt-2" alt="{{ $service->name }}">
        @endif
    </div>

    <!-- Link -->
    <div class="mb-3">
        <label>Link (optional)</label>
        <input type="url" name="link" class="form-control" value="{{ $service->link }}">
    </div>

    <button class="btn btn-success">Update</button>
</form>
@endsection
