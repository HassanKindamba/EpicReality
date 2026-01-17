@extends('layouts.admin')

@section('title','Services')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Services</h1>
    <a href="{{ route('services.create') }}" class="btn btn-primary">Add New Service</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($services as $service)
        <tr>
            <td>{{ $service->name }}</td>
            <td>{{ Str::limit($service->description,50) }}</td>
            <td>{{ $service->price }} TZS</td>
            <td>
                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this service?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
