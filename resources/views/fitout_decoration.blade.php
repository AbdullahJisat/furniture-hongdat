<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Hong Dat Technical Works LLC | FIT-OUT & DECORATION</title>

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

        /* image style */
        .card {
            height: 200px;
            color: white;
            font-size: 40px;
            margin: 10px;
            flex: 200px 0 0;
        }

        .cards img {
            width: 100%;
            object-fit: cover;
        }

        .cards-wrapper {
            display: flex;
            transition: ease 0.5s;
        }

        .display-area {
            width: 100%;
            overflow-x: hidden;
        }

        .dots-wrapper {
            display: flex;
            justify-content: center;
            margin: auto;
        }

        .dot {
            border: none;
            background: rgba(0, 0, 0, 0.2);
            width: 20px;
            height: 20px;
            margin: 5px;
            border-radius: 50%;
            outline: none;
        }

        .dot:hover {
            background: rgba(0, 0, 0, 0.3);
        }

        .dot.active {
            background: rgba(0, 0, 0, 0.5);
        }

        .zoom:hover {
            -ms-transform: scale(1.5);
            /* IE 9 */
            -webkit-transform: scale(1.5);
            /* Safari 3-8 */
            transform: scale(1.5);
        }

        @media screen and (max-width: 375px) {
            .display-area {
                width: 100%;
                overflow-x: scroll;
            }
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
                        <h2>FIT-OUT & DECORATION</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ URL::to('/') . '/' }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Fit-Out & Decoration</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->





    <section class="features-area section-padding-100-0" style="padding-left: 20px;padding-right: 20px;">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12 single-widget-area cata-widget" style="border: 15px solid #f5f5f5;">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <div class="widget-heading">
                        <h4>Categories</h4>
                    </div>
                    <a class="nav-link active" id="office-tab" data-toggle="pill" href="#office" role="tab"
                        aria-controls="office" aria-selected="true">Office</a>
                    <a class="nav-link" id="apartment-tab" data-toggle="pill" href="#apartment" role="tab"
                        aria-controls="apartment" aria-selected="false">Apartment</a>
                    <a class="nav-link" id="villa-tab" data-toggle="pill" href="#villa" role="tab" aria-controls="villa"
                        aria-selected="false">Villa</a>
                    <a class="nav-link" id="shop-showroom-tab" data-toggle="pill" href="#shop-showroom" role="tab"
                        aria-controls="shop-showroom" aria-selected="false">Shop & Showroom</a>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12">
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- Office Tab Start -->
                    <div class="tab-pane fade show active" id="office" role="tabpanel" aria-labelledby="office-tab">
                        <h1 class="text-center">Office</h1>
                        <section>
                            <h2 class="title">Introduction to Fit-Out and Decoration Services</h2>
                            <p>Welcome to our realm of office transformation. Our fit-out and decoration services
                                redefine workspaces, seamlessly
                                blending functionality and aesthetics. Discover tailored solutions that elevate your
                                office environment.</p>
                        </section>
                        <section>
                            <h2 class="title">Description</h2>
                            <p>Experience the synergy of design and productivity as we craft offices that inspire
                                innovation. Our services encompass
                                spatial planning, furniture selection, color schemes, and more. Let us shape your office
                                into a hub of creativity and
                                efficiency.
                            </p>
                        </section>
                        <section>
                            <h2 class="title">Showcase of Completed Projects</h2>
                            <p>Explore a gallery of office transformations that reflect our design prowess. From
                                contemporary co-working spaces to
                                corporate boardrooms, each project narrates our commitment to crafting work environments
                                that align with your vision.
                            </p>
                        </section>
                        <section>
                            <div class="display-area" style="padding-left:5%">
                                <div class="cards-wrapper">
                                    @for ($i = 1; $i <= 6; $i++) <div class="card zoom zoom"><img
                                            src="{{ asset('assets/img/office/'.$i.'.jpg') }}" style="height: 290px;"
                                            alt="">
                                </div>
                                @endfor
                            </div>
                    </div>
    </section>
    <section>
        <h2 class="title">Call for Consultation</h2>
        <p>Ready to transform your office? Reach out for a consultation. Let our expertise in
            office fit-out and decoration create
            a workspace that fosters collaboration, productivity, and an engaging work culture.</p>
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
    </section>
    <section>
        <p>Unveil the potential of your office space with our expert fit-out and decoration
            services. Explore our Office Fit-Out &
            Decoration offerings and embark on a journey to redefine your workplace identity.
        </p>
    </section>
    </div>
    <!-- Office Tab End -->
    <!-- Apartment Tab Start -->
    <div class="tab-pane fade" id="apartment" role="tabpanel" aria-labelledby="apartment-tab">
        <h1 class="text-center">Apartment</h1>
        <section>
            <h2 class="title">Introduction to Fit-Out and Decoration Services</h2>
            <p>Experience the transformation of apartment living with our fit-out and decoration
                services. We bring design dreams to
                life, creating spaces that blend comfort, style, and functionality seamlessly.</p>
        </section>
        <section>
            <h2 class="title">Description</h2>
            <p>Step into a world of personalized aesthetics as we craft apartments that mirror your
                lifestyle. Our services encompass
                spatial optimization, furniture curation, color palettes, and more. Let us elevate your
                living spaces with creative
                design solutions.
            </p>
        </section>
        <section>
            <h2 class="title">Showcase of Completed Projects</h2>
            <p>Explore a gallery of apartment makeovers that highlight our design finesse. From cozy
                studios to spacious penthouses,
                each project reflects our commitment to shaping living environments that resonate with
                individuality.
            </p>
        </section>
        <section>
            <div class="display-area" style="padding-left:5%">
                <div class="cards-wrapper">
                    @for ($i = 1; $i <= 6; $i++) <div class="card zoom zoom"><img
                            src="{{ asset('assets/img/apartment/'.$i.'.jpg') }}" style="height: 290px;" alt="">
                </div>
                @endfor
            </div>
    </div>
    </section>
    <section>
        <h2 class="title">Call for Consultation</h2>
        <p>Ready to reimagine your apartment? Connect with us for a consultation. Let our expertise
            in apartment fit-out and
            decoration transform your living spaces into havens of comfort and style.</p>
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
    </section>
    <section>
        <p>Embark on a journey to redefine apartment living with our expert fit-out and decoration
            services. Discover our Apartment
            Fit-Out & Decoration offerings and take the first step towards a personalized living
            experience.
        </p>
    </section>
    </div>
    <!-- Apartment Tab End -->
    <!-- Villa Tab Start -->
    <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
        <h1 class="text-center">Villa</h1>
        <section>
            <h2 class="title">Introduction to Fit-Out and Decoration Services</h2>
            <p>Enter a world of luxury and sophistication with our villa fit-out and decoration
                services. We curate spaces that
                harmonize opulence, comfort, and functionality, reflecting the essence of villa living.
            </p>
        </section>
        <section>
            <h2 class="title">Description</h2>
            <p>Experience the fusion of aesthetics and lifestyle as we shape villas into bespoke havens.
                Our services encompass layout
                optimization, premium furniture selection, thematic detailing, and more. Let us elevate
                your villa to the pinnacle of
                elegance.
            </p>
        </section>
        <section>
            <h2 class="title">Showcase of Completed Projects</h2>
            <p>Explore a gallery of villa transformations that epitomize grandeur. From contemporary
                villas to traditional retreats,
                each project signifies our commitment to creating living spaces that resonate with
                extravagance.
            </p>
        </section>
        <section>
            <div class="display-area" style="padding-left:5%">
                <div class="cards-wrapper">
                    @for ($i = 1; $i <= 6; $i++) <div class="card zoom zoom"><img
                            src="{{ asset('assets/img/villa/'.$i.'.jpg') }}" style="height: 290px;" alt="">
                </div>
                @endfor
            </div>
    </div>
    </section>
    <section>
        <h2 class="title">Call for Consultation</h2>
        <p>Ready to elevate your villa's allure? Reach out for a consultation. Let our expertise in
            villa fit-out and decoration
            craft a living space that exudes luxury, comfort, and timeless charm.</p>
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
    </section>
    <section>
        <p>Elevate villa living to new heights with our expert fit-out and decoration services.
            Discover our Villa Fit-Out &
            Decoration offerings and embark on a journey to redefine villa elegance and opulence.
        </p>
    </section>
    </div>
    <!-- Villa Tab End -->
    <!-- Shop & Showroom Tab Start -->
    <div class="tab-pane fade" id="shop-showroom" role="tabpanel" aria-labelledby="shop-showroom-tab">
        <h1 class="text-center">Shop & Showroom</h1>
        <section>
            <h2 class="title">Introduction to Fit-Out and Decoration Services</h2>
            <p>Step into a world of captivating commerce with our shop and showroom fit-out and
                decoration services. We infuse retail
                spaces with innovation and style, creating environments that enthrall and engage
                customers.
            </p>
        </section>
        <section>
            <h2 class="title">Description</h2>
            <p>Experience the art of retail aesthetics as we curate shop and showroom spaces that leave
                lasting impressions. Our
                services encompass layout optimization, display arrangement, branding integration, and
                more. Let us elevate your retail
                space to captivate and convert.
            </p>
        </section>
        <section>
            <h2 class="title">Showcase of Completed Projects</h2>
            <p>Explore a gallery of retail transformations that reflect our design prowess. From chic
                boutiques to expansive showrooms,
                each project showcases our commitment to shaping shopping experiences that resonate with
                authenticity.
            </p>
        </section>
        <section>
            <div class="display-area" style="padding-left:5%">
                <div class="cards-wrapper">
                    @for ($i = 1; $i <= 6; $i++) <div class="card zoom zoom"><img
                            src="{{ asset('assets/img/shop/'.$i.'.jpg') }}" style="height: 290px;" alt="">
                </div>
                @endfor
            </div>
    </div>
    </section>
    <section>
        <h2 class="title">Call for Consultation</h2>
        <p>Ready to transform your retail space? Connect with us for a consultation. Let our
            expertise in shop and showroom fit-out
            and decoration create a retail environment that invites exploration and sparks
            purchasing intent.</p>
        <div class="row" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:10px; margin-bottom:20px">
            <div class="col-2 col-md-2">
                <img src="assets/img/avatar.jpg" alt=""
                    style="height: auto;max-width: 20%;border-radius: 100px; text-align:center">
            </div>
            <div class="col-8 col-md-8">
                <h6>Consultant</h6>
                <a aria-label="Chat on WhatsApp" href="https://wa.me/0559011255"> <img alt="Chat on WhatsApp"
                        src="assets/img/wp.png" style="height: auto;max-width: 15%;" />
                </a>
            </div>
        </div>
    </section>
    <section>
        <p>Elevate the allure of your retail space with our expert fit-out and decoration services.
            Discover our Shop & Showroom
            Fit-Out & Decoration offerings and embark on a journey to redefine retail environments
            that captivate and convert.
        </p>
    </section>
    </div>
    <!-- Shop & Showroom Tab End -->
    </div>
    </div>
    </div>
    </section>




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
    <script src="assets/js/jquery.shuffle.min.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script>
        const wrapper = document.querySelector('.cards-wrapper');
        // console.log(wrapper.clientWidth);

        // grab the dots
        const dots = document.querySelectorAll('.dot');
        // the default active dot num which is array[0]
        let activeDotNum = 0;

        dots.forEach((dot, idx) => {
            // number each dot according to array index
            dot.setAttribute('data-num', idx);

            // add a click event listener to each dot
            dot.addEventListener('click', (e) => {

                let clickedDotNum = e.target.dataset.num;
                // console.log(clickedDotNum);
                // if the dot clicked is already active, then do nothing
                if (clickedDotNum == activeDotNum) {
                    // console.log('active');
                    return;
                } else {
                    // console.log('not active');
                    // shift the wrapper
                    let displayArea = wrapper.parentElement.clientWidth;
                    // let pixels = -wrapper.clientWidth * clickedDotNum;
                    let pixels = -displayArea * clickedDotNum
                    wrapper.style.transform = 'translateX(' + pixels + 'px)';
                    // remove the active class from the active dot
                    dots[activeDotNum].classList.remove('active');
                    // add the active class to the clicked dot
                    dots[clickedDotNum].classList.add('active');
                    // now set the active dot number to the clicked dot;
                    activeDotNum = clickedDotNum;
                }

            });
        });
    </script>

</body>

</html>