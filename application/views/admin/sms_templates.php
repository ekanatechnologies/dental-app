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
                        <div>sms_templates
                            <div class="page-title-subheading">Manage sms_templates
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">sms_templates</h5>
                        
                             <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Content</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sr=1; foreach($sms_templates as $row) {?>
                                    <tr>
                                        <td><?=$sr; ?></td>
                                        <td><?= $row->type; ?></td>  
                                        <td><?= $row->content; ?></td> 
                                        <td><a href="<?= base_url('admin/edit_sms_templates'); ?>/<?= $row->id; ?>" type="button" class="mb-2 mr-2 btn btn-primary active" >Edit</a><a href="<?= base_url('admin/delete_sms_templates'); ?>/<?= $row->id; ?>"type="button" class="mb-2 mr-2 btn btn-danger active">Delete</a></td>
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
