<div class="widget user-dashboard-menu">
	<ul>
		<li>
			<a href="<?=base_url('my-dashboard');?>"><i class="fa fa-dashboard"></i> My Dashboard</a>
		</li>
		<li>
			<a href="<?=base_url('edit-profile');?>"><i class="fa fa-user"></i> My Profile</a>
		</li>
		<li>
			<a href="<?=base_url('my-ads');?>"><i class="fa fa-bookmark-o"></i> My Ads<span><?=count($this->home_model->getUserAds(user_details()->id))  ?></span></a>
		</li>		 
		<li>
			<a href="<?=base_url('user-chat');?>"><i class="fa fa-envelope"></i> My Chats <span></span></a>
		</li>
		<li>
			<a href="<?=base_url('change-password');?>"><i class="fa fa-lock"></i>Change Password <span></span></a>
		</li>		 
		<li>
			<a href="<?= base_url('welcome/logout'); ?>"><i class="fa fa-cog"></i> Logout </a>
		</li>
		<!-- <li>
			<a href="<?=base_url('delete-account');?>'"><i class="fa fa-power-off"></i> Delete Account </a>
		</li> -->
		</ul>
</div>