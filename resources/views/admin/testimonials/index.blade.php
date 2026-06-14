@extends('layouts.admin')
@section('title', 'Testimonials')
@section('page-title', 'Testimonials')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div style="font-size:.875rem;color:var(--s500);">{{ $testimonials->count() }} testimonial{{ $testimonials->count() !== 1 ? 's' : '' }}</div>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-sm px-3 py-2" style="border-radius:8px;font-size:.875rem;">
        <i class="bi bi-plus-lg me-1"></i>Add Testimonial
    </a>
</div>

<div class="data-card">
    @if($testimonials->isNotEmpty())
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Company / Role</th>
                    <th>Rating</th>
                    <th>Feedback</th>
                    <th>Added</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonials as $t)
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div style="width:34px;height:34px;border-radius:8px;background:var(--blue);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:.85rem;flex-shrink:0;">
                                {{ strtoupper(substr($t->client_name,0,1)) }}
                            </div>
                            <div style="font-weight:600;font-size:.875rem;color:var(--s900);">{{ $t->client_name }}</div>
                        </div>
                    </td>
                    <td>
                        <div style="font-size:.825rem;color:var(--s700);">{{ $t->job_title }}</div>
                        <div style="font-size:.775rem;color:var(--s400);">{{ $t->company }}</div>
                    </td>
                    <td>
                        <div style="color:#F59E0B;font-size:.8rem;letter-spacing:.1em;">
                            @for($i=1;$i<=5;$i++)<i class="bi {{ $i<=$t->rating?'bi-star-fill':'bi-star' }}"></i>@endfor
                        </div>
                        <div style="font-size:.75rem;color:var(--s400);">{{ $t->rating }}/5</div>
                    </td>
                    <td style="max-width:260px;">
                        <p style="font-size:.825rem;color:var(--s500);margin:0;overflow:hidden;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;">"{{ $t->feedback }}"</p>
                    </td>
                    <td style="font-size:.775rem;color:var(--s400);">{{ $t->created_at->format('d M Y') }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.testimonials.edit', $t) }}" class="btn-icon" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" onsubmit="return confirm('Delete this testimonial?')">
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
        <i class="bi bi-chat-quote" style="font-size:2.5rem;opacity:.2;display:block;margin-bottom:.75rem;"></i>
        <div style="font-weight:600;">No testimonials yet</div>
        <div style="font-size:.875rem;margin:.25rem 0 1rem;">Add your first client testimonial to display it on the website.</div>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-sm px-4">Add First Testimonial</a>
    </div>
    @endif
</div>

@endsection
