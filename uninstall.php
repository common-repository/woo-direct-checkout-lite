<?php 
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
} 
delete_option('funct_btn');
delete_option('dck_btn_shop');
delete_option('cart_btn_text');
