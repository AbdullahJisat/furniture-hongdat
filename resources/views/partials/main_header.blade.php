<header class="header-area">
  <!-- Top Header Area -->
  @include('partials.header')

  <!-- Navbar Area -->
  <div class="credit-main-menu" id="sticker">
    <div class="classy-nav-container breakpoint-off">
      <div class="container">
        <!-- Menu -->
        <nav class="classy-navbar justify-content-between" id="creditNav">

          <!-- Navbar Toggler -->
          <div class="classy-navbar-toggler">
            <span class="navbarToggler"><span></span><span></span><span></span></span>
          </div>

          <!-- Menu -->
          <div class="classy-menu">

            <!-- Close Button -->
            <div class="classycloseIcon">
              <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
            </div>

            <!-- Nav Start -->
            <div class="classynav">
              <ul class='desktop-menu'>
                @include('partials.navlink')
              </ul>
              <ul class='mobile-menu'>
                @include('partials.navlink')
              </ul>
            </div>
            <!-- Nav End -->
          </div>

          @include('partials.contact')
        </nav>
      </div>
    </div>
  </div>
</header>