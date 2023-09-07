@extends('admin.layout.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit About Us Feature </h4>

                            <form method="post" action="{{ route('aboutus-update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">About Us Content Title
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="icon" class="form-control" type="text" id="example-text-input"
                                            value="{{ $data->icon }}">

                                        @error('icon')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">About Us Content Title
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="title" class="form-control" type="text" id="example-text-input"
                                            value="{{ $data->title }}">

                                        @error('title')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>



                                <!-- end row -->



                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">About Us Content
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="content">
                                            {!! $data->content !!}
                                        </textarea>
                                    </div>
                                </div>
                                <!-- end row -->

                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Update About Us Feature">
                            </form>



                        </div>
                    </div>
                </div> <!-- end col -->
            </div>



        </div>
    </div>
@endsection
