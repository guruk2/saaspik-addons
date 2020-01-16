<div class="saaspik-icon-box-wrapper style-five">

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
                    <?php echo $settings['more_link_text']; ?>
                    <i class="ei ei-arrow_right"></i>
                    
                </a>
            <?php endif; ?>

        </div>
    <?php endif; ?>
</div>
