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
                            <div class="page-title-subheading">Add sms_templates
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Add sms_templates</h5>
                         
                          <form action="<?= base_url('dashboard/add_sms_templates'); ?>" enctype='multipart/form-data' method="post">
                            <div class="form-group">
                              <label for="text">Type</label>
                              <input type="text" class="form-control" id="name"  name="type" >
                            </div>
                            <div class="row">
                                <p>Available Variables: [SITE_NAME] [USER_NAME] [OTP]</p>
                            </div>
                            <div class="form-group">
                              <label for="image">Content</label>
                              <textarea class="form-control" name="content"></textarea>
                            </div>
                            <button type="submit"  class="btn btn-primary">Save</button>
                          </form>
  
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php include('footer.php'); ?>
