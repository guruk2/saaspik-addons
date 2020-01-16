<div class="col-md-6 col-sm-6 col-lg-<?php echo esc_attr( $count_col ); ?>">
    <div class="blog-post">
        <?php
        if( has_post_thumbnail() ):
                 
            ?>
            <div class="feature-image">
                <?php the_post_thumbnail('saaspik_blog_grid', array('class' => 'img-fluid')) ?>
            </div>
        <?php endif; ?>
        <div class="blog-content">
            <div class="entry-header">
                <?php if( $meta_pos != 'yes' ) : ?>
                    <ul class="post-meta">
                        <li><?php echo get_the_date(); ?></li>              
                    </ul>
                <?php endif; ?>
                <h3 class="entry-title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>

                <?php echo posted_meta_on();?>     

            </div>
        </div>
    </div>
</div>