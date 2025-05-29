@extends('layouts.app')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    /* Umumiy animatsiya uchun */
    .fade-up {
        opacity: 0;
        transform: translateY(30px);
    }

    /* Avatar uchun */
    .avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        color: #fff;
        font-weight: 700;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(38, 109, 254, 0.4);
        user-select: none;
        flex-shrink: 0;
    }

    /* Kontent karta hover effekti */
    .hover-card {
        transition: transform 0.35s ease, box-shadow 0.35s ease;
        cursor: pointer;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.07);
        background: #fff;
    }
    .hover-card:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    /* Responsive iframe o'rnatish */
    .responsive-iframe {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%; /* 16:9 nisbat */
        height: 0;
        overflow: hidden;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }
    .responsive-iframe iframe {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        border: 0;
        border-radius: 16px;
    }

    /* Tugmalar uchun */
    .btn-rounded-pill {
        border-radius: 50px;
        padding-left: 2rem;
        padding-right: 2rem;
        font-weight: 600;
        font-size: 1.05rem;
        box-shadow: 0 6px 15px rgba(38, 109, 254, 0.3);
        transition: box-shadow 0.3s ease;
    }
    .btn-rounded-pill:hover {
        box-shadow: 0 10px 25px rgba(38, 109, 254, 0.5);
    }

    /* Sidebar badges */
    .badge-category {
        font-size: 1rem;
        padding: 0.55em 1.15em;
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        color: #fff;
        font-weight: 700;
        box-shadow: 0 3px 14px rgba(101, 54, 255, 0.4);
    }

    /* Izohlar konteyner */
    .comment-body {
        background-color: #f6f8ff;
        padding: 1rem 1.25rem;
        border-radius: 12px;
        box-shadow: 0 3px 10px rgba(101, 54, 255, 0.1);
        font-size: 1rem;
        line-height: 1.4;
    }
    .comment-author {
        font-size: 0.875rem;
        color: #777;
        margin-top: 0.35rem;
        user-select: none;
    }

    /* Umumiy konteyner */
    .container.py-5 {
        max-width: 1140px;
    }

</style>
@endpush

@section('content')
<div class="container py-5">
    <div class="row g-4">
        {{-- MAIN CONTENT --}}
        <div class="col-lg-8 fade-up">
            <div class="card border-0 shadow-lg rounded-4 p-4 bg-white">
                <h2 class="mb-4 text-primary fw-bold">
                    <a href="{{ $content->url }}" target="_blank" class="text-decoration-none text-primary-hover">
                        {{ $content->title }}
                    </a>
                </h2>

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

                <button class="btn"><i class="fa fa-home"></i></button>
                <div class="d-flex gap-3 flex-wrap mb-4">
                    <button class="btn btn-primary btn-rounded-pill d-flex align-items-center gap-2">
                        <i class="bi bi-bookmark-fill fs-5"></i> Saqlash
                    </button>
                    <button class="btn btn-success btn-rounded-pill d-flex align-items-center gap-2">
                        <i class="bi bi-hand-thumbs-up-fill fs-5"></i> Yoqtirish
                    </button>
                </div>

                <p class="lead fw-semibold mb-4"><strong>Tavsif:</strong> {{ $content->description }}</p>

                <hr>

                <h5 class="fw-bold mb-3">💬 Izohlar</h5>

                @if($content->comments->isNotEmpty())
                    @foreach($content->comments as $comment)
                        <div class="d-flex gap-3 align-items-start mb-4">
                            <div class="avatar shadow-sm">
                                {{ strtoupper(substr($comment->user->name ?? 'M', 0, 1)) }}
                            </div>
                            <div>
                                <div class="comment-body">
                                    {{ $comment->body }}
                                </div>
                                <div class="comment-author">{{ $comment->user->name ?? 'Mehmon' }}</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted fst-italic">Hozircha izohlar mavjud emas.</p>
                @endif

                {{-- Izoh yozish formasi --}}
                @if(auth()->check())
                    <form action="{{ route('contents.storeComment', $content->id) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-3">
                            <textarea name="body" rows="4" class="form-control" placeholder="Izohingizni kiriting..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-rounded-pill">Izoh qoldirish</button>
                    </form>
                @else
                    <p class="mt-4">Izoh qoldirish uchun <a href="{{ route('login') }}">tizimga kiring</a>.</p>
                @endif
            </div>
        </div>

        {{-- SIDEBAR --}}
        <div class="col-lg-4 fade-up">
            {{-- Kategoriya --}}
            <div class="card shadow-sm rounded-4 mb-4 p-3 border-0">
                <div class="card-body">
                    <p class="mb-2 fw-semibold">📂 Kategoriya:</p>
                    <span class="badge badge-category rounded-pill">
                        {{ $content->category->name ?? 'Nomaʼlum' }}
                    </span>
                </div>
            </div>

            {{-- O‘xshash kontentlar --}}
            <div class="card shadow-sm rounded-4 p-3 border-0">
                <div class="card-body">
                    <h5 class="fw-bold mb-4">🎬 O‘xshash kontentlar</h5>
                    @php $relateds = $content->relatedContents(); @endphp

                    @if($relateds->isNotEmpty())
                        @foreach($relateds as $related)
                            <div class="hover-card mb-3">
                                @if(Str::contains($related->url, ['youtube.com', 'youtu.be']))
                                    <div class="ratio ratio-16x9">
                                        <iframe
                                            src="{{ Str::contains($related->url, 'watch?v=')
                                                ? str_replace('watch?v=', 'embed/', $related->url)
                                                : str_replace('youtu.be/', 'www.youtube.com/embed/', $related->url) }}"
                                            title="{{ $related->title }}"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                @elseif(Str::endsWith($related->url, ['.jpg', '.jpeg', '.png', '.gif', '.webp']))
                                    <img src="{{ $related->url }}" alt="{{ $related->title }}" class="card-img-top" style="height: 250px; object-fit: contain;">
                                @else
                                    <img src="{{ asset('images/default-image.png') }}" alt="Default image" class="card-img-top" style="height: 250px; object-fit: contain;">
                                @endif
                                <div class="card-body p-2">
                                    <a href="{{ route('contents.show', $related->id) }}"
                                       class="fw-semibold text-dark text-decoration-none">
                                        {{ \Illuminate\Support\Str::limit($related->title, 60) }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted fst-italic">O‘xshash kontentlar mavjud emas.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script>
    gsap.utils.toArray('.fade-up').forEach((el, i) => {
        gsap.to(el, {
            opacity: 1,
            y: 0,
            duration: 0.85,
            delay: i * 0.25,
            ease: "power3.out"
        });
    });
</script>
@endpush
