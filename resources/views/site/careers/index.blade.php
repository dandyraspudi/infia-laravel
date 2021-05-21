@extends('site.layouts.app')

@section('title')
    Careers
@endsection

@section('content')
    <header class="b-dark-blue">

    <!-- partial: Header -->
    @include("site.layouts.partials.header")
    <!-- partial -->

        <div class="header-main container pt-100-200 p-900-40">
            <div class="head-left z-99">
                <h1 class="fs-64 c-white w-100 w-md-75 fw-900 l-height-75 l-spacing-2 text-uppercase fs-500-32 mb-0">
                    CAREER
                </h1>
                <P class="c-white fs-18 fs-500-14 mt-2 mt-md-0 l-height-24">
                    Join our team and create something great together
                </P>
            </div>
            <div class="head-right w-75 h-100 r-t-b-0 position-absolute" id="partikel">
        </div>
    </header>

    <main class="pt-100 pb-150">
        <div class="row m-auto card-career-group d-flex m-auto">

            @foreach ($careers as $item)
                <div class="card card-career mb-3 col-md-4" style="max-width: 18rem;">
                    <div class="card-body text-dark ptb-40 ml-4">
                        <h5 class="fs-36 text-uppercase l-spacing-2 fw-900 l-height-130 mb-5 c-black">{{ $item->title }}</h5>
                        <p class="fs-18 l-height-24 c-black">{{ ucfirst($item->city) }}, {{ ucfirst($item->country) }}</p>
                    </div>
                    <a href="{{ route("site.career.detail", $item->id) }}" class="btn-detail position-absolute text-decoration-none text-center b-green c-white w-100 pt-3 pb-3">See Detail</a>
                </div>
            @endforeach

        </div>
    </main>
@endsection
