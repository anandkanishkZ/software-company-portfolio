@extends('layouts.admin')
@section('title', $industry->exists ? 'Edit Industry' : 'Add Industry')
@section('page-title', $industry->exists ? 'Edit Industry' : 'Add Industry')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="data-card p-4 p-lg-5">
            <div class="mb-4">
                <a href="{{ route('admin.industries.index') }}" style="color:var(--s400);text-decoration:none;font-size:.875rem;">
                    <i class="bi bi-arrow-left me-1"></i>Back to Industries
                </a>
            </div>

            @if($errors->any())
            <div class="mb-4 p-3" style="background:#FEF2F2;border:1px solid #FECACA;border-radius:10px;font-size:.875rem;color:#991B1B;">
                <i class="bi bi-exclamation-circle-fill me-1"></i>{{ implode(' · ', $errors->all()) }}
            </div>
            @endif

            <form method="POST"
                  action="{{ $industry->exists ? route('admin.industries.update', $industry) : route('admin.industries.store') }}"
                  enctype="multipart/form-data">
                @csrf
                @if($industry->exists) @method('PUT') @endif

                <div class="row g-4">
                    <div class="col-md-4">
                        <label class="form-label">Industry Name <span style="color:#EF4444;">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $industry->name) }}"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="e.g. Healthcare">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-8">
                        <label class="form-label">Case Study Title <span style="color:#EF4444;">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $industry->title) }}"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="e.g. Reducing Admin Burden in NHS Trusts with AI">
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Description <span style="color:#EF4444;">*</span></label>
                        <textarea name="description" rows="3"
                                  class="form-control @error('description') is-invalid @enderror"
                                  placeholder="Brief overview of the challenge and industry context…">{{ old('description', $industry->description) }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">AI Solution <span style="color:#EF4444;">*</span></label>
                        <textarea name="solution" rows="3"
                                  class="form-control @error('solution') is-invalid @enderror"
                                  placeholder="Describe the AI solution implemented and the results achieved…">{{ old('solution', $industry->solution) }}</textarea>
                        @error('solution')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Cover Image</label>
                        @if($industry->exists && $industry->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/'.$industry->image) }}" style="height:100px;border-radius:8px;border:1px solid var(--s200);object-fit:cover;" alt="Current image">
                            <div style="font-size:.775rem;color:var(--s400);margin-top:.3rem;">Upload a new image to replace the current one.</div>
                        </div>
                        @endif
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        <div style="font-size:.775rem;color:var(--s400);margin-top:.3rem;">JPG, PNG, WebP — max 2MB</div>
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 d-flex gap-2 pt-2">
                        <button type="submit" class="btn btn-primary px-4 py-2">
                            <i class="bi bi-check-lg me-1"></i>{{ $industry->exists ? 'Update Industry' : 'Save Industry' }}
                        </button>
                        <a href="{{ route('admin.industries.index') }}" class="btn px-4 py-2" style="background:var(--s100);color:var(--s700);border:1px solid var(--s200);">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
