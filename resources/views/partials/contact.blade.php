<!-- Contact -->
<?php if (isset($response[0]) && !empty($response[0])) { ?>
<div class="contact">
  <a href="tel:+971 559011255"><img src="{{URL::to('/').'/'}}assets/img/core-img/call2.png"
      alt="">{{$response[0]['mobile']}}</a>
</div>
<?php } else { ?>
<div class="contact">
  <a href="tel:+971 559011255"><img src="{{URL::to('/').'/'}}assets/img/core-img/call2.png" alt=""> +971 559011255</a>
</div>
<?php } ?>