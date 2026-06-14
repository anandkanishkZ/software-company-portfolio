@extends('layouts.app')
@section('title', 'Services')

@section('content')

<section class="page-hero">
    <div class="container position-relative">
        <p class="section-label mb-2" style="color:#93C5FD;">What We Offer</p>
        <h1 style="font-size:clamp(2rem,4vw,3rem);font-weight:800;line-height:1.1;" class="mb-3">AI-Powered Software Solutions</h1>
        <p class="mb-0" style="color:rgba(255,255,255,.6);font-size:1.05rem;max-width:540px;">Tailored to eliminate digital friction, accelerate delivery, and unlock the full potential of your workforce.</p>
    </div>
</section>

<section style="padding:80px 0;">
    <div class="container">
        @if($services->isNotEmpty())
        <div class="row g-4">
            @foreach($services as $service)
            <div class="col-md-6 col-lg-4">
                <div class="card p-4 h-100">
                    <div class="icon-box mb-4"><i class="bi {{ $service->icon }}"></i></div>
                    <h5 class="mb-2" style="font-weight:700;font-size:1rem;">{{ $service->title }}</h5>
                    <p class="mb-4" style="font-size:.9rem;flex-grow:1;">{{ $service->description }}</p>
                    <a href="{{ route('contact') }}" class="d-inline-flex align-items-center gap-1" style="font-size:.875rem;font-weight:600;color:var(--blue);text-decoration:none;">
                        Enquire <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-grid display-1 text-muted opacity-20"></i>
            <p class="text-muted mt-3">Services coming soon.</p>
        </div>
        @endif
    </div>
</section>

{{-- How it works --}}
<section class="bg-offwhite" style="padding:80px 0;border-top:1px solid var(--slate-200);border-bottom:1px solid var(--slate-200);">
    <div class="container">
        <div class="text-center mb-5">
            <p class="section-label mb-2">Our Process</p>
            <h2 class="section-heading mb-2">How We Work</h2>
            <p class="section-sub">A clear, structured process from first conversation to live deployment</p>
        </div>
        <div class="row g-4">
            @php $steps = [
                ['01','Discovery','We take time to deeply understand your workflows, challenges, data landscape, and success criteria before proposing any solution.','bi-search'],
                ['02','Design & Prototype','Our team designs the optimal AI architecture and builds a working prototype so you can see results early — before full investment.','bi-cpu'],
                ['03','Build & Integrate','We develop the full solution and integrate it seamlessly with your existing systems, with minimal disruption to your operations.','bi-gear'],
                ['04','Support & Evolve','We provide ongoing monitoring, optimisation, and enhancements so your AI solution continues to grow with your business.','bi-arrow-clockwise'],
            ]; @endphp
            @foreach($steps as $step)
            <div class="col-md-6 col-lg-3">
                <div class="card p-4 h-100">
                    <div style="font-size:.75rem;font-weight:800;letter-spacing:.1em;color:var(--slate-400);margin-bottom:.75rem;">STEP {{ $step[0] }}</div>
                    <div class="icon-box mb-3"><i class="bi {{ $step[3] }}"></i></div>
                    <h6 style="font-weight:700;margin-bottom:.5rem;">{{ $step[1] }}</h6>
                    <p style="font-size:.875rem;" class="mb-0">{{ $step[2] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="cta-band">
    <div class="container position-relative text-center">
        <h2 style="color:#fff;font-weight:800;font-size:clamp(1.5rem,3vw,2rem);" class="mb-3">Need a custom AI solution?</h2>
        <p style="color:rgba(255,255,255,.55);" class="mb-4">We specialise in affordable, bespoke prototyping. Tell us your challenge.</p>
        <a href="{{ route('contact') }}" class="btn-cta-primary btn">Contact Our Team</a>
    </div>
</div>

@endsection
