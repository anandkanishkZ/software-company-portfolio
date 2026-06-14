@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- Stats --}}
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label">Total Inquiries</div>
                    <div class="stat-value">{{ $totalInquiries }}</div>
                </div>
                <div class="stat-icon" style="background:#EFF6FF;color:#2563EB;">
                    <i class="bi bi-envelope"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label">Unread</div>
                    <div class="stat-value" style="color:#DC2626;">{{ $newInquiries }}</div>
                </div>
                <div class="stat-icon" style="background:#FEF2F2;color:#DC2626;">
                    <i class="bi bi-envelope-exclamation"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label">Today</div>
                    <div class="stat-value" style="color:#16A34A;">{{ $todayInquiries }}</div>
                </div>
                <div class="stat-icon" style="background:#F0FDF4;color:#16A34A;">
                    <i class="bi bi-calendar-check"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label">This Month</div>
                    <div class="stat-value" style="color:#7C3AED;">{{ $thisMonthInquiries }}</div>
                </div>
                <div class="stat-icon" style="background:#F5F3FF;color:#7C3AED;">
                    <i class="bi bi-calendar-month"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">

    {{-- Bar Chart --}}
    <div class="col-lg-4">
        <div class="data-card h-100">
            <div class="data-card-header">
                <div class="data-card-title">Inquiries by Month</div>
                <span style="font-size:.75rem;color:var(--s400);">Last 6 months</span>
            </div>
            <div class="p-4">
                @if($monthlyStats->isNotEmpty())
                @php $max = $monthlyStats->max('count') ?: 1; $months = $monthlyStats->reverse(); @endphp
                <div class="d-flex align-items-end gap-2" style="height:160px;">
                    @foreach($months as $stat)
                    @php $h = max(6, ($stat->count / $max) * 140); @endphp
                    <div class="bar-col">
                        <div class="bar-val">{{ $stat->count }}</div>
                        <div class="bar-fill" style="height:{{ $h }}px;"></div>
                        <div class="bar-lbl">{{ \Carbon\Carbon::create($stat->year,$stat->month)->format('M') }}</div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-5" style="color:var(--s400);">
                    <i class="bi bi-bar-chart" style="font-size:2rem;opacity:.3;display:block;margin-bottom:.5rem;"></i>
                    No data yet
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Recent Inquiries --}}
    <div class="col-lg-8">
        <div class="data-card h-100">
            <div class="data-card-header">
                <div class="data-card-title">Recent Inquiries</div>
                <a href="{{ route('admin.inquiries') }}" style="font-size:.8rem;font-weight:600;color:var(--blue);text-decoration:none;">
                    View all <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            @if($recentContacts->isNotEmpty())
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Country</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentContacts as $c)
                        <tr>
                            <td>
                                <div style="font-weight:600;font-size:.875rem;color:var(--s900);">{{ $c->name }}</div>
                                <div style="font-size:.775rem;color:var(--s400);">{{ $c->email }}</div>
                            </td>
                            <td style="font-size:.825rem;">{{ $c->company_name }}</td>
                            <td style="font-size:.825rem;">{{ $c->country }}</td>
                            <td style="font-size:.775rem;color:var(--s400);">{{ $c->created_at->format('d M Y') }}</td>
                            <td>
                                @if($c->is_read)
                                <span class="badge-read">Read</span>
                                @else
                                <span class="badge-new">New</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-5" style="color:var(--s400);">
                <i class="bi bi-inbox" style="font-size:2rem;opacity:.3;display:block;margin-bottom:.5rem;"></i>
                No inquiries yet
            </div>
            @endif
        </div>
    </div>

</div>
@endsection
