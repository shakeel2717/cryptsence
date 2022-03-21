@extends('admin.layout.app')
@section('title')
    Users
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
                        All Users Transactions <span class="text-primary">Statement</span>.
                    </h1>
                </div>
            </div>
        </div>
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    All Users Transactions <small>Statement</small>
                </h3>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Balance</th>
                            <th>ROI Bal</th>
                            <th>Direct Award</th>
                            <th>Upliner</th>
                            <th>Status</th>
                            <th>Network</th>
                            <th>Verify</th>
                            <th>Action</th>
                            <th>ROI</th>
                            <th>Sell Stop</th>
                            <th>Passive</th>
                            <th>Login</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center text-capitalize">{{ $user->name }}</td>
                                <td class="text-center text-capitalize">{{ $user->username }}</td>
                                <td class="text-center text-capitalize">{{ $user->email }}</td>
                                <td class="text-center">${{ number_format(balance($user->id), 2) }}</td>
                                <td class="text-center">${{ number_format(roiBalance($user->id), 2) }}</td>
                                <td class="text-center">${{ number_format(directBusiness($user->id), 2) }}</td>
                                <td class="text-center text-capitalize">{{ $user->refer }}</td>
                                <td class="text-center text-capitalize">{{ $user->status }}</td>
                                <td class="text-center text-capitalize">{{ $user->network == 1 ? 'Yes' : 'No' }}
                                </td>
                                @if ($user->email_verified_at == null)
                                    <td><a href="{{ route('admin.user.verified', ['id' => $user->id]) }}"
                                            class="btn btn-dark">Verify</a></td>
                                @else
                                    <td>Verified</td>
                                @endif
                                <td class="text-center text-capitalize">
                                    @if ($user->network == 1)
                                        <a href="{{ route('admin.history.user.plan.unPin', ['id' => $user->id]) }}"
                                            class="btn btn-sm btn-success">Make Normal</a>
                                </td>
                            @else
                                <a href="{{ route('admin.history.user.plan.makePin', ['id' => $user->id]) }}"
                                    class="btn btn-sm btn-primary">Make PIN</a></td>
                        @endif
                        @if ($user->roi == 1)
                            <td class="text-center"><a class="btn btn-danger btn-sm"
                                    href="{{ route('admin.history.users.stop.ROi', ['user' => $user->id]) }}">Stop</a>
                            </td>
                        @elseif ($user->roi == 0)
                            <td class="text-center"><a class="btn btn-success btn-sm"
                                    href="{{ route('admin.history.users.start.ROi', ['user' => $user->id]) }}">Start</a>
                            </td>
                        @endif
                        @if ($user->sale == 1)
                            <td class="text-center"><a class="btn btn-danger btn-sm"
                                    href="{{ route('admin.history.user.sale.stop', ['id' => $user->id]) }}">Sale Stop</a>
                            </td>
                        @else
                            <td class="text-center"><a class="btn btn-success btn-sm"
                                    href="{{ route('admin.history.user.sale.start', ['id' => $user->id]) }}">Start
                                    Sale</a>
                            </td>
                        @endif

                        @if ($user->passive == 1)
                            <td class="text-center"><a class="btn btn-danger btn-sm"
                                    href="{{ route('admin.history.user.passive.stop', ['id' => $user->id]) }}">Passive
                                    Stop</a>
                            </td>
                        @else
                            <td class="text-center"><a class="btn btn-success btn-sm"
                                    href="{{ route('admin.history.user.passive.start', ['id' => $user->id]) }}">Passive
                                    Start</a>
                            </td>
                        @endif


                        <td>
                            <form action="{{ route('admin.login.user') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <input class="btn btn-sm btn-dark" type="submit" value="Login" class="login">
                            </form>
                        </td>
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
