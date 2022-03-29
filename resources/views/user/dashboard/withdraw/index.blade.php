@extends('user.layout.app')
@section('title')
    Withdraw Request
@endsection

@section('content')
    <div class="content">
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Withdraw Request
        </h2>
    </div>
    <div class="content content-full content-boxed">
        <div class="block block-rounded"  style="overflow: scroll">
            <div class="block-content">
                <form action="{{ route('user.withdraw.store') }}" method="POST">
                    @csrf
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-user-circle text-muted me-1"></i> Withdraw Request, Current Balance is: ${{ number_format(balance(auth()->user()->id), 2) }}
                    </h2>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Withdraw Request Can upto 24 - 48 Hours.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="method">Method</label>
                                <select name="method" id="method" class="form-control">
                                    <option value="BTC">BTC</option>
                                    <option value="USDT (TRC-20)">USDT (TRC-20)</option>
                                    <option value="BUSD.BEP20">BUSD BEP20</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="address">Address</label>
                                <input type="text" name="address" id="address" placeholder="Address" class="form-control">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="amount">Amount</label>
                                <input type="text" name="amount" id="amount" placeholder="Amount" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row push">
                        <div class="col-lg-8 col-xl-5 offset-lg-4">
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-check-circle opacity-50 me-1"></i> Withdraw Request
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
