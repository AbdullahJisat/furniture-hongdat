<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Hong Dat Technical Works LLC | Products</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        .content {
            position: relative;
            width: 100%;
            max-width: 400px;
            margin: auto;
            overflow: hidden;
        }

        .content .content-overlay {
            background: rgba(0, 0, 0, 0.7);
            position: absolute;
            height: 99%;
            width: 100%;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            opacity: 0;
            -webkit-transition: all 0.4s ease-in-out 0s;
            -moz-transition: all 0.4s ease-in-out 0s;
            transition: all 0.4s ease-in-out 0s;
        }

        .content:hover .content-overlay {
            opacity: 1;
        }

        .content-image {
            width: 100%;
        }

        .content-details {
            position: absolute;
            text-align: center;
            padding-left: 1em;
            padding-right: 1em;
            width: 100%;
            top: 50%;
            left: 50%;
            opacity: 0;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            transition: all 0.3s ease-in-out 0s;
        }

        .content:hover .content-details {
            top: 50%;
            left: 50%;
            opacity: 1;
        }

        .content-details h3 {
            color: #fff;
            font-weight: 500;
            letter-spacing: 0.15em;
            margin-bottom: 0.5em;
            text-transform: uppercase;
        }

        .content-details p {
            color: #fff;
            font-size: 0.8em;
        }

        .fadeIn-bottom {
            top: 80%;
        }

        .fadeIn-top {
            top: 20%;
        }

        .fadeIn-left {
            left: 20%;
        }

        .fadeIn-right {
            left: 80%;
        }
    </style>

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
                                        <?php if (isset($response[2]) && !empty($response[2])) { ?>

                                        <div class="megamenu">
                                            <ul class="single-mega cn-col-5">
                                                <p class='menu-p'>OUR PROJECTS</p>
                                                <p class='menu-sub-p' style=''>Browse our latest products here</p>
                                            </ul>
                                            <ul class="single-mega cn-col-8">


                                                <?php
                                                        $i = 1;
                                                        foreach ($response[2] as $m_category) {
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
                        <h2>Products</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{URL::to('/').'/'}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Product</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->





    <section class="features-area section-padding-100-0" style="    padding-left: 20px;padding-right: 20px;">
        <div class="row">
            <div class="col-md-2 col-sm-4 col-xs-4 sidebar_left">
                <aside class="sidebar">

                    <div class="single-widget-area cata-widget">
                        <div class="widget-heading">

                            <h4>Categories</h4>
                        </div>

                        <ul class="portfolio-sorting">
                            <li><a href="#" data-group="0">&nbsp;ALL</a></li>

                            <?php
                                if (isset($response[3]) && !empty($response[3])) {

                                    foreach ($response[3] as $category) {
                                        ?>
                            <li></i><a href="#" data-group="{{$category['id']}}"
                                    style='text-transform: uppercase'>&nbsp;{{$category['title']}}</a></li>
                            <?php
                                    }
                                }
                                ?>


                        </ul>
                    </div>




                </aside>
            </div>
            <div class="col-md-10 col-sm-8 col-xs-8 p-listing">
                <div class="row align-items-end portfolio-items list-unstyled" id="grid">

                    <?php
                        if (isset($response[1]) && !empty($response[1])) {

                            foreach ($response[1] as $product) {
                                ?>
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3  product-item"
                        data-groups="[{{$product['category_id']}},0]">


                        <div class="content" data-wow-delay="300ms"
                            style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                            <a href="{{URL::to('/').'/'}}{{$product['slug']}}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{$api_url}}{{$product['image_path']}}">

                                <div class="content-details fadeIn-top">
                                    <h3>{{$product['title']}}</h3>
                                    <p>{{$product['description']}}</p>
                                </div>

                            </a>
                        </div>
                        <h4 class="title" style="text-align: center;">{{$product['title']}}</h4>



                    </div>
                    <?php
                            }
                        }
                        ?>
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
    <script src="assets/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="assets/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="assets/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="assets/js/active.js"></script>
    <script src="assets/js/jquery.shuffle.min.js"></script>
    <script src="assets/js/custom.min.js"></script>


</body>

</html>