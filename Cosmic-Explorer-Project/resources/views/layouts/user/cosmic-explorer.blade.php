<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    @yield('title')

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('user') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('user') }}/css/fontawesome.css">
    <link rel="stylesheet" href="{{ asset('user') }}/css/template-cosmic-explorer.css">
    <link rel="stylesheet" href="{{ asset('user') }}/css/owl.css">
    <link rel="stylesheet" href="{{ asset('user') }}/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!--
-->
</head>

<body>

    <!-- ***** Preloader ***** -->
    <section id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </section>

    <!-- ***** Preloader End ***** -->

    <!-- ***** Change Section ***** -->
    @yield('section-change')
    <!-- ***** Change Section End***** -->

    <!-- ***** Footer ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © 2022 <a href="#">Liberty</a> NFT Marketplace Co., Ltd. All rights reserved.
                        &nbsp;&nbsp;
                        Designed by <a title="HTML CSS Templates" rel="sponsored" href="https://templatemo.com"
                            target="_blank">TemplateMo</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- ***** Footer End ***** -->

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('user') }}/jquery/jquery.min.js"></script>
    <script src="{{ asset('user') }}/bootstrap/js/bootstrap.min.js"></script>

    <script src="{{ asset('user') }}/js/isotope.min.js"></script>
    <script src="{{ asset('user') }}/js/owl-carousel.js"></script>

    <script src="{{ asset('user') }}/js/tabs.js"></script>
    <script src="{{ asset('user') }}/js/popup.js"></script>
    <script src="{{ asset('user') }}/js/custom.js"></script>
</body>

</html>
