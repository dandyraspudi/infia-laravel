@extends('site.layouts.app')

@section('title')
    Blog Detail
@endsection

@section('content')
    <header class="b-dark-blue">

        <!-- partial: Header -->
        @include("site.layouts.partials.header")
        <!-- partial -->

        <div class="card card-blog-detail text-white rounded-0">
            <img class="card-img" src="{{ asset("storage/" . $data->cover) }}" alt="Card image">
            <div class="header-main-blog-detail card-img-overlay header-main pt-100 pb-100 p-900-40 rounded-0">
                <div class="m-auto container row">
                    <div class="col-md-8">
                        <p class="fs-48 c-white w-100 w-md-75 w-100 fw-900 l-spacing-2 text-uppercase fs-500-18 ls-500-0 mb-50 mb-2 opacity-1 text-left">
                            {{ $data->title }}
                        </p>
                        <P class="c-white fs-18 fs-500-16 l-height-24 w-md-75 w-100 opacity-1 d-md-block d-none">
                            {{ $data->summary }}
                        </P>
                    </div>
                    <div class="col-md-4 d-flex align-self-end writer-detail mt-md-0 mt-3 justify-content-end">
                        <div class="name-tag mr-3">
                            <h4 class="fs-24 fs-500-18 c-white fw-700 opacity-1">{{ $author->name }}</h4>
                            <p class="time fs-18 fs-500-16 c-white text-right opacity-1">2 min read</p>
                        </div>
                        <div class="image-writer">
                            <img src="{{ ($author->avatar) ? asset("storage/" . $author->avatar) : (new \Laravolt\Avatar\Avatar)->create($author->name)->toBase64() }}" alt="avatar" class="image-writer-detail rounded-circle opacity-1">
                        </div>
                    </div>
                    <hr class="line-blog-detail b-white container mt-5 d-md-block d-none">
                </div>
            </div>
        </div>
    </header>

    <main class="pt-100 pb-100 blog">
        <div class="container row m-auto pt-50">
            <div class="col-md-7">

                {!! $data->content !!}

                <hr class="line-blog-detail-content b-white container mt-5 mb-3">

                <div class="writer-detail row m-auto">
                    <div class="writer d-flex col-md-8 col-12">
                        <div class="image-writer rounded-circle mr-3">
                            <img src="{{ ($author->avatar) ? asset("storage/" . $author->avatar) : (new \Laravolt\Avatar\Avatar)->create($author->name)->toBase64() }}" alt="" class="image-writer-detail rounded-circle">
                        </div>
                        <div class="name-tag">
                            <h4 class="fs-24 fs-500-18 c-black fw-700">{{ $author->name }}</h4>
                            <p class="time fs-18 c-black text-left">2 min read</p>
                        </div>
                    </div>
                    <div class="soc-med col-md-4 d-flex justify-content-md-end justify-content-center col-12">
                        <a href="{{ $share['facebook'] }}" target="_blank" class="soc-med-content rounded-circle d-flex justify-content-center align-items-center">
                            <img src="{{ asset("site/assets/icon/fb.png") }}" alt="fb" class="fb">
                        </a>
                        <a href="{{ $share['twitter'] }}" target="_blank" class="soc-med-content rounded-circle d-flex justify-content-center align-items-center">
                            <img src="{{ asset("site/assets/icon/twitter.png") }}" alt="twitter" class="twitter">
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mt-5 mt-md-0">
                <h3 class="fs-24 fw-900 l-spacing-2 c-black">POPULAR ARTICLE</h3>

                @foreach ($popular as $item)
                    <div class="col-12 artikel-populer mt-4">
                        <div class="row artikel-row mb-4">
                            <div class="card-artikel mb-md-3 mb-0 d-flex">
                                <img src="{{ asset("storage/" . $item['cover']) }}" alt="Cover" class="ml-3">
                                <a href="{{ route("site.article.detail", $item['slug']) }}" class="fs-18 fs-500-16 fw-700 ml-2 text-content-detail">
                                    {{ $item['title'] }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="container m-auto pt-100 pb-100">
            <h3 class="text-center fs-36 fw-900 l-spacing-2">KEEP READING</h3>
            <div class="col-12 row mt-50">

                @foreach ($recent as $item)

                    <div class="card-blog col-md-4 col-12 mb-5">
                        <img class="card-img-top shadow" src="{{ asset("storage/" . $item['cover']) }}" alt="blog-image br-10">
                        <div class="mt-2 ">
                            <a href="{{ route("site.article.detail", $item['slug']) }}" class="card-text fs-18 fw-900 text-uppercase c-black">{{ $item['title'] }}</a>
                            <div class="mt-2 d-flex g-5">
                                <img src="{{ ($item['author']['avatar']) ? asset("storage/" . $item['author']['avatar']) : (new \Laravolt\Avatar\Avatar)->create($item['author']['name'])->toBase64() }}" alt="" class="image-writer rounded-circle">
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
        </div>

    </main>
@endsection

