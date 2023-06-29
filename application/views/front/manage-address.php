<?php include('dashboard-header.php'); ?>
<section class="user-profile section">
	<div class="container">	
		<nav>
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
				<a class="nav-item nav-link btn btncolor" id="nav-dashboard-tab" data-toggle="tab" href="#nav-dashboard" role="tab" aria-controls="nav-dashboard" aria-selected="true">Dashboard</a>
				<a class="nav-item nav-link btn btncolor" id="nav-activity-tab" data-toggle="tab" href="#nav-activity" role="tab" aria-controls="nav-activity" aria-selected="false">Activity</a>    
				<a class="nav-item nav-link btn btncolor active" id="nav-accounts-tab" data-toggle="tab" href="#nav-accounts" role="tab" aria-controls="nav-accounts" aria-selected="false">Accounts</a>
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
						<!-- Edit Personal Info -->
						<div class="widget personal-info">
							<h3 class="widget-header user">Personal Information</h3>
							<table class="table table-bordered">
								<tbody>
									<tr>
										<td>Name</td>
										<td colspan="2"><?=user_details()->name;?></td>
									</tr>
									<tr>
										<td>Phone:</td>
										<td><?=user_details()->phone;?></td>
									</tr>
									<tr>
										<td>Email:</td>
										<td><?=user_details()->email;?></td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- Change Password -->
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
						 <?php
	                        if(empty($page_id)){
	                            $page_id = '';
	                        }
	                    ?>
						<div class="widget dashboard-container my-adslist" id="myTabContent5" data-url=<?php echo base_url('welcome/table_filter_favorite/' . $page_id);?>>
							<h3 class="widget-header">My Favorite Ads</h3>
							
						</div>
						<!-- Change Password -->


					</div>
				</div>

			</div> 

			<div class="tab-pane fade show active" id="nav-accounts" role="tabpanel" aria-labelledby="nav-accounts-tab">

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
					<h3 class="widget-header user">Manage Address</h3>
					<?php echo form_open_multipart('Welcome/addAddress');?>
 						<div class="form-group" hidden="">
						    <label for="email">Email</label>
						    <input type="number" name="user_id" class="form-control" id="user_id" placeholder="User Id" value="<?= user_details()->id; ?>" >
						</div>
						<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="category">Confirm your location</label>
								<input id="searchTextField" class="form-control" type="text" size="50" required="">
							</div>
							<input id="cityLat" name="latitude" type="hidden" size="50">
							<input id="cityLng" name="longitude" type="hidden" size="50">
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="category">Country/Region*</label>
								<input readonly="" id="country" class="form-control" name="country" required />
							</div>
						</div>

						<script>
							function initialize() {
								var input = document.getElementById('searchTextField');
								var options = {
									componentRestrictions: {
										country: "ca"
									},
									fields: ["address_components", "geometry", "icon", "name"],
								}
								var autocomplete = new google.maps.places.Autocomplete(input,options);
								google.maps.event.addListener(autocomplete, 'place_changed', function () {
									var place = autocomplete.getPlace();
					                //document.getElementById('city2').value = place.name;
					                document.getElementById('cityLat').value = place.geometry.location.lat();
					                document.getElementById('cityLng').value = place.geometry.location.lng();
					                 // Get the place details from the autocomplete object.
							        //const place = autocomplete.getPlace();
							        let address1 = "";
							        let postcode = "";

							        // Get each component of the address from the place details,
							        // and then fill-in the corresponding field on the form.
							        // place.address_components are google.maps.GeocoderAddressComponent objects
							        // which are documented at http://goo.gle/3l5i5Mr
							        console.log(place.address_components);
							        for (const component of place.address_components) {
							        	const componentType = component.types[0];

							        	switch (componentType) {
							        		case "street_number": {
							        			address1 = `${component.long_name} ${address1}`;
							        			document.querySelector("#address2").value = address1;
							        			break;
							        		}

							        		case "route": {
							        			address2 = component.short_name;
							        			document.querySelector("#street").value = address2;
							        			break;
							        		}


							        		case "postal_code": {
							        			postcode = `${component.long_name}${postcode}`;
							        			document.querySelector("#postcode").value = postcode;
							        			break;
							        		}

							        		case "postal_code_suffix": {
							        			postcode = `${postcode}-${component.long_name}`;

							        			break;
							        		}
							        		case "locality":
							        		document.querySelector("#city").value = component.long_name;

							        		break;

							        		case "administrative_area_level_1": {
							        			document.querySelector("#state").value = component.short_name;
							        			break;
							        		}
							        		case "country":
							        		document.querySelector("#country").value = component.long_name;
							        		break;
							        		case "sublocality_level_1":
							        		document.querySelector("#locality").value = component.long_name;
							        		break;

							        	}
							        }
							        
							        // After filling the form with address components from the Autocomplete
							        // prediction, set cursor focus on the second address line to encourage
							        // entry of subpremise information such as apartment, unit, or floor number.


							    });
							}

							google.maps.event.addDomListener(window, 'load', initialize);

						</script>

						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="category">Province</label>
									<input readonly="" required="required"  value="" class="form-control" id="state" />

								</div>

							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="category">City</label>
									<input readonly="" name="city" required="required" id="city" class="form-control" value="" />

								</div>

							</div>

						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="category">Apartment, unit, suite, or floor #</label>
									<input readonly="" required="required" type="text" class="form-control" id="address2" name="houseno" placeholder="">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="category">Street</label>
									<input readonly="" required="required" type="text" class="form-control" id="street" name="street" placeholder="">
								</div>

							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="category">Locality</label>
									<input readonly="" required="required" type="text" class="form-control" id="locality" name="locality" placeholder="">
								</div>

							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="category">Postal Code</label>
									<input  readonly="" required="required" type="text" class="form-control" id="postcode" name="pincode" placeholder="">
								</div>

							</div>
						</div>
						<!-- File chooser -->						
						<!-- Submit button -->
						<button type="submit" class="btn btn-transparent">Save My Changes</button>
					</form>
				</div>
 
			</div>
				</div>

			</div>
		</div>
		
	</div>
</section>

<?php include('footer.php'); ?>