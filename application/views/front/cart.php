<?php include('dashboard-header.php'); ?>
<!-- includes the Braintree JS client SDK -->
<!-- <script src="https://js.braintreegateway.com/web/dropin/1.30.1/js/dropin.min.js"></script> -->

<!-- includes jQuery -->
<!-- <script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script> -->

<!-- includes the Braintree JS client SDK -->
<script src="https://js.braintreegateway.com/web/dropin/1.30.1/js/dropin.min.js"></script>

<!-- includes jQuery -->
<script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>

<section class="user-profile section">
    <div class="container">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link btn btncolor" id="nav-dashboard-tab" data-toggle="tab" href="#nav-dashboard" role="tab" aria-controls="nav-dashboard" aria-selected="true">Dashboard</a>
                <a class="nav-item nav-link btn btncolor active" id="nav-activity-tab" data-toggle="tab" href="#nav-activity" role="tab" aria-controls="nav-activity" aria-selected="false">Activity</a> 
                <a class="nav-item nav-link btn btncolor" id="nav-accounts-tab" data-toggle="tab" href="#nav-accounts" role="tab" aria-controls="nav-accounts" aria-selected="false">Accounts</a>
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade" id="nav-dashboard" role="tabpanel" aria-labelledby="nav-dashboard-tab">

                <div class="row">
                    <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
                        <div class="sidebar">
                            <!-- User Widget -->
                            <div class="widget user-dashboard-profile">
                                <!-- User Image -->
                                <div class="profile-thumb">
                                <?php if (!empty(user_details()->image)) { ?>
                                    <img src="<?= base_url('assets/frontend/images/user/'); ?><?=user_details()->image;?>" alt="" class="rounded-circle">
                                <?php }else{ ?>
                                    <img src="<?= base_url('assets/frontend/images/user/'); ?>Sample_User_Icon.png" alt="" class="rounded-circle">
                                <?php } ?>
                                </div>
                                <!-- User Name -->
                                <h5 class="text-center"><?= user_details()->name; ?></h5>
                                <p>Joined
                                    <?=date('F d, Y', strtotime(user_details()->created_on));?>
                                </p>
                            </div>
                            <!-- Dashboard Links -->                     
                            <?php include 'profile-dashboard.php'; ?>
                            <!-- Dashboard Links -->
                        </div>
                    </div>
                    <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                            <!-- Edit Personal Info -->
                            <div class="widget personal-info">
                                <h3 class="widget-header user">Personal Information</h3>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>First Name</td>
                                            <td colspan="2"><?= user_details()->name; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Last Name</td>
                                            <td colspan="2"><?= user_details()->lastname; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td><?= user_details()->phone; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?= user_details()->email; ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- Change Password -->
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="nav-activity" role="tabpanel" aria-labelledby="nav-activity-tab">

                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
                            <div class="sidebar">                
                                <!-- Dashboard Links -->                     
                                <?php include('activity-links.php'); ?>                              
                                <!-- Dashboard Links -->
                            </div>
                        </div>
                        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                <!-- Recently Favorited -->
                <div class="widget dashboard-container my-adslist">
                    <h3 class="widget-header">My Cart</h3>
                    <table class="table table-responsive product-dashboard-table">
                        <thead>
                            <tr>
                                <th width="10%">Image</th>
                                <th width="30%">Product</th>
                                <th width="15%">Price</th>
                                <th width="13%">Quantity</th>
                                <th width="20%" class="text-right">Subtotal</th>
                                <th width="12%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){    ?>
                        <tr>
                            <td>
                                <?php $imageURL = !empty($item["image"])?base_url('assets/images/ads/'.$item["image"]):base_url('assets/images/avatars/no-image.jpg'); ?>
                                <img src="<?php echo $imageURL; ?>" width="50"/>
                            </td>
                            <td><?php echo $item["name"]; ?></td>
                            <td><?php echo '$'.$item["price"]; ?></td>
                            <td><input type="number" min="1" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                            <td class="text-right"><?php echo '$'.$item["subtotal"].' USD'; ?></td>
                            <td class="text-right"><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete item?')?window.location.href='<?php echo base_url('cart/removeItem/'.$item["rowid"]); ?>':false;"><i class="fa fa-trash"></i> </button> </td>
                        </tr>
                        <?php } }else{ ?>
                        <tr><td colspan="6" class="text-center"><p>Your cart is empty.....</p></td>
                        <?php } ?>
                        <?php if($this->cart->total_items() > 0){ ?>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><?php echo '$'.$this->cart->total(); ?></strong></td>  
                            <td></td>          
                            <td><strong><a href="<?= base_url('checkout');?>" class="btn btn-success btn-lg btn-block">Checkout</a></strong></td>
                            <td></td>
                            <td><strong><a href="<?=base_url('payment-options');?>" class="btn btn-success btn-lg btn-block">Payment Options</a></strong></td> 
                        </tr>   
                        <?php } ?>
                    </tbody>
                    </table>
                    <div id="dropin-wrapper">
                      <div id="checkout-message"></div>
                      <div id="dropin-container"></div>
                      <button class="btn btn-success btn-lg btn-block" id="submit-button">Submit payment</button>
                    </div>
                </div> 
            </div>       
        </div>
    </div>
