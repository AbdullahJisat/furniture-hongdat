<!-- Contact -->
<?php if (isset($response[0]) && !empty($response[0])) { ?>
<div class="contact">
  <a href="https://wa.me/+971559011255" target="_blank"><img src="{{URL::to('/').'/'}}assets/img/core-img/call2.png"
      alt="">{{$response[0]['mobile']}}</a>
</div>
<?php } else { ?>
<div class="contact">
  <a href="https://wa.me/+971559011255" target="_blank"><img src="{{URL::to('/').'/'}}assets/img/core-img/call2.png"
      alt=""> +971
    559011255</a>
</div>
<?php } ?>