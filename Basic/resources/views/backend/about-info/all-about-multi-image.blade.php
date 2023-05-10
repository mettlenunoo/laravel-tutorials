@extends('layouts.backend-master')
@section('title', 'Dashboard Edit About')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Data Tables</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Data Tables</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Default Datatable</h4>
                    <p class="card-title-desc">DataTables has most features enabled by
                        default, so all you need to do to use it with your own tables is to call
                        the construction function: <code>$().DataTable();</code>.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            {{-- @forelse ($multiImageData as $item)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td><img src="{{ asset($item->multi_image) }}" width="10%" alt=""></td>
                                    <td>{{ $item->created_at }}</td>
                                    <td><a href="{{ route('edit.about.multi.image', $item->id) }}"
                                            class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('delete.single.about.multi.image', $item->id) }}"
                                            class="btn btn-outline-danger btn-sm " id="delete" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td></td>
                                    <td class="text-center">No Records Found</td>
                                    <td></td>
                                </tr>
                            @endforelse --}}

                            @foreach ($multiImageData as $item)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td><img src="{{ asset($item->multi_image) }}" width="10%" alt=""></td>
                                    <td>{{ $item->created_at }}</td>
                                    <td><a href="{{ route('edit.about.multi.image', $item->id) }}"
                                            class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('delete.single.about.multi.image', $item->id) }}"
                                            class="btn btn-outline-danger btn-sm " id="delete" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


@endsection
