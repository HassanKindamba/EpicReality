@extends('layouts.admin')

@section('title','Add Home')

@section('content')
<h1>Add Home</h1>

<form action="{{ route('admin.homes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label class="form-label">Address</label>
        <input type="text" name="address" class="form-control" placeholder="Enter address" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Eneo</label>
        <input type="text" name="eneo" class="form-control" placeholder="Enter eneo" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Jengo</label>
        <input type="text" name="jengo" class="form-control" placeholder="Enter jengo" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Picha</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Add Home</button>
</form>
@endsection
