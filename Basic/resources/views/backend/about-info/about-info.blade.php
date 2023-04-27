@extends('layouts.backend-master')
@section('title', 'Dashboard Edit About')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">About Info</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Edit</a></li>
                    <li class="breadcrumb-item active">Edit About</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Edit About Info</h4>
                <p class="card-title-desc">Edit About Info here</p>

                <form method="post" action="{{route('update.about')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input name="title" class="form-control" type="text" value="{{$aboutData->title}}"
                                id="title">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="title_text" class="col-sm-2 col-form-label">Title Text</label>
                        <div class="col-sm-10">
                            <input name="title_text" class="form-control" type="text" value="{{$aboutData->title_text}}"
                                id="title_text">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="about_image" class="col-sm-2 col-form-label">About Image</label>
                        <div class="col-sm-10">
                            <input name="about_image" class="form-control" type="file" id="about_image">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="view_slider_image" class="col-sm-2 col-form-label">View About image</label>
                        <div class="col-sm-10">
                            <img class="rounded avatar-lg" id='show-image'
                                src="{{(!empty($aboutData->abt_page_img))? url($aboutData->abt_page_img):url('uploads/home-slider-image/no_image.jpg')}}"
                                alt="preview image">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="short_desc" class="col-sm-2 col-form-label">Short Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="short_desc" rows="3">{{$aboutData->short_desc}}</textarea>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="main_desc" class="col-sm-2 col-form-label">Long Description</label>
                        <div class="col-sm-10">
                            <textarea id="elm1" name="main_desc">{{$aboutData->main_desc}}</textarea>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button class="btn btn-primary waves-effect waves-light mt-2" type="submit">Update About
                                Info</button>
                        </div>
                    </div>
                    <!-- end row -->


                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<script>
    const mainImage = document.querySelector('#about_image');

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