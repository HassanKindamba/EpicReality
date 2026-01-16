@extends('layouts.admin')

@section('title','Homes')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Homes</h1>
    <a href="{{ route('homes.create') }}" class="btn btn-primary">Add New Home</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Address</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($homes as $home)
        <tr>
            <td>{{ $home->address }}</td>
            <td>{{ Str::limit($home->description,50) }}</td>
            <td>
                @if($home->image)
                    <img src="{{ asset('storage/'.$home->image) }}" width="100">
                @endif
            </td>
            <td>
                <a href="{{ route('homes.edit', $home->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('homes.destroy', $home->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this home?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
