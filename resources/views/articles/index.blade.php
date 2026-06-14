@extends('layouts.app')
@section('title', 'Articles')

@section('content')

<section class="page-hero">
    <div class="container position-relative">
        <p class="section-label mb-2" style="color:#93C5FD;">Insights & News</p>
        <h1 style="font-size:clamp(2rem,4vw,3rem);font-weight:800;line-height:1.1;" class="mb-3">Latest Articles</h1>
        <p class="mb-0" style="color:rgba(255,255,255,.6);font-size:1.05rem;max-width:540px;">Thought leadership, product updates, and industry insights from the AI-Solutions team.</p>
    </div>
</section>

<section style="padding:80px 0;">
    <div class="container">
        @if($articles->isNotEmpty())
        <div class="row g-4">
            @foreach($articles as $article)
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('articles.show', $article) }}" class="text-decoration-none d-block h-100">
                    <div class="card h-100">
                        <div class="p-1 pb-0">
                            @if($article->image)
                            <img src="{{ asset('storage/'.$article->image) }}" class="w-100 rounded-top-2" style="height:192px;object-fit:cover;" alt="{{ $article->title }}">
                            @else
                            <div class="rounded-top-2 d-flex align-items-center justify-content-center" style="height:152px;background:var(--slate-100);">
                                <i class="bi bi-newspaper" style="font-size:2rem;color:var(--blue);opacity:.4;"></i>
                            </div>
                            @endif
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="d-flex align-items-center gap-3 mb-3" style="font-size:.775rem;color:var(--slate-400);font-weight:500;">
                                <span><i class="bi bi-calendar3 me-1"></i>{{ $article->published_at->format('d M Y') }}</span>
                                <span><i class="bi bi-person me-1"></i>{{ $article->author }}</span>
                            </div>
                            <h6 style="font-weight:700;color:var(--slate-900);line-height:1.45;font-size:.9375rem;" class="mb-2">{{ $article->title }}</h6>
                            <p style="font-size:.875rem;color:var(--slate-500);" class="mb-3 flex-grow-1">{{ Str::limit($article->excerpt, 110) }}</p>
                            <span style="font-size:.825rem;font-weight:600;color:var(--blue);">Read article <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @if($articles->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $articles->links() }}
        </div>
        @endif
        @else
        <div class="text-center py-5">
            <i class="bi bi-newspaper display-1 text-muted opacity-20"></i>
            <p class="text-muted mt-3">No articles published yet. Check back soon.</p>
        </div>
        @endif
    </div>
</section>

@endsection
