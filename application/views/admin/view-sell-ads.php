<div class="app-main__outer">
    <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="metismenu-icon pe-7s-diamond icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>View Sell ads
                            <div class="page-title-subheading">This is a list of approved and running ads.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Pending ads list</h5>
                            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Ads title</th>
                                        <th>Ads Desciption</th>
                                        <th>Price</th>
                                        <th>View Ad</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>                                      
                                 <?php $sr=1; foreach($user_list as $row){ 
                                     $status=$row->status;if($status==1){ ?> 
                                    <tr>  
                                        <td><?php echo $sr; ?></td>  
                                        <td><?php echo $row->name; ?></td>  
                                        <td><?php echo $row->description; ?></td>  
                                        <td><?php echo $row->price; ?></td>
                                        <td><a href="<?php echo site_url("Sell/add_detail/$row->id")?>" type="button" class="mb-2 mr-2 btn btn-primary active" >View</a></td>
                                        <td><a href="<?php echo site_url("Sell/update/$row->id")?>" type="button" class="mb-2 mr-2 btn btn-primary active" >Update</a><a href="<?php echo site_url("Sell/delete/$row->id")?>" type="button" class="mb-2 mr-2 btn btn-danger active">Delete</a></td>  
                                 </tr>
                                 <?php $sr++;} } ?>                        
                                 </tbody>  
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>