<!-- resources/views/contents/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Contents</h2>
        <div class="mt-4">
            <a href="{{ route('contents.create') }}" class="btn btn-primary">Create new content</a>
        </div>

        <div class="row mt-4">
            @foreach ($contents as $content)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">

                        <img src="{{ asset('image/images.jpg') }}" alt="Image" class="card-img-top" style=" height: 350px !important;">

                        <div class="card-body">
                            <h5 class="card-title">{{ $content->title }}</h5>
                            <p class="card-text">
                                <strong>Authors:</strong> {{ $content->authors->pluck('name')->join(', ') }}
                            </p>
                            <a href="{{ $content->url }}" class="card-link text-decoration-underline text-primary" target="_blank">link</a>
                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('contents.edit', $content->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('contents.destroy', $content->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
