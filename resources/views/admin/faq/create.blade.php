@extends('admin.layout.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Faq </h4>

                            <form method="post" action="{{ route('faq-store') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Faq Question
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="question" class="form-control" type="text" id="example-text-input">

                                        @error('question')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>



                                <!-- end row -->



                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Faq Answer
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="answer">

                                        </textarea>
                                    </div>
                                </div>
                                <!-- end row -->

                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Faq">
                            </form>



                        </div>
                    </div>
                </div> <!-- end col -->
            </div>



        </div>
    </div>
@endsection
