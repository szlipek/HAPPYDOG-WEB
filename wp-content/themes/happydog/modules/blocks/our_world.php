</div>
<section class="world">
    <?php $img1 = get_field('bg');
    if( !empty( $img1 ) ): ?>

    <figure class="world__bg">
        <img src="<?php echo $img1['url'];?>" width="<?php echo $img1['width'];?>" height="<?php echo $img1['height'];?>" alt="<?php echo $img1['alt'];?>" />
    </figure>
    <?php endif;?>
    <div class="container">
    <div class="world__text">
    <h2 class="title"><?php the_field('title');?></h2>
    <?php the_field('desc');?>
    <?php if( have_rows('icons') ): ?>
        <div class="world__icons">
        <?php while( have_rows('icons') ): the_row();
            $img = get_sub_field('icons_icon');
            ?>
            <div class="world__icons-single">
                <figure>
                    <img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" width="<?php echo $img['width'];?>" height="<?php echo $img['height'];?>" />
                </figure>
                <div class="world__icons-single-text">
                    <?php the_sub_field('icons_text');?>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    <?php endif; ?>
    </div>
    <?php
    $link = get_field('link');
    if( $link ):
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
        <a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
    <?php endif; ?>
    </div>
</section>
<div class="container">