@extends('layouts.admin')

@section('title','Edit Property')

@section('content')
<h1>Edit Property</h1>
<form action="{{ route('properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ $property->title }}" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="4" required>{{ $property->description }}</textarea>
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control" value="{{ $property->price }}" step="0.01" required>
    </div>
    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
        @if($property->image)
            <img src="{{ asset('storage/'.$property->image) }}" width="100" class="mt-2">
        @endif
    </div>
    <button class="btn btn-success">Update</button>
</form>
@endsection
