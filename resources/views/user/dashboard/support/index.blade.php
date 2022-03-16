@extends('user.layout.app')
@section('title')
    Support Center
@endsection

@section('content')
    <div class="content">
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Support Center
        </h2>
    </div>
    <div class="content content-full content-boxed">

        <div class="row">
            @forelse ($supports as $support)
                <div class="col-md-12">
                    <div class="block block-rounded d-flex justify-content-center align-items-center">
                        <div class="block-content">
                            <h3>{{ $support->subject }}</h3>
                            <p>{{ $support->message }}</p>
                            <p>{{ $support->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="support-button mr-4">
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="block block-rounded">
                        <div class="block-content">
                            <h2>NO Ticekt Found</h2>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
