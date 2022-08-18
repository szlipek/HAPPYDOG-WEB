<section class="icons section">
    <h2 class="title"><?php the_field('title');?></h2>
    <?php if( have_rows('icons') ): ?>
        <div class="icons__row">
        <?php while( have_rows('icons') ): the_row();
            $img = get_sub_field('icons_icon');
            ?>
            <div class="icons__single">
                <figure>
                    <img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" width="<?php echo $img['width'];?>" height="<?php echo $img['height'];?>" />
                </figure>
                <div class="icons">
                <h5><?php the_sub_field('icons_title');?></h5>
                <p><?php the_sub_field('icons_desc');?></p>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>