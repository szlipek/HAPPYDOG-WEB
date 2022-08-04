<section class="our__products">
    <h2 class="title"><?php the_field('title');?></h2>
    <?php if( have_rows('products') ): ?>
        <div class="our__products-row">
        <?php while( have_rows('products') ): the_row();
            $img = get_sub_field('products_img');
            ?>
            <div class="our__products-single">
                <figure>
                    <img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" width="<?php echo $img['width'];?>" height="<?php echo $img['height'];?>" />
                </figure>
                <div class="our__products-single-text">
                    <h3><?php the_sub_field('products_title');?></h3>
                    <?php the_sub_field('product_desc');?>
                    <?php
                    $link = get_sub_field('products_link');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="btn btn__small" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    <?php endif; ?>

</section>

