<div id="testimonial-wrapper-three">
    <div id="<?php echo esc_attr($uniqid); ?>" class="swiper-container" <?php echo esc_attr($data_attr3); ?>>
        <div class="swiper-wrapper">
            <?php if( !empty( $testimonials ) ):
            foreach( $testimonials as $testimonial ): ?>

            <div class="swiper-slide">
                <div class="testimonial-three">
                     <?php if( !empty( $testimonial['image'] ) ): ?>
                    <div class="avatar">
                        <?php echo wp_get_attachment_image( $testimonial['image']['id'], 'saaspik_testimonial_three'); ?>

                        <div class="avatar-shape">
                            <img src="<?php echo  SAASPIK_PLUGIN_URL . 'elementor/images/testi_shape.png'; ?>" alt="<?php echo esc_attr__('shape', 'saaspik-addons') ?>">
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="testimonial-content">
                        <div class="bio-info">
                            <h3 class="name"><?php echo esc_html( $testimonial[ 'client_name' ] ); ?></h3>
                            <span class="job"><?php echo esc_html( $testimonial[ 'designation' ] ); ?></span>
                        </div>


                        <?php if( !empty( $testimonial[ 'review' ] ) ) : ?>
                        <p class="review-content"><?php echo esc_html( $testimonial[ 'review' ] ); ?></p>
                        <?php endif; ?>

                    </div>
                    <!-- /.testimonial-content -->

                    <?php if($settings['show_watermark']) : ?>
                        <div class="quote">
                            <img src="<?php echo esc_url($settings['watermark_image']['url']); ?>" alt="saaspik">
                        </div>
                    <?php endif; ?>

                </div>
            </div><!-- /.swiper-slide -->
            <?php endforeach;

        endif; ?>

        </div>
    </div>
    

    <?php if($settings['saaspik_hide_navigation']) : ?>
        <div class="slider-nav">
            <div id="slide-prev" class="swiper-button-prev">
                <div class="arrow"></div>
            </div>
            <div id="slide-next" class=" swiper-button-next">
                <div class="arrow"></div>
            </div>
        </div>
    <?php endif; ?>


</div>