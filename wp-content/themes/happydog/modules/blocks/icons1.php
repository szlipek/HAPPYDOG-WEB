</div>
<section class="icons icons__small section">
<div class="container">
    <div class="row">
    <?php if(get_field('img')):?>
    <div class="col">
        <?php $img = get_field('img');?>
        <figure>
            <img src="<?php echo $img['url'];?>" width="<?php echo $img['width'];?>" height="<?php echo $img['height'];?>" alt="<?php echo $img['alt'];?>" />
        </figure>
    </div>
    <?php endif;?>
    <div class="col">
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
                    <?php if(get_sub_field('icons_title')):?><h5><?php the_sub_field('icons_title');?></h5><?php endif;?>
                    <p><?php the_sub_field('icons_desc');?></p>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
    </div>
</section>
<div class="container">