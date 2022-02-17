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
                <a href="{{ route('login') }}">Remember Password?</a>
                <hr>
                <p class="text-uppercase font-w700 font-size-sm text-muted">Reset Password!</p>
                <p>Please Choose a new password for your account.</p>
            </div>
        </div>
        <form class="js-validation-signin" action="{{ route('password.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="email" name="email"
                        placeholder="Email" value="{{ old('email', $request->email) }}">
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
                        placeholder="New Password">
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
                        placeholder="Confirm new Password">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-asterisk"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-hero-primary">
                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Reset Password
                </button>
            </div>
        </form>
    </div>
@endsection
