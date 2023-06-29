<div class="row mt-30">
	<?php if (!empty($products)) {
			 foreach ($products as $list) { 
  			$adimg = $this->db->where('ad_list_id',$list['id'])->get('ad_images')->row();
	?>
	<div class="col-sm-12 col-lg-4 col-md-6">
		<!-- product card -->
		<div class="product-item bg-light">
			<div class="card">
				<div class="thumb-content">
					<?php
						$service_name = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list['service_name']))));
						$listname = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list['name']))));
					?>
					<div class="price">$<?=$list['price']?></div>
					<a href="<?= base_url();?>viewad/<?=$service_name; ?>/<?= $listname; ?>/<?= $list['id'];?>">
						 
						<?php if (!empty($adimg->image)) { ?> 
                                <img class="card-img-top img-fluid" alt="" style="height: 200px;width: 255px" src="<?= base_url('assets/images/ads'); ?>/<?= $adimg->image; ?>" alt="Card image cap">
                        <?php }else{ ?>
                                <img class="card-img-top img-fluid" alt="" style="height: 200px;width: 220px" src="<?= base_url('assets/images/avatars'); ?>/no-image.jpg" alt="Card image cap">
                        <?php } ?>
					</a>
				</div>
				
				<div class="card-body">
					<h4 class="card-title"><a href="<?= base_url();?>viewad/<?=$service_name; ?>/<?= $listname; ?>/<?= $list['id'];?>"><?=$list['name'];?></a></h4>
					<ul class="list-inline product-meta">
						<li class="list-inline-item">
							<a href="<?= base_url();?>viewad/<?=$service_name; ?>/<?= $listname; ?>/<?= $list['id'];?>"><i class="fa fa-folder-open-o"></i><?=$service_name;?></a>
						</li>
						<li class="list-inline-item">
							<a href="#"><i class="fa fa-calendar"></i>
								<?php
								$timestamp   = strtotime($list['updated_on']);
								echo $newDate= date('d-F-Y', $timestamp); 
								?>
							</a>
						</li>
						<br>
						<?php if(is_logged_in()): ?>
                          <li class="list-inline-item" style="float: left;">
                             <a href="#" id="<?php echo $list['id']; ?>" class="favorite btn btn-primary btn-mini design" title="Add to favorite" data-url="<?php echo base_url('welcome/insert_favorite/');?>"><i class="fa fa-heart text-white"></i></a>
                          </li>
                          <li class="list-inline-item" style="float: right;">
                             <a href="<?php echo base_url('welcome/addToCart/'.$list['id']); ?>" class="cart btn btn-primary btn-mini design" title="Add to cart" data-url="<?php echo base_url('welcome/insert_favorite/');?>"><i class="fa fa-shopping-cart text-white"></i></a>
                          </li> 
                        <?php endif; ?>
					</ul>
					<br>
					<p class="card-text"><?php echo character_limiter($list['description'], 40); ?></p>
					<!-- <div class="product-ratings">
						<ul class="list-inline">
							  <?php if(is_logged_in()): ?> 
								<li id="<?=$list['id']?>" data-id="<?= $list['id'];?>" class="favorite list-inline-item" title="Add to favorite" data-url="<?php echo base_url('welcome/insert_favorite/');?>" ><i class="fa fa-heart"></i></li>
							  <?php endif; ?>  										 
						</ul>
					</div> -->
				</div>
			</div>
		</div>
	</div>	
	<?php } } ?>
</div>


