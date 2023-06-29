<?php include('dashboard-header.php'); ?>

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
					<!-- User Name -->
					<h5 class="text-center"><?= user_details()->name; ?></h5>
					<p>Joined
					<?php $yrdata = strtotime(user_details()->created_on);
					    echo date('F d, Y', $yrdata); ?>					
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
				<h3 class="widget-header user">Edit Personal Information</h3>
				<?php echo form_open_multipart('Welcome/editprofile');?>

					<!-- First Name -->
					<div class="form-group">
					    <label for="name">Name</label>
					    <input name="id" type="hidden" value="<?= user_details()->id; ?>"/>
					    <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" value="<?= user_details()->name; ?>">
					</div>
					<div class="form-group">
					    <label for="phone">Phone</label>
					    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" value="<?= user_details()->phone; ?>">
					</div>
					<!-- Last Name -->
					<div class="form-group">
					    <label for="email">Email</label>
					    <input type="text" name="email" class="form-control" id="email" placeholder="Email Address" value="<?= user_details()->email; ?>">
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
			<!-- Edit Personal Info -->
			
			<!-- Change Password -->
			<div class="widget change-password">
				<h3 class="widget-header user">Choose Subscription Plan </h3>
				<form action="<?php echo base_url('welcome/changePlan'); ?>" method="post">
					<!-- Current Password -->
					<div class="form-group">
					    <label for="current-password">Current Plan</label>
					    <input type="hidden" class="form-control" id="id" name="id" value="<?= user_details()->id; ?>" >
					    <input type="text" class="form-control" name="plan" placeholder="<?php if($subs_id == 0){echo 'No Plan Active.'; }else{echo "Plan No.". user_details()->subscription_id;}?>" readonly>
					</div>
					<!-- New Password -->
					<div class="form-group">
  						<label for="category">Select Subscription</label>
  						<select name="service_id" required="required" class="form-control" onchange="subscription_change()" id="category">
  							<option>Select Subscription Amount</option>
  							<?php foreach($subscriptions as $ads) { ?>
  								<option value="<?= $ads->id; ?>"><?= $ads->amount; ?></option>
  							<?php } ?>
  						</select>
  					</div>

  					<div class="form-group">
  						<label for="category">Subscription Plan's Post</label>
  						<select name="sub_service_id" required="required" class="form-control" id="sub_category">
  						</select>
  					</div>
					<!-- Submit Button -->
					<button class="btn btn-transparent">Change Subscription</button>
				</form>
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
					    <label for="name">name</label>
					    <input name="id" type="hidden" value="<?= user_details()->id; ?>"/>
					    <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" value="<?= user_details()->name; ?>">
					</div>
					<div class="form-group">
					    <label for="phone">phone</label>
					    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" value="<?= user_details()->phone; ?>">
					</div>
					<!-- Last Name -->
					<div class="form-group">
					    <label for="email">email</label>
					    <input type="text" name="email" class="form-control" id="email" placeholder="Email Address" value="<?= user_details()->email; ?>">
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
<script type="text/javascript">
	function subscription_change(){
		var category = $('#category').val();
		$.ajax({
			type: 'post',
			url: '<?=base_url('welcome/get_subs');?>',
			data: "service_id="+category,
			cache: false,
			success: function(responce){
				$('#sub_category').html(responce);
			}
		});
	}
</script>
<?php include('footer.php'); ?>


