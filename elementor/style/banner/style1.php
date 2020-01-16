<div class="banner banner-one">

    <?php if(! empty($settings['bg_shape_circle']['url']) ) { ?>
        <div class="circle-shape" data-parallax='{"y" : 230}'>
            <img src="<?php echo esc_url($settings['bg_shape_circle']['url']) ?>" alt="circle">
        </div>
    <?php } 
    ?>

    <div class="container">
        <div class="banner-content-wrap">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-content">
                        <?php if ( ! empty( $settings['title_text'] ) ) : ?>
                        <h2 <?php echo $this->get_render_attribute_string( 'title_text' ); ?>>
                            <?php echo $settings['title_text']; ?></h2>
                        <?php endif; ?>

                        <?php if ( ! empty( $settings['subtitle'] )) : ?>
                        <p <?php echo $this->get_render_attribute_string( 'subtitle' ); ?>>
                            <?php echo $settings['subtitle']; ?>
                        </p>
                        <?php endif; ?>


                        <?php if(! empty($settings['link_text'])) :?>
                            <a <?php echo $this->get_render_attribute_string( 'link' ); ?>><?php echo $settings['link_text']?></a>
                        <?php endif; ?>

                    </div><!-- /.banner-content -->
                </div><!-- /.col-lg-6 -->

                <div class="col-lg-6">
                    <?php if(!empty($settings['fimage']['url'])) : ?>
                    <div class="promo-mockup wow pixFadeLeft">
                        <img class="mob-right wow fadeInDown" data-wow-delay="0.4s"
                            src="<?php echo esc_url($settings['fimage']['url']) ?>"
                            alt="<?php echo esc_attr($settings['title_text']) ?>">
                    </div><!-- /.promo-mockup -->
                    <?php endif; ?>

                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.banner-content-wrap -->
    </div><!-- /.container -->

    <div class="bg-shape">
        <img src="<?php echo $settings['bg_image_shape']['url'] ?>" alt="shape-bg">
    </div>
</div><!-- /.banner banner-one -->