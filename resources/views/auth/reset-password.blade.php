@extends('auth.layout.app')
@section('title')
    Login Page
@endsection
@section('form')
    <form class="js-validate" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="text-center">
            <h1 class="display-4">Reset Password!</h1>
            <p>Please Choose a new password for your account.</p>
        </div>
        <x-input name="email" type="email" placeholder="Enter Email." value="{{ old('email', $request->email) }}" />
        <x-input name="password" type="password" placeholder="Choose new Password." value="{{ old('password') }}" />
        <x-input name="password_confirmation" type="password" placeholder="Confirm Password." value="{{ old('password') }}" />
        <button type="submit" class="btn btn-lg btn-block btn-primary">Reset Password</button>
    </form>
@endsection