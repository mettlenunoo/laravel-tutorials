@extends('layouts.backend-master')
@section('title', 'Dashboard Album')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Add Album</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Album</a></li>
                    <li class="breadcrumb-item active">Add Album</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<form method="POST" action="{{route('store.album')}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Album</h4>
                    <div class="row mb-3">
                        <label for="album-title" class="col-form-label">Album Title</label>
                        <input name="album_title" class="form-control -mb-2 @error('album_title') is-invalid @enderror" type="text" placeholder="Sunset Nature"
                            id="album-title">
                            @error('"album_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="album-subtext" class="col-form-label">Album Sub Text</label>
                        <input name="album_subtext" class="form-control @error('album_subtext') is-invalid @enderror" type="text" placeholder="Nature Photos"
                            id="album-subtext">
                            @error('album-subtext')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="visibility" class="col-form-label">Visibility</label>
                        <select name="visibility" class="form-select @error('visibility') is-invalid @enderror" aria-label="Default select example">
                            <option selected="">Open this select menu</option>
                            <option value="Public">Public</option>
                            <option value="Private">Private</option>
                        </select>
                        @error('visibility')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="publish" class="col-form-label">Publish Date</label>
                        <input name="publish" class="form-control @error('publish') is-invalid @enderror" type="date" id="publish">
                    </div>
                    <label for="publish" class="col-form-label @error('name') is-invalid @enderror">Gallery Description</label>
                    <textarea name='gallery_message' required="" class="form-control" rows="5"></textarea>
                    @error('gallery_message')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div> <!-- end col -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Album Cover</h4>
                    {{--<p class="card-title-desc">The file input is the most gnarly of the bunch and requires additional
                    JavaScript if you’d like to hook them up with functional <em>Choose file…</em> and selected file
                    name text.</p> --}}
                     <div class="input-group">
                        <input name="album_cover" type="file" class="form-control @error('album_cove') is-invalid @enderror" id="album-cover" accept="image/*">
                    </div>
                    @error('album_cover')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Galley Images</h4>
                    <p class="card-title-desc">Select Muliple Images</p>
                    <div class="input-group">
                        <input name="gallery_images[]" type="file" class="form-control @error('gallery_images') is-invalid @enderror" id="gallery-images"
                            accept="image/*" multiple>
                    </div>
                                        @error('message')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">Publish</button>
        </div> <!-- end col -->
    </div>
</form>
<div class="row">

</div>
@endsection