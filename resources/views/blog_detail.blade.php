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



    <!-- Favicon -->
    <link rel="icon" href="assets/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="plugins/css/style.css">

    <style>
        .blog-posts .blog-post {
            margin-bottom: 30px;
        }

        .blog-posts .blog-thumb img {
            width: 100%;
            overflow: hidden;
        }

        .blog-posts .down-content {
            padding: 40px;
            border-right: 1px solid #eee;
            border-left: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .blog-posts .down-content a {
            text-decoration: none !important;
        }

        .blog-posts .down-content ul.post-info li a {
            font-size: 14px;
            color: #aaa;
            font-weight: 400;
            transition: all .3s;
        }

        .blog-posts .down-content span {
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 900;
            color: #f48840;
        }

        .blog-posts .down-content h4 {
            font-size: 20px;
            letter-spacing: 0.25px;
        }

        ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .grid-system .down-content ul.post-info li {
            margin-right: 3px;
        }

        .blog-posts .down-content p {
            padding: 25px 0px;
            margin: 25px 0px;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .sidebar {
            margin-left: 30px;
        }

        .sidebar .search {
            margin-top: 0;
        }

        .sidebar .sidebar-item {
            margin-top: 50px;
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

        .sidebar .sidebar-heading h2 {
            font-size: 18px;
            text-transform: uppercase;
            font-weight: 900;
            letter-spacing: 0.5px;
            color: #20232e;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .sidebar .recent-posts ul li h5 {
            font-size: 19px;
            color: #20232e;
            line-height: 30px;
            transition: all 0.3s;
        }

        .sidebar .recent-posts ul li span {
            display: block;
            font-size: 14px;
            color: #aaa;
            margin-top: 8px;
        }

        .sidebar .recent-posts ul li {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .sidebar .sidebar-heading h2 {
            font-size: 18px;
            text-transform: uppercase;
            font-weight: 900;
            letter-spacing: 0.5px;
            color: #20232e;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .sidebar .categories ul li {
            margin-bottom: 15px;
        }

        .sidebar .sidebar-heading h2 {
            font-size: 18px;
            text-transform: uppercase;
            font-weight: 900;
            letter-spacing: 0.5px;
            color: #20232e;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .sidebar .tags ul li {
            margin-bottom: 10px;
            margin-right: 6px;
            display: inline-block;
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

        .sidebar .tags ul li a:hover {
            background-color: #f48840;
            border-color: #f48840;
            color: #fff;
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

    <!-- ##### Post Details Area Start ##### -->
    <section class="post-news-area section-padding-100-0 blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" style="margin-top: 5%;">
                    <div class="all-blog-posts">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb"><img src="{{$api_url}}{{$response[3]['image_path']}}"
                                            alt="{{ $response[3]['slug'] }}"></div>
                                    <div class="down-content"><span>Lifestyle</span><a href="post-details.php">
                                            <h4>{!! $response[3]['title'] !!}</h4>
                                        </a>
                                        <ul class="post-info">
                                            <li>{{ $response[3]['date'] }}</li>
                                        </ul>
                                        <p>{!! $response[3]['content'] !!}</p>
                                    </div>
                                </div>
                            </div>
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
                                <div class="sidebar-item categories">
                                    <div class="sidebar-heading">
                                        <h2>Categories</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li><a href="https://www.free-css.com/free-css-templates">- Nature
                                                    Lifestyle</a></li>
                                            <li><a href="https://www.free-css.com/free-css-templates">- Awesome
                                                    Layouts</a></li>
                                            <li><a href="https://www.free-css.com/free-css-templates">- Creative
                                                    Ideas</a></li>
                                            <li><a href="https://www.free-css.com/free-css-templates">- Responsive
                                                    Templates</a>
                                            </li>
                                            <li><a href="https://www.free-css.com/free-css-templates">- HTML5 / CSS3
                                                    Templates</a>
                                            </li>
                                            <li><a href="https://www.free-css.com/free-css-templates">- Creative &amp;
                                                    Unique</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="col-lg-12">
                                <div class="sidebar-item tags">
                                    <div class="sidebar-heading">
                                        <h2>Tag Clouds</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li><a href="https://www.free-css.com/free-css-templates">Lifestyle</a></li>
                                            <li><a href="https://www.free-css.com/free-css-templates">Creative</a></li>
                                            <li><a href="https://www.free-css.com/free-css-templates">HTML5</a></li>
                                            <li><a href="https://www.free-css.com/free-css-templates">Inspiration</a>
                                            </li>
                                            <li><a href="https://www.free-css.com/free-css-templates">Motivation</a>
                                            </li>
                                            <li><a href="https://www.free-css.com/free-css-templates">PSD</a></li>
                                            <li><a href="https://www.free-css.com/free-css-templates">Responsive</a>
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
    <!-- ##### Post Details Area End ##### -->



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
</body>

</html>