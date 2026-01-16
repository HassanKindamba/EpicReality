@extends('layouts.admin')

@section('title','Add Agent')

@section('content')
<h1>Add Agent</h1>
<form action="{{ route('agents.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <!-- <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div> -->
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Photo</label>
        <input type="file" name="photo" class="form-control">
    </div>
    <button class="btn btn-success">Save</button>
</form>
@endsection
