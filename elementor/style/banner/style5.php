<div class="banner banner-five">

    <div class="banner-right-shape">
        <img src="<?php echo $settings['bg_image_shape_five']['url'] ?>" alt="shape-bg">
    </div>

    <div class="container">
        <div class="banner-content-wrap-five">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-content">

                        <?php if ( ! empty( $settings['top_title_text'] ) ) : ?>
                            <h3 <?php echo $this->get_render_attribute_string( 'top_title_text' ); ?>>
                                <?php echo $settings['top_title_text']; ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ( ! empty( $settings['title_text'] ) ) : ?>
                            <h2 <?php echo $this->get_render_attribute_string( 'title_text' ); ?>>
                                <?php echo $settings['title_text']; ?>
                            </h2>
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
                        <div class="promo-mockup-five">
                            <ul class="animate-element-five">
                            <?php if( ! empty($settings['bfive_animeone']['url'])) { ?>
                                <li><img src="<?php echo  $settings['bfive_animeone']['url'] ?>" class="wow fadeInDown" alt="mockup"></li>
                            <?php } ?>
                            
                            <?php if( ! empty($settings['bfive_animetwo']['url'])) { ?>
                                <li><img src="<?php echo  $settings['bfive_animetwo']['url'] ?>" class="wow zoomIn" data-wow-delay="0.43s" alt="mockup"></li>
                            <?php } ?>
                            
                            <?php if( ! empty($settings['bfive_animethree']['url'])) { ?>
                                <li><img src="<?php echo  $settings['bfive_animethree']['url'] ?>" class="wow zoomIn" data-wow-delay="0.4s" alt="mockup"></li>
                            <?php } ?>

                            <?php if( ! empty($settings['bfive_animefour']['url'])) { ?>
                                <li><img src="<?php echo  $settings['bfive_animefour']['url'] ?>"  class="wow fadeInRight" alt="mockup"></li>
                            <?php } ?>

                            <?php if( ! empty($settings['bfive_animefive']['url'])) { ?>
                                <li><img src="<?php echo  $settings['bfive_animefive']['url'] ?>" class="wow fadeInLeft" data-wow-delay="0.6s" alt="mockup"></li>
                            <?php } ?>
                            
                            <?php if( ! empty($settings['bfive_animesix']['url'])) { ?>
                                <li><img src="<?php echo  $settings['bfive_animesix']['url'] ?>" class="wow fadeInUp" data-wow-delay="0.7s" alt="mockup"></li>
                            <?php } ?>

                            <?php if( ! empty($settings['bfive_animeseven']['url'])) { ?>
                                <li><img src="<?php echo  $settings['bfive_animeseven']['url'] ?>" class="wow fadeInDown" data-wow-delay="0.8s" alt="mockup"></li>
                            <?php } ?>

                            <?php if( ! empty($settings['bfive_animeeight']['url'])) { ?>
                                <li><img src="<?php echo  $settings['bfive_animeeight']['url'] ?>" class="wow fadeInDown" data-wow-delay="1s" alt="mockup"></li>
                            <?php } ?>

                            <?php if( ! empty($settings['bfive_animenine']['url'])) { ?>
                                <li><img src="<?php echo  $settings['bfive_animenine']['url'] ?>"  class="wow fadeInRight" alt="mockup"></li>
                            <?php } ?>
                            </ul>  
                        </div>
                        <!-- /.promo-mockup-five -->
                     
                    <?php  
                }            
                ?>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.banner-content-wrap -->
    </div><!-- /.container -->

    <?php if($settings['show_pertical']) { ?>
        <ul class="animate-particle">
            <li><img src="<?php echo  SAASPIK_PLUGIN_URL . 'elementor/images/banner5/ta1.png' ?>" alt="saaspik tryangle"></li>
            <li><img src="<?php echo  SAASPIK_PLUGIN_URL . 'elementor/images/banner5/ta4.png' ?>" alt="saaspik tryangle"></li>
            <li><img src="<?php echo  SAASPIK_PLUGIN_URL . 'elementor/images/banner5/ta2.png' ?>" alt="saaspik tryangle"></li>
            <li><img src="<?php echo  SAASPIK_PLUGIN_URL . 'elementor/images/banner5/ta3.png' ?>" alt="saaspik tryangle"></li>
            <li><img src="<?php echo  SAASPIK_PLUGIN_URL . 'elementor/images/banner5/cm1.png' ?>" alt="saaspik tryangle"></li>		
            <li><img src="<?php echo  SAASPIK_PLUGIN_URL . 'elementor/images/banner5/circle.png' ?>" data-parallax='{"y": -150, "x": 100}' alt="saaspik tryangle"></li>
            <li class="bubble"></li>
        </ul>
    <?php } ?>

    
    <?php if($settings['show_left_circle']) { ?>
        <div class="left-circle-shape">
            <span class="circle-fill"></span>
            <span class="circle-border"></span>
        </div>
    <?php } ?>
</div><!-- /.banner banner-one -->