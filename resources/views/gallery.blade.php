@extends('layouts.app')
@section('title', 'Photo Gallery')

@push('styles')
<style>
.gallery-img-wrap { overflow:hidden; border-radius:10px; aspect-ratio:4/3; cursor:zoom-in; }
.gallery-img-wrap img { width:100%; height:100%; object-fit:cover; transition:transform .3s ease; display:block; }
.gallery-img-wrap:hover img { transform:scale(1.04); }
.filter-pill { background:transparent; border:1px solid var(--slate-200); color:var(--slate-500); font-size:.825rem; font-weight:600; padding:.4rem 1rem; border-radius:999px; cursor:pointer; transition:all .15s; }
.filter-pill:hover, .filter-pill.active { background:var(--blue); border-color:var(--blue); color:#fff; }
</style>
@endpush

@section('content')

<section class="page-hero">
    <div class="container position-relative">
        <p class="section-label mb-2" style="color:#93C5FD;">Moments & Milestones</p>
        <h1 style="font-size:clamp(2rem,4vw,3rem);font-weight:800;line-height:1.1;" class="mb-3">Photo Gallery</h1>
        <p class="mb-0" style="color:rgba(255,255,255,.6);font-size:1.05rem;max-width:540px;">Highlights from our promotional events, product launches, and team milestones.</p>
    </div>
</section>

<section style="padding:64px 0 80px;">
    <div class="container">

        @if($events->isNotEmpty())
        <div class="d-flex flex-wrap gap-2 mb-5">
            <button class="filter-pill active" data-filter="all">All Photos</button>
            @foreach($events as $evt)
            <button class="filter-pill" data-filter="{{ Str::slug($evt) }}">{{ $evt }}</button>
            @endforeach
        </div>
        @endif

        @if($images->isNotEmpty())
        <div class="row g-3" id="galleryGrid">
            @foreach($images as $image)
            <div class="col-6 col-md-4 col-lg-3 gallery-item" data-event="{{ Str::slug($image->event_name) }}">
                <div class="gallery-img-wrap"
                     data-bs-toggle="modal" data-bs-target="#lightbox"
                     data-img="{{ asset('storage/'.$image->image_path) }}"
                     data-title="{{ $image->title }}"
                     data-event-name="{{ $image->event_name }}">
                    <img src="{{ asset('storage/'.$image->image_path) }}" alt="{{ $image->title }}" loading="lazy">
                </div>
                <div class="mt-2">
                    <div style="font-size:.825rem;font-weight:600;color:var(--slate-700);">{{ $image->title }}</div>
                    @if($image->event_name)
                    <div style="font-size:.75rem;color:var(--slate-400);">{{ $image->event_name }}</div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-images display-1 text-muted opacity-20"></i>
            <p class="text-muted mt-3 fs-5">Gallery photos coming soon.</p>
        </div>
        @endif
    </div>
</section>

{{-- Lightbox Modal --}}
<div class="modal fade" id="lightbox" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" style="max-width:900px;">
        <div class="modal-content border-0" style="background:#0a0f1a;border-radius:16px;overflow:hidden;">
            <div class="modal-header border-0 px-4 py-3">
                <div>
                    <div id="lbTitle" style="color:#fff;font-weight:700;font-size:1rem;"></div>
                    <div id="lbEvent" style="color:rgba(255,255,255,.4);font-size:.8rem;"></div>
                </div>
                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <img id="lbImg" src="" alt="" class="w-100 d-block" style="max-height:75vh;object-fit:contain;">
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Lightbox
document.querySelectorAll('.gallery-img-wrap[data-bs-toggle="modal"]').forEach(el => {
    el.addEventListener('click', () => {
        document.getElementById('lbImg').src = el.dataset.img;
        document.getElementById('lbTitle').textContent = el.dataset.title;
        document.getElementById('lbEvent').textContent = el.dataset.eventName || '';
    });
});

// Filter
document.querySelectorAll('.filter-pill').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.filter-pill').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        const f = this.dataset.filter;
        document.querySelectorAll('.gallery-item').forEach(item => {
            item.style.display = (f === 'all' || item.dataset.event === f) ? '' : 'none';
        });
    });
});
</script>
@endpush

@endsection
