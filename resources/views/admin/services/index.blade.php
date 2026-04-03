@extends('layouts.admin')

@section('title','Services')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Services</h1>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Add New Service</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Icon</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Link</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($services as $service)
        <tr>
            <td>{{ $service->id }}</td>
            <td>
                @if($service->icon)
                    <img src="{{ asset('storage/' . $service->icon) }}" width="50" alt="{{ $service->name }}">
                @endif
            </td>
            <td>{{ $service->name }}</td>
            <td>{{ Str::limit($service->description,50) }}</td>
            <td>{{ $service->price }} TZS</td>
            <td>
                @if($service->link)
                    <a href="{{ $service->link }}" target="_blank">Visit</a>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline-block">
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
