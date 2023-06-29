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
                        <div>Sub Category
                            <div class="page-title-subheading"><?php if(!empty($sub_category)){ echo 'Edit Sub Category';}else{ echo 'Add Sub Category';}?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title"><?php if(!empty($sub_category)){ echo 'Edit Sub Category';}else{ echo 'Add Sub Category';}?></h5>
                         
                          <form action="<?= base_url('dashboard/addSubcategory'); ?>"  method="post">
                            <div class="form-group">
                              <input type="hidden" class="form-control" id="edit_id"  name="edit_id" value="<?php if(!empty($sub_category)){ echo $sub_category['id'];}?>">

                              <label for="text">Category</label>
                              <select type="text" class="form-control" id="service_id"  name="service_id" >
                                <option>Select Category</option>
                                <?php foreach($category as $cat) { ?>
                                    <option value="<?= $cat->id; ?>" <?php if(!empty($sub_category)) { if($sub_category['service_id']== $cat->id){ echo 'selected';} }?>><?=$cat->name;?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="text">Name</label>
                              <input type="text" class="form-control" id="name"  name="name" placeholder="Enter New Sub-Category" value="<?php if(!empty($sub_category)){ echo $sub_category['name'];}?>" required>
                            </div>                            
                            <button type="submit"  class="btn btn-primary">Save</button>
                          </form>
  
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php include('footer.php'); ?>
