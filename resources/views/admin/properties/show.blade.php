@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Property Details</h2>

    <div class="card">
        <div class="card-body">

            <p><strong>Title:</strong> {{ $property->title }}</p>

            <p><strong>Link:</strong> 
                <a href="{{ $property->link }}" target="_blank">
                    {{ $property->link }}
                </a>
            </p>

            <p><strong>Photo:</strong></p>
            <img src="{{ asset('storage/' . $property->image) }}" 
                 style="max-width:300px; max-height:200px; object-fit:cover;" 
                 class="rounded shadow">

        </div>
    </div>

    <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary mt-3">
        ← Back
    </a>
</div>
@endsection