@extends('auth.layout.app')
@section('title')
    Registeration Page
@endsection
@section('form')
    <form class="js-validate" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="text-center">
            <div class="mb-5">
                <h1 class="display-4">Create free Account</h1>
                <p>Already have an Account? <a href="{{ route('login') }}">Sign In
                        here</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-input name="name" type="text" placeholder="Full Name." value="{{ old('name') }}" />
            </div>
            <div class="col-md-6">
                <x-input name="whatsapp" type="text" placeholder="Whatsapp." value="{{ old('whatsapp') }}" />
            </div>
            <div class="col-md-12">
                <x-input name="email" type="email" placeholder="Type Email." value="{{ old('email') }}" />
            </div>
        </div>
        <x-input name="password" type="password" placeholder="Type Password." />

        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="remember" required>
                <label class="custom-control-label text-muted" for="termsCheckbox"> I agree to Terms and Conditions</label>
            </div>
        </div>
        <button type="submit" class="btn btn-lg btn-block btn-primary">Create Account</button>
        <span class="divider text-muted my-2">OR</span>
        <div class="row">
            <div class="col-6">
                <a class="btn btn-lg btn-block btn-white mb-4" href="{{ route('login.google') }}">
                    <span class="d-flex justify-content-center align-items-center">
                        <img class="avatar avatar-xs mr-2" src="{{ asset('assets/svg/brands/google.svg') }}"
                            alt="Image Description">
                        Via Google
                    </span>
                </a>
            </div>
            <div class="col-6">
                <a class="btn btn-lg btn-block btn-white mb-4" href="{{ route('login.facebook') }}">
                    <span class="d-flex justify-content-center align-items-center">
                        <img class="avatar avatar-xs mr-2" src="{{ asset('assets/svg/brands/facebook.svg') }}"
                            alt="Image Description">
                        Via Facebook
                    </span>
                </a>
            </div>
        </div>
    </form>
@endsection
