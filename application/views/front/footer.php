  <!--========   Footer  =============-->
  <style type="text/css">
    .footer{
        margin-bottom: -65px;
    }
  </style>
  <footer class="footer section section-sm">
    <!-- Container Start -->
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
          <!-- About -->
          <div class="block about">
            <!-- footer logo -->
            <img src="<?= base_url('assets/frontend/'); ?>images/logo.png" alt="">
            <!-- description -->
            <p class="alt-color">We Empower People and Create Economic Opportunity For All.<br><?= company_details()->address;?><br>
            <strong>Phone: </strong><?= company_details()->phone; ?><br>
            <strong>Email: </strong><?= company_details()->email; ?><br>
          </p></p>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-2 offset-lg-1 col-md-3">
        <div class="block">
          <h4>Site Pages</h4>
          <ul>
            <li><a href="<?= base_url(); ?>">Home</a></li>
            <li><a href="<?= base_url('about-us'); ?>">About Us</a></li>
            <li><a href="<?= base_url('contact-us'); ?>">Contact us</a></li>
            <li><a href="<?= base_url('privacy-policy'); ?>">Privacy Policy</a></li>
            <li><a href="<?= base_url('terms-condition'); ?>">Terms of Services</a></li>
          </ul>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0">
        <div class="block">
          <h4>Admin Pages</h4>
          <ul>
            <li><a href="<?=base_url('package')?>">Our Subscription Plans</a></li>
            <li><a href="<?=base_url('flipbooks');?>">Our Flipbooks</a></li>
            <li><a href="#">Deals & Coupons</a></li>
            <li><a href="#">Articls & Tips</a></li>
            <li><a href="<?= base_url('terms-condition'); ?>">Terms of Services</a></li>
          </ul>
        </div>
      </div>
      <!-- Promotion -->
      <div class="col-lg-4 col-md-7">
        <!-- App promotion -->
        <div class="block app-promotion">
          <h4>Our Newsletter</h4>
          <p>For company news, culture, and career opportunities.</p>
          <form action="" method="post" class="form-inline">
            <input class="form-control" type="email" name="email">
            <input class="form-control logincolor" type="submit" value="Subscribe">
          </form>
          <p>Get the Dealsy Mobile App and Save more</p>
          <h4> Follow Us </h4>
          <ul style="float: left !important;" class="social-media-icons">
            <li><a target="_blank" class="fa fa-facebook" href=""></a></li>
            <li><a  target="_blank" class="fa fa-twitter" href=""></a></li>
            <li><a target="_blank"  class="fa fa-instagram" href=""></a></li>
            <li><a target="_blank"  class="fa fa-youtube" href=""></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Container End -->
</footer>
<!-- Footer Bottom -->
<footer class="footer-bottom">
  <!-- Container Start -->
  <div class="container">
    <div class="row text-center">
      <div class="col-sm-12 col-12">
        <!-- Copyright -->
        <div class="copyright">
          <p>Copyright © <?= date('Y'); ?> | My Dental Buy & Sell. All Rights Reserved</p>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Container End -->
  <!-- To Top -->
  <div class="top-to">
    <a id="top" class="" href="#logo"><i class="fa fa-angle-up"></i></a>
  </div>
</footer>

<!-- JAVASCRIPTS -->
<script src="<?= base_url('assets/frontend/'); ?>plugins/tether/js/tether.min.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>plugins/raty/jquery.raty-fa.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>plugins/bootstrap/dist/js/popper.min.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>plugins/bootstrap/dist/js/bootstrap-slider.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>plugins/slick-carousel/slick/slick.min.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>js/scripts.js"></script>
<script src="<?= base_url('assets/frontend/'); ?>js/custom-scripts.js"></script>



