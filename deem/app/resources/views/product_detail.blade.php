<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo '<title>' . $response[2]['meta_title'] . '</title>'; ?>
    <meta name="keywords" <?php echo 'content= "' . $response[2]['meta_keyword'] . '" />' ; ?>

    <meta name="description" <?php echo 'content= "' . $response[2]['meta_description'] . '" />' ; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->


    <!-- Favicon -->
    <link rel="icon" href="assets/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="plugins/page-slide-show/pgwslideshow.css">


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
                        <h2>Products</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{URL::to('/').'/'}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="product">Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$response[2]['title']}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->
    <h1 style='text-align: center;
            padding-top: 20px;
            color: #e83b43;
            '>{{$response[2]['title']}}</h1>

    <!-- ##### Post Details Area Start ##### -->
    <section class="post-news-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Post Details Content Area -->
                <?php if (isset($response[2]['image']) && !empty($response[2]['image'])) { ?>
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 img-container">


                    <ul class="pgwSlideshow">
                        <?php
                                $i = 1;
                                foreach ($response[2]['image'] as $img) {
                                    ?>
                        <li><img src="{{$api_url}}{{$img['image_url']}}" alt=""></li>
                        <?php
                                    $i++;
                                }
                                ?>

                    </ul>

                </div>

                <?php } else { ?>
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 img-container">


                    <ul class="pgwSlideshow">

                        <li><img src="{{$api_url}}{{$response[2]['image_path']}}" alt=""></li>


                    </ul>

                </div>
                <?php } ?>

            </div>
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->

    <!-- ##### Post Details Area Start ##### -->
    <?php if (isset($response[2]) && !empty($response[2])) { ?>
    <section class="post-news-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-12">
                    <div class="post-details-content mb-100">

                        {!! $response[2]['content'] !!}

                    </div>



                </div>



            </div>
        </div>
    </section>
    <?php } ?>
    <!-- ##### Post Details Area End ##### -->
    <section class="post-news-area section-padding-100-0" style="padding-bottom:40px;">
        <div class="container">
            <div class="row" style="border: 10px solid rgb(209 211 213);">

                <div class="single-widget-area tabs-widget">


                    <div class="credit-tabs-content">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <?php if (isset($response[2]['features']) && !empty($response[2]['features'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link active show" id="tab--1" data-toggle="tab" href="#tab1" role="tab"
                                    aria-controls="tab1" aria-selected="false">FEATURE</a>
                            </li>
                            <?php } ?>
                            <?php if (isset($response[2]['specs']) && !empty($response[2]['specs'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" id="tab--2" data-toggle="tab" href="#tab2" role="tab"
                                    aria-controls="tab2" aria-selected="true">SPECIFICATION</a>
                            </li>
                            <?php } ?>
                        </ul>
                        <hr>
                        <div class="tab-content" id="myTabContent">
                            <?php if (isset($response[2]['features']) && !empty($response[2]['features'])) { ?>
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab--1">
                                <div class="credit-tab-content">
                                    <!-- Single News Area -->
                                    {!! $response[2]['features'] !!}

                                </div>
                            </div>
                            <?php } ?>
                            <?php if (isset($response[2]['specs']) && !empty($response[2]['specs'])) { ?>

                            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab--3">
                                <div class="credit-tab-content">
                                    <!-- Single News Area -->
                                    {!! $response[2]['specs'] !!}

                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if (isset($response[2]['downloads']) && !empty($response[2]['downloads'])) { ?>
    <div class="container">
        <div class="row">

            <!-- ========== Buttons ========== -->
            <div class="col-12">

                <!-- Buttons -->
                <?php
                        $i = 1;
                        foreach ($response[2]['downloads'] as $download) {
                            ?>
                <div class="credit-buttons-area mb-100">

                    <a href="{{$download['download_url']}}" class="btn credit-btn btn-3 m-2">Download</a>

                </div>
            </div>
            <?php
                        $i++;
                    }
                    ?>



        </div>
    </div>

    <?php } ?>

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
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
    <script src="assets/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="assets/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="assets/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="assets/js/active.js"></script>
    <script src="plugins/page-slide-show/pgwslideshow.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

                                            $('.pgwSlideshow').pgwSlideshow();

                                        });


    </script>
</body>

</html>