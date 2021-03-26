@extends('layouts.authbase')

@section('content')
<h4>Sign in to continue.</h4>
<h6 class="font-weight-light">Admin</h6>
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group rw">

        <input id="email" placeholder="{{ __('E-Mail Address') }}" type="email"
            class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group ">

        <input id="password" placeholder="{{ __('Password') }}" type="password"
            class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required
            autocomplete="current-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="my-2 d-flex justify-content-between align-items-center">
        <div class="form-check">
            <label class="form-check-label text-muted">
                <input type="checkbox" class="form-check-input" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>{{ __('Remember Me') }}</label>
        </div>
        @if (Route::has('password.request'))

        <a href="{{ route('password.request') }}" class="auth-link text-black"> {{ __('Forgot Your Password?') }}</a>
        </a>
        @endif

    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >{{ __('Login') }}</button>
    </div>

</form>
@endsection