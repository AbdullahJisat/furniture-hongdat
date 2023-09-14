<footer class="footer-area">
  <div class="container" style="padding-bottom: 10px;">
    <div class="row">
      <div class="col-lg-3 col-md-6 footer-main-widget">
        <div class="footer-widget">
          <div class="footer-logo">
            <a href="{{URL::to('/').'/'}}"><img src="{{URL::to('/').'/'}}assets/img/core-img/logo.png" alt=""></a>
          </div>

          <ul class="social-links">
            <li><a href="https://www.facebook.com/hongdat.uae" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://www.instagram.com/hongdat.uae/" target="_blank"><i class="fa fa-instagram"></i></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 footer-main-widget">
        <div class="footer-widget">
          <div class="widget-title">
            <h6>Site map</h6>
          </div>
          <ul class="footer-menu">
            <li><a href="{{URL::to('/').'/'}}">HOME</a></li>
            <li><a href="about-us">ABOUT</a></li>
            <li><a href="custom-furniture">CUSTOM MADE FURNITURE</a></li>
            <li><a href="maintenance">MAINTENANCE</a></li>
            <li><a href="fitout-decoration">FIT-OUT & DECORATION</a></li>
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
            <p><a href="tel:+971 559011255">+971 559011255</a></p>

            <p><a href="mailto:sales3.hongdat@gmail.com">sales3.hongdat@gmail.com</a></p>
          </div>
          <?php } ?>
        </div>
      </div>

    </div>
  </div>

  <!-- Copywrite Area -->
  <div class="copywrite-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="copywrite-content d-flex flex-wrap justify-content-between align-items-center">
            <!-- Footer Logo -->

            <!-- Copywrite Text -->
            <p class="copywrite-text">
              All rights reserved - Hong Dat Technical Works LLC © 2001 - <script>
                document.write(new Date().getFullYear());
              </script>.(Powered by <a href="https://abdullahjisat.github.io/me/" target="_blank"
                class="cpcompany">Appzgate</a> )
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>