<div class="tab-pane fade" id="nav-accounts" role="tabpanel" aria-labelledby="nav-accounts-tab">
    <div class="row">
        <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
            <div class="sidebar">                
                <!-- Dashboard Links -->                    
                <?php include('accounts-links.php'); ?>  
                <!-- Dashboard Links -->
            </div>
        </div>
        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                <!-- Edit Personal Info -->
                <div class="widget personal-info">
                <h3 class="widget-header user">Edit Personal Information</h3>
                    <?php echo form_open_multipart('Welcome/editprofile');?>
                        <!-- First Name -->
                        <div class="form-group">
                            <label for="name">First Name</label>
                            <input name="id" type="hidden" value="<?= user_details()->id; ?>"/>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" value="<?= user_details()->name; ?>">
                        </div>
                        
                        <!-- Last Name -->
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Your Last Name" value="<?= user_details()->lastname; ?>">
                        </div>
                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?= user_details()->email; ?>">
                        </div>
                        <!-- Phone -->                        
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone Number" value="<?= user_details()->phone; ?>">
                        </div>
                        <!-- File chooser -->
                        <div class="form-group choose-file">
                            <i class="fa fa-user text-center"></i>
                            <input name="userfile" type="file" class="form-control-file d-inline" >
                         </div>
                            <input type="hidden" name="image" class="form-control" id="image" placeholder="" value="<?= user_details()->image; ?>">                     
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-transparent">Save My Changes</button>
                    </form>
                </div>
                <!-- Change Password -->
                <div class="widget change-password">
                    <h3 class="widget-header user">Edit Password</h3>
                    <form action="<?php echo base_url('welcome/changePassword'); ?>" method="post">
                        <!-- Current Password -->
                        <div class="form-group">
                            <label for="current-password">Current Password</label>
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= user_details()->id; ?>" >
                            <input type="hidden" class="form-control" id="old-password" name="old-password" value="<?= user_details()->password; ?>" >
                            <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Current Password">
                        </div>
                        <!-- New Password -->
                        <div class="form-group"> 
                            <label for="new-password">New Password</label>
                            <input type="password" class="form-control" id="new-password" name="new-password" placeholder="New Password" required=""> 
                        </div>
                        <!-- Confirm New Password -->
                        <div class="form-group">
                            <label for="confirm-password">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required="">
                        </div>
                        <!-- Submit Button -->
                        <button class="btn btn-transparent">Change Password</button>
                    </form>
                </div>
            </div>
    </div>
</div>
</div>
</div>
</section>
<?php include('footer.php'); ?>
<!-- Script braintree drop-in payment  -->
<script>
  var button = document.querySelector('#submit-button');

  braintree.dropin.create({
    // Insert your tokenization key here
    authorization: 'sandbox_6msh4jh8_bdkn8m9hwn48jmn2',
    container: '#dropin-container'
  }, function (createErr, instance) {
    button.addEventListener('click', function () {
      instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
        // When the user clicks on the 'Submit payment' button this code will send the
        // encrypted payment information in a variable called a payment method nonce
        $.ajax({
          type: 'POST',
          url: '/checkout',
          data: {'paymentMethodNonce': payload.nonce}
        }).done(function(result) {
          // Tear down the Drop-in UI
          instance.teardown(function (teardownErr) {
            if (teardownErr) {
              console.error('Could not tear down Drop-in UI!');
            } else {
              console.info('Drop-in UI has been torn down!');
              // Remove the 'Submit payment' button
              $('#submit-button').remove();
            }
          });

          if (result.success) {
            $('#checkout-message').html('<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>');
          } else {
            console.log(result);
            $('#checkout-message').html('<h1>Error</h1><p>Check your console.</p>');
          }
        });
      });
    });
  });
</script>

