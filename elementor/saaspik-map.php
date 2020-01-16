<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Saaspik_Map_Widget extends Widget_Base {

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
        return 'saaspik_google_map';
    }

    // public function get_id() {
    //    	return 'header-search';
    // }

    public function get_title() {
        return __( 'Saaspik Google Map', 'saaspik-addons' );
    }

    public function get_icon() {
        // Icon name from the Elementor font file, as per http://dtbaker.net/web-development/creating-your-own-custom-elementor-widgets/
        return 'eicon-google-maps';
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

    	/**
	 * Retrieve the list of scripts the image widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'gmap-api', 'gmap3' ];
	}

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Google Map', 'saaspik-addons' ),
            ]
        );

        $this->add_control(
            'latitude',
            [
                'label'       => __( 'Latitude', 'saaspik-addons' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => '40.712776',
                'description' => __( 'Type your google map latitude.', 'saaspik-addons' ),
                'label_block' => true
            ]
        );
        
        $this->add_control(
            'longitude',
            [
                'label'       => __( 'Longitude', 'saaspik-addons' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => '-74.005974',
                'description' => __( 'Type your google map longitude.', 'saaspik-addons' ),
                'label_block' => true
            ]
        );
        $this->add_control(
            'zoom',
            [
                'label'     => __( 'Zoom', 'saaspik-addons' ),
                'type'      => Controls_Manager::NUMBER,
				'min'       => 5,
				'max'       => 20,
				'step'      => 1,
				'default'   => 8,
            ]
        );
        $this->add_control(
            'marker',
			[
				'label' => __( 'Choose Map Marker', 'saaspik-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => plugins_url('images/map-marker.png', __FILE__)
				],
			]
        );

        $this->add_control(
			'map-height',
			[
				'label' => __( 'Map Height', 'saaspik-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'vh' ],
				'range' => [
					'px' => [
						'min' => 200,
						'max' => 1000,
						'step' => 5,
					],
					'vh' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 500,
				],
				'selectors' => [
					'{{WRAPPER}} .gmap3-area' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
        );
        
        $this->add_control(
			'scroll_wheel',
			[
				'label' => __( 'Scroll Wheel', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

           

        $this->end_controls_section();

        

    }

    protected function render( ) {
        $settings = $this->get_settings(); 
        $lat = $settings['latitude'];
        $lng = $settings['longitude'];
        $zoom = $settings['zoom'];
        $mker = $settings['marker'];
        $while = $settings['scroll_wheel'];

        $data_attr = "";
        
        if(! empty($lat)) {
            $data_attr .= ' data-lat="'.$lat.'"';
        }

        if(! empty($lng)) {
            $data_attr .= ' data-lng="'.$lng.'"';
        }

        if(! empty($zoom)) {
            $data_attr .= ' data-zoom="'.$zoom.'"';
        }
        if(! empty($mker['url'])) {
            $data_attr .= ' data-mrkr="'.$mker['url'].'"';
        }
        if(isset($while)) {
            $data_attr .= ' data-scrollwheel="'.$while.'"';
        }
   

        
        ?>
        <section id="google-maps">
            <div class="google-map">
                <?php 
                echo '<div class="gmap3-area" '.$data_attr.'>

                </div>';
                ?>
            </div><!-- /.google-map -->
        </section><!-- /#google-maps -->
        <?php
    }

    protected function _content_template() {}

}

