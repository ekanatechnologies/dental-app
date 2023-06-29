<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					<h2>Results For "Marketplace"</h2>
					<p><?php
                            if(!empty($ads)){                                
                                foreach ($ads as $ad) {
                                	if ($ad['ad_name']=='Marketplace') {
                                		echo $ad['count'];
                                	}                                	
                          }}?> Results on <?php echo date('d F, Y'); ?></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">
					<div class="widget product-shorting">
						<h4 class="widget-header">All Ads</h4>
						<?php
					
                            if(!empty($ads)){
                                $i = 0;
                                foreach ($ads as $ad) {
                        ?>
						<div class="form-check">
							<span class="custom-checkbox ad_filter">
                                <input type="checkbox" id="compositions_ad<?php echo $i;?>" value="<?php echo $ad['ad_type_id'];?>" class="compositions">
                                <label for="compositions_ad<?php echo $i;?>"><?php echo $ad['ad_name'].' ('. $ad['count'].')';?></label>
                            </span>
						</div>
						<?php $i++; } } ?>
					</div>
					<div class="widget product-shorting">
						<h4 class="widget-header">All Category</h4>
						<?php
                            if(!empty($cats)){
                                $i = 0;
                                foreach ($cats as $cat) {
                        ?>
						<div class="form-check">
							<span class="custom-checkbox cat_filter">
                                <input type="checkbox" id="compositions_cat<?php echo $i;?>" value="<?php echo $cat['cat_id'];?>" class="compositions">
                                <label for="compositions_cat<?php echo $i;?>"><?php echo $cat['cat_name'].' ('. $cat['count'].')';?></label>
                            </span>
						</div>
						<?php $i++; } } ?>
					</div>

					<div class="widget product-shorting">
						<h4 class="widget-header">Sub Category</h4>
						<?php
                            if(!empty($subcats)){
                                $i = 0;
                                foreach ($subcats as $subcat) {
                        ?>
						<div class="form-check">
							<span class="custom-checkbox subcat_filter">
                                <input type="checkbox" id="compositions_subcat<?php echo $i;?>" value="<?php echo $subcat['subcat_id'];?>" class="compositions">
                                <label for="compositions_subcat<?php echo $i;?>"><?php echo $subcat['subcat_name'].' ('. $subcat['count'].')';?></label>
                            </span>
						</div>
						<?php $i++; } } ?>
					</div>
					<div class="widget product-shorting">
						<h4 class="widget-header">Nearby</h4>
						<?php
                            if(!empty($cities)){
                                $i = 0;
                                foreach ($cities as $city) {
                        ?>
						<div class="form-check" >
							<span class="custom-checkbox city_filter">
                                <input type="checkbox" id="compositions_city<?php echo $i;?>" value="<?php echo $city['city'];?>" class="compositions">
                                <label for="compositions_city<?php echo $i;?>"><?php echo $city['city'].' ('. $city['count'].')';?></label>
                                
                            </span>
						</div>
						<?php $i++; } } ?>						 
					</div>	
					<div class="widget product-shorting">
						<h4 class="widget-header">By Condition</h4>
						<?php
                            if(!empty($qualities)){
                                $i = 0;
                                foreach ($qualities as $quality) {
                        ?>
						<div class="form-check" >
							<span class="custom-checkbox quality_filter">
                                <input type="checkbox" id="compositions_quality<?php echo $i;?>" value="<?php echo $quality['quality'];?>" class="compositions">
                                <label for="compositions_quality<?php echo $i;?>"><?php echo $quality['quality'].' ('. $quality['count'].')';?></label>
                                
                            </span>
						</div>						
						<?php $i++; } } ?>						 
					</div>			 

					<!-- <div class="widget price-range w-100">
						<h4 class="widget-header">Price Range</h4>
						<div class="block">
							<input class="range-track w-100" type="text" data-slider-min="0" data-slider-max="5000" data-slider-step="5"
									data-slider-value="[0,5000]" id>
							<div class="d-flex justify-content-between mt-2">
								<span class="value" id="slider-range"></span>
							</div>
						</div>
					</div>	 -->	 

				</div>
			</div>
			<div class="col-md-9">
				<div class="category-search-filter">
					<div class="row">
						<div class="col-md-2">
							<strong>Show</strong>
							<select class="form-control sort_by_chk" >
                                <option value="6">6</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                            </select>
						</div>
						<div class="col-md-4">
							<strong>Short</strong>
							<select class="form-control sort_by">
                                <option value="1">Default</option>
                                <option value="2">Name (A-Z)</option>
                                <option value="3">Price (min - max)</option>
                                <!-- <option value="4">Color</option> -->
                            </select>
						</div>
						<div class="col-md-6">
							<div class="view">
								<strong>Views</strong>
								<ul class="list-inline view-switcher">
									<li class="list-inline-item">
										<a href="<?php echo base_url('marketplace');?>" onclick="event.preventDefault();" class="text-info"><i class="fa fa-th-large"></i></a>
									</li>
									<li class="list-inline-item">
										<a href="<?php echo base_url('marketplace-list');?>"><i class="fa fa-reorder"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<?php
                        if(empty($page_id)){
                            $page_id = '';
                        }
                    ?>

				<div class="product-grid-list" id="myTabContent-marketplace" data-url=<?php echo base_url('welcome/product_filter_marketplace/' . $page_id);?>>
					
				</div>			  
 

			</div>
		</div>
	</div>
</section>