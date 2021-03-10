<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Dashboard - My Dental Buy & Sell</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    
<link href="<?= base_url() ?>assets/css/main.css" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <a href="http://ekanatechnologies.in/dev/dental/"><div class="logo-src"></div></a>
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
                                            <img width="42" class="rounded-circle" src="assets/images/avatars/1.png" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                                            <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                                            
                                            <button type="button" tabindex="0" class="dropdown-item">Actions</button>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        Admin User
                                    </div>
                                    <div class="widget-subheading">
                                        Ads Manager
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
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
                                    <a href="<?= base_url() ?>index.php" class="mm-active">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Dashboard
                                    </a>
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
                                            <a href="<?= base_url() ?>sell/approvesellads">
                                                <i class="metismenu-icon"></i>
                                                Approve Sell Ads
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url() ?>sell/viewsellads">
                                                <i class="metismenu-icon">
                                                </i>View Sell Ads List
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
                                            <a href="<?= base_url() ?>buy/approvebuyads">
                                                <i class="metismenu-icon">
                                                </i>Approve Buy Ads
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url() ?>buy/viewbuyads">
                                                <i class="metismenu-icon">
                                                </i>View Buy Ads List
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
                                            <a href="<?= base_url() ?>auction/approveauctionads">
                                                <i class="metismenu-icon">
                                                </i>Approve Auction
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url() ?>auction/viewauctionads">
                                                <i class="metismenu-icon">
                                                </i>View Auction Ads
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-door-lock"></i>
                                        Rent
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="<?= base_url() ?>rent/approverentads">
                                                <i class="metismenu-icon">
                                                </i>Approve Rent Ads
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url() ?>rent/viewrentads">
                                                <i class="metismenu-icon">
                                                </i>View Rent Ads List
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="app-sidebar__heading">Manufacturers</li>
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
                                                </i>Approve Manufacturer Ads
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url() ?>manufacturer/viewmanufacturerads">
                                                <i class="metismenu-icon">
                                                </i>View Manufacturers Ads List
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="app-sidebar__heading">Dealers</li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-like2"></i>
                                        Dealers Ads
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="<?= base_url() ?>dealer/approvedealerads">
                                                <i class="metismenu-icon">
                                                </i>Approve Dealers Ads
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url() ?>dealer/viewdealerads">
                                                <i class="metismenu-icon">
                                                </i>View Dealers Ads List
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
                                            <a href="<?= base_url() ?>">
                                                <i class="metismenu-icon">
                                                </i>Approve Reviews
                                            </a>
                                        </li>
                                        <li>
                                            <a href="components-accordions.html">
                                                <i class="metismenu-icon">
                                                </i>View Review List
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                               
                                <li class="app-sidebar__heading">Transactions</li>
                                <li>
                                    <a href="#"><i class="metismenu-icon pe-7s-box1"></i>Packages<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="components-tabs.html"><i class="metismenu-icon pe-7s-cash"></i>Transaction History</a>
                                </li>
                                <li>
                                    <a href="components-accordions.html"><i class="metismenu-icon pe-7s-cash"></i>Commission</a>
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
