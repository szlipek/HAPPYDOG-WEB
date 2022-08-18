<section class="text">
    <div class="container">
    <?php if(get_field('title')):?>
        <h2><?php the_field('title');?></h2>
        <?php endif;?>
        <?php if(get_field('desc')):?>
            <?php the_field('desc');?>
        <?php endif;?>
        <?php if( have_rows('icons') ): ?>
            <div class="infos">
            <?php while( have_rows('icons') ): the_row();
                $ico = get_sub_field('icons_icon');
                ?>
                <div class="infos__single">
                    <figure>
                        <img src="<?php echo $ico['url'];?>" alt="<?php echo $ico['alt'];?>" width="<?php echo $ico['width'];?>" height="<?php echo $ico['height'];?>" />
                    </figure>
                    <div><?php the_sub_field('icons_desc');?></div>
                </div>
            <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>