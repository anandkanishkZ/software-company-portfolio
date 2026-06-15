@extends('layouts.admin')
@section('title', 'Services')
@section('page-title', 'Services')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div style="font-size:.875rem;color:var(--s500);">{{ $services->count() }} service{{ $services->count() !== 1 ? 's' : '' }}</div>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm px-3 py-2" style="border-radius:8px;font-size:.875rem;">
        <i class="bi bi-plus-lg me-1"></i>Add Service
    </a>
</div>

<div class="data-card">
    @if($services->isNotEmpty())
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th style="width:40px;">Order</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $s)
                <tr>
                    <td style="color:var(--s400);font-size:.775rem;">{{ $s->sort_order }}</td>
                    <td>
                        <div style="width:36px;height:36px;border-radius:8px;background:var(--blue-lt);display:flex;align-items:center;justify-content:center;color:var(--blue);font-size:1.1rem;">
                            <i class="bi {{ $s->icon }}"></i>
                        </div>
                    </td>
                    <td>
                        <div style="font-weight:600;font-size:.875rem;color:var(--s900);">{{ $s->title }}</div>
                        <div style="font-size:.75rem;color:var(--s400);font-family:monospace;">{{ $s->icon }}</div>
                    </td>
                    <td style="max-width:320px;">
                        <p style="font-size:.825rem;color:var(--s500);margin:0;overflow:hidden;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;">{{ $s->description }}</p>
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.services.edit', $s) }}" class="btn-icon" title="Edit"><i class="bi bi-pencil"></i></a>
                            <form method="POST" action="{{ route('admin.services.destroy', $s) }}" onsubmit="return confirm('Delete this service?')">
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
        <i class="bi bi-gear" style="font-size:2.5rem;opacity:.2;display:block;margin-bottom:.75rem;"></i>
        <div style="font-weight:600;">No services yet</div>
        <div style="font-size:.875rem;margin:.25rem 0 1rem;">Add your first service to display it on the website.</div>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm px-4">Add First Service</a>
    </div>
    @endif
</div>

@endsection
