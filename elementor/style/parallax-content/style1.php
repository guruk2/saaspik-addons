<div class="editor-design">
    <div class="container">
        <div class="row">


        <?php if($settings['image_type'] == 'style1') { ?>
            <div class="editure-feature-image">
                <div class="image-one" data-parallax='{"x" : 30}'>
                    <?php echo wp_get_attachment_image($settings['left_image']['id'], 'full', false, array('class' => 'img-fluid wow pixFadeRight')) ?>

                </div>
                <div class="image-two">
                    <div class="image-two-inner" data-parallax='{"x" : -30}'>
                        <?php echo wp_get_attachment_image($settings['right_image']['id'], 'full', false, array('class' => 'img-fluid wow pixFadeLeft')) ?>
                    </div>
                </div>
            </div>

            <?php } else { ?>
            <div class="col-lg-6">

                <div class="editure-feature-image-two">
                    <div class="animaated-elements">
                        <img src="<?php echo SAASPIK_PLUGIN_URL . 'elementor/images/animate1/01.png' ?>" alt="main-bg" class="main-bg wow pixFade">
                        <img src="<?php echo SAASPIK_PLUGIN_URL . 'elementor/images/animate1/02.png' ?>" alt="main-bg" class="elm-clock wow pixFadeLeft">
                        <img src="<?php echo SAASPIK_PLUGIN_URL . 'elementor/images/animate1/03.png' ?>" alt="elm-man" class="elm-man wow pixFadeRight" data-wow-delay="0.7s">
                        <img src="<?php echo SAASPIK_PLUGIN_URL . 'elementor/images/animate1/04.png' ?>" alt="elm-table" class="elm-table wow pixFadeUp" data-wow-delay="0.1s">
                        <img src="<?php echo SAASPIK_PLUGIN_URL . 'elementor/images/animate1/05.png' ?>" alt="main-bg" class="elm-sm-vase wow pixFade" data-wow-delay="0.9s">
                        <img src="<?php echo SAASPIK_PLUGIN_URL . 'elementor/images/animate1/06.png' ?>" alt="elm-vase" class="elm-vase wow pixFadeLeft" data-wow-delay="0.9s">
                        <div class="elm-mass wow pixFadeDown" data-wow-delay="1s">
                            <img src="<?php echo SAASPIK_PLUGIN_URL . 'elementor/images/animate1/07.png' ?>" alt="massage" class="mass-img">
                        </div>
                    </div>
                    <!-- /.animaated-elements -->
                     </div>
                </div>

            <?php } ?>


            <div class="col-lg-6 <?php echo $settings['image_type'] == 'style1' ? 'offset-lg-6' : '' ?>">
                <div class="editor-content">
                    <div class="section-title style-two">
                        <?php if(!empty($title)): ?>
                        <h2 <?php echo $this->get_render_attribute_string( 'title_text' ); ?>>
                            <?php echo $title;?>
                        </h2>
                        <?php endif; ?>

                        <?php if(!empty($sub_title)): ?>
                        <p <?php echo $this->get_render_attribute_string( 'sub_title' ); ?>>
                            <?php echo $sub_title; ?>
                        </p>
                        <?php endif; ?>
                    </div>

                    <div class="description-content wow pixFadeUp" data-wow-delay="0.5s">
                        <?php if(!empty($description_text)): ?>
                        <p <?php echo $this->get_render_attribute_string( 'description_text' ); ?>>
                            <?php echo $description_text; ?></p>
                        <?php endif; ?>

                        <?php if ( '' !== $settings['link']['url'] ) { ?>
                        <a href="<?php echo esc_url($settings['link']['url']) ?>"
                            class="pix-btn"><?php echo $title_btn; ?></a>
                        <?php } ?>
                    </div>
                </div><!-- /.editor-content -->
            </div><!-- /.col-lg-6 -->
        </div>
    </div>



    <?php if ( 'yes' === $settings['show_shape'] ) { ?>
        <?php if($settings['bg_image_shape']['url'] ) : ?>
        <div class="shape-bg">
            <img src="<?php echo $settings['bg_image_shape']['url'] ?>" class="wow fadeInLeftt" alt="shape-bg">
        </div>
        <?php endif; ?>
    <?php } ?>




    <!-- /.container -->
</div>