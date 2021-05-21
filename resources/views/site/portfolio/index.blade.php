@extends('site.layouts.app')

@section('title')
    Portfolio
@endsection

@section('content')
    <header class="b-dark-blue">

    <!-- partial: Header -->
    @include("site.layouts.partials.header")
    <!-- partial -->

        <div class="header-main container pt-100 pb-100 p-900-40">
            <h1 class="fs-64 c-white w-100 w-md-75 fw-900 l-height-75 l-spacing-2 text-uppercase fs-500-32 mb-0 z-99">
                OUR PORTFOLIO
            </h1>
            <div class="head-right w-75 h-100 r-t-b-0 position-absolute" id="partikel">
        </div>
    </header>

    <main class="b-dark-blue">
        <div class="row container m-auto">
            <div class="col-md-4 h-100">
                <img src="{{ asset("site/assets/image-slide-1.png") }}" alt="" class="w-100 h-100">
                <div class="content-portfolio h-100 w-100 mt-3 pt-0">
                    <p class="card-text c-white fs-18 fw-700 text-uppercase l-spacing-2">IMMO Capital</p>
                    <p class="fs-16 c-white">Improving customer experience for a next-gen real estate platform.</p>
                </div>
            </div>
            <div class="col-md-4 h-100">
                <img src="{{ asset("site/assets/image-slide-1.png") }}" alt="" class="w-100 h-100">
                <div class="content-portfolio h-100 w-100 mt-3 pt-0">
                    <p class="card-text c-white fs-18 fw-700 text-uppercase l-spacing-2">IMMO Capital</p>
                    <p class="fs-16 c-white">Improving customer experience for a next-gen real estate platform.</p>
                </div>
            </div>
            <div class="col-md-4 h-100">
                <img src="{{ asset("site/assets/image-slide-1.png") }}" alt="" class="w-100 h-100">
                <div class="content-portfolio h-100 w-100 mt-3 pt-0">
                    <p class="card-text c-white fs-18 fw-700 text-uppercase l-spacing-2">IMMO Capital</p>
                    <p class="fs-16 c-white">Improving customer experience for a next-gen real estate platform.</p>
                </div>
            </div>
            <div class="col-md-4 h-100">
                <img src="{{ asset("site/assets/image-slide-1.png") }}" alt="" class="w-100 h-100">
                <div class="content-portfolio h-100 w-100 mt-3 pt-0">
                    <p class="card-text c-white fs-18 fw-700 text-uppercase l-spacing-2">IMMO Capital</p>
                    <p class="fs-16 c-white">Improving customer experience for a next-gen real estate platform.</p>
                </div>
            </div>
            <div class="col-md-4 h-100">
                <img src="{{ asset("site/assets/image-slide-1.png") }}" alt="" class="w-100 h-100">
                <div class="content-portfolio h-100 w-100 mt-3 pt-0">
                    <p class="card-text c-white fs-18 fw-700 text-uppercase l-spacing-2">IMMO Capital</p>
                    <p class="fs-16 c-white">Improving customer experience for a next-gen real estate platform.</p>
                </div>
            </div>
            <div class="col-md-4 h-100">
                <img src="{{ asset("site/assets/image-slide-1.png") }}" alt="" class="w-100 h-100">
                <div class="content-portfolio h-100 w-100 mt-3 pt-0">
                    <p class="card-text c-white fs-18 fw-700 text-uppercase l-spacing-2">IMMO Capital</p>
                    <p class="fs-16 c-white">Improving customer experience for a next-gen real estate platform.</p>
                </div>
            </div>
            <div class="col-md-4 h-100">
                <img src="{{ asset("site/assets/image-slide-1.png") }}" alt="" class="w-100 h-100">
                <div class="content-portfolio h-100 w-100 mt-3 pt-0">
                    <p class="card-text c-white fs-18 fw-700 text-uppercase l-spacing-2">IMMO Capital</p>
                    <p class="fs-16 c-white">Improving customer experience for a next-gen real estate platform.</p>
                </div>
            </div>
        </div>

        <div class="client container pb-100">
            <h5 class="fs-18 fw-400 text-center l-spacing-2 c-white">SOME OF OUR CLIENT</h5>
            <div class="container d-block d-md-flex client-logo justify-content-center pt-50 pb-5 text-center glider row">
                <div class="image">
                    <img src="{{ asset("site/assets/client-1.png") }}" alt="" class="">
                </div>
                <div class="image">
                    <img src="{{ asset("site/assets/client-2.png") }}" alt="" class="">
                </div>
                <div class="image">
                    <img src="{{ asset("site/assets/client-3.png") }}" alt="" class="">
                </div>
                <div class="image">
                    <img src="{{ asset("site/assets/client-4.png") }}" alt="" class="">
                </div>
                <div class="image">
                    <img src="{{ asset("site/assets/client-5.png") }}" alt="" class="">
                </div>
                <div class="image">
                    <img src="{{ asset("site/assets/client-3.png") }}" alt="" class="">
                </div>
                <div class="image">
                    <img src="{{ asset("site/assets/client-4.png") }}" alt="" class="">
                </div>
                <div class="image">
                    <img src="{{ asset("site/assets/client-5.png") }}" alt="" class="">
                </div>
                <div class="image">
                    <img src="{{ asset("site/assets/client-1.png") }}" alt="" class="">
                </div>
                <div class="image">
                    <img src="{{ asset("site/assets/client-2.png") }}" alt="" class="">
                </div>
                <div class="image">
                    <img src="{{ asset("site/assets/client-3.png") }}" alt="" class="">
                </div>
            </div>
            <div class="dots pb-100"></div>
        </div>
    </main>
@endsection

@section('topFooter')
    @include('site.layouts.partials.topFooter')
@endsection
