<!-- resources/views/genres/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Genres list</h2>
        <a href="{{ route('genres.create') }}" class="btn btn-primary">Create new genre</a>
        <table class="table mt-3">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($genres as $genre)
                <tr>
                    <td>{{ $genre->id }}</td>
                    <td>{{ $genre->name }}</td>
                    <td>
                        @hasrole('admin')
                        @can('edit')
                        <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning">Edit</a>
                        @endcan
                        @endhasrole
                        @hasrole('admin')
                        @can('edit')
                        <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display:inline;">
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
