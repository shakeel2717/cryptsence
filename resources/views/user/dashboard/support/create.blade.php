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
        <div class="block block-rounded"  style="overflow: scroll">
            <div class="block-content">
                <form action="{{ route('user.support.store') }}" method="POST">
                    @csrf
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-user-circle text-muted me-1"></i> Support Center
                    </h2>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Our Support Team will reply you within 12 hours.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="subject">Subject</label>
                                <select name="subject" id="subject" class="form-control">
                                    <option value="Technical Issue">Technical Issue</option>
                                    <option value="General Question">General Question</option>
                                    <option value="Withdraw Issue">Withdraw Issue</option>
                                    <option value="Plan Upgrade">Plan Upgrade</option>
                                    <option value="Other">Other</option>

                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="message">Message</label>
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row push">
                        <div class="col-lg-8 col-xl-5 offset-lg-4">
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-check-circle opacity-50 me-1"></i> Send Message
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
