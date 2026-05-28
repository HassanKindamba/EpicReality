@extends('layouts.admin')

@section('title','Add My Property')

@section('content')

<h1>Add My Property</h1>

<form action="{{ route('agent.properties.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Link</label>
        <input type="url" name="link" class="form-control"
               placeholder="https://example.com" required>
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

    {{-- Visibility removed for agent (admin only control) --}}

    <div class="mb-3">
        <label>Price ($)</label>
        <input type="number" name="price" class="form-control"
               step="0.01" required>
    </div>

    <div class="mb-3">
    <label>Location</label>
    <input type="text" name="location" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>

    {{-- IMPORTANT: no user_id field --}}
    {{-- it will be handled in controller using Auth::id() --}}

    <button class="btn btn-success">Save</button>

</form>

@endsection