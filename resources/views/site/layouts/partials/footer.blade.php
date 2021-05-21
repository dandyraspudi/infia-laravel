<footer class="container">

    <!-- yield: topFooter -->
    @yield('topFooter')
    <!-- yield -->

    <div class="bottom-footer col-12 d-block d-md-flex">
        <div class="col-md-6 col-12 mb-4 mb-md-0">
            <img src="{{ asset("site/assets/logo.png") }}" alt="" class="logo">
            <p class="uppercase mt-3 c-light-grey fs-500-14 ">Copyright © 2021 Infia - All rights reserved</p>
        </div>
        <div class="col-md-6 col-12 d-block d-md-flex row">
            <div class="col-md-6 col d-flex justify-content-start">
                <img src="{{ asset("site/assets/icon/phone.png") }}" alt="phone" class="icon align-self-start mr-2">
                <div class="footer-nav">
                    <h5 class="c-dark-blue fw-700">PHONE</h5>
                    <p class="c-green">+62 2765 4388</p>
                </div>
            </div>
            <div class="col-md-6 col d-flex">
                <img src="{{ asset("site/assets/icon/mail.png") }}" alt="mail" class="icon align-self-start mr-2">
                <div class="footer-nav">
                    <h5 class="c-dark-blue fw-700">EMAIL</h5>
                    <p class="c-green">SALES@INFIA.CO.ID</p>
                </div>
            </div>
            <div class="col-md-12 d-flex">
                <img src="{{ asset("site/assets/icon/map-pin.png") }}" alt="map-pin" class="icon align-self-start mr-2">
                <div class="footer-nav">
                    <h5 class="c-dark-blue fw-700">OFFICE</h5>
                    <p class="c-green">l. H. Jian No.21, RT.8/RW.7, Cipete Utara,
                        Kec. Kby. Baru, Kota Jakarta Selatan,
                        DKI Jakarta 12150
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
