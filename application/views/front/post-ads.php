  <?php include('header.php'); ?>
  <link href="<?= base_url('assets/frontend/'); ?>uploader/dist/image-uploader.min.css" rel="stylesheet">
  <script src="<?= base_url('assets/frontend/'); ?>uploader/dist/image-uploader.min.js"></script>
  <main id="main">
  	<!-- ======= Featured Services Section ======= -->
  	<section id="featured-services" class="bg-gray" style="padding: 30px 0px">
  		<div class="container-fluid" data-aos="fade-up">
  			<div class="row">
  				  <div class="col-sm-2 text-center">
  					<!-- <img src="<?= base_url('assets/frontend/'); ?>images/ad5.gif" width="82%"><br><br>
  					<img src="<?= base_url('assets/frontend/'); ?>images/ad4.png">  -->       
  				</div>  
  				<div class="col-sm-8 bg-white">
  					<div class="section-title mt-20">
  						<h2>Post Ad</h2>
  						<p>Home/post-ads</p>
  					</div>
  					<?php
  					if($this->session->flashdata('success')) {
  						$message = $this->session->flashdata('success');?>
  						<div style="padding: 10px;" class="btn-success>"><?php echo $message; ?>
  					</div>
  				<?php } ?>
  				<form enctype="multipart/form-data" method="post" action="<?= base_url('welcome/submit_ad'); ?>">
  					<div style="background:#2e6da4; ">
  						<h3 style="padding: 10px; color: #fff;">Add some details</h3>

  					</div>
  					<div class="form-group">
  						<label for="category">Select Ad Type</label>
  						<select name="ad_type_id" required="required" class="form-control" id="ad_type_id">
  							<option>Select Ad Type</option>
  							<?php foreach($ad_type as $ads) { ?>
  								<option value="<?= $ads->id; ?>"><?= $ads->name; ?></option>
  							<?php } ?>
  						</select>
  					</div>
  					<script>
  						$(document).ready(function(){
  							$("#bidding_duration").hide();
  							$("#bidding_start_date").hide();
  							$("#bidding_end_date").hide();
  							$("#ad_type_id").change(function(){
  								var selectedamount = $('#ad_type_id').find(":selected").val();
  								if(selectedamount == '3'){
  									$("#Negotiable_div").hide();
  									$("#bidding_duration").show();
  									$("#bidding_start_date").show();
  									$("#bidding_end_date").show();
  									$("#pricetitle").html("Minimum Bid Amount*");		  		
  								}else{
  									$("#Negotiable_div").show();
  									$("#bidding_duration").hide();
  									$("#bidding_start_date").hide();
  									$("#bidding_end_date").hide();
  									$("#pricetitle").html("Price*");
  								}								  	
  							});
  						});
  					</script>

  					<div class="form-group">
  						<label for="category">Select Category</label>
  						<select name="service_id" required="required" class="form-control" onchange="category_change()" id="category">
  							<option>Select Category</option>
  							<?php foreach($services as $ads) { ?>
  								<option value="<?= $ads->id; ?>"><?=$ads->name;?></option>
  							<?php } ?>
  						</select>
  					</div>

  					<div class="form-group">
  						<label for="category">Select Sub Category</label>
  						<select name="sub_service_id" required="required" class="form-control" id="sub_category">

  						</select>
  					</div>

  					<div class="form-group">
  						<label for="adtitle">Ad Title*</label>
  						<input required="required" maxlength="100" type="text" class="form-control" id="adtitle" name="name" placeholder="Enter your ad title">
  						<small>enter the key feature of your item (e.g. Brand,Model,logo,type etc)</small>
  					</div>
  					<div class="form-group">
  						<label for="description">Description*</label>
  						<textarea required="required" class="form-control" id="description" name="description" rows="5"></textarea>
  						<small>Include condition, features, item detail, reason for selling etc.</small>
  					</div>
  					<div class="row">
  						<div class="col-sm-4">
  							<div class="form-group">
  								<label id="pricetitle" for="adtitle">Price*</label>
  								<input required="required" type="number" class="form-control"  name="price" placeholder="Enter Price">
  							</div>
  						</div>
  						<div id="Negotiable_div" class="col-sm-4 negotiablepadding text-center">
  							<input type="checkbox" value="Negotiable" id="Negotiable">
  							<label for="Negotiable" class="py-2">Negotiable</label>
  						</div>
  						<div id="bidding_duration" class="col-sm-4">
  							<div class="form-group">
  								<label for="Negotiable">Bid Duration <small>(In Days)</small></label>
  								<input type="number" class="form-control" value="" name="bid_duration" id="bid_duration" placeholder="Bid Duration">
  							</div>
  						</div>
  						<div id="bidding_start_date" class="col-sm-4">
  							<div class="form-group">
  								<label for="Negotiable">Start Date <small>(*)</small></label>
  								<input type="date" class="form-control" value="" name="start_date" id="start_date">
  							</div>
  						</div>
  						<div id="bidding_end_date" class="col-sm-4">
  							<div class="form-group">
  								<label for="Negotiable">End Date <small>(*)</small></label>
  								<input type="date" class="form-control" value="" name="end_date" id="end_date">
  							</div>
  						</div>
  						<div class="col-sm-4">
  							<div class="form-group">
  								<label for="adtitle">Product Condition*</label>
  								<select class="form-control" name="quality">
  									<option>--Select--</option>
  									<option>Brand New</option>
  									<option>Good</option>
  									<option>Average</option>
  									<option>Bad</option>
  								</select>
  							</div>						
  						</div>
  					</div>
  					<div style="background:#2e6da4; ">
  						<h3 style="padding: 10px; color: #fff;">Upload Images
  							<small style="padding: 10px; color: #fff;">(Add upto 6 images)</small></h3>

  						</div>
  						<div class="row">
  							<div class="col-md-6">	  	

  								<div class="form-group">
  									<label for="uploadimages">Upload Primary Image</label>
  									<input  id="imgInp" class="form-control" required="required" name="userfile" type="file" accept="image/*">			    
  									<script>
  										function readURL(input) {
  											if (input.files && input.files[0]) {
  												var reader = new FileReader();					    
  												reader.onload = function(e) {
  													$('#blah').attr('src', e.target.result);
  												}					    
					    						reader.readAsDataURL(input.files[0]); // convert to base64 string
					    					}
					    				}
					    				$("#imgInp").change(function() {
					    					readURL(this);
					    				});
					    			</script>
					    		</div>
					    	</div>
					    	<div class="col-md-6">
					    		<img id="blah" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARgAAAC0CAMAAAB4+cOfAAAAPFBMVEXq6uqurq7X19fi4uKqqqrp6ene3t6vr6+0tLTHx8fl5eW3t7fd3d3t7e3U1NTZ2dm9vb3MzMzCwsKlpaXgX8HoAAAEWElEQVR4nO3a626rOhAFYOPBd3s8dt//Xc+YJLupdqV0/zilFetT2xAKCK8MJgaMAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA+F858nd09q78LFn2u+DO3pcfpLUs211w7VNn7+MJGo00459g0qeGP3s3vx/HsL0W+ez9/G41vk5lKVerGXs7gl4n08/e029md60G5vkxmlBE5EMt7fZiHbAGs9fn89KKZXRPRJXnxYPRJrenDCa5Zo5TtOvxPZiz9/SbrWC0zVT+5DLWdzxHlY7XcuGK2bY0nnLRmV67nLDFoQOEXK4czBPJ60xVEndOUaqezwOCWbi1HiblaqvzojG5dNk+5sN5eo0oi2OJMYqlogeWDagYPZKaBkHpnhJzbMYXBKPdcGtD+DEvcMiGBMHoOUmDeR9rbymQyYI+5lYxT0OBuDlUzKOP6c9jpNJMLagY7VX0a8zzCImN4Q0Vc3Qyz8OD5O5dDIKJ3jSS27fdmPKjYBDMJjpAcjxFJHVn2qPHuXofs5LxzTRHREZrxD56YlSMnomGud80oXTp6zF/i8l68ixP1ztRMfcclg8zrlYx/St3lZar3SUgeZ3JIpe73V/ntr8U5tXut5l13fsL8BAEAADA6dzXz8dr0ffF71P/sP7pcq3OuK89oJrZfrVljjnTeGyVxjFUyOMXjRhsidxIklnPZb7Pfp98ehgzD3YfF/t7mfsbxyPbzd4fFKlxrBfaUvt0/R+ocdyip6LB9MF07HPuvo/aXCfSv6xpOEuu9Zp7Ncbz6I06GerZ+WM0TTxGdWte7pT1jTWudteDdX2srWowXauF1g0pGr+ibhoH2WfVihmhxHCMdXyIEgORzhAjsYSSZeYc0iqsvhazq4kpchZZJTR0+WhXWfDW+6Yrs0lCGkyWIkFyLUFn9rVWj6WEcXazX9Ng+txmSXlPLUdZJVM3bj4m2lMl1jaOjUfwHOoKJkrOJTqZPkbRLNZGstPlkisxz5JdJi7FzCMY7W6rxOo1M4qphqFJZY3z5w/CNRi7nodKK41W4i2Y1YxJu84ZWylFtGUsxaxgdv3ERdooWjAl3UpMg5CQDIdRhvHrjdyDyTNKKX4Fo1WnwZAE/X/6FcFws2FLWX/8o2KG00YewfA2vLfezbLSWhVTuq/riIjTac1ks54IiVRjclmPstpm7L7cg+l9Hy7FFYyzIXnd8CyWqs1nt/slbTk3l/ZkUpASb33Mpp95yf5ttNVokWh1sT0bKlPPYkWXa1TerJlv6XgCL20yt+Sa9lZZa0xm0EOpkN3tOt70UKqxaF/l9eBsx/rz51eMyT6vP6TnEebb/tYtrUnnj3KoPLwzmfxxTUZ/me16WTP97ZPPlml9E1qbMa6z1+WInG7Aea5risjet+h0in/phZvVx5y9Dz9Sthe8QgkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAp/gPjOMyqC28HqMAAAAASUVORK5CYII=" alt="your image" / width="300px">

					    	</div>
					    </div>
					    <label for="uploadimages">Upload Gallery Image</label>
					    <div class="input-images"></div>
					    <script>
					    	$(function(){
					    		$('.input-images').imageUploader();
					    	});
					    </script>
					    <div class="row">
					    	<div class="col-sm-6">
					    		<div class="form-group">
					    			<label for="category">Confirm your location</label>
					    			<input id="searchTextField" class="form-control" type="text" size="50">
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
					    <!-- ad-feature start -->
					    <fieldset class="border bg-white p-4 my-5 ad-feature bg-gray">
					    	<div class="row">
					    		<div class="col-lg-12">

					    			<h3 class="pb-3">Make Your Ad Featured
					    				<span class="float-right"><a data-toggle="tooltip" title="Featured Ad is eye-catching and distinguishable from the normal Ads: Featured Ads appear on the top of the search results on top of the normal listings, alternately with other featured ads, over service validity. Featured Ads also appear with a highlighted background within the normal listings." data-placement="bottom" class="text-right font-weight-normal text-success" style="cursor: pointer;"  id="featured-ad">What
					    				is featured ad ?</a></span>
					    			</h3>
					    			<div class="form-group" id="featured-des">
				  						<label for="description">Featured ad*</label>
				  						<textarea  class="form-control" id="featured-des" name="featured_des" rows="5"></textarea>
				  						<small>Include condition, features, item detail, reason for selling etc.</small>
				  					</div>

					    		</div>
					    		<div class="col-lg-6 my-3">
					    			<span class="mb-3 d-block">Premium Ad Options:</span>
					    			<ul>
					    				<li>
					    					<input value="0" class="premiumadsbutton" type="radio" id="regular-ad" name="adfeature">
					    					<label for="regular-ad" class="font-weight-bold text-dark py-1">Regular Ad</label>
					    					<span>$00.00</span>
					    				</li>
					    				<li>
					    					<input value="59" class="premiumadsbutton"  type="radio" id="Featured-Ads" name="adfeature">
					    					<label for="Featured-Ads" class="font-weight-bold text-dark py-1">Top Featured Ads</label>
					    					<span>$59.00</span>
					    				</li>
					    			</ul>
					    			<script>
					    				$(document).ready(function(){
					    					$("#payment_form_div").hide();
					    					$(".premiumadsbutton").click(function(){
					    						var selectedamount = $('input[name="adfeature"]:checked').val();
					    						if(selectedamount == '0'){
					    							$('#amount').val(selectedamount);
					    							$("#payment_form_div").hide();
					    						}else{
					    							$('#amount').val(selectedamount);
					    							$("#payment_form_div").show();
					    						}
					    					});
					    				});

					    				$("#featured-des").hide();
					    				$("#featured-ad").click(function(){
					    					$("#featured-des").toggle();
					    				});
					    			</script>
					    		</div>
					    		<div class="col-lg-6 my-3">

					    			<div id="payment_form_div" class="bt-drop-in-wrapper">
					    				<!-- <input id="amount" name="amount" type="hidden" min="1" placeholder="Amount" value="1"> -->
					    				<input id="nonce" name="payment_method_nonce" type="hidden" />
					    				<div id="bt-dropin"></div>
					    			</div>
					    		</div>
					    	</div>
					    </fieldset>
					    <div class="checkbox d-inline-flex">
					    	<input type="checkbox" id="terms-&-condition" class="mt-1">
					    	<label for="terms-&-condition" class="ml-2">By click you must agree with our
					    		<span> <a class="text-success" href="<?php echo base_url('terms-condition'); ?>">Terms & Condition and Posting Rules.</a></span>
					    	</label>
					    </div>
					    <div class="form-group text-center">
					    	<button type="submit" class="btn btn-lg btncolor">Post Your Ad</button>
					    </div>
					</form>

				</div>
				<div class="col-sm-2 text-center">
					<!-- <img src="<?= base_url('assets/frontend/'); ?>images/ad4.png"><br><br>
					<img src="<?= base_url('assets/frontend/'); ?>images/ad6.gif">  -->       
				</div>

			</div>

		</div>
	</section><!-- End Featured Services Section -->
