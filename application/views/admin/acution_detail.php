

<div class="app-main__outer">
    <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="metismenu-icon pe-7s-diamond icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>View Acution detail
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Pincode</th>
                                        <th>Locality</th>
                                        <th>Street</th>
                                        <th>HouseNo</th>
                                        <th>Description</th>
                                        <th>City</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sr=1; foreach($user_list as $row){ ?> 
                                <tr>                                
                                <td><?php echo $row->name; ?></td>  
                                <td><?php echo $row->email; ?></td>  
                                <td><?php echo $row->phone; ?></td>
                                <td><?php echo $row->pincode; ?></td>
                                <td><?php echo $row->locality; ?></td>
                                <td><?php echo $row->street; ?></td>
                                <td><?php echo $row->houseno; ?></td>
                                <td><?php echo $row->description;?></td>
                                <td><?php echo $row->city; ?></td>
                                <td><?php echo $row->latitude; ?></td>
                                <td><?php echo $row->longitude; ?></td>
                                <td><?php echo $row->price; ?></td>
                                <td><?php echo $row->image; ?></td>
                                <td><a href="<?php echo site_url("Auction/update/$row->id")?>" type="button" class="mb-2 mr-2 btn btn-primary active" >Update</a><a href="<?php echo site_url("Acution/delete/$row->id")?>"type="button" class="mb-2 mr-2 btn btn-danger active">Delete</a></td> 
                            </tr>  
                                 <?php $sr++;} ?>                      
                                 </tbody>  
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>