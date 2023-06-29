<?php include('header.php'); ?>

<section class="user-profile section">
	<div class="container">
		<div class="row">		
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Edit Personal Info -->
				<div class="widget personal-info">
					<h3 class="widget-header user">Reset your password</h3>
					<?php echo $this->session->flashdata('email_sent'); ?>
					
					<form action="#">
						<!-- New Password -->
						<div class="form-group">
						    <label for="new-password">Enter New Password</label>
						    <input type="password" class="form-control" id="password" name="password">
						</div>
							<div class="form-group">
						    <label for="new-password">Re-enter New Password</label>
						    <input type="password" class="form-control" id="password" name="password">
						</div>
						<!-- Submit button -->
						<button class="btn logincolor">Submit</button>
					</form>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
				<div class="sidebar">
					<div class="widget user-dashboard-profile">
						<h5 class="text-center">Not registered yet?</h5>
						<p>Register now to post, edit, and manage ads. It’s quick, easy, and free!</p>
						<button class="btn logincolor">Register Now</button>
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