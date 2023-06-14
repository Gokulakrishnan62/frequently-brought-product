<?php defined('ABSPATH') or exit ?>

<?php 
global $post;
$frequent_product =  isset($post_meta_data) && !empty($post_meta_data) ? $post_meta_data : [] ;
?>
<div class="woocommerce-tabs wc-tabs-wrapper">
    <div class="frequent products">
        <br><?php
        if(!empty($frequent_product))
        {?>
        <h2> <?php esc_html_e('Frequently brought product', 'woocommerce');?> </h2>
        <?php
            $parent_product=$post->ID;
            $item_total_price = 0;
                
            $frequent_product_ids = $frequent_product['fp_product']['fp_product_ids'];
            array_unshift($frequent_product_ids,$parent_product);
            ?>
            <ul class="products columns-4">
            <?php
                foreach ($frequent_product_ids as $frequent_product_id) {
                    $product = wc_get_product($frequent_product_id);
                    ?>
                        <li class="product type-product post-139 status-publish first instock product_cat-tshirts has-post-thumbnail shipping-taxable purchasable product-type-simple">
                        <?php $image_id  = $product->get_image_id();
                            $image_url = wp_get_attachment_image_url( $image_id, 'full' );
                            echo '<img src="'.$image_url.'" width="300" height="300">';
                            echo "<br>";
                            echo $product->get_name();
                            echo "<br>";
                            echo wc_price($product->get_price());
                            $item_total_price += $product->get_price();
                            echo "<br>";?>
                        </li><?php
                }?>
                        <div class="product type-product post-139 status-publish first instock product_cat-tshirts has-post-thumbnail shipping-taxable purchasable product-type-simple" style="margin-top : 10%">
                            <?php
                            // echo "Total price = ",wc_price($item_total_price);?>
                            <form method="post" >
                                <input type="hidden" name="product_id" value="<?php echo $post->ID; ?>">
                                <input type="submit" class="button wp-element-button product_type_simple add_to_cart_button ajax_add_to_cart" value="Add to cart" name="add_to_cart"/>
                            </form>
                        </div>
        </ul><?php
            }
        ?>

    </div>
</div>

