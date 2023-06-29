<!DOCTYPE html>
<html lang="en">
<head>
	<!-- SITE TITTLE -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Dental Buy & Sell, Marketplace, Auction and services</title>	
	<!-- Bootstrap -->
	<link href="<?= base_url('assets/frontend/'); ?>plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	<link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>plugins/bootstrap/dist/css/bootstrap-slider.css">  
	<!-- Font Awesome -->
	<link href="<?= base_url('assets/frontend/'); ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- Owl Carousel -->
	<link href="<?= base_url('assets/frontend/'); ?>plugins/slick-carousel/slick/slick.css" rel="stylesheet">
	<link href="<?= base_url('assets/frontend/'); ?>plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
	<!-- Fancy Box -->
	<link href="<?= base_url('assets/frontend/'); ?>plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
	<link href="<?= base_url('assets/frontend/'); ?>plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="<?= base_url('assets/frontend/'); ?>plugins/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxVaqdZ9DJzCpdnGmvoi7nvV0bxEMEFKA&libraries=places"></script>
	<!-- CUSTOM CSS -->
	<link href="<?= base_url('assets/frontend/'); ?>css/style.css" rel="stylesheet">
	<link href="<?= base_url('assets/frontend/'); ?>css/custom.css" rel="stylesheet">

	<!-- FAVICON -->
	<link href="<?= base_url('assets/frontend/'); ?>images/logo.png" rel="shortcut icon">
	<script src="https://kit.fontawesome.com/d123848038.js" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="body-wrapper">
	<?php if ($this->session->flashdata('success')): ?>
		<script>
			swal({
				title: "Success",
				text: "<?= $this->session->flashdata('success'); ?>",
				icon: "success",
				timer: 2000,
			});
		</script>
	<?php endif; ?>
	<?php if ($this->session->flashdata('error')): ?>
		<script>
			swal({
				title: "Error",
				text:  "<?= $this->session->flashdata('error'); ?>",
				icon: "error",
				timer: 2000,
			});
		</script>
	<?php endif; ?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg">
						<a class="navbar-brand" id="logo" href="<?= base_url(); ?>">
							<img src="<?= base_url('assets/frontend/'); ?>images/logo.png" alt="">
						</a>						
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<form method="post" action="<?php echo base_url('shop-left-sidebar/1/cat');?>" >
								<ul class="navbar-nav ml-auto main-nav ">
									<li class="nav-item active">
										<select name="ad_type" class="form-control headerselect" >
											<option value="0">All Category</option>
											<?php 
											$adtype = $this->db->get_where('ad_type',array('status'=>1))->result();
											foreach($adtype as $ad) { ?>
												<option value="<?= $ad->id; ?>"><?= $ad->name; ?></option>
											<?php  } ?>
										</select>
										
									</li>
									<li class="nav-item">
										<input name="search"  type="text" name="search" class="form-control headerselect" placeholder="search...">
									</li>
									<li class="nav-item">
										<input id="search" type="text" name="city" class="form-control headerselect" placeholder="Location">							
									</li>
									<li class="nav-item">
										<button type="submit" class="form-control headerselect btncolor" style="margin-left: 1px"><i class="fa fa-search" aria-hidden="true" ></i></button>							
									</li>
								</ul>
							</form>
							<ul class="navbar-nav ml-auto mt-10">
								<li class="nav-item">
									<a class="nav-link btn postcolor"  href="<?= base_url('postads'); ?>"><i class="far fa-plus-square"></i>&nbsp;Post ads</a>
								</li>
								&nbsp;
								<?php
								if(is_logged_in()) {
									?>
									<li class="nav-item dropdown dropdown-slide">
										<a class="nav-link btn logincolor dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<?= user_details()->name; ?> </span>
										</a>
										<!-- Dropdown list -->
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="<?= base_url('my-dashboard'); ?>">My Dashboard</a>
											<!-- <a class="dropdown-item" href="<?= base_url('welcome/profile'); ?>">My Profile</a> -->
											<!-- <a class="dropdown-item" href="<?= base_url('chat'); ?>">My Chats</a> -->
											<a class="dropdown-item" href="<?= base_url('welcome/logout'); ?>">Logout</a>
										</div>
									</li>
									&nbsp;
									<li class="nav-item">
									<a class="nav-link btn postcolor"  href="<?= base_url('cart'); ?>"><i class="fa fa-shopping-cart"></i>&nbsp;(<?php echo ($this->cart->total_items() > 0)?$this->cart->total_items():'0'; ?>)</a>
								</li>
								&nbsp;
								<?php } else {
									?>
									<a href="#appointment" data-toggle="modal" data-target="#sign-in-up" class="nav-link btn signincolor"><span class="d-none d-md-inline"></span>Sign In</a>
									<?php } ?>
							</ul>
						</div>
					</nav>
					<nav class="navbar navbar-expand-lg">						
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="border: 3px solid #2f7ab9;">
							<span class="fa fa-bars"></span>
						</button>
						<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
							<ul class="navbar-nav main-nav ">
								<li class="nav-item">
									<a class="nav-link btn btncolor" href="<?php echo base_url('shop-left-sidebar/1/cat');?>">Buy/Sell</a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn btncolor" href="<?php echo base_url('marketplace');?>">Marketplace</a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn btncolor" href="<?php echo base_url('auction');?>">Auction</a>
								</li>
							<!-- <li class="nav-item">
								<a class="nav-link btn btncolor" href="<?php echo base_url('shop-left-sidebar/4/cat');?>">Rent</a>
							</li> -->
							<li class="nav-item">
								<a class="nav-link btn btncolor" href="<?php echo base_url('shop-left-sidebar/4/cat');?>">Service</a>
							</li>
							<!-- <li class="nav-item">
								<a class="nav-link btn btncolor" href="<?php echo base_url('shop-left-sidebar/4/cat');?>">Job</a>
							</li>  -->
						</ul> 
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>
<style>
	.ui-menu-item .ui-menu-item-wrapper {
		background: #fff !important;
		font-weight: bold !important;
	} 
	.ui-menu-item .ui-menu-item-wrapper.ui-state-active {
		background: #6693bc !important;
		font-weight: bold !important;
	} 

</style>
<style>
	.ui-autocomplete {
		max-height: 200px;
		overflow-y: auto;
		/* prevent horizontal scrollbar */
		overflow-x: hidden;
		/* add padding to account for vertical scrollbar */
		padding-right: 20px;
	} 
	
	.product1{
		height :200px;
		width : 100%;
	}
	
	.design{
	    font-size: 12px;
	    letter-spacing: 0px;
	    display: inline-block;
	    border-radius: 14px;
		}		 
</style>
