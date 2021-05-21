@extends('admin.layouts.app')

@section('title')
    | Career Edit
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
        <li class="breadcrumb-item active" aria-current="page">Edit Career</li>
    </ol>
</nav>

<div class="row">

    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Create Career</h6>

                    <form class="forms-sample" id="career-edit" action="{{ route('career.edit.post') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="careerId" id="careerId" value="{{ $detail->id }}">
                        {{--<div class="row">
                            <div class="col-md-12 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Upload banner image</h6>

                                        <input type="file" id="uploadImage" class="border" name="careerImage" data-allowed-file-extensions="png jpg jpeg" data-default-file="{{ asset('storage/'.$detail->banner) }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>--}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"><br />
                                    <label for="title">Career Title</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $detail->title }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><br />
                                    <label for="division">Division</label>
                                    <input type="text" class="form-control" name="division" id="division" value="{{ $detail->division }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"><br />
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" name="country" id="country" value="{{ $detail->country }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><br />
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" name="city" id="city" value="{{ $detail->city }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mt-5"><br />
                                <label for="contents">Content</label>
                                <textarea class="form-control" name="contents" id="contents" rows="10">
                                    {{ $detail->content }}
                                </textarea>
                                {{-- <textarea id="maxlength-textarea" class="form-control" maxlength="100" rows="8" placeholder="Input your content here"></textarea> --}}
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
                <div class="form-group row pb-0 pt-0">
                    <p class="col-sm-5 col-form-label">Vacancies Number</p>
                    <div class="col-sm-7 col-form-label pl-0">{{ $detail->id }}</div>
                </div>
                <div class="form-group row pb-0 pt-0">
                    <p class="col-sm-5 col-form-label">Status</p>
                    <div class="col-sm-7 col-form-label pl-0">Saved</div>
                </div>
                <div class="form-group row pb-0 pt-0">
                    <p class="col-sm-5 col-form-label">Visibility</p>
                    <div class="col-sm-7 col-form-label custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" {{ ($detail->visibility == '1' ? 'checked' : '') }}>
                        <label class="custom-control-label" for="customSwitch1">{{ ($detail->visibility == '1' ? 'Public' : 'Draft') }}</label>
                    </div>
                </div>

                <div class="form-group row pb-0 pt-3">
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-block btn-primary" id="submitCareer">
                            Save
                        </button>
                    </div>
                    <div class="col-sm-6">
                        <a type="button" target="_blank" href="{{ route("site.career.detail", $detail->id) }}" class="btn btn-block btn-outline-primary btn-icon-text">
                            <i class="btn-icon-prepend" data-feather="eye"></i>
                            Preview
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <button type="button" class="btn btn-block btn-outline-danger mt-3 btn-icon-text" onclick="showSwal('deleteCareer', this)" data-id="{{ $detail->id }}" data-url="{{ route("career.destroy") }}">
            <i class="btn-icon-prepend" data-feather="trash"></i>
            Delete
        </button>
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
    <script src="{{ asset('admins/assets/js/page/careers/edit.js') }}"></script>
    <script src="{{ asset('admins/assets/js/page/careers/edit.validation.js') }}"></script>
@endsection

