<?php include('header.php');?>
 <section class="bg-gray">
    <div class="container-fluid">
      <div class="row"> 
        <div class="col-md-1"></div>
        <div class="col-md-10 mt-20">       
          <div class="section-title">
            <h2>Featured Ads</h2>
            <p>Get your business running Healthcare supplies, facility safety, office equipment, and more from top sellers.</p>
          </div>
          <div class="">
            <!--Carousel Wrapper-->
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
              <!--Controls-->
              <div class="controls-top" style="float: right;">
                <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
              </div>
              <!--/.Controls-->

              <!--Indicators-->
              <ol class="carousel-indicators">
                <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                <li data-target="#multi-item-example" data-slide-to="1"></li>
                <li data-target="#multi-item-example" data-slide-to="2"></li>
              </ol>
              <!--/.Indicators-->
              <!--Slides-->
              <div class="carousel-inner" role="listbox">
                <!--First slide-->
                <?php if (!empty($listing_one)) { ?>
                  <div class="carousel-item active">
                    <div class="row">
                      <?php foreach ($listing_one as $list) {
                        $adimg = $this->db->where('ad_list_id',$list->id)->get('ad_images')->row();?>                   
                        <div class="col-sm-12 col-lg-4">
                          <!-- product card -->
                          <div class="product-item bg-light">
                            <div class="card">
                              <?php
                              $service_name = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list->service_name))));
                              $listname = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list->name))));
                              ?>
                              <div class="thumb-content">
                              <div class="price">$<?=$list->price;?></div>
                                <a href="<?= base_url();?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $list->id;?>">
                                <?php if (!empty($adimg->image)) { ?> 
                                  <img class="card-img-top img-fluid" src="<?= base_url('assets/images/ads'); ?>/<?= $adimg->image; ?>" alt="image">
                                <?php }else{ ?>
                                  <img class="card-img-top img-fluid" src="<?= base_url('assets/images/avatars'); ?>/no-image.jpg" alt="Card image cap">
                                 <?php } ?>
                                </a>
                              </div>                              
                              <div class="card-body">
                                <h4 class="card-title"><a href="<?= base_url();?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $list->id;?>"><?=$list->name;?></a></h4>
                                <ul class="list-inline product-meta">
                                  <li class="list-inline-item">
                                    <a href=""><i class="fa fa-folder-open-o"></i><?=$service_name;?></a>
                                  </li>
                                  <li class="list-inline-item">
                                    <a href=""><i class="fa fa-calendar"></i><?php
                                    $timestamp    = strtotime($list->updated_on);
                                    echo $newDate = date('d-F-Y', $timestamp); 
                                    ?>
                                    </a>
                                  </li>
                                  <?php if(is_logged_in()): ?>
                                  <li class="list-inline-item" style="float: left;">
                                     <a href="#" id="<?php echo $list->id; ?>" class="favorite btn btn-primary btn-mini design" title="Add to favorite" data-url="<?php echo base_url('welcome/insert_favorite/');?>"><i class="fa fa-heart text-white"></i></a>
                                  </li>
                                  <!-- <li class="list-inline-item" style="float: right;">
                                     <a href="<?php echo base_url('welcome/addToCart/'.$list->id); ?>" class="cart btn btn-primary btn-mini" title="Add to cart" data-url="<?php echo base_url('welcome/insert_favorite/');?>"><i class="fa fa-shopping-cart text-white"></i></a>
                                  </li> --> 
                                <?php endif; ?>
                                </ul>
                                <br>
                                <p class="card-text"><?php
                                echo character_limiter($list->description, 40); ?></p> 
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>            
                    </div>
                  </div>
                <?php } ?>
                <!--/.First slide-->

                <!--Second slide-->
                <?php if (!empty($listing_two)) { ?>            
                  <div class="carousel-item">

                    <div class="row">
                      <?php foreach ($listing_two as $list) {
                        $adimg = $this->db->where('ad_list_id',$list->id)->get('ad_images')->row();
                        ?>                   
                        <div class="col-sm-12 col-lg-4">
                          <!-- product card -->
                          <div class="product-item bg-light">
                            <div class="card">
                              <?php
                              $service_name = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list->service_name))));
                              $listname = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list->name))));
                              ?>
                              <div class="thumb-content">
                                <div class="price">$<?=$list->price;?></div>
                                <a href="<?= base_url();?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $list->id;?>">
                                <?php if (!empty($adimg->image)) { ?> 
                                  <img class="card-img-top img-fluid" src="<?= base_url('assets/images/ads'); ?>/<?= $adimg->image; ?>" alt="Card image cap">
                                <?php }else{ ?>
                                  <img class="card-img-top img-fluid" src="<?= base_url('assets/images/avatars'); ?>/no-image.jpg" alt="Card image cap">
                                 <?php } ?>
                                </a>
                              </div>
                              
                              <div class="card-body">
                                <h4 class="card-title"><a href="<?= base_url();?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $list->id;?>"><?=$list->name;?></a></h4>
                                <ul class="list-inline product-meta">
                                  <li class="list-inline-item">
                                    <a href=""><i class="fa fa-folder-open-o"></i><?=$service_name;?></a>
                                  </li>
                                  <li class="list-inline-item">
                                    <a href=""><i class="fa fa-calendar"></i><?php
                                    $timestamp   = strtotime($list->updated_on);
                                    echo $newDate = date('d-F-Y', $timestamp); 
                                    ?></a>
                                  </li>
                                  <?php if(is_logged_in()): ?>
                                  <li class="list-inline-item" style="float: left;">
                                     <a href="#" id="<?php echo $list->id; ?>" class="favorite btn btn-primary btn-mini design" title="Add to favorite" data-url="<?php echo base_url('welcome/insert_favorite/');?>"><i class="fa fa-heart text-white"></i></a>
                                  </li>
                                  <!-- <li class="list-inline-item" style="float: right;">
                                     <a  href="<?php echo base_url('welcome/addToCart/'.$list->id); ?>" class="cart btn btn-primary btn-mini" title="Add to cart" data-url="<?php echo base_url('welcome/insert_favorite/');?>"><i class="fa fa-shopping-cart text-white"></i></a>
                                  </li> --> 
                                <?php endif; ?>
                                </ul>
                                <br>
                                <p class="card-text"><?php  
                                echo character_limiter($list->description, 40); ?></p> 
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>            
                    </div>
                  </div>
                <?php } ?>  
                <!--Third slide-->
                <?php if (!empty($listing_three)) { ?>                  
                  <div class="carousel-item">
                    <div class="row">
                      <?php foreach ($listing_three as $list) {
                        $adimg = $this->db->where('ad_list_id',$list->id)->get('ad_images')->row();
                        ?>                   
                        <div class="col-sm-12 col-lg-4">
                          <!-- product card -->
                          <div class="product-item bg-light">
                            <div class="card">
                              <?php
                              $service_name = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list->service_name))));
                              $listname = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list->name))));
                              ?>
                              <div class="thumb-content">
                                <div class="price">$<?=$list->price;?></div>
                                <a href="<?= base_url();?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $list->id;?>">
                                <?php if (!empty($adimg->image)) { ?> 
                                  <img class="card-img-top img-fluid" src="<?= base_url('assets/images/ads'); ?>/<?= $adimg->image; ?>" alt="Card image cap">
                                <?php }else{ ?>
                                  <img class="card-img-top img-fluid" src="<?= base_url('assets/images/avatars'); ?>/no-image.jpg" alt="Card image cap">
                                 <?php } ?>
                                </a>
                              </div>
                              
                              <div class="card-body">
                                <h4 class="card-title"><a href="<?= base_url();?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $list->id;?>"><?=$list->name;?></a></h4>
                                <ul class="list-inline product-meta">
                                  <li class="list-inline-item">
                                    <a href=""><i class="fa fa-folder-open-o"></i><?=$service_name;?></a>
                                  </li>
                                  <li class="list-inline-item">
                                    <a href=""><i class="fa fa-calendar"></i><?php
                                    $timestamp   = strtotime($list->updated_on);
                                    echo $newDate = date('d-F-Y', $timestamp); 
                                    ?></a>
                                  </li>
                                  <?php if(is_logged_in()): ?>
                                  <li class="list-inline-item" style="float: left;">
                                     <a href="#" id="<?=$list->id;?>" class="favorite btn btn-primary btn-mini design" title="Add to favorite" data-url="<?=base_url('welcome/insert_favorite/');?>"><i class="fa fa-heart text-white"></i></a>
                                  </li>                                  
                                <?php endif; ?>
                                </ul>
                                <br>
                                <p class="card-text"><?php
                                echo character_limiter($list->description, 40); ?></p> 
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>            
                    </div>
                  </div>
                <?php } ?>
                <!--/.Third slide-->
              </div>
              <!--/.Slides-->
            </div>
            <!--/.Carousel Wrapper-->
          </div>

          <div class="col-sm-12 text-center mt-20"> 
            <?php if (!empty($front_ads1[0]['image'])) { ?>           
                <img style="width:100%" src="<?=base_url('assets/images/front-ads'); ?>/<?=$front_ads1[0]['image'];?>" >
              <?php }else{ ?>
            <img src="<?= base_url('assets/frontend/'); ?>images/ad2.jpg" style="width:100%">
            <?php } ?>           
          </div>

          <div class="row mt-20">
            <div class="col-12">
              <!-- Section title -->
              <div class="section-title">
                <h2>All Services</h2>
              </div>
              <?php if (!empty($services)) { ?>
              <div class="row">
              <?php foreach($services as $service) { ?>
                <!-- Category list -->
                <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                  <div class="category-block">
                    <div class="header">
                      <h4><?=$service->name;?></h4>
                    </div>
                    <ul class="category-list" >
                      <?php $sub_services = $this->db->where('service_id',$service->id)->get('sub_services')->result();
                        foreach($sub_services as $sub) {?>
                          <!-- <?php echo base_url('shop-left-sidebar/').'1/cat';?> -->
                      <li><a href="<?= base_url('shop-left-sidebar')?>/<?= $service->id; ?>/<?= $service->name; ?>"><?= $sub->name; ?> <span><?= subservice_ad_count($sub->id); ?></span></a>
                      </li>                      
                      <?php } ?>
                    </ul>
                  </div>
                </div> <!-- /Category List -->
                <!-- Category list -->
                <?php } ?>                          
              </div>
            <?php } ?>

            <div class="col-sm-12 text-center mt-20">
               <?php if (!empty($front_ads2[0]['image'])) { ?>           
                <img style="width:100%" src="<?= base_url('assets/images/front-ads'); ?>/<?=$front_ads2[0]['image'];?>" alt="image">
              <?php }else{ ?>
            <img src="<?= base_url('assets/frontend/'); ?>images/ad2.jpg" style="width:100%">
            <?php } ?>   
            </div>

            <div class="row mt-20">

              <div class="col-lg-3 col-md-4">
                <h2>Popular Categories</h2>
                <div class="widget product-shorting">
                  <h4 class="widget-header">All Ads</h4>
                  <?php
                  if(!empty($ads)){
                    $i = 0;
                    foreach ($ads as $ad) {
                      ?>
                      <div class="form-check">
                        <span class="custom-checkbox ad_filter">
                          <input type="checkbox" id="compositions_ad<?php echo $i;?>" value="<?php echo $ad['ad_type_id'];?>" class="compositions">
                          <label for="compositions_ad<?php echo $i;?>"><?php echo $ad['ad_name'].' ('. $ad['count'].')';?></label>
                        </span>
                      </div>
                      <?php $i++; } } ?>
                    </div>
                    <div class="widget product-shorting">
                      <h4 class="widget-header">All Category</h4>
                      <?php
                      if(!empty($cats)){
                        $i = 0;
                        foreach ($cats as $cat) {
                          ?>
                          <div class="form-check">
                            <span class="custom-checkbox cat_filter">
                              <input type="checkbox" id="compositions_cat<?php echo $i;?>" value="<?php echo $cat['cat_id'];?>" class="compositions">
                              <label for="compositions_cat<?php echo $i;?>"><?php echo $cat['cat_name'].' ('. $cat['count'].')';?></label>
                            </span>
                          </div>
                          <?php $i++; } } ?>
                        </div>
                        <div class="widget product-shorting">
                          <h4 class="widget-header">Sub Category</h4>
                          <?php
                          if(!empty($subcats)){
                            $i = 0;
                            foreach ($subcats as $subcat) {
                              ?>
                              <div class="form-check">
                                <span class="custom-checkbox subcat_filter">
                                  <input type="checkbox" id="compositions_subcat<?php echo $i;?>" value="<?php echo $subcat['subcat_id'];?>" class="compositions">
                                  <label for="compositions_subcat<?php echo $i;?>"><?php echo $subcat['subcat_name'].' ('. $subcat['count'].')';?></label>
                                </span>
                              </div>
                              <?php $i++; } } ?>
                            </div>
                            <div class="widget product-shorting">
                              <h4 class="widget-header">Nearby</h4>
                              <?php
                              if(!empty($cities)){
                                $i = 0;
                                foreach ($cities as $city) {
                                  ?>
                                  <div class="form-check" >
                                    <span class="custom-checkbox city_filter">
                                      <input type="checkbox" id="compositions_city<?php echo $i;?>" value="<?php echo $city['city'];?>" class="compositions">
                                      <label for="compositions_city<?php echo $i;?>"><?php echo $city['city'].' ('. $city['count'].')';?></label>
                                    </span>
                                  </div>
                                  <?php $i++; } } ?>             
                                </div>
                                <div class="widget product-shorting">
                                  <h4 class="widget-header">By Condition</h4>
                                  <?php
                                  if(!empty($qualities)){
                                    $i = 0;
                                    foreach ($qualities as $quality) {
                                      ?>
                                      <div class="form-check" >
                                        <span class="custom-checkbox quality_filter">
                                          <input type="checkbox" id="compositions_quality<?php echo $i;?>" value="<?php echo $quality['quality'];?>" class="compositions">
                                          <label for="compositions_quality<?php echo $i;?>"><?php echo $quality['quality'].' ('. $quality['count'].')';?></label>
                                        </span>
                                      </div>
                                      <?php $i++; } } ?>             
                                    </div>
                                    <div class="category text-center">
                                       <?php if (!empty($front_ads3[0]['image'])) { ?>           
                                          <img style="width:100%" src="<?= base_url('assets/images/front-ads');?>/<?=$front_ads3[0]['image'];?>" alt="image">
                                        <?php }else{ ?>
                                          <img src="<?= base_url('assets/frontend/'); ?>images/ad1.png" style="width:100%">
                                      <?php } ?>
                                    </div>
                                   <!--  <div class="category text-center mt-20">
                                      <img src="<?= base_url('assets/frontend/'); ?>images/ad3.gif" style="width:100%; height: 399px">             
                                    </div>  -->

                                  </div>

                                  <div class="col-lg-9 col-md-8">
                                    <h2>Featured Ads</h2>
                                    <div class="category-search-filter">
                                      <div class="row">
                                        <div class="col-md-4 text-center text-md-left">
                                          <strong>Show</strong>
                                          <select class="form-control sort_by_chk" >
                                            <option value="6">6</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                          </select>
                                        </div>
                                        <div class="col-md-4 text-center text-md-left">
                                          <strong>Short</strong>
                                          <select class="form-control sort_by">
                                            <option value="1">Default</option>
                                            <option value="2">Name (A-Z)</option>
                                            <option value="3">Price (min - max)</option>
                                          </select>
                                        </div>
                                        <div class="col-md-4 text-center text-md-right mt-2 mt-md-0">
                                          <div class="view">
                                            <strong>Views</strong>
                                            <ul class="list-inline view-switcher">
                                              <li class="list-inline-item">
                                                <a href="<?php echo base_url('shop-left-sidebar/').'1/cat';?>"><i class="fa fa-th-large"></i></a>
                                              </li>
                                              <li class="list-inline-item">
                                                <a href="<?php echo base_url('shop-left-sidebar-list/').'1/cat';?>" class="text-info"><i class="fa fa-reorder"></i></a>
                                              </li>
                                            </ul>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <?php
                                    if(empty($page_id)){
                                      $page_id = '';
                                    }
                                    ?>        
                                    <!-- ad listing list  -->
                                    <div class="ad-listing-list mt-20 product-grid-list1" id="myTabContent2" data-url="<?php echo base_url('welcome/product_filter_list/' . $page_id);?>"> 
                                    </div>                   
                                    <!-- ad listing list  -->                 
                                  </div>
                                </div>
                      <div class="col-sm-12 text-center mt-20">
                        <!-- <img src="<?= base_url('assets/frontend/'); ?>images/ad2.jpg" style="width:100%"> -->
                        <?php if (!empty($front_ads4[0]['image'])) { ?>           
                            <img style="width:100%" src="<?= base_url('assets/images/front-ads'); ?>/<?=$front_ads4[0]['image'];?>" alt="image">
                          <?php }else{ ?>
                           <img src="<?= base_url('assets/frontend/'); ?>images/ad2.jpg" style="width:100%">
                        <?php } ?>
                      </div>

              <div class="section-title mt-20">
                <h2>LATEST CLASSIFIED</h2>
                <p> <strong>WELCOME</strong> We are a world leader in classifieds.</p>
                <p>Dental Classifieds Group helps people find whatever they’re looking for in their local communities. We help make a difference by creating a world where people share more and waste less.</p>
              </div>
              <div class="">
              <!-- <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link nav-link1 postcolor active" data-toggle="tab" href="#menu1" role="tab" aria-selected="true">Buy</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-link1 postcolor" data-toggle="tab" href="#menu2" role="tab" aria-selected="false">Sell</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-link1 postcolor" data-toggle="tab" href="#menu3" role="tab" aria-selected="false">Auction</a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-link1 postcolor" data-toggle="tab" href="#menu4" role="tab" aria-selected="false">Rent</a>
              </li>
            </ul> -->
            <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="btn active" data-toggle="tab" href="#menu1" role="tab" aria-selected="true">Buy</a>
              </li>
              <li class="">
                <a class="btn" data-toggle="tab" href="#menu2" role="tab" aria-selected="false">Sell</a>
              </li>
              <li class="">
                <a class="btn" data-toggle="tab" href="#menu3" role="tab" aria-selected="false">Auction</a>
              </li>
              <li class="">
                <a class="btn" data-toggle="tab" href="#menu4" role="tab" aria-selected="false">Marketplace</a>
              </li>
            </ul>

          </div>

          <div class="tab-content mt-20">
            <div id="menu1" class="tab-pane in active">
              <div class="row">
                <?php if (!empty($act_buy_ads)) {
                        foreach ($act_buy_ads as $list) {
                          $adimg = $this->db->where('ad_list_id',$list->id)->get('ad_images')->row(); ?>
                <div class="col-sm-12 col-lg-3">
                  <!-- product card -->
                  <div class="product-item bg-light">
                    <div class="card">
                      <?php
                          $service_name = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list->service_name))));
                          $listname = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list->name))));
                              ?>
                      <div class="thumb-content">
                        <div class="price">$<?=$list->price;?></div>
                        <a href="<?= base_url();?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $list->id;?>">
                          <?php if (!empty($adimg->image)) { ?> 
                            <img class="card-img-top img-fluid product" alt=""  src="<?= base_url('assets/images/ads'); ?>/<?= $adimg->image; ?>" alt="Card image cap">
                          <?php }else{ ?>
                            <img class="card-img-top img-fluid product" alt=""  src="<?= base_url('assets/images/avatars'); ?>/no-image.jpg" alt="Card image cap">
                          <?php } ?>
                        </a>
                      </div>
                      
                      <div class="card-body">
                        <h4 class="card-title"><a href="<?= base_url();?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $list->id;?>"><?=$list->name;?></a></h4>
                        <ul class="list-inline product-meta">
                          <li class="list-inline-item">
                            <a href=""><i class="fa fa-folder-open-o"></i><?=$service_name;?></a>
                          </li>
                          <li class="list-inline-item">
                            <a href=""><i class="fa fa-calendar"></i>
                              <?php
                                $timestamp    = strtotime($list->updated_on);
                                echo $newDate = date('d-F-Y', $timestamp); 
                                ?>
                            </a>
                          </li>
                          <br>
                          <?php if(is_logged_in()): ?>
                            <li class="list-inline-item" style="float: left;">
                               <a href="#" id="<?php echo $list->id; ?>" class="favorite btn btn-primary btn-mini design" title="Add to favorite" data-url="<?php echo base_url('welcome/insert_favorite/');?>"><i class="fa fa-heart text-white"></i></a>
                            </li>
                            <!-- <li class="list-inline-item" style="float: right;">
                               <a href="<?php echo base_url('welcome/addToCart/'.$list->id); ?>" id="<?php echo $list->id; ?>" class="cart btn btn-primary btn-mini" title="Add to cart" data-url="<?php echo base_url('welcome/insert_favorite/');?>"><i class="fa fa-shopping-cart text-white"></i></a>
                            </li> --> 
                            <?php endif; ?>
                            </ul>
                            <br>                        
                        <p class="card-text">
                          <?php echo character_limiter($list->description, 40); ?> 
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } } ?>
              </div>
            </div>

            <div id="menu2" class="tab-pane fade">
              <div class="row">
                <?php if (!empty($act_sell_ads)) {
                        foreach ($act_sell_ads as $list) {
                          $adimg = $this->db->where('ad_list_id',$list->id)->get('ad_images')->row();?>
                <div class="col-sm-12 col-lg-3">
                  <!-- product card -->
                  <div class="product-item bg-light">
                    <div class="card">
                      <?php
                          $service_name = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list->service_name))));
                          $listname = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list->name))));
                      ?>
                      <div class="thumb-content">
                        <div class="price">$<?=$list->price?></div>
                        <a href="<?= base_url();?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $list->id;?>">
                          <?php if (!empty($adimg->image)) { ?> 
                                  <img class="card-img-top img-fluid product" alt=""  src="<?= base_url('assets/images/ads'); ?>/<?= $adimg->image; ?>" alt="Card image cap">
                                <?php }else{ ?>
                                  <img class="card-img-top img-fluid product" alt=""  src="<?= base_url('assets/images/avatars'); ?>/no-image.jpg" alt="Card image cap">
                          <?php } ?>
                        </a>
                      </div>                      
                      <div class="card-body">
                        <h4 class="card-title"><a href="<?= base_url();?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $list->id;?>"><?=$list->name;?></a></h4>
                        <ul class="list-inline product-meta">
                          <li class="list-inline-item">
                            <a href=""><i class="fa fa-folder-open-o"></i><?=$service_name;?></a>
                          </li>
                          <li class="list-inline-item">
                            <a href=""><i class="fa fa-calendar"></i>
                              <?php
                                  $timestamp    = strtotime($list->updated_on);
                                  echo $newDate = date('d-F-Y', $timestamp); 
                              ?>
                            </a>
                          </li>
                          <br>
                          <?php if(is_logged_in()): ?>
                            <li class="list-inline-item" style="float: left;">
                               <a href="#" id="<?php echo $list->id; ?>" class="favorite btn btn-primary btn-mini design" title="Add to favorite" data-url="<?php echo base_url('welcome/insert_favorite/');?>"><i class="fa fa-heart text-white"></i></a>
                            </li>
                            <!-- <li class="list-inline-item" style="float: right;">
                               <a href="<?php echo base_url('welcome/addToCart/'.$list->id); ?>" id="<?php echo $list->id; ?>" class="cart btn btn-primary btn-mini" title="Add to cart" data-url="<?php echo base_url('welcome/insert_favorite/');?>"><i class="fa fa-shopping-cart text-white"></i></a>
                            </li> --> 
                            <?php endif; ?>
                            </ul>
                            <br>
                        <p class="card-text">
                        <?php echo character_limiter($list->description, 40); ?> 
                        </p>                         
                      </div>
                    </div>
                  </div>
                </div>
              <?php } } ?>  
              </div>
            </div>

            <div id="menu3" class="tab-pane fade">
              <div class="row">
                <?php if (!empty($act_auction_ads)) {
                      foreach ($act_auction_ads as $list) {
                      $adimg = $this->db->where('ad_list_id',$list->id)->get('ad_images')->row();?>
                <div class="col-sm-12 col-lg-3">
                  <!-- product card -->
                  <div class="product-item bg-light">
                    <div class="card">
                      <?php
                          $service_name = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list->service_name))));
                          $listname = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list->name))));
                      ?>
                      <div class="thumb-content">
                        <div class="price">$<?=$list->price;?></div>
                        <a href="<?= base_url();?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $list->id;?>">
                          <?php if (!empty($adimg->image)) { ?> 
                              <img class="card-img-top img-fluid product"  src="<?= base_url('assets/images/ads'); ?>/<?= $adimg->image; ?>" alt="image">
                          <?php }else{ ?>
                              <img class="card-img-top img-fluid product"  src="<?= base_url('assets/images/avatars'); ?>/no-image.jpg" alt="image">
                          <?php } ?>
                        </a>
                      </div>                      
                      <div class="card-body">
                        <h4 class="card-title"><a href="<?= base_url();?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $list->id;?>"><?=$list->name;?></a></h4>
                        <ul class="list-inline product-meta">
                          <li class="list-inline-item">
                            <a href=""><i class="fa fa-folder-open-o"></i><?=$service_name;?></a>
                          </li>
                          <li class="list-inline-item">
                            <a href=""><i class="fa fa-calendar"></i><?php
                              $timestamp   = strtotime($list->updated_on);
                              echo $newDate = date('d-F-Y', $timestamp); 
                              ?>
                            </a>
                          </li>
                          <br>
                          <?php if(is_logged_in()): ?>
                          <li class="list-inline-item" style="float: left;">
                             <a href="#" id="<?php echo $list->id; ?>" class="favorite btn btn-primary btn-mini design" title="Add to favorite" data-url="<?php echo base_url('welcome/insert_favorite/');?>"><i class="fa fa-heart text-white"></i></a>
                          </li>                                  
                          <?php endif; ?>
                        </ul>
                        <br>
                        <p class="card-text"><?=character_limiter($list->description, 50); ?></p> 
                      </div>
                    </div>
                  </div>
                </div>
              <?php } } ?>  
              </div>
            </div>

            <div id="menu4" class="tab-pane fade">
              <div class="row">
                <?php if (!empty($act_marketplace_ads)) {
                        foreach ($act_marketplace_ads as $list) {
                        $adimg = $this->db->where('ad_list_id',$list->id)->get('ad_images')->row();?>
                <div class="col-sm-12 col-lg-3">
                  <!-- product card -->
                  <div class="product-item bg-light">
                    <div class="card">
                      <?php
                          $service_name = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list->service_name))));
                          $listname = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($list->name))));
                      ?>
                      <div class="thumb-content">
                        <div class="price">$<?=$list->price;?></div>
                        <a href="<?= base_url();?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $list->id;?>">
                          <?php if (!empty($adimg->image)) { ?> 
                            <img class="card-img-top img-fluid product"  src="<?= base_url('assets/images/ads'); ?>/<?= $adimg->image; ?>" alt="image">
                          <?php }else{ ?>
                            <img class="card-img-top img-fluid product"   src="<?= base_url('assets/images/avatars'); ?>/no-image.jpg" alt="image">
                          <?php } ?>
                        </a>
                      </div>                      
                      <div class="card-body">
                        <h4 class="card-title"><a href="<?= base_url();?>viewad/<?= $service_name; ?>/<?= $listname; ?>/<?= $list->id;?>"><?=$list->name;?></a></h4>
                        <ul class="list-inline product-meta">
                          <li class="list-inline-item">
                            <a href=""><i class="fa fa-folder-open-o"></i><?=$service_name;?></a>
                          </li>
                          <li class="list-inline-item">
                            <a href=""><i class="fa fa-calendar"></i><?php
                              $timestamp    = strtotime($list->updated_on);
                              echo $newDate = date('d-F-Y', $timestamp); 
                              ?>
                            </a>
                          </li>
                          <br>
                          <?php if(is_logged_in()): ?>
                            <li class="list-inline-item" style="float: left;">
                               <a href="#" id="<?php echo $list->id; ?>" class="favorite btn btn-primary btn-mini design" title="Add to favorite" data-url="<?php echo base_url('welcome/insert_favorite/');?>"><i class="fa fa-heart text-white"></i></a>
                            </li>                                  
                          <?php endif; ?>
                          </ul>
                          <br>
                        <p class="card-text"><?php
                            echo character_limiter($list->description, 50); ?></p> 
                      </div>
                    </div>
                  </div>
                </div>
              <?php } } ?>  
              </div>
            </div>
          </div>          
        </div>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>

</div>
</section>


<?php include('footer.php'); ?>
 
 <style type="text/css">
   .category-block{
    background: #fff !important;
  }
  .ad-listing-list{
    background: #fff;
  }
  .category-search-filter{
    background: #fff !important;
  }
  a{
    color:#236eb2;
  }
  .nav-link1{
    margin: 0px 50px;
    padding: 0.5rem 4rem !important;
  }
 </style>