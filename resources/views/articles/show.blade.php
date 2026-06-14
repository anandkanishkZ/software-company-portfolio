@extends('layouts.app')
@section('title', $article->title)

@section('content')

<section class="page-hero">
    <div class="container position-relative">
        <div class="col-lg-8">
            <p class="section-label mb-3" style="color:#93C5FD;">
                <a href="{{ route('articles') }}" style="color:#93C5FD;text-decoration:none;"><i class="bi bi-arrow-left me-1"></i>Articles</a>
            </p>
            <h1 style="font-size:clamp(1.75rem,4vw,2.5rem);font-weight:800;line-height:1.2;" class="mb-4">{{ $article->title }}</h1>
            <div class="d-flex flex-wrap gap-3" style="font-size:.85rem;color:rgba(255,255,255,.5);">
                <span><i class="bi bi-calendar3 me-1"></i>{{ $article->published_at->format('d M Y') }}</span>
                <span><i class="bi bi-person me-1"></i>{{ $article->author }}</span>
            </div>
        </div>
    </div>
</section>

<section style="padding:64px 0 80px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if($article->image)
                <img src="{{ asset('storage/'.$article->image) }}" class="img-fluid w-100 mb-5" style="border-radius:12px;max-height:420px;object-fit:cover;" alt="{{ $article->title }}">
                @endif

                <div style="font-size:1.0625rem;line-height:1.85;color:var(--slate-700);">
                    {!! nl2br(e($article->content)) !!}
                </div>

                <div class="d-flex align-items-center gap-3 mt-5 pt-4" style="border-top:1px solid var(--slate-200);">
                    <a href="{{ route('articles') }}" class="btn btn-outline-primary px-4 py-2">
                        <i class="bi bi-arrow-left me-1"></i>Back to Articles
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-primary px-4 py-2">
                        Get in Touch
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
