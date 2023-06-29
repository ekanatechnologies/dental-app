<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']     = 'welcome';
$route['404_override']             = '';
$route['translate_uri_dashes']     = FALSE;

$route['latest']                 = 'welcome/viewall_buy_sell';
$route['marketplace']             = 'welcome/marketplace';
//$route['auction']             = 'welcome/auction';

$route['test']             = 'test1';


$route['marketplace-list']         = 'welcome/marketplace_list';
$route['category']                 = 'welcome/category';
$route['category/(:any)']         = 'welcome/shop_by_category/$1';
$route['ads/(:any)/(:any)/(:num)'] = 'welcome/shop_by_sub_category/$1/$2/$3';
$route['userlogin']             = 'welcome/userlogin';
$route['userregister']             = 'welcome/userregister';
$route['myprofile']             = 'welcome/profile';
$route['my-dashboard']             = 'welcome/user_dashboard';
$route['viewad/(:any)/(:any)/(:num)'] = 'welcome/singlepost/$1/$2/$3';
$route['single-product']           = 'welcome/single_product';
$route['contact-us']               = 'welcome/contact';
$route['package']               = 'welcome/package';
$route['flipbooks']               = 'welcome/flipbooks';
$route['about-us']               = 'welcome/about_us';
$route['postads']               = 'welcome/postads';
// $route['braintree-payment']  = 'welcome/braintree_payment';
$route['edit-profile']           = 'welcome/editprofile';
$route['change-password']       = 'welcome/change_password';
// $route['payment-options/(:num)']= 'welcome/payment_options/$1';
$route['my-favorite-ads']          = 'welcome/my_favorite_ads';
$route['purchase-history']      = 'welcome/purchase_history';
$route['my-subscription']       = 'welcome/my_subscription';
$route['cart']                      = 'welcome/cart';
$route['payment-options']       = 'welcome/payment_options';
$route['checkout']               = 'welcome/checkout';
$route['create-account']           = 'welcome/create_account';
$route['order-success']           = 'welcome/orderSuccess';
$route['my-saved-seller']       = 'welcome/my_saved_seller';
$route['my-ads']                   = 'welcome/my_ads';
$route['my-bids']               = 'welcome/my_bids';
$route['selling']               = 'welcome/selling';
$route['recentaly-view-ads']    = 'welcome/recentaly_view_ads';
$route['manage-address']           = 'welcome/manage_address';
$route['personal-information']  = 'welcome/personal_information';
$route['feedback']                 = 'welcome/feedback';
$route['category-test']         = "Welcome/category_test";
$route['terms-condition']         = "Welcome/terms_condition";
$route['privacy-policy']         = "Welcome/privacy_policy";
$route['shop-left-sidebar/(:num)/(:any)'] = 'Welcome/shop_left_sidebar/$1/$2';
$route['auction']               = 'Welcome/auction';
$route['auction-list']          = 'Welcome/auction_list';
$route['shop-left-sidebar-list/(:num)/(:any)'] = 'Welcome/shop_left_sidebar_list/$1/$2';
$route['shop-4-column/(:num)/(:any)'] = 'Welcome/shop_4_column/$1/$2';
$route['forgotpassword']     = 'Welcome/forgotpassword';
//chat routes

$route['user-chat']             = 's/ChatController/user_index';
$route['chat']                     = 's/ChatController/index';
$route['send-message']             = 's/ChatController/send_text_message';
$route['send-message-init']     = 's/ChatController/send_text_message_init';
$route['get-new-chat']             = 's/ChatController/get_new_chat';
$route['chat-attachment/upload'] = 's/ChatController/send_text_message';
$route['get-chat-history-vendor'] = 's/ChatController/get_chat_history_by_vendor';
$route['chat-clear']             = 's/ChatController/chat_clear_client_cs';
// admin Routes
$route['admin']                 = 'Dashboard/index';
$route['admin/login']             = 'welcome/adminlogin';
$route['admin/logout']             = 'Dashboard/logout';
$route['admin/categories']         = 'Dashboard/categories';
$route['admin/add-category']     = 'Dashboard/add_category';
$route['admin/ads-type']         = 'Dashboard/ads_type';
$route['admin/add-ads-type']     = 'Dashboard/add_ads_type';
$route['admin/subscriptions']   = 'Dashboard/subscriptions';
$route['admin/flipbooks']       = 'Dashboard/flipbooks';
$route['admin/add-subscription'] = 'Dashboard/add_subscription';
$route['admin/today-purchase-list'] = 'Dashboard/today_purchase_list';
$route['admin/view-today-purchase-list/(:num)'] = 'Dashboard/view_today_purchase_list/$1';
$route['admin/reviews']         = 'Dashboard/reviews';
$route['admin/purchase-list']     = 'Dashboard/purchase_list';
$route['admin/bids']             = 'Dashboard/bids';
$route['admin/view-purchase-list/(:num)'] = 'Dashboard/view_purchase_list/$1';
$route['admin/view-bid-list/(:num)']   = 'Dashboard/view_bid_list/$1';
$route['admin/delete-category/(:num)'] = 'Dashboard/delete_category/$1';
$route['admin/sub-categories']     = 'Dashboard/sub_categories';
$route['admin/add-sub-category'] = 'Dashboard/add_sub_category';
$route['admin/delete-sub-category/(:num)'] = 'Dashboard/delete_sub_category/$1';
$route['get-items']             = "Sell/get_items";
$route['admin/front-ads']         = 'Dashboard/front_ads';
$route['admin/add-front-ads']     = 'Dashboard/add_front_ads';
//payment gateay

$route['testing_api']     = 'Test/get_token';