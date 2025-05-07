<!-- resources/views/authors/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Authors list</h2>
        <a href="{{ route('authors.create') }}" class="btn btn-primary">Create new author</a>
        <table class="table mt-3">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>URL</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->url }}</td>
                    <td>
                        @can('edit')
                        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Edit</a>
                        @endcan

                        @can('delete')
                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                            @endcan

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
