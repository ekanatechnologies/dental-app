<?php include('header.php'); ?>

<section class="dashboard section">
	<!-- Container Start -->
	<div class="container">
		<!-- Row Start -->
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
						<h5 class="text-center"><?= user_details_by_id($user)->name; ?></h5>
						<p>Joined <?php
						$yrdata= strtotime(user_details_by_id($user)->created_on);
						echo date('F d, Y', $yrdata);
						?></p>
					</div>
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
						<ul>
							<li class="active" ><a href=""><i class="fa fa-user"></i> User Ads</a></li>
							
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header"><?= user_details_by_id($user)->name; ?>'s Ads</h3>
					<table class="table table-responsive product-dashboard-table">
						<thead>
							<tr>
								<!-- <th>Image</th> -->
								<th>Product Title</th>
								<th class="text-center">Category</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($user_ads as $ads) { 

								$adimg = $this->db->where('ad_list_id',$ads->id)->get('ad_images')->row();
								?>
								<tr>

									<!-- <td class="product-thumb">
										<img width="80px" height="auto" src="<?= base_url('assets/images/ads'); ?>/<?= $adimg->image; ?>" alt="<?= $ads->name; ?>">
									</td> -->
									<td class="product-details">
										<h3 class="title"><?= $ads->name; ?></h3>
										<span class="add-id"><strong>Ad Type:</strong> <?= $ads->ad_type;?></span>
										<span><strong>Posted on: </strong><time><?php
										$timestamp = strtotime($ads->created_on);
										echo $newDate = date('d-F-Y', $timestamp); 
										?></time> </span>
										<span class="status active"><strong>Status</strong>Active</span>
										<span class="location"><strong>Location</strong><?= $ads->cityname;?>, <?= $ads->statename;?></span>
									</td>
									<td class="product-category"><span class="categories"><?= $ads->service_name; ?></span></td>
									<td class="action" data-title="Action">
										<div class="">
											<ul class="list-inline justify-content-center">
												<li class="list-inline-item">
													<a  target="_blank" data-toggle="tooltip" data-placement="top" title="View Details" class="view" href="<?= base_url('welcome/singlepost');?>/<?= $ads->id;?>">
														<i class="fa fa-eye"></i>
													</a>		
												</li>

											</ul>
										</div>
									</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
			<!-- Row End -->
		</div>
		<!-- Container End -->
	</section>

	<?php include('footer.php'); ?>