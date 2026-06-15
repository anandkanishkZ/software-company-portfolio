@extends('layouts.admin')
@section('title', $service->exists ? 'Edit Service' : 'Add Service')
@section('page-title', $service->exists ? 'Edit Service' : 'Add Service')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="data-card p-4 p-lg-5">
            <div class="mb-4">
                <a href="{{ route('admin.services.index') }}" style="color:var(--s400);text-decoration:none;font-size:.875rem;">
                    <i class="bi bi-arrow-left me-1"></i>Back to Services
                </a>
            </div>

            @if($errors->any())
            <div class="mb-4 p-3" style="background:#FEF2F2;border:1px solid #FECACA;border-radius:10px;font-size:.875rem;color:#991B1B;">
                <i class="bi bi-exclamation-circle-fill me-1"></i>{{ implode(' · ', $errors->all()) }}
            </div>
            @endif

            <form method="POST" action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}">
                @csrf
                @if($service->exists) @method('PUT') @endif

                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label">Service Title <span style="color:#EF4444;">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $service->title) }}"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="e.g. AI-Powered Virtual Assistants">
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Bootstrap Icon Class <span style="color:#EF4444;">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text" id="iconPreview" style="width:42px;justify-content:center;font-size:1.1rem;color:var(--blue);">
                                <i class="bi {{ old('icon', $service->icon ?: 'bi-gear') }}"></i>
                            </span>
                            <input type="text" name="icon" id="iconInput" value="{{ old('icon', $service->icon) }}"
                                   class="form-control @error('icon') is-invalid @enderror"
                                   placeholder="bi-robot">
                        </div>
                        <div style="font-size:.775rem;color:var(--s400);margin-top:.3rem;">
                            Browse icons at <a href="https://icons.getbootstrap.com" target="_blank" style="color:var(--blue);">icons.getbootstrap.com</a>
                        </div>
                        @error('icon')<div class="text-danger" style="font-size:.8rem;margin-top:.3rem;">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}"
                               class="form-control @error('sort_order') is-invalid @enderror"
                               min="0" placeholder="0">
                        <div style="font-size:.775rem;color:var(--s400);margin-top:.3rem;">Lower numbers appear first</div>
                        @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Description <span style="color:#EF4444;">*</span></label>
                        <textarea name="description" rows="4"
                                  class="form-control @error('description') is-invalid @enderror"
                                  placeholder="Describe this service…">{{ old('description', $service->description) }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 d-flex gap-2 pt-2">
                        <button type="submit" class="btn btn-primary px-4 py-2">
                            <i class="bi bi-check-lg me-1"></i>{{ $service->exists ? 'Update Service' : 'Save Service' }}
                        </button>
                        <a href="{{ route('admin.services.index') }}" class="btn px-4 py-2" style="background:var(--s100);color:var(--s700);border:1px solid var(--s200);">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
const iconInput = document.getElementById('iconInput');
const iconPreview = document.getElementById('iconPreview');
iconInput.addEventListener('input', () => {
    iconPreview.innerHTML = `<i class="bi ${iconInput.value}"></i>`;
});
</script>
@endpush
@endsection
