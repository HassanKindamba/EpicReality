@extends('layouts.admin')

@section('title','Add Service')

@section('content')
<h1>Add Service</h1>
<form action="{{ route('services.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="4" required></textarea>
    </div>
    <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" name="price" class="form-control" id="price" step="0.01" value="{{ old('price') }}" required>
</div>
    <button class="btn btn-success">Save</button>
</form>
@endsection
