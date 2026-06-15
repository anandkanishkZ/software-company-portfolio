@extends('layouts.admin')
@section('title', 'Inquiries')
@section('page-title', 'Customer Inquiries')

@section('content')

<div class="data-card">
    <div class="data-card-header">
        <div class="d-flex align-items-center gap-3">
            <div class="data-card-title">All Inquiries</div>
            <span style="background:var(--s100);border:1px solid var(--s200);border-radius:6px;font-size:.75rem;font-weight:700;padding:.2rem .6rem;color:var(--s500);">
                {{ $contacts->total() }} total
            </span>
        </div>
        <a href="{{ route('admin.dashboard') }}" style="font-size:.8rem;font-weight:600;color:var(--s500);text-decoration:none;">
            <i class="bi bi-arrow-left me-1"></i>Dashboard
        </a>
    </div>

    @if($contacts->isNotEmpty())
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th style="width:30px;">#</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Company</th>
                    <th>Country</th>
                    <th>Job Title</th>
                    <th>Details</th>
                    <th>Received</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $c)
                <tr>
                    <td style="color:var(--s400);font-size:.775rem;">{{ $c->id }}</td>
                    <td>
                        <div style="font-weight:600;font-size:.875rem;color:var(--s900);">{{ $c->name }}</div>
                    </td>
                    <td>
                        <a href="mailto:{{ $c->email }}" style="font-size:.825rem;color:var(--blue);text-decoration:none;display:block;">{{ $c->email }}</a>
                        <span style="font-size:.775rem;color:var(--s400);">{{ $c->phone }}</span>
                    </td>
                    <td style="font-size:.825rem;">{{ $c->company_name }}</td>
                    <td style="font-size:.825rem;">{{ $c->country }}</td>
                    <td style="font-size:.825rem;">{{ $c->job_title }}</td>
                    <td>
                        <button class="btn-icon" data-bs-toggle="modal" data-bs-target="#detailModal{{ $c->id }}" title="View job details">
                            <i class="bi bi-eye"></i>
                        </button>
                    </td>
                    <td style="font-size:.775rem;color:var(--s400);">
                        <div>{{ $c->created_at->format('d M Y') }}</div>
                        <div>{{ $c->created_at->format('H:i') }}</div>
                    </td>
                    <td>
                        @if($c->admin_response)
                        <span style="background:#F0FDF4;color:#16A34A;font-size:.7rem;font-weight:700;padding:.2rem .6rem;border-radius:6px;border:1px solid #BBF7D0;">Responded</span>
                        @elseif($c->is_read)
                        <span class="badge-read">Read</span>
                        @else
                        <span class="badge-new">New</span>
                        @endif
                    </td>
                    <td>
                        @if(!$c->is_read)
                        <form method="POST" action="{{ route('admin.inquiries.read', $c) }}" class="d-inline">
                            @csrf @method('PATCH')
                            <button type="submit" class="btn-icon" title="Mark as read" style="color:var(--green,#16A34A);">
                                <i class="bi bi-check2-all"></i>
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-3">{{ $contacts->links() }}</div>
    @else
    <div class="text-center py-5" style="color:var(--s400);">
        <i class="bi bi-inbox" style="font-size:2.5rem;opacity:.25;display:block;margin-bottom:.75rem;"></i>
        <div style="font-weight:600;">No inquiries yet</div>
        <div style="font-size:.875rem;margin-top:.25rem;">New enquiries will appear here</div>
    </div>
    @endif
</div>

{{-- Detail Modals --}}
@foreach($contacts as $c)
<div class="modal fade" id="detailModal{{ $c->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border:1px solid var(--s200);border-radius:14px;box-shadow:0 8px 32px rgba(15,23,42,.12);">
            <div class="modal-header" style="border-bottom:1px solid var(--s200);padding:1rem 1.25rem;">
                <div>
                    <div style="font-weight:700;font-size:.9375rem;color:var(--s900);">{{ $c->name }}</div>
                    <div style="font-size:.775rem;color:var(--s400);">{{ $c->job_title }} · {{ $c->company_name }}</div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:1.25rem;">
                <div style="font-size:.75rem;font-weight:700;letter-spacing:.07em;text-transform:uppercase;color:var(--s400);margin-bottom:.5rem;">Job Details</div>
                <p style="font-size:.9rem;line-height:1.7;color:var(--s700);background:var(--s50);border:1px solid var(--s200);border-radius:8px;padding:1rem;margin-bottom:0;">{{ $c->job_details }}</p>
                <div class="row g-2 mt-3" style="font-size:.8rem;">
                    <div class="col-6"><span style="color:var(--s400);">Email:</span> <a href="mailto:{{ $c->email }}" style="color:var(--blue);text-decoration:none;">{{ $c->email }}</a></div>
                    <div class="col-6"><span style="color:var(--s400);">Phone:</span> {{ $c->phone }}</div>
                    <div class="col-6"><span style="color:var(--s400);">Country:</span> {{ $c->country }}</div>
                    <div class="col-6"><span style="color:var(--s400);">Received:</span> {{ $c->created_at->format('d M Y, H:i') }}</div>
                </div>

                {{-- Admin Response --}}
                <div style="margin-top:1.25rem;padding-top:1.25rem;border-top:1px solid var(--s200);">
                    <div style="font-size:.75rem;font-weight:700;letter-spacing:.07em;text-transform:uppercase;color:var(--s400);margin-bottom:.75rem;">
                        Admin Response
                    </div>
                    @if($c->admin_response)
                    <div style="background:#F0FDF4;border:1px solid #BBF7D0;border-radius:8px;padding:.875rem;font-size:.875rem;color:#166534;line-height:1.6;margin-bottom:.75rem;">
                        <i class="bi bi-check-circle-fill me-1"></i>{{ $c->admin_response }}
                        <div style="font-size:.75rem;color:#4ADE80;margin-top:.4rem;">Sent {{ $c->responded_at->format('d M Y, H:i') }}</div>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('admin.inquiries.respond', $c) }}">
                        @csrf
                        <textarea name="admin_response" rows="3"
                                  class="form-control mb-2"
                                  style="font-size:.875rem;"
                                  placeholder="Type a short acknowledgement or response…">{{ $c->admin_response }}</textarea>
                        <button type="submit" class="btn btn-primary btn-sm px-3 py-2" style="font-size:.8rem;">
                            <i class="bi bi-send me-1"></i>{{ $c->admin_response ? 'Update Response' : 'Save Response' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
