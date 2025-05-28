@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Kontentlar</h1>

    @hasrole('admin')
        @can('edit')
            <div class="mb-4">
                <a href="{{ route('contents.create') }}" class="btn btn-primary">Yangi kontent yaratish</a>
            </div>
        @endcan
    @endhasrole

    <div class="row g-4">
        @foreach ($contents as $content)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm rounded-3">

                    @if(Str::contains($content->url, ['youtube.com', 'youtu.be']))
                        <div class="ratio ratio-16x9">
                            <iframe
                                src="{{ Str::contains($content->url, 'watch?v=')
                                    ? str_replace('watch?v=', 'embed/', $content->url)
                                    : str_replace('youtu.be/', 'www.youtube.com/embed/', $content->url) }}"
                                title="{{ $content->title }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                    @elseif(Str::endsWith($content->url, ['.jpg', '.jpeg', '.png', '.gif', '.webp']))
                        <img src="{{ $content->url }}" alt="{{ $content->title }}" class="card-img-top" style="height: 250px; object-fit: contain;">
                    @else
                        <img src="{{ asset('images/default-image.png') }}" alt="Default image" class="card-img-top" style="height: 250px; object-fit: contain;">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $content->title }}</h5>
                        <p class="card-text text-truncate" title="{{ $content->description }}">{{ $content->description }}</p>

                        <p class="mb-2"><strong>Mualliflar:</strong>
                            @foreach ($content->authors as $author)
                                <a href="{{ $author->url }}" target="_blank" class="text-primary text-decoration-underline">
                                    {{ $author->name }}
                                </a>@if (!$loop->last), @endif
                            @endforeach
                        </p>

                        @unless(Str::contains($content->url, ['youtube.com', 'youtu.be']))
                            <div>
                                @foreach ($content->authors as $author)
                                    <a href="{{ $author->url }}" target="_blank" class="btn btn-sm btn-outline-primary me-2 mb-2">
                                        Kitobni ko‘rish ({{ $author->name }})
                                    </a>
                                @endforeach
                            </div>
                        @endunless

                        <a href="{{ route('contents.show', $content->id) }}" class="btn btn-outline-secondary mt-auto align-self-start">To‘liq ko‘rish</a>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        @hasrole('admin')
                            @can('edit')
                                <a href="{{ route('contents.edit', $content->id) }}" class="btn btn-warning btn-sm">Tahrirlash</a>
                            @endcan

                            @can('delete')
                                <form action="{{ route('contents.destroy', $content->id) }}" method="POST" onsubmit="return confirm('Rostdan ham o‘chirmoqchimisiz?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">O‘chirish</button>
                                </form>
                            @endcan
                        @endhasrole
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
