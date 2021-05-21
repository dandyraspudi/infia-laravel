@extends('admin.layouts.app')

@section('title')
    | Career Create
@endsection

@section('customcss')
    <link rel="stylesheet" href="{{ asset('admins/assets/vendors/dropify/dist/dropify.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admins/assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admins/assets/vendors/jquery-tags-input/jquery.tagsinput.min.css')}}">
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('career.list') }}">Careers</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Career</li>
    </ol>
</nav>

<div class="row">

    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Create Career</h6>

                    <form class="forms-sample" id="career-create" action="{{ route('career.create.post') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        {{--<div class="row">
                            <div class="col-md-12 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Upload banner image</h6>

                                        <input type="file" id="uploadImage" class="border" name="careerImage" data-allowed-file-extensions="png jpg jpeg"/>
                                    </div>
                                </div>
                            </div>
                        </div>--}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"><br />
                                    <label for="title">Career Title</label>
                                    <input type="text" class="form-control" name="title" id="title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><br />
                                    <label for="division">Division</label>
                                    <input type="text" class="form-control" name="division" id="division">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"><br />
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" name="country" id="country">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><br />
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" name="city" id="city">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mt-5"><br />
                                <label for="contents">Content</label>
                                <textarea class="form-control" name="contents" id="contents" rows="10"></textarea>
                            </div>
                        </div>

                        {{--<div class="row">
                            <div class="col-md-12"><br />
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </div>
                        </div>--}}

                    </form>

            </div>
        </div>
    </div>

    <div class="col-md-4 grid-margin">
        <div class="card">
            <div class="card-body">

                <div class="form-group row pb-0 pt-3">
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-block btn-primary" id="submitCareer">
                            Save
                        </button>
                    </div>
                    <div class="col-sm-6">
                        <a type="button" href="javascript:history.back()" class="btn btn-block btn-outline-secondary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="x"></i>
                            Cancel
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
@endsection

@section('customjs')
    <script src="{{ asset('admins/assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('admins/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admins/assets/vendors/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admins/assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js')}}"></script>
    <script src="{{ asset('admins/assets/vendors/dropify/dist/dropify.min.js') }}"></script>
    <script src="{{ asset('admins/assets/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admins/assets/vendors/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>
	<script src="{{ asset('admins/assets/js/page/careers/create.js') }}"></script>
	<script src="{{ asset('admins/assets/js/page/careers/create.validation.js') }}"></script>
@endsection

