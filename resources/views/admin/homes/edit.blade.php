@extends('layouts.admin')

@section('title','Edit Home')

@section('content')
<h1>Edit Home</h1>

<form action="{{ route('admin.homes.update', $home->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Address</label>
        <input type="text" name="address" class="form-control" 
               value="{{ $home->address }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Eneo</label>
        <input type="text" name="eneo" class="form-control" 
               value="{{ $home->eneo }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Jengo</label>
        <input type="text" name="jengo" class="form-control" 
               value="{{ $home->jengo }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Change Picha</label>
        <input type="file" name="image" class="form-control">

        @if($home->image)
            <div class="mt-2">
                <img src="{{ asset('storage/'.$home->image) }}" 
                     width="100" 
                     class="img-thumbnail">
            </div>
        @endif
    </div>

    <button class="btn btn-success">Update Home</button>
</form>
@endsection
