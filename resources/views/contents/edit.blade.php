<!-- resources/views/contents/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Content</h2>
        <form action="{{ route('contents.update', $content->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Content name</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $content->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Content description</label>
                <textarea name="description" class="form-control" id="description" required>{{ $content->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="url">Content URL</label>
                <input type="text" name="url" class="form-control" id="url" value="{{ $content->url }}" required>
            </div>
            <div class="form-group">
                <label for="category">Categories</label>
                <select name="category_id" class="form-control" id="category" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $content->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="genres">Genres</label>
                <select name="genre_ids[]" class="form-control" id="genres" multiple required>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ in_array($genre->id, $content->genres->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="authors">Authors</label>
                <select name="author_ids[]" class="form-control" id="authors" multiple required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ in_array($author->id, $content->authors->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
