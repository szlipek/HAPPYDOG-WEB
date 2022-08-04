<section class="series">
    <h2 class="title text-center"><?php the_field('title');?></h2>
    <?php if( have_rows('product') ): ?>
        <div class="series__row">
        <?php while( have_rows('product') ): the_row();
            $img = get_sub_field('product_image');
            ?>
            <div class="series__single">
                <figure>
                    <img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" width="<?php echo $img['width'];?>" height="<?php echo $img['height'];?>" />
                </figure>
                <div class="series__single-text">
                    <h3><a href="<?php the_sub_field('product_link');?>"><?php the_sub_field('product_name');?><img src="/wp-content/themes/happydog/assets/img/arrow.svg" width="27" height="12"/></a></h3>
                    <p><?php the_sub_field('product_desc');?></p>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>