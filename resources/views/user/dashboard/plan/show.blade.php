@extends('user.layout.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <div class="content">
        <div class="text-center">
            <img src="{{ asset('assets/img/target.png') }}" alt="Target Image">
        </div>
        <div class="content content-full text-center">
            <h1 class="display-4 fw-bold text-black mb-3">
                {{ $plan->name }} Plan ${{ number_format($plan->price, 2) }}
            </h1>
            <p>You are about to activate {{ $plan->name }} with the Amount of
                <b>${{ number_format($plan->price, 2) }}.</b> Plese click below Purchase now button to Confirm your
                investment.</p>
            <div>
                <form action="{{ route('user.plan.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                    <input class="btn btn-hero btn-primary" type="submit" value="Purchase now">
                </form>
            </div>
        </div>
    </div>
@endsection
