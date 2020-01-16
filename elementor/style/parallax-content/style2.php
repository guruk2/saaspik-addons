<div class="genera-informes">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 pix-order-one">

                <div class="section-title style-two">
                    <?php if(!empty($title)): ?>
                    <h2 <?php echo $this->get_render_attribute_string( 'title_text' ); ?>>
                        <?php echo $title;?></h2>
                    <?php endif; ?>

                    <?php if(!empty($sub_title)): ?>
                    <p <?php echo $this->get_render_attribute_string( 'sub_title' ); ?>>
                        <?php echo $sub_title; ?></p>
                    <?php endif; ?>
                </div>

                <?php if(! empty($item_list)) : ?>
                    <ul class="list-items wow pixFadeUp" data-wow-delay="0.4s">
                        <?php echo $item_list; ?>
                    </ul>
                <?php endif; ?>

                <?php if ( '' !== $settings['link']['url'] ) { ?>
                <a href="<?php echo esc_url($settings['link']['url']) ?>"
                    class="pix-btn btn-outline wow pixFadeUp" data-wow-delay="0.5s"><?php echo $title_btn; ?></a>
                <?php }
                    ?>

            </div><!-- /.col-lg-6 -->
            <?php if($settings['image_type'] == 'style1') { ?>
                <div class="informes-feature-image">

                    <div class="image-one" data-parallax='{"y" : 20}'>
                        <?php echo wp_get_attachment_image($settings['left_image']['id'], 'full', false, array('class' => 'img-fluid wow pixFadeDown')) ?>
                    </div>

                    <div class="image-two">
                        <div class="image-two-inner" data-parallax='{"y" : -20}'>
                            <?php echo wp_get_attachment_image($settings['right_image']['id'], 'full', false, array('class' => 'img-fluid wow pixFadeUp')) ?>
                        </div>
                    </div>
                </div>
            
            <?php } else { ?>
            <div class="col-lg-6">
                <div class="animaated-elements-two">
                    <img src="<?php echo SAASPIK_PLUGIN_URL . 'elementor/images/animate2/1.png' ?>" class="elm-one wow pixFade" alt="informes">
                    <img src="<?php echo SAASPIK_PLUGIN_URL . 'elementor/images/animate2/06.png' ?>" class="elm-two wow pixFadeDown" alt="informes">
                    <img src="<?php echo SAASPIK_PLUGIN_URL . 'elementor/images/animate2/3.png' ?>" class="elm-three wow pixFadeDown animated" alt="informes">
                    <img src="<?php echo SAASPIK_PLUGIN_URL . 'elementor/images/animate2/4.png' ?>" class="elm-four wow pixFadeRight" alt="informes">
                </div>
            </div>

            <?php } ?>
         
            <!-- <img src="<?php //echo SAASPIK_PLUGIN_URL . 'elementor/images/circle-shape.png' ?>" alt="circle"> -->


        </div>
    </div>
    <!-- /.container -->


    
    <?php if ( 'yes' === $settings['show_shape'] ) { ?>
        <?php if($settings['bg_image_shape_two']['url'] ) : ?>
        <div class="shape-bg wow pixFadeLeft">
            <img src="<?php echo $settings['bg_image_shape_two']['url'] ?>" class="wow fadeInRight" alt="shape-bg">
        </div>
        <?php endif; ?>
    <?php } ?>
</div>