@extends('layouts.admin')

@section('title','Add Service')

@section('content')
<h1>Add Service</h1>
<form action="{{ route('services.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="4" required></textarea>
    </div>
    <button class="btn btn-success">Save</button>
</form>
@endsection
