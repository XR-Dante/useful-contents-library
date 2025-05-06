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

                        {{-- YouTube video embed --}}
                        @if(Str::contains($content->url, ['youtube.com', 'youtu.be']))
                            <div class="ratio ratio-16x9">
                                <iframe width="100%" height="315"
                                        src="{{ Str::contains($content->url, 'watch?v=')
                                        ? str_replace('watch?v=', 'embed/', $content->url)
                                        : str_replace('youtu.be/', 'www.youtube.com/embed/', $content->url) }}"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                </iframe>
                            </div>
                        @else
                            {{-- Agar bu YouTube bo'lmasa, fallback rasm --}}
                            <img src="{{ asset('image/images.jpg') }}" alt="Image" class="card-img-top" style="height: 250px; object-fit: cover;">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $content->title }}</h5>
                            <p class="card-text">
                                <strong>Authors:</strong> {{ $content->authors->pluck('name')->join(', ') }}
                            </p>

                            @unless(Str::contains($content->url, ['youtube.com', 'youtu.be']))
                                <a href="{{ $content->url }}" class="card-link text-decoration-underline text-primary" target="_blank">External Link</a>
                            @endunless
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
