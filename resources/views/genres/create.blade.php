<!-- resources/views/genres/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create new genres</h2>
        <form action="{{ route('genres.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Genre name</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
