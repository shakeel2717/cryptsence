@extends('user.layout.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <div class="content">
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Quick Overview
        </h2>
        <div class="row">
            @forelse ($plans as $plan)
                <div class="col-md-6 col-xl-4">
                    <a class="block block-link-pop block-rounded block-themed block-fx-shadow text-center"
                        href="{{ route('user.plan.show', ['plan' => $plan->id]) }}">
                        <div class="block-header">
                            <h3 class="block-title">
                                <i class="fa fa-check me-1"></i> {{ $plan->name }}
                            </h3>
                        </div>
                        <div class="block-content bg-body-light">
                            <div class="py-2">
                                <p class="h1 fw-bold mb-2">${{ number_format($plan->price, 2) }}</p>
                                <p class="h6 text-muted">{{ $plan->duration }} months</p>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="py-2">
                                <p>
                                    <strong>{{ $plan->profit }}%</strong> ROI
                                </p>
                                <p>
                                    <strong>$20</strong> Min Wihdraw
                                </p>
                                <p>
                                    <strong>{{ $plan->duration }}</strong> Months Duration
                                </p>
                                <p>
                                    <strong>$0.00</strong> Activation Fees
                                </p>
                            </div>
                        </div>
                        <div class="block-content block-content-full bg-body-light">
                            <span class="btn btn-hero btn-primary px-4">Purchase</span>
                        </div>
                    </a>
                </div>
            @empty
                <h2>NO Plan Found</h2>
            @endforelse
        </div>
    </div>
@endsection
