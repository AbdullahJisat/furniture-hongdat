<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Hong Dat Technical Works LLC | Custom Made Furniture</title>

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
                <div class="col-12 col-sm-12">
                    <div class="breadcrumb-content">
                        <h2>Custom Made Furniture</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ URL::to('/') . '/' }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Custom Made Furniture</li>
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
                    <a class="nav-link active" id="home-furniture-tab" data-toggle="pill" href="#home-furniture"
                        role="tab" aria-controls="home-furniture" aria-selected="true">Home Furniture</a>
                    <a class="nav-link" id="office-furniture-tab" data-toggle="pill" href="#office-furniture" role="tab"
                        aria-controls="office-furniture" aria-selected="false">Office Furniture</a>
                    <a class="nav-link" id="shop-furniture-tab" data-toggle="pill" href="#shop-furniture" role="tab"
                        aria-controls="shop-furniture" aria-selected="false">Shop & Showroom Furniture</a>
                    <a class="nav-link" id="hospital-furniture-tab" data-toggle="pill" href="#hospital-furniture"
                        role="tab" aria-controls="hospital-furniture" aria-selected="false">Hospital Furniture</a>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12">
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- Home Furniture Tab Start -->
                    <div class="tab-pane fade show active" id="home-furniture" role="tabpanel"
                        aria-labelledby="home-furniture-tab">
                        <h1 class="text-center">Home Furniture</h1>
                        <section>
                            <h2 class="title">Description</h2>
                            <p>Welcome to our curated collection of exquisite home furniture, meticulously designed to
                                transform your living spaces
                                into havens of comfort and style. Explore an array of elegantly crafted pieces that
                                seamlessly blend functionality with
                                aesthetic appeal.</p>
                        </section>
                        <section>
                            <h2 class="title">Showcase of Home Furniture</h2>
                            <p>Immerse yourself in the world of cozy living rooms, serene bedrooms, and inviting
                                dining
                                areas. Our showcase features a
                                diverse range of sofas, beds, dining sets, and more, each piece a testament to
                                our
                                dedication to quality craftsmanship.
                            </p>
                        </section>
                        <section>
                            <div class="display-area" style="padding-left:5%">
                                <div class="cards-wrapper">
                                    @for ($i = 1; $i <= 6; $i++) <div class="card zoom zoom"><img
                                            src="{{ asset('assets/img/custom-made/' . $i . '.jpg') }}"
                                            style="height: 290px;" alt="">
                                </div>
                                @endfor
                            </div>
                    </div>

                    {{-- <div class="dots-wrapper">
                        <button class="dot active"></button>
                        <button class="dot"></button>
                    </div> --}}
    </section>
    <section>
        <h2 class="title">Process of Customization and Design</h2>
        <p>Experience the joy of personalization as we guide you through the journey of creating
            bespoke home furniture. Our
            skilled artisans collaborate with you to understand your vision and preferences,
            resulting in furniture that is truly
            one-of-a-kind.</p>
    </section>
    <section>
        <h2 class="title">Call for Inquiries or Quotes</h2>
        <p>Ready to transform your home with custom furniture? Connect with us for inquiries,
            quotes, and consultations. Let us
            bring your dream furniture to life, tailored to your exact specifications and delivered
            with unmatched craftsmanship.
        </p>

        <div class="row" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:10px; margin-bottom:20px">
            <div class="col-2 col-md-2">
                <img src="assets/img/avatar.jpg" alt=""
                    style="height: auto;max-width: 20%;border-radius: 100px; text-align:center">
            </div>
            <div class="col-8 col-md-8">
                <h6>Ahmed</h6>
                <a aria-label="Chat on WhatsApp" href="https://wa.me/1XXXXXXXXXX"> <img alt="Chat on WhatsApp"
                        src="assets/img/wp.png" style="height: auto;max-width: 15%;" />
                </a>
            </div>
        </div>
    </section>
    <section>
        <p>
            Elevate your home with furniture that mirrors your personality and complements your
            lifestyle. Explore our Home
            Furniture collection and take the first step towards a living space that speaks volumes.
        </p>
    </section>
    </div>
    <!-- Home Furniture Tab End -->
    <!-- Office Furniture Tab Start -->
    <div class="tab-pane fade" id="office-furniture" role="tabpanel" aria-labelledby="office-furniture-tab">
        <h1 class="text-center">Office Furniture</h1>
        <section>
            <h2 class="title">Description</h2>
            <p>Step into a world of ergonomic excellence and professional aesthetics with our
                meticulously curated office furniture
                collection. Elevate your workspace with pieces designed to enhance productivity and
                elevate your brand image.</p>
        </section>
        <section>
            <h2 class="title">Showcase of Office Furniture</h2>
            <p>Discover a range of functional and stylish office solutions, from ergonomic chairs that
                support long hours to executive
                desks that command attention. Our showcase embodies the fusion of design and
                functionality.
            </p>
        </section>
        <section>
            <div class="display-area" style="padding-left:5%">
                <div class="cards-wrapper">
                    @for ($i = 1; $i <= 6; $i++) <div class="card zoom zoom"><img
                            src="{{ asset('assets/img/custom-made/' . $i . '.jpg') }}" style="height: 290px;" alt="">
                </div>
                @endfor
            </div>
    </div>
    </section>
    <section>
        <h2 class="title">Process of Customization and Design</h2>
        <p>Unlock a tailored office environment that aligns with your business identity. Our
            customization process involves a
            collaborative approach, ensuring your unique preferences and operational needs are met
            with precision.</p>
    </section>
    <section>
        <h2 class="title">Call for Inquiries or Quotes</h2>
        <p>Ready to redefine your office with bespoke furniture? Reach out for inquiries, quotes,
            and consultations. Let our
            expertise in crafting office furniture that combines form and function create a
            workspace that inspires success.
        </p>

        <div class="row" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:10px; margin-bottom:20px">
            <div class="col-2 col-md-2">
                <img src="assets/img/avatar.jpg" alt=""
                    style="height: auto;max-width: 20%;border-radius: 100px; text-align:center">
            </div>
            <div class="col-8 col-md-8">
                <h6>Ahmed</h6>
                <a aria-label="Chat on WhatsApp" href="https://wa.me/1XXXXXXXXXX"> <img alt="Chat on WhatsApp"
                        src="assets/img/wp.png" style="height: auto;max-width: 15%;" />
                </a>
            </div>
        </div>
    </section>
    <section>
        <p>
            Experience the power of thoughtfully designed office furniture that resonates with your
            brand ethos. Explore our Office
            Furniture collection and embark on a journey towards a workspace that mirrors
            professionalism and innovation.
        </p>
    </section>
    </div>
    <!-- Office Furniture Tab End -->
    <!-- Shop Furniture Tab Start -->
    <div class="tab-pane fade" id="shop-furniture" role="tabpanel" aria-labelledby="shop-furniture-tab">
        <h1 class="text-center">Shop & Showroom Furniture</h1>
        <section>
            <h2 class="title">Description</h2>
            <p>Step into a realm of retail elegance and display mastery with our captivating collection
                of shop and showroom furniture.
                Elevate your retail space's visual appeal and functionality with pieces designed to
                leave a lasting impression.</p>
        </section>
        <section>
            <h2 class="title">Showcase of Shop Furniture</h2>
            <p>Explore an array of displays, shelves, counters, and seating solutions that enhance your
                products' presentation. Our
                showcase embodies the art of visual merchandising, where design meets strategic layout.
            </p>
        </section>
        <section>
            <div class="display-area" style="padding-left:5%">
                <div class="cards-wrapper">
                    @for ($i = 1; $i <= 6; $i++) <div class="card zoom zoom"><img
                            src="{{ asset('assets/img/custom-made/' . $i . '.jpg') }}" style="height: 290px;" alt="">
                </div>
                @endfor
            </div>
    </div>
    </section>
    {{-- <section>
        <div class="display-area">
            <div class="cards-wrapper">

                <div class="card zoom zoom"><img src="{{ asset('assets/img/custom-made/1.jpg') }}" alt="">
                </div>
                <div class="card zoom"><img src="{{ asset('assets/img/custom-made/1.jpg') }}" alt=""></div>
                <div class="card zoom"><img src="{{ asset('assets/img/custom-made/1.jpg') }}" alt=""></div>
                <div class="card zoom"><img src="{{ asset('assets/img/custom-made/1.jpg') }}" alt=""></div>

                <div class="card zoom"><img src="{{ asset('assets/img/custom-made/1.jpg') }}" alt=""></div>
                <div class="card zoom"><img src="{{ asset('assets/img/custom-made/1.jpg') }}" alt=""></div>
                <div class="card zoom"><img src="{{ asset('assets/img/custom-made/1.jpg') }}" alt=""></div>
                <div class="card zoom"><img src="{{ asset('assets/img/custom-made/1.jpg') }}" alt=""></div>

                <div class="card zoom"><img src="{{ asset('assets/img/custom-made/1.jpg') }}" alt=""></div>
                <div class="card zoom"><img src="{{ asset('assets/img/custom-made/1.jpg') }}" alt=""></div>
                <div class="card zoom"><img src="{{ asset('assets/img/custom-made/1.jpg') }}" alt=""></div>
                <div class="card zoom"><img src="{{ asset('assets/img/custom-made/1.jpg') }}" alt=""></div>

                <div class="card zoom"><img src="{{ asset('assets/img/custom-made/1.jpg') }}" alt=""></div>
                <div class="card zoom"><img src="{{ asset('assets/img/custom-made/1.jpg') }}" alt=""></div>
                <div class="card zoom"><img src="{{ asset('assets/img/custom-made/1.jpg') }}" alt=""></div>
                <div class="card zoom"><img src="{{ asset('assets/img/custom-made/1.jpg') }}" alt=""></div>
            </div>
        </div>

        <div class="dots-wrapper">
            <button class="dot active"></button>
            <button class="dot"></button>
            <button class="dot"></button>
            <button class="dot"></button>
        </div>
    </section> --}}
    <section>
        <h2 class="title">Process of Customization and Design</h2>
        <p>Transform your retail space into a magnet for customers with bespoke furniture tailored
            to your brand's essence. Our
            design process merges creativity and practicality, ensuring your furniture complements
            your merchandise and store
            layout.</p>
    </section>
    <section>
        <h2 class="title">Call for Inquiries or Quotes</h2>
        <p>Ready to elevate your retail environment? Connect with us for inquiries, quotes, and
            consultations. Let our expertise in
            crafting shop and showroom furniture redefine your customer experience.
        </p>

        <div class="row" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:10px; margin-bottom:20px">
            <div class="col-2 col-md-2">
                <img src="assets/img/avatar.jpg" alt=""
                    style="height: auto;max-width: 20%;border-radius: 100px; text-align:center">
            </div>
            <div class="col-8 col-md-8">
                <h6>Ahmed</h6>
                <a aria-label="Chat on WhatsApp" href="https://wa.me/1XXXXXXXXXX"> <img alt="Chat on WhatsApp"
                        src="assets/img/wp.png" style="height: auto;max-width: 15%;" />
                </a>
            </div>
        </div>
    </section>
    <section>
        <p>
            Elevate your retail and showroom space with furniture that captures attention and
            enhances your brand's identity.
            Explore our Shop & Showroom Furniture collection and embark on a journey towards retail
            spaces that inspire and engage.
        </p>
    </section>
    </div>
    <!-- Shop Furniture Tab End -->
    <!-- Hospital Furniture Tab Start -->
    <div class="tab-pane fade" id="hospital-furniture" role="tabpanel" aria-labelledby="hospital-furniture-tab">
        <h1 class="text-center">Hospital Furniture</h1>
        <section>
            <h2 class="title">Description</h2>
            <p>Enter a realm of healthcare comfort and functionality with our thoughtfully designed
                hospital furniture collection.
                Elevate patient care and medical environments with pieces tailored for safety, hygiene,
                and soothing aesthetics.</p>
        </section>
        <section>
            <h2 class="title">Showcase of Hospital Furniture</h2>
            <p>Explore a range of hospital beds, bedside tables, examination chairs, and more that cater
                to the unique needs of medical
                facilities. Our showcase reflects a commitment to enhancing patient well-being and
                healthcare efficiency.
            </p>
        </section>
        <section>
            <div class="display-area" style="padding-left:5%">
                <div class="cards-wrapper">
                    @for ($i = 1; $i <= 6; $i++) <div class="card zoom zoom"><img
                            src="{{ asset('assets/img/custom-made/' . $i . '.jpg') }}" style="height: 290px;" alt="">
                </div>
                @endfor
            </div>
    </div>
    </section>
    <section>
        <h2 class="title">Process of Customization and Design</h2>
        <p>Partner with us to create a healing environment that adheres to medical standards and
            patient comfort. Our customization
            process ensures hospital furniture that promotes patient care and complements your
            facility's design.</p>
    </section>
    <section>
        <h2 class="title">Call for Inquiries or Quotes</h2>
        <p>Ready to enhance your healthcare space with tailored hospital furniture? Reach out for
            inquiries, quotes, and
            consultations. Let our expertise in crafting hospital furniture elevate patient
            experiences and medical functionality.
        </p>

        <div class="row" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:10px; margin-bottom:20px">
            <div class="col-2 col-md-2">
                <img src="assets/img/avatar.jpg" alt=""
                    style="height: auto;max-width: 20%;border-radius: 100px; text-align:center">
            </div>
            <div class="col-8 col-md-8">
                <h6>Ahmed</h6>
                <a aria-label="Chat on WhatsApp" href="https://wa.me/1XXXXXXXXXX"> <img alt="Chat on WhatsApp"
                        src="assets/img/wp.png" style="height: auto;max-width: 15%;" />
                </a>
            </div>
        </div>
    </section>
    <section>
        <p>
            Experience the power of purpose-built hospital furniture that optimizes care delivery.
            Explore our Hospital Furniture
            collection and embark on a journey towards healthcare spaces that prioritize healing and
            well-being.
        </p>
    </section>
    </div>
    <!-- Hospital Furniture Tab End -->
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