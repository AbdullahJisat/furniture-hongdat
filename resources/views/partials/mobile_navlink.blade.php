<li><a href="{{URL::to('/').'/'}}">HOME</a></li>
<li><a href="about-us">ABOUT</a></li>
<li><a href="custom-furniture">CUSTOM MADE FURNITURE</a></li>
<li><a href="maintenance">MAINTENANCE</a></li>
<li><a href="fitout-decoration">FIT-OUT & DECORATION</a></li>


{{-- <li><a href="company-profile">COMPANY PROFILE</a></li> --}}
<li><a href="product">PROJECT</a>
    @if (isset($response[1]) && !empty($response[1]))

    <div class="megamenu">
        {{-- <ul class="single-mega cn-col-5">
            <p class='menu-p'>OUR PROJECTS</p>
            <p class='menu-sub-p' style=''>Browse our latest projects here</p>
        </ul> --}}
        <ul class="single-mega cn-col-8">


            @foreach ($response[1] as $m_category)
            <ul class="single-mega cn-col-5">
                <li>
                    <a href="product">


                        {{-- <div class="hover11 column img">
                            <figure><img src="{{$api_url}}{{$m_category['image_path']}}" alt=""
                                    style="width:168px; height:95px;">
                            </figure>

                        </div> --}}
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
            @endforeach

        </ul>
        {{-- <ul class="single-mega cn-col-1">
            <p class='menu-more-p'><a href='product' style='color: #e83b43;line-height: 15px;'>More Projects&nbsp;<i
                        class="fa fa-angle-double-right" aria-hidden="true"></i></a>
            </p>
        </ul> --}}
    </div>
    @endif
</li>

<li><a href="blog">BLOG</a></li>
<li><a href="contact-us">CONTACT US</a></li>