
<?php include('header.php');?>


<div class="app-main__outer">
    <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="metismenu-icon pe-7s-diamond icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>View Manufacturer ads
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
  <?php
  foreach($data as $row)
  {
  ?>
  <form action="<?php echo base_url()?>Manufacturer/update" method="post">
    <div class="form-group">
      <label for="text">Name:</label>
      <input type="text" class="form-control" id="name"  name="name" value="<?php echo $row->name; ?>">
    </div>
    <div class="form-group">
      <label for="description">Desription:</label>
      <input type="text" class="form-control" id="description"  name="description" value="<?php echo $row->description; ?>">
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="text" class="form-control" id="price"  name="price" value="<?php echo $row->price; ?>">
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
  </form>
  <?php  } ?>
  
 </div>
                    </div>
                </div>
            </div>
        </div>


<?php include('footer.php'); ?>
