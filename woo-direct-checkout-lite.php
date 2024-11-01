<?php
/**
 * Plugin Name: Direct Checkout For Woocommerce Lite
 * Plugin URI:  https://wordpress.org/plugins/direct-checkout-for-woocommerce-lite/
 * Description: Adds Buy Now button which take you to directly to Checkout page
 * Version:     1.0.3
 * Author:      Centangle Interactive
 * Author URI:  https://centangle.com/
 * Text Domain: dchk
 * Domain Path: /languages
 * License:     GPL2
 */
include 'checkout_setting.php'; //including settings
//adding setting option
function dchkl_settings_link( $links ) {
    $url = get_admin_url() . 'admin.php?page=chk_settings';
    $settings_link = '<a href="' . $url . '">' . __('Settings', 'Direct Checkout Lite') . '</a>';
    array_unshift( $links, $settings_link );
    return $links;
}
function dchkl_after_theme() {
     add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'dchkl_settings_link');
}
add_action ('after_setup_theme', 'dchkl_after_theme');
// adding dirct checkout button
if(get_option('funct_btn')){
    add_action('woocommerce_after_add_to_cart_button', 'dchkl_custom_content_after_addtocart_button');
	add_action('woocommerce_after_shop_loop_item', 'dchkl_custom_content_onshoppage');
	function dchkl_custom_content_onshoppage(){
        global $product;
        $id = $product->get_id();
            if(get_option('dck_btn_shop')){
                if (get_option('buynow_icon_only')) {
                    echo ('<a  key="' . $id . '" style=" margin-right: 2px;" class="button product_type_simple add_to_cart_button ajax_add_to_cart  chk_out '.esc_attr(get_option('dck_user_class')).'"></a>');
                } else {
                    echo ('<a  key="' . $id . '" style=" margin-right: 2px;" class="button product_type_simple add_to_cart_button ajax_add_to_cart chk_out '.esc_attr(get_option('dck_user_class')).'">' . (esc_html(get_option('buynow_btn_text')) ? esc_html(get_option('buynow_btn_text')) : "Buy Now") . '</a>');
                }
        }
    }
    function dchkl_custom_content_after_addtocart_button(){
        global $product;
        $id = $product->get_id();
        if (get_option('buynow_icon_only')) {
            echo ('<button  type="submit" key="' . $id . '" style= class="single_add_to_cart_button button alt chk_out '.esc_attr(get_option('dck_user_class')).'"></button>');
        } else {
            echo ('<button  type="submit" key="' . $id . '"  class="single_add_to_cart_button button alt chk_out '.esc_attr(get_option('dck_user_class')).'">' . (esc_html(get_option('buynow_btn_text')) ? esc_html(get_option('buynow_btn_text')) : "Buy Now") . '</button>');
        }
    }
}
//styles enqueue
add_action('wp_enqueue_scripts', 'dchkl_enqueue_css');
function dchkl_enqueue_css()
{
    wp_enqueue_style('direct_ck_fa', plugins_url('assets/css/font-awesome.min.css', __FILE__), true);
    wp_enqueue_style('direct_ck', plugins_url('assets/css/direct_ck.css', __FILE__), true);
}
//adding ajax
add_action('init', 'dchkl_adding_ajax');
function dchkl_adding_ajax($hook)
{
    wp_enqueue_script('ajax-script',
        plugins_url('assets/js/direct_checkout.js', __FILE__),
        array('jquery'), false, true
    );
    wp_localize_script('ajax-script', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_ajax_nopriv_ca_myaction', 'ca_myaction');
add_action('wp_ajax_ca_myaction', 'ca_myaction');
function ca_myaction()
{

    if (isset($_POST['id'])) {
			
        if (isset($_POST['id']) ) {
            global $woocommerce;
            $woocommerce->cart->add_to_cart($_POST['id'],$_POST['quantity']);
            echo get_permalink(wc_get_page_id('checkout'));
        } else {
            echo "not added";
        }
    }
    wp_die(); // All ajax handlers die when finished
}
//filters to replace butoon text
add_filter('woocommerce_product_single_add_to_cart_text', 'dchkl_replace_text');
add_filter('woocommerce_product_add_to_cart_text', 'dchkl_replace_text');
function dchkl_replace_text()
{
    $icon = __(get_option('cart_btn_text') ? get_option('cart_btn_text') : "Add to Cart", 'woocommerce');
    return $icon;
}

