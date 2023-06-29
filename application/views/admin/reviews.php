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
                    <div>Reviews
                        <div class="page-title-subheading">Manage Reviews
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Reviews</h5> 
                       <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Review</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sr=1; foreach($reviews as $row){?>
                                <tr>
                                    <td><?=$sr;?></td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"><?= $row->product_name; ?></div>
                                                    <div class="widget-subheading opacity-7"><?= $row->ad_type; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= $row->name; ?></td>  
                                    <td><?= $row->email; ?></td>  
                                    <td><?= $row->message; ?></td>  
                                    <td>
                                        <?php $status = $row->status; 
                                        if ($status == '1') {?> 
                                            <a href="<?php echo base_url();?>dashboard/update_review_status?id=<?php echo $row->id;?>&svalue=1" class="mb-2 mr-2 btn btn-success">Approved</a> 
                                        <?php } else {?> 
                                           <a href="<?php echo base_url();?>dashboard/update_review_status?id=<?php echo $row->id;?>&svalue=0" class="mb-2 mr-2 btn btn-danger">Rejected</a>
                                       <?php } ?>
                                       <a href="<?= base_url('dashboard/delete_review'); ?>/<?= $row->id; ?>"type="button" class="mb-2 mr-2 btn btn-danger active">Delete</a></td>


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
