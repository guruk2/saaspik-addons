<section class="interface">
    <div class="container">
        <div class="interface-toparea">
            <div class="row">
                <div class="col-lg-7 pix-order-one">
                    <div class="interface-content pt-7">
                        <div class="interface-title">
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
                        <!-- /.section-title style-two -->

                        <?php if ( !empty($settings['list_items']) ) {
                            echo '<ul class="list-items list-with-icon wow pixFadeUp">';
                                foreach (  $settings['list_items'] as $item ) {
                                    if( ! empty($item['list_title'] )) {
                                    echo '<li><i class="'.$item['icon'].'"></i>' . $item['list_title'] . '</li>';
                                    }		
                                }
                            echo '</ul>';
                        } ?>

                        <?php if ( '' !== $settings['link']['url'] ) { ?>
                            <a href="<?php echo esc_url($settings['link']['url']) ?>"
                                class="pix-btn btn-outline wow pixFadeUp" data-wow-delay="0.5s"><?php echo $title_btn; ?>
                            </a>
                        <?php } ?>

                    </div>
                    <!-- /.interface-content -->
                </div>
                <!-- /.col-lg-6 -->


                <div class="col-lg-5">
                    <div class="interface-image-wrapper style-one">
                        <div class="image-one wow fadeInDown">
                            <?php echo wp_get_attachment_image($settings['left_image']['id'], 'full', false, array('class' => 'img-fluid', 'data-parallax'=>'{"y" : 50}')) ?>
                        </div>

                        <div class="image-two wow fadeInUp">                           
                            <?php echo wp_get_attachment_image($settings['right_image']['id'], 'full', false, array('class' => 'img-fluid', 'data-parallax'=>'{"y" : -50}')) ?>
                        
                        </div>


                        <svg xmlns="http://www.w3.org/2000/svg" class="svgbg-one"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="700px" height="700px">
                            <path fill-rule="evenodd" opacity="0.102" fill="rgb(251, 201, 82)"
                                d="M350.000,-0.000 C543.300,-0.000 700.000,156.700 700.000,350.000 C700.000,543.299 543.300,700.000 350.000,700.000 C156.700,700.000 -0.000,543.299 -0.000,350.000 C-0.000,156.700 156.700,-0.000 350.000,-0.000 Z" />
                        </svg>
                    </div>
                    <!-- /.interface-image-wrapper -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.interface-toparea -->

        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-7">
                <div class="interface-image-wrapper style-two">      

                    <div class="image-one wow fadeInLeft">
                        <?php echo wp_get_attachment_image($settings['left_image_two']['id'], 'full', false, array('class' => 'img-fluid', 'data-parallax'=>'{"x" : 30}')) ?>
                    </div>

                    <div class="image-two wow fadeInRight">                        
                        <?php echo wp_get_attachment_image($settings['right_image_two']['id'], 'full', false, array('class' => 'img-fluid', 'data-parallax'=> '{"x" : -30}')) ?>
                        
                    </div>


                    <svg xmlns="http://www.w3.org/2000/svg" class="svgbg-two" xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="700px" height="700px">
                        <path fill-rule="evenodd" opacity="0.102" fill="rgb(82, 251, 237)"
                            d="M350.000,-0.000 C543.300,-0.000 700.000,156.700 700.000,350.000 C700.000,543.299 543.300,700.000 350.000,700.000 C156.700,700.000 -0.000,543.299 -0.000,350.000 C-0.000,156.700 156.700,-0.000 350.000,-0.000 Z" />
                    </svg>
                </div>
                <!-- /.interface-image-wrapper -->
            </div>
            <!-- /.col-lg-6 -->

            <div class="col-lg-5 pix-order-one">
                <div class="interface-content">

                    <div class="interface-title pixFadeUp">                 

                        <?php if(!empty($title_two)): ?>
                                <h2 <?php echo $this->get_render_attribute_string( 'title_text_two' ); ?>>
                                    <?php echo $title_two;?>
                                </h2>
                            <?php endif; ?>                       

                            <?php if(!empty($sub_title_two)): ?>
                                <p <?php echo $this->get_render_attribute_string( 'sub_title_two' ); ?>>
                                    <?php echo $sub_title_two; ?>
                                </p>
                            <?php endif; ?>


                    </div>
                    <!-- /.section-title style-two -->
 

                    <?php if ( !empty($settings['list_items_two']) ) {
                        echo '<ul class="list-items list-with-icon wow pixFadeUp">';
                            foreach (  $settings['list_items_two'] as $item ) {
                                if( ! empty($item['list_title_two'] )) {
                                echo '<li><i class="'.$item['icon_two'].'"></i>' . $item['list_title_two'] . '</li>';
                                }		
                            }
                        echo '</ul>';
                    } ?>


                    <?php if ( '' !== $settings['link_two']['url'] ) { ?>
                        <a href="<?php echo esc_url($settings['link_two']['url']) ?>"
                            class="pix-btn btn-outline wow pixFadeUp" data-wow-delay="0.5s"><?php echo $title_btn_two; ?>
                        </a>
                    <?php } ?>

                </div>
                <!-- /.interface-content -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
        
        <?php if($settings['show_separator']) { 
            if( '' !== $settings['right_image_two'] ) { 

            ?>
            <div class="border-wrap">
                <span class="ball" data-parallax='{"x" : -100}'></span>
                <!-- Generator: Adobe Illustrator 23.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                <svg version="1.1" id="animate-border" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 908.5 976.2"
                    style="enable-background:new 0 0 908.5 976.2;" xml:space="preserve">
                    <style type="text/css">
                        .st0 {
                            fill: #FFFFFF;
                        }

                        .st1 {
                            opacity: 5.000000e-02;
                        }

                        .st2 {
                            fill: #1A4A88;
                        }

                        .st3 {
                            opacity: 0.8;
                            fill: #EA7225;
                        }

                        .st4 {
                            fill: #D86928;
                        }

                        .st5 {
                            fill: #EA7225;
                        }

                        .st6 {
                            fill: #F89938;
                        }

                        .st7 {
                            fill: #FDFEFE;
                        }

                        .st8 {
                            opacity: 0.5;
                            fill: #EA7225;
                        }

                        .st9 {
                            opacity: 0.75;
                            fill: #EA7225;
                        }

                        .st10 {
                            fill: none;
                            stroke: #1A4A88;
                            stroke-width: 1.5;
                            stroke-miterlimit: 10;
                        }

                        .st11 {
                            opacity: 0.1;
                        }

                        .st12 {
                            opacity: 0.85;
                            fill: #EA7225;
                        }

                        .st13 {
                            opacity: 0.81;
                            fill: #EA7225;
                        }

                        .st14 {
                            opacity: 0.4;
                            fill: #EA7225;
                        }

                        .st15 {
                            opacity: 0.7;
                            fill: #EA7225;
                        }

                        .st16 {
                            fill: none;
                            stroke: #F0577E;
                            stroke-width: 2;
                            stroke-miterlimit: 10;
                        }

                        .st17 {
                            fill: none;
                            stroke: #F0577E;
                            stroke-width: 2;
                            stroke-miterlimit: 10;
                            stroke-dasharray: 3.9904, 5.9856;
                        }
                    </style>
                    <g>
                        <g>
                            <g>
                                <path class="st16" d="M8.4,908.7c0,0,0.6,0.4,1.7,1.1" />
                                <path class="st17 path" d="M15.2,912.9c36.7,22,207.6,117.4,147.2-44.2c-67.5-180.6-137.7-410.5,320-358
                                c457.7,52.5,448.6-207.4,383-331C808.1,71.8,725.1,26.6,704.9,16.8" />
                                <path class="st16" d="M702.2,15.5c-1.2-0.5-1.8-0.8-1.8-0.8" />
                            </g>
                        </g>
                    </g>
                </svg>
            </div>

            <?php 
            }
         } 
         ?>    


    </div>
    <!-- /.container -->
</section>
<!-- /.interface -->