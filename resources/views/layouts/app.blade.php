<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'AI-Solutions') | AI-Solutions Sunderland</title>
    <meta name="description" content="@yield('meta_description', 'AI-Solutions leverages AI to assist industries with software solutions that speed up design, engineering, and innovation.')">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    <style>
        /* ── Design Tokens ─────────────────────────────────── */
        :root {
            --navy:     #0F172A;
            --blue:     #2563EB;
            --blue-dk:  #1D4ED8;
            --blue-lt:  #EFF6FF;
            --slate-50: #F8FAFC;
            --slate-100:#F1F5F9;
            --slate-200:#E2E8F0;
            --slate-400:#94A3B8;
            --slate-500:#64748B;
            --slate-700:#334155;
            --slate-900:#0F172A;
            --white:    #FFFFFF;
            --success:  #10B981;
        }

        /* ── Base ──────────────────────────────────────────── */
        *, *::before, *::after { box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            color: var(--slate-900);
            background: var(--white);
            -webkit-font-smoothing: antialiased;
        }
        h1,h2,h3,h4,h5,h6 { font-weight: 700; color: var(--slate-900); }
        p { color: var(--slate-500); line-height: 1.75; }
        a { transition: color .15s; }

        /* ── Navbar ────────────────────────────────────────── */
        .navbar {
            background: var(--navy) !important;
            padding: 0.875rem 0;
            border-bottom: 1px solid rgba(255,255,255,.06);
        }
        .navbar-brand {
            font-size: 1.35rem;
            font-weight: 800;
            color: #fff !important;
            letter-spacing: -0.5px;
            text-decoration: none;
        }
        .navbar-brand .dot { color: var(--blue); }
        .nav-link {
            color: rgba(255,255,255,.7) !important;
            font-weight: 500;
            font-size: .9rem;
            padding: .5rem .75rem !important;
            border-radius: 6px;
            transition: all .15s;
        }
        .nav-link:hover { color: #fff !important; background: rgba(255,255,255,.07); }
        .nav-link.active { color: #fff !important; }
        .btn-nav {
            background: var(--blue);
            color: #fff;
            font-weight: 600;
            font-size: .875rem;
            padding: .5rem 1.125rem;
            border-radius: 8px;
            border: none;
            text-decoration: none;
            transition: background .15s;
        }
        .btn-nav:hover { background: var(--blue-dk); color: #fff; }

        /* ── Buttons ───────────────────────────────────────── */
        .btn { font-weight: 600; border-radius: 8px; transition: all .15s; }
        .btn-primary {
            background: var(--blue);
            border: none;
            color: #fff;
            box-shadow: 0 1px 2px rgba(37,99,235,.2);
        }
        .btn-primary:hover { background: var(--blue-dk); color: #fff; }
        .btn-dark-solid {
            background: var(--navy);
            border: none;
            color: #fff;
        }
        .btn-dark-solid:hover { background: var(--slate-700); color: #fff; }
        .btn-outline-light:hover { background: rgba(255,255,255,.1); color: #fff; border-color: rgba(255,255,255,.5); }
        .btn-outline-primary { border-color: var(--blue); color: var(--blue); }
        .btn-outline-primary:hover { background: var(--blue); border-color: var(--blue); color: #fff; }

        /* ── Cards ─────────────────────────────────────────── */
        .card {
            border: 1px solid var(--slate-200);
            border-radius: 12px;
            box-shadow: none;
            background: var(--white);
            transition: box-shadow .2s, border-color .2s, transform .2s;
        }
        .card:hover {
            box-shadow: 0 4px 24px rgba(15,23,42,.08);
            border-color: var(--slate-200);
            transform: translateY(-2px);
        }
        .card-flat { border: 1px solid var(--slate-200); border-radius: 12px; background: var(--white); }

        /* ── Service Icon ──────────────────────────────────── */
        .icon-box {
            width: 52px;
            height: 52px;
            background: var(--blue-lt);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: var(--blue);
            flex-shrink: 0;
        }

        /* ── Section Labels ────────────────────────────────── */
        .section-label {
            font-size: .75rem;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: var(--blue);
        }
        .section-heading { font-size: clamp(1.6rem, 3vw, 2.25rem); font-weight: 800; color: var(--slate-900); line-height: 1.2; }
        .section-sub { font-size: 1.05rem; color: var(--slate-500); }

        /* ── Hero ──────────────────────────────────────────── */
        .hero {
            background: var(--navy);
            padding: 96px 0 80px;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 1px 1px, rgba(255,255,255,.06) 1px, transparent 0);
            background-size: 32px 32px;
            pointer-events: none;
        }
        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            background: rgba(37,99,235,.18);
            border: 1px solid rgba(37,99,235,.35);
            color: #93C5FD;
            font-size: .8rem;
            font-weight: 600;
            letter-spacing: .04em;
            padding: .35rem 1rem;
            border-radius: 999px;
        }
        .hero h1 {
            font-size: clamp(2.2rem, 5vw, 3.5rem);
            font-weight: 800;
            color: #fff;
            line-height: 1.1;
            letter-spacing: -1px;
        }
        .hero h1 .highlight { color: #60A5FA; }
        .hero p.lead { color: rgba(255,255,255,.65); font-size: 1.125rem; max-width: 540px; }
        .stat-pill {
            background: rgba(255,255,255,.06);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 12px;
            padding: 1.25rem 1.5rem;
            text-align: center;
        }
        .stat-pill .num { font-size: 2rem; font-weight: 800; color: #fff; line-height: 1; }
        .stat-pill .lbl { font-size: .8rem; color: rgba(255,255,255,.5); margin-top: .25rem; }

        /* ── Page Hero ─────────────────────────────────────── */
        .page-hero {
            background: var(--navy);
            padding: 64px 0;
            position: relative;
            overflow: hidden;
        }
        .page-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,.05) 1px, transparent 0);
            background-size: 28px 28px;
        }
        .page-hero h1 { color: #fff; }
        .page-hero p { color: rgba(255,255,255,.6); }

        /* ── Rating Stars ──────────────────────────────────── */
        .stars { color: #F59E0B; }

        /* ── Badge ─────────────────────────────────────────── */
        .badge-industry {
            background: var(--blue-lt);
            color: var(--blue);
            font-weight: 600;
            border-radius: 6px;
            padding: .3rem .7rem;
            font-size: .75rem;
        }

        /* ── Avatar initials ───────────────────────────────── */
        .avatar-init {
            width: 42px; height: 42px;
            border-radius: 10px;
            background: var(--blue);
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* ── CTA Band ──────────────────────────────────────── */
        .cta-band {
            background: var(--navy);
            padding: 72px 0;
            position: relative;
            overflow: hidden;
        }
        .cta-band::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,.04) 1px, transparent 0);
            background-size: 28px 28px;
        }
        .cta-band .btn-cta-primary {
            background: var(--blue);
            color: #fff;
            border: none;
            font-weight: 700;
            padding: .875rem 2rem;
            border-radius: 10px;
            font-size: 1rem;
        }
        .cta-band .btn-cta-primary:hover { background: var(--blue-dk); }
        .cta-band .btn-cta-outline {
            background: transparent;
            color: rgba(255,255,255,.75);
            border: 1px solid rgba(255,255,255,.2);
            font-weight: 600;
            padding: .875rem 2rem;
            border-radius: 10px;
            font-size: 1rem;
        }
        .cta-band .btn-cta-outline:hover { border-color: rgba(255,255,255,.45); color: #fff; }

        /* ── Footer ────────────────────────────────────────── */
        .site-footer {
            background: var(--navy);
            color: rgba(255,255,255,.6);
            padding: 64px 0 32px;
            border-top: 1px solid rgba(255,255,255,.06);
        }
        .site-footer .footer-brand { font-size: 1.25rem; font-weight: 800; color: #fff; text-decoration: none; }
        .site-footer .footer-brand .dot { color: var(--blue); }
        .site-footer h6 { color: rgba(255,255,255,.9); font-size: .8rem; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; }
        .site-footer a { color: rgba(255,255,255,.55); text-decoration: none; font-size: .9rem; }
        .site-footer a:hover { color: #fff; }
        .footer-divider { border-color: rgba(255,255,255,.08); }
        .footer-social a {
            width: 36px; height: 36px;
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,.55);
            font-size: .95rem;
        }
        .footer-social a:hover { border-color: rgba(255,255,255,.3); color: #fff; background: rgba(255,255,255,.06); }

        /* ── Forms ─────────────────────────────────────────── */
        .form-control, .form-select {
            border: 1px solid var(--slate-200);
            border-radius: 8px;
            padding: .625rem .875rem;
            font-size: .9375rem;
            color: var(--slate-900);
            transition: border-color .15s, box-shadow .15s;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(37,99,235,.12);
            outline: none;
        }
        .form-label { font-weight: 600; font-size: .875rem; color: var(--slate-700); margin-bottom: .4rem; }
        .input-group-text { background: var(--slate-50); border-color: var(--slate-200); color: var(--slate-400); }

        /* ── Misc ──────────────────────────────────────────── */
        .divider-line { border: none; border-top: 1px solid var(--slate-200); }
        .text-blue { color: var(--blue); }
        .bg-offwhite { background: var(--slate-50); }

        @media (max-width: 768px) {
            .hero { padding: 64px 0 56px; }
            .page-hero { padding: 48px 0; }
        }
    </style>
    @stack('styles')
</head>
<body>

<!-- ── Navbar ─────────────────────────────────────────── -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">AI<span class="dot">.</span>Solutions</a>
        <button class="navbar-toggler border-0 p-1" type="button" data-bs-toggle="collapse" data-bs-target="#navMain" style="color:rgba(255,255,255,.7)">
            <i class="bi bi-list fs-4"></i>
        </button>
        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('industries') ? 'active' : '' }}" href="{{ route('industries') }}">Industries</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('testimonials') ? 'active' : '' }}" href="{{ route('testimonials') }}">Testimonials</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('articles*') ? 'active' : '' }}" href="{{ route('articles') }}">Articles</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Gallery</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('events') ? 'active' : '' }}" href="{{ route('events') }}">Events</a></li>
                <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                    <a class="btn-nav" href="{{ route('contact') }}">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Flash Messages -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show m-0 rounded-0 text-center border-0 py-2" role="alert" style="font-size:.9rem;">
    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show m-0 rounded-0 text-center border-0 py-2" role="alert" style="font-size:.9rem;">
    <i class="bi bi-exclamation-circle-fill me-2"></i>{{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

@yield('content')

<!-- ── Footer ─────────────────────────────────────────── -->
<footer class="site-footer">
    <div class="container">
        <div class="row g-5 pb-5">
            <div class="col-lg-4">
                <a class="footer-brand d-inline-block mb-3" href="{{ route('home') }}">AI<span class="dot">.</span>Solutions</a>
                <p class="small mb-4" style="line-height:1.7;">Leveraging AI to assist industries with software solutions that speed up design, engineering, and innovation. Headquartered in Sunderland — making a worldwide impact.</p>
                <div class="footer-social d-flex gap-2">
                    <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
            <div class="col-6 col-lg-2">
                <h6 class="mb-4">Company</h6>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('industries') }}">Industries</a></li>
                    <li><a href="{{ route('articles') }}">Articles</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2">
                <h6 class="mb-4">Explore</h6>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    <li><a href="{{ route('testimonials') }}">Testimonials</a></li>
                    <li><a href="{{ route('gallery') }}">Gallery</a></li>
                    <li><a href="{{ route('events') }}">Events</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h6 class="mb-4">Get In Touch</h6>
                <ul class="list-unstyled d-flex flex-column gap-3 small">
                    <li class="d-flex gap-2 align-items-start">
                        <i class="bi bi-geo-alt text-blue mt-1"></i>
                        <span>Sunderland, United Kingdom</span>
                    </li>
                    <li class="d-flex gap-2 align-items-center">
                        <i class="bi bi-envelope text-blue"></i>
                        <span>hello@ai-solutions.co.uk</span>
                    </li>
                    <li class="d-flex gap-2 align-items-center">
                        <i class="bi bi-telephone text-blue"></i>
                        <span>+44 191 000 0000</span>
                    </li>
                </ul>
                <a href="{{ route('contact') }}" class="btn btn-primary btn-sm mt-4 px-4">Send Enquiry</a>
            </div>
        </div>
        <hr class="footer-divider">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center py-2" style="font-size:.825rem;">
            <span>&copy; {{ date('Y') }} AI-Solutions Ltd. All rights reserved.</span>
            <div class="d-flex gap-4 mt-2 mt-md-0">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms</a>
                <a href="{{ route('admin.login') }}">Admin</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')

{{-- ── AI Chatbot Widget ─────────────────────────────── --}}
<style>
#chat-btn {
    position: fixed;
    bottom: 28px;
    right: 28px;
    z-index: 9999;
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: var(--blue);
    color: #fff;
    border: none;
    box-shadow: 0 4px 20px rgba(37,99,235,.45);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    cursor: pointer;
    transition: transform .2s, box-shadow .2s;
}
#chat-btn:hover { transform: scale(1.07); box-shadow: 0 6px 28px rgba(37,99,235,.55); }
#chat-btn .notif {
    position: absolute;
    top: -2px; right: -2px;
    width: 14px; height: 14px;
    background: #EF4444;
    border: 2px solid #fff;
    border-radius: 50%;
}

#chat-window {
    position: fixed;
    bottom: 96px;
    right: 28px;
    z-index: 9998;
    width: 360px;
    max-height: 540px;
    border-radius: 18px;
    background: #fff;
    border: 1px solid var(--slate-200);
    box-shadow: 0 16px 48px rgba(15,23,42,.16);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    transform-origin: bottom right;
    transform: scale(0.92) translateY(12px);
    opacity: 0;
    pointer-events: none;
    transition: transform .22s cubic-bezier(.34,1.56,.64,1), opacity .18s ease;
}
#chat-window.open {
    transform: scale(1) translateY(0);
    opacity: 1;
    pointer-events: all;
}

