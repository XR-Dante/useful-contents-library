<!-- resources/views/contents/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Contents</h2>


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
                            <a href="/contents" class="card-link text-decoration-underline text-primary">Show contents</a>
                        </div>


                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
