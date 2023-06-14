<?php defined('ABSPATH') or exit ?>

<?php
    global $product_object, $post;
    $post_data  = $product_object->get_meta( '_fbt_added_product_ids' );
    $product_ids = isset($post_data['fp_product']) && !empty($post_data['fp_product']) && isset($post_data['fp_product']['fp_product_ids']) && !empty($post_data['fp_product']['fp_product_ids']) ? $post_data['fp_product']['fp_product_ids'] : [] ;
?>

<div id="fbt_content" class="panel woocommerce_options_panel">
    <div class="options_group">
    <p class="form-field" id="choose_product" >
    <label for="product_ids"><?php esc_html_e( 'Add the Products', 'woocommerce' ); ?></label>
        <select class="wc-product-search" multiple="multiple" style="width: 50%;" id="fp_product_ids" name="fp_product_ids[]" data-placeholder="<?php esc_attr_e( 'Search Product', 'woocommerce' ); ?>" data-action="woocommerce_json_search_products_and_variations" data-exclude="<?php echo intval( $post->ID ); ?>">
            <?php
            foreach ( $product_ids as $product_id ) {
                $product = wc_get_product( $product_id );
                if ( is_object( $product ) ) {
                    echo '<option value="' . esc_attr( $product_id ) . '"' . selected( true, true, false ) . '>' . wp_kses_post( $product->get_formatted_name() ) . '</option>';
                }
            }
            ?>
        </select>
    </p>
    </div>
</div>