<?php

namespace FBT\app\Controllers;

defined('ABSPATH') or exit;

class TabContent
{
    // Add fbt tab in product data
    function fbt_product_tab($tabs) {
        $tabs['fbt_tab'] = array(
            'label'    => __('Frequently Brought Together', 'text_domain'),
            'target'   => 'fbt_content',
            'priority' => 25,
            'class'    => array('show_if_simple', 'show_if_variable','show_if_grouped'),
        );
        return $tabs;
    }

    function fbt_product_tab_content() {
        $post_data = [];
        wc_get_template('',
            $post_data, '', FBT_PLUGIN_PATH . '/app/Views/Content.php');


    }

    function fbt_saveProducts( $product ){
        $data = ['fp_product' => ['fp_frequent_product' => $_POST['fp_frequent_product'],
            'fp_product_ids' => isset( $_POST['fp_product_ids'] ) ? array_map( 'intval', (array) $_POST['fp_product_ids'] ) : array(),
        ]];
        $product->update_meta_data( '_fbt_added_product_ids', $data);
    }

}