.chat-head {
    background: var(--navy);
    padding: 1rem 1.125rem;
    display: flex;
    align-items: center;
    gap: .75rem;
    flex-shrink: 0;
}
.chat-head-avatar {
    width: 36px; height: 36px;
    background: rgba(37,99,235,.35);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    color: #93C5FD;
    flex-shrink: 0;
}
.chat-head-info .name { font-weight: 700; font-size: .9rem; color: #fff; line-height: 1.2; }
.chat-head-info .status { font-size: .72rem; color: rgba(255,255,255,.45); display: flex; align-items: center; gap: .3rem; }
.chat-head-info .status::before { content:''; width:7px; height:7px; border-radius:50%; background:#10B981; display:inline-block; }
.chat-close {
    margin-left: auto;
    background: none;
    border: none;
    color: rgba(255,255,255,.45);
    font-size: 1.1rem;
    cursor: pointer;
    padding: 0;
    line-height: 1;
    transition: color .15s;
}
.chat-close:hover { color: #fff; }

#chat-messages {
    flex: 1;
    overflow-y: auto;
    padding: 1rem;
    display: flex;
    flex-direction: column;
    gap: .625rem;
    scroll-behavior: smooth;
}
#chat-messages::-webkit-scrollbar { width: 4px; }
#chat-messages::-webkit-scrollbar-thumb { background: var(--slate-200); border-radius: 4px; }

.msg {
    max-width: 86%;
    font-size: .8625rem;
    line-height: 1.6;
    padding: .6rem .875rem;
    border-radius: 14px;
    word-break: break-word;
    animation: msgIn .18s ease;
}
@keyframes msgIn { from { opacity:0; transform:translateY(6px); } to { opacity:1; transform:translateY(0); } }

.msg.bot {
    background: var(--slate-50);
    border: 1px solid var(--slate-200);
    color: var(--slate-700);
    border-bottom-left-radius: 4px;
    align-self: flex-start;
}
.msg.user {
    background: var(--blue);
    color: #fff;
    border-bottom-right-radius: 4px;
    align-self: flex-end;
}
.msg.typing {
    background: var(--slate-100);
    border: 1px solid var(--slate-200);
    align-self: flex-start;
    padding: .75rem .875rem;
}
.typing-dots { display: flex; gap: 4px; }
.typing-dots span {
    width: 7px; height: 7px;
    border-radius: 50%;
    background: var(--slate-400);
    animation: dot-bounce 1.2s infinite;
}
.typing-dots span:nth-child(2) { animation-delay: .2s; }
.typing-dots span:nth-child(3) { animation-delay: .4s; }
@keyframes dot-bounce { 0%,80%,100%{transform:translateY(0);} 40%{transform:translateY(-6px);} }

.chat-footer {
    padding: .75rem;
    border-top: 1px solid var(--slate-200);
    display: flex;
    gap: .5rem;
    flex-shrink: 0;
    background: #fff;
}
#chat-input {
    flex: 1;
    border: 1px solid var(--slate-200);
    border-radius: 10px;
    padding: .55rem .875rem;
    font-size: .875rem;
    font-family: 'Inter', sans-serif;
    color: var(--slate-900);
    outline: none;
    resize: none;
    transition: border-color .15s;
    line-height: 1.5;
    max-height: 100px;
    overflow-y: auto;
}
#chat-input:focus { border-color: var(--blue); }
#chat-input::placeholder { color: var(--slate-400); }
#chat-send {
    width: 38px;
    height: 38px;
    background: var(--blue);
    border: none;
    border-radius: 10px;
    color: #fff;
    font-size: 1rem;
    cursor: pointer;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background .15s, transform .1s;
    align-self: flex-end;
}
#chat-send:hover { background: var(--blue-dk); }
#chat-send:active { transform: scale(.95); }
#chat-send:disabled { background: var(--slate-200); cursor: not-allowed; }

