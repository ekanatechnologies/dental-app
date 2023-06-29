<?php include('header.php'); ?>
<div class="app-main__outer">
    <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="metismenu-icon pe-7s-diamond icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>User Bid List
                            <div class="page-title-subheading">Manage User Bid List
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Bidding List</h5> 
                             <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Bid/Offer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sr=1; foreach($datas as $row){?>
                                    <tr class="text-center">
                                        <td><?=$sr;?></td>
                                        <td><?= $row['name']; ?></td>  
                                        <td>
                                        <?php if (!empty($row['image'])) {  ?>        
                                            <div class="widget-content-left">
                                                <img width="40" class="rounded-circle" src="<?php echo base_url('assets/images/ads/'); ?><?php echo $row['image'];?>" alt="user-image">
                                            </div>
                                        <?php }else{?>
                                            <div class="widget-content-left">
                                                <img width="40" class="rounded-circle" src="<?php echo base_url('assets/unknown/'); ?>unknown-product.png" alt="user-icon">
                                            </div>
                                        <?php } ?>
                                        </td>     
                                        <td><?= '$'.$row['value']; ?></td> 
                                        <td><?= '$'.$row['price']; ?></td> 
                                        <td>
                                            <a href="<?=base_url('admin/view-purchase-list');?>/<?= $row['id']; ?>" type="button" class="mb-2 mr-2 btn btn-primary active" >View</a>
                                            <?php $status = $row['status']; 
                                        if ($status == '1') {?> 
                                            <a href="<?php echo base_url();?>dashboard/update_order_status?id=<?php echo $row['id'];?>&svalue=1" class="mb-2 mr-2 btn btn-primary">Dispatched</a> 
                                        <?php } elseif($status == '2') {?> 
                                             <a href="<?php echo base_url();?>dashboard/update_order_status?id=<?php echo $row['id'];?>&svalue=2" class="mb-2 mr-2 btn btn-success">Delivered</a>
                                        <?php }else{ ?>
                                            <a href="<?php echo base_url();?>dashboard/update_order_status?id=<?php echo $row['id'];?>&svalue=0" class="mb-2 mr-2 btn btn-danger">Processed</a>
                                        <?php } ?>                                       
                                            <!-- <a href="<?= base_url('admin/delete-category'); ?>/<?= $row['id']; ?>"type="button" class="mb-2 mr-2 btn btn-danger active">Delete</a> -->
                                        </td>
                                    </tr>  
                                    <?php $sr++; } ?>
                                </tbody>  
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include('footer.php'); ?>
