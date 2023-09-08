@extends('admin.layout.app')
@section('content')
    <style>
        .black-icon {
            color: black;
            padding: 5px;
            /* Adjust the padding size as needed */
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Team All</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Team Data </h4>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Image</th>
                                        <th>Social Media</th>
                                        <th>Status </th>
                                        <th>Action</th>

                                </thead>


                                <tbody>

                                    @foreach ($datas as $key => $item)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>

                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->designation }}</td>
                                            <td><img src="{{ asset($item->image) }}" style="width: 60px; height: 50px;">
                                            </td>
                                            <td>
                                                @foreach ($item->socialmedia as $social)
                                                    <a href="{{ $social->url }}" target="_blank"><i
                                                            class="{{ $social->icon }} black-icon"></i></a>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <span class="badge badge-pill bg-success">Active</span>
                                                @else
                                                    <span class="badge badge-pill bg-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('team-edit', $item->id) }}" class="btn btn-warning sm"
                                                    title="Edit Data"> <i class="fas fa-edit"></i> </a>

                                                <a href="{{ route('team-delete', $item->id) }}" class="btn btn-danger sm"
                                                    title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i>
                                                </a>

                                                @if ($item->status == 1)
                                                    <a href="{{ route('team-inactive', $item->id) }}"
                                                        class="btn btn-info sm" title="Inactive"><i
                                                            class="fa-solid fa-thumbs-down"></i> </a>
                                                @else
                                                    <a href="{{ route('team-active', $item->id) }}" class="btn btn-info sm"
                                                        title="Active"><i class="fa-solid fa-thumbs-up"></i></a>
                                                @endif

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



        </div> <!-- container-fluid -->
    </div>
@endsection
