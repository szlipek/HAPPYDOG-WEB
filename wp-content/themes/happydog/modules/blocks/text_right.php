</div>
<section class="section">
    <?php $img1 = get_field('bg');
    if( !empty( $img1 ) ): ?>

    <figure class="section__bg">
        <img src="<?php echo $img1['url'];?>" width="<?php echo $img1['width'];?>" height="<?php echo $img1['height'];?>" alt="<?php echo $img1['alt'];?>" />
    </figure>
    <?php endif;?>
    <div class="container">
    <div class="section__text">
        <h2 class="title"><?php the_field('title');?></h2>
        <?php the_field('desc');?>
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

    </div>
</section>
<div class="container">