<div class="col-md-6 col-lg-<?php echo esc_attr( $count_col ); ?>">
    <div class="blog-post-two ">
        <?php

        $image_size = '';

        if( has_post_thumbnail() ): ?>
            <div class="feature-image">
                <?php the_post_thumbnail('saaspik_blog_grid', array('class' => 'img-fluid')) ?>
            </div>
        <?php endif; ?>

        <div class="blog-content">
            <?php if( $meta_pos != 'yes' ) : ?>
            <ul class="post-meta">
                <li><?php echo saaspik_posted_by(); ?></li>
                <li><?php echo get_the_date(); ?></li>
            </ul>
            <?php endif; ?>
            <h3 class="entry-title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>

            <p>
                <?php echo saspik_substring( get_the_content(), $settings['word-limit'], '...'); ?>
            </p>

            <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html__('Read More', '_themename'); ?></a>

        </div>
    </div>
</div>