<!-- Modal -->
<div class="modal fade" id="sign-in-up" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">My Dental Buy & Sell</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
          <br>


          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sign In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

             <form action="<?= base_url(); ?>login/index" method="post">
              <div class="sign-in-wrapper">
        <!-- <a href="#0" class="social_bt facebook">Login with Facebook</a>
          <a href="#0" class="social_bt google">Login with Google</a> -->
          <!-- <div class="divider"><span>Or</span></div> -->
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="email">
            <i class="icon_mail_alt" style="top: 34px !important;"></i>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" id="password">
            <i class="icon_lock_alt" style="top: 34px !important;"></i>
          </div>
          <div class="clearfix add_bottom_15">
            <div class="checkboxes float-left">
              <label class="container_check">Remember me
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="float-right mt-1"><a id="forgot" href="<?=base_url('forgotpassword');?>">Forgot Password?</a></div>
          </div>
          <div class="text-center"><input type="submit" value="Log In" class="btn signincolor"></div>
        </div>
      </form>

    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <form  action="<?= base_url(); ?>/welcome/register" method="post" autocomplete="off">
        <div class="form-group">
          <input class="form-control" type="text" placeholder="First Name" name="name" id="name" required autocomplete="off">
          <i class="ti-user"></i>
        </div>
        <div class="form-group">
          <input class="form-control" type="text" placeholder="Last Name" name="lastname" id="lastname" required autocomplete="off">
          <i class="ti-user"></i>
        </div>
        <div class="form-group">
          <input class="form-control" type="Number" placeholder="Phone Number" name="phone" id="phone"  required autocomplete="off">
          <i class="ti-user"></i>
        </div>
        <div class="form-group">
          <input class="form-control" type="email" placeholder="Email" name="email" id="email" required autocomplete="off">
          <i class="icon_mail_alt"></i>
        </div>
        <div class="form-group">
          <input class="form-control" type="password" id="password_re" name="password" placeholder="Password" required autocomplete="off">
          <i class="icon_lock_alt"></i>
        </div>
        <div class="form-group">
          <input class="form-control" type="password" id="confirm_password"  name="confirm_password" placeholder="Confirm Password" required autocomplete="off">
          <i class="icon_lock_alt"></i>
          <div id="divCheckPassword"></div>
        </div>
        <div class="text-center"><input id="submit_register" type="submit" value="Register Now!" class="btn_1 full-width"></div>

      </form>
    </div>
  </div>
  <!--form -->
</div>
</div>
</div>
</div>
</div>
<!-- Modal end -->
 
 <!-- Modal -->
<div class="modal fade" id="sign-up-in" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">My Dental Buy & Sell</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
          <br>


          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile" aria-selected="true">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="home-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home" aria-selected="false">Sign In</a>
            </li>            
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home1" role="tabpanel" aria-labelledby="home-tab">

             <form action="<?= base_url(); ?>login/index" method="post">
              <div class="sign-in-wrapper">
        <!-- <a href="#0" class="social_bt facebook">Login with Facebook</a>
          <a href="#0" class="social_bt google">Login with Google</a> -->
          <!-- <div class="divider"><span>Or</span></div> -->
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="email">
            <i class="icon_mail_alt" style="top: 34px !important;"></i>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" id="password">
            <i class="icon_lock_alt" style="top: 34px !important;"></i>
          </div>
          <div class="clearfix add_bottom_15">
            <div class="checkboxes float-left">
              <label class="container_check">Remember me
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="float-right mt-1"><a id="forgot" href="<?=base_url('forgotpassword');?>">Forgot Password?</a></div>
          </div>
          <div class="text-center"><input type="submit" value="Log In" class="btn signincolor"></div>
        </div>
      </form>

    </div>
    <div class="tab-pane fade show active" id="profile1" role="tabpanel" aria-labelledby="profile-tab">
      <form  action="<?= base_url(); ?>/welcome/register" method="post" autocomplete="off">
        <div class="form-group">
          <input class="form-control" type="text" placeholder="First Name" name="name" id="name" required autocomplete="off">
          <i class="ti-user"></i>
        </div>
        <div class="form-group">
          <input class="form-control" type="text" placeholder="Last Name" name="lastname" id="lastname" required autocomplete="off">
          <i class="ti-user"></i>
        </div>
        <div class="form-group">
          <input class="form-control" type="Number" placeholder="Phone Number" name="phone" id="phone"  required autocomplete="off">
          <i class="ti-user"></i>
        </div>
        <div class="form-group">
          <input class="form-control" type="email" placeholder="Email" name="email" id="email" required autocomplete="off">
          <i class="icon_mail_alt"></i>
        </div>
        <div class="form-group">
          <input class="form-control" type="password" id="password_re" name="password" placeholder="Password" required autocomplete="off">
          <i class="icon_lock_alt"></i>
        </div>
        <div class="form-group">
          <input class="form-control" type="password" id="confirm_password"  name="confirm_password" placeholder="Confirm Password" required autocomplete="off">
          <i class="icon_lock_alt"></i>
          <div id="divCheckPassword"></div>
        </div>
        <div class="text-center"><input id="submit_register" type="submit" value="Register Now!" class="btn_1 full-width"></div>

      </form>
    </div>
  </div>
  <!--form -->
