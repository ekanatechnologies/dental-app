<?php include('header.php'); ?>
<section class="section bg-gray">
   <!-- Container Start -->
   <div class="container">
      <div class="row">
         <!-- Left sidebar -->
         <div class="col-md-8">
            <div class="product-details">
               <h1 class="product-title"><?= $list->name; ?></h1>
               <div class="product-meta">
                  <ul class="list-inline">
                     <li class="list-inline-item"><i class="fa fa-user-o"></i> By <a href=""><?= $list->name; ?></a></li>
                     <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href=""><?=$list->service_name;?></a></li>
                     <li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href=""><?= $list->city; ?> <?= $list->country; ?></a></li>
                  </ul>
               </div>
               <div id="carouselExampleIndicators" class="product-slider carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                     <?php
                        $adimg = $this->db->where('ad_list_id',$list->id)->get('ad_images')->result();
                        $i = 0;
                        foreach($adimg as $img) {
                         ?>
                     <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i; ?>" <?php if($i==0) 
                        echo 'class="active"'; ?> ></li>
                     <?php $i++; } ?>
                  </ol>
                  <div class="carousel-inner">
                     <?php
                        $i = 0;
                        foreach($adimg as $img) {
                        ?>
                     <div class="carousel-item <?php if($i==0) 
                        echo 'active'; ?>">
                        <?php if (!empty($img->image)) { ?>
                        <img style="max-width: 800px !important;
                           max-height: 500px !important;" class="d-block w-100" src="<?= base_url('assets/images/ads'); ?>/<?= $img->image; ?>" alt="<?= $list->name; ?>">
                         <?php }else{ ?>
                          <img style="max-width: 800px !important;
                           max-height: 500px !important;" class="d-block w-100" src="<?= base_url('assets/unknown/'); ?>unknown-product.png" alt="<?= $list->name; ?>">
                         <?php } ?>
                     </div>
                     <?php $i++; } ?>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                  </a>
               </div>
               <!-- <div class="content">
                  <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Product Details</a>
                     </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                     <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <h3 class="tab-title">Product Description</h3>
                        <p><?= $list->description; ?></p>
                     </div>
                  </div>
               </div> -->
               <div class="content mt-5 pt-5">
            <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
                 aria-selected="true">Product Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
                 aria-selected="false">Specifications</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"
                 aria-selected="false">Reviews</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <h3 class="tab-title">Product Description</h3>
                <p><?=$list->description;?></p>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia laudantium beatae quod perspiciatis, neque
                  dolores eos rerum, ipsa iste cum culpa numquam amet provident eveniet pariatur, sunt repellendus quas
                  voluptate dolor cumque autem molestias. Ab quod quaerat molestias culpa eius, perferendis facere vitae commodi
                  maxime qui numquam ex voluptatem voluptate, fuga sequi, quasi! Accusantium eligendi vitae unde iure officia
                  amet molestiae velit assumenda, quidem beatae explicabo dolore laboriosam mollitia quod eos, eaque voluptas
                  enim fuga laborum, error provident labore nesciunt ad. Libero reiciendis necessitatibus voluptates ab
                  excepturi rem non, nostrum aut aperiam? Itaque, aut. Quas nulla perferendis neque eveniet ullam?</p> -->

                <!-- <iframe width="100%" height="400" src="https://www.youtube.com/embed/LUH7njvhydE?rel=0&amp;controls=0&amp;showinfo=0"
                 frameborder="0" allowfullscreen></iframe> -->
                <!-- <p></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam sed, officia reiciendis necessitatibus
                  obcaecati eum, quaerat unde illo suscipit placeat nihil voluptatibus ipsa omnis repudiandae, excepturi! Id
                  aperiam eius perferendis cupiditate exercitationem, mollitia numquam fuga, inventore quam eaque cumque fugiat,
                  neque repudiandae dolore qui itaque iste asperiores ullam ut eum illum aliquam dignissimos similique! Aperiam
                  aut temporibus optio nulla numquam molestias eum officia maiores aliquid laborum et officiis pariatur,
                  delectus sapiente molestiae sit accusantium a libero, eligendi vero eius laboriosam minus. Nemo quibusdam
                  nesciunt doloribus repellendus expedita necessitatibus velit vero?</p> -->

              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <h3 class="tab-title">Product Specifications</h3>
                <table class="table table-bordered product-table">
                  <tbody>
                    <tr>
                      <td>Seller Price</td>
                      <td>$<?=$list->price;?></td>
                    </tr>
                    <tr>
                      <td>Added</td>
                      <td><?=date('F d, Y', strtotime($list->created_on));?></td>
                    </tr>
                    <tr>
                      <td>Category</td>
                      <td><?=$list->service_name;?></td>
                    </tr>
                    <tr>
                      <td>Sub category</td>
                      <td><?=$list->sub_service_name;?></td>
                    </tr>
                    <tr>
                      <td>Condition</td>
                      <td><?=$list->quality;?></td>
                    </tr>
                    <!-- <tr>
                      <td>Model</td>
                      <td>2017</td>
                    </tr> -->
                    <tr>
                      <td>State</td>
                      <td><?=$list->city;?></td>
                    </tr>
                    <tr>
                      <td>Country</td>
                      <td><?=$list->country;?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <h3 class="tab-title">Product Review</h3>
                <div class="product-review">
                  <?php $sql ="SELECT * FROM reviews where product_id='$list->id' and status ='1'";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                          foreach ($query->result() as $row) { ?>
                            <div class="media">
                    <!-- Avater -->
                    <img src="<?=base_url()?>assets/frontend/images/user/Sample_User_Icon.png" alt="avater">
                    <div class="media-body">
                      <!-- Ratings -->
                      <!-- <div class="ratings">
                        <ul class="list-inline">
                          <li class="list-inline-item">
                            <i class="fa fa-star"></i>
                          </li>
                          <li class="list-inline-item">
                            <i class="fa fa-star"></i>
                          </li>
                          <li class="list-inline-item">
                            <i class="fa fa-star"></i>
                          </li>
                          <li class="list-inline-item">
                            <i class="fa fa-star"></i>
                          </li>
                          <li class="list-inline-item">
                            <i class="fa fa-star"></i>
                          </li>
                        </ul>
                      </div> -->
                      <div class="name">
                        <h5><?=$row->name;?></h5>
                      </div>
                      <div class="date">
                        <p><?=date('F d, Y', strtotime($row->created_at));?></p>
                      </div>
                      <div class="review-comment">
                        <p>
                          <?=$row->message;?>
                        </p>
                      </div>
                    </div>
                  </div>                             
                  <?php }} ?>                  
                  <div class="review-submission">
                    <h3 class="tab-title">Submit your review</h3>
                    <!-- Rate -->
                   <!--  <div class="rate">
                      <div class="starrr"></div>
                    </div> -->
                    <div class="review-submit">
                      <form action="<?=base_url('welcome/addReview')?>" class="row" method="post">
                        <div class="col-lg-6">
                          <input type="text" name="product_id" id="product_id" class="form-control" placeholder="Name" value="<?=$list->id?>" required="" hidden="">
                          <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="">
                        </div>
                        <div class="col-lg-6">
                          <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="">
                        </div>
                        <div class="col-12">
                          <textarea name="message" id="review" rows="10" class="form-control" placeholder="Message" required=""></textarea>
                        </div>
                        <div class="col-12">
                        <button type="submit" class="btn btn-main">Sumbit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="sidebar">
               <div class="widget price text-center">
                  <h4>Price</h4>
                  <p>$<?= $list->price; ?></p>                  
               </div>
               <?php if (!empty($list->end_date)) {?>
                 
               <div class="product-ratings">
            <ul class="list-inline">                
              <center><button class="btn btn-success btn-mini" ><i class="fa fa-clock"> </i> <span id="demo"></span> </button></center>
              <br>      
              <br>            
            <?php if(is_logged_in()): ?>
              <form action="<?php echo base_url('welcome/addBid'); ?>" method="post" id="submit">            
                          <li class="list-inline-item" style="float: left;">
                            <?php $sql ="SELECT * FROM `tbl_bids` WHERE `user_id` ='".user_details()->id."' and `product_id` ='".$list->id."'";
                  $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                  foreach ($query->result() as $row) {?>
              <input class="form-control" type="number" name="edit_id"  value="<?php echo $row->id;?>" style="width: 90px" hidden > 
              <!-- <input class="form-control" type="number" name="price" value="<?php echo $row->price;?>" style="width: 90px" > --> 
              <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="number" name="price" value="<?=$row->price;?>" class="form-control" style="width: 80px" min='<?=$row->price;?>' aria-label="Amount (to the nearest dollar)">
                <span class="input-group-addon">.00</span>
              </div>
              <?php } }else{ ?>
              <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" style="width: 80px" name="price" min="1" value="0">
                <span class="input-group-addon">.00</span>
              </div>
              <?php } ?>         
                   <input class="user_id" type="number" id="user_id" name="user_id" value="<?=user_details()->id?>" required="" hidden> 
                   <input class="form-control" type="number" name="product_id" value="<?=$list->id?>" hidden>
                </li>                           
                <li class="list-inline-item" style="float: right;">
                   <button type="submit" class="btn btn-danger btn-mini" title="Bid Now"><i class="fa fa-gavel text-white"></i></button>
                </li> 
            </form>
              <?php endif; ?>
            <script>
               countDownDate = new Date("<?php echo date('F d, Y H:i:s',strtotime($list->end_date));?>").getTime();
              // Update the count down every 1 second
               x = setInterval(function() {
              // Get today's date and time
               now = new Date().getTime();
              // Find the distance between now and the count down date
               distance = countDownDate - now;
              // Time calculations for days, hours, minutes and seconds
               days = Math.floor(distance / (1000 * 60 * 60 * 24));
               hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
               minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
               seconds = Math.floor((distance % (1000 * 60)) / 1000);
              // Output the result in an element with id="demo"
              document.getElementById("demo").innerHTML = days + "d " + hours + "h "
              + minutes + "m " + seconds + "s ";
              // If the count down is over, write some text 
              if (distance < 0) {
              clearInterval(x);
              document.getElementById("demo").innerHTML = "EXPIRED";
              document.getElementById("submit").style.display = "none";
              }
              }, 1000);
            </script>
            </ul>
          </div>
          <br><br>
        <?php } ?>
               <!-- User Profile widget -->
               <div class="widget user text-center">
                 <?php if (!empty(user_details()->image)) { ?>
                <img src="<?= base_url('assets/frontend/images/user/'); ?><?=user_details()->image;?>" alt="" class="rounded-circle" width="60%">
                <?php }else{ ?>
                <img src="<?= base_url('assets/frontend/images/user/'); ?>Sample_User_Icon.png" alt="" class="rounded-circle" width="60%">
                  <?php } ?>
                  <h4><a href="<?= base_url('welcome/user_detail'); ?>/<?= $list->user_id; ?>"><?= user_details_by_id($list->user_id)->name; ?></a></h4>
                  <p class="member-time">Member Since <?php
                     $yrdata= strtotime(user_details_by_id($list->user_id)->created_on);
                        echo date('F d, Y', $yrdata);
                     ?></p>
                  <a href="<?=base_url('welcome/user_detail');?>/<?= $list->user_id; ?>">See all ads</a>
                  <?php 
                  if(is_logged_in())  
    			        {
    			        ?>
			        <div class="form-group">
                     <label for="exampleFormControlTextarea1"><strong>Contact <?= user_details_by_id($list->user_id)->name; ?></strong></label>
                     <?php if(check_if_chated($list->user_id)) { ?>
                     </br>
                        <a href="<?=base_url('user-chat');?>"  class="btn btn-primary"><span class="d-none d-md-inline"></span>Go To Chat</a>
                     <?php } else { ?>
                        <form method="post" action="<?= base_url('send-message-init'); ?>">
                        <input type="hidden" name="receiver_id"  value="<?= $list->user_id; ?>">
                           <textarea row="4" name="messageTxt" class="form-control" id="exampleFormControlTextarea1">Hi, I'm interested! Please contact me if this is still available.
                           </textarea>                           
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                     <?php } ?>
                     <!-- <a href="<?php echo base_url('welcome/addToCart/'.$list->id); ?>" class="cart btn btn-primary btn-mini" title="Add to cart"><i class="fa fa-shopping-cart text-white"></i></a>                    -->

			        
			    <?php } else { ?>
			    </br>
                  <a href="#appointment" data-toggle="modal" data-target="#exampleModalCenter" class="nav-link btn signincolor"><span class="d-none d-md-inline"></span>Sign In Chat</a>
              <?php } ?>

               </div>

               <!-- Map Widget -->
               <div class="widget map">
                  <div class="map">
                     <div id="map">
                        
                         <script  type="text/javascript">
                             var locations = [['<?= $list->name; ?>',<?php echo $list->latitude;?>,  <?php echo $list->longitude; ?>, '1'],];
                          </script>                        

                          <div id="map" class="googlemapimage"></div>

                          <script type="text/javascript">
                            var map = new google.maps.Map(document.getElementById('map'), {
                              zoom:15,  
                              center: new google.maps.LatLng(<?php echo $list->latitude;?>, <?php echo $list->longitude; ?>),
                              mapTypeId: google.maps.MapTypeId.ROADMAP
                            });
                            var infowindow = new google.maps.InfoWindow();
                            var marker, i;
                            for (i = 0; i < locations.length; i++) {  
                              marker = new google.maps.Marker({
                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                map: map
                              });
                              google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
                                return function() {
                                  infowindow.setContent(locations[i][0]);
                                  infowindow.open(map, marker);
                                }
                              })(marker, i));
                              google.maps.event.addListener(marker, 'mouseout', (function(marker, i) {
                                return function() {
                                  infowindow.close();
                                }
                              })(marker, i));
                               google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                return function() {
                                infowindow.setContent(locations[i][0]);
                                   infowindow.open(map, marker);
                                }
                              })(marker, i));
                            }
                          </script>

                     </div>
                  </div>
               </div>
                
               <!-- Rate Widget -->
               <!-- Safety tips widget -->
               <div class="widget disclaimer">
                  <h5 class="widget-header">Safety Tips</h5>
                  <ul>
                     <li>Meet seller at a public place</li>
                     <li>Check the item before you buy</li>
                     <li>Pay only after collecting the item</li>
                     <li>Pay only after collecting the item</li>
                  </ul>
               </div>
               <!-- Coupon Widget -->
               <div class="widget coupon text-center">
                  <!-- Coupon description -->
                  <p>Have a great product to post ? Share it with
                     your fellow users.
                  </p>
                  <!-- Submii button -->
                  <a href="<?= base_url('Welcome/postads'); ?>" class="btn btn-transparent-white">Submit Listing</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Container End -->
