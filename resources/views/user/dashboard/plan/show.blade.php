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
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card">
                            <div class="card-body text-left">
                                <form action="{{ route('user.plan.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                    <div class="form-group">
                                        <label for="method">Select Payment Method</label>
                                        <select name="method" id="method" class="form-control">
                                            <option value="BTC">BTC</option>
                                            <option value="BUSD.BEP20">BUSD (BEP20)</option>
                                            <option value="USDT.TRC20">USDT (TRC20)</option>
                                        </select>
                                    </div>
                                    <input class="btn btn-hero btn-primary" type="submit" value="Purchase now">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
