<!-- resources/views/authors/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Author</h2>
        <form action="{{ route('authors.update', $author->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Author name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $author->name }}" required>
            </div>
            <div class="form-group">
                <label for="url">Author URL</label>
                <input type="text" name="url" class="form-control" id="url" value="{{ $author->url }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
