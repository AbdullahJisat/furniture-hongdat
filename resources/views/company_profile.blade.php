<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Hong Dat Technical Works LLC | Company Profile</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/mile-stone.css">
    <style>
        .hover13 figure:hover img {
            opacity: 1;
            -webkit-animation: flash 1.5s;
            animation: flash 1.5s;
        }

        @-webkit-keyframes flash {
            0% {
                opacity: .4;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes flash {
            0% {
                opacity: .4;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
</head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-TVYTYM0REQ"></script>
<script>
    window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-TVYTYM0REQ');
</script>

<body>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 d-flex justify-content-between">
                        <!-- Logo Area -->
                        <div class="logo">
                            <a href="{{URL::to('/').'/'}}"><img src="assets/img/core-img/logo.png" alt=""></a>
                        </div>

                        <!-- Top Contact Info -->
                        <?php if (isset($response[0]) && !empty($response[0])) { ?>
                        <div class="top-contact-info d-flex align-items-center">
                            <a href="#" data-toggle="tooltip" data-placement="bottom"
                                title="{{$response[0]['showroom_address']}}"><img
                                    src="assets/img/core-img/placeholder.png" alt="">
                                <span>{{$response[0]['showroom_address']}}</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom"
                                title="{{$response[0]['email']}}"><img src="assets/img/core-img/message.png" alt="">
                                <span>{{$response[0]['email']}}</span></a>
                        </div>
                        <?php } else { ?>
                        <div class="top-contact-info d-flex align-items-center">
                            <a href="#" data-toggle="tooltip" data-placement="bottom"
                                title="Shop08, F03, China cluster, international city Dubai, United Arab Emirates"><img
                                    src="assets/img/core-img/placeholder.png" alt=""> <span>Shop08, F03, China cluster,
                                    international city Dubai, United Arab Emirates</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom"
                                title="sales.hongdat@gmail.com"><img src="assets/img/core-img/message.png" alt="">
                                <span>sales.hongdat@gmail.com</span></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="credit-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="creditNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul class='desktop-menu'>
                                    <li><a href="{{URL::to('/').'/'}}">HOME</a></li>


                                    <li><a href="company-profile">COMPANY PROFILE</a></li>
                                    <li><a href="product">PROJECT</a>
                                        <?php if (isset($response[1]) && !empty($response[1])) { ?>

                                        <div class="megamenu">
                                            <ul class="single-mega cn-col-5">
                                                <p class='menu-p'>OUR PROJECTS</p>
                                                <p class='menu-sub-p' style=''>Browse our latest products here</p>
                                            </ul>
                                            <ul class="single-mega cn-col-8">


                                                <?php
                                                        $i = 1;
                                                        foreach ($response[1] as $m_category) {
                                                            ?>
                                                <ul class="single-mega cn-col-5">
                                                    <li>
                                                        <a href="product">


                                                            <div class="hover11 column img">
                                                                <figure><img
                                                                        src="{{$api_url}}{{$m_category['image_path']}}"
                                                                        alt="" width="168" height="88"></figure>

                                                            </div>
                                                            <div class="p">
                                                                <span>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">
                                                                            {{$m_category['title']}}</font>
                                                                    </font>
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </li>

                                                </ul>
                                                <?php
                                                            $i++;
                                                        }
                                                        ?>

                                            </ul>
                                            <ul class="single-mega cn-col-1">
                                                <p class='menu-more-p'><a href='product'
                                                        style='color: #e83b43;line-height: 15px;'>More Products&nbsp;<i
                                                            class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                                </p>
                                            </ul>
                                        </div>
                                        <?php
                                            }
                                            ?>
                                    </li>

                                    <li><a href="blog">BLOG</a></li>
                                    <li><a href="contact-us">CONTACT US</a></li>
                                </ul>
                                <ul class='mobile-menu'>
                                    <li><a href="{{URL::to('/').'/'}}">HOME</a></li>


                                    <li><a href="company-profile">COMPANY PROFILE</a></li>
                                    <li><a href="product">PROJECT</a></li>

                                    <li><a href="blog">BLOG</a></li>
                                    <li><a href="contact-us">CONTACT US</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Contact -->
                        <?php if (isset($response[0]) && !empty($response[0])) { ?>
                        <div class="contact">
                            <a href="#"><img src="assets/img/core-img/call2.png" alt="">{{$response[0]['mobile']}}</a>
                        </div>
                        <?php } else { ?>
                        <div class="contact">
                            <a href="#"><img src="assets/img/core-img/call2.png" alt=""> +971 556031358</a>
                        </div>
                        <?php } ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay jarallax"
        style="background-image: url(assets/img/bg-img/13.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Company Profile</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{URL::to('/').'/'}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Company Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### About Area Start ###### -->
    <section class="about-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <div class="about-content mb-100">
                        <!-- Section Heading -->
                        <div class="section-heading">

                            <h2>About Our Company</h2>
                        </div>
                        <p class="mb-0"> Hong Dat Technical Works LLC is a rapid growing carpentry solutions provider,
                            it is formed with a pool of well trained and experienced managers, supervisors and
                            carpenters It specialized in residential, commercial and other projects.</p>
                        <p class="mb-0"> It all started from Hong Dat Engineering PTE LTD Established in Year 2000 which
                            specializes in electrical works, then later HD Contractor PTE LTD was established in Year
                            2010 specializes in Structural, Wet trade, Fit out and Main Contracting and other works As
                            the companies expands, Oneness Holding was established and invested in setting up high tech
                            automation carpentry factories in Singapore, Dubai and Auckland.</p>
                        <a href="contact-us" class="btn credit-btn mt-50">CONTACT US</a>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="about-thumbnail mb-100 hover13 column">

                        <div>
                            <figure><img src="assets/img/bg-img/14.jpg" /></figure>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ###### -->

    <div class="desktop-view">
        <!-- ##### Special Feature Area Start ###### -->
        <section class="special-feature-area d-flex flex-wrap">
            <!-- Special Feature Content -->
            <div class="special-feature-content section-padding-50">
                <div class="feature-text">
                    <!-- Section Heading -->
                    <div class="section-heading white mb-50">

                        <h2>OUR MISSION</h2>
                    </div>
                    <h6>To provide best quality works and efficient service to owners and construction firms by
                        deploying the fastest and quality works to meet client requirements.</h6>


                </div>
            </div>
            <!-- Special Feature Thumbnail -->
            <div class="special-feature-thumbnail bg-img jarallax"
                style="background-image: url(assets/img/bg-img/21.png);"></div>
        </section>
        <!-- ##### Special Feature Area End ###### -->

        <!-- ##### Special Feature Area Start ###### -->
        <section class="special-feature-area d-flex flex-wrap">
            <!-- Special Feature Thumbnail -->
            <div class="special-feature-thumbnail bg-img jarallax"
                style="background-image: url(assets/img/bg-img/20.png);"></div>
            <!-- Special Feature Content -->
            <div class="special-feature-content section-padding-50">
                <div class="feature-text">
                    <!-- Section Heading -->
                    <div class="section-heading white mb-50">


                        <h2>OUR VISION</h2>
                    </div>
                    <h6>To provide quality works and on time delivery related for any scale of project from small to
                        large.</h6>
                </div>
            </div>
        </section>
    </div>



    <div class="mobile-view">
        <!-- ##### Special Feature Area Start ###### -->
        <section class="special-feature-area d-flex flex-wrap">
            <!-- Special Feature Content -->
            <div class="special-feature-content section-padding-50">
                <div class="feature-text">
                    <!-- Section Heading -->
                    <div class="section-heading white mb-50">

                        <h2>OUR MISSION</h2>
                    </div>
                    <h6>To provide best quality works and efficient service to owners and construction firms by
                        deploying the fastest and quality works to meet client requirements.</h6>


                </div>
            </div>
            <!-- Special Feature Thumbnail -->
            <div class="special-feature-thumbnail bg-img jarallax"
                style="background-image: url(assets/img/bg-img/21.png);"></div>
        </section>
        <!-- ##### Special Feature Area End ###### -->

        <!-- ##### Special Feature Area Start ###### -->
        <section class="special-feature-area d-flex flex-wrap">
            <!-- Special Feature Thumbnail -->

            <!-- Special Feature Content -->
            <div class="special-feature-content section-padding-50">
                <div class="feature-text">
                    <!-- Section Heading -->
                    <div class="section-heading white mb-50">


                        <h2>OUR VISION</h2>
                    </div>
                    <h6>To provide quality works and on time delivery related for any scale of project from small to
                        large.</h6>
                </div>
            </div>

            <div class="special-feature-thumbnail bg-img jarallax"
                style="background-image: url(assets/img/bg-img/20.png);"></div>
        </section>
    </div>


    <!-- ##### Special Feature Area End ###### -->
    <!-- ##### Call To Action End ###### -->




    <section class="about-area section-padding-100-0">
        <div class="container">
            <div class="timeline">

                <div class="timeline__event  animated fadeInUp delay-7s timeline__event--type1">
                    <div class="timeline__event__icon " style="background-image: url(images/clients/titan.png)">
                        <i class="lni-cake"></i>

                    </div>
                    <div class="timeline__event__date" style="background-color: #d48e5c;">
                        2020
                    </div>
                    <div class="timeline__event__content ">
                        <div class="timeline__event__title" style="color: #d48e5c;">
                            TITAN SMARTTECH PRIVATE LIMITED, SINGAPORE
                        </div>

                    </div>
                </div>
                <div class="timeline__event animated fadeInUp delay-7s timeline__event--type2">
                    <div class="timeline__event__icon" style="background-image: url(images/clients/hd.png)">
                        <i class="lni-burger"></i>

                    </div>
                    <div class="timeline__event__date" style="background-color: #028fd2;">
                        2019
                    </div>
                    <div class="timeline__event__content">
                        <div class="timeline__event__title" style="color: #028fd2;">
                            HD CONTRACTOR LIMITED, NEW ZEALAND
                        </div>

                    </div>
                </div>

                <div class="timeline__event  animated fadeInUp delay-7s timeline__event--type1">
                    <div class="timeline__event__icon " style="background-image: url(images/clients/mirs.png)">
                        <i class="lni-cake"></i>

                    </div>
                    <div class="timeline__event__date" style="background-color: #313131;">
                        2018
                    </div>
                    <div class="timeline__event__content ">
                        <div class="timeline__event__title" style="color: #313131;">
                            MIRS INNOVATE PRIVATE LIMITED, SINGAPORE
                        </div>

                    </div>
                </div>
                <div class="timeline__event animated fadeInUp delay-6s timeline__event--type2">
                    <div class="timeline__event__icon" style="background-image: url(images/clients/joydom.png)">
                        <i class="lni-burger"></i>

                    </div>
                    <div class="timeline__event__date" style="background-color: #ff0101;">
                        2016
                    </div>
                    <div class="timeline__event__content">
                        <div class="timeline__event__title" style="color: #ff0101;">
                            JOYDOM ENGINEERING PRIVATE LIMITED, SINGAPORE
                        </div>

                    </div>
                </div>


                <div class="timeline__event  animated fadeInUp delay-6s timeline__event--type1">
                    <div class="timeline__event__icon " style="background-image: url(images/clients/appzgate.png)">
                        <i class="lni-cake"></i>

                    </div>
                    <div class="timeline__event__date" style="background-color: #60c0ff;">
                        2016
                    </div>
                    <div class="timeline__event__content ">
                        <div class="timeline__event__title" style="color: #60c0ff;">
                            APPZGATE SOLUTION PRIVATE LIMITED, SINGAPORE
                        </div>

                    </div>
                </div>
                <div class="timeline__event animated fadeInUp delay-6s timeline__event--type2">
                    <div class="timeline__event__icon " style="background-image: url(images/clients/cosmos.jpg)">
                        <i class="lni-burger"></i>

                    </div>
                    <div class="timeline__event__date" style="background-color: #BD9102;">
                        2015
                    </div>
                    <div class="timeline__event__content">
                        <div class="timeline__event__title" style="color: #BD9102;">
                            COSMOS DÉCOR PRIVATE LIMITED, SINGAPORE
                        </div>

                    </div>
                </div>

                <div class="timeline__event  animated fadeInUp delay-5s timeline__event--type1">
                    <div class="timeline__event__icon " style="background-image: url(images/clients/albedo.png)">
                        <i class="lni-cake"></i>

                    </div>
                    <div class="timeline__event__date" style="background-color: #013580;">
                        2015
                    </div>
                    <div class="timeline__event__content ">
                        <div class="timeline__event__title" style="color: #013580;">
                            ALBEDO DESIGN PRIVATE LIMITED, SINGAPORE
                        </div>

                    </div>
                </div>
                <div class="timeline__event animated fadeInUp delay-4s timeline__event--type2">
                    <div class="timeline__event__icon" style="background-image: url(images/clients/hd.png)">
                        <i class="lni-burger"></i>

                    </div>
                    <div class="timeline__event__date" style="background-color: #028fd2;">
                        2015
                    </div>
                    <div class="timeline__event__content">
                        <div class="timeline__event__title" style="color: #028fd2;">
                            HD CONTRACTOR PRIVATE LIMITED, SINGAPORE
                        </div>

                    </div>
                </div>
                <div class="timeline__event  animated fadeInUp delay-3s timeline__event--type1">
                    <div class="timeline__event__icon " style="background-image: url(images/clients/oneness.png)">
                        <i class="lni-cake"></i>

                    </div>
                    <div class="timeline__event__date" style="background-color: #35b9ed;">
                        2013
                    </div>
                    <div class="timeline__event__content ">
                        <div class="timeline__event__title" style="color: #35b9ed;">
                            ONENESS HOLDING PRIVATE LIMITED, SINGAPORE
                        </div>

                    </div>
                </div>
                <div class="timeline__event animated fadeInUp delay-2s timeline__event--type2">
                    <div class="timeline__event__icon" style="background-image: url(images/clients/joyway.png)">
                        <i class="lni-burger"></i>

                    </div>
                    <div class="timeline__event__date" style="background-color: #f3740c;">
                        2010
                    </div>
                    <div class="timeline__event__content">
                        <div class="timeline__event__title" style="color: #f3740c;">
                            JOYWAY PRIVATE LIMITED, SINGAPORE
                        </div>

                    </div>
                </div>
                <div class="timeline__event animated fadeInUp delay-1s timeline__event--type3">
                    <div class="timeline__event__icon" style="background-image: url(images/clients/hongdat.png)">
                        <i class="lni-slim"></i>

                    </div>
                    <div class="timeline__event__date" style="background-color: #e23941;">
                        2005
                    </div>
                    <div class="timeline__event__content">
                        <div class="timeline__event__title">
                            HONG DAT TECHNICAL WORKS LLC, DUBAI
                        </div>


                    </div>
                </div>
                <div class="timeline__event animated fadeInUp timeline__event--type1">
                    <div class="timeline__event__icon" style="background-image: url(images/clients/hongdat.png)">


                    </div>
                    <div class="timeline__event__date" style="background-color: #e23941;">
                        2000

                    </div>
                    <div class="timeline__event__content">
                        <div class="timeline__event__title">
                            HONG DAT ENGINEERING PRIVATE LIMITED, SINGAPORE
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>








    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-main-widget">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="{{URL::to('/').'/'}}"><img src="assets/img/core-img/logo.png" alt=""></a>
                        </div>

                        <ul class="social-links">
                            <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 footer-main-widget">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h6>site map</h6>
                        </div>
                        <ul class="footer-menu">

                            <li><a href="company-profile">COMPANY PROFILE</a></li>
                            <li><a href="product">PROJECT</a></li>
                            <li><a href="blog">BLOG</a></li>
                            <li><a href="contact-us">CONTACT US</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 footer-main-widget">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h6>Contact us</h6>
                        </div>
                        <?php if (isset($response[0]) && !empty($response[0])) { ?>
                        <div class="address-line">
                            <p><span class="footer-address">Main</span>: {{$response[0]['showroom_address']}}</p>
                            <p><span class="footer-address">Factory</span>: {{$response[0]['factory_address']}}</p>
                            <p><a href="tel:{{$response[0]['mobile']}}">{{$response[0]['mobile']}}</a></p>

                            <p><a href="mailto:{{$response[0]['email']}}">{{$response[0]['email']}}</a></p>
                        </div>
                        <?php } else { ?>
                        <div class="address-line">
                            <p>Shop08, F03, China cluster,<br> International City Dubai,<br> United Arab Emirates</p>
                            <p><a href="tel:+971 556031358">+971 556031358</a></p>

                            <p><a href="mailto:sales.hongdat@gmail.com">sales.hongdat@gmail.com</a></p>
                        </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>


        <!-- Copywrite Area -->
        <div class="copywrite-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copywrite-content d-flex flex-wrap justify-content-between align-items-center">
                            <!-- Footer Logo -->

                            <!-- Copywrite Text -->
                            <p class="copywrite-text">
                                All rights reserved - Hong Dat Technical Works LLC © 2001 - <script>
                                    document.write(new Date().getFullYear());
                                </script>.(Powered by <a href="https://www.appzgate.com/" target="_blank"
                                    class="cpcompany">Appzgate</a> )
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <!-- jQuery-2.2.4 js -->
    <script src="assets/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="assets/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="assets/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="assets/js/active.js"></script>
</body>

</html>