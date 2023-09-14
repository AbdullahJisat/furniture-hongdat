<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Hong Dat Technical Works LLC</title>

    <!-- Favicon -->
    <link rel="icon" href="{{URL::to('/').'/'}}assets/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/slider-product.css">
    <link rel="stylesheet" href="css/time-line.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TVYTYM0REQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-TVYTYM0REQ');
    </script>
</head>

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
                            <a href="{{URL::to('/').'/'}}"><img src="{{URL::to('/').'/'}}assets/img/core-img/logo.png"
                                    alt=""></a>
                        </div>

                        <!-- Top Contact Info -->
                        <?php if (isset($response[0]) && !empty($response[0])) { ?>
                        <div class="top-contact-info d-flex align-items-center">
                            <a href="#" data-toggle="tooltip" data-placement="bottom"
                                title="{{$response[0]['showroom_address']}}"><img
                                    src="assets/img/core-img/placeholder.png" alt="">
                                <span>{{$response[0]['showroom_address']}}</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom"
                                title="{{$response[0]['email']}}"><img
                                    src="{{URL::to('/').'/'}}assets/img/core-img/message.png" alt="">
                                <span>{{$response[0]['email']}}</span></a>
                        </div>
                        <?php } else { ?>
                        <div class="top-contact-info d-flex align-items-center">
                            <a href="#" data-toggle="tooltip" data-placement="bottom"
                                title="Shop08, F03, China cluster, international city Dubai, United Arab Emirates"><img
                                    src="{{URL::to('/').'/'}}assets/img/core-img/placeholder.png" alt=""> <span>Shop08,
                                    F03, China cluster, international city Dubai, United Arab Emirates</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom"
                                title="sales.hongdat@gmail.com"><img
                                    src="{{URL::to('/').'/'}}assets/img/core-img/message.png" alt="">
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
                                    <li><a href="">HOME</a></li>


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
                            <a href="#"><img src="{{URL::to('/').'/'}}assets/img/core-img/call2.png"
                                    alt="">{{$response[0]['mobile']}}</a>
                        </div>
                        <?php } else { ?>
                        <div class="contact">
                            <a href="#"><img src="{{URL::to('/').'/'}}assets/img/core-img/call2.png" alt=""> +971
                                556031358</a>
                        </div>
                        <?php } ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <?php if (isset($response[2]) && !empty($response[2])) { ?>
    <div class="hero-area">
        <div class="hero-slideshow owl-carousel">

            <!-- Single Slide -->
            <?php
                    $i = 1;
                    foreach ($response[2] as $slider) {
                        ?>
            <div class="single-slide bg-img">
                <!-- Background Image-->

                <div class="slide-bg-img bg-img bg-overlay"
                    style="background-image: url('{{$api_url}}{{$slider['image_path']}}');"></div>
                <!-- Welcome Text -->
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-center">
                        <div class="col-12 col-lg-9">
                            <div class="welcome-text text-center">


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide Duration Indicator -->
                <div class="slide-du-indicator"></div>
            </div>
            <?php
                        $i++;
                    }
                    ?>





        </div>
    </div>
    <!-- ##### Hero Area End ##### -->
    <?php
        }
        ?>



    <!-- ##### Call To Action Start ###### -->
    <section class="cta-2-area wow fadeInUp" data-wow-delay="100ms">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Cta Content -->
                    <div class="cta-content d-flex flex-wrap align-items-center justify-content-between">
                        <div class="cta-text">
                            <h4>RECOMMENDED PROJECTs</h4>
                        </div>
                        <div class="cta-btn">
                            <a href="product" class="btn credit-btn box-shadow">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Call To Action End ###### -->



    <!-- ##### Call To Action Start ###### -->
    <section class="cta-area d-flex flex-wrap">
        <!-- Cta Thumbnail -->
        <div class="cta-thumbnail bg-img jarallax"
            style="background-image: url(assets/img/bg-img/home-about-section.jpg);"></div>

        <!-- Cta Content -->
        <div class="cta-content">
            <!-- Section Heading -->
            <div class="section-heading white">
                <div class="line"></div>
                <p>CARPENTRY | FURNITURES</p>
                <h2>HONG DAT TECHNICAL WORKS LLC</h2>
            </div>
            <h6>Hong Dat Technical Works LLC is a rapid growing carpentry solutions provider, it is formed with a pool
                of well trained and experienced managers, supervisors and carpenters It specialized in residential,
                commercial and other projects.
                <br><br>
                It all started from Hong Dat Engineering PTE LTD Established in Year 2000 which specializes in
                electrical works, then later HD Contractor PTE LTD was established in Year 2010 specializes in
                Structural, Wet trade, Fit out and Main Contracting and other works As the companies expands, Oneness
                Holding was established and invested in setting up high tech automation carpentry factories in
                Singapore, Dubai and Auckland.
            </h6>

            <a href="company-profile" class="btn credit-btn box-shadow btn-2" style="margin-top: 20px;">Read More</a>
        </div>
    </section>
    <!-- ##### Call To Action End ###### -->


    <section class="services-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                        <div class="line"></div>
                        <p>Take look at our</p>
                        <h2>Our Products</h2>
                    </div>
                </div>
            </div>

            <?php if (isset($response[3]) && !empty($response[3])) { ?>
            <div class="row ser">
                <div class="col-12 col-md-12 col-lg-12">
                    <?php
                            $i = 1;
                            foreach ($response[3] as $category) {
                                ?>
                    <div class="center">


                        <div class="row justify-content-center" style="justify-content: left!important;">
                            <div class="col-md-8">
                                <div class="img-wrap">
                                    <img src="{{$api_url}}{{$category['image_path']}}" alt="">
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php
                                $i++;
                            }
                            ?>




                    <div class="section padding-top-bottom over-hide bigger">
                        <ul class="slide-buttons">
                            <?php
                                    $i = 1;
                                    foreach ($response[3] as $category) {
                                        ?>
                            <li class="">
                                <a href="#" class="hover-target"
                                    data-hover="{{$category['title']}}">{{$category['title']}}</a>
                            </li>
                            <?php
                                        $i++;
                                    }
                                    ?>


                        </ul>
                    </div>

                    <div class='cursor' id="cursor"></div>
                    <div class='cursor2' id="cursor2"></div>
                    <div class='cursor3' id="cursor3"></div>
                </div>
            </div>
            <?php
                }
                ?>
        </div>
    </section>




    <!-- ##### Miscellaneous Area Start ###### -->
    <section class="miscellaneous-area bg-gray section-padding-100-0">
        <?php if (Session::has('message')) { ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col xs-12" style="padding: 30px;">
            <div class="alert alert-success alert-dismissible" style="text-align: center;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?= Session::get('message'); ?>
            </div>
        </div>
        <?php } ?>
        <?php if (Session::has('error')) { ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col xs-12" style="padding: 30px;">
            <div class="alert alert-danger alert-dismissible" style="text-align: center;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?= Session::get('error'); ?>
            </div>
        </div>
        <?php } ?>
        <div class="container">
            <div class="row align-items-end justify-content-center">
                <!-- Add Area -->

                <?php if (isset($response[0]) && !empty($response[0])) { ?>
                <!-- Contact Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="contact--area mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <!-- Section Heading -->
                        <div class="section-heading mb-50">
                            <div class="line"></div>
                            <h2>Get in touch</h2>
                        </div>
                        <!-- Contact Content -->
                        <div class="contact-content">
                            <!-- Single Contact Content -->
                            <span style="color: #e83b43;font-weight: 700;">Main:</span>
                            <div class="single-contact-content d-flex align-items-center" style="margin-bottom: 15px;">

                                <div class="icon">
                                    <img src="{{URL::to('/').'/'}}assets/img/core-img/location.png" alt="">
                                </div>
                                <div class="text">
                                    <p>{{$response[0]['showroom_address']}}</p>
                                </div>
                            </div>
                            <!-- Single Contact Content -->
                            <span style="color: #e83b43;font-weight: 700;">Factory:</span>
                            <div class="single-contact-content d-flex align-items-center">

                                <div class="icon">
                                    <img src="{{URL::to('/').'/'}}assets/img/core-img/location.png" alt="">
                                </div>
                                <div class="text">
                                    <p>{{$response[0]['factory_address']}}</p>
                                </div>
                            </div>
                            <!-- Single Contact Content -->
                            <div class="single-contact-content d-flex align-items-center">
                                <div class="icon">
                                    <img src="{{URL::to('/').'/'}}assets/img/core-img/call.png" alt="">
                                </div>
                                <div class="text">
                                    <p>{{$response[0]['mobile']}}</p>
                                    <span>mon-fri , 09.am - 06.pm</span>
                                </div>
                            </div>
                            <!-- Single Contact Content -->
                            <div class="single-contact-content d-flex align-items-center">
                                <div class="icon">
                                    <img src="{{URL::to('/').'/'}}assets/img/core-img/message2.png" alt="">
                                </div>
                                <div class="text">
                                    <p>{{$response[0]['email']}}</p>
                                    <span>we reply in 24 hrs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } else { ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="contact--area mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <!-- Section Heading -->
                        <div class="section-heading mb-50">
                            <div class="line"></div>
                            <h2>Get in touch</h2>
                        </div>
                        <!-- Contact Content -->
                        <div class="contact-content">
                            <!-- Single Contact Content -->
                            <div class="single-contact-content d-flex align-items-center">
                                <div class="icon">
                                    <img src="{{URL::to('/').'/'}}assets/img/core-img/location.png" alt="">
                                </div>
                                <div class="text">
                                    <p>Shop08, F03, China cluster,<br> international city Dubai,<br> United Arab
                                        Emirates</p>
                                </div>
                            </div>
                            <!-- Single Contact Content -->
                            <div class="single-contact-content d-flex align-items-center">
                                <div class="icon">
                                    <img src="{{URL::to('/').'/'}}assets/img/core-img/call.png" alt="">
                                </div>
                                <div class="text">
                                    <p>+971 556031358</p>
                                    <span>mon-fri , 09.am - 06.pm</span>
                                </div>
                            </div>
                            <!-- Single Contact Content -->
                            <div class="single-contact-content d-flex align-items-center">
                                <div class="icon">
                                    <img src="{{URL::to('/').'/'}}assets/img/core-img/message2.png" alt="">
                                </div>
                                <div class="text">
                                    <p>sales.hongdat@gmail.com</p>
                                    <span>we reply in 24 hrs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <!-- News Area -->
                <div class="col-12 col-md-6 col-lg-8">
                    <!-- Contact Area -->
                    <div class="contact-form-area contact-page">
                        <h4 class="mb-50" style="color:#fff!important;">Send a message</h4>

                        <form action="home_contact" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Your E-mail">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subject" id="subject"
                                            placeholder="Your Subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" name="message" id="message"
                                            cols="30" rows="10" placeholder="Your Message"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group top_bottom" style="padding-top: 10px;">
                                    <div id="g-recaptcha-response" class="g-recaptcha"
                                        data-sitekey="6LfvciAbAAAAAAYXsPLYGpMv2g2GMamnfljCUbrI"></div>
                                </div>
                                <div id="g-recpatcha-error" class="alert alert-danger alert-dismissible"
                                    style="text-align: center;display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    Please click on the reCAPTCHA box.
                                </div>
                                <div class="col-12">
                                    <button class="btn credit-btn box-shadow btn-2" type="submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Miscellaneous Area End ###### -->

    <?php if (isset($response[1]) && !empty($response[1])) { ?>
    <section id="timeline">
        <?php
                $i = 1;
                foreach ($response[1] as $m_category) {
                    ?>

        <div class="tl-item">
            <a href='product'>
                <div class="tl-bg" style="background-image: url('{{$api_url}}{{$m_category['image_path']}}')"></div>

                <div class="tl-year">
                    <p class="f2 heading--sanSerif"></p>
                </div>

                <div class="tl-content">
                    <h1>{{$m_category['title']}}</h1>

                </div>
            </a>
        </div>

        <?php
                    $i++;
                }
                ?>



    </section>
    <?php } ?>





    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-main-widget">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="{{URL::to('/').'/'}}"><img src="{{URL::to('/').'/'}}assets/img/core-img/logo.png"
                                    alt=""></a>
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
    <script src="{{URL::to('/').'/'}}assets/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="{{URL::to('/').'/'}}assets/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{URL::to('/').'/'}}assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="{{URL::to('/').'/'}}assets/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="{{URL::to('/').'/'}}assets/js/active.js"></script>

    <script src="{{URL::to('/').'/'}}assets/js/slider-product.js"></script>


    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script>
        //Recaptcha Validation
            $(document).ready(function () {
           (function () {
        function checkRecaptcha() {
            var res = $('#g-recaptcha-response').val();

            if (res == "" || res == undefined || res.length == 0)
                return false;
            else
                return true;
        }


        $('form').submit(function (e) {
            if (!checkRecaptcha()) {
                $("#g-recpatcha-error").show();
                return false;
            }
        });
    }());
            });
    </script>


</body>

</html>