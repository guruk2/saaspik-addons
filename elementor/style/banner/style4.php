<div class="banner banner-four">
    <div class="container">
        <div class="banner-content-wrap-four">
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="banner-content">

                        <?php if (!empty($settings['title_text'])) : ?>
                            <h2 <?php echo $this->get_render_attribute_string('title_text'); ?>>
                                <?php echo $settings['title_text']; ?></h2>
                        <?php endif; ?>

                        <?php if (!empty($settings['subtitle'])) : ?>
                            <p <?php echo $this->get_render_attribute_string('subtitle'); ?>>
                                <?php echo $settings['subtitle']; ?>
                            </p>
                        <?php endif; ?>

                        <form action="<?php echo admin_url('admin-ajax.php'); ?>" method="post"
                              class="newsletter-form-banner wow pixFadeUp" data-saaspik-form="newsletter-subscribe">
                            <input type="hidden" name="action" value="saaspik_mailchimp_subscribe">

                            <div class="newsletter-inner">
                                <input type="email" name="email" class="form-control" id="newsletter-form-email"
                                       placeholder="<?php echo esc_attr__('Enter your email', 'sasspik-addons'); ?>"
                                       required>
                                <button type="submit" name="submit" id="newsletter-submit" class="newsletter-submit">
                                    <span><?php echo esc_html__('Get Started', 'sasspik-addons'); ?></span>
                                    <i class="fa fa-circle-o-notch fa-spin"></i>
                                </button>
                            </div>

                            <div class="form-result alert">
                                <div class="content"></div>
                            </div><!-- /.form-result-->
                        </form><!-- /.newsletter-form -->


                        <?php if ($button_play) : ?>
                            <a href="<?php echo esc_url($button); ?>"
                               class="play-btn play-btn-two  popup-video wow pixFadeUp"
                               data-wow-delay="0.6s">
                                <i class="ei ei-arrow_triangle-right"></i>
                                <?php echo $settings['play_btn_title']; ?>
                            </a>
                        <?php endif; ?>

                    </div><!-- /.banner-content -->
                </div>
                <!-- /.col-lg-8 -->

                <div class="col-lg-4 col-md-5">
                    <?php if (!empty($settings['fimage']['url'])) : ?>
                        <div class="promo-mockup wow pixFadeLeft">
                            <img class="mob-right wow fadeInDown" data-wow-delay="0.4s"
                                 src="<?php echo esc_url($settings['fimagefour']['url']) ?>"
                                 alt="<?php echo esc_attr($settings['title_text']) ?>">
                        </div><!-- /.promo-mockup -->
                    <?php endif; ?>
                </div>
                <!-- /.col-lg-4 col-md-5 -->
            </div>
            <!-- /.row -->


        </div><!-- /.banner-content-wrap -->
    </div><!-- /.container -->



    <?php if(!empty($settings['bg_shape_four_bottom'])) { ?>
        <div class="bg-shape-inner">
            <div class="bottom-shape">
                <img src="<?php echo $settings['bg_shape_four_bottom']['url'] ?>" alt="bottom-shape">           
            </div>
        </div>
    <!-- /.bg-shape-inner -->
    <?php } ?>

</div><!-- /.banner banner-four -->