<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | AI-Solutions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #F8FAFC;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            -webkit-font-smoothing: antialiased;
        }
        .login-wrap {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }
        .login-card {
            background: #fff;
            border: 1px solid #E2E8F0;
            border-radius: 16px;
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 4px 24px rgba(15,23,42,.07);
        }
        .brand { font-size: 1.3rem; font-weight: 800; color: #0F172A; text-decoration: none; }
        .brand .dot { color: #2563EB; }
        .admin-badge {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            background: #EFF6FF;
            color: #2563EB;
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .06em;
            text-transform: uppercase;
            padding: .3rem .75rem;
            border-radius: 999px;
            border: 1px solid #BFDBFE;
        }
        .form-label { font-weight: 600; font-size: .85rem; color: #334155; margin-bottom: .4rem; }
        .form-control {
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            padding: .65rem .875rem;
            font-size: .9375rem;
            color: #0F172A;
            transition: border-color .15s, box-shadow .15s;
        }
        .form-control:focus {
            border-color: #2563EB;
            box-shadow: 0 0 0 3px rgba(37,99,235,.1);
            outline: none;
        }
        .btn-login {
            background: #2563EB;
            color: #fff;
            border: none;
            border-radius: 10px;
            width: 100%;
            padding: .75rem;
            font-size: .9375rem;
            font-weight: 700;
            transition: background .15s;
            cursor: pointer;
        }
        .btn-login:hover { background: #1D4ED8; }
        .back-link { font-size: .825rem; color: #94A3B8; text-decoration: none; }
        .back-link:hover { color: #64748B; }
        .alert-err {
            background: #FEF2F2;
            border: 1px solid #FECACA;
            border-radius: 10px;
            padding: .875rem 1rem;
            font-size: .875rem;
            color: #991B1B;
        }
        .alert-ok {
            background: #F0FDF4;
            border: 1px solid #BBF7D0;
            border-radius: 10px;
            padding: .875rem 1rem;
            font-size: .875rem;
            color: #166534;
        }
    </style>
</head>
<body>

<div class="login-wrap">
    <div class="login-card">

        <div class="text-center mb-5">
            <a href="{{ route('home') }}" class="brand d-inline-block mb-3">AI<span class="dot">.</span>Solutions</a>
            <div class="d-flex justify-content-center">
                <span class="admin-badge"><i class="bi bi-shield-lock"></i>Admin Area</span>
            </div>
            <p class="mt-3 mb-0" style="font-size:.875rem;color:#64748B;">Restricted access. Authorised personnel only.</p>
        </div>

        @if(session('success'))
        <div class="alert-ok mb-4"><i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}</div>
        @endif

        @if($errors->any())
        <div class="alert-err mb-4">
            <i class="bi bi-exclamation-circle-fill me-2"></i>
            @foreach($errors->all() as $error){{ $error }}@endforeach
        </div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf
            <div class="mb-4">
                <label class="form-label" for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control"
                       value="{{ old('email') }}" placeholder="admin@ai-solutions.co.uk"
                       required autofocus autocomplete="email">
            </div>
            <div class="mb-5">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control"
                       placeholder="Enter your password"
                       required autocomplete="current-password">
            </div>
            <button type="submit" class="btn-login">
                <i class="bi bi-shield-lock-fill me-2"></i>Sign In to Admin
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="back-link">
                <i class="bi bi-arrow-left me-1"></i>Back to Website
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
