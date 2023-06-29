<?php include('header.php'); ?>

<section class=" section">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section title -->
				<div class="section-title">
					<h2>All Categories</h2>
					<p>Category List</p>
				</div>
				<div class="row">
					<!-- Category list -->
					<?php foreach($services as $service) { ?>
					<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<div class="category-block">
							<div class="header">							    
								<h4 style="color:#fff"><?= $service->name; ?></h4>
							</div>
							<ul class="category-list">
							    <?php $sub_services = $this->db->where('service_id',$service->id)->get('sub_services')->result();
							    foreach($sub_services as $sub) {?>
								<li><a style="color:#fff" href="<?= base_url('ads')?>/<?= $service->name; ?>/<?= $sub->name; ?>/<?= $sub->id; ?>"><?= $sub->name; ?> <span><?= subservice_ad_count($sub->id); ?></span></a></li>
								<?php } ?>
							</ul>
						</div>
					</div> <!-- /Category List -->
				
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<?php include('footer.php'); ?>