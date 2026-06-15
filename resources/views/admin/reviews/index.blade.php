@extends('layouts.admin')
@section('title', 'Public Reviews')
@section('page-title', 'Public Reviews')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div style="font-size:.875rem;color:var(--s500);">
        {{ $reviews->where('is_approved', false)->count() }} pending ·
        {{ $reviews->where('is_approved', true)->count() }} approved
    </div>
</div>

<div class="data-card">
    @if($reviews->isNotEmpty())
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Reviewer</th>
                    <th>Rating</th>
                    <th>Review</th>
                    <th>Submitted</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $r)
                <tr>
                    <td>
                        <div style="font-weight:600;font-size:.875rem;color:var(--s900);">{{ $r->client_name }}</div>
                        @if($r->job_title || $r->company)
                        <div style="font-size:.775rem;color:var(--s400);">{{ $r->job_title }}@if($r->job_title && $r->company), @endif{{ $r->company }}</div>
                        @endif
                    </td>
                    <td>
                        <div style="color:#F59E0B;font-size:.85rem;">
                            @for($i=1;$i<=5;$i++)<i class="bi {{ $i<=$r->rating?'bi-star-fill':'bi-star' }}"></i>@endfor
                        </div>
                    </td>
                    <td style="max-width:300px;">
                        <p style="font-size:.825rem;color:var(--s500);margin:0;overflow:hidden;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;">"{{ $r->feedback }}"</p>
                    </td>
                    <td style="font-size:.775rem;color:var(--s400);">{{ $r->created_at->format('d M Y') }}</td>
                    <td>
                        @if($r->is_approved)
                        <span style="background:#F0FDF4;color:#16A34A;font-size:.7rem;font-weight:700;padding:.2rem .6rem;border-radius:6px;border:1px solid #BBF7D0;">Live</span>
                        @else
                        <span style="background:#FEF9C3;color:#854D0E;font-size:.7rem;font-weight:700;padding:.2rem .6rem;border-radius:6px;border:1px solid #FEF08A;">Pending</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            @if(!$r->is_approved)
                            <form method="POST" action="{{ route('admin.reviews.approve', $r) }}">
                                @csrf @method('PATCH')
                                <button type="submit" class="btn-icon" title="Approve" style="color:#16A34A;border-color:#BBF7D0;" onmouseover="this.style.background='#F0FDF4'" onmouseout="this.style.background=''">
                                    <i class="bi bi-check-lg"></i>
                                </button>
                            </form>
                            @endif
                            <form method="POST" action="{{ route('admin.reviews.destroy', $r) }}" onsubmit="return confirm('Delete this review?')">
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
        <i class="bi bi-star-half" style="font-size:2.5rem;opacity:.2;display:block;margin-bottom:.75rem;"></i>
        <div style="font-weight:600;">No public reviews yet</div>
        <div style="font-size:.875rem;margin:.25rem 0;">Reviews submitted by visitors will appear here for approval.</div>
    </div>
    @endif
</div>

@endsection
