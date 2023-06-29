 
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

<section class="section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading text-center pb-5">
                    <h2 class="font-weight-bold">Best Price Plan</h2>
                </div>
            </div>
            <?php if(!empty($packages)){
                foreach ($packages as $package) { ?>
            <div class="col-lg-4 col-md-6">
                <div class="package-content bg-light border text-center p-5 my-2 my-lg-0">
                    <div class="package-content-heading border-bottom">
                        <i class="fa fa-paper-plane"></i>
                        <h2><?=$package['name']?></h2>
                        <h4 class="py-3"> <span>$<?=$package['amount']?></span> </h4>
                    </div>
                    <ul>
                        <li class="my-4"> <i class="fa fa-check"></i> Free Ad Posting</li>
                        <li class="my-4"> <i class="fa fa-check"></i>15 Features Ad Availability</li>
                        <li class="my-4"> <i class="fa fa-check"></i>For <?=$package['post']?> Ads</li>
                        <li class="my-4"> <i class="fa fa-check"></i>100% Secure</li>
                    </ul>
                    <a href="#" class="btn btn-primary">Buy Now</a>
                </div>
            </div>
            <br>
             
             <?php } }?>
             <br>
            <!-- <div class="col-lg-4 col-md-6">
                <div class="package-content bg-light border text-center my-2 my-lg-0 p-5">
                    <div class="package-content-heading border-bottom">
                            <i class="fa fa-plane"></i>
                        <h2>Standard Package</h2>
                        <h4 class="py-3"> <span>$30.00</span> Per Month</h4>
                    </div>
                    <ul>
                        <li class="my-4"> <i class="fa fa-check"></i> Free Ad Posting</li>
                        <li class="my-4"> <i class="fa fa-check"></i>15 Features Ad Availability</li>
                        <li class="my-4"> <i class="fa fa-check"></i>For 15 Days</li>
                        <li class="my-4"> <i class="fa fa-check"></i>100% Secure</li>
                    </ul>
                    <a href="#" class="btn btn-primary">Buy Now</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mx-sm-auto">
                <div class="package-content bg-light border text-center p-5 my-2 my-lg-0">
                    <div class="package-content-heading border-bottom">
                            <i class="fa fa-rocket"></i>
                        <h2>Premium Package</h2>
                        <h4 class="py-3"> <span>$50.00</span> Per Month</h4>
                    </div>
                    <ul>
                        <li class="my-4"> <i class="fa fa-check"></i> Free Ad Posting</li>
                        <li class="my-4"> <i class="fa fa-check"></i>15 Features Ad Availability</li>
                        <li class="my-4"> <i class="fa fa-check"></i>For 15 Days</li>
                        <li class="my-4"> <i class="fa fa-check"></i>100% Secure</li>
                    </ul>
                    <a href="#" class="btn btn-primary">Buy Now</a>
                </div>
            </div> -->
        </div>
    </div>
</section>

<!-- ================================ -->

<?php include('footer.php'); ?>
