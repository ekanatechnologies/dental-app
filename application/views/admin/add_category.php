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
                        <div>Category
                            <div class="page-title-subheading"><?php if(!empty($category)){ echo 'Edit Category';}else{ echo 'Add Category';}?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title"><?php if(!empty($category)){ echo 'Edit Category';}else{ echo 'Add Category';}?></h5>
                         
                          <form action="<?= base_url('Dashboard/addCategory'); ?>" enctype='multipart/form-data' method="post">
                            <div class="form-group">
                              <label for="text">Name</label>
                              <input type="hidden" class="form-control" id="edit_id"  name="edit_id" value="<?php if(!empty($category)){ echo $category['id'];}?>">

                              <input type="text" class="form-control" id="name"  name="name" placeholder="Enter New Category" value="<?php if(!empty($category)){ echo $category['name'];}?>" required>
                            </div>
                            <div class="form-group">
                              <label for="image">image</label>
                              <input type="file" class="form-control" id="userfile"  name="userfile" >
                              <input type="hidden" class="form-control" id="old_img"  name="old_img" value="<?php if(!empty($category)){ echo $category['image'];}?>" >
                            </div>
                            <button type="submit"  class="btn btn-primary">Save</button>
                          </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include('footer.php'); ?>
