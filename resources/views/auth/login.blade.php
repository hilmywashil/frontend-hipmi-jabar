@extends('layouts.auth')

@section('title', 'Login - HIPMI Jawa Barat')

@section('content')
<section class="login-page">
  <div class="login-card">
    <div class="login-left">
      <div class="brand">
        <img href="{{ route('home') }}" class="brand__logo" src="{{ asset('images/hipmi-logo.png') }}" alt="Logo HIMPI">
        <img href="{{ route('home') }}" class="brand__badge" src="{{ asset('images/maju-babarengan.png') }}"
          alt="Maju Barengan">
      </div>

      <h1 class="login-title">Login</h1>

      <form class="login-form" action="{{ route('login.post') }}" method="post">
        @csrf
        @if ($errors->any())
        <div style="color: red; margin-bottom: 1rem;">
          {{ $errors->first() }}
        </div>
        @endif
        <label class="field">
          <span class="field__label">Nama Pengguna atau Alamat Email</span>
          <input class="field__input" type="text" name="username" placeholder="Masukkan Email atau Username"
            autocomplete="username" required />
        </label>

        <label class="field">
          <span class="field__label">Password</span>
          <div class="password-wrap">
            <input class="field__input field__input--password" type="password" name="password"
              placeholder="Masukkan Password" autocomplete="current-password" required id="password" />
            <button class="eye-btn" type="button" aria-label="Tampilkan password" onclick="togglePassword()">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z" stroke="currentColor" stroke-width="1.6" />
                <circle cx="12" cy="12" r="3.5" stroke="currentColor" stroke-width="1.6" />
              </svg>
            </button>
          </div>
        </label>
        <div>
          <button class="login-btn" type="submit">Masuk</button>
          <a href="{{ route('home') }}" class="forgot-password">Lupa Kata Sandi?</a>
        </div>
      </form>
    </div>

    <div class="login-right">
      <img class="login-image" src="{{ asset('images/svg/login-image.svg') }}" alt="Login Image">
    </div>
  </div>
</section>
@endsection