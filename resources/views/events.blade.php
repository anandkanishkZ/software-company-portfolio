@extends('layouts.app')
@section('title', 'Events')

@section('content')

<section class="page-hero">
    <div class="container position-relative">
        <p class="section-label mb-2" style="color:#93C5FD;">Events & Promotions</p>
        <h1 style="font-size:clamp(2rem,4vw,3rem);font-weight:800;line-height:1.1;" class="mb-3">Meet AI-Solutions</h1>
        <p class="mb-0" style="color:rgba(255,255,255,.6);font-size:1.05rem;max-width:540px;">Conferences, expos, and roundtables — find us at the most important gatherings in AI and technology.</p>
    </div>
</section>

<section style="padding:80px 0;">
    <div class="container">

        {{-- Upcoming --}}
        <div class="d-flex align-items-center gap-3 mb-4">
            <div class="icon-box" style="width:36px;height:36px;border-radius:8px;font-size:1rem;"><i class="bi bi-calendar-event"></i></div>
            <h3 style="font-size:1.15rem;font-weight:700;margin-bottom:0;color:var(--slate-900);">Upcoming Events</h3>
        </div>

        @if($upcomingEvents->isNotEmpty())
        <div class="row g-4 mb-5">
            @foreach($upcomingEvents as $event)
            <div class="col-md-6">
                <div class="card p-4 h-100">
                    @if($event->image)
                    <img src="{{ asset('storage/'.$event->image) }}" class="w-100 mb-4" style="height:180px;object-fit:cover;border-radius:8px;" alt="{{ $event->title }}">
                    @endif
                    <div class="d-flex gap-3 align-items-start">
                        <div class="text-center flex-shrink-0" style="width:56px;background:var(--blue-lt);border-radius:10px;padding:.6rem .25rem;">
                            <div style="font-size:1.5rem;font-weight:800;color:var(--blue);line-height:1;">{{ $event->event_date->format('d') }}</div>
                            <div style="font-size:.7rem;font-weight:700;color:var(--blue);text-transform:uppercase;letter-spacing:.04em;">{{ $event->event_date->format('M Y') }}</div>
                        </div>
                        <div class="flex-grow-1">
                            <h5 style="font-size:1rem;font-weight:700;color:var(--slate-900);line-height:1.3;" class="mb-1">{{ $event->title }}</h5>
                            <div style="font-size:.8rem;color:var(--slate-400);" class="mb-2">
                                <i class="bi bi-geo-alt me-1"></i>{{ $event->location }}
                                &nbsp;·&nbsp;
                                <i class="bi bi-clock me-1"></i>{{ $event->event_date->format('D, d M Y') }}
                            </div>
                            <p style="font-size:.875rem;" class="mb-3">{{ $event->description }}</p>
                            @if($event->link)
                            <a href="{{ $event->link }}" target="_blank" class="btn btn-primary btn-sm px-3">
                                Register <i class="bi bi-box-arrow-up-right ms-1"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="card card-flat p-4 mb-5" style="background:var(--slate-50);">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-box flex-shrink-0"><i class="bi bi-calendar-x"></i></div>
                <div>
                    <div style="font-weight:600;color:var(--slate-700);">No upcoming events scheduled</div>
                    <div style="font-size:.875rem;color:var(--slate-400);">Check back soon — we're always planning new events.</div>
                </div>
            </div>
        </div>
        @endif

        {{-- Past --}}
        @if($pastEvents->isNotEmpty())
        <div class="d-flex align-items-center gap-3 mb-4 mt-2">
            <div class="icon-box" style="width:36px;height:36px;border-radius:8px;font-size:1rem;background:var(--slate-100);color:var(--slate-400);"><i class="bi bi-clock-history"></i></div>
            <h3 style="font-size:1.15rem;font-weight:700;margin-bottom:0;color:var(--slate-500);">Past Events</h3>
        </div>
        <div class="row g-3">
            @foreach($pastEvents as $event)
            <div class="col-md-6 col-lg-4">
                <div class="card p-3" style="opacity:.65;">
                    <div class="d-flex gap-3 align-items-center">
                        <div class="text-center flex-shrink-0" style="width:48px;background:var(--slate-100);border-radius:8px;padding:.4rem .25rem;">
                            <div style="font-size:1.1rem;font-weight:700;color:var(--slate-500);line-height:1;">{{ $event->event_date->format('d') }}</div>
                            <div style="font-size:.65rem;font-weight:700;color:var(--slate-400);text-transform:uppercase;">{{ $event->event_date->format('M Y') }}</div>
                        </div>
                        <div>
                            <div style="font-weight:600;font-size:.875rem;color:var(--slate-700);">{{ $event->title }}</div>
                            <div style="font-size:.775rem;color:var(--slate-400);"><i class="bi bi-geo-alt me-1"></i>{{ $event->location }}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

@endsection
