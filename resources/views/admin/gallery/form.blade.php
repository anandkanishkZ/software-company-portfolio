@extends('layouts.admin')
@section('title', $image->exists ? 'Edit Gallery Image' : 'Add Gallery Image')
@section('page-title', $image->exists ? 'Edit Gallery Image' : 'Add Gallery Image')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="data-card p-4 p-lg-5">
            <div class="mb-4">
                <a href="{{ route('admin.gallery.index') }}" style="color:var(--s400);text-decoration:none;font-size:.875rem;">
                    <i class="bi bi-arrow-left me-1"></i>Back to Gallery
                </a>
            </div>

            @if($errors->any())
            <div class="mb-4 p-3" style="background:#FEF2F2;border:1px solid #FECACA;border-radius:10px;font-size:.875rem;color:#991B1B;">
                <i class="bi bi-exclamation-circle-fill me-1"></i>{{ implode(' · ', $errors->all()) }}
            </div>
            @endif

            <form method="POST"
                  action="{{ $image->exists ? route('admin.gallery.update', $image) : route('admin.gallery.store') }}"
                  enctype="multipart/form-data">
                @csrf
                @if($image->exists) @method('PUT') @endif

                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label">Image <span style="color:#EF4444;">{{ $image->exists ? '' : '*' }}</span></label>
                        @if($image->exists && $image->image_path)
                        <div class="mb-2">
                            <img src="{{ asset('storage/'.$image->image_path) }}" style="max-height:140px;border-radius:8px;border:1px solid var(--s200);object-fit:cover;" alt="Current">
                            <div style="font-size:.775rem;color:var(--s400);margin-top:.3rem;">Upload a new file to replace the current image.</div>
                        </div>
                        @endif
                        <input type="file" name="image_file" id="imageFile"
                               class="form-control @error('image_file') is-invalid @enderror"
                               accept="image/*" {{ $image->exists ? '' : 'required' }}>
                        <div style="font-size:.775rem;color:var(--s400);margin-top:.3rem;">JPG, PNG, WebP — max 4MB</div>
                        @error('image_file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div id="imgPreviewWrap" class="mt-2" style="display:none;">
                            <img id="imgPreview" style="max-height:120px;border-radius:8px;border:1px solid var(--s200);" alt="Preview">
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Title / Caption <span style="color:#EF4444;">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $image->title) }}"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="e.g. Team at AI Summit 2025">
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-8">
                        <label class="form-label">Event / Category</label>
                        <input type="text" name="event_name" value="{{ old('event_name', $image->event_name) }}"
                               class="form-control @error('event_name') is-invalid @enderror"
                               placeholder="e.g. AI Summit, Office, Team">
                        @error('event_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $image->sort_order ?? 0) }}"
                               class="form-control @error('sort_order') is-invalid @enderror"
                               min="0">
                        @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 d-flex gap-2 pt-2">
                        <button type="submit" class="btn btn-primary px-4 py-2">
                            <i class="bi bi-check-lg me-1"></i>{{ $image->exists ? 'Update Image' : 'Upload Image' }}
                        </button>
                        <a href="{{ route('admin.gallery.index') }}" class="btn px-4 py-2" style="background:var(--s100);color:var(--s700);border:1px solid var(--s200);">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('imageFile').addEventListener('change', function() {
    const file = this.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
        document.getElementById('imgPreview').src = e.target.result;
        document.getElementById('imgPreviewWrap').style.display = 'block';
    };
    reader.readAsDataURL(file);
});
</script>
@endpush
@endsection
