@extends('layouts.admin')

@section('title','Properties')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Properties</h1>
    <a href="{{ route('properties.create') }}" class="btn btn-primary">Add New Property</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($properties as $property)
        <tr>
            <td>{{ $property->title }}</td>
            <td>{{ Str::limit($property->description,50) }}</td>
            <td>${{ $property->price }}</td>
            <td>
                @if($property->image)
                    <img src="{{ asset('storage/'.$property->image) }}" width="100">
                @endif
            </td>
            <td>
                <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('properties.destroy', $property->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this property?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