</main><!-- End #main -->
<script>
	function state_change(){
		var state = $('#state').val();
		$.ajax({
			type: 'post',
			url: 'get_city',
			data: "state_id="+state,
			cache: false,
			success: function(responce){
				$('#city').html(responce);
			}
		});
	}

	function category_change(){
		var category = $('#category').val();
		$.ajax({
			type: 'post',
			url: '<?=base_url('welcome/get_sub_cat');?>',
			data: "service_id="+category,
			cache: false,
			success: function(responce){
				$('#sub_category').html(responce);
			}
		});
	}
</script>

<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://js.braintreegateway.com/web/dropin/1.27.0/js/dropin.min.js"></script>

<script>
	var form = document.querySelector('#payment-form');
	var client_token = "<?= init_payment()->ClientToken()->generate(); ?>";

	braintree.dropin.create({
		authorization: client_token,
		selector: '#bt-dropin',
		paypal: {
			flow: 'vault'
		}
	}, function (createErr, instance) {
		if (createErr) {
			console.log('Create Error', createErr);
			return;
		}
		form.addEventListener('submit', function (event) {
			event.preventDefault();
			instance.requestPaymentMethod(function (err, payload) {
				if (err) {
					console.log('Request Payment Method Error', err);
					return;
				}
              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
          });
		});
	});
</script>

<?php include('footer.php'); ?>