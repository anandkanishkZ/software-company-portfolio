@extends('layouts.admin')
@section('title', 'Gallery')
@section('page-title', 'Gallery')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div style="font-size:.875rem;color:var(--s500);">{{ $images->count() }} image{{ $images->count() !== 1 ? 's' : '' }}</div>
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary btn-sm px-3 py-2" style="border-radius:8px;font-size:.875rem;">
        <i class="bi bi-plus-lg me-1"></i>Add Image
    </a>
</div>

<div class="data-card">
    @if($images->isNotEmpty())
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Event / Category</th>
                    <th>Order</th>
                    <th>Added</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($images as $img)
                <tr>
                    <td>
                        <img src="{{ asset('storage/'.$img->image_path) }}"
                             style="width:64px;height:44px;object-fit:cover;border-radius:6px;border:1px solid var(--s200);" alt="{{ $img->title }}">
                    </td>
                    <td style="font-weight:600;font-size:.875rem;color:var(--s900);">{{ $img->title }}</td>
                    <td>
                        @if($img->event_name)
                        <span style="background:var(--blue-lt);color:var(--blue);font-size:.75rem;font-weight:600;padding:.2rem .6rem;border-radius:6px;">{{ $img->event_name }}</span>
                        @else
                        <span style="color:var(--s400);font-size:.8rem;">—</span>
                        @endif
                    </td>
                    <td style="font-size:.825rem;color:var(--s500);">{{ $img->sort_order }}</td>
                    <td style="font-size:.775rem;color:var(--s400);">{{ $img->created_at->format('d M Y') }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.gallery.edit', $img) }}" class="btn-icon" title="Edit"><i class="bi bi-pencil"></i></a>
                            <form method="POST" action="{{ route('admin.gallery.destroy', $img) }}" onsubmit="return confirm('Delete this image?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-icon" title="Delete" style="color:#EF4444;border-color:#FECACA;" onmouseover="this.style.background='#FEF2F2'" onmouseout="this.style.background=''">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="text-center py-5" style="color:var(--s400);">
        <i class="bi bi-images" style="font-size:2.5rem;opacity:.2;display:block;margin-bottom:.75rem;"></i>
        <div style="font-weight:600;">No gallery images yet</div>
        <div style="font-size:.875rem;margin:.25rem 0 1rem;">Upload images to populate the gallery.</div>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary btn-sm px-4">Upload First Image</a>
    </div>
    @endif
</div>

@endsection
