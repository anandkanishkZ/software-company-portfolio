@extends('layouts.admin')
@section('title', $testimonial->exists ? 'Edit Testimonial' : 'Add Testimonial')
@section('page-title', $testimonial->exists ? 'Edit Testimonial' : 'Add Testimonial')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="data-card p-4 p-lg-5">
            <div class="d-flex align-items-center gap-3 mb-4">
                <a href="{{ route('admin.testimonials.index') }}" style="color:var(--s400);text-decoration:none;font-size:.875rem;">
                    <i class="bi bi-arrow-left me-1"></i>Back to Testimonials
                </a>
            </div>

            @if($errors->any())
            <div class="mb-4 p-3" style="background:#FEF2F2;border:1px solid #FECACA;border-radius:10px;font-size:.875rem;color:#991B1B;">
                <i class="bi bi-exclamation-circle-fill me-1"></i>
                {{ implode(' · ', $errors->all()) }}
            </div>
            @endif

            <form method="POST" action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}">
                @csrf
                @if($testimonial->exists) @method('PUT') @endif

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Client Name <span style="color:#EF4444;">*</span></label>
                        <input type="text" name="client_name" value="{{ old('client_name', $testimonial->client_name) }}"
                               class="form-control @error('client_name') is-invalid @enderror"
                               placeholder="e.g. Sarah Johnson">
                        @error('client_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Company</label>
                        <input type="text" name="company" value="{{ old('company', $testimonial->company) }}"
                               class="form-control @error('company') is-invalid @enderror"
                               placeholder="e.g. Acme Ltd">
                        @error('company')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Job Title</label>
                        <input type="text" name="job_title" value="{{ old('job_title', $testimonial->job_title) }}"
                               class="form-control @error('job_title') is-invalid @enderror"
                               placeholder="e.g. CTO">
                        @error('job_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Rating <span style="color:#EF4444;">*</span></label>
                        <div class="d-flex gap-2 align-items-center mt-1" id="star-picker">
                            @for($i=1;$i<=5;$i++)
                            <label style="cursor:pointer;font-size:1.6rem;color:var(--s200);transition:color .1s;" class="star-label" data-value="{{ $i }}">
                                <i class="bi bi-star-fill"></i>
                                <input type="radio" name="rating" value="{{ $i }}" style="display:none;" {{ old('rating', $testimonial->rating) == $i ? 'checked' : '' }}>
                            </label>
                            @endfor
                        </div>
                        @error('rating')<div class="text-danger" style="font-size:.8rem;margin-top:.3rem;">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Feedback / Quote <span style="color:#EF4444;">*</span></label>
                        <textarea name="feedback" rows="5"
                                  class="form-control @error('feedback') is-invalid @enderror"
                                  placeholder="Enter the client's testimonial quote…">{{ old('feedback', $testimonial->feedback) }}</textarea>
                        <div style="font-size:.775rem;color:var(--s400);margin-top:.3rem;">
                            <span id="charCount">{{ strlen(old('feedback', $testimonial->feedback ?? '')) }}</span>/1000 characters
                        </div>
                        @error('feedback')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 d-flex gap-2 pt-2">
                        <button type="submit" class="btn btn-primary px-4 py-2">
                            <i class="bi bi-check-lg me-1"></i>{{ $testimonial->exists ? 'Update Testimonial' : 'Save Testimonial' }}
                        </button>
                        <a href="{{ route('admin.testimonials.index') }}" class="btn px-4 py-2" style="background:var(--s100);color:var(--s700);border:1px solid var(--s200);">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Star picker
const labels = document.querySelectorAll('.star-label');
const currentVal = {{ old('rating', $testimonial->rating ?? 0) }};

function setStars(val) {
    labels.forEach((l, idx) => {
        l.style.color = idx < val ? '#F59E0B' : 'var(--s200)';
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

// Char counter
const ta = document.querySelector('textarea[name="feedback"]');
const cc = document.getElementById('charCount');
ta.addEventListener('input', () => { cc.textContent = ta.value.length; });
</script>
@endpush

@endsection
