@extends('auth.layout.app')
@section('title')
    Login Page
@endsection
@section('form')
    <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-white">
        <div class="mb-2 text-center">
            @include('inc.logo')
            <div class="d-flex flex-column">
                <a href="{{ route('login') }}">Remember Password?</a>
                <hr>
                <p class="text-uppercase font-w700 font-size-sm text-muted">Forgot Password!</p>
                <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
            </div>
        </div>
        <form class="js-validation-signin" action="{{ route('password.email') }}" method="POST">
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
            <div class="form-group text-center">
                <button type="submit" class="btn btn-hero-primary">
                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Reset Password
                </button>
            </div>
        </form>
    </div>
@endsection
