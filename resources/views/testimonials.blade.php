@extends('layouts.app')
@section('title', 'Testimonials')

@section('content')

<section class="page-hero">
    <div class="container position-relative">
        <p class="section-label mb-2" style="color:#93C5FD;">Social Proof</p>
        <h1 style="font-size:clamp(2rem,4vw,3rem);font-weight:800;line-height:1.1;" class="mb-3">What Our Clients Say</h1>
        <p class="mb-0" style="color:rgba(255,255,255,.6);font-size:1.05rem;max-width:540px;">Honest feedback from the organisations that trust AI-Solutions to deliver.</p>
    </div>
</section>

{{-- Overall Rating Bar --}}
@if($testimonials->isNotEmpty())
@php $avg = $testimonials->avg('rating'); @endphp
<div style="background:var(--slate-50);border-bottom:1px solid var(--slate-200);padding:28px 0;">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center gap-4">
            <div class="d-flex align-items-center gap-3">
                <span style="font-size:2.5rem;font-weight:800;color:var(--slate-900);line-height:1;">{{ number_format($avg,1) }}</span>
                <div>
                    <div class="stars" style="font-size:1rem;">
                        @for($i=1;$i<=5;$i++)<i class="bi {{ $i<=round($avg)?'bi-star-fill':'bi-star' }}"></i>@endfor
                    </div>
                    <div style="font-size:.8rem;color:var(--slate-500);margin-top:.2rem;">{{ $testimonials->count() }} verified reviews</div>
                </div>
            </div>
            <div class="vr d-none d-md-block" style="height:40px;"></div>
            @php
                $dist = [5=>0,4=>0,3=>0,2=>0,1=>0];
                foreach($testimonials as $t){ $dist[$t->rating] = ($dist[$t->rating]??0)+1; }
            @endphp
            <div class="d-flex flex-column gap-1 flex-grow-1" style="max-width:220px;">
                @foreach([5,4,3,2,1] as $star)
                <div class="d-flex align-items-center gap-2">
                    <span style="font-size:.75rem;color:var(--slate-500);width:10px;">{{ $star }}</span>
                    <div style="flex:1;height:6px;background:var(--slate-200);border-radius:99px;overflow:hidden;">
                        <div style="height:100%;background:var(--blue);border-radius:99px;width:{{ $testimonials->count()>0?round(($dist[$star]/$testimonials->count())*100):0 }}%;"></div>
                    </div>
                    <span style="font-size:.75rem;color:var(--slate-400);width:12px;">{{ $dist[$star] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

<section style="padding:80px 0;">
    <div class="container">
        @if($testimonials->isNotEmpty())
        <div class="row g-4">
            @foreach($testimonials as $t)
            <div class="col-md-6 col-lg-4">
                <div class="card p-4 h-100 d-flex flex-column">
                    <div class="stars mb-3" style="font-size:.875rem;">
                        @for($i=1;$i<=5;$i++)<i class="bi {{ $i<=$t->rating?'bi-star-fill':'bi-star' }}"></i>@endfor
                    </div>
                    <p style="font-size:.9rem;line-height:1.75;color:var(--slate-700);flex-grow:1;" class="mb-4">"{{ $t->feedback }}"</p>
                    <div class="d-flex align-items-center gap-3 pt-3" style="border-top:1px solid var(--slate-100);">
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
        @else
        <div class="text-center py-5">
            <i class="bi bi-chat-quote display-1 text-muted opacity-20"></i>
            <p class="text-muted mt-3 fs-5">No testimonials yet.</p>
        </div>
        @endif
    </div>
</section>

<div class="cta-band">
    <div class="container position-relative text-center">
        <h2 style="color:#fff;font-weight:800;font-size:clamp(1.5rem,3vw,2rem);" class="mb-3">Join our growing list of satisfied clients</h2>
        <p style="color:rgba(255,255,255,.55);" class="mb-4">Let's discuss how AI-Solutions can work for your organisation.</p>
        <a href="{{ route('contact') }}" class="btn-cta-primary btn">Start Your Project</a>
    </div>
</div>

@endsection
