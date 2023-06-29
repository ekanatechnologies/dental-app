<?php include('header.php'); ?>
<section class="user-profile section">
	<div class="container">
		<div class="row">		
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Edit Personal Info -->
				<div class="widget personal-info">
					<h3 class="widget-header user">Sign In</h3>
					<?php echo $this->session->flashdata('email_sent'); ?>					
					<form action="<?= base_url(); ?>/login/index" method="post">
						<div class="form-group">
						    <label for="first-name">E-mail</label>
						    <input type="email" class="form-control" id="email" name="email">
						</div>
						<!-- New Password -->
						<div class="form-group">
						    <label for="new-password">Password</label>
						    <input type="password" class="form-control" id="password" name="password">
						</div>
						<div class="form-group text-center"><button class="btn btn-lg logincolor ">Sign</button>
						</div>
						</form>
						<hr data-content="OR" class="hr-text">
						<div class="form-group text-center">
							<a href="<?= base_url('welcome/auth/Google'); ?>"> <button class="btn googlelogin"><i class="fa fa-google" aria-hidden="true"></i><strong>Google</strong></button>
							</a>
							<a href="<?= base_url('welcome/auth/Facebook'); ?>">
							<button class="btn facebooklogin"><i class="fa fa-facebook" aria-hidden="true"></i><strong>Facebook</strong></button>
							</a>
						</div>
						<!-- Submit button -->
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
				<div class="sidebar">
					<div class="widget user-dashboard-profile">
						<h5 class="text-center">Not registered yet?</h5>
						<p>Register now to post, edit, and manage ads. It’s quick, easy, and free!</p>		
						<button class="btn logincolor" data-toggle="modal" data-target="#sign-up-in">Register Now</button>
					</div>
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
						<p><strong>Protect your account</strong></p> 
						Ensure that whenever you sign in to My Dental Buy & Sell , the web address in your browser starts with https://mydentalbuyandsell.com/</p>						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include('footer.php'); ?>