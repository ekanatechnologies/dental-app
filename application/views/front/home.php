<?php include('header.php'); ?>
<section class="bg-gray">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-2 adsbanner"><br>
            <img src="<?= base_url('assets/frontend/'); ?>images/im2.png" width="100%"><br><br><br><br>
            <img src="<?= base_url('assets/frontend/'); ?>images/img.png" width="100%">		
         </div>
         <div class="col-md-8">
            <br>
            <div class="row">
               <!-- offer 01 -->
               <?php
                  foreach($latest_ads as $lads) {
                  $adimg = $this->db->where('ad_list_id',$lads->id)->get('ad_images')->row();
                  ?>
               <div class="col-sm-12 col-lg-4">
                  <?php
                     $service_name = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim(servicename_by_id($lads->service_id)))));
                     $listname = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($lads->name))));
                     
                     ?>
                  <a target="_blank" href="<?= base_url('');?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $lads->id;?>">
                     <!-- product card -->
                     <div class="product-item bg-light">
                        <div class="card bg-dark align-middle">
                           <img style="height: 230px !important;" class="card-img" src="<?= base_url('assets/images/ads'); ?>/<?= $adimg->image; ?>" alt="Card image">
                           <div class="card-img-overlay cardcolor text-center">
                              <p class="card-text cardmargin"><?= $lads->name; ?><br><span><strong>$<?= $lads->price; ?></strong></span></p>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               <?php } ?>
            </div>
            <div class="row">
               <div class="col-12">
                  <!-- Section title -->
                  <div class="section-title">
                     <h2>SERVICES</h2>
                  </div>
                  <div class="row">
                     <!-- Category list -->
                     <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <a target="_blank" href="<?= base_url('category/buy');?>">
                           <div class="category-block">
                              <div class="header cardheader">
                                 <img class="card-imgg" src="<?= base_url('assets/frontend/'); ?>images/i1.png" alt="Card image">
                                 <h4>Buy</h4>
                              </div>
                           </div>
                           <div class="text-center">
                              <p>card with supporting text below as a natural lead-in to additional content.</p>
                           </div>
                        </a>
                     </div>
                     <!-- /Category List -->
                     <!-- Category list -->
                     <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <a target="_blank" href="<?= base_url('category/sell');?>">
                           <div class="category-block">
                              <div class="header cardheader">
                                 <img class="card-imgg" src="<?= base_url('assets/frontend/'); ?>images/i2.png" alt="Card image">
                                 <h4>Sell</h4>
                              </div>
                           </div>
                           <div class="text-center">
                              <p>card with supporting text below as a natural lead-in to additional content.</p>
                           </div>
                        </a>
                     </div>
                     <!-- /Category List -->
                     <!-- Category list -->
                     <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <a target="_blank" href="<?= base_url('category/auction');?>">
                           <div class="category-block">
                              <div class="header cardheader">
                                 <img class="card-imgg" src="<?= base_url('assets/frontend/'); ?>images/i3.png" alt="Card image">
                                 <h4>Auction</h4>
                              </div>
                           </div>
                           <div class="text-center">
                              <p>card with supporting text below as a natural lead-in to additional content.</p>
                           </div>
                        </a>
                     </div>
                     <!-- /Category List -->
                     <!-- Category list -->
                     <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                        <a target="_blank" href="<?= base_url('category/rent');?>">
                           <div class="category-block">
                              <div class="header cardheader">
                                 <img class="card-imgg" src="<?= base_url('assets/frontend/'); ?>images/i4.png" alt="Card image">
                                 <h4>Rent</h4>
                              </div>
                           </div>
                           <div class="text-center">
                              <p>card with supporting text below as a natural lead-in to additional content.</p>
                           </div>
                        </a>
                     </div>
                     <!-- /Category List -->
                     <!-- Category list -->
                  </div>
                  <div class="section-title">
                     <h2>LATEST CLASSIFIED</h2>
                     <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                  </div>
                  <ul class="nav nav-tabs">
                     <li class="active"><a class="btn tabpadding" data-toggle="tab" href="#home">Buy</a></li>
                     <li><a class="btn tabpadding" data-toggle="tab" href="#menu1">Sell</a></li>
                     <li><a class="btn tabpadding" data-toggle="tab" href="#menu2">Auction</a></li>
                     <li><a class="btn tabpadding" data-toggle="tab" href="#menu3">Rent</a></li>
                  </ul>
                  <div class="tab-content">
                     <div id="home" class="tab-pane in active">
                        <div class="row">
                           <?php if(count($buy_ads) > '0') { ?>
                           <?php foreach($buy_ads as $bads) { 
                              $adimg = $this->db->where('ad_list_id',$bads->id)->get('ad_images')->row();
                              
                              ?>
                           <?php
                              $service_name = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim(servicename_by_id($bads->service_id)))));
                              $listname = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($bads->name))));
                              
                              ?>
                           <div class="col-sm-12 col-lg-3">
                              <a target="_blank" href="<?= base_url('');?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $bads->id;?>">
                                 <div class="product-item bg-light">
                                    <div class="card bg-dark align-middle" style="height: 194px">
                                       <img class="card-img" src="<?= base_url('assets/images/ads'); ?>/<?= $adimg->image; ?>" alt="Card image" style="max-height: 194px">
                                       <div class="card-img-overlay cardcolor text-center">
                                          <p class="card-text cardmarginn"><?= $bads->name; ?><br><span><strong>$<?= $bads->price; ?></strong></span></p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <?php } ?>
                           <?php } else { ?>
                           <div class="btn-primary"> No Ad Found </div>
                           <?php } ?>
                        </div>
                     </div>
                     <div id="menu1" class="tab-pane fade">
                        <div class="row">
                           <?php if(count($sell_ads) > '0') { ?>
                           <?php foreach($sell_ads as $bads) { 
                              $adimg = $this->db->where('ad_list_id',$bads->id)->get('ad_images')->row();
                              
                              ?>
                           <?php
                              $service_name = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim(servicename_by_id($bads->service_id)))));
                              $listname = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($bads->name))));
                              
                              ?>
                           <div class="col-sm-12 col-lg-3">
                              <a target="_blank" href="<?= base_url('');?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $bads->id;?>">
                                 <div class="product-item bg-light">
                                    <div class="card bg-dark align-middle" style="height: 194px">
                                       <img class="card-img" src="<?= base_url('assets/images/ads'); ?>/<?= $adimg->image; ?>" alt="Card image" style="max-height: 194px">
                                       <div class="card-img-overlay cardcolor text-center">
                                          <p class="card-text cardmarginn"><?= $bads->name; ?><br><span><strong>$<?= $bads->price; ?></strong></span></p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <?php } ?>
                           <?php } else { ?>
                           <div class="btn-primary"> No Ad Found </div>
                           <?php } ?>
                        </div>
                     </div>
                     <div id="menu2" class="tab-pane fade">
                        <div class="row">
                           <?php if(count($auction_ads) > '0') { ?>
                           <?php foreach($auction_ads as $bads) { 
                              $adimg = $this->db->where('ad_list_id',$bads->id)->get('ad_images')->row();
                              
                              ?>
                           <?php
                              $service_name = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim(servicename_by_id($bads->service_id)))));
                              $listname = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($bads->name))));
                              
                              ?>
                           <div class="col-sm-12 col-lg-3">
                              <a target="_blank" href="<?= base_url('');?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $bads->id;?>">
                                 <div class="product-item bg-light">
                                    <div class="card bg-dark align-middle" style="height: 194px">
                                       <img class="card-img" src="<?= base_url('assets/images/ads'); ?>/<?= $adimg->image; ?>" alt="Card image" style="max-height: 194px">
                                       <div class="card-img-overlay cardcolor text-center">
                                          <p class="card-text cardmarginn"><?= $bads->name; ?><br><span><strong>$<?= $bads->price; ?></strong></span></p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <?php } ?>
                           <?php } else { ?>
                           <div class="btn-primary"> No Ad Found </div>
                           <?php } ?>
                        </div>
                     </div>
                     <div id="menu3" class="tab-pane fade">
                        <div class="row">
                           <?php if(count($rent_ads) > '0') { ?>
                           <?php foreach($rent_ads as $bads) { 
                              $adimg = $this->db->where('ad_list_id',$bads->id)->get('ad_images')->row();
                              ?>
                           <?php
                              $service_name = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim(servicename_by_id($bads->service_id)))));
                              $listname = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($bads->name))));
                              
                              ?>
                           <div class="col-sm-12 col-lg-3">
                              <a target="_blank" href="<?= base_url('');?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $bads->id;?>">
                                 <div class="product-item bg-light">
                                    <div class="card bg-dark align-middle" style="height: 194px">
                                       <img class="card-img" src="<?= base_url('assets/images/ads'); ?>/<?= $adimg->image; ?>" alt="Card image" style="max-height: 194px">
                                       <div class="card-img-overlay cardcolor text-center">
                                          <p class="card-text cardmarginn"><?= $bads->name; ?><br><span><strong>$<?= $bads->price; ?></strong></span></p>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <?php } ?>
                           <?php } else { ?>
                           <div class="btn-primary"> No Ad Found </div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-2"><br>
            <img src="<?= base_url('assets/frontend/'); ?>images/img.png" width="100%"><br><br><br><br>
            <img src="<?= base_url('assets/frontend/'); ?>images/im.png" width="100%">	
         </div>
      </div>
   </div>
</section>
<?php include('footer.php'); ?>