@extends('layouts.admin')

@section('title','Add Service')

@section('content')
<h1>Add Service</h1>
<form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" name="price" class="form-control" id="price" step="0.01" value="{{ old('price') }}" required>
    </div>

    <!-- Icon upload -->
    <div class="mb-3">
        <label>Icon (optional)</label>
        <input type="file" name="icon" class="form-control">
    </div>

    <!-- Link -->
    <div class="mb-3">
        <label>Link (optional)</label>
        <input type="url" name="link" class="form-control" value="{{ old('link') }}">
    </div>

    <button class="btn btn-success">Save</button>
</form>
@endsection
