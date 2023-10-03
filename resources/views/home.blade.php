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
    <link rel="icon" href="{{ URL::to('/') . '/' }}assets/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/slider-product.css">
    <link rel="stylesheet" href="css/time-line.css">

    <style>
        /* .online-dot {
            background-color: rgb(74, 213, 4);
            display: block;
            border: 2px solid rgb(9, 94, 84);
        } */

        /* .message-box {
            background-repeat: no-repeat;
            background-size: contain;
            content: "";
            top: 0px;
            left: -12px;
            width: 12px;
            height: 19px;
            background-image:
                url("public/assets/img/msgbox.png");
            background-position: 50% 50%;
            position: absolute;
        } */
        .whatsapp-box {
            width: 360px;
            display: block;
            width: 100%;
            border-radius: 10px;
            bottom: 0px;
            background-color: rgb(255, 255, 255);
            transition: opacity 0.3s ease 0s, margin 0.3s ease 0s, visibility 0.3s ease 0s;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 12px 24px 0px;
            right: 0px;
            left: auto;
            position: static;
            transform: none !important;
            opacity: 1;
            pointer-events: all;
            visibility: visible;
            touch-action: auto;
            border-radius: 10px;
            overflow: hidden;
        }

        .whatsapp-area {
            background: rgb(9, 94, 84);
            color: rgb(17, 17, 17);
            display: flex;
            -moz-box-align: center;
            align-items: center;
            padding: 24px 20px;
        }

        .whatsapp-image {
            position: relative;
            width: 52px;
            height: 52px;
            box-shadow: rgba(17, 17, 17, 0.1) 0px 0px 2px inset;
            border-radius: 50%;
        }

        .whatsapp-image-avater {
            width: inherit;
            height: inherit;
            transition: opacity 1s ease-out 0s;
            background-color: rgb(210, 210, 210);
            opacity: 1;
            border-radius: 50%;
            overflow: hidden;
        }

        .whatsapp-font-area {
            margin-left: 16px;
            margin-right: 16px;
            width: 100%;
            overflow: hidden;
        }

        .whatsapp-font-title {
            font-size: 16px;
            font-weight: 700;
            line-height: 20px;
            max-height: 60px;
            -webkit-line-clamp: 3;
            display: -webkit-box;
            -moz-box-orient: vertical;
            overflow: hidden;
            color: rgb(255, 255, 255);
        }

        .whatsapp-font-subtitle {
            font-size: 13px;
            line-height: 18px;
            margin-top: 4px;
            color: rgb(255, 255, 255);
        }

        .whatsapp-msg-box {
            padding: 20px 20px 20px 10px;
            background-color: rgb(230, 221, 212);
            position: relative;
            overflow: auto;
            max-height: 382px;
            height: 260px;
        }
    </style>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TVYTYM0REQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-TVYTYM0REQ');
    </script>
</head>

