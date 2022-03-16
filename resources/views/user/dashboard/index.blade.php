@extends('user.layout.app')
@section('title')
    Dashboard
@endsection
@section('head')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@endsection

@section('content')
    <div class="content">
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Quick Overview
        </h2>
        <div class="row">
            <div class="col-md-12">
                <div class="block block-rounded invisible" data-toggle="appear">
                    <div class="block-content block-content-full bg-danger">
                        <div class="row text-center">
                            <div class="col-md-4 py-3">
                                <div class="font-size-h1 font-w300 text-white mb-1">
                                    ${{ number_format(balance(auth()->user()->id), 2) }}
                                </div>
                                <a class="link-fx font-size-sm font-w700 text-white text-uppercase text-muted"
                                    href="javascript:void(0)">Balance</a>
                            </div>
                            <div class="col-md-4 py-3">
                                <div class="font-size-h1 font-w300 text-white mb-1">
                                    ${{ number_format(inBalance(auth()->user()->id), 2) }}
                                </div>
                                <a class="link-fx font-size-sm font-w700 text-white text-uppercase text-muted"
                                    href="javascript:void(0)">Overall Income</a>
                            </div>
                            <div class="col-md-4 py-3">
                                <div class="font-size-h1 font-w300 text-white mb-1">
                                    ${{ number_format(withdraw(auth()->user()->id), 2) }}
                                </div>
                                <a class="link-fx font-size-sm font-w700 text-white text-uppercase text-muted"
                                    href="javascript:void(0)">Overall Withdraw</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 js-appear-enabled animated fadeIn " data-toggle="appear">
                <a class="block block-rounded block-link-shadow bg-danger"
                    href="{{ route('user.roi.withdraw.roiWithdraw') }}">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <p class="font-size-lg font-w600 mb-0 text-white">
                                $ <span class="text-white">{{ number_format(roiBalance(auth()->user()->id), 2) }}
                                </span>
                            </p>
                            <p class="text-muted mb-0 text-white">
                                Daily Profit
                            </p>
                        </div>
                        <div class="ml-3">
                            <i class="fa fa-money-bill  fa-2x text-gray"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-center ">
                        <span class="font-size-sm text-muted text-white">Withdraw Funds</span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 js-appear-enabled animated fadeIn" data-toggle="appear">
                <a class="block block-rounded block-link-shadow bg-danger" href="{{ route('user.statement.direct') }}">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <p class="font-size-lg font-w600 mb-0 text-white">
                                $ <span
                                    class="text-white">{{ number_format(directCommission(auth()->user()->id), 2) }}</span>
                            </p>
                            <p class="text-muted mb-0 text-white">
                                Direct Commission
                            </p>
                        </div>
                        <div class="ml-3">
                            <i class="fa fa-money-bill fa-2x text-gray"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-center ">
                        <span class="font-size-sm text-muted text-white">View All Transactions</span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 js-appear-enabled animated fadeIn" data-toggle="appear">
                <a class="block block-rounded block-link-shadow bg-danger" href="{{ route('user.statement.inDirect') }}">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <p class="font-size-lg font-w600 mb-0 text-white">
                                $ <span
                                    class="text-white">{{ number_format(inDirectTotalCommission(auth()->user()->id), 2) }}</span>
                            </p>
                            <p class="text-muted mb-0 text-white">
                                In-Direct Team Commission
                            </p>
                        </div>
                        <div class="ml-3">
                            <i class="fa fa-money-bill fa-2x text-gray"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-center ">
                        <span class="font-size-sm text-muted text-white">View All Transactions</span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 js-appear-enabled animated fadeIn" data-toggle="appear">
                <a class="block block-rounded block-link-shadow bg-danger" href="{{ route('user.statement.passive') }}">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <p class="font-size-lg font-w600 mb-0 text-white">
                                $ <span class=" text-white">{{ number_format(passive(auth()->user()->id), 2) }}</span>
                            </p>
                            <p class="text-muted mb-0 text-white">
                                Team Invested Earning
                            </p>
                        </div>
                        <div class="ml-3">
                            <i class="fa fa-money-bill fa-2x text-gray"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-center ">
                        <span class="font-size-sm text-muted text-white">View All Transactions</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="row items-push">
            <div class="col-md-4">
                <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-3 bg-body mx-auto my-3">
                            <i class="fa fa-trophy fa-lg text-primary"></i>
                        </div>
                        <h3 class="text-uppercase font-size-h3 font-w400 ">Direct Business</h3>
                        <hr>
                        <h2>${{ number_format(directBusiness(auth()->user()->id), 2) }}</h2>
                        <h2 class="mb-3 text-danger">{{ directAward(auth()->user()->id) }}</h2>
                        <hr>
                        <h3 class="text-uppercase ">Reward: <span> $
                                {{ number_format(directBusinessAward(auth()->user()->id), 2) }}</span></h3>

                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                        <a class="fw-medium" href="{{ route('user.statement.ranks') }}">
                            View Direct Business
                            <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-3 bg-body mx-auto my-3">
                            <i class="fa fa-trophy fa-lg text-primary"></i>
                        </div>
                        <h3 class="text-uppercase font-size-h3 font-w400 ">In-Direct Business</h3>
                        <hr>
                        <h2>${{ number_format(inDirectBusiness(auth()->user()->id), 2) }}</h2>
                        <h2 class="mb-3 text-danger">{{ inDirectAward(auth()->user()->id) }}</h2>
                        <hr>
                        <h3 class="text-uppercase">Reward: <span> $
                                {{ number_format(InDirectBusinessAward(auth()->user()->id), 2) }}</span></h3>

                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                        <a class="fw-medium" href="{{ route('user.statement.ranks.indirect') }}">
                            View In-Direct Business
                            <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-3 bg-body mx-auto my-3">
                            <i class="fa fa-trophy fa-lg text-primary"></i>
                        </div>
                        <h3 class="text-uppercase font-size-h3 font-w400 ">Active investment</h3>
                        <img src="{{ asset('assets/img/activities.png') }}" width="25%" alt="">
                        <hr>
                        <h2>${{ number_format(myPlan(auth()->user()->id), 2) }}</h2>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                        <a class="fw-medium" href="{{ route('user.plan.active.index') }}">
                            View Active Investments
                            <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="bg-danger">
                        <div class="content content-full">
                            <div class=" text-center">
                                {{-- <a class="img-link" href="be_pages_generic_profile.html">
                                    <img class="img-avatar img-avatar96 img-avatar-thumb"
                                        src="{{ asset('assets/media/avatars/avatar10.jpg') }}" alt="">
                                </a> --}}
                                {{-- <h2 class="fw-bold my-2 text-white">Refer Your Friends and Earn.</h2> --}}
                                <form class="d-flex align-items-center" action="be_pages_jobs_dashboard.html" method="POST"
                                    onclick="return false;" _lpchecked="1">
                                    <div class="flex-grow-1">
                                        <input type="text" class="form-control form-control-lg form-control-alt"
                                            id="referInput" name="referInput"
                                            value="{{ route('register', ['refer' => auth()->user()->username]) }}"
                                            readonly>
                                    </div>
                                    <div class="flex-grow-0 ms-2">
                                        <button onclick="copyClipBoard()" type="submit" class="btn btn-lg btn-primary">
                                            <i class="fa fa-copy"></i>
                                        </button>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-around align-items-center mt-2">
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
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="block block-rounded block-themed">
                    <div class="block-header bg-danger">
                        <h3 class="block-title">Level wise Business</h3>
                        <div class="block-options">
                            <a href="{{ route('user.statement.ranks.indirect') }}" class="btn-block-option">
                                <i class="si si-settings"></i>
                            </a>
                        </div>
                    </div>
                    <div class="block-content">
                        <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th>Level</th>
                                    <th>Business</th>
                                    <th>Commission</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1st</td>
                                    <td>${{ number_format(IndirectBusinessL1(auth()->user()->id), 2) }}</td>
                                    <td>${{ number_format(inDirectCommission1(auth()->user()->id), 2) }}</td>
                                </tr>
                                <tr>
                                    <td>2nd</td>
                                    <td>${{ number_format(IndirectBusinessL2(auth()->user()->id), 2) }}</td>
                                    <td>${{ number_format(inDirectCommission2(auth()->user()->id), 2) }}</td>
                                </tr>
                                <tr>
                                    <td>3rd</td>
                                    <td>${{ number_format(IndirectBusinessL3(auth()->user()->id), 2) }}</td>
                                    <td>${{ number_format(inDirectCommission3(auth()->user()->id), 2) }}</td>
                                </tr>
                                <tr>
                                    <td>4th</td>
                                    <td>${{ number_format(IndirectBusinessL4(auth()->user()->id), 2) }}</td>
                                    <td>${{ number_format(inDirectCommission4(auth()->user()->id), 2) }}</td>
                                </tr>
                                <tr>
                                    <td>5th</td>
                                    <td>${{ number_format(IndirectBusinessL5(auth()->user()->id), 2) }}</td>
                                    <td>${{ number_format(inDirectCommission5(auth()->user()->id), 2) }}</td>
                                </tr>
                                <tr>
                                    <td>6th</td>
                                    <td>${{ number_format(IndirectBusinessL6(auth()->user()->id), 2) }}</td>
                                    <td>${{ number_format(inDirectCommission6(auth()->user()->id), 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
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
        <div class="row">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div id="piechart" style="width:100%; height:500px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div id="piechart01" style="width:100%; height:500px;"></div>
                    </div>
                </div>
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
    <script src="https://www.bootstrapdash.com/demo/libertyui/template/vendors/c3/c3.js"></script>
    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Profit', {{ totalRoiBalanceIn(auth()->user()->id) }}],
                ['Direct Commission', {{ directCommission(auth()->user()->id) }}],
                ['In-Direct Commission', {{ inDirectTotalCommission(auth()->user()->id) }}],
                ['Direct Business Reward', {{ directBusiness(auth()->user()->id) }}],
                ['In-Direct Business Reward', {{ inDirectBusiness(auth()->user()->id) }}]
            ]);

            var options = {
                title: 'My Income Activity',
                pieHole: 0.4,
                // legend: 'none',
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }


        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart01);

        function drawChart01() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Income Recieved', {{ inBalance(auth()->user()->id) + totalRoiBalanceIn(auth()->user()->id) }}],
                ['income Remaining',
                    {{ (myPlan(auth()->user()->id) + totalRoiBalanceIn(auth()->user()->id)) * 7 - inBalance(auth()->user()->id) }}
                ],
            ]);

            var options = {
                title: 'Balance Overview',
                // legend: 'none',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart01'));

            chart.draw(data, options);
        }
    </script>
@endsection
