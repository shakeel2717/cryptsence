@extends('auth.layout.app')
@section('title')
    Login Page
@endsection
@section('form')
    <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-white">
        <div class="mb-2 text-center">
            @include('inc.logo')
            <div class="d-flex flex-column">
                <hr>
                <p class="text-uppercase font-w700 font-size-sm text-muted">Create new Account</p>
            </div>
            @if ($refer != 'default')
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Your Sponser: {{ $refer }}</h4>
                    </div>
                </div>
            @endif
        </div>
        <form class="js-validation-signin" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name"
                        value="{{ old('name') }}">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-user-circle"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                        value="{{ old('username') }}">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-user-circle"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                        value="{{ old('email') }}">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-user-circle"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-asterisk"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm Password">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-asterisk"></i>
                        </span>
                    </div>
                </div>
            </div>
            <input type="hidden" name="refer" id="refer" value="{{ $refer }}">
            <div class="form-group d-sm-flex justify-content-sm-between align-items-sm-center text-center text-sm-left">
                <div class="custom-control custom-checkbox custom-control-primary">
                    <input type="checkbox" class="custom-control-input" id="remember" name="remember" checked required>
                    <label class="custom-control-label" for="remember">I Agree to the Terms</label>
                </div>
                <div class="font-w600 font-size-sm py-1">
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-hero-primary">
                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Create Account
                </button>
            </div>
            <div class="text-center">
                <a href="{{ route('login') }}">Already have an Account?</a>
            </div>
        </form>
    </div>
@endsection
