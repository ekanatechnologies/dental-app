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
                        <div>Subscription
                            <div class="page-title-subheading"><?php if(!empty($subscription)){ echo 'Edit Subscription';}else{ echo 'Add Subscription';}?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title"><?php if(!empty($subscription)){ echo 'Edit Subscription';}else{ echo 'Add Subscription';}?></h5>
                         
                          <form action="<?= base_url('Dashboard/addSubscription'); ?>" enctype='multipart/form-data' method="post">
                            <div class="form-group">
                              <label for="text">Name</label>
                              <input type="hidden" class="form-control" id="edit_id"  name="edit_id" value="<?php if(!empty($subscription)){ echo $subscription['id'];}?>">

                              <input type="text" class="form-control" id="name"  name="name" placeholder="Enter New Subscription" value="<?php if(!empty($subscription)){ echo $subscription['name'];}?>">
                            </div>
                            <div class="form-group">
                              <label for="text">Amount</label>
                              <input type="number" min="1" class="form-control" id="amount"  name="amount" placeholder="$" value="<?php if(!empty($subscription)){ echo $subscription['amount'];}?>">
                            </div>
                            <div class="form-group">
                              <label for="text">Post</label>
                              <input type="number" min="1" class="form-control" id="post"  name="post" placeholder="Number Of Posts" value="<?php if(!empty($subscription)){ echo $subscription['post'];}?>">
                            </div>
                            <div class="form-group">
                              <label for="text">Description</label>
                              <textarea class="form-control" name="description"><?php if(!empty($subscription)){ echo $subscription['description'];}?></textarea>
                            </div>
                            <button type="submit"  class="btn btn-primary">Save</button>
                          </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include('footer.php'); ?>
