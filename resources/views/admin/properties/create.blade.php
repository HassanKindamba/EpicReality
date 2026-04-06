@extends('layouts.admin')

@section('title','Add Property')

@section('content')
<h1>Add Property</h1>
<form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Link</label>
        <input type="url" name="link" class="form-control" placeholder="https://example.com" required>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="4"></textarea>
    </div>

    <div class="mb-3">
        <label>Availability Status</label>
        <select name="availability_status" class="form-select">
            <option value="Available" selected>Available</option>
            <option value="Occupied">Occupied</option>
            <option value="Not In Use">Not In Use</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Property Type</label>
        <select name="property_type" class="form-select">
            <option value="Apartment" selected>Apartment</option>
            <option value="House">House</option>
            <option value="Commercial">Commercial</option>
        </select>
    </div>

    <!-- <div class="mb-3">
        <label>Visibility Status</label>
        <select name="visibility_status" class="form-select">
            <option value="Visible">Visible</option>
            <option value="Hidden" selected>Hidden</option>
        </select>
    </div> -->

    <div class="mb-3">
        <label>Price ($)</label>
        <input type="number" name="price" class="form-control" step="0.01" required>
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>

    <!-- Optional: User ID (if assigning manually, otherwise use logged-in user) -->
    <!-- <input type="hidden" name="user_id" value="{{ auth()->id() }}"> -->

    <button class="btn btn-success">Save</button>
</form>
@endsection