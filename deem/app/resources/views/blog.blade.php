<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Hongdat Blogs</title>

    <!-- Favicon -->
    <link rel="icon" href="{{URL::to('/').'/'}}assets/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{URL::to('/').'/'}}css/style.css">
    <link rel="stylesheet" href="{{URL::to('/').'/'}}plugins/css/style.css">


    <style>
        .post-author {
            font-size: 15px !important;
        }

        .post-date {
            font-size: 15px !important;
        }

        .blog_content {
            padding-top: 15px;
        }

        .hover14 figure {
            position: relative;
        }

        .hover14 figure::before {
            position: absolute;
            top: 0;
            left: -75%;
            z-index: 2;
            display: block;
            content: '';
            width: 50%;
            height: 100%;
            background: -webkit-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, .3) 100%);
            background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, .3) 100%);
            -webkit-transform: skewX(-25deg);
            transform: skewX(-25deg);
        }

        .hover14 figure:hover::before {
            -webkit-animation: shine .75s;
            animation: shine .75s;
        }

        @-webkit-keyframes shine {
            100% {
                left: 125%;
            }
        }

        @keyframes shine {
            100% {
                left: 125%;
            }
        }

        .ribbon3 {
            width: 100px;
            height: 25px;
            line-height: 25px;
            padding-left: 15px;
            position: absolute;
            left: -8px;
            top: 5px;
            background: #e83b43;
            color: #fff;
            z-index: 10;

        }

        .ribbon3:before,
        .ribbon3:after {
            content: "";
            position: absolute;
        }

        .ribbon3:before {
            height: 0;
            width: 0;
            top: -8.5px;
            left: 0.1px;
            border-bottom: 9px solid black;
            border-left: 9px solid transparent;
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
                                                        style='color: #e83b43;line-height: 15px;'>More Projects&nbsp;<i
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

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay jarallax"
        style="background-image: url(assets/img/bg-img/13.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Blogs</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{URL::to('/').'/'}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->



    <!-- ##### News Area Start ##### -->
    <section class="news-area section-padding-100">
        <div class="container">

            <?php if (isset($response[2]) && !empty($response[2])) { ?>
            <?php
                    $i = 1;
                    foreach ($response[2] as $blog) {
                        ?>

            <div class="col-lg-12 col-md-12 col-sm-12  blog-content blog-entry">

                <div class="row one-blg hover14 column">
                    <span class="ribbon3">{{$blog['date']}}</span>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <div class="blog-thumbnail">
                            <div>
                                <a href="{{$blog['slug']}}">
                                    <figure><img src="{{$api_url}}{{$blog['image_path']}}" /></figure>
                                </a>

                            </div>
                        </div>

                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6 bg-content">

                        <a href="{{$blog['slug']}}" class="post-title">{{$blog['title']}}</a>
                        <div class="blog-meta">

                        </div>
                        <p class="blog_content">{{substr($blog['description'], 0, 120)}}...</p>
                    </div>

                </div>

            </div>

            <?php
                        $i++;
                    }
                    ?>

            <?php } else { ?>
            <div class="col-lg-12 col-md-12 col-sm-12  blog-content blog-entry">
                <p style='text-align: center;font-size: 30px;'>No blogs available at the moment</p>
            </div>

            <?php } ?>

        </div>
    </section>

    <!-- ##### News Area End ##### -->



    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area section-padding-100-0">
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
                <div class="row one-blg">
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
</body>

</html>