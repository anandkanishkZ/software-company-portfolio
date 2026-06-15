@extends('layouts.admin')
@section('title', 'Events')
@section('page-title', 'Events')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div style="font-size:.875rem;color:var(--s500);">{{ $events->count() }} event{{ $events->count() !== 1 ? 's' : '' }}</div>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary btn-sm px-3 py-2" style="border-radius:8px;font-size:.875rem;">
        <i class="bi bi-plus-lg me-1"></i>Add Event
    </a>
</div>

<div class="data-card">
    @if($events->isNotEmpty())
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $ev)
                <tr>
                    <td>
                        <div style="width:48px;text-align:center;background:var(--blue-lt);border-radius:8px;padding:.4rem .25rem;">
                            <div style="font-size:1.2rem;font-weight:800;color:var(--blue);line-height:1;">{{ $ev->event_date->format('d') }}</div>
                            <div style="font-size:.65rem;font-weight:700;color:var(--blue);text-transform:uppercase;">{{ $ev->event_date->format('M Y') }}</div>
                        </div>
                    </td>
                    <td>
                        <div style="font-weight:600;font-size:.875rem;color:var(--s900);">{{ $ev->title }}</div>
                        @if($ev->link)
                        <a href="{{ $ev->link }}" target="_blank" style="font-size:.75rem;color:var(--blue);text-decoration:none;"><i class="bi bi-link-45deg"></i> Register link</a>
                        @endif
                    </td>
                    <td style="font-size:.825rem;color:var(--s500);"><i class="bi bi-geo-alt me-1" style="color:var(--s400);"></i>{{ $ev->location }}</td>
                    <td style="max-width:240px;">
                        <p style="font-size:.825rem;color:var(--s500);margin:0;overflow:hidden;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;">{{ $ev->description }}</p>
                    </td>
                    <td>
                        @if($ev->event_date->isPast())
                        <span style="background:var(--s100);color:var(--s500);font-size:.7rem;font-weight:700;padding:.2rem .6rem;border-radius:6px;border:1px solid var(--s200);">Past</span>
                        @else
                        <span style="background:#F0FDF4;color:#16A34A;font-size:.7rem;font-weight:700;padding:.2rem .6rem;border-radius:6px;border:1px solid #BBF7D0;">Upcoming</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.events.edit', $ev) }}" class="btn-icon" title="Edit"><i class="bi bi-pencil"></i></a>
                            <form method="POST" action="{{ route('admin.events.destroy', $ev) }}" onsubmit="return confirm('Delete this event?')">
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
        <i class="bi bi-calendar-event" style="font-size:2.5rem;opacity:.2;display:block;margin-bottom:.75rem;"></i>
        <div style="font-weight:600;">No events yet</div>
        <div style="font-size:.875rem;margin:.25rem 0 1rem;">Create events to display on the website.</div>
        <a href="{{ route('admin.events.create') }}" class="btn btn-primary btn-sm px-4">Add First Event</a>
    </div>
    @endif
</div>

@endsection
