</div>
<section class="steps">
    <div class="container">
        <h2 class="title"><?php the_field('title');?></h2>
        <?php if( have_rows('steps') ): ?>
            <div class="steps__row">
            <?php while( have_rows('steps') ): the_row();
                $img = get_sub_field('steps_img');
                ?>
                <div class="steps__single">
                    <figure>
                        <img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" width="<?php echo $img['width'];?>" height="<?php echo $img['height'];?>" />
                    </figure>
                    <h3><?php the_sub_field('steps_title');?></h3>
                    <?php the_sub_field('steps_desc');?>
                </div>
            <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<div class="container">