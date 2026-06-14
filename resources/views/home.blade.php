@extends('layouts.app')
@section('title', 'Home')

@section('content')

{{-- ── Hero ──────────────────────────────────────────── --}}
<section class="hero">
    <div class="container position-relative">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="hero-eyebrow mb-4">
                    <i class="bi bi-geo-alt-fill" style="color:#60A5FA;font-size:.75rem;"></i>
                    Headquartered in Sunderland · Global Impact
                </div>
                <h1 class="mb-4">Innovate the Future of the <span class="highlight">Digital Employee Experience</span></h1>
                <p class="lead mb-5">We leverage AI to rapidly and proactively address issues impacting your workforce — speeding up design, engineering, and innovation across every industry.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('services') }}" class="btn btn-primary px-4 py-3" style="font-size:.9375rem;border-radius:10px;">
                        Explore Solutions <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light px-4 py-3" style="font-size:.9375rem;border-radius:10px;">
                        Get In Touch
                    </a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="stat-pill">
                            <div class="num">200+</div>
                            <div class="lbl">Projects Delivered</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-pill">
                            <div class="num">15+</div>
                            <div class="lbl">Industries Served</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-pill">
                            <div class="num">98%</div>
                            <div class="lbl">Client Satisfaction</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-pill">
                            <div class="num">24/7</div>
                            <div class="lbl">AI-Powered Support</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── Trusted By ────────────────────────────────────── --}}
<div style="background:var(--slate-50);border-top:1px solid var(--slate-200);border-bottom:1px solid var(--slate-200);padding:20px 0;">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center gap-5 text-muted" style="font-size:.8rem;font-weight:600;letter-spacing:.08em;text-transform:uppercase;">
            <span>Healthcare</span>
            <span style="color:var(--slate-200)">|</span>
            <span>Financial Services</span>
            <span style="color:var(--slate-200)">|</span>
            <span>Manufacturing</span>
            <span style="color:var(--slate-200)">|</span>
            <span>Retail</span>
            <span style="color:var(--slate-200)">|</span>
            <span>Logistics</span>
            <span style="color:var(--slate-200)">|</span>
            <span>Education</span>
        </div>
    </div>
</div>

