
    <?php include('header.php'); ?>
    <style type="text/css">
        .package-content {
            transition: all linear 0.3s;
            .package-content-heading {
                i {
                    font-size: 50px;
                    padding-bottom: 25px;
                    color: #5672f9;
                }
                span {
                    font-size: 30px;
                }
            }
            ul {
                li {
                    i {
                        margin-right: 10px;
                    }
                }
            }
            &:hover {
                box-shadow:0 .5rem 1rem rgba(0,0,0,.15);
            }
        }

        .package-content-heading i {
            font-size: 50px;
            padding-bottom: 25px;
            color: #5672f9;
        }

    </style>
    <!--================================
    =            Page Title            =
    =================================-->

    <!-- <section class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading text-center pb-5">
                        <h2 class="font-weight-bold">Flipbooks</h2>
                    </div>
                </div>
                <?php if(!empty($flipbooks)){
                    foreach ($flipbooks as $flipbook) { ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="package-content bg-light border text-center p-5 my-2 my-lg-0">
                                <div class="package-content-heading border-bottom">
                                    <?php if (!empty($flipbook['cover'])) {  ?>        
                                        <div class="widget-content-left">
                                            <img width="40" class="rounded-circle" src="<?php echo base_url('uploads/flipbooks/'); ?><?php echo $flipbook['cover'];?>" alt="user-image">
                                        </div>
                                    <?php }else{?>
                                        <div class="widget-content-left">
                                            <img width="40" class="rounded-circle" src="<?php echo base_url('assets/images/avatars/'); ?>4.jpg" alt="user-icon">
                                        </div>
                                    <?php } ?>
                                    <h2><?=$flipbook['title']?></h2>

                                    <!-- <h4 class="py-3"> <span><?=$flipbook['cover']?></span> </h4>
                                </div>
                      <ul>
                        <li class="my-4"> <i class="fa fa-check"></i> Free Ad Posting</li>
                        <li class="my-4"> <i class="fa fa-check"></i>15 Features Ad Availability</li>
                        <li class="my-4"> <i class="fa fa-check"></i>For <?=$flipbook['title']?> Ads</li>
                        <li class="my-4"> <i class="fa fa-check"></i>100% Secure</li>
                    </ul> 
                    <! -- <br>
                    <a href="<?php echo base_url() ?>admin/detail/<?php echo $flipbook['id']; ?>" target="_blank" class="btn btn-primary">View Flipbook</a>
                </div>
            </div>
        <?php } }?>             
    </div>
    </div>
    </section> -->  

    <section class="mb-5">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading text-center text-capitalize font-weight-bold py-5">
                  <h2>Our Flipbooks</h2>
              </div>
          </div>
          <?php if(!empty($flipbooks)){
                foreach ($flipbooks as $flipbook) { ?>           
    <div class="col-lg-3 col-sm-6">
        <div class="card my-3 my-lg-0">
            <?php if (!empty($flipbook['cover'])) {  ?>
          <img class="card-img-top" src="<?=base_url('uploads/flipbooks/'); ?><?=$flipbook['cover'];?>" class="img-fluid w-100" alt="Card image cap">
          <?php }else{?>
          <img class="card-img-top" src="<?=base_url('uploads/flipbooks/'); ?>book-data.png" class="img-fluid w-100" alt="Card image cap">
            <?php } ?>
          <div class="card-body bg-gray text-center">
            <h5 class="card-title"><?=$flipbook['title']?></h5>
            <p class="card-text"><a href="<?php echo base_url() ?>admin/detail/<?php echo $flipbook['id']; ?>" target="_blank" class="btn btn-primary">View Flipbook</a></p>
        </div>
        </div>
    </div> 
    <?php } } ?>    
    </div>
    </div>
    </section>
    <!-- ================================ -->

    <?php include('footer.php'); ?>