.chat-quick-prompts {
    display: flex;
    flex-wrap: wrap;
    gap: .4rem;
    padding: .5rem 1rem .25rem;
}
.quick-btn {
    background: var(--blue-lt);
    border: 1px solid #BFDBFE;
    color: var(--blue);
    font-size: .72rem;
    font-weight: 600;
    padding: .28rem .7rem;
    border-radius: 999px;
    cursor: pointer;
    transition: all .15s;
    white-space: nowrap;
}
.quick-btn:hover { background: var(--blue); color: #fff; border-color: var(--blue); }

@media (max-width: 480px) {
    #chat-window { width: calc(100vw - 32px); right: 16px; bottom: 88px; }
    #chat-btn { right: 16px; bottom: 20px; }
}
</style>

{{-- Toggle Button --}}
<button id="chat-btn" title="Chat with AI Assistant" aria-label="Open AI chatbot">
    <i class="bi bi-robot" id="chat-btn-icon"></i>
    <span class="notif" id="chat-notif"></span>
</button>

{{-- Chat Window --}}
<div id="chat-window" role="dialog" aria-label="AI Assistant Chat">
    <div class="chat-head">
        <div class="chat-head-avatar"><i class="bi bi-robot"></i></div>
        <div class="chat-head-info">
            <div class="name">AI Assistant</div>
            <div class="status">Online · AI-Solutions</div>
        </div>
        <button class="chat-close" id="chat-close" aria-label="Close chat"><i class="bi bi-x-lg"></i></button>
    </div>

    <div id="chat-messages">
        <div class="msg bot">👋 Hi there! I'm the AI-Solutions virtual assistant. How can I help you today?</div>
    </div>

    <div class="chat-quick-prompts" id="quick-prompts">
        <button class="quick-btn">What services do you offer?</button>
        <button class="quick-btn">How does AI prototyping work?</button>
        <button class="quick-btn">Which industries do you serve?</button>
        <button class="quick-btn">How do I get in touch?</button>
    </div>

    <div class="chat-footer">
        <textarea id="chat-input" placeholder="Ask me anything…" rows="1" maxlength="800"></textarea>
        <button id="chat-send" aria-label="Send message">
            <i class="bi bi-send-fill"></i>
        </button>
    </div>
</div>

<script>
(function () {
    const btn        = document.getElementById('chat-btn');
    const win        = document.getElementById('chat-window');
    const closeBtn   = document.getElementById('chat-close');
    const input      = document.getElementById('chat-input');
    const sendBtn    = document.getElementById('chat-send');
    const messages   = document.getElementById('chat-messages');
    const notif      = document.getElementById('chat-notif');
    const quickWrap  = document.getElementById('quick-prompts');
    const btnIcon    = document.getElementById('chat-btn-icon');

    let history      = [];
    let isOpen       = false;
    let isTyping     = false;

    function toggle() {
        isOpen = !isOpen;
        win.classList.toggle('open', isOpen);
        btnIcon.className = isOpen ? 'bi bi-x-lg' : 'bi bi-robot';
        notif.style.display = 'none';
        if (isOpen) { setTimeout(() => input.focus(), 220); }
    }

    btn.addEventListener('click', toggle);
    closeBtn.addEventListener('click', toggle);

    // Close on outside click
    document.addEventListener('click', e => {
        if (isOpen && !win.contains(e.target) && e.target !== btn && !btn.contains(e.target)) toggle();
    });

    // Quick prompts
    quickWrap.querySelectorAll('.quick-btn').forEach(b => {
        b.addEventListener('click', () => {
            input.value = b.textContent;
            quickWrap.style.display = 'none';
            send();
        });
    });

    // Auto-grow textarea
    input.addEventListener('input', () => {
        input.style.height = 'auto';
        input.style.height = Math.min(input.scrollHeight, 100) + 'px';
    });

    input.addEventListener('keydown', e => {
        if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); send(); }
    });
    sendBtn.addEventListener('click', send);

    function addMsg(role, text) {
        const div = document.createElement('div');
        div.className = 'msg ' + (role === 'user' ? 'user' : 'bot');
        div.textContent = text;
        messages.appendChild(div);
        messages.scrollTop = messages.scrollHeight;
        return div;
    }

    function showTyping() {
        const div = document.createElement('div');
        div.className = 'msg typing';
        div.innerHTML = '<div class="typing-dots"><span></span><span></span><span></span></div>';
        div.id = 'typing-indicator';
        messages.appendChild(div);
        messages.scrollTop = messages.scrollHeight;
    }

    function removeTyping() {
        const t = document.getElementById('typing-indicator');
        if (t) t.remove();
    }

    async function send() {
        const text = input.value.trim();
        if (!text || isTyping) return;

        quickWrap.style.display = 'none';
        input.value = '';
        input.style.height = 'auto';
        addMsg('user', text);
        history.push({ role: 'user', content: text });

        isTyping = true;
        sendBtn.disabled = true;
        showTyping();

        try {
            const res = await fetch('{{ route('chatbot') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ messages: history }),
            });

            removeTyping();

            if (!res.ok) {
                const err = await res.json().catch(() => ({}));
                addMsg('bot', err.error || 'Something went wrong. Please try again.');
                history.pop();
            } else {
                const data = await res.json();
                const reply = data.reply || 'Sorry, I could not get a response.';
                addMsg('bot', reply);
                history.push({ role: 'assistant', content: reply });
                // Keep history manageable
                if (history.length > 20) history = history.slice(-20);
            }
        } catch (e) {
            removeTyping();
            addMsg('bot', 'Network error. Please check your connection and try again.');
            history.pop();
        }

        isTyping = false;
        sendBtn.disabled = false;
        input.focus();
    }

    // Show notif after 8s if not opened
    setTimeout(() => {
        if (!isOpen) notif.style.display = 'block';
    }, 8000);
})();
</script>
</body>
</html>
