@extends('site.layouts.app')

@section('title')
    Careers Detail
@endsection

@section('content')
    <header class="b-dark-blue">

        <!-- partial: Header -->
        @include("site.layouts.partials.header")
        <!-- partial -->

        <div class="header-main container pt-100-200 p-900-40">
            <div class="head-left z-99">
                <h1 class="fs-64 c-white w-100 w-md-75 fw-900 l-height-75 l-spacing-2 text-uppercase fs-500-32 mb-2">
                    {{ $detail->title }}
                </h1>
                <P class="c-white fs-18 l-height-24">
                    {{ $detail->city }}, {{ $detail->country }}
                </P>
            </div>
            <div class="head-right w-75 h-100 r-t-b-0 position-absolute" id="partikel">
        </div>

    </header>


    <main>
        <div class="row container m-auto pt-100 pb-100">
            <div class="col-md-7">
                {!! $detail->content ?? '' !!}
            </div>

            <div class="col-md-5">
                <form class="b-green p-4 form-group mb-0" id="careerForm" method="post" action="{{ route('site.career.post') }}" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('failed'))
                        <div class="alert alert-danger">
                            {{ session('failed') }}
                        </div>
                    @endif

{{--                    {{ dd(old('link')) }}--}}

                    <h4 class="c-white mb-5 mt-3">Submit Your Application</h4>

                    <input type="hidden" name="career_id" id="careerId" value="{{ $detail->id }}">
                    <div class="form-group">
                        <label for="name" class="c-white mb-0 fs-14">Name <span class="c-orange">*</span></label>
                        <input type="text" name="name" class="form-control placeholder require" id="name" placeholder="Name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="c-white mb-0 fs-14">Email <span class="c-orange">*</span></label>
                        <input type="email" name="email" class="form-control placeholder" id="email" placeholder="Email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="c-white mb-0 fs-14">Phone Number (WA) <span class="c-orange">*</span></label>
                        <input type="number" name="phone" class="form-control placeholder" id="phone" placeholder="Phone Number (WA)" value="{{ old('phone') }}" required>
                    </div>
                    <div class="form-group mb-5">
                        <label for="company" class="c-white mb-0 fs-14">Current Company</label>
                        <input type="text" name="company" class="form-control placeholder" id="company" value="{{ old('company') }}" placeholder="Current Company">
                    </div>

                    <!-- portofolio link -->
                    <h4 class="c-white mb-0">Portofolio Links</h4>
                    <p class="c-white mb-3">You can add up to 3 links</p>
                    <div class="form-group">
                        <label for="porto-link" class="c-white mb-0 fs-14">Input Link</label>
                        <input type="text" name="link[]" class="form-control placeholder" id="porto-link" value="{{ old('link')[0]??'' }}" placeholder="Portofolio Link">
                    </div>
                    <div class="form-group">
                        <label for=porto-link" class="c-white mb-0 fs-14">Input Link</label>
                        <input type="text" name="link[]" class="form-control placeholder" id="porto-link" value="{{ old('link')[1]??'' }}" placeholder="Portofolio Link">
                    </div>
                    <div class="form-group">
                        <label for="porto-link" class="c-white mb-0 fs-14">Input Link</label>
                        <input type="text" name="link[]" class="form-control placeholder" id="porto-link" value="{{ old('link')[2]??'' }}" placeholder="Portofolio Link">
                    </div>

                    <!-- upload resume -->
                    <div class="form-group mt-5 mb-5 input-file-row d-flex align-items-center b-white p-3">
                        <div class="m-auto txt-input-group">
                            <img src="{{ asset("site/assets/icon/file.png") }}" alt="" class="file-icon">
                            <span class="c-black fs-18 text-uppercase txt-upload">Upload your Resume/CV</span>
                        </div>
                        <input type="file" name="file_cv" class="w-100 bg-light input-file" id="exampleFormControlFile1" placeholder="Upload your Resume/CV"/>
                    </div>

                    <!-- cover letter -->
                    <div class="form-group mt-5 mb-5">
                        <label for="exampleFormControlTextarea1" class="c-white mb-0 fs-14">Additional Information</label>
                        <textarea class="form-control placeholder" name="letter" id="exampleFormControlTextarea1" rows="6" placeholder="Cover Letter or something you want to Share">{{ old('letter') }}</textarea>
                    </div>

                </form>
                <button type="submit" id="careerApply" class="b-dark-blue c-white l-spacing-195 fw-700 fs-24 btn-apply outline-none">
                    APPLY
                </button>
            </div>
        </div>
    </main>


@endsection

@section('customJS')
    <script src="{{ asset('site/script/page/careers/create.js') }}"></script>
@endsection
