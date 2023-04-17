@extends('layouts.guest')
@section('title', 'Dashboard | Login')
@section('content')
<h4 class="text-muted text-center font-size-18"><b>Sign In</b></h4>

<div class="p-3">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <form class="form-horizontal mt-3" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" id="email" type="email" name="email" required placeholder="Email">
            </div>
        </div>

        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" id="password" type="password" name="password" required
                    autocomplete="current-password" placeholder="Password">
            </div>
        </div>

        <div class="form-group mb-3 row">
            <div class="col-12">
                <div class="custom-control custom-checkbox">
                    <input id="remember_me" type="checkbox" class="custom-control-input">
                    <label class="form-label ms-1" for="customCheck1">Remember me</label>
                </div>
            </div>
        </div>

        <div class="form-group mb-3 text-center row mt-3 pt-1">
            <div class="col-12">
                <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
            </div>
        </div>

        <div class="form-group mb-0 row mt-2">
            <div class="col-sm-7 mt-3">
                <a href="{{route('password.request')}}" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your
                    password?</a>
            </div>
            <div class="col-sm-5 mt-3">
                <a href="{{route('register')}}" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an
                    account</a>
            </div>
        </div>
    </form>
</div>
<!-- end -->
@endsection