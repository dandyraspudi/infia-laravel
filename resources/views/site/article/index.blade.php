@extends('site.layouts.app')

@section('title')
    Blog
@endsection

@section('content')
    <header class="b-dark-blue">

        <!-- partial: Header -->
        @include("site.layouts.partials.header")
        <!-- partial -->

        <div class="header-main container pt-100-200 p-900-40">
            <div class="head-left z-99">
                <h1 class="fs-64 c-white w-100 w-md-75 fw-900 l-height-75 l-spacing-2 text-uppercase fs-500-32 mb-0">
                    BLOG
                </h1>
                <P class="c-white fs-18 l-height-24">
                    Read our blog to get to know us more
                </P>
                <div class="d-flex search mt-5">
                    <input type="text" class="form-control" id="inputPassword" placeholder="Search blog here...">
                    <button class="btn-search b-green c-white border-style fs-24 fw-700 l-spacing-1">SEARCH</button>
                </div>
            </div>
            <div class="head-right w-75 h-100 r-t-b-0 position-absolute" id="partikel">
        </div>
    </header>

    <main class="pt-100 pb-100">
        <div class="row m-auto container">


            @foreach ($data as $item)

                <div class="card-blog col-md-4 col-12 mb-5">
                    <img class="card-img-top shadow" src="{{ asset("storage/" . $item['cover']) }}" alt="blog-image br-10">
                    <div class="mt-2 ">
                        <a href="{{ route("site.article.detail", $item['slug']) }}" class="card-text fs-18 fw-900 text-uppercase c-black">{{ $item['title'] }}</a>
                        <div class="mt-2 d-flex g-5">
                            <img src="{{ ($item['author']['avatar']) ? asset("storage/" . $item['author']['avatar']) : (new \Laravolt\Avatar\Avatar)->create($item['author']['name'])->toBase64() }}g" alt="" class="image-writer rounded-circle">
                            <p class="fs-14 fw-700 text-dark">
                                {{ $item['author']['name'] }}
                            </p>
                            <span class="c-green">
                                .
                            </span>
                            <p class="fs-14 text-muted">
                                @php
                                    $dayDiff = \Carbon\Carbon::now()->diffForHumans(\Carbon\Carbon::parse($item['created_at']), \Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW)
                                    /*$dayDiff = \Carbon\Carbon::parse($item['updated_at'])->diffForHumans(\Carbon\Carbon::now())*/
                                @endphp
                                {{ $dayDiff }}
                            </p>
                        </div>
                    </div>
                </div>

            @endforeach


        </div>

        <div class="pagination mt-100 mb-100 container m-auto">
            <button class="arrow-blog border-style arrow-blog-left b-green rounded-circle d-flex justify-content-center align-items-center m-auto" disabled>
                <img src="{{ asset("site/assets/icon/arrow-left-blog.png") }}" alt="" class="arrow-blog-icon">
            </button>
            <div class="page align-items-center d-flex">
                <p class="fs-18 fw-900 c-light-grey">1</p>
                <p class="fs-18 fw-900 c-black">2</p>
                <p class="fs-18 fw-900 c-black">3</p>
                <p class="fs-18 fw-900 c-black">4</p>
            </div>
            <button class="arrow-blog border-style arrow-blog-right b-green rounded-circle d-flex justify-content-center align-items-center m-auto">
                <img src="{{ asset("site/assets/icon/arrow-right-blog.png") }}" alt="" class="arrow-blog-icon">
            </button>
        </div>

    </main>
@endsection

