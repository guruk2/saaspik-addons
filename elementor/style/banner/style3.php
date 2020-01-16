<div class="banner banner-three">
    <div class="container">
        <div class="banner-content-wrap-two">

            <div class="banner-content text-center">
                <?php if (!empty($settings['title_text'])) : ?>
                    <h2 class="banner-title wow pixFadeUp">
                        <?php echo $settings['title_text']; ?>
                    </h2>
                <?php endif; ?>

                <?php if (!empty($settings['subtitle'])) : ?>
                    <p <?php echo $this->get_render_attribute_string('subtitle'); ?>>
                        <?php echo $settings['subtitle']; ?>
                    </p>
                <?php endif; ?>
                <div class="banner-button-container">
                    <?php if (!empty($settings['link_text'])) : ?>
                        <a <?php echo $this->get_render_attribute_string('link_two'); ?>><?php echo $settings['link_text'] ?></a>
                    <?php endif; ?>

                    <?php if ($button_play) : ?>
                        <a href="<?php echo esc_url($button); ?>" class="play-btn popup-video wow pixFadeUp"
                           data-wow-delay="0.6s">
                            <i class="ei ei-arrow_triangle-right"></i>
                            <?php echo $settings['play_btn_title']; ?>
                        </a>
                    <?php endif; ?>
                </div>
                <!-- /.banner-button-container -->
            </div><!-- /.banner-content -->


            <?php if (!empty($settings['fimage']['url'])) : ?>
                <div class="promo-mockup wow pixFadeUp text-center" data-wow-delay="0.4s">
                    <img src="<?php echo esc_url($settings['fimage']['url']) ?>"
                         alt="<?php echo esc_attr($settings['title_text']) ?>">
                    <div class="shape-shadow"></div>
                </div><!-- /.promo-mockup -->
            <?php endif; ?>


        </div><!-- /.banner-content-wrap -->
    </div><!-- /.container -->

    <div class="bg-shape-inner">
        <?php if(!empty($settings['bg_shape_circle_three'])) { ?>

            <div class="circle-shape wow pixFadeRight">
                <img src="<?php echo $settings['bg_shape_circle_three']['url'] ?>" data-parallax='{"x" : -50}' alt="circle">
            </div>

        <?php } ?>

        <?php if(!empty($settings['bg_shape_circle_three2'])) { ?>
            <div class="shape wow pixFadeLeft">
                <img src="<?php echo $settings['bg_shape_circle_three2']['url'] ?>" data-parallax='{"x" : -50}' alt="circle">           
            </div>
        <?php } ?>
    </div>

    
    <!-- /.bg-shape-inner -->

</div><!-- /.banner banner-one -->