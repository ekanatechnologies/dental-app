<?php include('header.php'); ?>

<section class="user-profile section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user-dashboard-profile">
						<!-- User Image -->
						<div class="profile-thumb">
							<?php if (!empty(user_details()->image)) { ?>
								<img src="<?= base_url('assets/frontend/images/user/'); ?><?=user_details()->image;?>" alt="User" class="rounded-circle">
							<?php }else{ ?>
								<img src="<?= base_url('assets/frontend/images/user/'); ?>Sample_User_Icon.png" alt="" class="rounded-circle">
							<?php } ?>
						</div>
						<!-- User Name -->
						<h5 class="text-center"><?= user_details()->name; ?></h5>
						<p>Joined
							<?php
							$yrdata = strtotime(user_details()->created_on);
							echo date('F d, Y', $yrdata);
							?>
							
						</p>
					</div>
					<!-- Dashboard Links -->
					<!-- <div class="widget user-dashboard-menu">
						<ul>
							<li>
								<a href="<?= base_url('welcome/editprofile');?>"><i class="fa fa-user"></i> Edit Profile</a></li>
							<li>
								<a href="dashboard-favourite-ads.html"><i class="fa fa-bookmark-o"></i> My Ads <span>5</span></a>
							</li>
							<li>
								<a href="<?= base_url('user-chat'); ?>"><i class="fa fa-bookmark-o"></i> My Chats <span>5</span></a>
							</li>
							<li>
								<a href="dashboard-pending-ads.html"><i class="fa fa-bolt"></i> Pending Approval<span>23</span></a>
							</li>
							<li>
								<a href="<?= base_url('login/logout'); ?>"><i class="fa fa-cog"></i> Logout</a>
							</li>
							<li>
								<a href="delete-account.html"><i class="fa fa-power-off"></i>Delete Account</a>
							</li>
						</ul>
					</div> -->
					<?php include 'profile-dashboard.php'; ?>
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
								<td><?= user_details()->lastname; ?></td>				      
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
				<div class="widget change-password">
					<h3 class="widget-header user">Edit Password</h3>
					<form action="#">
						<!-- Current Password -->
						<div class="form-group">
							<label for="current-password">Current Password</label>
							<input type="password" class="form-control" id="current-password">
						</div>
						<!-- New Password -->
						<div class="form-group">
							<label for="new-password">New Password</label>
							<input type="password" class="form-control" id="new-password">
						</div>
						<!-- Confirm New Password -->
						<div class="form-group">
							<label for="confirm-password">Confirm New Password</label>
							<input type="password" class="form-control" id="confirm-password">
						</div>
						<!-- Submit Button -->
						<button class="btn btn-transparent">Change Password</button>
					</form>
				</div>				
			</div>
		</div>
	</div>
</section>

<?php include('footer.php'); ?>