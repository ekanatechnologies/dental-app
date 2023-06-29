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
                        <div>Ads Type & Commission
                            <div class="page-title-subheading">Manage Ads Type & Commission
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Ads Type & Commission</h5> 
                             <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Commission</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sr=1; foreach($ads_types as $row){?>
                                    <tr>
                                        <td><?=$sr;?></td>
                                        <td><?= $row->name; ?></td>  
                                        <td><?= $row->commission; ?></td> 
                                        <td><a href="<?= base_url('dashboard/add_ads_type'); ?>/<?= $row->id; ?>" type="button" class="mb-2 mr-2 btn btn-primary active" >Edit</a>
                                        <?php $status = $row->status; 
                                        if ($status == '1') {?> 
                                            <a href="<?php echo base_url();?>dashboard/update_ads_type_status?id=<?php echo $row->id;?>&svalue=1" class="mb-2 mr-2 btn btn-success">Approved</a> 
                                        <?php } else {?> 
                                             <a href="<?php echo base_url();?>dashboard/update_ads_type_status?id=<?php echo $row->id;?>&svalue=0" class="mb-2 mr-2 btn btn-danger">Rejected</a>
                                        <?php } ?>
                                            <a href="<?= base_url('dashboard/delete_ads_type'); ?>/<?= $row->id; ?>"type="button" class="mb-2 mr-2 btn btn-danger active">Delete</a></td>
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
