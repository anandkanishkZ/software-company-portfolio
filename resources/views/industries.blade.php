@extends('layouts.app')
@section('title', 'Industries')

@section('content')

<section class="page-hero">
    <div class="container position-relative">
        <p class="section-label mb-2" style="color:#93C5FD;">Case Studies</p>
        <h1 style="font-size:clamp(2rem,4vw,3rem);font-weight:800;line-height:1.1;" class="mb-3">Industries We Transform</h1>
        <p class="mb-0" style="color:rgba(255,255,255,.6);font-size:1.05rem;max-width:540px;">Real AI solutions delivering measurable outcomes across sectors worldwide.</p>
    </div>
</section>

<section style="padding:80px 0;">
    <div class="container">
        @if($industries->isNotEmpty())
        <div class="d-flex flex-column gap-4">
            @foreach($industries as $i => $industry)
            <div class="card overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-4 {{ $i % 2 == 1 ? 'order-md-2' : '' }}">
                        @if($industry->image)
                        <img src="{{ asset('storage/'.$industry->image) }}" class="img-fluid h-100 w-100" style="object-fit:cover;min-height:240px;" alt="{{ $industry->name }}">
                        @else
                        <div class="h-100 d-flex align-items-center justify-content-center" style="min-height:240px;background:var(--navy);">
                            <i class="bi bi-buildings" style="font-size:3rem;color:rgba(255,255,255,.15);"></i>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-8 {{ $i % 2 == 1 ? 'order-md-1' : '' }}">
                        <div class="p-4 p-lg-5">
                            <span class="badge-industry mb-3 d-inline-block">{{ $industry->name }}</span>
                            <h3 style="font-size:1.25rem;font-weight:700;line-height:1.3;" class="mb-3">{{ $industry->title }}</h3>
                            <p style="font-size:.9rem;" class="mb-4">{{ $industry->description }}</p>
                            <div style="background:var(--slate-50);border:1px solid var(--slate-200);border-radius:10px;padding:1rem 1.25rem;">
                                <div style="font-size:.75rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--blue);margin-bottom:.4rem;">Our Solution</div>
                                <p style="font-size:.875rem;color:var(--slate-700);" class="mb-0">{{ $industry->solution }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-building display-1 text-muted opacity-20"></i>
            <p class="text-muted mt-3">Case studies coming soon.</p>
        </div>
        @endif
    </div>
</section>

<div class="cta-band">
    <div class="container position-relative text-center">
        <h2 style="color:#fff;font-weight:800;font-size:clamp(1.5rem,3vw,2rem);" class="mb-3">Your industry next?</h2>
        <p style="color:rgba(255,255,255,.55);" class="mb-4">Tell us your specific challenge and we'll show you what AI can do for your sector.</p>
        <a href="{{ route('contact') }}" class="btn-cta-primary btn">Start a Conversation</a>
    </div>
</div>

@endsection
