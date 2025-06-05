@extends('static.components.header')
@section('content')
<style>
    body { background: #f8f9fa; font-family: 'Poppins', sans-serif; }
    .cyberwise-forgot-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
    }
    .cyberwise-forgot-card {
        background: #fff;
        border-radius: 1.2rem;
        box-shadow: 0 4px 32px rgba(37,99,235,0.08);
        padding: 1.5rem 1.5rem 1.2rem 1.5rem;
        max-width: 380px;
        width: 100%;
        margin: 1rem 0;
    }
    .cyberwise-forgot-card .logo {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.7rem;
        margin-bottom: 1rem;
    }
    .cyberwise-forgot-card .logo i {
        font-size: 1.7rem;
        color: #2563eb;
    }
    .cyberwise-forgot-card .logo span {
        font-size: 1.15rem;
        font-weight: 700;
        color: #2563eb;
        letter-spacing: 1px;
    }
    .cyberwise-forgot-card h4 {
        font-weight: 700;
        color: #222;
        text-align: center;
        margin-bottom: 0.3rem;
        font-size: 1.1rem;
    }
    .cyberwise-forgot-card p {
        color: #6b7280;
        text-align: center;
        margin-bottom: 1.2rem;
        font-size: 0.97rem;
    }
    .cyberwise-forgot-card .form-label {
        font-weight: 500;
        color: #222;
        font-size: 0.97rem;
    }
    .cyberwise-forgot-card .form-control {
        border-radius: 0.5rem;
        border: 1px solid #e5e7eb;
        padding: 0.55rem 0.9rem;
        font-size: 0.97rem;
        margin-bottom: 0.9rem;
        background: #f8fafc;
        transition: border 0.2s;
    }
    .cyberwise-forgot-card .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37,99,235,0.08);
        background: #fff;
    }
    .cyberwise-forgot-card .btn-primary {
        width: 100%;
        padding: 0.55rem;
        border-radius: 0.5rem;
        font-weight: 600;
        font-size: 1rem;
        background: #2563eb;
        border: none;
        transition: background 0.2s;
    }
    .cyberwise-forgot-card .btn-primary:hover {
        background: #1746a0;
    }
    .cyberwise-forgot-card .form-footer {
        margin-top: 1.2rem;
        text-align: center;
        color: #6b7280;
        font-size: 0.95rem;
    }
    .cyberwise-forgot-card .form-footer a {
        color: #2563eb;
        text-decoration: none;
        font-weight: 500;
    }
    .cyberwise-forgot-card .form-footer a:hover {
        text-decoration: underline;
    }
    .alert {
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
        font-size: 0.95rem;
    }
    .alert-success {
        background-color: #dcfce7;
        border: 1px solid #86efac;
        color: #166534;
    }
    .alert-danger {
        background-color: #fee2e2;
        border: 1px solid #fca5a5;
        color: #991b1b;
    }
</style>

<div class="cyberwise-forgot-container">
    <div class="cyberwise-forgot-card">
        <div class="logo">
            <i class="fas fa-shield-alt"></i>
            <!-- <span>CyberWise</span> -->
        </div>
        <h4>Forgot Password</h4>
        <p>Enter your email address and we'll send you a link to reset your password.</p>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ url('forgot-password') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="text-danger" style="font-size: 0.85rem; margin-top: 0.25rem;">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Send Reset Link</button>
        </form>
        <div class="form-footer">
            Remember your password? <a href="{{ url('login') }}">Log In</a>
        </div>
    </div>
</div>
@endsection