</section>
<?php include('footer.php'); ?>

<script type="text/javascript">
$(document).ready(function(){

 load_data();

 function load_data()
 {
  $.ajax({
   url:"<?php echo base_url(); ?>star_rating/fetch",
   method:"POST",
   success:function(data)
   {
    $('#business_list').html(data);
   }
  })
 }

 $(document).on('mouseenter', '.rating', function(){
  var index = $(this).data('index');
  var business_id = $(this).data('business_id');
  remove_background(business_id);
  for(var count = 1; count <= index; count++)
  {
   $('#'+business_id+'-'+count).css('color', '#ffcc00');
  }
 });

 function remove_background(business_id)
 {
  for(var count = 1; count <= 5; count++)
  {
   $('#'+business_id+'-'+count).css('color', '#ccc');
  }
 }

 $(document).on('click', '.rating', function(){
  var index = $(this).data('index');
  var business_id = $(this).data('business_id');
  $.ajax({
   url:"<?php echo base_url(); ?>star_rating/insert",
   method:"POST",
   data:{index:index, business_id:business_id},
   success:function(data)
   {
    load_data();
    alert("You have rate "+index +" out of 5");
   }
  })
 });

 $(document).on('mouseleave', '.rating', function(){
  var index = $(this).data('index');
  var business_id = $(this).data('business_id');
  var rating = $(this).data('rating');
  remove_background(business_id);
  for(var count = 1; count <= rating; count++)
  {
   $('#'+business_id+'-'+count).css('color', '#ffcc00');
  }
 });

});

</script>