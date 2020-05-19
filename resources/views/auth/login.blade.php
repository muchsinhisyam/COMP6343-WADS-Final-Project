@extends('layouts.app')

@section('content')
<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="{{ asset('/assets/register/images/signin-image.jpg')}}" alt="sing up image"></figure>
                <a href="/register" class="signup-image-link">Create an account</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Login</h2>
                <form method="POST" class="register-form" id="login-form" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <!-- {{ __('E-Mail Address') }} -->
                        <label for="email" class="zmdi zmdi-account material-icons-name"></label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email"/>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                            <!-- {{ __('Password') }} -->
                        <label for="password" class="zmdi zmdi-lock"></label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="Password"/>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- <div class="col-md-6 offset-md-4">
                            <div class="form-check"> -->
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" class=agree-term {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            <!-- </div>
                        </div> -->
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="login" id="login" class="form-submit" value="Login"/>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
