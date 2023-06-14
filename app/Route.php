<?php

namespace FBT\app;

defined('ABSPATH') or exit;

class Route
{
    function hook()
    {
        $fbt_tab = new \FBT\app\Controllers\Tabcontent();
        $view = new \FBT\app\Controllers\View();

        // admin tab
        add_filter('woocommerce_product_data_tabs',[ $fbt_tab,'fbt_product_tab']);
        add_action('woocommerce_product_data_panels',[$fbt_tab,'fbt_product_tab_content']);
        add_action( 'woocommerce_admin_process_product_object',[$fbt_tab,'fbt_saveProducts']);

        // view pages route
        add_action('woocommerce_after_single_product_summary',[$view,'viewFBTpage']);
        add_action( 'wp_loaded',[$view,'addTocart']);

    }
}