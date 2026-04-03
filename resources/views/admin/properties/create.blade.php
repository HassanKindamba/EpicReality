@extends('layouts.admin')

@section('title','Add Property')

@section('content')
<h1>Add Property</h1>
<form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- <div class="mb-3">
       <div class="mb-3">
    <label>ID</label>
    <input type="text" name="id" class="form-control" required>
</div> -->
<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control" required>
</div>
<div class="mb-3">
    <label>Link</label>
    <input type="url" name="link" class="form-control" placeholder="https://example.com" required>
</div>
<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control" accept="image/*" required>
</div>

    <button class="btn btn-success">Save</button>
</form>
@endsection
