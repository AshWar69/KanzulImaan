@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11 mt-60 mx-md-auto">
                <div class="login-box bg-white pl-lg-5 pl-0">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-6">
                            <div class="form-wrap bg-white">
                                <h4 class="btm-sep pb-3 mb-5">Login</h4>
                                <form class="form" method="post" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group position-relative">
                                                <span class="zmdi zmdi-account"></span>
                                                <input type="email" id="email" required class="form-control" name="email"
                                                    autofocus>
                                            </div>
                                            @error('email')
                                                <span style="display: block" class="invalid-feedback mb-2" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group position-relative">
                                                <span class="zmdi zmdi-email"></span>
                                                <input type="password" id="password" required class="form-control" name="password">
                                            </div>
                                            @error('password')
                                                <span style="display: block" class="invalid-feedback mb-2" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 text-lg-right">
                                            <a href="#" class="c-black">Forgot password ?</a>
                                        </div>
                                        <div class="col-12 mt-30">
                                            <button type="submit" id="submit"
                                                class="btn btn-lg btn-custom btn-dark btn-block">Sign In
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="content text-center">
                                <div class="border-bottom pb-5 mb-5">
                                    <h3 class="c-black">First time here?</h3>
                                    <a href="{{ route('register') }}" class="btn btn-custom">Sign up</a>
                                </div>
                                <h5 class="c-black mb-4 mt-n1">Or Sign In With</h5>
                                <div class="socials">
                                    <a href="#" class="zmdi zmdi-facebook"></a>
                                    <a href="#" class="zmdi zmdi-twitter"></a>
                                    <a href="#" class="zmdi zmdi-google"></a>
                                    <a href="#" class="zmdi zmdi-instagram"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
