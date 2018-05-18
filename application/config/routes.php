<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'User_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['backend']='admin/backend';

$route['admin-login']='admin/admin_login';
$route['admin-panel']='admin/dashboard';
$route['add-admin'] = 'admin/add_admin';
$route['admin-register'] = 'admin/admin_register';
$route['logout']='admin/logout';

$route['add-category'] = 'admin/add_category';
$route['category-save']='admin/category_save';

$route['add-sub-category']='admin/add_subcategory';
$route['sub-category-save']='admin/save_subcategory';
$route['view-subcategory']='Admin/view_subcategory';

$route['add-item']='admin/add_item';
$route['item-save']='admin/save_item';
$route['view-item']='Admin/view_item';

$route['add-product']='admin/add_product';
$route['save-product']='Admin/store_product';
$route['manage-product']='Admin/manage_product';

$route['add-inventory']='admin/add_inventory';
$route['save-inventory']='admin/save_inventory';
$route['manage-inventory']='admin/manage_inventory';
$route['view-product']='admin/view_product';
$route['product/(.+)']='User_controller/product/$1';

$route['sign-up']='User_controller/user_signup';
$route['user-registration']='User_controller/user_registration';
$route['log-in']='User_controller/user_login';
$route['login-verify']='User_controller/user_login_verify';
$route['user-log-out']='User_controller/log_out';

$route['contact-us']='User_controller/contact_us';
$route['viewer-message']='User_controller/send_viewer_msg';
$route['view_message/(.+)']='Admin/view_message/$1';
$route['reply-message']='Admin/reply_message';

//add product to cart
$route['add-product-cart']='User_controller/add_product_cart';
//view cart
$route['cart-view']='User_controller/view_cart';
//delete item from cart
$route['delete-item-cart']='User_controller/delete_item_cart';
//checkout link
$route['check-out']='User_controller/checkout';
//place order
$route['place-order']='User_controller/place_order';
//show order in admin panel
$route['view-order/(.+)']='Admin/view_order/$1';
$route['print-order/(.+)']='Admin/print_order/$1';
//manage order
$route['manage-order']='Admin/manage_order';

$route['deliver-order/(.+)']='Admin/deliver_order/$1';
//show subcategory in store categories link
$route['subcategory-view']='User_controller/subcategory_view';