@extends('admin.layout.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"> All Pending Order</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Pending Order Data </h4>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Order ID</th>
                                        <th>Package Name</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>Order Amount</th>
                                        <th>Transaction Id</th>
                                        <th> Date</th>
                                        <th>Status </th>
                                        <th>Action</th>
                                </thead>


                                <tbody>

                                    @foreach ($datas as $key => $item)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td>{{ $item->order_id }}</td>
                                            <td>{{ $item->package->name }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->payable_price }}</td>
                                            <td>{{ $item->payment_request_id }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d F Y') }}</td>



                                            <td>
                                                @if ($item->status == 'Pending')
                                                    <span class="badge badge-pill bg-danger">Pending</span>
                                                @elseif($item->status == 'Approved')
                                                    <span class="badge badge-pill bg-success">Approved</span>
                                                @else
                                                    <span class="badge badge-pill bg-info">Rejected</span>
                                                @endif


                                            </td>
                                            <td>
                                                {{-- <a href="{{ route('project-edit', $item->id) }}" class="btn btn-warning sm"
                                                    title="Edit Data"> <i class="fas fa-edit"></i> </a> --}}
                                                <button type="button" id={{ $item->id }}
                                                    class="btn btn-warning sm update" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <a href="{{ route('order-delete', $item->id) }}" class="btn btn-danger sm"
                                                    title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i>
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



        </div> <!-- container-fluid -->
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Order Status Model</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('order-status-update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="order_id">
                        <select class="form-select" name="status" aria-label="Default select example">
                            <option selected>Choose Order Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        $('.update').click(function() {
            var id = $(this).attr('id');
            var status = $(this).attr('status');
            $("#order_id").val(id);
            $("#status").val(status);
            $('#order_approve').modal('show');
        });
    </script>
@endsection
