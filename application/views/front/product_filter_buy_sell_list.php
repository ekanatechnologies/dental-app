<?php if (!empty($products)) {
		foreach ($products as $list) { 
	 	$adimg=$this->db->where('ad_list_id',$list['id'])->get('ad_images')->row();
?>
<style type="text/css">
	li{
		font-color: #007bff;
	}
</style>

<div class="ad-listing-list mt-20">
	<?php	
		$service_name = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list['service_name']))));
		$listname = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list['name']))));
	?>
	<div class="row p-lg-3 p-sm-5 p-4">
		<div class="col-lg-4 align-self-center">
			<a href="<?= base_url();?>viewad/<?=$service_name; ?>/<?= $listname; ?>/<?= $list['id'];?>">
				<?php if (!empty($adimg->image)) { ?> 
                <img class="img-fluid" style="height: 200px;width: 100%" src="<?= base_url('assets/images/ads'); ?>/<?= $adimg->image; ?>" alt="image">
                <?php }else{ ?>
                <img class="img-fluid" style="height: 200px;width: 100%" src="<?= base_url('assets/images/avatars'); ?>/no-image.jpg" alt="image">
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
							<li class="list-inline-item">
								<a href=""><i class="fa fa-calendar"></i>
								<?=date('d-F-Y', strtotime($list['updated_on']));?> 
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
					</ul>
					<p class="pr-5"><?=character_limiter($list['description'], 50); ?></p>
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