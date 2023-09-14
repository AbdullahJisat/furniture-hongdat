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
    <link rel="icon" href="{{ URL::to('/') . '/' }}assets/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ URL::to('/') . '/' }}css/style.css">
    <link rel="stylesheet" href="{{ URL::to('/') . '/' }}plugins/css/style.css">


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

        /* .hover14 figure::before {
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
        } */

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

        /* new style blog */
        .sidebar {
            margin-left: 30px;
        }

        .sidebar .search {
            margin-top: 0;
        }

        .sidebar .sidebar-item {
            margin-top: 50px;
        }

        .sidebar .recent-posts ul li {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .sidebar .categories ul li {
            margin-bottom: 15px;
        }


        .sidebar .tags ul li a {
            font-size: 15px;
            font-weight: 500;
            color: #aaa;
            display: inline-block;
            border: 1px solid #eee;
            padding: 10px 18px;
            transition: all .3s;
        }

        .sidebar .tags ul li {
            margin-bottom: 10px;
            margin-right: 6px;
            display: inline-block;
        }

        ul.page-numbers {
            text-align: center;
        }

        ul.page-numbers li {
            display: inline-block;
            margin: 0px 5px;
        }

        ul.page-numbers li a {
            width: 50px;
            height: 50px;
            display: inline-block;
            text-align: center;
            line-height: 50px;
            font-size: 15px;
            color: #7a7a7a;
            border: 1px solid #eee;
            font-weight: 500;
            transition: all 0.3s;
        }

        .sidebar .search input {
            width: 100%;
            height: 50px;
            border: 1px solid #eee;
            font-size: 13px;
            text-transform: uppercase;
            font-weight: 500;
            color: #7a7a7a;
            outline: none;
            padding: 0 15px;
        }

        .blog-posts .down-content h4 {
            text-transform: capitalize;
            color: #20232e;
            margin: 10px 0px 12px 0px;
            font-size: 20px;
            letter-spacing: 0.25px;
        }

        .blog-posts .down-content span {
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 900;
            color: #f48840;
        }

        .sidebar .recent-posts ul li span {
            display: block;
            font-size: 14px;
            color: #aaa;
            margin-top: 8px;
        }

        .sidebar .recent-posts ul li h5 {
            font-size: 19px;
            color: #20232e;
            line-height: 30px;
            transition: all 0.3s;
        }

        ul.page-numbers li.active a {
            background-color: #f48840;
            border-color: #f48840;
            color: #fff;
        }

        .sidebar .tags ul li a:hover {
            background-color: #f48840;
            border-color: #f48840;
            color: #fff;
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
                                <li class="breadcrumb-item"><a href="{{ URL::to('/') . '/' }}">Home</a></li>
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
    <section class="news-area section-padding-100 blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 p-listing">
                    <div class="all-blog-posts">
                        <div class="row align-items-end portfolio-items list-unstyled" id="grid">
                            @foreach ($response[2] as $blog)
                            <div class="col-lg-6" data-groups="[{{ $blog['category_id'] }},0]">
                                <div class="content" data-wow-delay="300ms"
                                    style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                                    <div class="blog-post one-blg hover14 column"
                                        style="border: 20px solid rgb(245, 245, 245);margin-bottom: 30px;">
                                        <div class="blog-thumb"><span class="ribbon3">{{ $blog['date'] }}</span>
                                            <figure><img src="{{ $api_url }}{{ $blog['image_path'] }}"
                                                    alt="{{ $blog['slug'] }}" style="height: 290px; width: 100%">
                                            </figure>
                                        </div>
                                        <div class="down-content"><span>{{ $blog['category'] }}</span><a
                                                href="{{ $blog['slug'] }}">
                                                <h4>{{ $blog['title'] }}</h4>
                                            </a>
                                            <p>{{ substr($blog['description'], 0, 120) }}...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            {{-- <div class="col-lg-12">
                                <ul class="page-numbers">
                                    <li><a href="https://www.free-css.com/free-css-templates">1</a></li>
                                    <li class="active"><a href="https://www.free-css.com/free-css-templates">2</a></li>
                                    <li><a href="https://www.free-css.com/free-css-templates">3</a></li>
                                    <li><a href="https://www.free-css.com/free-css-templates"><i
                                                class="fa fa-angle-double-right"></i></a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="row">
                            {{-- <div class="col-lg-12">
                                <div class="sidebar-item search">
                                    <form id="search_form" name="gs" method="post" action="#">
                                        <input type="text" name="q" class="searchText" placeholder="type to search..."
                                            autocomplete="on">
                                    </form>
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="sidebar-item categories">
                                    <div class="sidebar-heading">
                                        <h2>Categories</h2>
                                    </div>
                                    <div class="content">
                                        <ul class="portfolio-sorting">
                                            <li><a href="#" data-group="0">&nbsp;--&nbsp; ALL</a></li>
                                            @foreach ($response[1] as $category)
                                            <li><a href="#" data-group="{{ $category['id'] }}"
                                                    style='text-transform: uppercase'>&nbsp;-- {{
                                                    $category['title']
                                                    }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="sidebar-item recent-posts">
                                    <div class="sidebar-heading">
                                        <h2>Recent Posts</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach ($response[2] as $blog)
                                            <li><a href="{{ $blog['slug'] }}">
                                                    <h5>{{ $blog['title'] }}</h5>
                                                    <span>{{ $blog['date'] }}</span>
                                                </a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-lg-12">
                                <div class="sidebar-item tags">
                                    <div class="sidebar-heading">
                                        <h2>Tag</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li><a href="https://www.free-css.com/free-css-templates">Lifestyle</a></li>
                                            <li><a href="https://www.free-css.com/free-css-templates">Creative</a></li>
                                            <li><a href="https://www.free-css.com/free-css-templates">Inspiration</a>
                                            </li>
                                            <li><a href="https://www.free-css.com/free-css-templates">Motivation</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ##### News Area End ##### -->



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
    <script src="assets/js/jquery.shuffle.min.js"></script>
    <script src="assets/js/custom.min.js"></script>
</body>

</html>