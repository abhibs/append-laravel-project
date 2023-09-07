@extends('admin.layout.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Featured Content </h4>

                            <form method="post" action="{{ route('feature-update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Feature Content Title
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="title" class="form-control" type="text" id="example-text-input"
                                            value="{{ $data->title }}">

                                        @error('title')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Feature Content Image
                                        One </label>
                                    <div class="col-sm-10">
                                        <input name="imageone" class="form-control" type="file" id="image">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ asset($data->imageone) }}"
                                            alt="Card image cap">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Feature Content Image
                                        Two</label>
                                    <div class="col-sm-10">
                                        <input name="imagetwo" class="form-control" type="file" id="image1">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage1" class="rounded avatar-lg" src="{{ asset($data->imagetwo) }}"
                                            alt="Card image cap">
                                    </div>
                                </div>




                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Featured Content
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="content">
                                            {{ $data->content }}
                                        </textarea>
                                    </div>
                                </div>
                                <!-- end row -->

                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Update Featured Content">
                            </form>



                        </div>
                    </div>
                </div> <!-- end col -->
            </div>



        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

        $(document).ready(function() {
            $('#image1').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage1  ').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
