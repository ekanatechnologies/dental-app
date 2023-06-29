<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Admin Dashboard - My Dental Buy & Sell , Marketplace and Auction</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    
    <link href="https://demo.dashboardpack.com/architectui-html-pro/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> -->
   <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script> -->
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <a href="<?= base_url('admin'); ?>"><div style="height: 61px;width: 164px;background: url(<?=base_url().'assets/frontend/images/logo.png'?>); background-size: contain;background-repeat: no-repeat;"></div></a>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="<?=base_url().'assets/images/avatars/1.png'?>" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                                            <button type="button" tabindex="0" class="dropdown-item">Settings</button>   
                                            <a href="<?= base_url('admin/logout'); ?>" class="dropdown-item">LogOut</a> 
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                      <?= user_details()->name; ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <style type="text/css">
        ::-webkit-scrollbar {
            width: 10px;
        }
    </style>
    <div class="app-main">
        <div style="overflow-y: scroll;" class="app-sidebar sidebar-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="scrollbar-sidebar">
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu">
                        <li>
                            <a href="<?= base_url('admin'); ?>" class="mm-active">
                                <i class="metismenu-icon pe-7s-rocket"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="app-sidebar__heading">Manage Users</li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-users"></i>
                                All Users
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= base_url() ?>users/pendingUsers">
                                        <i class="metismenu-icon">
                                        </i>Pending Users
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>users/approvedUsers">
                                        <i class="metismenu-icon">
                                        </i>Approved Users
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="app-sidebar__heading">Manage Customer</li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-users"></i>
                                All Customers
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= base_url() ?>customers/pendingCustomers">
                                        <i class="metismenu-icon">
                                        </i>Pending Customer
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>customers/approvedCustomers">
                                        <i class="metismenu-icon">
                                        </i>Approved Customer
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                        <li class="app-sidebar__heading">Manage Flipbooks</li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-notebook"></i>
                                All Flipbooks
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= base_url() ?>admin/flipbooks">
                                        <i class="metismenu-icon">
                                        </i>Flipbooks
                                    </a>
                                </li>                                
                            </ul>
                        </li>
                        <li class="app-sidebar__heading">Services</li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-diamond"></i>
                                Sell
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?=base_url() ?>sell/pendingsellads">
                                        <i class="metismenu-icon"></i>
                                        Pending Sell Ads
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>sell/approvesellads">
                                        <i class="metismenu-icon">
                                        </i>Approve Sell Ads
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-cart"></i>
                                Buy
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= base_url() ?>buy/pendingbuyads">
                                        <i class="metismenu-icon">
                                        </i>Pending Buy Ads
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>buy/approvebuyads">
                                        <i class="metismenu-icon">
                                        </i>Approve Buy Ads
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-hammer"></i>
                                Auction
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= base_url() ?>auction/pendingauctionads">
                                        <i class="metismenu-icon">
                                        </i>Pending Auction Ads
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>auction/approveauctionads">
                                        <i class="metismenu-icon">
                                        </i>Approve Auction Ads
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-diamond"></i>
                                Marketplace
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?=base_url() ?>marketplace/pendingmarketplaceads">
                                        <i class="metismenu-icon"></i>
                                        Pending Marketplace Ads
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>marketplace/approvemarketplaceads">
                                        <i class="metismenu-icon">
                                        </i>Approve Marketplace Ads
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-door-lock"></i>
                                Rent
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= base_url() ?>rent/pendingrentads">
                                        <i class="metismenu-icon">
                                        </i>Pending Rent Ads
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>rent/approverentads">
                                        <i class="metismenu-icon">
                                        </i>Approve Rent Ads
                                    </a>
                                </li>
                            </ul>
                        </li> -->                        
                        <!-- <li class="app-sidebar__heading">Manufacturers</li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-settings"></i>
                                Manufacturer Ads
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= base_url() ?>manufacturer/approvemanufacturerads">
                                        <i class="metismenu-icon">
                                        </i>Pending Manufacturer Ads
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>manufacturer/viewmanufacturerads">
                                        <i class="metismenu-icon">
                                        </i>Approve Manufacturers Ads
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                        <li class="app-sidebar__heading">Manage Categories</li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-hammer"></i>
                                Categories
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= base_url() ?>admin/add-category">
                                        <i class="metismenu-icon">
                                        </i>Add Category
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>admin/categories">
                                        <i class="metismenu-icon">
                                        </i>View Categories
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-hammer"></i>
                                Sub Categories
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= base_url() ?>admin/add-sub-category">
                                        <i class="metismenu-icon">
                                        </i>Add Sub Category
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>admin/sub-categories">
                                        <i class="metismenu-icon">
                                        </i>View Sub Categories
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- <li class="app-sidebar__heading">Subscriptions</li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-like2"></i>
                                Subscriptions
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= base_url('admin/add-subscription') ?>">
                                        <i class="metismenu-icon">
                                        </i>Add Subscription
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/subscriptions') ?>">
                                        <i class="metismenu-icon">
                                        </i>Subscriptions List
                                    </a>
                                </li>
                            </ul>
                        </li>   -->   
                        <li class="app-sidebar__heading">Manage Featured Ads</li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-hammer"></i>
                                Front Ads
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= base_url() ?>admin/add-front-ads">
                                        <i class="metismenu-icon">
                                        </i>Add Front Ad
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>admin/front-ads">
                                        <i class="metismenu-icon">
                                        </i>View Front Ads
                                    </a>
                                </li>
                            </ul>
                        </li>                           
                        <li class="app-sidebar__heading">Purchase history</li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-news-paper"></i>
                                List
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?=base_url('admin/today-purchase-list')?>">
                                        <i class="metismenu-icon">
                                        </i>Today Purchase List
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url('admin/purchase-list')?>">
                                        <i class="metismenu-icon">
                                        </i>Purchase List
                                    </a>
                                </li>                                
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-news-paper"></i>
                                Bids
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <!-- <li>
                                    <a href="<?=base_url('admin/today-purchase-list')?>">
                                        <i class="metismenu-icon">
                                        </i>Today Purchase List
                                    </a>
                                </li> -->
                                <li>
                                    <a href="<?=base_url('admin/bids')?>">
                                        <i class="metismenu-icon">
                                        </i>Bids
                                    </a>
                                </li>                                
                            </ul>
                        </li>

                        <li class="app-sidebar__heading">Feedback</li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-news-paper"></i>
                                Review
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?=base_url('admin/reviews')?>">
                                        <i class="metismenu-icon">
                                        </i> Reviews
                                    </a>
                                </li>                                
                            </ul>
                        </li>

                        <li class="app-sidebar__heading">Contact us</li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-news-paper"></i>
                                Queries
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?=base_url()?>Queries/pendingQueries">
                                        <i class="metismenu-icon">
                                        </i>Pending Queries
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>Queries/repliedQueries">
                                        <i class="metismenu-icon">
                                        </i>Replied Queries
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="app-sidebar__heading">Transactions</li>
                        <li>
                            <a href="#"><i class="metismenu-icon pe-7s-box1"></i>Packages<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= base_url('admin/add-subscription') ?>">
                                        <i class="metismenu-icon">
                                        </i>Add Package
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/subscriptions') ?>">
                                        <i class="metismenu-icon">
                                        </i>Packages List
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="metismenu-icon pe-7s-cash"></i>Transaction History</a>
                        </li>
                        <li>
                            <a href="#"><i class="metismenu-icon pe-7s-cash"></i>Ads Type & Commission<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= base_url('admin/add-ads-type') ?>">
                                        <i class="metismenu-icon">
                                        </i>Add Ads Type
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/ads-type') ?>">
                                        <i class="metismenu-icon">
                                        </i>Ads Type List
                                    </a>
                                </li>
                            </ul>
                        </li>
                                <!--<li class="app-sidebar__heading">Settings</li>
                                <li>
                                    <a href="#"><i class="metismenu-icon pe-7s-car"></i>Change Password<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i></a>
                                </li>
                                <li>
                                    <a href="components-tabs.html"><i class="metismenu-icon"></i>User List</a>
                                </li>
                                <li>
                                    <a href="components-accordions.html"><i class="metismenu-icon"></i>Block User</a>
                                </li>
                                <li>
                                    <a href="components-notifications.html"><i class="metismenu-icon"></i>Notifications</a>
                                </li> -->                              
                            </ul>
                        </div>
                    </div>
                </div>
