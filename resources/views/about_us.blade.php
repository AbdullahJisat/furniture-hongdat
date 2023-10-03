<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Hong Dat Technical Works LLC | About Us</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/img/core-img/favicon.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

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

        .icon-size {
            font-size: 50px;

        }

        .about-content .read-more {
            /* white-space: inherit;
            overflow: hidden;
            text-overflow: ellipsis;
            height: 12.6em; */

            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            /* truncate to 5 lines */
            -webkit-line-clamp: 5;
        }
    </style>

    <!-- Google tag (gtag.js) -->
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
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

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
                        <h2>About us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
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
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="about-content mb-100">
                        <!-- Section Heading -->
                        <div class="section-heading text-center">
                            <div class="line"></div>
                            <div class="icon-size"><i class="fa fa-history" aria-hidden="true"></i></div>
                            <h2>History</h2>
                        </div>
                        <p class="mb-0 read-more"> Hong Dat Furniture has evolved from a legacy of excellence. Rooted in
                            the
                            foundation of Hong Dat Engineering PTE LTD,
                            established in 2000, our journey began with a specialization in electrical works. As our
                            expertise expanded, HD
                            Contractor PTE LTD was born in 2010, diversifying into Structural, Wet Trade, Fit Out, Main
                            Contracting, and more.
                            Today, Hong Dat Furniture stands as a testament to our commitment to
                            craftsmanship, innovation, and delivering
                            exceptional carpentry solutions.</p>
                        <a href="#" class="show_hide" data-content="toggle-text">Read More</a>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="about-content mb-100">
                        <!-- Section Heading -->
                        <div class="section-heading text-center">
                            <div class="line"></div>
                            <div class="icon-size"><i class="fa fa-bar-chart" aria-hidden="true"></i></div>
                            <h2>Mission</h2>
                        </div>
                        <p class="mb-0 read-more"> At Hong
                            Dat Furniture, our mission is to redefine spaces through impeccable
                            carpentry. We strive to transform interiors
                            into expressions of artistry and functionality. With a fusion of expertise, creativity, and
                            precision, we aim to create
                            bespoke furniture and solutions that enrich the lives of our clients. Our mission drives us
                            to continuously innovate,
                            elevate standards, and exceed expectations.</p>
                        <a href="#" class="show_hide" data-content="toggle-text">Read More</a>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="about-content mb-100">
                        <!-- Section Heading -->
                        <div class="section-heading text-center">
                            <div class="line"></div>
                            <div class="icon-size"><i class="fa fa-users" aria-hidden="true"></i></div>
                            <h2>Values</h2>
                        </div>
                        <p class="mb-0 read-more"> Craftsmanship: We uphold the art of carpentry, ensuring every
                            piece is a masterpiece of skill and dedication.
                            Quality: Excellence is our hallmark. We are dedicated to delivering the finest quality in
                            every project we undertake.
                            Innovation: Embracing creativity and innovation, we push boundaries to bring fresh ideas and
                            solutions to life.
                            Integrity: Trust is paramount. We operate with honesty, transparency, and a strong ethical
                            foundation.
                            Collaboration: Our strength lies in unity. We collaborate with clients, partners, and our
                            team to achieve collective
                            success.
                            Client-Centric: Our clients are at the heart of all we do. Their satisfaction and vision
                            drive our relentless pursuit of
                            perfection.
                            With a rich history, a forward-looking mission, and unwavering values, Hong Dat Furniture is
                            poised to continue crafting
                            exceptional spaces that leave a lasting impression.Client-Centric: Our clients are at the
                            heart of all we do. Their satisfaction
                            and vision drive our relentless pursuit of
                            perfection.
                            With a rich history, a forward-looking mission, and unwavering values, Hong Dat Furniture is
                            poised to continue crafting
                            exceptional spaces that leave a lasting impression</p>
                        <a href="#" class="show_hide" data-content="toggle-text">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ###### -->
    <!-- ##### Team Area Start ###### -->
    <section class="section-padding-100-0">
        <div class="container">
            <h3 class="text-center">Introduction to Team & Expertise</h3>
            <div style="height: 50px"><span></span></div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="about-thumbnail mb-100 hover13 column">

                        <div>
                            <figure><img src="assets/img/bg-img/22.jpg" style="object-fit: cover;position: absolute;
