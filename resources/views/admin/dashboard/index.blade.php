@extends('admin.layout.app')
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
                    <div class="col-md-3 py-3">
                        <div class="font-size-h1 font-w300 text-black mb-1">
                            {{ $user->count() }}
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted" href="javascript:void(0)">All
                            Users</a>
                    </div>
                    <div class="col-md-3 py-3">
                        <div class="font-size-h1 font-w300 text-black mb-1">
                            {{ $user->where('status', 'pending')->count() }}
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted"
                            href="javascript:void(0)">Pending Users</a>
                    </div>
                    <div class="col-md-3 py-3">
                        <div class="font-size-h1 font-w300 text-black mb-1">
                            {{ $user->where('status', 'active')->count() }}
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted" href="javascript:void(0)">Active
                            Users</a>
                    </div>
                    <div class="col-md-3 py-3">
                        <div class="font-size-h1 font-w300 text-black mb-1">
                            {{ $user->where('status', 'suspend')->count() }}
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted"
                            href="javascript:void(0)">Suspended Users</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="block block-rounded invisible" data-toggle="appear">
            <div class="block-content block-content-full">
                <div class="row text-center">
                    <div class="col-md-3 py-3">
                        <div class="font-size-h1 font-w300 text-black mb-1">
                            {{ $totalInvest->sum('plan.price') }}
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted" href="javascript:void(0)">Total
                            Investment</a>
                    </div>
                    <div class="col-md-3 py-3">
                        <div class="font-size-h1 font-w300 text-black mb-1">
                            {{ $pendingInvest->sum('plan.price') }}
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted"
                            href="javascript:void(0)">Pending Investment</a>
                    </div>
                    <div class="col-md-3 py-3">
                        <div class="font-size-h1 font-w300 text-black mb-1">
                            {{ $activeInvest->sum('plan.price') }}
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted" href="javascript:void(0)">Active
                            Investment</a>
                    </div>
                    <div class="col-md-3 py-3">
                        <div class="font-size-h1 font-w300 text-black mb-1">
                            {{ $completeInvest->sum('plan.price') }}
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted"
                            href="javascript:void(0)">Complete Investment</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Run Blockchain</h2>
                        <form action="#" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <a href="{{ route('admin.blockchain') }}" class="btn btn-primary btn-lg btn-block" name="blockchain_name">Run Blockchain</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
