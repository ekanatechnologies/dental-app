<!-- Dashboard Links -->					 
<div class="widget user-dashboard-menu">
	<ul>		
		<li>
			<a href="<?= base_url('my-favorite-ads');?>"><i class="fa fa-heart-o"></i> My Favorite Ads<span><?=count($this->home_model->getFavoriteAds(user_details()->id))  ?></span></a>
		</li>
		<li>
			<a href="<?=base_url('my-subscription')?>"><i class="fa fa-plus-circle"></i> My Subscription</a>
		</li>
		<li>
			<a href="<?= base_url('cart');?>"><i class="fa fa-shopping-cart"></i> Cart<span><?php echo ($this->cart->total_items() > 0)?$this->cart->total_items():'0'; ?></span></a>
		</li>
		<!-- <li>
			<a href="<?= base_url('checkout');?>"><i class="fa fa-shopping-cart"></i> Checkout<span><?php echo ($this->cart->total_items() > 0)?$this->cart->total_items():'0'; ?></span></a>
		</li> -->
		<li>
			<a href="<?= base_url('recentaly-view-ads');?>"><i class="fa fa-bookmark-o"></i> Recentaly viewed</a>
		</li>
		<li>
			<a href="<?= base_url('my-bids');?>"><i class="fa fa-bookmark-o"></i> Bids/Offers<span><?=count($this->home_model->getBids(user_details()->id))  ?></span></a>
		</li>
		<li>
			<a href="<?= base_url('purchase-history');?>"><i class="fa fa-file-archive-o"></i> Purchase history<span><?=count($this->home_model->getPurchaseHistory(user_details()->id))  ?></span></a>
		</li>
		<li>
			<a href="<?= base_url('my-favorite-ads');?>"><i class="fa fa-cog"></i> Watching <span><?=count($this->home_model->getFavoriteAds(user_details()->id))  ?></span></a>
		</li>
		<li>
			<a href="#"><i class="fa fa-list"></i>Saved searches</a>
		</li>
		<li>
			<a href="<?= base_url('my-saved-seller');?>"><i class="fa fa-user"></i> Saved Seller<span><?=count($this->home_model->getSavedseller(user_details()->id))  ?></span></a>
		</li>
		<li>
			<a href="<?= base_url('selling');?>"><i class="fa fa-bolt"></i> Selling</a>
		</li>
	</ul>
</div>
<!-- Dashboard Links -->