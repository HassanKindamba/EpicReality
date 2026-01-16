@extends('layouts.admin')

@section('title','Edit Home')

@section('content')
<h1>Edit Home</h1>
<form action="{{ route('homes.update', $home->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Address</label>
        <input type="text" name="address" class="form-control" value="{{ $home->address }}" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="4" required>{{ $home->description }}</textarea>
    </div>
    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
        @if($home->image)
            <img src="{{ asset('storage/'.$home->image) }}" width="100" class="mt-2">
        @endif
    </div>
    <button class="btn btn-success">Update</button>
</form>
@endsection
