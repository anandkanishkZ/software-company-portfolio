@extends('layouts.admin')
@section('title', 'Industries')
@section('page-title', 'Industries')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div style="font-size:.875rem;color:var(--s500);">{{ $industries->count() }} industry case {{ $industries->count() !== 1 ? 'studies' : 'study' }}</div>
    <a href="{{ route('admin.industries.create') }}" class="btn btn-primary btn-sm px-3 py-2" style="border-radius:8px;font-size:.875rem;">
        <i class="bi bi-plus-lg me-1"></i>Add Industry
    </a>
</div>

<div class="data-card">
    @if($industries->isNotEmpty())
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Case Study Title</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($industries as $ind)
                <tr>
                    <td>
                        @if($ind->image)
                        <img src="{{ asset('storage/'.$ind->image) }}" style="width:48px;height:36px;object-fit:cover;border-radius:6px;border:1px solid var(--s200);" alt="">
                        @else
                        <div style="width:48px;height:36px;border-radius:6px;background:var(--s100);display:flex;align-items:center;justify-content:center;border:1px solid var(--s200);">
                            <i class="bi bi-image" style="color:var(--s400);font-size:.8rem;"></i>
                        </div>
                        @endif
                    </td>
                    <td>
                        <span style="background:var(--blue-lt);color:var(--blue);font-size:.75rem;font-weight:700;padding:.2rem .6rem;border-radius:6px;">{{ $ind->name }}</span>
                    </td>
                    <td style="font-weight:600;font-size:.875rem;color:var(--s900);max-width:220px;">{{ $ind->title }}</td>
                    <td style="max-width:280px;">
                        <p style="font-size:.825rem;color:var(--s500);margin:0;overflow:hidden;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;">{{ $ind->description }}</p>
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.industries.edit', $ind) }}" class="btn-icon" title="Edit"><i class="bi bi-pencil"></i></a>
                            <form method="POST" action="{{ route('admin.industries.destroy', $ind) }}" onsubmit="return confirm('Delete this industry?')">
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
        <i class="bi bi-building" style="font-size:2.5rem;opacity:.2;display:block;margin-bottom:.75rem;"></i>
        <div style="font-weight:600;">No industries yet</div>
        <div style="font-size:.875rem;margin:.25rem 0 1rem;">Add industry case studies to display on the website.</div>
        <a href="{{ route('admin.industries.create') }}" class="btn btn-primary btn-sm px-4">Add First Industry</a>
    </div>
    @endif
</div>

@endsection
