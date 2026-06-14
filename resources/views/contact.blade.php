@extends('layouts.app')
@section('title', 'Contact Us')

@section('content')

<section class="page-hero">
    <div class="container position-relative">
        <p class="section-label mb-2" style="color:#93C5FD;">Get In Touch</p>
        <h1 style="font-size:clamp(2rem,4vw,3rem);font-weight:800;line-height:1.1;" class="mb-3">Let's Talk About Your Project</h1>
        <p class="mb-0" style="color:rgba(255,255,255,.6);font-size:1.05rem;max-width:540px;">No account required. Fill in the form and our team will respond within one business day.</p>
    </div>
</section>

<section style="padding:80px 0;background:var(--slate-50);border-bottom:1px solid var(--slate-200);">
    <div class="container">
        <div class="row g-5">

            {{-- Left: Info --}}
            <div class="col-lg-4">
                <div class="d-flex flex-column gap-4">

                    <div class="d-flex gap-3 align-items-start">
                        <div class="icon-box flex-shrink-0"><i class="bi bi-geo-alt"></i></div>
                        <div>
                            <div style="font-weight:700;font-size:.9rem;color:var(--slate-900);margin-bottom:.2rem;">Head Office</div>
                            <div style="font-size:.875rem;color:var(--slate-500);">Sunderland, United Kingdom</div>
                        </div>
                    </div>

                    <div class="d-flex gap-3 align-items-start">
                        <div class="icon-box flex-shrink-0"><i class="bi bi-envelope"></i></div>
                        <div>
                            <div style="font-weight:700;font-size:.9rem;color:var(--slate-900);margin-bottom:.2rem;">Email Us</div>
                            <div style="font-size:.875rem;color:var(--slate-500);">hello@ai-solutions.co.uk</div>
                        </div>
                    </div>

                    <div class="d-flex gap-3 align-items-start">
                        <div class="icon-box flex-shrink-0"><i class="bi bi-telephone"></i></div>
                        <div>
                            <div style="font-weight:700;font-size:.9rem;color:var(--slate-900);margin-bottom:.2rem;">Call Us</div>
                            <div style="font-size:.875rem;color:var(--slate-500);">+44 191 000 0000</div>
                        </div>
                    </div>

                    <div class="d-flex gap-3 align-items-start">
                        <div class="icon-box flex-shrink-0"><i class="bi bi-clock"></i></div>
                        <div>
                            <div style="font-weight:700;font-size:.9rem;color:var(--slate-900);margin-bottom:.2rem;">Office Hours</div>
                            <div style="font-size:.875rem;color:var(--slate-500);">Mon – Fri, 9:00am – 5:30pm GMT</div>
                        </div>
                    </div>

                </div>

                <hr style="border-color:var(--slate-200);margin:2rem 0;">

                <div class="card p-4" style="background:var(--navy);border-color:var(--navy);">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div style="width:40px;height:40px;background:rgba(255,255,255,.1);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                            <i class="bi bi-robot text-white"></i>
                        </div>
                        <div style="font-weight:700;color:#fff;font-size:.9rem;">AI Virtual Assistant</div>
                    </div>
                    <p style="font-size:.825rem;color:rgba(255,255,255,.5);line-height:1.6;" class="mb-0">Available 24/7 to answer initial questions and point you in the right direction before our team follows up.</p>
                </div>
            </div>

            {{-- Right: Form --}}
            <div class="col-lg-8">
                <div class="card p-4 p-lg-5">
                    <h4 style="font-weight:700;font-size:1.15rem;" class="mb-1">Submit Your Enquiry</h4>
                    <p style="font-size:.875rem;" class="mb-4">All fields are required. No account or password needed.</p>

                    @if($errors->any())
                    <div class="alert border-0 mb-4" style="background:#FEF2F2;color:#991B1B;font-size:.875rem;border-radius:10px;padding:1rem 1.25rem;">
                        <div class="d-flex align-items-center gap-2 mb-2"><i class="bi bi-exclamation-circle-fill"></i><strong>Please fix the following:</strong></div>
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Full Name <span style="color:#EF4444;">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Jane Smith">
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address <span style="color:#EF4444;">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="jane@company.com">
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number <span style="color:#EF4444;">*</span></label>
                                <input type="tel" name="phone" value="{{ old('phone') }}"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       placeholder="+44 191 000 0000">
                                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Company Name <span style="color:#EF4444;">*</span></label>
                                <input type="text" name="company_name" value="{{ old('company_name') }}"
                                       class="form-control @error('company_name') is-invalid @enderror"
                                       placeholder="Acme Ltd">
                                @error('company_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Country <span style="color:#EF4444;">*</span></label>
                                <select name="country" class="form-select @error('country') is-invalid @enderror">
                                    <option value="">Select country</option>
                                    @foreach(['United Kingdom','United States','Canada','Australia','Germany','France','Netherlands','India','UAE','Singapore','South Africa','Other'] as $c)
                                    <option value="{{ $c }}" {{ old('country')==$c?'selected':'' }}>{{ $c }}</option>
                                    @endforeach
                                </select>
                                @error('country')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Job Title <span style="color:#EF4444;">*</span></label>
                                <input type="text" name="job_title" value="{{ old('job_title') }}"
                                       class="form-control @error('job_title') is-invalid @enderror"
                                       placeholder="e.g. CTO, Head of Operations">
                                @error('job_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Job Details / Requirements <span style="color:#EF4444;">*</span></label>
                                <textarea name="job_details" rows="5"
                                          class="form-control @error('job_details') is-invalid @enderror"
                                          placeholder="Describe your project, goals, and any challenges you're facing…">{{ old('job_details') }}</textarea>
                                @error('job_details')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100 py-3" style="font-size:.9375rem;border-radius:10px;">
                                    <i class="bi bi-send me-2"></i>Send Enquiry
                                </button>
                                <p style="font-size:.8rem;text-align:center;color:var(--slate-400);margin-top:.75rem;margin-bottom:0;">
                                    <i class="bi bi-shield-check me-1"></i>No account needed · We'll respond within 1 business day
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
