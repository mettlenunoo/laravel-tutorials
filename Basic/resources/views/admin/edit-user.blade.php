@extends('layouts.admin-master')
@section('title', 'Dashboard Admin Edit User Profile')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Admin Edit User Profile</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Edit</a></li>
                    <li class="breadcrumb-item active">Admin Edit User Profile</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Admin {{$editUser->name}}'s Profile</h4>
                <p class="card-title-desc">Admin {{$editUser->name}}'s Profile here</p>

                <form method="post" action="{{route('admin.store.user.profile', $editUser->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input name="name" class="form-control" type="text" value="{{$editUser->name}}" id="name">
                        </div>
                    </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input name="email" class="form-control" type="email" value="{{$editUser->email}}" id="email">
                    </div>
                </div>
            <!-- end row -->

                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input name="username" class="form-control" type="text" value="{{$editUser->username}}" id="username">
                    </div>
                </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="role" class="col-sm-2 col-form-label">Select User Role</label>
                <div class="col-sm-10">
                    <select name='role' id="role" class="form-select" aria-label="Default select example">
                        <option value="user" {{$editUser->role == empty($editUser->role) ? 'selected': ''}}>No Role</option>
                        <option value="superadmin" {{$editUser->role == env('SUPERADMIN') ? 'selected': ''}}>Super Admin</option>
                        <option value="admin" {{$editUser->role == env('ADMIN') ? 'selected': ''}}>Admin</option>
                        <option value="user" {{$editUser->role == env('USER') ? 'selected': ''}}>User</option>
                    </select>
                    
                </div>
            </div>
            <!-- end row -->

                <div class="row mb-3">
                    <label for="profile-image" class="col-sm-2 col-form-label">Profile image</label>
                    <div class="col-sm-10">
                        <input name="profile_image" class="form-control" type="file"  id="profile-image">
                    </div>
                </div>
            <!-- end row -->
                <div class="row mb-3">
                    <label for="view-profile-image" class="col-sm-2 col-form-label">View Profile image</label>
                    <div class="col-sm-10">
                        <img class="rounded avatar-lg" id='show-image'  src="{{(!empty($editUser->profile_image))? url('uploads/dashboard-profile-images/'.$editUser->profile_image):url('uploads/dashboard-profile-images/no_image.jpg')}}"
                        alt="preview image">
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button class="btn btn-primary waves-effect waves-light mt-2"  type="submit">Update Profile</button>
                        <a href="{{route('admin.change.user.password', $editUser->id)}}" class="btn btn-primary waves-effect waves-light mt-2"  type="submit">Update Password</a>
                    </div>
                </div>
                <!-- end row -->
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<script>
const mainImage = document.querySelector('#profile-image');

function previewFile() {
    const preview = document.querySelector('#show-image');
    const file = document.querySelector('#profile-image').files[0];
    const reader = new FileReader();

    reader.addEventListener("load", () => {
        // convert image file to base64 string
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}



mainImage.addEventListener('change', (event) => {
    previewFile()
});

</script>
@endsection