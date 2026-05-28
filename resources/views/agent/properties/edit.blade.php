@extends('layouts.admin')

@section('title','Edit My Property')

@section('content')

<h1>Edit My Property</h1>

<form action="{{ route('agent.properties.update', $property->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    {{-- ID (readonly) --}}
    <div class="mb-3">
        <label>ID</label>
        <input type="text" class="form-control" value="{{ $property->id }}" readonly>
    </div>

    {{-- Title --}}
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control"
               value="{{ $property->title }}" required>
    </div>

    {{-- Link --}}
    <div class="mb-3">
        <label>Link</label>
        <input type="url" name="link" class="form-control"
               value="{{ $property->link }}" required>
    </div>

    {{-- Location --}}
    <div class="mb-3">
        <label>Location</label>
        <input type="text" name="location" class="form-control"
               value="{{ $property->location }}" required>
    </div>

    {{-- Description --}}
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="4">{{ $property->description }}</textarea>
    </div>

    {{-- Availability --}}
    <div class="mb-3">
        <label>Availability Status</label>
        <select name="availability_status" class="form-select">
            <option value="Available" {{ $property->availability_status == 'Available' ? 'selected' : '' }}>Available</option>
            <option value="Occupied" {{ $property->availability_status == 'Occupied' ? 'selected' : '' }}>Occupied</option>
            <option value="Not In Use" {{ $property->availability_status == 'Not In Use' ? 'selected' : '' }}>Not In Use</option>
        </select>
    </div>

    {{-- Type --}}
    <div class="mb-3">
        <label>Property Type</label>
        <select name="property_type" class="form-select">
            <option value="Apartment" {{ $property->property_type == 'Apartment' ? 'selected' : '' }}>Apartment</option>
            <option value="House" {{ $property->property_type == 'House' ? 'selected' : '' }}>House</option>
            <option value="Commercial" {{ $property->property_type == 'Commercial' ? 'selected' : '' }}>Commercial</option>
        </select>
    </div>

    {{-- Price --}}
    <div class="mb-3">
        <label>Price ($)</label>
        <input type="number" name="price" class="form-control"
               step="0.01" value="{{ $property->price }}" required>
    </div>

    {{-- Image --}}
    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">

        @if($property->image)
            <div class="mt-2">
                <img src="{{ asset('storage/'.$property->image) }}" width="100">
            </div>
        @endif
    </div>

    <button class="btn btn-success">Update</button>

</form>

@endsection