{{-- ── Services ──────────────────────────────────────── --}}
<section class="py-5 py-lg-6" style="padding-top:80px!important;padding-bottom:80px!important;">
    <div class="container">
        <div class="row align-items-end mb-5">
            <div class="col-lg-6">
                <p class="section-label mb-2">What We Do</p>
                <h2 class="section-heading mb-0">AI Solutions Built for the Modern Enterprise</h2>
            </div>
            <div class="col-lg-5 offset-lg-1 mt-3 mt-lg-0">
                <p class="section-sub mb-0">From intelligent virtual assistants to rapid prototyping — every solution is designed to create measurable impact from day one.</p>
            </div>
        </div>

        @if($services->isNotEmpty())
        <div class="row g-4">
            @foreach($services as $service)
            <div class="col-md-6 col-lg-4">
                <div class="card p-4 h-100">
                    <div class="icon-box mb-4">
                        <i class="bi {{ $service->icon }}"></i>
                    </div>
                    <h5 class="mb-2" style="font-size:1rem;font-weight:700;">{{ $service->title }}</h5>
                    <p class="mb-0" style="font-size:.9rem;">{{ Str::limit($service->description, 130) }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="text-center mt-5">
            <a href="{{ route('services') }}" class="btn btn-outline-primary px-4 py-2">
                View All Services <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>

{{-- ── Industries ────────────────────────────────────── --}}
<section class="bg-offwhite" style="padding:80px 0;border-top:1px solid var(--slate-200);border-bottom:1px solid var(--slate-200);">
    <div class="container">
        <div class="text-center mb-5">
            <p class="section-label mb-2">Case Studies</p>
            <h2 class="section-heading mb-2">Transforming Industries with AI</h2>
            <p class="section-sub">Proven results across healthcare, finance, manufacturing and more</p>
        </div>

        @if($industries->isNotEmpty())
        <div class="row g-4">
            @foreach($industries as $industry)
            <div class="col-lg-4">
                <div class="card h-100 overflow-hidden">
                    <div class="p-1 pb-0">
                        @if($industry->image)
                        <img src="{{ asset('storage/'.$industry->image) }}" class="w-100 rounded-top-2" style="height:180px;object-fit:cover;" alt="{{ $industry->name }}">
                        @else
                        <div class="rounded-top-2 d-flex align-items-center justify-content-center" style="height:160px;background:var(--navy);">
                            <i class="bi bi-building fs-1 text-white opacity-25"></i>
                        </div>
                        @endif
                    </div>
                    <div class="card-body p-4">
                        <span class="badge-industry mb-3 d-inline-block">{{ $industry->name }}</span>
                        <h5 class="mb-2" style="font-size:1rem;font-weight:700;line-height:1.4;">{{ $industry->title }}</h5>
                        <p style="font-size:.875rem;" class="mb-0">{{ Str::limit($industry->description, 110) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="text-center mt-5">
            <a href="{{ route('industries') }}" class="btn btn-outline-primary px-4 py-2">
                All Case Studies <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>

{{-- ── Testimonials Carousel ─────────────────────────── --}}
@if($testimonials->isNotEmpty())
<section style="padding:80px 0;">
    <div class="container">
        <div class="d-flex flex-wrap align-items-end justify-content-between mb-5 gap-3">
            <div>
                <p class="section-label mb-2">Client Feedback</p>
                <h2 class="section-heading mb-1">Trusted by Forward-Thinking Companies</h2>
                <p class="section-sub mb-0">What our clients say about working with AI-Solutions</p>
            </div>
            <div class="d-flex gap-2">
                <button class="tns-prev" aria-label="Previous" style="width:38px;height:38px;border:1px solid var(--slate-200);background:#fff;border-radius:10px;display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--slate-500);transition:all .15s;">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <button class="tns-next" aria-label="Next" style="width:38px;height:38px;border:1px solid var(--slate-200);background:#fff;border-radius:10px;display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--slate-500);transition:all .15s;">
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>

    {{-- Full-width slider --}}
    <div class="testimonial-track-outer" style="overflow:hidden;padding-bottom:4px;">
        <div class="testimonial-track" id="testimonialTrack" style="display:flex;gap:1.5rem;transition:transform .45s cubic-bezier(.4,0,.2,1);will-change:transform;padding:0 calc((100vw - 1200px)/2);width:max-content;">
            @foreach($testimonials as $t)
            <div class="testimonial-slide" style="width:360px;flex-shrink:0;">
                <div class="card p-4 h-100" style="min-height:220px;display:flex;flex-direction:column;">
                    <div class="stars mb-3" style="font-size:.85rem;color:#F59E0B;">
                        @for($i=1;$i<=5;$i++)<i class="bi {{ $i<=$t->rating?'bi-star-fill':'bi-star' }}"></i>@endfor
                    </div>
                    <p style="font-size:.9rem;line-height:1.75;color:var(--slate-700);flex-grow:1;" class="mb-4">"{{ $t->feedback }}"</p>
                    <div class="d-flex align-items-center gap-3 pt-3" style="border-top:1px solid var(--slate-100);margin-top:auto;">
                        <div class="avatar-init">{{ strtoupper(substr($t->client_name,0,1)) }}</div>
                        <div>
                            <div style="font-weight:700;font-size:.875rem;color:var(--slate-900);">{{ $t->client_name }}</div>
                            <div style="font-size:.775rem;color:var(--slate-500);">{{ $t->job_title }}@if($t->job_title && $t->company), @endif{{ $t->company }}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Dots --}}
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mt-4">
            <div id="testimonialDots" class="d-flex gap-2">
                @foreach($testimonials as $idx => $t)
                <button class="tns-dot {{ $idx===0?'active':'' }}" data-index="{{ $idx }}" style="width:{{ $idx===0?'24px':'8px' }};height:8px;border-radius:4px;border:none;background:{{ $idx===0?'var(--blue)':'var(--slate-200)' }};padding:0;cursor:pointer;transition:all .25s;"></button>
                @endforeach
            </div>
            <a href="{{ route('testimonials') }}" class="btn btn-outline-primary btn-sm px-4">
                All Reviews <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>
@endif

@push('scripts')
<script>
(function() {
    const track  = document.getElementById('testimonialTrack');
    if (!track) return;

    const slides  = track.querySelectorAll('.testimonial-slide');
    const dots    = document.querySelectorAll('.tns-dot');
    const prevBtn = document.querySelector('.tns-prev');
    const nextBtn = document.querySelector('.tns-next');
    if (!slides.length) return;

    const GAP   = 24;
    const WIDTH = 360;
    let current = 0;
    let timer;

    function getPad() {
        const vw = window.innerWidth;
        return Math.max(16, (vw - 1200) / 2);
    }

    function goTo(idx) {
        current = (idx + slides.length) % slides.length;
        const offset = current * (WIDTH + GAP);
        track.style.transform = `translateX(-${offset}px)`;

        dots.forEach((d, i) => {
            const active = i === current;
            d.style.width  = active ? '24px' : '8px';
            d.style.background = active ? 'var(--blue)' : 'var(--slate-200)';
        });
    }

    function next() { goTo(current + 1); }
    function prev() { goTo(current - 1); }

    nextBtn.addEventListener('click', () => { clearInterval(timer); next(); startAuto(); });
    prevBtn.addEventListener('click', () => { clearInterval(timer); prev(); startAuto(); });
    dots.forEach(d => d.addEventListener('click', () => { clearInterval(timer); goTo(+d.dataset.index); startAuto(); }));

    // Swipe support
    let startX = 0;
    track.addEventListener('touchstart', e => { startX = e.touches[0].clientX; }, {passive:true});
    track.addEventListener('touchend',   e => {
        const dx = e.changedTouches[0].clientX - startX;
        if (Math.abs(dx) > 40) { clearInterval(timer); dx < 0 ? next() : prev(); startAuto(); }
    }, {passive:true});

    function startAuto() { timer = setInterval(next, 4500); }

    // Pause on hover
    track.addEventListener('mouseenter', () => clearInterval(timer));
    track.addEventListener('mouseleave', () => { clearInterval(timer); startAuto(); });

    // Init
    goTo(0);
    startAuto();
})();
</script>
@endpush

{{-- ── Articles ──────────────────────────────────────── --}}
@if($articles->isNotEmpty())
<section class="bg-offwhite" style="padding:80px 0;border-top:1px solid var(--slate-200);border-bottom:1px solid var(--slate-200);">
    <div class="container">
        <div class="row align-items-end mb-5">
            <div class="col-lg-6">
                <p class="section-label mb-2">Insights</p>
                <h2 class="section-heading mb-0">Latest Articles</h2>
            </div>
            <div class="col-lg-4 offset-lg-2 text-lg-end mt-3 mt-lg-0">
                <a href="{{ route('articles') }}" class="btn btn-outline-primary px-4 py-2">Browse All <i class="bi bi-arrow-right ms-1"></i></a>
            </div>
        </div>
        <div class="row g-4">
            @foreach($articles as $a)
            <div class="col-md-4">
                <a href="{{ route('articles.show', $a) }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="p-1 pb-0">
                            @if($a->image)
                            <img src="{{ asset('storage/'.$a->image) }}" class="w-100 rounded-top-2" style="height:176px;object-fit:cover;" alt="{{ $a->title }}">
                            @else
                            <div class="rounded-top-2 d-flex align-items-center justify-content-center" style="height:140px;background:var(--slate-100);">
                                <i class="bi bi-newspaper fs-2 text-blue opacity-50"></i>
                            </div>
                            @endif
                        </div>
                        <div class="card-body p-4">
                            <p style="font-size:.78rem;color:var(--slate-400);font-weight:500;" class="mb-2">
                                {{ $a->published_at->format('d M Y') }}
                            </p>
                            <h6 style="font-weight:700;color:var(--slate-900);line-height:1.4;" class="mb-2">{{ $a->title }}</h6>
                            <p style="font-size:.875rem;color:var(--slate-500);" class="mb-0">{{ Str::limit($a->excerpt, 100) }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ── Upcoming Events ───────────────────────────────── --}}