<body>


    <!-- ##### Header Area Start ##### -->
    @include('partials.main_header')
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
                    style="background-image: url('{{ $api_url }}{{ $slider['image_path'] }}');"></div>
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
                            <h4>RECOMMENDED PROJECTS</h4>
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
                                    <img src="{{ $api_url }}{{ $category['image_path'] }}" alt="">
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
                                <a href="#" class="hover-target" data-hover="{{ $category['title'] }}">{{
                                    $category['title'] }}</a>
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
                <?= Session::get('message') ?>
            </div>
        </div>
        <?php } ?>
        <?php if (Session::has('error')) { ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col xs-12" style="padding: 30px;">
            <div class="alert alert-danger alert-dismissible" style="text-align: center;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?= Session::get('error') ?>
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
                                    <img src="{{ URL::to('/') . '/' }}assets/img/core-img/location.png" alt="">
                                </div>
                                <div class="text">
                                    <p>{{ $response[0]['showroom_address'] }}</p>
                                </div>
                            </div>
                            <!-- Single Contact Content -->
                            <span style="color: #e83b43;font-weight: 700;">Factory:</span>
                            <div class="single-contact-content d-flex align-items-center">

                                <div class="icon">
                                    <img src="{{ URL::to('/') . '/' }}assets/img/core-img/location.png" alt="">
                                </div>
                                <div class="text">
                                    <p>{{ $response[0]['factory_address'] }}</p>
                                </div>
                            </div>
                            <!-- Single Contact Content -->
                            <div class="single-contact-content d-flex align-items-center">
                                <div class="icon">
                                    <img src="{{ URL::to('/') . '/' }}assets/img/core-img/call.png" alt="">
                                </div>
                                <div class="text">
                                    <p>{{ $response[0]['mobile'] }}</p>
                                    <span>mon-fri , 09.am - 06.pm</span>
                                </div>
                            </div>
                            <!-- Single Contact Content -->
                            <div class="single-contact-content d-flex align-items-center">
                                <div class="icon">
                                    <img src="{{ URL::to('/') . '/' }}assets/img/core-img/message2.png" alt="">
                                </div>
                                <div class="text">
                                    <p>{{ $response[0]['email'] }}</p>
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
                                    <img src="{{ URL::to('/') . '/' }}assets/img/core-img/location.png" alt="">
                                </div>
                                <div class="text">
                                    <p>Shop08, F03, China cluster,<br> international city Dubai,<br> U.A.E</p>
                                </div>
                            </div>
                            <div class="single-contact-content d-flex align-items-center">
                                <div class="icon">
                                    <img src="{{ URL::to('/') . '/' }}assets/img/core-img/location.png" alt="">
                                </div>
                                <div class="text">
                                    <p>WH#27&30, 64 Street, Jebel Ali Industrial Area, Dubai,<br> U.A.E</p>
                                </div>
                            </div>
                            <!-- Single Contact Content -->
                            <div class="single-contact-content d-flex align-items-center">
                                <div class="icon">
                                    <img src="{{ URL::to('/') . '/' }}assets/img/core-img/call.png" alt="">
                                </div>
                                <div class="text">
                                    <p>+971 559011255</p>
                                    <span>mon-fri , 09.am - 06.pm</span>
                                </div>
                            </div>
                            <!-- Single Contact Content -->
                            <div class="single-contact-content d-flex align-items-center">
                                <div class="icon">
                                    <img src="{{ URL::to('/') . '/' }}assets/img/core-img/message2.png" alt="">
                                </div>
                                <div class="text">
                                    <p>sales3.hongdat@gmail.com</p>
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
                    <div style="margin-bottom: 10px;">
                        <div class="whatsapp-box">

                            <div class="whatsapp-area">
                                <div class="whatsapp-image">
                                    <div class="online-dot whatsapp-image-avater">
                                        <img src="{{ asset('assets/img/consultant.jpg') }}" alt="consultant">
                                    </div>
                                </div>
                                <div class="whatsapp-font-area">
                                    <div class="whatsapp-font-title">Consultant</div>
                                    <div class="whatsapp-font-subtitle">
                                        Typically replies instantly
                                    </div>
                                </div>
                            </div>
                            <div class="whatsapp-msg-box">
                                <div style="display: flex;">
                                    <div class="message-box" style="background-color: rgb(255, 255, 255);
  width: 52.5px;
  height: 32px;
  border-radius: 16px;
  display: flex;
  -moz-box-pack: center;
  justify-content: center;
  -moz-box-align: center;
  align-items: center;
  margin-left: 10px;
  opacity: 0;
  transition: all 0.1s ease 0s;
  z-index: 1;
  box-shadow: rgba(0, 0, 0, 0.13) 0px 1px 0.5px;">

                                    </div>
                                    <div style="opacity: 1;box-sizing: border-box;
  padding: 7px 14px 6px;
  position: relative;
  transition: all 0.3s ease 0s;
  transform-origin: center top 0px;
  z-index: 2;
  margin-left: -54px;
  color: rgb(17, 17, 17);
  font-size: 15px;
  line-height: 1.39;
  max-width: calc(100% - 66px);
  border-radius: 0px 8px 8px;
  background-color: rgb(255, 255, 255);
  margin-top: 4px;
">
                                        <div>Consultant</div>
                                        <div>
                                            <div>Hi there 👋</div><br>
                                            <div>How can I help you?</div>
                                        </div>
                                        <div>22:09</div>
                                    </div>
                                </div>
                            </div><button title="WhatsApp" role="button"
                                onclick="window.location.href='https://wa.me/+971559011255'" style="margin: 20px;
  width: calc(100% - 40px);
 
  padding: 20px;
  cursor: pointer;
  
  border-radius: 24px;
  color: rgb(255, 255, 255);
  font-family: inherit;
  font-weight: bold;
  font-size: 16px;
  background-color: rgb(20, 198, 86);
  border-width: 0px;">
                                <span><i class="fa fa-whatsapp" aria-hidden="true"></i> Start Chat</span></button>
                        </div>
                    </div>
                </div>
                {{-- <div class="contact-form-area contact-page">
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
                                    <textarea name="message" class="form-control" name="message" id="message" cols="30"
                                        rows="10" placeholder="Your Message"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            {{-- <div class="form-group top_bottom" style="padding-top: 10px;">
                                <div id="g-recaptcha-response" class="g-recaptcha"
                                    data-sitekey="6LfvciAbAAAAAAYXsPLYGpMv2g2GMamnfljCUbrI"></div>
                            </div> --}}
                            {{-- <div id="g-recpatcha-error" class="alert alert-danger alert-dismissible"
                                style="text-align: center;display:none">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                Please click on the reCAPTCHA box.
                            </div> --}}
                            {{-- <div class="col-12">
                                <button class="btn credit-btn box-shadow btn-2" type="submit">Send</button>
                            </div>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
        </div>
    </section>
    <!-- ##### Miscellaneous Area End ###### -->







    <!-- ##### Footer Area Start ##### -->
    @include('partials.footer')
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{ URL::to('/') . '/' }}assets/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="{{ URL::to('/') . '/' }}assets/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{ URL::to('/') . '/' }}assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="{{ URL::to('/') . '/' }}assets/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="{{ URL::to('/') . '/' }}assets/js/active.js"></script>

    <script src="{{ URL::to('/') . '/' }}assets/js/slider-product.js"></script>


    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script>
        //Recaptcha Validation
        $(document).ready(function() {
            (function() {
                function checkRecaptcha() {
                    var res = $('#g-recaptcha-response').val();

                    if (res == "" || res == undefined || res.length == 0)
                        return false;
                    else
                        return true;
                }


                $('form').submit(function(e) {
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