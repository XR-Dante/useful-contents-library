<!-- resources/views/categories/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Categories list</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Create new category</a>
        <table class="table mt-3">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
