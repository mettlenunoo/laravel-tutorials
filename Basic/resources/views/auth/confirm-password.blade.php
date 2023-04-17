@extends('layouts.guest')
@section('title', 'Dashboard | Comfirm Password')
@section('content')
<div class="p-3">
    <form class="form-horizontal mt-3"  method="POST" action="{{ route('password.confirm') }}">
            @csrf

        <div class="text-center mb-4">
            <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="thumbnail">
        </div>

        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password">
            </div>
        </div>

        <div class="form-group text-center row mt-3">
            <div class="col-12">
                <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
            </div>
        </div>

        <div class="form-group mt-4 mb-0 row">
            <div class="col-12 text-center">
                <a href="{{route('login')}}" class="text-muted">Not you?</a>
            </div>
        </div>
    </form>
</div>
@endsection
