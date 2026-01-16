@extends('layouts.admin')

@section('title','Add Home')

@section('content')
<h1>Add Home</h1>
<form action="{{ route('homes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Address</label>
        <input type="text" name="address" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="4" required></textarea>
    </div>
    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <button type="submit">Add</button>
</form>
@endsection
