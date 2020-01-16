<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Saaspik_Image_With_Background extends Widget_Base {

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
        return 'image';
    }

    // public function get_id() {
    //    	return 'header-search';
    // }

    public function get_title() {
        return __( 'Saaspik Image with Parallax', 'saaspik-addons' );
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
                'label' => __( 'Content', 'saaspik-addons' ),
            ]
        );

        $this->add_control(
            'image_style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'saaspik-addons'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'saaspik-addons'),
                    'style2' => esc_html__('Style 2', 'saaspik-addons'),                   
                    'style3' => esc_html__('Style 3', 'saaspik-addons'),                  
                  
                ],
            ]
        );


        $this->add_control(
            'image_one', [
                'label' => __( 'Image One', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'image_two', [
                'label' => __( 'Image Two', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
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
            'image_sgape_one', [
                'label' => __( 'Background One', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'image_sgape_two', [
                'label' => __( 'Background Two', 'saaspik-addons' ),
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
        $image_one = $settings['image_one'];
        $image_two = $settings['image_two'];
        $image_style = $settings['image_style'];
        require __DIR__.'/style/image-shape/'.$image_style.'.php';

    }
    protected function _content_template() {}     

}