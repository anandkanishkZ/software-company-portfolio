@extends('layouts.admin')
@section('title', $article->exists ? 'Edit Article' : 'New Article')
@section('page-title', $article->exists ? 'Edit Article' : 'New Article')

@section('content')

<form method="POST"
      action="{{ $article->exists ? route('admin.articles.update', $article) : route('admin.articles.store') }}"
      enctype="multipart/form-data">
    @csrf
    @if($article->exists) @method('PUT') @endif

    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('admin.articles.index') }}" style="color:var(--s400);text-decoration:none;font-size:.875rem;">
            <i class="bi bi-arrow-left me-1"></i>Back to Articles
        </a>
    </div>

    @if($errors->any())
    <div class="mb-4 p-3" style="background:#FEF2F2;border:1px solid #FECACA;border-radius:10px;font-size:.875rem;color:#991B1B;">
        <i class="bi bi-exclamation-circle-fill me-1"></i>
        {{ implode(' · ', $errors->all()) }}
    </div>
    @endif

    <div class="row g-4">
        {{-- Main column --}}
        <div class="col-lg-8">
            <div class="data-card p-4 p-lg-4">
                <div class="mb-4">
                    <label class="form-label">Title <span style="color:#EF4444;">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $article->title) }}"
                           class="form-control @error('title') is-invalid @enderror"
                           placeholder="Enter a compelling article title…">
                    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Excerpt <span style="color:#EF4444;">*</span></label>
                    <textarea name="excerpt" rows="2"
                              class="form-control @error('excerpt') is-invalid @enderror"
                              placeholder="A short summary shown in article listings (max 300 chars)…">{{ old('excerpt', $article->excerpt) }}</textarea>
                    <div style="font-size:.775rem;color:var(--s400);margin-top:.3rem;">
                        <span id="exCount">{{ strlen(old('excerpt', $article->excerpt ?? '')) }}</span>/300 characters
                    </div>
                    @error('excerpt')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-0">
                    <label class="form-label">Content <span style="color:#EF4444;">*</span></label>
                    <textarea name="content" rows="16"
                              class="form-control @error('content') is-invalid @enderror"
                              style="line-height:1.7;font-size:.9rem;"
                              placeholder="Write your full article here. Line breaks are preserved.">{{ old('content', $article->content) }}</textarea>
                    @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>

        {{-- Sidebar column --}}
        <div class="col-lg-4">
            {{-- Publish --}}
            <div class="data-card p-4 mb-4">
                <div style="font-size:.8rem;font-weight:700;letter-spacing:.05em;text-transform:uppercase;color:var(--s400);margin-bottom:1rem;">Publish</div>

                <div class="form-check form-switch mb-3">
                    <input type="checkbox" name="publish" value="1" class="form-check-input" id="publishToggle" role="switch"
                           {{ old('publish', $article->published_at ? 1 : ($article->exists ? 0 : 1)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="publishToggle" style="font-size:.875rem;font-weight:600;color:var(--s700);">
                        Publish to website
                    </label>
                </div>
                <p style="font-size:.775rem;color:var(--s400);" class="mb-3">
                    When off, the article is saved as a draft and hidden from the public site.
                </p>

                @if($article->exists && $article->published_at)
                <div style="font-size:.775rem;color:var(--s400);border-top:1px solid var(--s100);padding-top:.75rem;">
                    <i class="bi bi-calendar-check me-1"></i>Published {{ $article->published_at->format('d M Y, H:i') }}
                </div>
                @endif

                <button type="submit" class="btn btn-primary w-100 py-2 mt-2" style="border-radius:8px;">
                    <i class="bi bi-check-lg me-1"></i>{{ $article->exists ? 'Update Article' : 'Save Article' }}
                </button>
            </div>

            {{-- Author --}}
            <div class="data-card p-4 mb-4">
                <label class="form-label">Author <span style="color:#EF4444;">*</span></label>
                <input type="text" name="author" value="{{ old('author', $article->author ?? 'AI-Solutions Team') }}"
                       class="form-control @error('author') is-invalid @enderror">
                @error('author')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            {{-- Featured image --}}
            <div class="data-card p-4">
                <div style="font-size:.8rem;font-weight:700;letter-spacing:.05em;text-transform:uppercase;color:var(--s400);margin-bottom:1rem;">Featured Image</div>

                <div id="imgPreviewWrap" style="{{ $article->image ? '' : 'display:none;' }}margin-bottom:1rem;">
                    <img id="imgPreview" src="{{ $article->image ? asset('storage/'.$article->image) : '' }}"
                         style="width:100%;height:150px;object-fit:cover;border-radius:8px;border:1px solid var(--s200);" alt="">
                </div>

                <label for="imageInput" style="display:block;border:2px dashed var(--s200);border-radius:10px;padding:1.5rem;text-align:center;cursor:pointer;transition:border-color .15s;" onmouseover="this.style.borderColor='var(--blue)'" onmouseout="this.style.borderColor='var(--s200)'">
                    <i class="bi bi-cloud-arrow-up" style="font-size:1.5rem;color:var(--s400);"></i>
                    <div style="font-size:.825rem;color:var(--s500);font-weight:600;margin-top:.4rem;">Click to upload</div>
                    <div style="font-size:.725rem;color:var(--s400);">JPG, PNG, WebP · max 2MB</div>
                    <input type="file" name="image" id="imageInput" accept="image/*" style="display:none;">
                </label>
                @error('image')<div class="text-danger" style="font-size:.8rem;margin-top:.4rem;">{{ $message }}</div>@enderror
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
// Excerpt counter
const ex = document.querySelector('textarea[name="excerpt"]');
const exc = document.getElementById('exCount');
ex.addEventListener('input', () => { exc.textContent = ex.value.length; });

// Image preview
const imgInput = document.getElementById('imageInput');
const preview  = document.getElementById('imgPreview');
const wrap     = document.getElementById('imgPreviewWrap');
imgInput.addEventListener('change', e => {
    const file = e.target.files[0];
    if (file) {
        preview.src = URL.createObjectURL(file);
        wrap.style.display = 'block';
    }
});
</script>
@endpush

@endsection
