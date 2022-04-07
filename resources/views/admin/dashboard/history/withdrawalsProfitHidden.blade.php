@extends('admin.layout.app')
@section('title')
    Approveed Profit Withdraw
@endsection

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
@endsection

@section('content')
    <div class="content">
        <div class="content content-boxed content-full py-5 py-md-7">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1 class="h2 mb-2 text-center">
                        All Approveed Profit Withdraw Transactions <span class="text-primary">Statement</span>.
                    </h1>
                </div>
            </div>
        </div>
        <div class="block block-rounded"  style="overflow: scroll">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    All Approveed Profit Withdraw Transactions <small>Statement</small>
                </h3>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>User</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Wallet</th>
                            <th>status</th>
                            <th>Date</th>
                            <th>Hide</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($statement as $transaction)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center text-capitalize">{{ $transaction->user->username }}</td>
                                <td class="text-center">
                                    ${{ number_format($transaction->amount - ($transaction->amount / 100) * 2, 4) }}/-
                                </td>
                                <td class="text-center">{{ $transaction->method }}</td>
                                <td class="text-center">{{ $transaction->address }}</td>
                                <td class="text-center text-capitalize">{{ $transaction->status }}</td>
                                <td class="text-center">{{ $transaction->created_at }}</td>
                                <td class="text-center"><a
                                    href="{{ route('admin.history.withdrawals.profit.show', ['id' => $transaction->id]) }}"
                                    class="btn btn-sm btn-success">Show</a></td>
                            </tr>
                        @empty
                            <p>No Record Found</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
