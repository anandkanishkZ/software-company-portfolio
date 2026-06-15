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
                        <img src="{{ Str::startsWith($industry->image,'http') ? $industry->image : asset('storage/'.$industry->image) }}"
                             class="img-fluid h-100 w-100" style="object-fit:cover;min-height:260px;" alt="{{ $industry->name }}">
                        @else
                        @php
                            $industryVisuals = [
                                'Healthcare'         => ['icon'=>'bi-heart-pulse-fill','grad'=>'linear-gradient(135deg,#064E3B,#065F46)','accent'=>'#34D399','badge'=>'#6EE7B7'],
                                'Financial Services' => ['icon'=>'bi-graph-up-arrow',  'grad'=>'linear-gradient(135deg,#1E3A5F,#1D4ED8)','accent'=>'#60A5FA','badge'=>'#93C5FD'],
                                'Manufacturing'      => ['icon'=>'bi-gear-wide-connected','grad'=>'linear-gradient(135deg,#431407,#9A3412)','accent'=>'#FB923C','badge'=>'#FED7AA'],
                                'Retail'             => ['icon'=>'bi-bag-heart-fill',  'grad'=>'linear-gradient(135deg,#3B0764,#6D28D9)','accent'=>'#A78BFA','badge'=>'#DDD6FE'],
                                'Logistics'          => ['icon'=>'bi-truck-front-fill','grad'=>'linear-gradient(135deg,#713F12,#CA8A04)','accent'=>'#FCD34D','badge'=>'#FEF08A'],
                                'Education'          => ['icon'=>'bi-mortarboard-fill','grad'=>'linear-gradient(135deg,#0C4A6E,#0369A1)','accent'=>'#38BDF8','badge'=>'#BAE6FD'],
                                'default'            => ['icon'=>'bi-cpu-fill',         'grad'=>'linear-gradient(135deg,#0F172A,#1E3A5F)','accent'=>'#60A5FA','badge'=>'#93C5FD'],
                            ];
                            $vis = $industryVisuals[$industry->name] ?? $industryVisuals['default'];
                        @endphp
                        <div class="h-100 d-flex flex-column align-items-center justify-content-center position-relative overflow-hidden"
                             style="min-height:260px;background:{{ $vis['grad'] }};">
                            {{-- Circuit grid pattern --}}
                            <svg style="position:absolute;inset:0;width:100%;height:100%;opacity:.08;" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
                                <line x1="0" y1="50"  x2="200" y2="50"  stroke="white" stroke-width="1"/>
                                <line x1="0" y1="100" x2="200" y2="100" stroke="white" stroke-width="1"/>
                                <line x1="0" y1="150" x2="200" y2="150" stroke="white" stroke-width="1"/>
                                <line x1="50"  y1="0" x2="50"  y2="200" stroke="white" stroke-width="1"/>
                                <line x1="100" y1="0" x2="100" y2="200" stroke="white" stroke-width="1"/>
                                <line x1="150" y1="0" x2="150" y2="200" stroke="white" stroke-width="1"/>
                                <circle cx="50"  cy="50"  r="3" fill="white"/>
                                <circle cx="100" cy="50"  r="3" fill="white"/>
                                <circle cx="150" cy="50"  r="3" fill="white"/>
                                <circle cx="50"  cy="100" r="3" fill="white"/>
                                <circle cx="100" cy="100" r="4" fill="white"/>
                                <circle cx="150" cy="100" r="3" fill="white"/>
                                <circle cx="50"  cy="150" r="3" fill="white"/>
                                <circle cx="100" cy="150" r="3" fill="white"/>
                                <circle cx="150" cy="150" r="3" fill="white"/>
                            </svg>
                            {{-- Glow ring --}}
                            <div style="width:120px;height:120px;border-radius:50%;border:2px solid {{ $vis['accent'] }};opacity:.25;position:absolute;"></div>
                            <div style="width:80px;height:80px;border-radius:50%;border:1px solid {{ $vis['accent'] }};opacity:.35;position:absolute;"></div>
                            {{-- Icon --}}
                            <div style="width:72px;height:72px;border-radius:20px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;backdrop-filter:blur(4px);position:relative;z-index:1;">
                                <i class="bi {{ $vis['icon'] }}" style="font-size:2rem;color:{{ $vis['accent'] }};"></i>
                            </div>
                            {{-- Industry label --}}
                            <div style="margin-top:1rem;font-size:.8rem;font-weight:700;color:{{ $vis['badge'] }};letter-spacing:.08em;text-transform:uppercase;position:relative;z-index:1;">
                                {{ $industry->name }}
                            </div>
                            {{-- AI badge --}}
                            <div style="position:absolute;top:12px;right:12px;background:rgba(0,0,0,.3);border:1px solid rgba(255,255,255,.15);border-radius:6px;padding:.25rem .6rem;font-size:.7rem;font-weight:700;color:rgba(255,255,255,.7);">
                                <i class="bi bi-cpu me-1"></i>AI-Powered
                            </div>
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
