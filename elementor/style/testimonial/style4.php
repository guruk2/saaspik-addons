<div class="container">
    <div class="testimonial-wrapper-two">
        <div id="<?php echo esc_attr($uniqid); ?>" class="swiper-container" <?php echo $data_attr4; ?>>
            <div class="swiper-wrapper">
                <?php if( !empty( $testimonials ) ):
                foreach( $testimonials as $testimonial ):

                    if( $testimonial[ 'image' ] != '' ){            
                        $img = $testimonial[ 'image' ][ 'url' ];              
                    } ?>

                    <div class="swiper-slide">
                        <div class="testimonial-four">
                            <?php if( !empty( $img ) ): ?>
                            <div class="single-bio-thumb">
                                <img src="<?php echo esc_url( $img ); ?>" width="80" height="80"
                                    alt="<?php echo saaspik_get_alt_name( $testimonial[ 'image' ][ 'id' ] ); ?>">
                            </div>
                            <?php endif; ?>


                            <?php if( !empty( $testimonial[ 'review' ] ) ) : ?>
                            <div class="testimonial-content">
                            <?php if($settings['show_watermark']) : ?>
                                <div class="quote">
                                    <img src="<?php echo esc_url($settings['watermark_image']['url']); ?>" alt="saaspik">
                                </div>
                            <?php endif; ?>
                                <p class="review-content">
                                    <?php echo esc_html( $testimonial[ 'review' ] ); ?>
                                </p>
                            </div>
                            <!-- /.testimonial-content -->
                            <?php endif; ?>

                            <div class="bio-info">
                                <h4 class="name"><?php echo esc_html( $testimonial[ 'client_name' ] ); ?></h4>
                                <span class="job"><?php echo esc_html( $testimonial[ 'designation' ] ); ?></span>
                            </div>

                        </div>
                    </div><!-- /.swiper-slide -->
                <?php endforeach;
            endif; ?>
            </div>

        </div>

        <?php if($settings['saaspik_hide_navigation']) : ?>
            <div class="slider-nav wow pixFadeUp" data-wow-delay="0.3s">
                <div id="slide-prev" class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide">
                    <i class="ei ei-arrow_left"></i>
                </div>
                <div id="slide-next" class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide">
                    <i class="ei ei-arrow_right"></i>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <!-- /.testimonial-wrapper -->
</div>
<!-- /.container -->