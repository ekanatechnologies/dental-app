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
                            <div class="page-title-subheading"><?php if(!empty($ads_type)){ echo 'Edit Ads Type & Commission';}else{ echo 'Add Ads Type & Commission';}?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title"><?php if(!empty($ads_type)){ echo 'Edit Ads Type & Commission';}else{ echo 'Add Ads Type & Commission';}?></h5>
                         
                          <form action="<?= base_url('Dashboard/addAdsType'); ?>" enctype='multipart/form-data' method="post">
                            <div class="form-group">
                              <label for="text">Ads Type</label>
                              <input type="hidden" class="form-control" id="edit_id"  name="edit_id" value="<?php if(!empty($ads_type)){ echo $ads_type['id'];}?>">
                              <input type="text" class="form-control" id="name"  name="name" placeholder="Enter New Ads Type" value="<?php if(!empty($ads_type)){ echo $ads_type['name'];}?>" required>
                            </div>
                            <div class="form-group">
                              <label for="image">Commission Rate in %</label>
                               <input type="number" class="form-control" id="commission"  name="commission" placeholder="Enter Commission Rate" min="0" value="<?php if(!empty($ads_type)){ echo $ads_type['commission'];}?>" required >
                            </div>
                            <button type="submit"  class="btn btn-primary">Save</button>
                          </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include('footer.php'); ?>
