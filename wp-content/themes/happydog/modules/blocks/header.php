<?php $img = get_field('photo');?>

</div>

<header class="header">
<figure class="header__img">
    <img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" width="<?php echo $img['width'];?>" height="<?php echo $img['height'];?>"/>
</figure>
<div class="container">
    <div class="header__text">
        <h1><?php the_field('title');?></h1>
        <h5><?php the_field('subtitle');?></h5>
        <?php
        $link = get_field('button');
        if( $link ):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <figure class="header__arrow">
                <img src="/wp-content/themes/happydog/assets/img/arrow.webp" alt="Zobacz" width="35" height="55" />
            </figure>
            <a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>
    </div>
</div>
</header>

<div class="container">