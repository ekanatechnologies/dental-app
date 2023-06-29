<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="app-main__outer">
    <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="metismenu-icon pe-7s-diamond icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Approve Buy List
                            <div class="page-title-subheading">This is a list of ads waiting for approval by admin.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">List</h5>
                            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>                                    
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Ads title</th>
                                        <th>Ads Desciption</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>View Ad</th>
                                        <th>Action</th>
                                    </tr>                                    
                                </thead>
                                <tbody>
                                    <?php $sr=1; foreach($user_list as $row){ ?>
                                    <tr>
                                        <td><?php echo $sr;?></td>
                                        <td><?php echo $row->name;?></td>
                                        <td><?php echo $row->description;?></td>
                                        <td><?php echo $row->price;?></td>
                                        <td>
                                        <?php if (!empty($row->image)) {  ?>        
                                            <div class="widget-content-left">
                                                <img width="40" class="rounded-circle" src="<?php echo base_url('assets/images/ads/'); ?><?php echo $row->image;?>" alt="user-image">
                                            </div>
                                        <?php }else{?>
                                            <div class="widget-content-left">
                                                <img width="40" class="rounded-circle" src="<?php echo base_url('assets/unknown/'); ?>unknown-product.png" alt="user-icon">
                                            </div>
                                        <?php } ?>
                                        </td>
                                        <?php
                                          $service_name = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($row->service_name))));
                                          $listname = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($row->name))));
                                        ?>
                                        <td><a href="<?= base_url();?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $row->id;?>" type="button" class="mb-2 mr-2 btn btn-primary active" >View</a></td>
                                        <td> 
                                            <?php $status = $row->status; 
                                            if ($status == '1') {?>                         
                                                <a href="<?php echo base_url();?>Buy/update_status?id=<?php echo $row->id;?>&svalue=1" class="mb-2 mr-2 btn btn-success">Approved</a> 
                                            <?php } else {?> 
                                                 <a href="<?php echo base_url();?>Buy/update_status?id=<?php echo $row->id;?>&svalue=0" class="mb-2 mr-2 btn btn-danger">Rejected</a> 
                                            <?php } ?> 
                                            <a href="<?php echo site_url("Buy/delete/$row->id")?>"   class="mb-2 mr-2 btn btn-danger active">Delete</a>
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