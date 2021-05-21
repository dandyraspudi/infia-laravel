@extends('site.layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <header class="b-dark-blue">

    <!-- partial: Header -->
    @include("site.layouts.partials.header")
    <!-- partial -->

        <div class="header-main container pt-100-200 p-900-40 over-y">
            <div class="head-left z-99">
                <h1 class="fs-64 c-white w-100 w-md-75 fw-900 l-height-75 l-spacing-2 text-uppercase fs-500-32">
                    We Provide <br>Creative Solution <br>From Scratch To <br>Digital Reality, <br>Only For You
                </h1>
                <a href="#" class="fs-18 btn-discover c-white fw-700 l-height-20 text-decoration-none">
                    DISCOVER
                </a>
            </div>
            <div class="head-right w-75 h-100 r-t-b-0 position-absolute" id="partikel">
        </div>
    </header>

    <main class="b-green d-block d-lg-flex row main-top">
        <div class="main-top-left col">
            <img src="{{ asset("site/assets/image-main.png") }}" alt="content image" class="w-100 h-100 image-main">
        </div>
        <div class="main-top-right col">
            <div class="content-group w-75 m-auto">
                <h4 class="c-white fs-24 fs-500-18 fw-700 l-spacing-2 mt-5">
                    What we do
                </h4>
                <h1 class="c-white fs-48 fs-500-24 fw-900 mt-3 lh-500-28">
                    Design And
                    Plan Your
                    Business
                    Growth Steps
                </h1>
                <p class="c-white fs-18 fs-500-16 fw-400 l-spacing-2 mt-3 mb-5">
                    Use our staff and our expertise to design and plan your business growth strategy. Evolo team is eager to advise you on the best opportunities that you should look into
                </p>
                <a href="#" class="btn-service c-white fs-18 fw-700 mt-4 text-decoration-none">
                    ALL SERVICE
                </a>
            </div>
            <div class="arrow text-right pb-5 mb-lg-5 mr-5">
                <button class="btn-arrow">
                    <img src="{{ asset("site/assets/icon/arrow-right-1.png") }}" alt="">
                </button>
                <button class="btn-arrow">
                    <img src="{{ asset("site/assets/icon/arrow-right.png") }}" alt="">
                </button>
            </div>
        </div>
    </main>

    <main class="main-bottom b-dark-blue">
        <div class="main-bottom-head col-12 d-flex container justify-content-sm-around justify-content-start">
            <h3 class="c-white fw-900 fs-48 fs-500-24 l-spacing-2 l-height-56 lh-500-28">
                OUR <br>
                WORKS
            </h3>

            <a href="{{ route("site.portfolio") }}" class="btn-work c-white fs-18 fw-700 mt-4 align-self-center text-decoration-none d-none d-sm-block">
                SEE ALL WORK
            </a>
        </div>

        <div class="carousel-works d-flex mt-50 gliderWorks">
            <div class="main-image-carousel position-relative items">
                <img src="{{ asset("site/assets/image-slide-1.png") }}" alt="content image" class="image-content-carousel w-100">
                <div class="card-img-overlay">
                    <img src="{{ asset("site/assets/slider-line-bg-1.png") }}" alt="content image" class="bg-main bg-main-right position-absolute">
                    <img src="{{ asset("site/assets/slider-bg-1.png") }}" alt="content image" class="bg-main bg-main-right-bottom position-absolute">
                </div>
                <div class="card-text mt-4">
                    <h3 class="c-white fs-24 fs-500-18 fw-700 l-spacing-2">IMMO Capital</h3>
                    <p class="c-white fs-500-16">Improving customer experience for a next-gen real estate platform.</p>
                </div>
            </div>
            <div class="main-image-carousel position-relative items">
                <img src="{{ asset("site/assets/image-slide-1.png") }}" alt="content image" class="image-content-carousel w-100">
                <div class="card-img-overlay">
                    <img src="{{ asset("site/assets/slider-line-bg-2.png") }}" alt="" class="bg-main bg-main-left position-absolute">
                    <img src="{{ asset("site/assets/slider-bg-2.png") }}" alt="" class="bg-main bg-main-left-bottom position-absolute">
                </div>
                <div class="card-text mt-4">
                    <h3 class="c-white fs-24 fw-700 l-spacing-2 fs-500-18">Otsuka Pharmaceutical</h3>
                    <p class="c-white fs-500-18">Improving customer experience for a next-gen real estate platform.</p>
                </div>
            </div>
            <div class="main-image-carousel position-relative items">
                <img src="{{ asset("site/assets/image-slide-1.png") }}" alt="content image" class="image-content-carousel w-100">
                <div class="card-img-overlay">
                    <img src="{{ asset("site/assets/slider-line-bg-2.png") }}" alt="" class="bg-main bg-main-left position-absolute">
                    <img src="{{ asset("site/assets/slider-bg-2.png") }}" alt="" class="bg-main bg-main-left-bottom position-absolute">
                </div>
                <div class="card-text mt-4">
                    <h3 class="c-white fs-24 fw-700 l-spacing-2 fs-500-18">Otsuka Pharmaceutical</h3>
                    <p class="c-white fs-500-18">Improving customer experience for a next-gen real estate platform.</p>
                </div>
            </div>
            <div class="main-image-carousel position-relative items">
                <img src="{{ asset("site/assets/image-slide-1.png") }}" alt="content image" class="image-content-carousel w-100">
                <div class="card-img-overlay">
                    <img src="{{ asset("site/assets/slider-line-bg-2.png") }}" alt="" class="bg-main bg-main-left position-absolute">
                    <img src="{{ asset("site/assets/slider-bg-2.png") }}" alt="" class="bg-main bg-main-left-bottom position-absolute">
                </div>
                <div class="card-text mt-4">
                    <h3 class="c-white fs-24 fw-700 l-spacing-2 fs-500-18">Otsuka Pharmaceutical</h3>
                    <p class="c-white fs-500-18">Improving customer experience for a next-gen real estate platform.</p>
                </div>
            </div>
            <div class="main-image-carousel position-relative items">
                <img src="{{ asset("site/assets/image-slide-1.png") }}" alt="content image" class="image-content-carousel w-100">
                <div class="card-img-overlay">
                    <img src="{{ asset("site/assets/slider-line-bg-2.png") }}" alt="" class="bg-main bg-main-left position-absolute">
                    <img src="{{ asset("site/assets/slider-bg-2.png") }}" alt="" class="bg-main bg-main-left-bottom position-absolute">
                </div>
                <div class="card-text mt-4">
                    <h3 class="c-white fs-24 fw-700 l-spacing-2 fs-500-18">Otsuka Pharmaceutical</h3>
                    <p class="c-white fs-500-18">Improving customer experience for a next-gen real estate platform.</p>
                </div>
            </div>
        </div>
        <div class="dots mt-0 mb-5"></div>

        <div class="col-12 d-flex container justify-content-start mb-5">
            <a href="#" class="btn-work c-white fs-18 fw-700 mt-3 align-self-center text-decoration-none d-block d-sm-none">
                SEE ALL WORK
            </a>
        </div>

        <div class="client container">
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
