<div class="saaspik-icon-box-wrapper style-four">

<?php if($icon_type == 'icon_font'){  ?>
    <div class="saaspik-icon-box-icon">            	
        <<?php echo implode( ' ', [ $icon_tag, $icon_attributes, $link_attributes ] ); ?>>
            <i <?php echo $this->get_render_attribute_string( 'i' ); ?>></i>
        </<?php echo $icon_tag; ?>>
    </div>

        <?php } elseif( $icon_type == 'icon_img') {  ?>
            <div class="saaspik-icon-box-icon">
        <?php if(!empty($settings['icoimg']['url'])) : ?>
        <<?php echo implode( ' ', [ $icon_tag, $icon_attributes, $link_attributes ] ); ?>>
            <img class="icon-img" src="<?php echo esc_url($settings['icoimg']['url']) ?>" alt="<?php echo esc_attr($settings['title_text']); ?>">
        </<?php echo $icon_tag; ?>>
        </div>
        <?php endif; ?>
    <?php } ?>


    <?php if($has_content) : ?>
        <div class="saaspik-icon-box-content">
            <?php if(! empty($settings['title_text'])) : ?>
                <<?php echo $settings['title_size']; ?> class="saaspik-icon-box-title">
                    <<?php echo implode( ' ', [ $icon_tag, $link_attributes ] ); ?> <?php echo $this->get_render_attribute_string( 'title_text' ); ?>><?php echo $settings['title_text']; ?></<?php echo $icon_tag; ?>>
                </<?php echo $settings['title_size']; ?>>
              <?php endif; ?>

            <?php if(! empty($settings['description_text'])) : ?>
                <p <?php echo $this->get_render_attribute_string( 'description_text' ); ?>><?php echo $settings['description_text']; ?></p>
             <?php endif; ?>

            <?php if($settings['link_btn']) :?>
                <a class="more-btn" href="<?php echo $settings['link_btn']['url'] ?>">
                    <i class="ei ei-arrow_right"></i>
                </a>
            <?php endif; ?>

            <svg class="layer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="370px" height="270px">
                <path fill-rule="evenodd" fill="rgb(253, 248, 248)" d="M-0.000,269.999 L-0.000,-0.001 L370.000,-0.001 C370.000,-0.001 347.889,107.879 188.862,112.181 C35.160,116.338 -0.000,269.999 -0.000,269.999 Z" />
            </svg>
        </div>
    <?php endif; ?>
</div>