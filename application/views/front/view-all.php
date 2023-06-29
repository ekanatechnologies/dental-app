<?php include('header.php'); ?>

<section class="section-sm">
	<div class="container">
	    <?php if(isset($title)) { ?>
	    <div class="row">
            <div class="col-md-12">
                <div class="search-result bg-gray">
                    <h2>Results For "<?= $searchname; ?>"</h2>
                    <ul class="list-inline">
							<li class="list-inline-item"><i class="fa fa-folder-open-o"></i> <a href=""><?= $ad_type; ?> </a></li>
							<li class="list-inline-item"><i class="fa fa-location-arrow"></i> <a href=""><?= $city; ?></a></li>
							<?php
							if($city != '')
							{
							    $location = $this->db->where('city',$city)->get('cities')->row()->id;
							}
							else
							{
							    $location = '';
							}
							
							
							
							?>
						</ul>
                    <p><?= $total; ?> Results on <?php $yrdata= strtotime(date('Y-m-d'));
    echo date('F d, Y', $yrdata); ?></p>
                </div>
            </div>
        </div>
        <?php } ?>
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">
					<div class="widget category-list">
						<h4 class="widget-header">All Category</h4>
						<ul class="category-list">
						    <?php if(!isset($location)) { 
						    $location = '';
						    } ?>
						    
						    
							<li><a href="<?= base_url('category/buy');?>">Buy <span><?= ads_type_count('buy',$location); ?></span></a></li>
							<li><a href="<?= base_url('category/sell');?>">Sell <span><?= ads_type_count('sell',$location); ?></span></a></li>
							<li><a href="<?= base_url('category/rent');?>">Rent  <span><?= ads_type_count('rent',$location); ?></span></a></li>
							<li><a href="<?= base_url('category/auction');?>">Auction<span><?= ads_type_count('auction',$location); ?></span></a></li>
						</ul>
					</div>
					<!--<div class="widget category-list">
						<h4 class="widget-header">Nearby</h4>
						<ul class="category-list">
							<li><a href="category.html">Ontario <span>93</span></a></li>
							<li><a href="category.html">New Jersy <span>233</span></a></li>
							<li><a href="category.html">Florida  <span>183</span></a></li>
							<li><a href="category.html">New Delhi<span>120</span></a></li>
							<li><a href="category.html">Lucknow <span>40</span></a></li>
							<li><a href="category.html">Kanpur<span>81</span></a></li>
						</ul>
					</div>
					<div class="widget filter">
						<h4 class="widget-header">Show Produts</h4>
						<select class="form-control">
							<option>Popularity</option>
							<option value="1">Top rated</option>
							<option value="2">Lowest Price</option>
							<option value="4">Highest Price</option>
						</select>
					</div>
					<div class="widget price-range">
						<h4 class="widget-header">Price Range</h4>
						<div class="block">
							<b>$10</b>
							<input id="ex2" type="text" class="span2 form-control" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]"/> 
							<b>$5000</b>
						</div>
					</div>
					<div class="widget product-shorting">
						<h4 class="widget-header">By Condition</h4>
						<div class="form-check">
						  <label class="form-check-label">
						    <input class="form-check-input" type="checkbox" value="">
						    Brand New
						  </label>
						</div>
						<div class="form-check">
						  <label class="form-check-label">
						    <input class="form-check-input" type="checkbox" value="">
						    Almost New
						  </label>
						</div>
						<div class="form-check">
						  <label class="form-check-label">
						    <input class="form-check-input" type="checkbox" value="">
						    Gently New
						  </label>
						</div>
						<div class="form-check">
						  <label class="form-check-label">
						    <input class="form-check-input" type="checkbox" value="">
						    Havely New
						  </label>
						</div>
					</div>-->
				</div>
			</div>
			<div class="col-md-9">
				<div class="category-search-filter">
					<div class="row">
					    
						<div class="col-md-6">
							<strong>Short</strong>
							<select class="form-control">
								<option>Most Recent</option>
								<option value="1">Most Popular</option>
								<option value="2">Lowest Price</option>
								<option value="4">Highest Price</option>
							</select>
						</div>
						<div class="col-md-6">
						</div>
					</div>
				</div>
				<div class="product-grid-list">
					<div class="row mt-30">
					    <?php foreach($listing as $list) { 
					    $adimg = $this->db->where('ad_list_id',$list->id)->get('ad_images')->row();
					    ?>
						<div class="col-sm-12 col-lg-4 col-md-6">
							<!-- product card -->
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<div class="price">$<?= $list->price; ?></div>
										<a href="">
											<img style="height: 191px !important;" class="card-img-top img-fluid" src="<?= base_url('assets/images/ads'); ?>/<?= $adimg->image; ?>" alt="Card image cap">
										</a>
									</div>
									<?php
									$service_name = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list->service_name))));
									$listname = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list->name))));

									?>
									<div class="card-body">
									    <h4 class="card-title"><a  target="_blank" href="<?= base_url('');?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $list->id;?>"><?=  $list->name; ?></a></h4>
									    <ul class="list-inline product-meta">
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-folder-open-o"></i><?= $list->service_name; ?></a>
									    	</li>
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-calendar"></i>
									    		<?php
									    		$timestamp   = strtotime($list->updated_on);
                                               echo $newDate = date('d-F-Y', $timestamp); 
									    		?>
									    		</a>
									    	</li>
									    </ul>
									    <p class="card-text"><?php
									    $this->load->helper('text');
									    echo character_limiter($list->description, 40); ?></p>
									    
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
						    <?php echo $links; ?>
							
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include('footer.php'); ?>