@if($events->isNotEmpty())
<section style="padding:80px 0;">
    <div class="container">
        <div class="text-center mb-5">
            <p class="section-label mb-2">What's On</p>
            <h2 class="section-heading mb-2">Upcoming Events</h2>
            <p class="section-sub">Join the AI-Solutions team at our next events</p>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($events as $event)
            <div class="col-md-6 col-lg-4">
                <div class="card p-4 h-100">
                    <div class="d-flex gap-3 align-items-start">
                        <div class="text-center flex-shrink-0" style="width:52px;background:var(--blue-lt);border-radius:10px;padding:.5rem .25rem;">
                            <div style="font-size:1.4rem;font-weight:800;color:var(--blue);line-height:1;">{{ $event->event_date->format('d') }}</div>
                            <div style="font-size:.7rem;font-weight:700;color:var(--blue);text-transform:uppercase;letter-spacing:.04em;">{{ $event->event_date->format('M') }}</div>
                        </div>
                        <div>
                            <div style="font-weight:700;font-size:.9375rem;color:var(--slate-900);">{{ $event->title }}</div>
                            <div style="font-size:.8rem;color:var(--slate-400);margin-top:.2rem;"><i class="bi bi-geo-alt me-1"></i>{{ $event->location }}</div>
                            <p style="font-size:.85rem;margin-top:.6rem;" class="mb-0">{{ Str::limit($event->description, 90) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('events') }}" class="btn btn-outline-primary px-4 py-2">All Events <i class="bi bi-arrow-right ms-1"></i></a>
        </div>
    </div>
</section>
@endif

{{-- ── CTA Band ──────────────────────────────────────── --}}
<div class="cta-band">
    <div class="container position-relative">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6">
                <p class="section-label mb-3" style="color:#93C5FD;">Ready to Transform?</p>
                <h2 style="font-size:clamp(1.6rem,3vw,2.25rem);font-weight:800;color:#fff;line-height:1.2;" class="mb-3">Start your AI journey today</h2>
                <p style="color:rgba(255,255,255,.55);font-size:1.05rem;" class="mb-5">Tell us about your specific requirements and we'll design a solution around your exact needs.</p>
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                    <a href="{{ route('contact') }}" class="btn-cta-primary btn">Get a Free Consultation</a>
                    <a href="{{ route('services') }}" class="btn-cta-outline btn">View Services</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
