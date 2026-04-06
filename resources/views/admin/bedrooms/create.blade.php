@extends('layouts.admin')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Add Bedroom for {{ $property->title }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.bedroom.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="property_id" value="{{ $property->id }}">

        <div class="mb-3">
            <label class="form-label">Bedroom Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Size (sqm)</label>
            <input type="number" step="0.01" name="size" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">No of Doors</label>
            <input type="number" min="0" name="no_of_doors" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">No of Windows</label>
            <input type="number" min="0" name="no_of_windows" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Area (sqm)</label>
            <input type="number" step="0.01" name="area" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Price (TZS)</label>
            <input type="number" step="0.01" name="price" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save Bedroom</button>
        <a href="{{ route('admin.properties.show', $property->id) }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection