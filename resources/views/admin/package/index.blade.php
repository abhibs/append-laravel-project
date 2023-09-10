@extends('admin.layout.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Packages All</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Packages Data </h4>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Icon</th>
                                        <th>Amount</th>
                                        <th>Package Details</th>
                                        <th>Status </th>
                                        <th>Action</th>

                                </thead>


                                <tbody>

                                    @foreach ($datas as $key => $item)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>

                                            <td>{{ $item->name }}</td>
                                            <td><i class="{{ $item->name }}"></i></td>
                                            <td>{{ $item->amount }}</td>

                                            <td>
                                                {{-- @foreach ($item->detail as $data)
                                                    <p>
                                                        {{ $data->description }}:
                                                        @if ($data->condition == 1)
                                                            <span class="badge badge-pill bg-success">Checked</span>
                                                        @else
                                                            <span class="badge badge-pill bg-danger">Unchecked</span>
                                                        @endif
                                                    </p>
                                                    <br>
                                                @endforeach --}}

                                                <table class="table table-bordered mb-0">

                                                    <thead>
                                                        <tr>
                                                            <th>Condition</th>
                                                            <th>Description</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($item->detail as $data)
                                                            <tr>
                                                                <td>
                                                                    @if ($data->condition == 1)
                                                                        <span
                                                                            class="badge badge-pill bg-success">Checked</span>
                                                                    @else
                                                                        <span class="badge badge-pill bg-danger">Un
                                                                            Checked</span>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $data->description }}</td>
                                                            </tr>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <span class="badge badge-pill bg-success">Active</span>
                                                @else
                                                    <span class="badge badge-pill bg-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('package-edit', $item->id) }}" class="btn btn-warning sm"
                                                    title="Edit Data"> <i class="fas fa-edit"></i> </a>

                                                <a href="{{ route('package-delete', $item->id) }}" class="btn btn-danger sm"
                                                    title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i>
                                                </a>

                                                @if ($item->status == 1)
                                                    <a href="{{ route('package-inactive', $item->id) }}"
                                                        class="btn btn-info sm" title="Inactive"><i
                                                            class="fa-solid fa-thumbs-down"></i> </a>
                                                @else
                                                    <a href="{{ route('package-active', $item->id) }}"
                                                        class="btn btn-info sm" title="Active"><i
                                                            class="fa-solid fa-thumbs-up"></i></a>
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
