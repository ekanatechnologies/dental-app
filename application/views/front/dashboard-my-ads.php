<?php include('dashboard-header.php'); ?>

<section class="user-profile section">
	<div class="container">
		<nav>
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
				<a class="nav-item nav-link btn btncolor active" id="nav-dashboard-tab" data-toggle="tab" href="#nav-dashboard" role="tab" aria-controls="nav-dashboard" aria-selected="true">Dashboard</a>
				<a class="nav-item nav-link btn btncolor" id="nav-activity-tab" data-toggle="tab" href="#nav-activity" role="tab" aria-controls="nav-activity" aria-selected="false">Activity</a> 
				<a class="nav-item nav-link btn btncolor" id="nav-accounts-tab" data-toggle="tab" href="#nav-accounts" role="tab" aria-controls="nav-accounts" aria-selected="false">Accounts</a>
			</div>
		</nav>

		<div class="tab-content" id="nav-tabContent">
			<div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel" aria-labelledby="nav-dashboard-tab">

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
									<?php
									$yrdata = strtotime(user_details()->created_on);
									echo date('F d, Y', $yrdata);
									?>

								</p>
							</div>
							<!-- Dashboard Links -->					 
							<?php include 'profile-dashboard.php'; ?>
							<!-- Dashboard Links -->

						</div>
					</div>
					<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
						<!-- Recently Favorited -->
						<?php
	                        if(empty($page_id)){
	                            $page_id = '';
	                        }
	                    ?>
						<div class="widget dashboard-container my-adslist" id="myTabContent3" data-url=<?php echo base_url('welcome/table_filter/' . $page_id);?>>
							<h3 class="widget-header">My Ads</h3>
							
							</div>

							<!-- pagination -->							
							<!-- pagination -->

						</div>
					</div>


				</div>


				<div class="tab-pane fade" id="nav-activity" role="tabpanel" aria-labelledby="nav-activity-tab">

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
							<div class="widget personal-info">
								<h3 class="widget-header user">Personal Information</h3>
								<table class="table table-bordered">
									<tbody>
										<tr>
											<td>Name</td>
											<td colspan="2"><?= user_details()->name; ?></td>
										</tr>
										<tr>
											<td>Phone:</td>
											<td><?= user_details()->phone; ?></td>

										</tr>
										<tr>
											<td>Email:</td>
											<td><?= user_details()->email; ?></td>

										</tr>

									</tbody>
								</table>
							</div>
							<!-- Change Password -->


						</div>
					</div>

				</div>



<div class="tab-pane fade" id="nav-accounts" role="tabpanel" aria-labelledby="nav-accounts-tab">

	<div class="row">
		<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
			<div class="sidebar">				 
				<!-- Dashboard Links -->					 
				 <!-- Dashboard Links -->					 
					<?php include('accounts-links.php'); ?>								 
					<!-- Dashboard Links -->
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
							<td>Name</td>
							<td colspan="2"><?= user_details()->name; ?></td>
						</tr>
						<tr>
							<td>Phone:</td>
							<td><?= user_details()->phone; ?></td>

						</tr>
						<tr>
							<td>Email:</td>
							<td><?= user_details()->email; ?></td>

						</tr>

					</tbody>
				</table>
			</div>
			<!-- Change Password -->


		</div>
	</div>

</div>
</div>

</div>
</section>

<?php include('footer.php'); ?>