</div>
</div>
</div>
</div>
</div>
<!-- Modal end -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Reset your password</h4>
      </div>
      <div class="modal-body">         
          <form id="resetPassword" name="resetPassword" method="post" action="<?php echo base_url();?>user/ForgotPassword" onsubmit ='return validate()'>
         <table class="table table-bordered table-hover table-striped">                                   
            <tbody>
              <tr>
                <td>Enter Email: </td>
                <td><input type="email" name="email" id="email" style="width:250px" required></td>
                <td><input type = "submit" value="submit" class="button"></td>
              </tr>                   
              </tbody>
        </table>
      </form> 
          <div id="fade" class="black_overlay"></div>                       
        </div>  
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>    
      </div>
    </div>
  </div>
</div>


<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<!-- Template Main JS File -->
<script>
  var x = document.getElementById("address");
  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
      x.value  = "Geolocation is not supported by this browser.";
    }
  }

  function showPosition(position) {
    x.value  = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
  }
</script>

<script>
  $('#submit_register').prop('disabled' , true);
  $('#confirm_password').on('keyup', function () {
    var password = $("#password_re").val();
    var confirmPassword = $("#confirm_password").val();

    if (password != confirmPassword) {
      $("#divCheckPassword").html("Passwords do not match!");
    } else {
      $("#divCheckPassword").html("Passwords match.");
      $('#submit_register').prop('disabled' , false);
    }
  });
</script>

<script>
  var BASE_URL = "<?php echo base_url(); ?>";
  $(document).ready(function() {
    $( "#search" ).autocomplete({
      source: function(request, response) {
        $.ajax({
          url: BASE_URL + "welcome/searchlocation",
          data: {
            term : request.term
          },
          dataType: "json",
          success: function(data){
           var resp = $.map(data,function(obj){
            return obj.city;
          });           
           response(resp);
         }
       });
      },
      minLength: 3
    });
  });

</script> 
<?php
if(is_logged_in()) {
  ?>
  <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1557232134/toasty.css" rel="stylesheet" />
  <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1557232134/toasty.js"></script>
  <button style="display: none;" type="button" id="successtoast" class="btn btn-success btn-icon-text"> <i class="fa fa-check btn-icon-prepend"></i>New Chat For Ad</button> 

  <script> 
    $(document).ready(function() {
      function getnewchats(){
        $.ajax({
              //dataType : "json",
              url: '<?= base_url('get-new-chat'); ?>',
              success:function(data)
              {
                if(data >= 1)
                {
                  show_chat_msg();
                }                
              },
              error: function (jqXHR, status, err) {
               // alert('Local error callback');
             }
           });
      }
      setInterval(function(){ 
        getnewchats();
      }, 3000);

    });
    $(document).ready(function() {
  //success toast
  var options = {
    autoClose: true,
    progressBar: true,
    enableSounds: true,
    action:'https://google.com',
    sounds: {

      info: "https://res.cloudinary.com/dxfq3iotg/video/upload/v1557233294/info.mp3",
  // path to sound for successfull message:
  success: "https://res.cloudinary.com/dxfq3iotg/video/upload/v1557233524/success.mp3",
  // path to sound for warn message:
  warning: "https://res.cloudinary.com/dxfq3iotg/video/upload/v1557233563/warning.mp3",
  // path to sound for error message:
  error: "https://res.cloudinary.com/dxfq3iotg/video/upload/v1557233574/error.mp3",
},
};
var toast = new Toasty(options);
toast.configure(options);
$('#successtoast').click(function() {
  toast.success("New Chat For Posted Ad");
});
});
</script> 
<script>
  function show_chat_msg(){
    jQuery(function(){
     jQuery('#successtoast').click();
   });  
  }
</script>
<?php } ?>

<!-- <?php
  if(!empty($prices)){
    ?>

    $( "#slider-range" ).slider({
      range: true,
      min: <?php echo $prices['min_price'];?>,
      max: <?php echo $prices['max_price'];?>,
      values: [ <?php echo $prices['min_price'];?>, <?php echo $prices['max_price'];?> ],
      slide: function( event, ui ) {
        $( "#amount" ).val(ui.values[ 0 ] + ' - ' +ui.values[ 1 ] );
        product_filter();
      }
    });
    $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) + ' - ' + $( "#slider-range" ).slider( "values", 1 ) );
    <?php
  }
  ?> -->
  <script type="text/javascript">
    // Update item quantity
function updateCartItem(obj, rowid){
  $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
      if(resp == 'ok'){
          window.location.reload();
      }else{
          alert('Cart update failed, please try again.');
      }
  });
}
  </script>

</body>
</html>