@extends('layouts.app')
@section('title', 'Home')

@section('content')

{{-- ── Hero ──────────────────────────────────────────── --}}
<section class="hero">
    {{-- Circuit board background decoration --}}
    <div class="hero-circuit" aria-hidden="true">
        <svg viewBox="0 0 900 500" fill="none" xmlns="http://www.w3.org/2000/svg" style="position:absolute;right:0;top:0;width:60%;height:100%;opacity:.06;pointer-events:none;">
            <line x1="100" y1="50" x2="100" y2="450" stroke="#60A5FA" stroke-width="1.5"/>
            <line x1="200" y1="0" x2="200" y2="500" stroke="#60A5FA" stroke-width="1"/>
            <line x1="350" y1="50" x2="350" y2="450" stroke="#60A5FA" stroke-width="1.5"/>
            <line x1="500" y1="0" x2="500" y2="500" stroke="#60A5FA" stroke-width="1"/>
            <line x1="650" y1="50" x2="650" y2="450" stroke="#60A5FA" stroke-width="1.5"/>
            <line x1="800" y1="0" x2="800" y2="500" stroke="#60A5FA" stroke-width="1"/>
            <line x1="0" y1="100" x2="900" y2="100" stroke="#60A5FA" stroke-width="1"/>
            <line x1="0" y1="200" x2="900" y2="200" stroke="#60A5FA" stroke-width="1.5"/>
            <line x1="0" y1="300" x2="900" y2="300" stroke="#60A5FA" stroke-width="1"/>
            <line x1="0" y1="400" x2="900" y2="400" stroke="#60A5FA" stroke-width="1.5"/>
            <circle cx="100" cy="100" r="5" fill="#60A5FA"/>
            <circle cx="200" cy="200" r="4" fill="#60A5FA"/>
            <circle cx="350" cy="100" r="5" fill="#60A5FA"/>
            <circle cx="350" cy="300" r="5" fill="#60A5FA"/>
            <circle cx="500" cy="200" r="4" fill="#60A5FA"/>
            <circle cx="650" cy="100" r="5" fill="#60A5FA"/>
            <circle cx="650" cy="300" r="4" fill="#60A5FA"/>
            <circle cx="800" cy="200" r="5" fill="#60A5FA"/>
            <circle cx="800" cy="400" r="4" fill="#60A5FA"/>
            <rect x="300" y="150" width="100" height="60" rx="6" stroke="#60A5FA" stroke-width="1.5" fill="none"/>
            <rect x="600" y="250" width="100" height="60" rx="6" stroke="#60A5FA" stroke-width="1.5" fill="none"/>
            <line x1="100" y1="100" x2="300" y2="180" stroke="#60A5FA" stroke-width="1" stroke-dasharray="4 4"/>
            <line x1="400" y1="180" x2="650" y2="100" stroke="#60A5FA" stroke-width="1" stroke-dasharray="4 4"/>
            <line x1="650" y1="300" x2="600" y2="280" stroke="#60A5FA" stroke-width="1" stroke-dasharray="4 4"/>
        </svg>
        {{-- Glowing orbs --}}
        <div style="position:absolute;width:400px;height:400px;border-radius:50%;background:radial-gradient(circle,rgba(37,99,235,.15) 0%,transparent 70%);top:-100px;right:-50px;pointer-events:none;"></div>
        <div style="position:absolute;width:250px;height:250px;border-radius:50%;background:radial-gradient(circle,rgba(96,165,250,.1) 0%,transparent 70%);bottom:0;right:35%;pointer-events:none;"></div>
    </div>

    <div class="container position-relative">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
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
                <div class="row g-3 mt-2">
                    <div class="col-6 col-sm-3 col-lg-6 col-xl-3">
                        <div class="stat-pill">
                            <div class="num">200+</div>
                            <div class="lbl">Projects Delivered</div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-6 col-xl-3">
                        <div class="stat-pill">
                            <div class="num">15+</div>
                            <div class="lbl">Industries Served</div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-6 col-xl-3">
                        <div class="stat-pill">
                            <div class="num">98%</div>
                            <div class="lbl">Client Satisfaction</div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-6 col-xl-3">
                        <div class="stat-pill">
                            <div class="num">24/7</div>
                            <div class="lbl">AI-Powered Support</div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- AI Robot Illustration --}}
            <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center">
                <div style="position:relative;width:420px;height:420px;flex-shrink:0;">
                    {{-- Pulsing glow ring --}}
                    <div class="hero-ring" style="position:absolute;inset:0;border-radius:50%;border:2px solid rgba(96,165,250,.2);animation:ringPulse 3s ease-in-out infinite;"></div>
                    <div class="hero-ring" style="position:absolute;inset:20px;border-radius:50%;border:1px solid rgba(96,165,250,.15);animation:ringPulse 3s ease-in-out infinite .5s;"></div>

                    {{-- Robot SVG --}}
                    <svg viewBox="0 0 300 340" fill="none" xmlns="http://www.w3.org/2000/svg"
                         style="position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:300px;height:340px;filter:drop-shadow(0 0 32px rgba(37,99,235,.35));animation:robotFloat 4s ease-in-out infinite;">

                        {{-- Antenna --}}
                        <line x1="150" y1="20" x2="150" y2="50" stroke="#60A5FA" stroke-width="3" stroke-linecap="round"/>
                        <circle cx="150" cy="14" r="7" fill="#2563EB" stroke="#60A5FA" stroke-width="2"/>
                        <circle cx="150" cy="14" r="3" fill="#93C5FD">
                            <animate attributeName="opacity" values="1;0.3;1" dur="1.5s" repeatCount="indefinite"/>
                        </circle>

                        {{-- Head --}}
                        <rect x="80" y="50" width="140" height="110" rx="20" fill="#1E3A5F" stroke="#2563EB" stroke-width="2"/>
                        <rect x="88" y="58" width="124" height="94" rx="14" fill="#0F2440"/>

                        {{-- Eyes --}}
                        <rect x="100" y="80" width="38" height="28" rx="8" fill="#0A1628"/>
                        <rect x="162" y="80" width="38" height="28" rx="8" fill="#0A1628"/>
                        <ellipse cx="119" cy="94" rx="13" ry="11" fill="#2563EB">
                            <animate attributeName="fill" values="#2563EB;#60A5FA;#2563EB" dur="2s" repeatCount="indefinite"/>
                        </ellipse>
                        <ellipse cx="181" cy="94" rx="13" ry="11" fill="#2563EB">
                            <animate attributeName="fill" values="#2563EB;#60A5FA;#2563EB" dur="2s" repeatCount="indefinite" begin=".3s"/>
                        </ellipse>
                        <circle cx="119" cy="94" r="5" fill="#93C5FD" opacity=".8"/>
                        <circle cx="181" cy="94" r="5" fill="#93C5FD" opacity=".8"/>

                        {{-- Mouth / LED bar --}}
                        <rect x="105" y="122" width="90" height="10" rx="5" fill="#0A1628"/>
                        <rect x="108" y="124" width="20" height="6" rx="3" fill="#2563EB">
                            <animate attributeName="width" values="20;50;20" dur="2s" repeatCount="indefinite"/>
                        </rect>

                        {{-- Neck --}}
                        <rect x="135" y="160" width="30" height="18" rx="4" fill="#1E3A5F" stroke="#2563EB" stroke-width="1.5"/>

                        {{-- Body --}}
                        <rect x="60" y="178" width="180" height="130" rx="18" fill="#1E3A5F" stroke="#2563EB" stroke-width="2"/>
                        <rect x="72" y="190" width="156" height="106" rx="12" fill="#0F2440"/>

                        {{-- Chest panel --}}
                        <rect x="90" y="204" width="120" height="70" rx="8" fill="#0A1628" stroke="#1D4ED8" stroke-width="1.5"/>

                        {{-- Chest display --}}
                        <rect x="96" y="210" width="50" height="12" rx="3" fill="#1D4ED8" opacity=".6"/>
                        <rect x="96" y="226" width="35" height="5" rx="2" fill="#2563EB" opacity=".5"/>
                        <rect x="134" y="226" width="20" height="5" rx="2" fill="#60A5FA" opacity=".4"/>
                        <rect x="96" y="235" width="108" height="4" rx="2" fill="#1D4ED8" opacity=".3"/>
                        <rect x="96" y="243" width="80" height="4" rx="2" fill="#1D4ED8" opacity=".3"/>
                        <rect x="96" y="251" width="100" height="4" rx="2" fill="#1D4ED8" opacity=".3"/>
                        <circle cx="174" cy="216" r="10" fill="#0F2440" stroke="#2563EB" stroke-width="1.5"/>
                        <circle cx="174" cy="216" r="5" fill="#2563EB">
                            <animate attributeName="opacity" values="1;0.4;1" dur="1.2s" repeatCount="indefinite"/>
                        </circle>

                        {{-- Left arm --}}
                        <rect x="20" y="178" width="36" height="100" rx="14" fill="#1E3A5F" stroke="#2563EB" stroke-width="1.5"/>
                        <rect x="14" y="272" width="38" height="24" rx="10" fill="#1E3A5F" stroke="#2563EB" stroke-width="1.5"/>

                        {{-- Right arm --}}
                        <rect x="244" y="178" width="36" height="100" rx="14" fill="#1E3A5F" stroke="#2563EB" stroke-width="1.5"/>
                        <rect x="248" y="272" width="38" height="24" rx="10" fill="#1E3A5F" stroke="#2563EB" stroke-width="1.5"/>

                        {{-- Legs --}}
                        <rect x="90" y="308" width="44" height="28" rx="10" fill="#1E3A5F" stroke="#2563EB" stroke-width="1.5"/>
                        <rect x="166" y="308" width="44" height="28" rx="10" fill="#1E3A5F" stroke="#2563EB" stroke-width="1.5"/>

                        {{-- Data nodes floating --}}
                        <circle cx="42" cy="140" r="5" fill="#60A5FA" opacity=".7">
                            <animate attributeName="cy" values="140;134;140" dur="2.5s" repeatCount="indefinite"/>
                            <animate attributeName="opacity" values=".7;1;.7" dur="2.5s" repeatCount="indefinite"/>
                        </circle>
                        <circle cx="258" cy="160" r="4" fill="#93C5FD" opacity=".6">
                            <animate attributeName="cy" values="160;154;160" dur="2s" repeatCount="indefinite" begin=".5s"/>
                            <animate attributeName="opacity" values=".6;1;.6" dur="2s" repeatCount="indefinite" begin=".5s"/>
                        </circle>
                        <circle cx="30" cy="230" r="3" fill="#60A5FA" opacity=".5">
                            <animate attributeName="cx" values="30;36;30" dur="3s" repeatCount="indefinite"/>
                        </circle>
                        <circle cx="270" cy="220" r="4" fill="#93C5FD" opacity=".5">
                            <animate attributeName="cx" values="270;264;270" dur="3.5s" repeatCount="indefinite"/>
                        </circle>
                    </svg>

                    {{-- Floating AI badges --}}
                    <div style="position:absolute;top:10%;right:0;background:rgba(37,99,235,.15);border:1px solid rgba(37,99,235,.3);border-radius:10px;padding:.4rem .75rem;font-size:.75rem;font-weight:700;color:#93C5FD;white-space:nowrap;animation:robotFloat 3s ease-in-out infinite 1s;">
                        <i class="bi bi-cpu-fill me-1"></i>Neural Network
                    </div>
                    <div style="position:absolute;bottom:20%;left:0;background:rgba(37,99,235,.15);border:1px solid rgba(37,99,235,.3);border-radius:10px;padding:.4rem .75rem;font-size:.75rem;font-weight:700;color:#93C5FD;white-space:nowrap;animation:robotFloat 3.5s ease-in-out infinite .5s;">
                        <i class="bi bi-graph-up-arrow me-1"></i>Predictive AI
                    </div>
                    <div style="position:absolute;bottom:5%;right:5%;background:rgba(37,99,235,.15);border:1px solid rgba(37,99,235,.3);border-radius:10px;padding:.4rem .75rem;font-size:.75rem;font-weight:700;color:#93C5FD;white-space:nowrap;animation:robotFloat 4s ease-in-out infinite .2s;">
                        <i class="bi bi-shield-check me-1"></i>Secure AI
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
@keyframes robotFloat {
    0%, 100% { transform: translate(-50%, -50%) translateY(0); }
    50%       { transform: translate(-50%, -50%) translateY(-12px); }
}
@keyframes ringPulse {
    0%, 100% { opacity: .6; transform: scale(1); }
    50%       { opacity: .2; transform: scale(1.04); }
}
</style>
@endpush

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
<div class="cta-band" style="position:relative;overflow:hidden;">
    <svg style="position:absolute;left:5%;top:50%;transform:translateY(-50%);width:160px;height:160px;opacity:.06;pointer-events:none;" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <circle cx="100" cy="100" r="90" stroke="white" stroke-width="2"/>
        <circle cx="100" cy="100" r="60" stroke="white" stroke-width="1.5"/>
        <circle cx="100" cy="100" r="30" stroke="white" stroke-width="1"/>
        <line x1="10" y1="100" x2="190" y2="100" stroke="white" stroke-width="1"/>
        <line x1="100" y1="10" x2="100" y2="190" stroke="white" stroke-width="1"/>
        <circle cx="100" cy="100" r="8" fill="white"/>
    </svg>
    <svg style="position:absolute;right:5%;top:50%;transform:translateY(-50%);width:120px;height:120px;opacity:.05;pointer-events:none;" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <polygon points="100,10 190,55 190,145 100,190 10,145 10,55" stroke="white" stroke-width="2" fill="none"/>
        <polygon points="100,40 160,72 160,128 100,160 40,128 40,72" stroke="white" stroke-width="1.5" fill="none"/>
        <circle cx="100" cy="100" r="20" stroke="white" stroke-width="1.5" fill="none"/>
        <line x1="100" y1="10" x2="100" y2="40" stroke="white" stroke-width="1"/>
        <line x1="190" y1="55" x2="160" y2="72" stroke="white" stroke-width="1"/>
        <line x1="10" y1="55" x2="40" y2="72" stroke="white" stroke-width="1"/>
    </svg>
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
