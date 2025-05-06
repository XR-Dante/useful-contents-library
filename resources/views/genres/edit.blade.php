<!-- resources/views/genres/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit genre</h2>
        <form action="{{ route('genres.update', $genre->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Genre name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $genre->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
