@extends('site.layouts.app')

@section('title')
    Contact
@endsection

@section('content')
    <header class="b-dark-blue">

        <!-- partial: Header -->
        @include("site.layouts.partials.header")
        <!-- partial -->

        <div class="header-main container pt-100 p-900-40 text-center">
            <P class="c-white fs-18 l-height-24">
                Let's work together
            </P>
            <h1 class="fs-64 c-white w-100 w-md-75 fw-900 l-height-75 l-spacing-2 text-uppercase fs-500-32 mb-0">
                CONTACT US
            </h1>
        </div>
        <div class="container m-auto row d-flex justify-content-around pt-100">
            <div class="content-contact col-md-4 text-center">
                <div class="rounded-circle b-green-5 m-auto mb-3 d-flex align-items-center justify-content-center">
                    <img src="{{ asset("site/assets/icon/location.png") }}" alt="" class="contact-icon">
                </div>
                <h4 class="fw-900 fs-24 mb-2 c-orange l-spacing-2 mt-3">ADDRESS</h4>
                <P class="fw-400 fs-18 c-white w-75 m-auto">l. H. Jian No.21, RT.8/RW.7, Cipete Utara, Kec. Kby. Baru, Kota Jakarta Selatan</P>
            </div>
            <div class="content-contact col-md-4 text-center mt-3 mt-md-0">
                <div class="rounded-circle b-green-5 m-auto mb-3 d-flex align-items-center justify-content-center">
                    <img src="{{ asset("site/assets/icon/phone-contact.png") }}" alt="" class="contact-icon">
                </div>
                <h4 class="fw-900 fs-24 mb-2 c-orange l-spacing-2 mt-3">PHONE</h4>
                <P class="fw-400 fs-18 c-white">+62 2765 4388</P>
            </div>
            <div class="content-contact col-md-4 text-center mt-3 mt-md-0z">
                <div class="rounded-circle b-green-5 m-auto mb-3 d-flex align-items-center justify-content-center">
                    <img src="{{ asset("site/assets/icon/mail-contact.png") }}" alt="" class="contact-icon">
                </div>
                <h4 class="fw-900 fs-24 mb-2 c-orange l-spacing-2 mt-3">EMAIL</h4>
                <P class="fw-400 fs-18 c-white">sales@infia.co</P>
            </div>
        </div>
    </header>

    <main class="b-dark-blue main-contact pt-100-200">
        <div class="container row m-auto">
            <div class="col-md-7 col-12 map order-2 order-md-1 mt-5 mt-md-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.9959763310917!2d106.80225421431368!3d-6.26425809546586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f158418dde5d%3A0x83c9e8c685ac7c88!2sInfia%20Mega%20Semesta!5e0!3m2!1sid!2sid!4v1606728596060!5m2!1sid!2sid" class="w-100 h-100" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-md-5 col-12 contact b-white ptb-50 order-1 order-md-2">
                <form class="b-white container">
                    <h3 class="fw-700 fs-24 c-dark-blue mb-4">Say Hi to us</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama" require>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Email" require>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="comment" placeholder="Type here..." require></textarea>
                    </div>
                    <button class="col-12 fw-700 fs-14 l-spacing-2 c-white b-dark-blue btn-send border-style">
                        SEND
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection

