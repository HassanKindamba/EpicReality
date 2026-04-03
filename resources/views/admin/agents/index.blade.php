@extends('layouts.admin')

@section('title','Agents')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Agents</h1>
    <a href="{{ route('admin.agents.create') }}" class="btn btn-primary">Add New Agent</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <!-- <th>Email</th> -->
            <th>Phone</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($agents as $agent)
        <tr>
            <td>{{ $agent->name }}</td>
            <!-- <td>{{ $agent->email }}</td> -->
            <td>{{ $agent->phone }}</td>
            <td>
                @if($agent->photo)
                    <img src="{{ asset('storage/'.$agent->photo) }}" width="100">
                @endif
            </td>
            <td>
                <a href="{{ route('admin.agents.edit', $agent->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.agents.destroy', $agent->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this agent?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
