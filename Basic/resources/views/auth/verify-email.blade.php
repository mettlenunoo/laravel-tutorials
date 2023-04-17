@extends('layouts.guest')
@section('title', 'Dashboard | Register')
@section('content')
<h4 class="text-muted text-center font-size-18"><b>Reset Password</b></h4>
    
<div class="p-3">
    <form class="form-horizontal mt-3" method="POST" action="{{ route('password.email') }}">
        @csrf

        <p>
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another
        </p>
        @if (session('status') == 'verification-link-sent')
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            A new verification link has been sent to the email address you provided during registration.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="form-group pb-2 text-center row mt-3">
            <div class="col-12">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Resend Verification Email</button>
                </form>
            </div>
            <div class="col-12 mt-2">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log Out</button>
                </form>
            </div>
        </div>
    </form>
</div>
@endsection