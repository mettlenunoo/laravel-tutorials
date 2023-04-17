@extends('layouts.backend-master')
@section('title', 'Dashboard Admin Change Password')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Change Password</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Edit</a></li>
                    <li class="breadcrumb-item active">Admin Change Password</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Change {{$changeUserPassword->name}}'s Password</h4>
                <p class="card-title-desc">Change {{$changeUserPassword->name}}'s Password here</p>

                <form method="post" action="{{route('admin.update.user.password',$changeUserPassword->id)}}">
                    @csrf

                    <div class="row mb-3">
                        <label for="new-password" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                            <input name="new_password" class="form-control @error('new_password') is-invalid @enderror" type="password" value="" id="new-password">

                            @error('new_password')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-block-helper me-2"></i>
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="new-password" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" type="password" value=""
                                id="confirm-password">

                            @error('confirm_password')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-block-helper me-2"></i>
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button class="btn btn-primary waves-effect waves-light mt-2" type="submit">Change
                                Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection