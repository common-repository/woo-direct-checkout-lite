<?php
// adding color picker
add_action( 'admin_enqueue_scripts', 'dchkl_color_enque' );
function dchkl_color_enque( ) {
wp_enqueue_script( 'wp-color-picker' );
wp_enqueue_script('dck_setting',
        plugins_url('assets/js/dck_setting.js', __FILE__),
        array( 'wp-color-picker' ), false, true
    );
}
add_action('admin_init', 'dchkl_css_forsettings',2); // adding css
function dchkl_css_forsettings() 
{
    wp_enqueue_style('dck_settings', plugins_url('assets/css/dck_settings.css', __FILE__), true);
}
// adding submenu for settings
add_action('admin_menu', 'dchkl_settings_menu');
function dchkl_settings_menu()
{
    add_submenu_page('woocommerce','Direct checkout for woocommerce setting', 'Direct checkout for woocommerce lite', 'manage_options', 'chk_settings', 'dchkl_showo_custom_option');
}
//showing options in settings 
function dchkl_showo_custom_option()
{?>
<div class="form dckh_setting" style=" border: 1px solid #ccc;padding: 2%;margin: 1%;">
	<!-- <div id="dck_buy_paid" class="modal">
        <div class="modal-content">
            <h1>Access To all Features</h1>
            <a href="" target="_blank">Advance Version Coming Soon</a>
        </div>
    </div> -->
    <div class="container">
        <ul class="dck-tabs">
            <li class="tab-link current" data-tab="dck-tab-1">General Settings</li>
            <li class="tab-link" data-tab="dck-tab-2">Buy Now Customization</li>
            <li class="tab-link" data-tab="dck-tab-3">About Author</li>
        </ul>
        
    <div id="dck-tab-1" class="dck-tab-content current">
		<form method="post" action="#">
        <h1>Direct Checkout For Woocommerce Lite</h1>
        <table class="dck_table">
	        <tr>
                <td><h3>Enable/Disable 'Direct Checkout'</h3><h5>You can control when to enable and disable functionality</h5></td>
                <td><label class="switch">
                <input type="checkbox" name="funct_btn" value="funct_btn" <?php echo esc_attr((get_site_option('funct_btn'))) ? 'checked' : '' ?>>
                <span class="slider round"></span>
                </label></td>
            </tr>
            <tr><td colspan="2"><hr></td></tr> 
            <tr>
                <td><h3>Add to cart Button Text</h3><h5>Text will be used as Cart Button text</h5></td>
                <td><input type="text" size="45" style="" name="cart_btn_text" placeholder="Add To Cart" value="<?php echo esc_attr((get_option('cart_btn_text'))); ?>"></td>
            </tr>
            <tr><td colspan="2"><hr></td></tr>
            <tr>
                <td><h3>Show Direct Checkout Button on Shop Page</h3><h5>Button will be visible on shop page</h5></td>
                <td><input type="checkbox" name="dck_btn_shop" value="dck_btn_shop" <?php echo esc_attr((get_site_option('dck_btn_shop'))) ? 'checked' : '' ?>></td>
            </tr>
            <tr><td colspan="2"><hr></td></tr>
            <tbody  class="dck_blur">		
		    <tr>
                <td><h3>Show Icon in Checkout button</h3><h5>A basket icon will be added with text to button</h5></td>
                <td><input type="checkbox" name="buynow_icon" value="buynow_icon" <?php echo (get_site_option('buynow_icon')) ? 'checked' : '' ?>></td>
            </tr>
            <tr><td colspan="2"><hr></td></tr>
            <tr>
                <td><h3>Show Only Icon Checkout button</h3><h5>Only basket icon will be visible as Checkout Button</h5></td><td><input type="checkbox" name="buynow_icon_only" value="buynow_icon_only" <?php echo (get_site_option('buynow_icon_only')) ? 'checked' : '' ?>></td>
            </tr>
            <tr><td colspan="2"><hr></td></tr>
            <tr>
                 <td><h3> Hide "Add to cart" button</h3><h5>Button will be removed from product page</h5></td><td><input type="checkbox" name="hide_add_to_c" value="hide_add_to_c" <?php echo (get_site_option('hide_add_to_c')) ? 'checked' : '' ?>> </td>
            </tr>
            <tr><td colspan="2"><hr></td>
				</tr>
            <tr>
                 <td><h3>  Hide "Add to cart" button on Shop Page</h3><h5>Button will be removed from Shop page</h5></td><td><input type="checkbox" name="hide_add_to_c_shop" value="hide_add_to_c_shop" <?php echo (get_site_option('hide_add_to_c_shop')) ? 'checked' : '' ?>></td>
            </tr><br>
            <tr><td colspan="2"><hr></td></tr>
            </tbody >
            <tr>
            <td></td><td><br><input type="submit" name="dckUpdate1" id="Update1" class="button button-primary" value="Save Changes"></td>
            </tr>
        </table>
    </form>
    </div> <!-- tab1 -->
    <div id="dck-tab-2" class="dck-tab-content">            
    <form method="post" action="#">
        <h1>Direct Checkout For Woocommerce Lite</h1>
        <table class="dck_table">
            <tr>
                <td><h3>Direct Checkout button text</h3><h5>Text will be used as Direct Checkout button text</h5></td>
                <td><input type="text" size="45" name="buynow_btn_text" placeholder="Buy Now" value="<?php echo (get_option('buynow_btn_text')); ?>"></td>
            </tr>
            <tr><td colspan="2"><hr></td></tr>
            <tr>
                <td><h3>Add Custom class to buy now button</h3><h5>A class will added to button</h5></td>
                <td><input type="text" size="45" style="" name="dck_user_class" placeholder="myclass" value="<?php echo (get_option('dck_user_class')); ?>"></td>
            </tr>
            <tr><td colspan="2"><hr></td></tr>
            <tr>
                <td><h3>Change 'Buy Now' Background Color</h3></td>
                <td> <input type="text" name="dck_btn_color" value='<?php echo (get_option('dck_btn_color')); ?>' class="dck-color-field" /></td>
            </tr><br>
            <tr><td colspan="2"><hr></td></tr>
            <tr>
                <td><h3>Change 'Buy Now' Text Color</h3></td>
                <td> <input type="text" name="dck_btn_text_color" value='<?php echo (get_option('dck_btn_text_color')); ?>' class="dck-color-field" /></td>
            </tr><br>
            <tr><td colspan="2"><hr></td></tr>
            <tr>
                <td><h3>Change 'Buy Now' Font size</h3></td>
                <td> <input placeholder="size in px" type="number" name="dck_btn_fontsize" value='<?php echo (get_option('dck_btn_fontsize')); ?>' class="dck-size-field" />px</td>
            </tr><br>
            <tr><td colspan="2"><hr></td></tr>
            <tr>
                <td><h3>Change 'Buy Now' Border radius</h3></td>
                <td> <input placeholder="size in px" type="number" name="dck_btn_radius" value='<?php echo (get_option('dck_btn_radius')); ?>' class="dck_btn_radius" />px</td>
            </tr><br>
            <tr><td colspan="2"><hr></td></tr>
            <tr>	
                <td></td><td><br><input type="submit" name="dckUpdate2" id="Update2" class="button button-primary" value="Save Changes"></td>
            </tr>
        </table>
    </form>
    </div><!-- tab2 -->
	<div id="dck-tab-3" class="dck-tab-content">
		<h1>About Author</h1>
		<p><b>More plugin by centangle:</b></p>
<p><a href="https://profiles.wordpress.org/centangle/#content-plugins">https://profiles.wordpress.org/centangle</a></p>
<p>Email: <a href="mailto:hello@centangle.com">hello@centangle.com</a></p>
<p>Phone: <a href="tel:+92512825565">+92-51-2825565</a></p>
<p>twitter: <a href="https://twitter.com/centangle?lang=en">https://twitter.com/centangle</a></p>
<p>The latest Tweets from Centangle (@centangle).</p>

Centangle Interactive is an #Islamabad based #DigitalMedia agency providing #Web, #Mobile, #ERP, #POS, #Accounting, #Software and #DigitalMarketing solutions. Islamabad, Pakistan
<p><b><a href="https://centangle.com/services/web-design-development-company/" target="_blank">Centangle Interactive</a></b> is a digital company based that provides a wide range of services in the digital landscape including, Wordpress Theme Development & Wordpress Plugin Development.</p>
<p><b>More plugin by centangle:</b></p>
<p><a href="https://profiles.wordpress.org/centangle/#content-plugins" target="_blank">https://profiles.wordpress.org/centangle</a></p>
<p>Github: <a href="https://twitter.com/centangle?lang=en" target="_blank">https://twitter.com/centangle</a></p>
<p>Email: <a href="mailto:hello@centangle.com">hello@centangle.com</a></p>
<p>twitter: <a href="https://twitter.com/centangle?lang=en" target="_blank">https://twitter.com/centangle</a></p>
<p>Phone: <a href="tel:+92512825565">+92-51-2825565</a></p>
	</div><!-- tab3 -->
</div> <!-- container -->
<?php
}
//saving settings
if (isset($_POST['dckUpdate1'])) {
	if (isset($_POST['funct_btn'])) {
        update_option("funct_btn", sanitize_text_field($_POST['funct_btn']));
    } else {
        delete_option('funct_btn');
    }
	if (isset($_POST['dck_btn_shop'])) {
        update_option("dck_btn_shop", sanitize_text_field($_POST['dck_btn_shop']));
    } else {
        delete_option('dck_btn_shop');
    }
    if (isset($_POST['cart_btn_text'])) {
        update_option("cart_btn_text", sanitize_text_field($_POST['cart_btn_text']));
    } else {
        delete_option('cart_btn_text');
    }
}