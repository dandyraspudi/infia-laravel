@extends('admin.layouts.app')

@section('title')
    | Admin Create
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
        <li class="breadcrumb-item"><a href="{{ route('user.list') }}">Admin</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Admin</li>
    </ol>
</nav>

<div class="row">

    <div class="col-md-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Create Admin</h6>

                    <form class="forms-sample" id="career-create" action="{{ route('user.create.post') }}" method="post" enctype="multipart/form-data">
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
                                    <label for="name">Admin Name</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><br />
                                    <label for="email">Admin Email</label>
                                    <input type="text" class="form-control" name="email" id="email">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12"><br />
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </div>
                        </div>

                    </form>

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
	<script src="{{ asset('admins/assets/js/page/user/create.js') }}"></script>
	<script src="{{ asset('admins/assets/js/page/user/create.validation.js') }}"></script>
@endsection

