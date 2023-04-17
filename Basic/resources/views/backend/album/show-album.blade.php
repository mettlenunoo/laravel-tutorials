
@extends('layouts.backend-master')
@section('title', 'Album')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

{{-- <div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">Total Sales</p>
                        <h4 class="mb-2">1452</h4>
                        <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i
                                    class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous
                            period</p>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-primary rounded-3">
                            <i class="ri-shopping-cart-2-line font-size-24"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">New Orders</p>
                        <h4 class="mb-2">938</h4>
                        <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i
                                    class="ri-arrow-right-down-line me-1 align-middle"></i>1.09%</span>from previous
                            period</p>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-success rounded-3">
                            <i class="mdi mdi-currency-usd font-size-24"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">New Users</p>
                        <h4 class="mb-2">8246</h4>
                        <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i
                                    class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from previous
                            period</p>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-primary rounded-3">
                            <i class="ri-user-3-line font-size-24"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">Unique Visitors</p>
                        <h4 class="mb-2">29670</h4>
                        <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i
                                    class="ri-arrow-right-up-line me-1 align-middle"></i>11.7%</span>from previous
                            period</p>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-success rounded-3">
                            <i class="mdi mdi-currency-btc font-size-24"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row --> --}}

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body">
        
                    <h4 class="card-title mb-4">All Albums</h4>

                    <div class="table-responsive">
                        <table class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                                <tr style="cursor: pointer;">
                                    <th>Number</th>
                                    <th>Cover Image</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($albumData as $item)
                                <tr data-id="1" style="cursor: pointer;">
                                    <td data-field="id" style="width: 80px">{{$item->id}}</td>
                                    <td data-field="profile-image"><img class="rounded-circle avatar-sm" id='show-image'  src="{{(!empty($item->album_cover))? url('uploads/album-cover-images/'.$item->album_cover):url('uploads/dashboard-profile-images/no_image.jpg')}}"
                                        alt="preview image"></td>
                                    <td data-field="Title">{{$item->album_title}}</td>
                                    <td data-field="visibility">{{$item->visibility}}</td>
                                    <td data-field="Date">{{$item->publish}}</td>
                                    <td style="width: 100px">
                                        <a href="{{route('edit.album',$item->id)}}" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                    <tr data-id="2" style="cursor: pointer;">
                                        <td colspan='7' data-field="no data" style="width: 80px">No Ablums yet</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end card -->
        </div><!-- end card -->
    </div>
</div>
<!-- end row -->
@endsection