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
                        <div>Approved Users list
                            <div class="page-title-subheading">This is a list of ads waiting for approval by admin.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Approved Customers list</h5>
                            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sr=1; foreach($user_list as $row){ ?>
                                    <tr>
                                        <td><?php echo $sr;?></td>
                                        <td><?php echo $row->name;?></td>
                                        <td><?php echo $row->phone;?></td>
                                        <td><?php echo $row->email;?></td>                     
                                        <td> 
                                        <?php $status = $row->status; 
                                        if ($status == '1') {?> 
                                            <a href="<?php echo base_url();?>Customers/update_customer_status?id=<?php echo $row->id;?>&svalue=1" class="mb-2 mr-2 btn btn-success">Approved</a> 
                                        <?php } else {?> 
                                             <a href="<?php echo base_url();?>Users/update_customer_status?id=<?php echo $row->id;?>&svalue=0" class="mb-2 mr-2 btn btn-danger">Rejected</a>
                                        <?php } ?> 
                                        <a href="delete/<?=$row->id?>"   class="mb-2 mr-2 btn btn-danger active">Delete</a>
                                    </td>
                                    </tr>
                                    <?php $sr++;} ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>