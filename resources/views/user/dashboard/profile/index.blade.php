@extends('user.layout.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <div class="content">
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> My Profile
        </h2>
    </div>
    <div class="content content-full content-boxed">
        <div class="block block-rounded">
          <div class="block-content">
            <form action="{{ route('user.profile.store') }}" method="POST">
                @csrf
              <h2 class="content-heading pt-0">
                <i class="fa fa-fw fa-user-circle text-muted me-1"></i> User Profile
              </h2>
              <div class="row push">
                <div class="col-lg-4">
                  <p class="text-muted">
                    Your account’s vital info. Your username will be publicly visible.
                  </p>
                </div>
                <div class="col-lg-8 col-xl-5">
                  <div class="mb-4">
                    <label class="form-label" for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Full Name.." value="{{ auth()->user()->name }}">
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your Username.." value="{{ auth()->user()->username }}" readonly>
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your Email.." value="{{ auth()->user()->email }}" readonly>
                  </div>
                </div>
              </div>
              <div class="row push">
                <div class="col-lg-8 col-xl-5 offset-lg-4">
                  <div class="mb-4">
                    <button type="submit" class="btn btn-alt-primary">
                      <i class="fa fa-check-circle opacity-50 me-1"></i> Update Profile
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
@endsection
