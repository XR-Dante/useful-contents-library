<!-- resources/views/create_all.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Kontentni qo'shish</h2>

        <form action="{{ route('store.all') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Kontent nomi</label>
                <input type="text" name="title" class="form-control" id="title" required>
            </div>

            <div class="form-group">
                <label for="description">Kontent tavsifi</label>
                <textarea name="description" class="form-control" id="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="url">Kontent URL</label>
                <input type="text" name="url" class="form-control" id="url" required>
            </div>

            <div class="form-group">
                <label for="category">Kategoriya</label>
                <select name="category_id" class="form-control" id="category" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="genres">Janrlar</label>
                <select name="genre_ids[]" class="form-control" id="genres" multiple required>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="authors">Mualliflar</label>
                <select name="author_ids[]" class="form-control" id="authors" multiple required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Saqlash</button>
        </form>
    </div>
@endsection
