</div>
<?php $img = get_field('bg');?>
<section class="newsletter">
    <figure class="newsletter__bg">
        <img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" width="<?php echo $img['width'];?>" height="<?php echo $img['height'];?>" />
    </figure>
    <div class="container">
        <div class="newsletter__text">
            <h2 class="title"><?php the_field('title');?></h2>
            <?php the_field('desc');?>
            <?php the_field('newsletter');?>
        </div>
    </div>
</section>
<div class="container">