<article class="product">
    <div class="container">
        <div class="product__row">
            <div class="product__gallery">
                <?php

                global $product;
                global $post;
                $wrapper_classes   = apply_filters(
                    'woocommerce_single_product_image_gallery_classes',
                    array(
                        'product__gallery-row',

                    )
                );
                ?>
                <div class="product__image">
                    <figure>
                        <img src="" class="product__image-big"/>
                    </figure>
                </div>
                <div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" >
                    <figure class="woocommerce-product-gallery__wrapper">
                    <div class="woocommerce-product-gallery__image">
                        <a href="<?php echo get_the_post_thumbnail_url($loop->post->ID);?>"><img src="<?php echo get_the_post_thumbnail_url($loop->post->ID); ?>" class="img-responsive" alt=""/></a>
                    </div>
                        <?php
                        do_action( 'woocommerce_product_thumbnails' );
                        ?>
                    </figure>
                </div>
            </div>
            <div class="product__info">
                <h1 class="title"><?php the_title();?></h1>
                <?php if( have_rows('icons') ): ?>
                    <div class="product__info__icons">
                    <?php while( have_rows('icons') ): the_row();
                        $ico = get_sub_field('icons_icon');
                        ?>
                        <figure>
                            <img src="<?php echo $ico['url'];?>" width="<?php echo $ico['width'];?>" height="<?php echo $ico['height'];?>" alt="<?php echo $ico['alt'];?>" />
                        </figure>
                    <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <?php

                 $short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
                $id =  get_the_ID();
                 if ( ! $short_description ) {
                 	return;
                 }

                 ?>
                 <div class="woocommerce-product-details__short-description">
                 	<?php echo $short_description; // WPCS: XSS ok. ?>
                 </div>
                 <div class="product__attributes">

                 <?php
                 $variation_ids = $product->get_children();
                 if( $variation_ids ) {
                     foreach ( $variation_ids as $id ) {
                         $v_product = wc_get_product($id);
                         $product_attributes = wc_get_formatted_variation( $v_product, true, false, false );
                         echo '<p class="variation" data-id='. $id .">". $product_attributes . ": <span>". wc_price( $v_product->get_price() ). " <span>". $v_product->description .'</span></span></p>';
                     }
                     }
                 ?>
                 </div>
                 <div class="product__basket">
                    <div class="quantity">
                        <div class="minus"></div>
                        <input type="number" class="quantity_input" value="1">
                        <div class="plus"></div>
                    </div>
                    <a href="?add-to-cart=<?php echo $id;?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $id; ?>" data-product_sku="" aria-label="Dodaj <?php the_title()?> do koszyka" rel="nofollow">Dodaj do koszyka</a>
                 </div>
            </div>

        </div>
    </div>
</article>
<article class="product__desc">
    <div class="container">
        <?php the_field('desc');?>
        <div class="row">
            <div class="col">
            <h2 class="title"><?php the_field('table_title');?></h2>
            <?php
            $table = get_field( 'table' );

            if ( ! empty ( $table ) ) {

                echo '<div class="table-row"><table border="0">';

                    if ( ! empty( $table['caption'] ) ) {

                        echo '<caption>' . $table['caption'] . '</caption>';
                    }

                    if ( ! empty( $table['header'] ) ) {

                        echo '<thead>';

                            echo '<tr>';

                                foreach ( $table['header'] as $th ) {

                                    echo '<th>';
                                        echo $th['c'];
                                    echo '</th>';
                                }

                            echo '</tr>';

                        echo '</thead>';
                    }

                    echo '<tbody>';

                        foreach ( $table['body'] as $tr ) {

                            echo '<tr>';

                                foreach ( $tr as $td ) {

                                    echo '<td>';
                                        echo $td['c'];
                                    echo '</td>';
                                }

                            echo '</tr>';
                        }

                    echo '</tbody>';

                echo '</table></div>';
            }
            ?>
            </div>
            <div class="col">
                <?php $img = get_field('image');?>
                <figure>
                    <img src="<?php echo $img['url'];?>" alt="<?php echo $image['alt'];?>" width="<?php echo $image['width'];?>" height="<?php echo $image['height'];?>" />
                </figure>
            </div>
        </div>
    </div>
</article>
<?php get_template_part('modules/blocks/newsletter');?>
<script>
    const imgs = document.querySelectorAll('.woocommerce-product-gallery__image a'),
    variations = document.querySelectorAll('.variation'),
    quantity = document.querySelector('.quantity_input'),
    addToCartButton = document.querySelector('.add_to_cart_button');

    quantity.addEventListener('change', changeQuantity);

    variations.forEach(function(i){
        i.addEventListener('click', changeVariation)
    })

    imgs.forEach(function(i, e){
        i.addEventListener('click', changePhoto)
    })

    // set default variation
    function setVariationDefault() {
        document.querySelector('.variation').classList.add('active');
        const id = document.querySelector('.variation').getAttribute('data-id');
        addToCartButton.setAttribute('href', '?add-to-cart='+id);
        addToCartButton.setAttribute('data-product_id', id);
    }

    setVariationDefault()


    // change photo
    function changePhoto(e) {
        e.preventDefault()
        const imgSrc = this.getAttribute('href')
        document.querySelector('.product__image img').setAttribute('src', imgSrc);
    }


    // change variation
    function changeVariation() {
        document.querySelector('.variation.active').classList.remove('active');
        this.classList.add('active');
        const id = this.getAttribute('data-id');
        addToCartButton.setAttribute('href', '?add-to-cart='+id);
        addToCartButton.setAttribute('data-product_id', id);
    }

    // change quantity

    function changeQuantity() {
        const newVal = this.value;
        addToCartButton.setAttribute('data-quantity', newVal)
    }
</script>