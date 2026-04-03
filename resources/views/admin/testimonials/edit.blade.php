@extends('layouts.admin')

@section('title','Edit Testimonial')

@section('content')
<h1>Edit Testimonial</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.testimonials.update', $testimonial->id) }}" 
      method="POST" 
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Position</label>
        <input type="text" name="position" class="form-control" value="{{ $testimonial->position }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Message</label>
        <textarea name="message" class="form-control" rows="4" required>{{ $testimonial->message }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Change Image</label>
        <input type="file" name="image" class="form-control">
        
        @if($testimonial->image)
            <div class="mt-2">
                <label class="form-label">Current Image</label><br>
                <img src="{{ asset('storage/'.$testimonial->image) }}" width="100" class="img-thumbnail">
            </div>
        @endif
    </div>

    <button class="btn btn-success">Update Testimonial</button>
</form>
@endsection
