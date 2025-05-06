<!-- resources/views/authors/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create new author</h2>
        <form action="{{ route('authors.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Authors name</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="url">Authors URL</label>
                <input type="text" name="url" class="form-control" id="url" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
