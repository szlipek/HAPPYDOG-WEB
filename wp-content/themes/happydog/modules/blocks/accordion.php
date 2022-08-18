<section class="faq">
    <div class="container">
        <?php if( have_rows('topic') ): ?>
            <div class="accordion">
            <?php while( have_rows('topic') ): the_row();?>
                <div class="accordion__single">
                    <h5><?php the_sub_field('topic_title');?></h5>
                    <?php if( have_rows('subtopic') ): ?>
                        <div class="accordion__more">
                        <?php while( have_rows('subtopic') ): the_row();
                            $ico = get_sub_field('subtopic_icon');
                            ?>
                            <div class="accordion__subtopic">
                            <figure>
                                <img src="<?php echo $ico['url'];?>" alt="<?php echo $ico['alt'];?>" width="<?php echo $ico['width'];?>" height="<?php echo $ico['height'];?>" />
                            </figure>
                            <div class="accordion__desc">
                            <h6><?php the_sub_field('subtopic_title');?></h6>
                            <?php the_sub_field('subtopic_desc');?>
                            <?php
                            $link = get_sub_field('subtopic_link');
                            if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                            </div>
                            </div>
                        <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>