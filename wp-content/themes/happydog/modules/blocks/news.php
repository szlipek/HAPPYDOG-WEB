<section class="news">
    <h2 class="text-center title"><?php the_field('title');?></h2>

    <?php
    $ps = get_field('posts');
            $posts = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => $ps
    ));


    if ($posts->have_posts()) :
    ?>
    <div class="blog-posts">
        <?php
                while ($posts->have_posts()) :
        $posts->the_post();
        ?>
        <article id="post-<?php the_ID(); ?>"
        <?php post_class(); ?>>
            <div class="blog-posts-single box-shadow">
            <?php
                    if ( has_post_thumbnail() ) : ?>
            <a class="post-image" href="<?php the_permalink();?>">
                <figure>
                <?php
                        the_post_thumbnail();
                        ?></figure></a><?php
                    endif;
                    ?>

                <div class="post-text">
                    <header class="entry-header">
                        <h6><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h6>
                    </header>
                    <div class="post-desc">
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="post-buttons">
                        <a href="<?php the_permalink(); ?>" class="text-right">czytaj dalej</a>
                    </div>
                </div>
            </div>
        </article>
        <?php
    endwhile;
    ?>
    </div>
    <?php
                wp_reset_postdata();
    endif; ?>



    <?php
    $link = get_field('link');
    if( $link ):
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
        <div class="text-center">
        <a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        </div>
    <?php endif; ?>
</section>