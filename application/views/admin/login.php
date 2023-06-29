<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/login/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/login/css/style.css">

    <title>Login to My dental Buy and Sell</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block text-center">
                  <div class="mb-4">
                    <img src="<?= base_url() ?>assets/login/images/logo.png" width="50%">
                  <h3>Sign In to <strong>My Dental Buy & Sell</strong></h3>
                </div>
                <form action="<?= base_url('Login'); ?>" method="post">
                  <div class="row">
                    <?php if($this->session->flashdata()){
                      ?>
                       <?php if($this->session->flashdata('success')){
                      ?>
                      <script>
                      swal({
                        title: "Congratulation",
                        text: "<?php echo $this->session->flashdata('success'); ?>",
                        button: false,
                        timer: 5000,
                      });
                      </script>
                      <span style="color:green;"> <?php echo $this->session->flashdata('success'); ?></span>

                    <?php } else { ?>
                      <script>
                      swal({
                        title: "Error",
                        text: "<?php echo $this->session->flashdata('error'); ?>",
                        button: false,
                        timer: 2000,
                      });
                      </script>
                       <span style="color:red;"> <?php echo $this->session->flashdata('error'); ?></span>
                   <?php } } ?>
                  </div>
                  <div class="form-group first">
                    <!-- <label for="username">Email Address</label> -->
                    <input type="text" name="email" class="form-control" id="username" placeholder="Enter Email Address">

                  </div>
                  <div class="form-group last mb-4">
                    <!-- <label for="password">Password</label> -->
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                    
                  </div>
                  <input type="submit" value="Log In" class="btn btn-pill text-white btn-block btn-primary">

                  
                  <div class="d-flex mb-5 align-items-center">
                    <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
                  </div>


                </form>
              </div>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
  </body>
</html>
<style type="text/css">
	input::-webkit-input-placeholder {
		font-size: 12px;

	}
</style>