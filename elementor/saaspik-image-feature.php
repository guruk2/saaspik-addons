<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Saaspik_Image_Feature extends Widget_Base {

    /**
    * Get widget name.
    *
    * Retrieve alert widget name.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string Widget name.
    */
    public function get_name() {
        return 'image-feature';
    }

    public function get_title() {
        return __( 'Saaspik Image with Feature', 'saaspik-addons' );
    }

    public function get_icon() {
        // Icon name from the Elementor font file, as per http://dtbaker.net/web-development/creating-your-own-custom-elementor-widgets/
        return 'eicon-image';
    }

    /**
    * Get widget categories.
    *
    * Retrieve the widget categories.
    *
    * @since 1.0.0
    * @access public
    *
    * @return array Widget categories.
    */
    public function get_categories() {
        return [ 'saaspik-elements' ];
    }


    

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Image With Feature', 'saaspik-addons' ),
            ]
        );

        $this->add_control(
            'feature_image', [
                'label' => __( 'Feature Image', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'Title', 'saaspik-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'saaspik-addons' ),
				'label_block' => true,
			]
        );
        
        $repeater->add_control(
			'feature_link',
			[
				'label' => __( 'Link', 'plugin-domain' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$repeater->add_control(
			'list_icon', [
				'label' => __( 'Icon Image', 'saaspik-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [				
					'url' => plugins_url('images/image_icon.png', __FILE__)
				],
				'show_label' => true,
			]
		);

		$repeater->add_control(
			'list_color',
			[
				'label' => __( 'Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'feature_list',
			[
				'label' => __( 'Feature List', 'saaspik-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Title #1', 'saaspik-addons' ),
						
					],
					[
						'list_title' => __( 'Title #2', 'saaspik-addons' ),
						
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();


        $this->start_controls_section(
			'section_button',
			[
				'label' => __( 'Background Shape', 'saaspik-addons' ),
			]
        );
        
        $this->add_control(
            'image_background', [
                'label' => __( 'Background One', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

		$this->end_controls_section();

    }

    protected function render( ) {

        $settings = $this->get_settings();
        $image_one = $settings['feature_image'];
        $feature_lists = $settings['feature_list'];
       

        ?>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <?php if( ! empty($image_one['url'] )) : ?>
                        <div class="feature-image-wrapper wow fadeInRight">
                            <img src="<?php echo esc_url( $image_one['url']); ?>" alt="Feature Image">
                        </div>
                        <!-- /.feature-image-wrapper -->
                    <?php endif; ?>
                </div>
                <!-- /.col-lg-5 -->

                <div class="col-lg-7">
                    <?php
                        foreach($feature_lists as $list) : 
                            $target = $list['feature_link']['is_external'] ? ' target="_blank"' : '';
                            $nofollow = $list['feature_link']['nofollow'] ? ' rel="nofollow"' : '';
                        
                        ?>

                        <div class="saaspik-icon-box-wrapper style-six wow pixFadeRight" data-wow-delay="0.4s">

                            <?php if( ! empty($list['list_icon'])) : ?>
                                <div class="saaspik-icon-box-icon elementor-repeater-item-<?php echo $list['_id']; ?>">
                                    <img src="<?php echo esc_url( $list['list_icon']['url'] ); ?>" alt="icon">
                                </div>
                            <?php endif;?>

                            <?php if( ! empty( $list['list_title'] ) ): ?>
                                <div class="saaspik-icon-box-content">
                                    <h3 class="elementor-repeater-<?php echo $list['_id']; ?> saaspik-icon-box-title">
                                    <?php if( ! empty($list['feature_link']['url'] )) : ?>
                                        <a class="elementor-repeater-item-<?php echo $list['_id']; ?>" href="<?php echo esc_url( $list['feature_link']['url']) ; ?>" class="title">
                                    <?php endif;?>

                                        <?php echo $list['list_title']; ?>
                                        
                                    <?php if( ! empty($list['feature_link']['url'] )) : ?>
                                        </a>
                                    <?php endif;?>
                                    </h3>
                                </div>
                            <?php endif;?>
                        </div>
                        <!-- /.saaspik-box style-six -->
                    <?php endforeach; ?>            
            
                </div>
                <!-- /.col-lg-7 -->
            </div>
        </div>
        <!-- /.container -->

        <?php
    }

    protected function _content_template() { ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <# if( settings.feature_image.url ) {  #>
                        <div class="feature-image-wrapper">
                            <img src="{{ settings.feature_image.url }}" alt="Feature Image">
                        </div>
                    <# } #>
                </div>
                <div class="col-lg-7">
                <# if ( settings.feature_list.length ) { #>         
                    
                    <# _.each( settings.feature_list, function( list ) {                     
                            var target = list.feature_link.is_external ? ' target="_blank"' : '';
                            var nofollow = list.feature_link.nofollow ? ' rel="nofollow"' : '';
                        #>
                        <div class="saaspik-icon-box-wrapper style-six">

                            <div class="saaspik-icon-box-icon elementor-repeater-item-{{ list._id }}">
                                <img src="{{{ list.list_icon.url }}}" alt="icon">
                            </div>

                            <div class="saaspik-icon-box-content">
                            
                                <h3 class="saaspik-icon-box-title elementor-repeater-item-{{ list._id }}">
                                    <# if( list.feature_link.url ) { #>
                                        <a class="elementor-repeater-item-{{ list._id }}" href="{{ list.feature_link.url }}">
                                    <# } #>

                                        {{{ list.list_title }}}

                                    <# if(list.feature_link.url ) { #>
                                        </a>
                                    <# } #>
                                </h3>
                            </div>
                        
                        </div>
                    <# }); #>
                    
                <# } #>
                </div>
            </div>
        </div>
        <!-- /.container -->
        <?php

    }   

}