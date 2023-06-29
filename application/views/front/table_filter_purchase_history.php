<table class="table table-responsive product-dashboard-table">
	<thead>
		<tr>
			<th>Image</th>
			<th>Product Title</th>
			<th class="text-center">Quantity</th>
			<th class="text-center">Price</th>
			<th class="text-center">Action</th>
		</tr>
	</thead>							

	<tbody>


		<?php if (!empty($users)) {
			$sr=1; foreach ($users as $key => $value) { 
				$adimg = $this->db->where('ad_list_id',$value['id'])->get('ad_images')->row();
				//$service_name = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($value['service_name']))));
				//$listname = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($value['name']))));
				?>												
				<tr>
					<td class="product-thumb">
						<?php if (!empty($adimg->image)) { ?> 
							<img width="80px" height="auto" src="<?= base_url('assets/images/ads'); ?>/<?= $adimg->image; ?>" alt="image description">
						<?php }else{ ?>
							<img width="80px" height="auto" alt="image description" src="<?= base_url('assets/images/avatars/no-image.jpg'); ?>" alt="image description" >
						<?php } ?>
						<!-- <img width="80px" height="auto" src="<?php echo base_url('assets/frontend/'); ?>images/products/products-1.jpg" > -->
					</td>
					<td class="product-details">
						<h3 class="title"><?=$value['name']?></h3>
						<span class="add-id"><strong>Category:</strong> <?=$value['name']?></span>
						<span class="add-id"><strong>Ad ID:</strong> <?=$value['id']?></span>
						<span><strong>Posted on: </strong>
							<time>
								<?php
								$timestamp    = strtotime($value['updated_on']);
								echo $newDate = date('d-F-Y', $timestamp); 
								?>		                                    	
							</time>
						</span>
						<?php if ($value['status'] == 1) { ?>
							<span class="status active"><strong>Status</strong>Active</span>
						<?php }else{ ?>
							<span class="status" style="color: red;"><strong>Status</strong>Pending</span>												
						<?php }?>
						<span class="location"><strong>Location</strong><?=$value['city'].','.$value['country'];?></span>
					</td>
					<td class="product-category"><span class="categories"><?=$value['quantity'];?></span>
					</td>
					<td class="product-category"><span class="categories"><?=$value['sub_total'];?></span>
					</td>
					<td class="action" data-title="Action">
						<div class="">
							<ul class="list-inline justify-content-center">
								<li class="list-inline-item">
									<a data-toggle="tooltip" data-placement="top" title="View" class="view" href="<?= base_url();?>viewad/<?= $value['id'];?>">
										<i class="fa fa-eye"></i>
									</a>
								</li>							
								<?php if ($value['status'] == 0) { ?>
									<li class="list-inline-item">
										<a data-toggle="tooltip" data-placement="top" title="Delete" class="delete" href="<?php echo base_url('welcome/delete_post/').$value['id']; ?>">
											<i class="fa fa-trash"></i>
										</a>
									</li>
								<?php } ?>
							</ul>
						</div>
					</td>
				</tr>		
				<?php $sr++; } } ?>	
			</tbody>
		</table>
