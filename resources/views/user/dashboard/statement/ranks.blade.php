@extends('user.layout.app')
@section('title')
    My Ranks
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
                        My Ranks <span class="text-primary">Statement</span>.
                    </h1>
                </div>
            </div>
        </div>
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    My Ranks <small>Statement</small>
                </h3>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>Rank Name</th>
                            <th>Direct Sale Required</th>
                            <th>Commission</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ranks as $rank)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rank->name }}</td>
                                <td>{{ $rank->business_from }}</td>
                                <td>{{ $rank->global }}%</td>
                                <td>{!! directAward(auth()->user()->id) == $rank->name ? '<i class="fa fa-check"></i>' : '' !!}</td>
                            </tr>
                        @empty
                            <h3>NO Record</h3>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
