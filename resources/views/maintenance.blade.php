<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Hong Dat Technical Works LLC | Maintenance</title>

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
                        <h2>MAINTENANCE</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ URL::to('/') . '/' }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Maintenance</li>
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
                    <a class="nav-link active" id="plumbing-tab" data-toggle="pill" href="#plumbing" role="tab"
                        aria-controls="plumbing" aria-selected="true">Plumbing</a>
                    <a class="nav-link" id="electrical-services-tab" data-toggle="pill" href="#electrical-services"
                        role="tab" aria-controls="electrical-services" aria-selected="false">Electrical Services</a>
                    <a class="nav-link" id="HVAC-system-tab" data-toggle="pill" href="#HVAC-system" role="tab"
                        aria-controls="HVAC-system" aria-selected="false">HVAC System Installation and
                        Maintenance</a>
                    <a class="nav-link" id="apartment-painting-tab" data-toggle="pill" href="#apartment-painting"
                        role="tab" aria-controls="apartment-painting" aria-selected="false">Apartment and Villa
                        Painting</a>
                    <a class="nav-link" id="furniture-painting-tab" data-toggle="pill" href="#furniture-painting"
                        role="tab" aria-controls="furniture-painting" aria-selected="false">Furniture Fixing and
                        Painting</a>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12">
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- Home Furniture Tab Start -->
                    <div class="tab-pane fade show active" id="plumbing" role="tabpanel" aria-labelledby="plumbing-tab">
                        <h1 class="text-center">Plumbing</h1>
                        <section>
                            <h2 class="title">Overview of Maintenance Services</h2>
                            <p>Our plumbing maintenance services are designed to ensure seamless water flow and prevent
                                disruptions. From routine
                                inspections to emergency repairs, we offer comprehensive solutions for residential,
                                commercial, and industrial plumbing
                                systems.</p>
                        </section>
                        <section>
                            <h2 class="title">Benefits of Regular Maintenance</h2>
                            <p> Regular plumbing maintenance prevents costly leaks, minimizes water wastage, and ensures
                                efficient water distribution.
                                It safeguards your property from potential water damage, enhancing the longevity of your
                                plumbing infrastructure.
                            </p>
                        </section>
                        <section>
                            <h2 class="title">Description of Plumbing Maintenance</h2>
                            <p>Our skilled technicians address a range of plumbing needs, including faucet repairs,
                                pipe replacements, drainage
                                cleaning, and more. We diagnose issues, implement solutions, and provide recommendations
                                to keep your plumbing system
                                running smoothly.</p>
                        </section>
                        <section>
                            <h2 class="title">Call for Maintenance Requests</h2>
                            <p>Need plumbing solutions? Connect with us for maintenance inquiries and requests. Our
                                team is ready to address your
                                plumbing concerns and provide timely solutions that preserve the integrity of your
                                property's water infrastructure.
                            </p>

                            <div class="row"
                                style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:10px; margin-bottom:20px">
                                <div class="col-2 col-md-2">
                                    <img src="assets/img/avatar.jpg" alt=""
                                        style="height: auto;max-width: 20%;border-radius: 100px; text-align:center">
                                </div>
                                <div class="col-8 col-md-8">
                                    <h6>Consultant</h6>
                                    <a aria-label="Chat on WhatsApp" href="https://wa.me/+971559011255"> <img
                                            alt="Chat on WhatsApp" src="assets/img/wp.png"
                                            style="height: auto;max-width: 15%;" />
                                    </a>
                                </div>
                            </div>
                        </section>
                        <section>
                            <p>
                                Ensure a hassle-free plumbing system with our expert maintenance services. Explore our
                                Plumbing Maintenance solutions
                                and take a proactive step towards efficient water management and property protection.
                            </p>
                        </section>
                    </div>
                    <!-- Home Furniture Tab End -->
                    <!--  Electrical Services Tab Start -->
                    <div class="tab-pane fade" id="electrical-services" role="tabpanel"
                        aria-labelledby="electrical-services-tab">
                        <h1 class="text-center">Electrical Services</h1>
                        <section>
                            <h2 class="title">Overview of Maintenance Services</h2>
                            <p>Our electrical maintenance services guarantee safe and uninterrupted power supply for
                                your property. From routine checks
                                to swift repairs, we offer comprehensive solutions for residential, commercial, and
                                industrial electrical systems.</p>
                        </section>
                        <section>
                            <h2 class="title">Benefits of Regular Maintenance</h2>
                            <p>Regular electrical maintenance ensures the safety of occupants, prevents electrical
                                hazards, and enhances energy
                                efficiency. It reduces the risk of power disruptions and extends the lifespan of your
                                electrical components.
                            </p>
                        </section>
                        <section>
                            <h2 class="title">Description of Electrical Services</h2>
                            <p>Our certified electricians handle various electrical needs, including wiring
                                inspections, circuit breaker replacements,
                                lighting installations, and more. We diagnose issues, implement solutions, and provide
                                recommendations to optimize your
                                electrical infrastructure.
                            </p>
                        </section>
                        <section>
                            <h2 class="title">Call for Maintenance Requests</h2>
                            <p>Need electrical solutions? Reach out to us for maintenance inquiries and requests. Our
                                experienced team is dedicated to
                                addressing your electrical concerns promptly, ensuring a secure and reliable power
                                environment.
                            </p>

                            <div class="row"
                                style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:10px; margin-bottom:20px">
                                <div class="col-2 col-md-2">
                                    <img src="assets/img/avatar.jpg" alt=""
                                        style="height: auto;max-width: 20%;border-radius: 100px; text-align:center">
                                </div>
                                <div class="col-8 col-md-8">
                                    <h6>Consultant</h6>
                                    <a aria-label="Chat on WhatsApp" href="https://wa.me/+971559011255"> <img
                                            alt="Chat on WhatsApp" src="assets/img/wp.png"
                                            style="height: auto;max-width: 15%;" />
                                    </a>
                                </div>
                            </div>
                        </section>
                        <section>
                            <p>
                                Secure your property's electrical integrity with our expert maintenance services.
                                Explore our Electrical Maintenance
                                solutions and take proactive measures towards a safe and efficient electrical system.
                            </p>
                        </section>
                    </div>
                    <!--  Electrical Services Tab End -->
                    <!-- HVAC System Installation and Maintenance Tab Start -->
                    <div class="tab-pane fade" id="HVAC-system" role="tabpanel" aria-labelledby="HVAC-system-tab">
                        <h1 class="text-center">HVAC System Installation and Maintenance</h1>
                        <section>
                            <h2 class="title">Overview of Maintenance Services</h2>
                            <p>Our HVAC system maintenance services guarantee optimal comfort and air quality for your
                                spaces. From installation to
                                regular servicing, we offer comprehensive solutions for residential, commercial, and
                                industrial HVAC systems.</p>
                        </section>
                        <section>
                            <h2 class="title">Benefits of Regular Maintenance</h2>
                            <p>Regular HVAC maintenance ensures efficient cooling, heating, and air circulation. It
                                improves indoor air quality,
                                reduces energy consumption, and extends the lifespan of your HVAC equipment.
                            </p>
                        </section>
                        <section>
                            <h2 class="title">Description of HVAC Services</h2>
                            <p>Our skilled technicians handle HVAC installation, servicing, and repairs. We address air
                                conditioning units, heating
                                systems, ventilation, and air quality control. Our goal is to create a comfortable and
                                energy-efficient indoor
                                environment.</p>
                        </section>
                        <section>
                            <h2 class="title">Call for Maintenance Requests</h2>
                            <p>Seeking HVAC solutions? Connect with us for maintenance inquiries and requests. Our team
                                is dedicated to providing
                                timely and effective HVAC services that ensure optimal climate control and air quality.
                            </p>

                            <div class="row"
                                style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:10px; margin-bottom:20px">
                                <div class="col-2 col-md-2">
                                    <img src="assets/img/avatar.jpg" alt=""
                                        style="height: auto;max-width: 20%;border-radius: 100px; text-align:center">
                                </div>
                                <div class="col-8 col-md-8">
                                    <h6>Consultant</h6>
                                    <a aria-label="Chat on WhatsApp" href="https://wa.me/+971559011255"> <img
                                            alt="Chat on WhatsApp" src="assets/img/wp.png"
                                            style="height: auto;max-width: 15%;" />
                                    </a>
                                </div>
                            </div>
                        </section>
                        <section>
                            <p>Experience enhanced indoor comfort with our expert HVAC maintenance services. Explore our
                                HVAC Maintenance solutions and
                                take a proactive step towards a space that's perfectly regulated and inviting.
                            </p>
                        </section>
                    </div>
                    <!-- HVAC System Installation and Maintenance Tab End -->
                    <!-- Apartment and Villa Painting Tab Start -->
                    <div class="tab-pane fade" id="apartment-painting" role="tabpanel"
                        aria-labelledby="apartment-painting-tab">
                        <h1 class="text-center">Apartment and Villa Painting</h1>
                        <section>
                            <h2 class="title">Overview of Maintenance Services</h2>
                            <p>Our apartment and villa painting maintenance services revitalize your living spaces with
                                a fresh coat of paint. From
                                color consultation to flawless execution, we offer comprehensive solutions to enhance
                                your property's aesthetics.</p>
                        </section>
                        <section>
                            <h2 class="title">Benefits of Regular Maintenance</h2>
                            <p>Regular painting maintenance enhances the visual appeal of your property, protects
                                surfaces from wear and tear, and
                                maintains a clean and inviting atmosphere. It adds value to your property and reflects
                                your personal style.
                            </p>
                        </section>
                        <section>
                            <h2 class="title">Description of Painting Services</h2>
                            <p>Our skilled painters handle a range of painting needs, including interior and exterior
                                painting, wall repairs, surface
                                preparation, and color selection. We bring vibrancy to your spaces with precision and
                                attention to detail.</p>
                        </section>
                        <section>
                            <h2 class="title">Call for Maintenance Requests</h2>
                            <p>Seeking painting solutions? Reach out to us for maintenance inquiries and requests. Our
                                experienced painters are
                                dedicated to transforming your spaces with a fresh palette, adding vibrancy and charm to
                                every corner.
                            </p>

                            <div class="row"
                                style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:10px; margin-bottom:20px">
                                <div class="col-2 col-md-2">
                                    <img src="assets/img/avatar.jpg" alt=""
                                        style="height: auto;max-width: 20%;border-radius: 100px; text-align:center">
                                </div>
                                <div class="col-8 col-md-8">
                                    <h6>Consultant</h6>
                                    <a aria-label="Chat on WhatsApp" href="https://wa.me/+971559011255"> <img
                                            alt="Chat on WhatsApp" src="assets/img/wp.png"
                                            style="height: auto;max-width: 15%;" />
                                    </a>
                                </div>
                            </div>
                        </section>
                        <section>
                            <p>Revitalize your spaces with our expert painting maintenance services. Explore our
                                Painting Maintenance solutions and
                                take a step towards a living environment that radiates beauty and warmth.
                            </p>
                        </section>
                    </div>
                    <!-- Apartment and Villa Painting Tab End -->
                    <!-- Furniture Fixing and Painting Tab Start -->
                    <div class="tab-pane fade" id="furniture-painting" role="tabpanel"
                        aria-labelledby="furniture-painting-tab">
                        <h1 class="text-center">Furniture Fixing and Painting</h1>
                        <section>
                            <h2 class="title">Overview of Maintenance Services</h2>
                            <p>Our furniture fixing and painting maintenance services restore the beauty and
                                functionality of your furniture pieces.
                                From repairs to refinishing, we offer comprehensive solutions to revitalize your
                                cherished items.</p>
                        </section>
                        <section>
                            <h2 class="title">Benefits of Regular Maintenance</h2>
                            <p>Regular furniture maintenance extends the lifespan of your pieces, prevents further
                                damage, and preserves their original
                                charm. It's a sustainable way to keep your furniture looking and functioning as good as
                                new.
                            </p>
                        </section>
                        <section>
                            <h2 class="title">Description of Furniture Maintenance</h2>
                            <p>Our skilled craftsmen handle various furniture needs, including fixing structural issues,
                                repairing finishes, and
                                repainting. We breathe new life into worn-out furniture, ensuring each piece regains its
                                original splendor.</p>
                        </section>
                        <section>
                            <h2 class="title">Call for Maintenance Requests</h2>
                            <p>Seeking furniture fixing and painting solutions? Connect with us for maintenance
                                inquiries and requests. Our dedicated
                                team is committed to transforming your furniture, bringing back its beauty and
                                functionality.
                            </p>

                            <div class="row"
                                style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:10px; margin-bottom:20px">
                                <div class="col-2 col-md-2">
                                    <img src="assets/img/avatar.jpg" alt=""
                                        style="height: auto;max-width: 20%;border-radius: 100px; text-align:center">
                                </div>
                                <div class="col-8 col-md-8">
                                    <h6>Consultant</h6>
                                    <a aria-label="Chat on WhatsApp" href="https://wa.me/+971559011255"> <img
                                            alt="Chat on WhatsApp" src="assets/img/wp.png"
                                            style="height: auto;max-width: 15%;" />
                                    </a>
                                </div>
                            </div>
                        </section>
                        <section>
                            <p>Rediscover the allure of your furniture with our expert fixing and painting maintenance
                                services. Explore our Furniture
                                Maintenance solutions and embark on a journey to preserving your furniture's charm and
                                value.
                            </p>
                        </section>
                    </div>
                    <!-- Furniture Fixing and Painting Tab End -->
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