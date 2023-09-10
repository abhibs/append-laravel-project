@extends('admin.layout.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Package</h4>

                            <form method="post" action="{{ route('package-update', $data->id) }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Package Name
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="name" class="form-control" type="text" id="example-text-input"
                                            value="{{ $data->name }}">

                                        @error('name')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Package Icon
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
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Package Amount
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="amount" class="form-control" type="text" id="example-text-input"
                                            value="{{ $data->amount }}">

                                        @error('amount')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Package Description
                                    </label>
                                    @foreach ($detail as $item)
                                        <div class="col-sm-5 mb-3">
                                            <select class="form-select" name="condition[]"
                                                aria-label="Default select example">
                                                {{-- <option selected="">Choose Package Checked or Unchecked</option> --}}
                                                <option value="1" @if ($item->condition == 1) selected @endif>
                                                    Checked</option>
                                                <option value="0" @if ($item->condition == 0) selected @endif>
                                                    Unchecked</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-5 mb-3">
                                            <input name="description[]" class="form-control" type="text"
                                                id="example-text-input" placeholder="Enter Package Description Details"
                                                value="{{ $item->description }}">
                                        </div>
                                        <div class="col-sm-2 mb-3">
                                        </div>
                                    @endforeach

                                    <div class="col-4"></div>
                                    <div class="col-2
                                                form-group">
                                        <button id="btnCakePrice2" style="border: none;" class="form-control text-danger"
                                            type="button"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>



                                <div id="WeightContainer2"></div>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Package">

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
                                        <select class="form-select" name="condition[]" aria-label="Default select example">
                                            <option selected="">Choose Package Checked or Unchecked</option>
                                            <option value="1">Checked</option>
                                            <option value="0">Unchecked</option>
                                        </select>


                                    </div>
                                    <div class="col-sm-5">
                                        <input name="description[]" class="form-control" type="text" id="example-text-input"
                                            placeholder="Enter Package Description Details">
                                    </div>
                                    <div class="col-6"></div>
                                </div>

        <div class="col-2 offset-6 form-group"><button style="border: none;" class="form-control text-danger removeGrossBtn2" id=""><i class="fa fa-minus"></i></button></div></div></div> `
        }
    </script>
@endsection
