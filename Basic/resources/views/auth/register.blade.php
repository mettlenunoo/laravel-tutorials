@extends('layouts.guest')
@section('title', 'Dashboard | Register')
@section('content')
<h4 class="text-muted text-center font-size-18"><b>Register</b></h4>
    
<div class="p-3">
    <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" type="text" id="name" required name="name" placeholder="Name">
            </div>
        </div>

        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" type="email" id="email" required name="email" placeholder="Email">
            </div>
        </div>

        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" type="text" id="username" required name="username" placeholder="Username">
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

        <div class="form-group row mb-3">
            <div class="col-12">
                <select name='role' id="role" class="form-select" aria-label="Default select example">
                    <option selected="">Select User Role</option>
                    <option value="superadmin">Super Admin</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                    </select>
            </div>
        </div>

        <div class="form-group text-center row mt-3 pt-1">
            <div class="col-12">
                <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Register</button>
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
