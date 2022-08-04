<article class="product">
    <div class="container">
        <div class="product__row">
            <div class="product__gallery">
                <?php

                global $product;
                $post_thumbnail_id = $product->get_image_id();
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
                        <?php
                        if ( $post_thumbnail_id ) {
                            $html = wc_get_gallery_image_html( $post_thumbnail_id, true );
                        } else {
                            $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
                        }

                        echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

                        do_action( 'woocommerce_product_thumbnails' );
                        ?>
                    </figure>
                </div>
            </div>
            <div class="product__info">
                <h1 class="title"><?php the_title();?></h1>
                <?php global $post;

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
                         echo '<p class="variation" data-id='. $id .">". $product_attributes . ": ". wc_price( $v_product->get_price() ). " <span>". $v_product->description .'</span></p>';
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