<!-- resources/views/categories/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Categories</h1>
        @hasrole('admin')
        @can('create')
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Create new category</a>
        @endcan
        @endhasrole
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
                        @hasrole('admin')
                        @can('edit')
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        @endcan

                        @can('delete')
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
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
