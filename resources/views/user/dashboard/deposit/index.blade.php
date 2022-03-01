@extends('user.layout.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <div class="content">
        <div class="text-center">
            <img src="{{ asset('assets/img/salary.png') }}" alt="Target Image" width="150">
        </div>
        <div class="content content-full text-center">
            <h1 class="display-5 fw-bold text-black mb-3">
                Add Balance in to your account
            </h1>
            <div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card">
                            <div class="card-body text-left">
                                <form action="{{ route('user.plan.activate') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="method">Select Payment Method</label>
                                        <select name="method" id="method" class="form-control">
                                            <option value="BTC">BTC</option>
                                            <option value="BUSD.BEP20">BUSD (BEP20)</option>
                                            <option value="USDT.TRC20">USDT (TRC20)</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input type="text" name="amount" id="amount" placeholder="Enter Amount"
                                            class="form-control">
                                    </div>
                                    <input class="btn btn-hero btn-primary" type="submit" value="Deposit Now">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
