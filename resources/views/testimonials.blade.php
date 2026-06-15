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

{{-- ── Submit Your Review ───────────────────────────── --}}
<section style="padding:80px 0;background:var(--slate-50);border-top:1px solid var(--slate-200);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="text-center mb-5">
                    <p class="section-label mb-2">Share Your Experience</p>
                    <h2 class="section-heading mb-2">Leave a Review</h2>
                    <p class="section-sub">Worked with AI-Solutions? We'd love to hear your feedback.</p>
                </div>

                @if(session('review_submitted'))
                <div style="background:#F0FDF4;border:1px solid #BBF7D0;border-radius:12px;padding:1.25rem 1.5rem;margin-bottom:1.5rem;display:flex;align-items:center;gap:.75rem;font-size:.9375rem;color:#166534;">
                    <i class="bi bi-check-circle-fill" style="font-size:1.25rem;flex-shrink:0;"></i>
                    {{ session('review_submitted') }}
                </div>
                @endif

                <div class="card p-4 p-lg-5">
                    @if($errors->any())
                    <div style="background:#FEF2F2;border:1px solid #FECACA;border-radius:10px;padding:.875rem 1rem;margin-bottom:1.5rem;font-size:.875rem;color:#991B1B;">
                        <i class="bi bi-exclamation-circle-fill me-1"></i>{{ implode(' · ', $errors->all()) }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('reviews.store') }}">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label" style="font-size:.875rem;font-weight:600;color:var(--slate-700);">Your Name <span style="color:#EF4444;">*</span></label>
                                <input type="text" name="client_name" value="{{ old('client_name') }}"
                                       class="form-control @error('client_name') is-invalid @enderror"
                                       placeholder="e.g. Sarah Johnson">
                                @error('client_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" style="font-size:.875rem;font-weight:600;color:var(--slate-700);">Company</label>
                                <input type="text" name="company" value="{{ old('company') }}"
                                       class="form-control @error('company') is-invalid @enderror"
                                       placeholder="e.g. Acme Ltd">
                                @error('company')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" style="font-size:.875rem;font-weight:600;color:var(--slate-700);">Job Title</label>
                                <input type="text" name="job_title" value="{{ old('job_title') }}"
                                       class="form-control @error('job_title') is-invalid @enderror"
                                       placeholder="e.g. CTO">
                                @error('job_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" style="font-size:.875rem;font-weight:600;color:var(--slate-700);">Your Rating <span style="color:#EF4444;">*</span></label>
                                <div class="d-flex gap-1 align-items-center mt-1" id="public-star-picker">
                                    @for($i=1;$i<=5;$i++)
                                    <label class="pub-star-label" data-value="{{ $i }}" style="cursor:pointer;font-size:2rem;color:var(--slate-200);transition:color .1s;line-height:1;">
                                        <i class="bi bi-star-fill"></i>
                                        <input type="radio" name="rating" value="{{ $i }}" style="display:none;" {{ old('rating')==$i?'checked':'' }}>
                                    </label>
                                    @endfor
                                </div>
                                @error('rating')<div class="text-danger" style="font-size:.8rem;margin-top:.3rem;">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label" style="font-size:.875rem;font-weight:600;color:var(--slate-700);">Your Review <span style="color:#EF4444;">*</span></label>
                                <textarea name="feedback" rows="4"
                                          class="form-control @error('feedback') is-invalid @enderror"
                                          placeholder="Tell us about your experience working with AI-Solutions…">{{ old('feedback') }}</textarea>
                                <div style="font-size:.775rem;color:var(--slate-400);margin-top:.3rem;">Minimum 20 characters</div>
                                @error('feedback')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5 py-3" style="border-radius:10px;font-size:.9375rem;">
                                    <i class="bi bi-send me-2"></i>Submit Review
                                </button>
                                <p style="font-size:.8rem;color:var(--slate-400);margin-top:.75rem;margin-bottom:0;">
                                    <i class="bi bi-shield-check me-1"></i>Reviews are moderated before appearing publicly.
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
(function() {
    const labels = document.querySelectorAll('.pub-star-label');
    const currentVal = {{ old('rating', 0) }};

    function setStars(val) {
        labels.forEach((l, idx) => {
            l.style.color = idx < val ? '#F59E0B' : 'var(--slate-200)';
        });
    }
    setStars(currentVal);

    labels.forEach((label, idx) => {
        label.addEventListener('mouseenter', () => setStars(idx + 1));
        label.addEventListener('mouseleave', () => {
            const checked = document.querySelector('input[name="rating"]:checked');
            setStars(checked ? parseInt(checked.value) : 0);
        });
        label.addEventListener('click', () => {
            label.querySelector('input').checked = true;
            setStars(idx + 1);
        });
    });
})();
</script>
@endpush

<div class="cta-band">
    <div class="container position-relative text-center">
        <h2 style="color:#fff;font-weight:800;font-size:clamp(1.5rem,3vw,2rem);" class="mb-3">Join our growing list of satisfied clients</h2>
        <p style="color:rgba(255,255,255,.55);" class="mb-4">Let's discuss how AI-Solutions can work for your organisation.</p>
        <a href="{{ route('contact') }}" class="btn-cta-primary btn">Start Your Project</a>
    </div>
</div>

@endsection