top: 50%;
left: 50%;
min-height: 100%;
transform: translate(-50%, -50%);" />
                            </figure>

                        </div>


                    </div>
                </div>

                <div class="col-12 col-md-6 pb-1">
                    <div class="pb-1">
                        <p style="font-size: 25px;font-weight: 700">Notable achievements and milestones.</p>
                        <p>
                            Throughout our journey, Hong Dat Furniture has achieved remarkable milestones that reflect
                            our
                            dedication to excellence
                            and innovation:</p>
                    </div>
                    <div class="pb-1">
                        <p style="font-size: 25px;font-weight: 700">Industry Recognition</p>
                        <p>Our work has garnered accolades and recognition within the interior design and carpentry
                            industry.</p>
                    </div>
                    <div class="pb-1">
                        <p style="font-size: 25px;font-weight: 700">Global Expansion</p>
                        <p>We expanded beyond Singapore to establish high-tech automation carpentry factories in Dubai
                            and
                            Auckland, reaffirming our commitment to international growth.</p>
                    </div>
                    <div class="pb-1">
                        <p style="font-size: 25px;font-weight: 700">Diverse Portfolio</p>
                        <p>From residential to commercial projects, our portfolio boasts a diverse range of successful
                            carpentry
                            solutions across various sectors.</p>
                    </div>
                    <div class="pb-1">
                        <p style="font-size: 25px;font-weight: 700">Client Partnerships</p>
                        <p>Collaborating with esteemed clients, architects, and designers, we've built enduring
                            partnerships
                            founded on trust and quality.</p>
                    </div>
                    <div class="pb-1">
                        <p style="font-size: 25px;font-weight: 700">Innovative Projects</p>
                        <p>Our team has led pioneering projects, incorporating cutting-edge technology and design trends
                            to
                            create unparalleled results.</p>
                    </div>
                    <div class="pb-1">
                        <p style="font-size: 25px;font-weight: 700">Sustainable Practices</p>
                        <p>We're committed to sustainable carpentry practices, striving to minimize our environmental
                            impact
                            while delivering top-notch solutions.</p>
                    </div>
                    <div class="pb-1">
                        <p style="font-size: 25px;font-weight: 700">Continuous Learning</p>
                        <p>Regular training and development programs ensure our team remains at the forefront of
                            industry
                            trends and techniques.</p>
                    </div>
                    <div class="pb-1">
                        <p style="font-size: 25px;font-weight: 700">Client Delight</p>
                        <p>The satisfaction of our clients stands as a testament to our commitment, as we consistently
                            exceed their
                            expectations.</p>
                        <p>These achievements and milestones underscore our relentless pursuit of excellence and our
                            dedication to shaping
                            exceptional spaces that inspire and endure.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Team Area End ###### -->

    <!-- ##### Call To Action Start ###### -->
    {{-- <section class="cta-area d-flex flex-wrap">
        <!-- Cta Content -->
        <div class="cta-content">
            <!-- Section Heading -->
            <div class="section-heading white">
                <div class="line"></div>
                <p>Bold desing and beyound</p>
                <h2>Some Milestones</h2>
            </div>
            <h6 class="mb-0">Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci,
                lobortis egestas sem. Duis non volutpat arcu, eu mollis tellus. Sed finibus aliquam neque sit amet sod
                ales. Maecenas sed magna tempor, efficitur maur is in, sollicitudin augue.</h6>

            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <!-- Single Cool Facts -->
                <div class="single-cool-fact white d-flex align-items-center mt-50">
                    <div class="scf-icon mr-15">
                        <i class="icon-piggy-bank"></i>
                    </div>
                    <div class="scf-text">
                        <h2><span class="counter">8710</span></h2>
                        <p>Clients</p>
                    </div>
                </div>
                <!-- Single Cool Facts -->
                <div class="single-cool-fact white d-flex align-items-center mt-50">
                    <div class="scf-icon mr-15">
                        <i class="icon-coin"></i>
                    </div>
                    <div class="scf-text">
                        <h2><span class="counter">35</span></h2>
                        <p>Creditors</p>
                    </div>
                </div>
                <!-- Single Cool Facts -->
                <div class="single-cool-fact white d-flex align-items-center mt-50">
                    <div class="scf-icon mr-15">
                        <i class="icon-diamond"></i>
                    </div>
                    <div class="scf-text">
                        <h2><span class="counter">12</span></h2>
                        <p>awards</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cta Thumbnail -->
        <div class="cta-thumbnail bg-img jarallax" style="background-image: url(assets/img/bg-img/19.jpg);"></div>
    </section> --}}
    <!-- ##### Call To Action End ###### -->

    <!-- ##### Call To Action Start ###### -->
    {{-- <section class="cta-2-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Cta Content -->
                    <div class="cta-content d-flex flex-wrap align-items-center justify-content-between">
                        <div class="cta-text">
                            <h4>Are you in need for a load? Get in touch with us.</h4>
                            <p>Morbi ut dapibus dui. Sed ut iaculis elit, quis varius mauris. Integer ut ultricies orci,
                                lobortis egestas sem.</p>
                        </div>
                        <div class="cta-btn">
                            <a href="#" class="btn credit-btn box-shadow">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ##### Call To Action End ###### -->




    <!-- ##### Footer Area Start ##### -->
    @include('partials.footer')
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

    <script>
        $(".show_hide").click(function () {
            $(this).text($(this).text() == 'Read More' ? 'Read Less' : 'Read More');
            $(this).prev('p').toggleClass("read-more");
        });
        // $(".show_hide").on("click", function() {
        //     $(this).text(function(i, t) {
        //         return t == 'Read Less' ? 'Read More' : 'Read Less';
        //     }).toggleClass("read-more");
        // });
    </script>
</body>

</html>