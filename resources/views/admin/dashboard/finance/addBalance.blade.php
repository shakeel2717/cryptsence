@extends('admin.layout.app')
@section('title')
    Add Balance into User Account
@endsection

@section('content')
    <div class="content">
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Add Balance into User Account
        </h2>
    </div>
    <div class="content content-full content-boxed">
        <div class="block block-rounded"  style="overflow: scroll">
            <div class="block-content">
                <form action="{{ route('admin.addBalance.store') }}" method="POST">
                    @csrf
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-user-circle text-muted me-1"></i> Add Balance
                    </h2>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Add Balance in User Account for Plan Activation or Withdarwal Request
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" name="username" id="username" placeholder="User Username" class="form-control">
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
                                    <i class="fa fa-check-circle opacity-50 me-1"></i> Add Balance
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
