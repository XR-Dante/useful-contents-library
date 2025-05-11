<!-- resources/views/authors/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Authors</h1>
        @hasrole('admin')
        @can('create')
        <a href="{{ route('authors.create') }}" class="btn btn-primary">Create new author</a>
        @endcan
        @endhasrole
        <table class="table mt-3">
            <thead>
            <tr>
                <th>Name</th>
                <th>URL</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($authors as $author)
                <tr>

                    <td>{{ $author->name }}</td>
                    <td>{{ $author->url }}</td>
                    <td>
                        @hasrole('admin')
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
                        @endhasrole

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
