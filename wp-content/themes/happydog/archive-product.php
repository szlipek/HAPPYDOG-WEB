<?php get_header();
?>
<?php get_template_part('modules/headers-shop');?>
<?php get_template_part('modules/blocks/breadcrumbs');?>
<section class="products">

<div class="container">

    <div class="row">
    <div class="sidebar">
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
        <?php endif; ?>
    </div>

<?php
$params = array(
'post_type' => 'product');
$wc_query = new WP_Query($params);
?>
<div class="products__list">
     <?php if ($wc_query->have_posts()) : ?>
     <?php while ($wc_query->have_posts()) :
                $wc_query->the_post(); ?>
     <div class="products__single">
            <a href="<?php the_permalink();?>">
            <figure>

                <?php  echo woocommerce_get_product_thumbnail('woocommerce_full_size'); ?>
            </figure>
            </a>
          <a href="<?php the_permalink();?>" class="products__single__title"><?php the_title();?></a>

          <div class="product__attributes products__attributes-list">

          <?php
           global $product;
          $variation_ids = $product->get_children();
          if( $variation_ids ) {
              foreach ( $variation_ids as $id ) {
                  $v_product = wc_get_product($id);
                  $product_attributes = wc_get_formatted_variation( $v_product, true, false, false );
                  ?>
                  <p class="variation" data-price="<?php  echo $v_product->get_price();?>" data-id="<?php echo $id ?>"><?php echo $product_attributes; ?></p>
                  <?php
              }
              }
          ?>
          </div>
          <p class="price"></p>
          <div class="products__single__buttons">
            <a href="<?php the_permalink();?>" class="btn btn__second">więcej</a>
            <a href="?add-to-cart=<?php echo $id;?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $id; ?>" data-product_sku="" aria-label="Dodaj <?php the_title()?> do koszyka" rel="nofollow">Kup</a>
          </div>
     </div>
     <?php endwhile; ?>
     <?php wp_reset_postdata(); ?>
     <?php else:  ?>
     <div class="no-products">
          <?php _e( 'No Products' ); ?>
     </div>
     <?php endif; ?>
  </div>
</div>
</div>
</section>
<?php get_template_part('modules/blocks/newsletter');?>
<?php get_footer()?>