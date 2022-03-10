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
                            ${{ number_format(balance(auth()->user()->id), 2) }}
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted"
                            href="javascript:void(0)">Balance</a>
                    </div>
                    <div class="col-md-4 py-3">
                        <div class="font-size-h1 font-w300 text-success mb-1">
                            +${{ number_format(inBalance(auth()->user()->id), 2) }}
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted"
                            href="javascript:void(0)">Overall Income</a>
                    </div>
                    <div class="col-md-4 py-3">
                        <div class="font-size-h1 font-w300 text-danger mb-1">
                            -${{ number_format(withdraw(auth()->user()->id), 2) }}
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted"
                            href="javascript:void(0)">Overall Withdraw</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="block block-rounded text-center d-flex flex-column flex-grow-1">
                    <div class="block-content block-content-full d-flex align-items-center flex-grow-1">
                        <div class="w-100">
                            <div class="item rounded-3 bg-body mx-auto my-3">
                                <i class="fa fa-trophy fa-lg text-primary" style="font-size: 75px" aria-hidden="true"></i>
                            </div>
                            <br>
                            <h3 class="display-5 text-primary">{{ directAward(auth()->user()->id) }}</h3>
                            <div class="text-muted mb-3">
                                <div class="progress" style="height: 20px;">
                                    <div class="progress-bar {{ networkCapProgress(auth()->user()->id) > 95 ? 'bg-danger' : 'bg-primary' }} "
                                        role="progressbar" style="width: {{ networkCapProgress(auth()->user()->id) }}%;"
                                        aria-valuenow="{{ networkCapProgress(auth()->user()->id) }}" aria-valuemin="0"
                                        aria-valuemax="100">{{ networkCapProgress(auth()->user()->id) }}%</div>
                                </div>
                            </div>
                            <div class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-white bg-success">
                                Direct Business: $ {{ number_format(directBusiness(auth()->user()->id), 2) }}
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                        <a class="fw-medium" href="{{ route('user.team.index') }}">
                            View Business
                            <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="col-lg-6 js-appear-enabled animated fadeIn" data-toggle="appear">
                        <a class="block block-rounded block-link-shadow" href="{{ route('user.statement.direct') }}">
                            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="font-size-lg font-w600 mb-0">
                                        $ <span
                                            class="text-default">{{ number_format(directCommission(auth()->user()->id), 2) }}</span>
                                    </p>
                                    <p class="text-muted mb-0">
                                        Direct Commission
                                    </p>
                                </div>
                                <div class="ml-3">
                                    <i class="fa fa-dollar-sign fa-2x text-gray"></i>
                                </div>
                            </div>
                            <div class="block-content block-content-full block-content-sm text-center bg-body-light">
                                <span class="font-size-sm text-muted">View All Transactions</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 js-appear-enabled animated fadeIn" data-toggle="appear">
                        <a class="block block-rounded block-link-shadow" href="{{ route('user.statement.inDirect') }}">
                            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="font-size-lg font-w600 mb-0">
                                        $ <span
                                            class="text-default">{{ number_format(inDirectTotalCommission(auth()->user()->id)) }}</span>
                                    </p>
                                    <p class="text-muted mb-0">
                                        In-Direct Team Commission
                                    </p>
                                </div>
                                <div class="ml-3">
                                    <i class="fa fa-dollar-sign fa-2x text-gray"></i>
                                </div>
                            </div>
                            <div class="block-content block-content-full block-content-sm text-center bg-body-light">
                                <span class="font-size-sm text-muted">View All Transactions</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 js-appear-enabled animated fadeIn" data-toggle="appear">
                        <a class="block block-rounded block-link-shadow" href="{{ route('user.statement.passive') }}">
                            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="font-size-lg font-w600 mb-0">
                                        $ <span
                                            class="text-default">{{ number_format(passive(auth()->user()->id), 2) }}</span>
                                    </p>
                                    <p class="text-muted mb-0">
                                        Team Invested Earning
                                    </p>
                                </div>
                                <div class="ml-3">
                                    <i class="fa fa-dollar-sign fa-2x text-gray"></i>
                                </div>
                            </div>
                            <div class="block-content block-content-full block-content-sm text-center bg-body-light">
                                <span class="font-size-sm text-muted">View All Transactions</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 js-appear-enabled animated fadeIn " data-toggle="appear">
                        <a class="block block-rounded block-link-shadow bg-success"
                            href="{{ route('user.roi.withdraw') }}">
                            <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="font-size-lg font-w600 mb-0 text-white">
                                        $ <span
                                            class="text-white">{{ number_format(roiBalance(auth()->user()->id), 2) }}
                                        </span>
                                    </p>
                                    <p class="text-muted mb-0 text-white">
                                        Daily Profit
                                    </p>
                                </div>
                                <div class="ml-3">
                                    <i class="fa fa-dollar-sign fa-2x text-gray"></i>
                                </div>
                            </div>
                            <div class="block-content block-content-full block-content-sm text-center ">
                                <span class="font-size-sm text-muted text-white">Withdraw Funds</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            {{-- <div class="col-6">
                <div class="">

                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="bg-image"
                    style="background-image: url('{{ asset('assets/media/photos/photo17@2x.jpg') }}');">
                    <div class="bg-black-25">
                        <div class="content content-full">
                            <div class="py-5 text-center">
                                <a class="img-link" href="be_pages_generic_profile.html">
                                    <img class="img-avatar img-avatar96 img-avatar-thumb"
                                        src="{{ asset('assets/media/avatars/avatar10.jpg') }}" alt="">
                                </a>
                                <h1 class="fw-bold my-2 text-white">Refer Your Friends and Earn Awards.</h1>
                                <p class="h4 text-white-75">
                                    Copy and Share this Link with your Freinds and Family Members, You will get a Reward for
                                    each of them.
                                </p>
                                <form class="d-flex align-items-center" action="be_pages_jobs_dashboard.html" method="POST"
                                    onclick="return false;" _lpchecked="1">
                                    <div class="flex-grow-1">
                                        <input type="text" class="form-control form-control-lg form-control-alt"
                                            id="referInput" name="referInput"
                                            value="{{ route('register', ['refer' => auth()->user()->username]) }}">
                                    </div>
                                    <div class="flex-grow-0 ms-2">
                                        <button onclick="copyClipBoard()" type="submit" class="btn btn-lg btn-primary">
                                            <i class="fa fa-copy"></i>
                                        </button>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-around align-items-center my-5">
                                    <div class="px-2">
                                        <p class="fs-3 text-light mb-0">{{ count($refers) }}</p>
                                        <p class="text-muted text-white mb-0">
                                            Total Referrals
                                        </p>
                                    </div>
                                    <div class="px-2 border-start">
                                        <p class="fs-3 text-light mb-0">
                                            {{ $refers->where('status', 'active')->count() }}
                                        </p>
                                        <p class="text-muted text-white mb-0">
                                            Active Referrals
                                        </p>
                                    </div>
                                    <div class="px-2 border-start">
                                        <p class="fs-3 text-light mb-0">
                                            {{ $refers->where('status', 'pending')->count() }}
                                        </p>
                                        <p class="text-muted text-white mb-0">
                                            Pending Referrals
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12 js-appear-enabled animated fadeIn" data-toggle="appear">
                        <a class="block block-rounded block-link-shadow"
                            href="{{ route('user.statement.reward') }}">
                            <div
                                class="block-content block-content-full d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="font-size-lg font-w600 mb-0">
                                        $ <span class="text-default">{{ number_format(directBusinessAward(auth()->user()->id),2) }}</span>
                                    </p>
                                    <p class="text-muted mb-0">
                                        Direct Business Reward
                                    </p>
                                </div>
                                <div class="ml-3">
                                    <i class="fa fa-dollar-sign fa-2x text-gray"></i>
                                </div>
                            </div>
                            <div class="block-content block-content-full block-content-sm text-center bg-body-light">
                                <span class="font-size-sm text-muted">View All Transactions</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Latest Transactions
        </h2>
        <div class="row">
            <div class="col-md-12">
                @forelse ($transactions as $transaction)
                    <a class="block block-rounded block-link-shadow border-left border-{{ $transaction->sum == 'in' ? 'success' : 'danger' }} border-3x js-appear-enabled animated fadeIn"
                        data-toggle="appear" href="javascript:void(0)">
                        <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                            <div>
                                <p class="font-size-lg font-w600 mb-0">
                                    {{ $transaction->sum == 'in' ? '+' : '-' }}
                                    ${{ number_format($transaction->amount, 4) }}
                                </p>
                                <p class="text-uppercase">
                                    {{ $transaction->type }}
                                </p>
                                <span class="font-size-sm text-muted">From <strong
                                        class="text-uppercase">{{ $transaction->reference }}</strong> at
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
        </div>
    </div>
@endsection
@section('footer')
    <script>
        function copyClipBoard() {
            var copyText = document.getElementById("referInput");
            copyText.select();
            document.execCommand("copy");
        }
    </script>
@endsection
