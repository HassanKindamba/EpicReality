@extends('layouts.admin')

@section('title','Homes')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Homes</h1>
    <a href="{{ route('admin.homes.create') }}" class="btn btn-primary">Add New Home</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Address</th>
            <th>Eneo</th>
            <th>Jengo</th>
            <th>Picha</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($homes as $home)
        <tr>
            <td>{{ $home->address }}</td>
            <td>{{ $home->eneo }}</td>
            <td>{{ $home->jengo }}</td>
            <td>
                @if($home->image)
                    <img src="{{ asset('storage/'.$home->image) }}" 
                         width="80" 
                         class="img-thumbnail">
                @else
                    <span class="text-muted">No Image</span>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.homes.edit', $home->id) }}" 
                   class="btn btn-sm btn-warning">
                   Edit
                </a>

                <form action="{{ route('admin.homes.destroy', $home->id) }}" 
                      method="POST" 
                      class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" 
                            onclick="return confirm('Delete this home?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
