@extends('layouts.admin')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Add Bathroom for {{ $property->title ?? 'Property' }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.bathrooms.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="property_id" value="{{ $property->id ?? $property }}">

        <div class="mb-3">
            <label class="form-label">Bathroom Number</label>
            <input type="number" name="number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Type</label>
            <input type="text" name="type" class="form-control" placeholder="e.g ensuite, shared">
        </div>

        <div class="mb-3">
            <label class="form-label">Shower</label>
            <input type="text" name="shower" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Doors</label>
            <input type="number" min="0" name="doors" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Area (sqm)</label>
            <input type="number" step="0.01" name="area" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Bathroom</button>
        <a href="{{ route('admin.properties.show', $property->id ?? $property) }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection