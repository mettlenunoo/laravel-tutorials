@extends('layouts.admin-master')
@section('title', 'Dashboard Edit Profile')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Home Slider</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Edit</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Edit Profile</h4>
                <p class="card-title-desc">Edit your Profile here</p>

                <form method="post" action="{{route('store.profile')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input name="title" class="form-control" type="text" value="{{$homeslider->title}}" id="title">
                        </div>
                    </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label for="title_text" class="col-sm-2 col-form-label">Title Text</label>
                    <div class="col-sm-10">
                        <input name="title_text" class="form-control" type="text" value="{{$homeslider->title_text}}" id="title_text">
                    </div>
                </div>
            <!-- end row -->

                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Video url</label>
                    <div class="col-sm-10">
                        <input name="video_url" class="form-control" type="text" value="{{$homeslider->video_url}}" id="video_url">
                    </div>
                </div>
            <!-- end row -->

                <div class="row mb-3">
                    <label for="slider_image" class="col-sm-2 col-form-label">Slider Image</label>
                    <div class="col-sm-10">
                        <input name="slider_image" class="form-control" type="file"  id="slider_image">
                    </div>
                </div>
            <!-- end row -->
                <div class="row mb-3">
                    <label for="view_slider_image" class="col-sm-2 col-form-label">View Profile image</label>
                    <div class="col-sm-10">
                        <img class="rounded avatar-lg" id='show-image'  src="{{(!empty($homeslider->slider_image))? url('uploads/home-slider-image/'.$homeslider->slider_image):url('uploads/home-slider-image/no_image.jpg')}}"
                        alt="preview image">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button class="btn btn-primary waves-effect waves-light mt-2"  type="submit">Update Profile</button>
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