@extends('auth.layout.app')
@section('title')
    Login Page
@endsection
@section('form')
    <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-white">
        <div class="mb-2 text-center">
            <a class="link-fx font-w700 font-size-h1" href="index.html">
                <span class="text-dark">Dash</span><span class="text-primary">mix</span>
            </a>
            <div class="d-flex flex-column">
                <a href="{{ route('register') }}">Create new Account</a>
                <hr>
                <p class="text-uppercase font-w700 font-size-sm text-muted">Sign In</p>
            </div>
        </div>
        <form class="js-validation-signin" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="email" name="email"
                        placeholder="Email" value="{{ old('email') }}">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-user-circle"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Password">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-asterisk"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group d-sm-flex justify-content-sm-between align-items-sm-center text-center text-sm-left">
                <div class="custom-control custom-checkbox custom-control-primary">
                    <input type="checkbox" class="custom-control-input" id="remember" name="remember" checked>
                    <label class="custom-control-label" for="remember">Remember Me</label>
                </div>
                <div class="font-w600 font-size-sm py-1">
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-hero-primary">
                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                </button>
            </div>
        </form>
    </div>
@endsection
