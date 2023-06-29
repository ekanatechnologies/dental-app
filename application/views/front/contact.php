<?php include('header.php'); ?>

<section class="user-profile section">
	<div class="container">
		<div class="row">		
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Edit Personal Info -->
				<div class="widget personal-info">
					<h3 class="widget-header user">Send an enquiry</h3>
					<form>
						<div class="form-group">
						    <label for="contactname">Name</label>
						    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="">
						</div>
						<!-- New Password -->
						<div class="form-group">
						    <label for="contactemail">Email Address</label>
						    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
						</div>
						<div class="form-group">
						    <label for="contactphone">Phone Number</label>
						    <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone Number" required="">
						</div>
						<div class="form-group">
						    <label for="contactsubject">Subject</label>
						    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required="">
						</div>
						<div class="form-group">
						    <label for="contactmessage">Message</label>
						    <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="Message" required=""></textarea>
						</div>
						<!-- Submit button -->
						<button class="btn logincolor" id="contact-us">Submit</button>
					</form>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
				<div class="sidebar">
					<div class="widget user-dashboard-profile">
						<h5 class="text-center">Contact Us</h5>
						<p><a href="mailto:info@mydentalbuyandsell.com">info@mydentalbuyandsell.com</a></p>
						<p><a href="tel:123-456-7890">123-456-7890</a></p>
						<p><strong>Address:</strong>136, Lorem Ipsume, Ave #300, Ontario, Canada</p>
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
