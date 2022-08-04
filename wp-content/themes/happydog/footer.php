</div>
<footer class="footer">
    <div class="container">
        <div class="col">
            <p class="footer__title"><?php the_field('title1', 'options');?></p>
            <?php if( have_rows('links1', 'options') ): ?>
                <ul class="links">
                <?php while( have_rows('links1', 'options') ): the_row();
                    ?>
                    <?php
                    $link = get_sub_field('links1_link');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <li>
                        <a  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        </li>
                    <?php endif; ?>

                <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>
        <div class="col">
            <p class="footer__title"><?php the_field('title2', 'options');?></p>
            <?php if( have_rows('links2', 'options') ): ?>
                <ul class="links">
                <?php while( have_rows('links2', 'options') ): the_row();
                    ?>
                    <?php
                    $link = get_sub_field('links2_link');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <li>
                        <a  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        </li>
                    <?php endif; ?>

                <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>
        <div class="col">
            <?php if( have_rows('links3', 'options') ): ?>
                <?php while( have_rows('links3', 'options') ): the_row();
                    ?>
                    <?php
                    $link = get_sub_field('links3_link');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="footer__title" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="col">
            <a href="/" class="footer__logo">
               <img src="/wp-content/themes/happydog/assets/img/logo1.webp" alt="HappyDog" width="178" height="69" />
            </a>

            <?php if( have_rows('links4', 'options') ): ?>
            <ul class="links">
                <?php while( have_rows('links4', 'options') ): the_row();
                    ?>
                    <?php
                    $link = get_sub_field('links4_link');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <li>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        </li>
                    <?php endif; ?>

                <?php endwhile; ?>
                </ul>
            <?php endif; ?>

        </div>
        <p class="publisher">Wykonanie: <a href="https://spmedia.pl">SP-Media</a></p>
    </div>
</footer>
<?php wp_footer();?>
</body>
</html>