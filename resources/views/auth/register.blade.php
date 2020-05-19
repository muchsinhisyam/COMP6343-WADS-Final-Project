@extends('layouts.app')

@section('content')
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Register</h2>
                <form method="POST"  class="register-form" id="register-form" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="zmdi zmdi-account material-icons-name"></label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name"/>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="zmdi zmdi-email"></label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="E-Mail Address"/>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="zmdi zmdi-lock"></label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password"/>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="zmdi zmdi-lock-outline"></label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"/>
                        </div>
                    </div>

                    <div class="form-group form-button">
                        <input type="submit" name="register" id="register" class="form-submit" value="Register"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="{{ asset('/assets/register/images/signup-image.jpg')}}" alt="sing up image"></figure>
            </div>
        </div>
    </div>
</section>
@endsection
