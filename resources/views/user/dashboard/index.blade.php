@extends('user.layout.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <div class="content">
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Quick Overview
        </h2>
        <div class="block block-rounded invisible" data-toggle="appear">
            <div class="block-content block-content-full">
                <div class="row text-center">
                    <div class="col-md-4 py-3">
                        <div class="font-size-h1 font-w300 text-black mb-1">
                            $0.00
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted"
                            href="javascript:void(0)">Balance</a>
                    </div>
                    <div class="col-md-4 py-3">
                        <div class="font-size-h1 font-w300 text-success mb-1">
                            +$0.00
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted" href="javascript:void(0)">Income
                            Today</a>
                    </div>
                    <div class="col-md-4 py-3">
                        <div class="font-size-h1 font-w300 text-danger mb-1">
                            -$0.00
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted"
                            href="javascript:void(0)">Overall Withdraw</a>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Finance Manage
        </h2>
        <div class="row">
            <div class="col-lg-6 js-appear-enabled animated fadeIn" data-toggle="appear">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <p class="font-size-lg font-w600 mb-0">
                                $ <span class="text-default">0.00</span>
                            </p>
                            <p class="text-muted mb-0">
                                Refer Commission
                            </p>
                        </div>
                        <div class="ml-3">
                            <i class="fa fa-piggy-bank fa-2x text-gray"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-center bg-body-light">
                        <span class="font-size-sm text-muted">View All Transactions</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 js-appear-enabled animated fadeIn" data-toggle="appear">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <p class="font-size-lg font-w600 mb-0">
                                $ <span class="text-default">0.00</span>
                            </p>
                            <p class="text-muted mb-0">
                                Team Business Reward
                            </p>
                        </div>
                        <div class="ml-3">
                            <i class="fa fa-piggy-bank fa-2x text-gray"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-center bg-body-light">
                        <span class="font-size-sm text-muted">View All Transactions</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 js-appear-enabled animated fadeIn" data-toggle="appear">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <p class="font-size-lg font-w600 mb-0">
                                $ <span class="text-default">0.00</span>
                            </p>
                            <p class="text-muted mb-0">
                                Direct Sale Reward
                            </p>
                        </div>
                        <div class="ml-3">
                            <i class="fa fa-piggy-bank fa-2x text-gray"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-center bg-body-light">
                        <span class="font-size-sm text-muted">View All Transactions</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 js-appear-enabled animated fadeIn" data-toggle="appear">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <p class="font-size-lg font-w600 mb-0">
                                $ <span class="text-default">0.00</span>
                            </p>
                            <p class="text-muted mb-0">
                                Direct Sale Reward
                            </p>
                        </div>
                        <div class="ml-3">
                            <i class="fa fa-piggy-bank fa-2x text-gray"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-center bg-body-light">
                        <span class="font-size-sm text-muted">View All Transactions</span>
                    </div>
                </a>
            </div>
        </div>
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Latest Transactions
        </h2>
        @forelse ($transactions as $transaction)
            <a class="block block-rounded block-link-shadow border-left border-{{ $transaction->sum == 'in' ? 'success' : 'danger' }} border-3x js-appear-enabled animated fadeIn"
                data-toggle="appear" href="javascript:void(0)">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                    <div>
                        <p class="font-size-lg font-w600 mb-0">
                            {{ $transaction->sum == 'in' ? '+' : '-' }}
                            ${{ number_format($transaction->amount, 2) }}
                        </p>
                        <p class="text-uppercase">
                            {{ $transaction->type }}
                        </p>
                        <span class="font-size-sm text-muted">From <strong>{{ $transaction->reference }}</strong> at
                            <strong>{{ $transaction->created_at }}</strong></span>
                    </div>
                    <div class="ml-3">
                        <i class="fa fa-arrow-left text-success"></i>
                    </div>
                </div>
            </a>
        @empty
        <a class="block block-rounded block-link-shadow border-left border-primary border-3x js-appear-enabled animated fadeIn"
            data-toggle="appear" href="javascript:void(0)">
            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                <div>
                    <p class="font-size-lg font-w600 mb-0">
                        NO Transaction Found
                    </p>
                </div>
            </div>
        </a>
        @endforelse

    </div>
@endsection
