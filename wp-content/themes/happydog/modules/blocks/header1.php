
<header class="header header__small">
    <?php $img = get_field('bg');?>
    <figure class="header__img">
        <img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" width="<?php echo $img['width'];?>" height="<?php echo $img['height'];?>" />
    </figure>
    <div class="container">
        <h1 class="header__text title"><?php the_field('title');?></h1>
    </div>
</header>