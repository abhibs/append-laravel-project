@extends('admin.layout.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Team Members </h4>

                            <form method="post" action="{{ route('team-store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="name" class="form-control" type="text" id="example-text-input">

                                        @error('name')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Designation
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="designation" class="form-control" type="text"
                                            id="example-text-input">

                                        @error('designation')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Content
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="content">

                                        </textarea>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> Image </label>
                                    <div class="col-sm-10">
                                        <input name="image" class="form-control" type="file" id="image">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ url('no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Social Media
                                    </label>
                                    <div class="col-sm-5">
                                        <input name="icon[]" class="form-control" type="text" id="example-text-input"
                                            placeholder="Enter Social Media Icon Class">


                                    </div>
                                    <div class="col-sm-5">
                                        <input name="url[]" class="form-control" type="text" id="example-text-input"
                                            placeholder="Enter Social Media URL">
                                    </div>
                                    <div class="col-6"></div>
                                    <div class="col-2
                                                form-group">
                                        <button id="btnCakePrice2" style="border: none;" class="form-control text-danger"
                                            type="button"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div id="WeightContainer2"></div>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Team">

                        </div>


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
    </script>

    <script>
        $("#btnCakePrice2").bind("click", function() {
            var div = $("<div />");
            div.html(GetDynamicWeight2(""));
            $("#WeightContainer2").append(div);
        });
        $("body").on("click", ".removeGrossBtn2", function() {
            $(this).closest(".dynamicRadio2").remove();
        });

        function GetDynamicWeight2(value) {
            return `<div class="dynamicRadio2">
                                    <div class="row mb-3">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-5">
                                        <input name="icon[]" class="form-control" type="text" id="example-text-input"
                                            placeholder="Enter Social Media Icon Class">


                                    </div>
                                    <div class="col-sm-5">
                                        <input name="url[]" class="form-control" type="text" id="example-text-input"
                                            placeholder="Enter Social Media URL">
                                    </div>
                                    <div class="col-6"></div>
                                </div>

        <div class="col-2 offset-6 form-group"><button style="border: none;" class="form-control text-danger removeGrossBtn2" id=""><i class="fa fa-minus"></i></button></div></div></div> `
        }
    </script>
@endsection
