<div class="top-header-area">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12 d-flex justify-content-between">
        <!-- Logo Area -->
        <div class="logo">
          <a href="{{ URL::to('/') . '/' }}"><img style="height: 80px;
  width: 100%;" src="assets/img/core-img/logonew.png" alt=""></a>
        </div>

        <!-- Top Contact Info -->
        <?php if (isset($response[0]) && !empty($response[0])) { ?>
        <div class="top-contact-info d-flex align-items-center">
          <a href="https://goo.gl/maps/EQ892o1HrS8aKq41A" target="_blank" data-toggle="tooltip" data-placement="bottom"
            title="{{ $response[0]['showroom_address'] }}"><img src="assets/img/core-img/placeholder.png" alt="">
            <span>{{ $response[0]['showroom_address'] }}</span></a>
          <a href="mailto:sales3.hongdat@gmail.com" data-toggle="tooltip" data-placement="bottom"
            title="{{ $response[0]['email'] }}"><img src="assets/img/core-img/message.png" alt="">
            <span>{{ $response[0]['email'] }}</span></a>
        </div>
        <?php } else { ?>
        <div class="top-contact-info d-flex align-items-center">
          <a href="https://goo.gl/maps/EQ892o1HrS8aKq41A" target="_blank" data-toggle="tooltip" data-placement="bottom"
            title="Shop08, F03, China Cluster, International City, Dubai, U.A.E"><img
              src="assets/img/core-img/placeholder.png" alt=""> <span>Shop08, F03, China Cluster, International City,
              Dubai, U.A.E</span></a>
          <a href="mailto:sales3.hongdat@gmail.com" data-toggle="tooltip" data-placement="bottom"
            title="sales3.hongdat@gmail.com"><img src="assets/img/core-img/message.png" alt="">
            <span>sales3.hongdat@gmail.com</span></a>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>