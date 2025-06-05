@extends('static.components.header')
@section('content')
<style>
    body { background: #f8f9fa; font-family: 'Poppins', sans-serif; }
    .cyberwise-reset-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
    }
    .cyberwise-reset-card {
        background: #fff;
        border-radius: 1.2rem;
        box-shadow: 0 4px 32px rgba(37,99,235,0.08);
        padding: 1.5rem 1.5rem 1.2rem 1.5rem;
        max-width: 380px;
        width: 100%;
        margin: 1rem 0;
    }
    .cyberwise-reset-card .logo {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.7rem;
        margin-bottom: 1rem;
    }
    .cyberwise-reset-card .logo i {
        font-size: 1.7rem;
        color: #2563eb;
    }
    .cyberwise-reset-card .logo span {
        font-size: 1.15rem;
        font-weight: 700;
        color: #2563eb;
        letter-spacing: 1px;
    }
    .cyberwise-reset-card h4 {
        font-weight: 700;
        color: #222;
        text-align: center;
        margin-bottom: 0.3rem;
        font-size: 1.1rem;
    }
    .cyberwise-reset-card p {
        color: #6b7280;
        text-align: center;
        margin-bottom: 1.2rem;
        font-size: 0.97rem;
    }
    .cyberwise-reset-card .form-label {
        font-weight: 500;
        color: #222;
        font-size: 0.97rem;
    }
    .cyberwise-reset-card .form-control {
        border-radius: 0.5rem;
        border: 1px solid #e5e7eb;
        padding: 0.55rem 0.9rem;
        font-size: 0.97rem;
        margin-bottom: 0.9rem;
        background: #f8fafc;
        transition: border 0.2s;
    }
    .cyberwise-reset-card .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37,99,235,0.08);
        background: #fff;
    }
    .cyberwise-reset-card .btn-primary {
        width: 100%;
        padding: 0.55rem;
        border-radius: 0.5rem;
        font-weight: 600;
        font-size: 1rem;
        background: #2563eb;
        border: none;
        transition: background 0.2s;
    }
    .cyberwise-reset-card .btn-primary:hover {
        background: #1746a0;
    }
    .cyberwise-reset-card .form-footer {
        margin-top: 1.2rem;
        text-align: center;
        color: #6b7280;
        font-size: 0.95rem;
    }
    .cyberwise-reset-card .form-footer a {
        color: #2563eb;
        text-decoration: none;
        font-weight: 500;
    }
    .cyberwise-reset-card .form-footer a:hover {
        text-decoration: underline;
    }
</style>

<div class="cyberwise-reset-container">
    <div class="cyberwise-reset-card">
        <div class="logo">
            <i class="fas fa-shield-alt"></i>
            <!-- <span>CyberWise</span> -->
        </div>
        <h4>Reset Password</h4>
        <form method="POST" action="{{ url('reset-password/' . $token) }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
        <div class="form-footer">
            Remember your password? <a href="{{ url('login') }}">Log In</a>
        </div>
    </div>
</div>
@endsection
