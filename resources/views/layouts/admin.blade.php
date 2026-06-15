<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | AI-Solutions Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        :root {
            --navy:#0F172A; --blue:#2563EB; --blue-lt:#EFF6FF;
            --s50:#F8FAFC; --s100:#F1F5F9; --s200:#E2E8F0;
            --s400:#94A3B8; --s500:#64748B; --s700:#334155; --s900:#0F172A;
        }
        body { font-family:'Inter',sans-serif; background:var(--s50); color:var(--s900); -webkit-font-smoothing:antialiased; }

        /* Sidebar */
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: var(--navy);
            position: fixed;
            top: 0; left: 0;
            z-index: 200;
            display: flex;
            flex-direction: column;
            border-right: 1px solid rgba(255,255,255,.05);
        }
        .sidebar-top {
            padding: 1.5rem 1.25rem 1rem;
            border-bottom: 1px solid rgba(255,255,255,.07);
        }
        .sidebar-brand { font-size: 1.2rem; font-weight: 800; color: #fff; text-decoration: none; }
        .sidebar-brand .dot { color: var(--blue); }
        .sidebar-label {
            font-size: .65rem;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: rgba(255,255,255,.3);
            padding: 1.25rem 1.25rem .5rem;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .6rem 1.25rem;
            color: rgba(255,255,255,.6);
            text-decoration: none;
            font-size: .875rem;
            font-weight: 500;
            border-left: 2px solid transparent;
            transition: all .15s;
        }
        .sidebar-link i { font-size: 1rem; width: 18px; text-align: center; }
        .sidebar-link:hover { color: #fff; background: rgba(255,255,255,.05); }
        .sidebar-link.active { color: #fff; background: rgba(37,99,235,.2); border-left-color: var(--blue); }
        .sidebar-link .badge-count {
            margin-left: auto;
            background: #EF4444;
            color: #fff;
            font-size: .7rem;
            font-weight: 700;
            padding: .15rem .5rem;
            border-radius: 999px;
        }
        .sidebar-footer {
            margin-top: auto;
            padding: 1rem 1.25rem;
            border-top: 1px solid rgba(255,255,255,.07);
        }
        .logout-btn {
            display: flex;
            align-items: center;
            gap: .6rem;
            background: none;
            border: none;
            color: rgba(255,255,255,.45);
            font-size: .875rem;
            font-weight: 500;
            cursor: pointer;
            padding: .5rem 0;
            width: 100%;
            transition: color .15s;
        }
        .logout-btn:hover { color: rgba(255,255,255,.9); }

        /* Main */
        .main { margin-left: 240px; min-height: 100vh; display: flex; flex-direction: column; }

        /* Topbar */
        .topbar {
            background: #fff;
            border-bottom: 1px solid var(--s200);
            padding: .875rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .topbar-title { font-size: .9375rem; font-weight: 700; color: var(--s900); }
        .admin-chip {
            display: flex;
            align-items: center;
            gap: .5rem;
            background: var(--s100);
            border: 1px solid var(--s200);
            border-radius: 8px;
            padding: .35rem .75rem;
            font-size: .825rem;
            font-weight: 600;
            color: var(--s700);
        }

        /* Cards */
        .stat-card {
            background: #fff;
            border: 1px solid var(--s200);
            border-radius: 14px;
            padding: 1.5rem;
        }
        .stat-icon {
            width: 48px; height: 48px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
        }
        .stat-label { font-size: .75rem; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; color: var(--s400); }
        .stat-value { font-size: 2rem; font-weight: 800; line-height: 1.1; color: var(--s900); margin-top: .2rem; }

        /* Table */
        .data-card {
            background: #fff;
            border: 1px solid var(--s200);
            border-radius: 14px;
            overflow: hidden;
        }
        .data-card-header {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid var(--s200);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .data-card-title { font-size: .9rem; font-weight: 700; color: var(--s900); }
        table thead th {
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .07em;
            text-transform: uppercase;
            color: var(--s400);
            background: var(--s50);
            border-bottom: 1px solid var(--s200) !important;
            padding: .75rem 1rem;
        }
        table tbody td { font-size: .875rem; padding: .75rem 1rem; border-bottom: 1px solid var(--s100); color: var(--s700); vertical-align: middle; }
        table tbody tr:last-child td { border-bottom: none; }
        table tbody tr:hover td { background: var(--s50); }

        .badge-new { background: #FEF2F2; color: #DC2626; font-size: .7rem; font-weight: 700; padding: .2rem .6rem; border-radius: 6px; border: 1px solid #FECACA; }
        .badge-read { background: #F0FDF4; color: #16A34A; font-size: .7rem; font-weight: 700; padding: .2rem .6rem; border-radius: 6px; border: 1px solid #BBF7D0; }

        .btn-icon {
            width: 32px; height: 32px;
            border: 1px solid var(--s200);
            background: #fff;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--s500);
            font-size: .85rem;
            cursor: pointer;
            transition: all .15s;
        }
        .btn-icon:hover { border-color: var(--blue); color: var(--blue); background: var(--blue-lt); }

        /* Bar chart */
        .bar-col { display: flex; flex-direction: column; align-items: center; gap: .3rem; flex: 1; }
        .bar-fill { background: var(--blue); border-radius: 4px 4px 0 0; width: 100%; opacity: .85; transition: opacity .2s; }
        .bar-fill:hover { opacity: 1; }
        .bar-lbl { font-size: .7rem; color: var(--s400); font-weight: 500; }
        .bar-val { font-size: .75rem; font-weight: 700; color: var(--s700); }

        @media(max-width:991px){ .sidebar{display:none;} .main{margin-left:0;} }
    </style>
    @stack('styles')
</head>
<body>

{{-- Sidebar --}}
<aside class="sidebar">
    <div class="sidebar-top">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">AI<span class="dot">.</span>Solutions</a>
        <div style="font-size:.7rem;color:rgba(255,255,255,.3);margin-top:.2rem;font-weight:500;">Admin Panel</div>
    </div>

    <div class="sidebar-label">Navigation</div>

    <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <a href="{{ route('admin.inquiries') }}" class="sidebar-link {{ request()->routeIs('admin.inquiries') ? 'active' : '' }}">
        <i class="bi bi-envelope"></i> Inquiries
        @php $unread = \App\Models\Contact::where('is_read',false)->count(); @endphp
        @if($unread > 0)<span class="badge-count">{{ $unread }}</span>@endif
    </a>

    <a href="{{ route('admin.testimonials.index') }}" class="sidebar-link {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
        <i class="bi bi-chat-quote"></i> Testimonials
        @php $total = \App\Models\Testimonial::count(); @endphp
        @if($total > 0)<span style="margin-left:auto;font-size:.7rem;color:rgba(255,255,255,.3);">{{ $total }}</span>@endif
    </a>

    <a href="{{ route('admin.articles.index') }}" class="sidebar-link {{ request()->routeIs('admin.articles*') ? 'active' : '' }}">
        <i class="bi bi-newspaper"></i> Articles
        @php $articleCount = \App\Models\Article::count(); @endphp
        @if($articleCount > 0)<span style="margin-left:auto;font-size:.7rem;color:rgba(255,255,255,.3);">{{ $articleCount }}</span>@endif
    </a>

    <a href="{{ route('admin.services.index') }}" class="sidebar-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
        <i class="bi bi-gear"></i> Services
    </a>

    <a href="{{ route('admin.industries.index') }}" class="sidebar-link {{ request()->routeIs('admin.industries*') ? 'active' : '' }}">
        <i class="bi bi-building"></i> Industries
    </a>

    <a href="{{ route('admin.gallery.index') }}" class="sidebar-link {{ request()->routeIs('admin.gallery*') ? 'active' : '' }}">
        <i class="bi bi-images"></i> Gallery
    </a>

    <a href="{{ route('admin.events.index') }}" class="sidebar-link {{ request()->routeIs('admin.events*') ? 'active' : '' }}">
        <i class="bi bi-calendar-event"></i> Events
    </a>

    @php $pendingReviews = \App\Models\Testimonial::where('is_approved', false)->where('source', 'public')->count(); @endphp
    <a href="{{ route('admin.reviews.index') }}" class="sidebar-link {{ request()->routeIs('admin.reviews*') ? 'active' : '' }}">
        <i class="bi bi-star-half"></i> Reviews
        @if($pendingReviews > 0)<span class="badge-count">{{ $pendingReviews }}</span>@endif
    </a>

    <div class="sidebar-label" style="margin-top:.5rem;">External</div>

    <a href="{{ route('home') }}" class="sidebar-link" target="_blank">
        <i class="bi bi-globe"></i> View Website
        <i class="bi bi-box-arrow-up-right ms-auto" style="font-size:.7rem;opacity:.4;"></i>
    </a>

    <div class="sidebar-footer">
        <div style="font-size:.75rem;color:rgba(255,255,255,.3);margin-bottom:.6rem;">Signed in as</div>
        <div style="font-size:.85rem;color:rgba(255,255,255,.75);font-weight:600;margin-bottom:1rem;">{{ session('admin_name', 'Admin') }}</div>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="bi bi-box-arrow-left"></i> Sign Out
            </button>
        </form>
    </div>
</aside>

{{-- Main --}}
<div class="main">
    <div class="topbar">
        <span class="topbar-title">@yield('page-title', 'Dashboard')</span>
        <div class="admin-chip">
            <i class="bi bi-person-circle" style="color:var(--blue);"></i>
            {{ session('admin_name', 'Admin') }}
        </div>
    </div>

    @if(session('success'))
    <div style="background:#F0FDF4;border-bottom:1px solid #BBF7D0;padding:.75rem 1.5rem;font-size:.875rem;color:#166534;display:flex;align-items:center;gap:.5rem;">
        <i class="bi bi-check-circle-fill"></i>{{ session('success') }}
    </div>
    @endif

    <div style="padding:1.5rem;flex:1;">
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
