<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo '<title>' . $response[3]['meta_title'] . '</title>'; ?>
    <meta name="keywords" <?php echo 'content= "' . $response[3]['meta_keyword'] . '" />' ; ?>
    <meta name="description" <?php echo 'content= "' . $response[3]['meta_description'] . '" />' ; ?>
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

    <style>
        .blog-info.details,
        .listing-details-sliders,
        .widget-boxed {
            padding: 1.5rem !important;
            background: #fff;
            border: 1px solid #eaeff5;
            -webkit-box-shadow: 0 0 10px 1px rgba(71, 85, 95, 0.08);
            box-shadow: 0 0 10px 1px rgba(71, 85, 95, 0.08);
        }

        #listingDetailsSlider h5:after {
            color: #FF385C;
            display: block;
            height: 3px;
            font-weight: bold;
            background-color: #FF385C;
            content: " ";
            width: 50px;
            margin-top: .5rem;
            margin-bottom: 1.5rem;
        }

        .carousel-inner {
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .carousel-indicators {
            position: static;
            left: initial;
            width: initial;
            margin-left: initial;
            margin-top: 15px;
        }

        .carousel-item-next,
        .carousel-item-prev,
        .carousel-item.active {
            display: block;
        }

        .carousel-item {
            position: relative;
            display: block;
            float: left;
            width: 100%;
            margin-right: -100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            transition: -webkit-transform .6s ease-in-out;
            transition: transform .6s ease-in-out;
            transition: transform .6s ease-in-out, -webkit-transform .6s ease-in-out;
        }

        .listing-details-sliders .left {
            position: absolute;
            top: 50%;
            left: 35px;
            background: #FF385C;
            width: 36px;
            height: 36px;
            line-height: 36px;
            border-radius: 100%;
            color: #fff;
            font-size: 10px;
            z-index: 120;
            cursor: pointer;
            margin-top: -18px;
            -webkit-box-shadow: 0px 0px 0px 9px rgba(255, 255, 255, 0.4);
            box-shadow: 0px 0px 0px 9px rgba(255, 255, 255, 0.4);
            -webkit-transition: all .3s ease;
            transition: all .3s ease;
        }

        .listing-details-sliders .right {
            position: absolute;
            top: 50%;
            right: 35px;
            background: #FF385C;
            width: 36px;
            height: 36px;
            line-height: 36px;
            border-radius: 100%;
            color: #fff;
            font-size: 10px;
            z-index: 120;
            cursor: pointer;
            margin-top: -18px;
            -webkit-box-shadow: 0px 0px 0px 9px rgba(255, 255, 255, 0.4);
            box-shadow: 0px 0px 0px 9px rgba(255, 255, 255, 0.4);
            -webkit-transition: all .3s ease;
            transition: all .3s ease;
        }

        .listing-details-sliders .left i {
            font-size: 23px;
            margin-left: 12px;
            margin-top: 5px;
            color: #fff;
        }

        .listing-details-sliders .right i {
            font-size: 23px;
            margin-left: 14px;
            margin-top: 5px;
            color: #fff;
        }

        .carousel-inner::after {
            display: block;
            clear: both;
            content: "";
        }

        .listing-details-sliders .carousel-indicators {
            position: static;
            left: initial;
            width: initial;
            margin-left: initial;
            margin-top: 15px;
        }

        /* slider li */
        element.style {}

        .listing-details-sliders .carousel-indicators>li {
            height: initial;
            text-indent: initial;
            max-width: 127px;
            margin-right: 10px;
            margin-left: 0;
        }

        .list-inline-item:not(:last-child) {
            margin-right: 1px;
        }

        .smail-listing .list-inline-item {
            width: 20%;
        }

        .list-inline-item:not(:last-child) {
            margin-right: .5rem;
        }

        .carousel-indicators li {
            box-sizing: content-box;
            -ms-flex: 0 1 auto;
            flex: 0 1 auto;
            width: 30px;
            height: 3px;
            margin-right: 3px;
            margin-left: 3px;
            text-indent: -999px;
            cursor: pointer;
            background-color: #fff;
            background-clip: padding-box;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            opacity: .5;
            transition: opacity .6s ease;
        }

        .list-inline-item {
            display: inline-block;
        }

        .inner-pages .carousel-indicators li::before {
            position: absolute;
            top: -10px;
            left: 0;
            display: inline-block;
            width: 100%;
            height: 10px;
            content: "";
        }

        a:not([href]):not([tabindex]) {
            color: inherit;
            text-decoration: none;
        }

        a,
        a:hover,
        a:focus {
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
            text-decoration: none;
            outline: 0 solid transparent;
            color: #000000;
            font-weight: 700;
            font-size: 16px;
        }

        .smail-listing .list-inline-item a img {
            width: 600px;
            border: none;
            border-radius: 0;
        }

        .listing-details-sliders .img-fluid {
            max-width: 100%;
            height: auto;
        }

        .listing-details-sliders .carousel-indicators li .active img {
            opacity: 0.9;
        }

        .blog-info.details h5::after {
            color: #FF385C;
            display: block;
            height: 3px;
            font-weight: bold;
            background-color: #FF385C;
            content: " ";
            width: 50px;
            margin-top: .5rem;
            margin-bottom: 1.5rem;
        }

        .widget-boxed-header {
            padding-bottom: 1.5rem;
            padding-top: 0px;
            border-bottom: 1px solid #eaeff5;
        }

        .widget-boxed-body {
            padding: 1.5rem 0 0;
        }

        .recent-img img {
            width: 90px;
            height: 70px;
            margin-right: 1rem;
        }

        .info-img a {
            text-decoration: none;
            color: #000;
            /* -webkit-transition: all .5s ease; */
            transition: all .5s ease;
        }

        .info-img h6 {
            font-family: 'Montserrat', sans-serif;
            font-size: 15px;
            color: #222;
            font-weight: 400;
        }

        .recent-main {
            display: flex;
            margin-bottom: 20px
        }

        .widget-boxed-header h4 {
            color: #222 !important;
            font-size: 18px;
            font-weight: 600;
            margin: 0;
        }

        /* slider */
        .slider {
            width: 640px;
            /*Same as width of the large image*/
            position: relative;
            /*Instead of height we will use padding*/
            padding-top: 320px;
            /*That helps bring the labels down*/

            margin: 100px auto;

            /*Lets add a shadow*/
            box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.75);
        }


        /*Last thing remaining is to add transitions*/
        .slider>img {
            position: absolute;
            left: 0;
            top: 0;
            transition: all 0.5s;
        }

        .slider input[name='slide_switch'] {
            display: none;
        }

        .slider label {
            /*Lets add some spacing for the thumbnails*/
            margin: 18px 0 0 18px;
            border: 3px solid #999;

            float: left;
            cursor: pointer;
            transition: all 0.5s;

            /*Default style = low opacity*/
            opacity: 0.6;
        }

        .slider label img {
            display: block;
        }

        /*Time to add the click effects*/
        .slider input[name='slide_switch']:checked+label {
            border-color: #666;
            opacity: 1;
        }

        /*Clicking any thumbnail now should change its opacity(style)*/
        /*Time to work on the main images*/
        .slider input[name='slide_switch']~img {
            opacity: 0;
            transform: scale(1.1);
        }

        /*That hides all main images at a 110% size
        On click the images will be displayed at normal size to complete the effect
        */
        .slider input[name='slide_switch']:checked+label+img {
            opacity: 1;
            transform: scale(1);
        }

        /*Clicking on any thumbnail now should activate the image related to it*/
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
                                <li class="breadcrumb-item"><a href="{{ URL::to('/') . '/' }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="product">Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $response[3]['title'] }}
                                </li>
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
            padding: 60px 0 55px 0;
            color: #e83b43;
            '>
        {{ $response[3]['title'] }}
    </h1>

    <!-- ##### Post Details Area Start ##### -->
    <section class="post-news-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-8 col-lg-8 col-md-12 blog-pots">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="listingDetailsSlider" class="carousel listing-details-sliders slide mb-30">
                                <h5 class="mb-4">Gallery</h5>
                                <div class="carousel-inner">
                                    @foreach ($response[3]['image'] as $key => $img)
                                    <div class="item carousel-item mySlides" data-slide-number="{{ ++$key }}">
                                        <img src="{{ $api_url }}{{ $img['image_url'] }}" style="height:374px;width:100%"
                                            alt="{{ $response[3]['title'] }}">
                                    </div>
                                    @endforeach

                                    <a class="carousel-control left" href="#listingDetailsSlider" onclick="plusDivs(-1)"
                                        data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                    <a class="carousel-control right" href="#listingDetailsSlider" onclick="plusDivs(1)"
                                        data-slide="next"><i class="fa fa-angle-right"></i></a>

                                </div>
                                <!-- main slider carousel nav controls -->
                                {{-- <ul class="carousel-indicators smail-listing list-inline">
                                    @foreach ($response[3]['image'] as $key => $img)
                                    <li class="list-inline-item">
                                        <a id="carousel-selector-{{ $key }}" class="selected" data-slide-to="0"
                                            data-target="#listingDetailsSlider">
                                            <img src="{{ $api_url }}{{ $img['image_url'] }}" class="img-fluid"
                                                alt="listing-small">
                                        </a>
                                    </li>
                                    @endforeach
                                    <li class="list-inline-item">
                                        <a id="carousel-selector-1" data-slide-to="1"
                                            data-target="#listingDetailsSlider">
                                            <img src="http://localhost/hongdat/admin/images/portfolio/1690094995.jpg"
                                                class="img-fluid" alt="listing-small">
                                        </a>
                                    </li>
                                </ul> --}}
                                <!-- main slider carousel items -->
                            </div>
                            <div class="blog-info details mb-30">
                                <h5 class="mb-4">Description</h5>
                                <p class="mb-3">{!! $response[3]['content'] !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-lg-4 col-md-12">
                    <div class="widget-boxed mt-5">
                        <div class="widget-boxed-header">
                            <h4>Recent Properties</h4>
                        </div>
                        <div class="widget-boxed-body">
                            <div class="recent-post">
                                @foreach ($response[1] as $product)
                                <div class="recent-main">
                                    <div class="recent-img">
                                        <a href="{{ URL::to('/') . '/' }}{{ $product['slug'] }}"><img
                                                src="{{ $api_url }}{{ $product['image_path'] }}" alt=""></a>
                                    </div>
                                    <div class="info-img">
                                        <a href="{{ URL::to('/') . '/' }}{{ $product['slug'] }}">
                                            <h6>{{ substr($product['title'], 0, 50) }}...</h6>
                                            {{-- <p>{{ $product['description'] }}</p> --}}
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- ##### Post Details Area End ##### -->

    <section class="post-news-area section-padding-100-0" style="padding-bottom:40px;">
        <div class="container">
            <div class="row" style="border: 10px solid rgb(209 211 213);">

                <div class="single-widget-area tabs-widget">


                    <div class="credit-tabs-content">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <?php if (isset($response[3]['features']) && !empty($response[3]['features'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link active show" id="tab--1" data-toggle="tab" href="#tab1" role="tab"
                                    aria-controls="tab1" aria-selected="false">FEATURE</a>
                            </li>
                            <?php } ?>
                            <?php if (isset($response[3]['specs']) && !empty($response[3]['specs'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" id="tab--2" data-toggle="tab" href="#tab2" role="tab"
                                    aria-controls="tab2" aria-selected="true">SPECIFICATION</a>
                            </li>
                            <?php } ?>
                        </ul>
                        <hr>
                        <div class="tab-content" id="myTabContent">
                            <?php if (isset($response[3]['features']) && !empty($response[3]['features'])) { ?>
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab--1">
                                <div class="credit-tab-content">
                                    <!-- Single News Area -->
                                    {!! $response[3]['features'] !!}

                                </div>
                            </div>
                            <?php } ?>
                            <?php if (isset($response[3]['specs']) && !empty($response[3]['specs'])) { ?>

                            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab--3">
                                <div class="credit-tab-content">
                                    <!-- Single News Area -->
                                    {!! $response[3]['specs'] !!}

                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container">
        <div class="row">

            <!-- ========== Buttons ========== -->
            <div class="col-12">

                <!-- Buttons -->
                @foreach ($response[3]['downloads'] as $download)
                <div class="credit-buttons-area mb-100">

                    <a href="{{ $download['download_url'] }}" class="btn credit-btn btn-3 m-2">Download</a>

                </div>
                @endforeach
            </div>
        </div>
        <h4>Call for inquiries about projects.</h4>
        <div class="row" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:10px; margin-bottom:20px">
            <div class="col-2 col-md-2">
                <img src="assets/img/avatar.jpg" alt=""
                    style="height: auto;max-width: 20%;border-radius: 100px; text-align:center">
            </div>
            <div class="col-8 col-md-8">
                <h6>Consultant</h6>
                <a aria-label="Chat on WhatsApp" href="https://wa.me/+971559011255"> <img alt="Chat on WhatsApp"
                        src="assets/img/wp.png" style="height: auto;max-width: 15%;" />
                </a>
            </div>
        </div>
    </div>

    <!-- ##### Footer Area Start ##### -->
    @include('partials.footer')
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
    <script>
        var slideIndex = 1;
        showDivs(slideIndex);
        
        function plusDivs(n) {
          showDivs(slideIndex += n);
        }
        
        function showDivs(n) {
          var i;
          var x = document.getElementsByClassName("mySlides");
          if (n > x.length) {slideIndex = 1}
          if (n < 1) {slideIndex = x.length}
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
          }
          x[slideIndex-1].style.display = "block";  
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('.pgwSlideshow').pgwSlideshow();

        });
    </script>
</body>

</html>