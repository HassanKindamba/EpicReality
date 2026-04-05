@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Testimonial Details</h2>

    <div class="card">
        <div class="card-body">

            <p><strong>Name:</strong> {{ $testimonial->name }}</p>
            <p><strong>Message:</strong> {{ $testimonial->message }}</p>
            <p><strong>Position:</strong> {{ $testimonial->position }}</p>

            <p><strong>Photo:</strong></p>
            @if ($testimonial->image)
                <img src="{{ asset('storage/' . $testimonial->image) }}" 
                    style="max-width:200px; max-height:200px; object-fit:cover;" 
                    class="rounded shadow">
            @endif

        </div>
    </div>

    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary mt-3">
        ← Back
    </a>
</div>
@endsection