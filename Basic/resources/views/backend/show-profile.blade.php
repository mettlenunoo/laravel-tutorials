@extends('layouts.backend-master')
@section('title', 'Dashboard Profile')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="row no-gutters align-items-center">
                <div class="col-md-4">
                    <center>
                        <img class="rounded-circle" width="200rem" height="200rem"  src="{{(!empty($userData->profile_image))? url('uploads/dashboard-profile-images/'.$userData->profile_image):url('uploads/dashboard-profile-images/no_image.jpg')}}"
                        alt="Card image">
                    </center>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Name : {{$userData->name}}</h5>
                        <h5 class="card-title">User's Email : {{$userData->email}}</h5>
                        <h5 class="card-title">Username : {{$userData->username}}</h5>
                        <h5 class="card-title">Role : {{$userData->role}}</h5>
                        <a href="{{route('edit.profile')}}" class="btn btn-primary waves-effect waves-light mt-2">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection