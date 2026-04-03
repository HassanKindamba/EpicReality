@extends('layouts.admin')

@section('title','Add Testimonial')

@section('content')
<h1>Add Testimonial</h1>

<form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter name" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Position</label>
        <input type="text" name="position" class="form-control" placeholder="Enter position" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Message</label>
        <textarea name="message" class="form-control" rows="4" placeholder="Enter testimonial message" required></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Photo</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-success">Save Testimonial</button>
</form>
@endsection
