<script>
	var distance      = [];
	var days 	      = [];
	var now 	      = [];
	var x 		      = [];
	var minutes       = [];
	var hours         = [];
	var seconds       = [];
	var countDownDate = [];
</script>
<style type="text/css">
	.design{
	    font-size: 12px;
	    letter-spacing: 0px;
	    display: inline-block;
	    border-radius: 14px;
		}		 
</style>
<?php if (!empty($products)) {
		foreach ($products as $list) { 
	 	$adimg=$this->db->where('ad_list_id',$list['id'])->get('ad_images')->row();
?>
<div class="ad-listing-list mt-20">
	<?php
		$service_name = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list['service_name']))));
		$listname = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list['name']))));
	?>
	<div class="row p-lg-3 p-sm-5 p-4">
		<div class="col-lg-4 align-self-center">			
			<a href="<?= base_url();?>viewad/<?=$service_name; ?>/<?= $listname; ?>/<?= $list['id'];?>">				 
				<?php if (!empty($adimg->image)) { ?> 
                      <img class="img-fluid" alt=""  src="<?=base_url('assets/images/ads'); ?>/<?= $adimg->image; ?>" alt="Card image cap">
                <?php }else{ ?>
                        <img class="img-fluid" alt="" style="height: 200px;width: 100%" src="<?=base_url('assets/images/avatars'); ?>/no-image.jpg" alt="Card image cap">
                <?php } ?>
			</a>
		</div>
		
		<div class="col-lg-8">
			<div class="row">
				<div class="col-lg-6 col-md-10">
					<div class="ad-listing-content">
						<div>
							<a href="<?= base_url();?>viewad/<?=$service_name; ?>/<?= $listname; ?>/<?= $list['id'];?>" class="font-weight-bold"><?=$list['name'];?></a>
						</div>
						<ul class="list-inline mt-2 mb-3">
							<li class="list-inline-item"><a href="#">$<?=$list['price'];?></a></li><br>
							<li class="list-inline-item"><a href="#"> <i class="fa fa-folder-open-o"></i> <?=$service_name;?></a></li>
							<li class="list-inline-item"><a href=""><i class="fa fa-calendar"></i>
								<?php
									$timestamp    = strtotime($list['updated_on']);
									echo $newDate = date('d-F-Y', $timestamp); 
									?>
								</a>
							</li>
							<br>
						<?php if(is_logged_in()): ?>
                          <li class="list-inline-item" style="float: left;">
                             <a href="#" id="<?php echo $list['id']; ?>" class="favorite btn btn-primary btn-mini design" title="Add to favorite" data-url="<?php echo base_url('welcome/insert_favorite/');?>"><i class="fa fa-heart text-white"></i></a>
                          </li>
                         <li class="list-inline-item" style="float: right;">
                             <button class="btn btn-success btn-mini design" ><i class="fa fa-clock"> </i> <span id="demo<?php echo $list['id'];?>"></span> </button>
                          </li>
                          <!-- <li class="list-inline-item" style="float: right;">
                             <a href="<?php echo base_url('welcome/addToCart/'.$list['id']); ?>" class="cart btn btn-primary btn-mini" title="Add to cart" data-url="<?php echo base_url('welcome/insert_favorite/');?>"><i class="fa fa-shopping-cart text-white"></i></a>
                          </li> --> 
                        <?php endif; ?>
					</ul>
					<br>
							
						</ul>
						<p class="pr-5"><?php echo character_limiter($list['description'], 50); ?></p>
						<div class="product-ratings">
						<ul class="list-inline">								
							<!-- <button class="btn btn-success btn-mini" ><i class="fa fa-clock"> </i> <span id="demo<?php echo $list['id'];?>"></span> </button>
							<br>			 -->
							<br>						
						<?php if(is_logged_in()): ?>
							<form action="<?php echo base_url('welcome/addBid'); ?>" method="post" id="submit<?php echo $list['id'];?>">						
                          <li class="list-inline-item" style="float: left;">
                          	<?php $sql ="SELECT * FROM `tbl_bids` WHERE `user_id` ='".user_details()->id."' and `product_id` ='".$list['id']."'";
								  $query = $this->db->query($sql);
								if ($query->num_rows() > 0) {
									foreach ($query->result() as $row) {?>
							<input class="form-control" type="number" name="edit_id"  value="<?php echo $row->id;?>" style="width: 90px" hidden >							 
							 <div class="input-group">
							  <span class="input-group-addon">$</span>
							  <input type="number" name="price" value="<?=$row->price;?>" class="form-control" min='<?=$row->price;?>' style="width: 90px" aria-label="Amount (to the nearest dollar)">
							  <span class="input-group-addon">.00</span>
							</div>
							<?php } }else{ ?>							 
							 <div class="input-group">
								  <span class="input-group-addon">$</span>
								  <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" style="width: 90px" name="price" min="1" value="0">
								  <span class="input-group-addon">.00</span>
								</div>

							<?php } ?>         
                             <input class="user_id" type="number" id="user_id" name="user_id" value="<?=user_details()->id?>" required="" hidden>                      
                             <input class="form-control" type="number" name="product_id" value="<?=$list['id']?>" hidden>
                          </li>                          	
                          <li class="list-inline-item" style="float: right;">
                             <button type="submit" class="btn btn-danger btn-mini design" title="Bid Now"><i class="fa fa-gavel text-white"></i></button>
                          </li> 
                      </form>
                        <?php endif; ?>
						<script>
							 countDownDate["<?php echo $list['id'];?>"] = new Date("<?php echo date('F d, Y H:i:s',strtotime($list['end_date']));?>").getTime();
							// Update the count down every 1 second
							 x["<?php echo $list['id'];?>"] = setInterval(function() {
							// Get today's date and time
							 now["<?php echo $list['id'];?>"] = new Date().getTime();
							// Find the distance between now and the count down date
							 distance["<?php echo $list['id'];?>"] = countDownDate["<?php echo $list['id'];?>"] - now["<?php echo $list['id'];?>"];
							// Time calculations for days, hours, minutes and seconds
							 days["<?php echo $list['id'];?>"] = Math.floor(distance["<?php echo $list['id'];?>"] / (1000 * 60 * 60 * 24));
							 hours["<?php echo $list['id'];?>"] = Math.floor((distance["<?php echo $list['id'];?>"] % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
							 minutes["<?php echo $list['id'];?>"] = Math.floor((distance["<?php echo $list['id'];?>"] % (1000 * 60 * 60)) / (1000 * 60));
							 seconds["<?php echo $list['id'];?>"] = Math.floor((distance["<?php echo $list['id'];?>"] % (1000 * 60)) / 1000);
							// Output the result in an element with id="demo"
							document.getElementById("demo<?php echo $list['id'];?>").innerHTML = days["<?php echo $list['id'];?>"] + "d " + hours["<?php echo $list['id'];?>"] + "h "
							+ minutes["<?php echo $list['id'];?>"] + "m " + seconds["<?php echo $list['id'];?>"] + "s ";
							// If the count down is over, write some text 
							if (distance["<?php echo $list['id'];?>"] < 0) {
							clearInterval(x["<?php echo $list['id'];?>"]);
							document.getElementById("demo<?php echo $list['id'];?>").innerHTML = "EXPIRED";
							document.getElementById("submit<?php echo $list['id'];?>").style.display = "none";
							}
							}, 1000);
						</script>
						</ul>
					</div>
					</div>
				</div>
				<!-- <div class="col-lg-6 align-self-center">
					<div class="product-ratings float-lg-right pb-3">
						 <ul class="list-inline">
							  <?php if(is_logged_in()): ?> 
								<li id="<?=$list['id']?>" data-id="<?= $list['id'];?>" class="favorite list-inline-item" title="Add to favorite" data-url="<?php echo base_url('welcome/insert_favorite/');?>" ><i class="fa fa-heart"></i></li>
							  <?php endif; ?>  										 
						</ul>  
					</div>
				</div> -->
			</div>
		</div>
	</div>
</div>
<?php } } ?>