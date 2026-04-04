@extends('layouts.admin')

@section('title','Testimonials')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Testimonials</h1>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">Add New Testimonial</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Message</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($testimonials as $testimonial)
        <tr>
            <td>{{ $testimonial->name }}</td>
            <td>{{ $testimonial->position }}</td>
            <td>{{ Str::limit($testimonial->message, 50) }}</td>
            <td>
                @if($testimonial->image)
                    <img src="{{ asset('storage/'.$testimonial->image) }}" width="80" class="img-thumbnail">
                @endif
            </td>
            <td>
                <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <a href="{{ route('admin.testimonials.show', $testimonial->id) }}" 
                    class="btn btn-info btn-sm">
                    View
                </a>
                <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this testimonial?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
