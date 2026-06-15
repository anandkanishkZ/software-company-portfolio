@extends('layouts.admin')
@section('title', $event->exists ? 'Edit Event' : 'Add Event')
@section('page-title', $event->exists ? 'Edit Event' : 'Add Event')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="data-card p-4 p-lg-5">
            <div class="mb-4">
                <a href="{{ route('admin.events.index') }}" style="color:var(--s400);text-decoration:none;font-size:.875rem;">
                    <i class="bi bi-arrow-left me-1"></i>Back to Events
                </a>
            </div>

            @if($errors->any())
            <div class="mb-4 p-3" style="background:#FEF2F2;border:1px solid #FECACA;border-radius:10px;font-size:.875rem;color:#991B1B;">
                <i class="bi bi-exclamation-circle-fill me-1"></i>{{ implode(' · ', $errors->all()) }}
            </div>
            @endif

            <form method="POST"
                  action="{{ $event->exists ? route('admin.events.update', $event) : route('admin.events.store') }}"
                  enctype="multipart/form-data">
                @csrf
                @if($event->exists) @method('PUT') @endif

                <div class="row g-4">
                    <div class="col-12">
                        <label class="form-label">Event Title <span style="color:#EF4444;">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $event->title) }}"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="e.g. AI in Healthcare Summit 2026">
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Date & Time <span style="color:#EF4444;">*</span></label>
                        <input type="datetime-local" name="event_date"
                               value="{{ old('event_date', $event->exists ? $event->event_date->format('Y-m-d\TH:i') : '') }}"
                               class="form-control @error('event_date') is-invalid @enderror">
                        @error('event_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Location <span style="color:#EF4444;">*</span></label>
                        <input type="text" name="location" value="{{ old('location', $event->location) }}"
                               class="form-control @error('location') is-invalid @enderror"
                               placeholder="e.g. Sunderland, UK / Online">
                        @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Description <span style="color:#EF4444;">*</span></label>
                        <textarea name="description" rows="4"
                                  class="form-control @error('description') is-invalid @enderror"
                                  placeholder="Describe the event…">{{ old('description', $event->description) }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Registration / Event Link</label>
                        <input type="url" name="link" value="{{ old('link', $event->link) }}"
                               class="form-control @error('link') is-invalid @enderror"
                               placeholder="https://...">
                        @error('link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Event Image</label>
                        @if($event->exists && $event->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/'.$event->image) }}" style="height:100px;border-radius:8px;border:1px solid var(--s200);object-fit:cover;" alt="Current">
                            <div style="font-size:.775rem;color:var(--s400);margin-top:.3rem;">Upload a new file to replace the current image.</div>
                        </div>
                        @endif
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        <div style="font-size:.775rem;color:var(--s400);margin-top:.3rem;">JPG, PNG, WebP — max 2MB</div>
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 d-flex gap-2 pt-2">
                        <button type="submit" class="btn btn-primary px-4 py-2">
                            <i class="bi bi-check-lg me-1"></i>{{ $event->exists ? 'Update Event' : 'Save Event' }}
                        </button>
                        <a href="{{ route('admin.events.index') }}" class="btn px-4 py-2" style="background:var(--s100);color:var(--s700);border:1px solid var(--s200);">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
