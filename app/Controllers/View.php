<?php

namespace FBT\app\Controllers;

defined('ABSPATH') or exit;

class View
{

    function viewFBTpage()
    {
        global $post;
        if (isset($post) && !empty($post) && isset($post->ID) && !empty($post->ID)) {
            $post_meta_data = get_post_meta($post->ID, '_fbt_added_product_ids', true);
            wc_get_template('',
                array('post_meta_data' => $post_meta_data), '', FBT_PLUGIN_PATH . '/app/Views/Customer/FBTproductview.php');
        }
    }

    function addTocart()
    {
        if (isset($_POST['add_to_cart']) && !empty($_POST['add_to_cart'] && $_POST['add_to_cart'] == 'Add to cart')) {
            $product_id = $_POST['product_id'];
            $post_meta_data = get_post_meta($product_id, '_fbt_added_product_ids', true);
            $frequent_product_ids=$post_meta_data['fp_product']['fp_product_ids'];
             array_unshift($frequent_product_ids,$product_id);
            foreach ($frequent_product_ids as $frequent_product_id) {
                WC()->cart->add_to_cart( $frequent_product_id );
            }
            // $url = wc_get_cart_url();
            $this->wc_print_notices();
            // exit;
        }
    }

    function  wc_print_notices() {
        // wc_add_notice('Product successfully added to the cart.', 'success');
        ?>
        <div class="content-area alignwide">
            <div class="woocommerce-notices-wrapper">
                <div class="woocommerce-message" role="alert">
                    <a href="http://localhost:9000/?page_id=13" tabindex="1" class="button wc-forward wp-element-button">View cart</a> Product Added to Cart	
                </div>
            </div>
        </div>
    <?php
    }
}
