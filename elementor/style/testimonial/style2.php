<div class="testimonials-two">
    <div class="container">
        <div class="style-two swiper-container" <?php echo $data_attr; ?> data-loop=false data-breakpoints='{"1024": {"slidesPerView": 2}, "768": {"slidesPerView": 1}, "640": {"slidesPerView": 1}}' id="testimonial-wrapper">
            <div class="swiper-wrapper">
                <?php if( !empty( $testimonials ) ):
                    foreach( $testimonials as $testimonial ):

                        if( $testimonial[ 'image' ] != '' ){
                            $img = $testimonial[ 'image' ][ 'url' ];
                        }

                        $gp_rating = $testimonial['rating'];
                        $this->add_render_attribute( 'star-rating', 'class', 'gp-star-rating gp-star-' . esc_attr( $gp_rating ) );


                        if ($testimonial['star_rating'] == 'yes') :
                            $gp_rating_markup = "<div " . $this->get_render_attribute_string( 'star-rating' ) . ">\n";
                            $gp_rating_markup .= "<span class=\"gp-star-1 fa\"></span>\n";
                            $gp_rating_markup .= "<span class=\"gp-star-2 fa\"></span>\n";
                            $gp_rating_markup .= "<span class=\"gp-star-3 fa\"></span>\n";
                            $gp_rating_markup .= "<span class=\"gp-star-4 fa\"></span>\n";
                            $gp_rating_markup .= "<span class=\"gp-star-5 fa\"></span>\n";
                            $gp_rating_markup .= "</div>";
                        endif; ?>


                        <div class="swiper-slide">
                            <div class="testimonial-two">
                                <div class="testi-content-inner">
                                <div class="testimonial-bio">
                                    <?php if( !empty( $img ) ): ?>
                                        <div class="avatar">
                                            <img src="<?php echo esc_url( $img ); ?>"
                                            alt="<?php echo saaspik_get_alt_name( $testimonial[ 'image' ][ 'id' ] ); ?>">
                                        </div>
                                    <?php endif; ?>

                                    <div class="bio-info">
                                        <h4 class="client-name"><?php echo esc_html( $testimonial[ 'client_name' ] ); ?></h4>
                                        <p class="job"><?php echo esc_html( $testimonial[ 'designation' ] ); ?></p>
                                    </div>

                                </div>
                                <!-- /.testimonial-bio -->


                                <?php if( !empty( $testimonial[ 'review' ] ) ) : ?>
                                    <div class="testimonial-content">
                                        <p class="review-content"><?php echo esc_html( $testimonial[ 'review' ] ); ?></p>
                                    </div>
                                    <!-- /.testimonial-content -->
                                <?php endif; ?>

                                <?php if($testimonial['star_rating'] == 'yes') : echo $gp_rating_markup; endif; ?>

                                <?php if($settings['show_watermark']) : ?>
                                    <div class="quote">
                                        <img src="<?php echo esc_url($settings['watermark_image']['url']); ?>" alt="saaspik">
                                    </div>
                                <?php endif; ?>
                                </div>
                                <!-- /.testi-content-inner -->

                                <div class="shape-shadow"></div>
                            </div>
                            <!-- /.testimonial-two -->

                        </div><!-- /.swiper-slide -->
                    <?php endforeach;
                endif; ?>

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
    <!-- /.container -->

    <?php if($settings['bg_image_shape_two']) : ?>
        <div class="animate-shape wow pixFadeDown">
            <img src="<?php echo $settings['bg_image_shape_two']['url'] ?>" data-parallax='{"y" : 250}' alt="circle">
        </div>
    <?php endif;?>
</div>
<!-- /.testimonials-two -->

