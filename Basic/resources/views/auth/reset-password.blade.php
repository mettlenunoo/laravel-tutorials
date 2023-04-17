@extends('layouts.guest')
@section('title', 'Dashboard | Reset Password')
@section('content')
<h4 class="text-muted text-center font-size-18"><b>Reset Password</b></h4>
    
<div class="p-3">
    <form class="form-horizontal mt-3" method="POST" action="{{ route('password.store') }}">
        @csrf

            <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" type="email" id="email" required name="email" value="{{$request->email}}" placeholder="Email">
            </div>
        </div>

        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" type="password" id="password" required autocomplete="new-password" name="password" placeholder="Password">
            </div>
        </div>

        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" type="password" id="password_confirmation" required name="password_confirmation" placeholder="Confirm Password">
            </div>
        </div>

        <div class="form-group text-center row mt-3 pt-1">
            <div class="col-12">
                <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Reset Password</button>
            </div>
        </div>

        <div class="form-group mt-2 mb-0 row">
            <div class="col-12 mt-3 text-center">
                <a href="{{ route('login') }}" class="text-muted">Already have account?</a>
            </div>
        </div>
    </form>
    <!-- end form -->
</div>

@endsection