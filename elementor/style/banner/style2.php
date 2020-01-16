<div class="banner banner-two pr">

    <div class="vector-bg">
        <img  src="<?php echo SAASPIK_PLUGIN_URL . 'elementor/images/top_shape.png' ?>" alt="vector-bg">
    </div>

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
                            <a <?php echo $this->get_render_attribute_string( 'link_two' ); ?>><?php echo $settings['link_text']?></a>
                        <?php endif; ?>

                    </div><!-- /.banner-content -->
                </div><!-- /.col-lg-6 -->

                <div class="col-lg-6">

                <?php if($feature_type == 'image_type') {?>
                    <?php if(!empty($settings['fimagetwo']['url'])) : ?>
                    <div class="promo-mockup wow pixFadeLeft">
                        <img class="mob-right wow fadeInDown" data-wow-delay="0.4s"  src="<?php echo esc_url($settings['fimagetwo']['url']) ?>" alt="<?php echo esc_attr($settings['title_text']) ?>">
                    </div><!-- /.promo-mockup -->
                    <?php endif; ?>
                <?php } elseif ($feature_type == 'animate_mockup') { ?>
                    <div class="animate-promo-mockup">
                    <img src="<?php echo  $settings['animeone']['url'] ?>" class="wow pixFadeDown" alt="mpckup" data-wow-duration="1.5s">
                    <img src="<?php echo  $settings['animetwo']['url'] ?>" class="wow pixFadeRight" data-wow-delay="0.3s" data-wow-duration="1s" alt="mpckup">
                    <img src="<?php echo  $settings['animethree']['url'] ?>" class="wow pixFadeUp" alt="mpckup" data-wow-duration="1.7s">
                    <img src="<?php echo  $settings['animefour']['url'] ?>" class="wow pixFadeRight" alt="mpckup">
                    <img src="<?php echo  $settings['animefive']['url'] ?>" class="wow pixFadeDown" alt="mpckup" data-wow-duration="2s">
                    <img src="<?php echo  $settings['animesix']['url'] ?>" alt="mpckup" data-wow-delay="0.3s">
                    <img src="<?php echo  $settings['animeseven']['url'] ?>" class="wow pixFadeLeft" alt="mpckup" data-wow-delay="0.6s" data-wow-duration="1.5s">
                    <img src="<?php echo  SAASPIK_PLUGIN_URL . 'elementor/images/cloud_01.png' ?>" alt="mpckup">
                    <img src="<?php echo  SAASPIK_PLUGIN_URL . 'elementor/images/cloud_02.png' ?>" alt="mpckup">
                    <img src="<?php echo  SAASPIK_PLUGIN_URL . 'elementor/images/cloud_03.png' ?>" alt="mpckup">
                </div><!-- /.promo-mockup -->
                <?php } ?>

                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.banner-content-wrap -->
    </div><!-- /.container -->

    <div class="bg-shape">
        <img src="<?php echo $settings['bg_image_shape_two']['url'] ?>" alt="shape-bg">
    </div>
</div><!-- /.banner banner-one -->