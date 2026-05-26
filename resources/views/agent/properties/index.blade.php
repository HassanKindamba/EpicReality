@extends('layouts.admin')

@section('title','My Properties')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>My Properties</h1>

    <a href="{{ route('agent.properties.create') }}" class="btn btn-primary">
        Add New Property
    </a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Link</th>
            <th>Description</th>
            <th>Availability</th>
            <th>Type</th>
            <th>Visibility</th>
            <th>Price</th>
            <th>Image</th>
            <th>Owner</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($properties as $property)
        <tr>
            <td>{{ $property->id }}</td>
            <td>{{ $property->title }}</td>
            <td>
                <a href="{{ $property->link }}" target="_blank">
                    {{ $property->link }}
                </a>
            </td>
            <td>{{ $property->description ?? '-' }}</td>
            <td>{{ $property->availability_status }}</td>
            <td>{{ $property->property_type }}</td>
            <td>{{ $property->visibility_status }}</td>
            <td>${{ number_format($property->price, 2) }}</td>

            <td>
                @if($property->image)
                    <img src="{{ asset('storage/'.$property->image) }}" width="100">
                @endif
            </td>

            <td>{{ $property->user ? $property->user->name : '-' }}</td>

            <td class="d-flex gap-2">

                {{-- EDIT (AGENT ROUTE) --}}
                <a href="{{ route('agent.properties.edit', $property->id) }}"
                   class="btn btn-sm btn-warning">
                    Edit
                </a>

                {{-- VIEW (OPTIONAL - unaweza kuondoa kama hutaki agent view single page) --}}
                <a href="{{ route('agent.properties.show', $property->id) }}"
                   class="btn btn-info btn-sm">
                    View
                </a>

                {{-- DELETE (AGENT ROUTE) --}}
                <form action="{{ route('agent.properties.destroy', $property->id) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Delete this property?')">
                        Delete
                    </button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection