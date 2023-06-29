<?php include('header.php'); ?>

<section class="user-profile section">
	<div class="container">
		<div class="row">		
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Edit Personal Info -->
				<div class="widget personal-info">
					<h3 class="widget-header user">Registration</h3>
					<form action="<?= base_url(); ?>/welcome/register" method="post">
						<!-- Name -->
						<div class="form-group">
						    <label for="first-name">Name</label>
						    <input type="text" class="form-control" id="name" name="name">
						</div>
						<!-- Name -->
						<div class="form-group">
						    <label for="first-name">Phone No.</label>
						    <input type="text" class="form-control" id="phone" name="phone">
						</div>
						<!-- Name -->
						<div class="form-group">
						    <label for="first-name">E-mail</label>
						    <input type="text" class="form-control" id="email" name="email">
						</div>
						<!-- New Password -->
						<div class="form-group">
						    <label for="new-password">Password</label>
						    <input type="password" class="form-control" id="new-password" name="password">
						</div>
						<!-- Confirm New Password -->
						<div class="form-group">
						    <label for="confirm-password">Confirm Password</label>
						    <input type="password" class="form-control" id="confirm-password" name="confirm-password">
						</div>
						<!-- File chooser -->
						<div class="form-group choose-file">
							<i class="fa fa-user text-center"></i>
						    <input type="file" class="form-control-file d-inline" id="input-file">
						 </div>
						
						<!-- Checkbox -->
						<div class="form-check">
						  <label class="form-check-label" for="hide-profile">
						    <input class="form-check-input" type="checkbox" value="" id="hide-profile">
						    Hide Profile from Public/Comunity
						  </label>
						</div>
						<hr data-content="OR" class="hr-text">
						<div class="form-group text-center">
							<button class="btn googlelogin"><i class="fa fa-google" aria-hidden="true"></i><strong>Google</strong></button>
							<button class="btn facebooklogin"><i class="fa fa-facebook" aria-hidden="true"></i><strong>Facebook</strong></button>
						    
						</div>
						
						<!-- Submit button -->
						<button class="btn logincolor">Register</button>
					</form>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
				<div class="sidebar">
					<div class="widget user-dashboard-profile">
						<h5 class="text-center">Already Registered?</h5>
						<p>Sign in to post your ad.</p>
						<button class="btn logincolor">Sign In</button>
					</div>
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
						<p>To enhance your Buy and sell experience and help you stay safe and secure, you now need to register to:</p>
						<ul>
							<li>
								<i class="fa fa-check-circle" aria-hidden="true"></i> My Ads</li>
							<li>
								<i class="fa fa-check-circle" aria-hidden="true"></i> Favourite Ads
							</li>
							<li>
								<i class="fa fa-check-circle" aria-hidden="true"></i>Archeved Ads
							</li>
							<li>
								<i class="fa fa-check-circle" aria-hidden="true"></i> Pending Approval
							</li>
							<li>
								<i class="fa fa-check-circle" aria-hidden="true"></i> Logout
							</li>
							<li>
								<i class="fa fa-check-circle" aria-hidden="true"></i>Delete Account
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include('footer.php'); ?>