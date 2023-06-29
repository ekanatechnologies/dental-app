  <?php include('header.php'); ?>

<section class="section-sm">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					<h2>Results For "Electronics"</h2>
					<p>123 Results on 12 December, 2017</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<div class="category-sidebar">
					<div class="widget category-list">
						<h4 class="widget-header">All Category</h4>
						<ul class="category-list">
							<li><a href="category.html">Laptops <span>93</span></a></li>
							<li><a href="category.html">Iphone <span>233</span></a></li>
							<li><a href="category.html">Microsoft  <span>183</span></a></li>
							<li><a href="category.html">Monitors <span>343</span></a></li>
						</ul>
					</div>

					<div class="widget category-list">
						<h4 class="widget-header">Nearby</h4>
						<ul class="category-list">
							<li><a href="category.html">New York <span>93</span></a></li>
							<li><a href="category.html">New Jersy <span>233</span></a></li>
							<li><a href="category.html">Florida  <span>183</span></a></li>
							<li><a href="category.html">California <span>120</span></a></li>
							<li><a href="category.html">Texas <span>40</span></a></li>
							<li><a href="category.html">Alaska <span>81</span></a></li>
						</ul>
					</div>

					<div class="widget filter">
						<h4 class="widget-header">Show Produts</h4>
						<select>
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
							<input id="ex2" type="text" class="span2" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]"/> 
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
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="category-search-filter">
					<div class="row">
						<div class="col-md-6">
							<strong>Short</strong>
							<select>
								<option class="form-control">Most Recent</option>
								<option value="1">Most Popular</option>
								<option value="2">Lowest Price</option>
								<option value="4">Highest Price</option>
							</select>
						</div>
						<div class="col-md-6">
							<div class="view">
								<strong>Views</strong>
								<ul class="list-inline view-switcher">
									<li class="list-inline-item">
										<a href="javascript:void(0);"><i class="fa fa-th-large"></i></a>
									</li>
									<li class="list-inline-item">
										<a href="javascript:void(0);"><i class="fa fa-reorder"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="product-grid-list">
					<div class="row mt-30">
						<div class="col-sm-12 col-lg-6 col-md-6">
							<!-- product card -->
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<div class="price">$200</div>
										<a href="">
											<img class="card-img-top img-fluid" src="<?= base_url('assets/frontend/'); ?>images/products/1.jpg">
									</div>
									<div class="card-body">
									    <h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
									    <ul class="list-inline product-meta">
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
									    	</li>
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-calendar"></i>26th December</a>
									    	</li>
									    </ul>
									    
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-lg-6 col-md-6">
							<!-- product card -->
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<div class="price">$200</div>
										<a href="">
											<img class="card-img-top img-fluid" src="<?= base_url('assets/frontend/'); ?>images/products/3.jpg" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
									    <h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
									    <ul class="list-inline product-meta">
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
									    	</li>
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-calendar"></i>26th December</a>
									    	</li>
									    </ul>
									    
									    
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-lg-6 col-md-6">
							<!-- product card -->
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<div class="price">$200</div>
										<a href="">
											<img class="card-img-top img-fluid" src="<?= base_url('assets/frontend/'); ?>images/products/4.jpg" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
									    <h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
									    <ul class="list-inline product-meta">
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
									    	</li>
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-calendar"></i>26th December</a>
									    	</li>
									    </ul>
									    
									    
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-lg-6 col-md-6">
							<!-- product card -->
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<div class="price">$200</div>
										<a href="">
											<img class="card-img-top img-fluid" src="<?= base_url('assets/frontend/'); ?>images/products/5.jpg" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
									    <h4 class="card-title"><a href="">Study Table Combo</a></h4>
									    <ul class="list-inline product-meta">
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-folder-open-o"></i>Furnitures</a>
									    	</li>
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-calendar"></i>26th December</a>
									    	</li>
									    </ul>
									    
									    
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-lg-6 col-md-6">
							<!-- product card -->
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<div class="price">$200</div>
										<a href="">
											<img class="card-img-top img-fluid" src="<?= base_url('assets/frontend/'); ?>images/products/6.jpg" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
									    <h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
									    <ul class="list-inline product-meta">
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
									    	</li>
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-calendar"></i>26th December</a>
									    	</li>
									    </ul>
									    
									    
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-lg-6 col-md-6">
							<!-- product card -->
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<div class="price">$200</div>
										<a href="">
											<img class="card-img-top img-fluid" src="<?= base_url('assets/frontend/'); ?>images/products/5.jpg" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
									    <h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
									    <ul class="list-inline product-meta">
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
									    	</li>
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-calendar"></i>26th December</a>
									    	</li>
									    </ul>
									    
									    
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-lg-6 col-md-6">
							<!-- product card -->
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<div class="price">$200</div>
										<a href="">
											<img class="card-img-top img-fluid" src="<?= base_url('assets/frontend/'); ?>images/products/6.jpg" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
									    <h4 class="card-title"><a href="">Study Table Combo</a></h4>
									    <ul class="list-inline product-meta">
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-folder-open-o"></i>Furnitures</a>
									    	</li>
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-calendar"></i>26th December</a>
									    	</li>
									    </ul>
									    
									    
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-lg-6 col-md-6">
							<!-- product card -->
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<div class="price">$200</div>
										<a href="">
											<img class="card-img-top img-fluid" src="<?= base_url('assets/frontend/'); ?>images/products/7.jpg" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
									    <h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
									    <ul class="list-inline product-meta">
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
									    	</li>
									    	<li class="list-inline-item">
									    		<a href=""><i class="fa fa-calendar"></i>26th December</a>
									    	</li>
									    </ul>
									    
									    
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="col-md-4">
				<div class="content-block mapdesign">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d184551.80857816365!2d-79.51814416495607!3d43.71840381269127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4cb90d7c63ba5%3A0x323555502ab4c477!2sToronto%2C%20ON%2C%20Canada!5e0!3m2!1sen!2sin!4v1616479934545!5m2!1sen!2sin" width="100%" height="650" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					
					
				</div>
				
			</div>
		</div>
	</div>
</section>



<?php include('footer.php'); ?>