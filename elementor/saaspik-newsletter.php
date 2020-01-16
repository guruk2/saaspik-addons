<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Saaspik_Newsletter extends Widget_Base {

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
        return 'saaspik_newsletter';
    }

    // public function get_id() {
    //    	return 'header-search';
    // }

    public function get_title() {
        return __( 'Saaspik Newsletter', 'saaspik-addons' );
    }

    public function get_icon() {
        // Icon name from the Elementor font file, as per http://dtbaker.net/web-development/creating-your-own-custom-elementor-widgets/
        return 'fa fa-paper-plane-o';
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
                'label' => __( 'Newsletter', 'saaspik-addons' ),
            ]
        );

        $this->add_control(

            'newsletter_style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'saaspik-addons'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'saaspik-addons'),
                    'style2' => esc_html__('Style 2', 'saaspik-addons'),               
                ]
            ]
        );

        $this->add_control(
			'title_text', [
				'label'			 => esc_html__( 'Heading Title', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXT,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Heading', 'saaspik-addons' ),                
			]
		);


		$this->add_control(
			'description_text', [
				'label'			 => esc_html__( 'Heading Description', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Description Text', 'saaspik-addons' ),
                'separator' => 'before',   
                'condition' => [
					'newsletter_style' => 'style1',
				],       	
			]
		);

        $this->end_controls_section();
 
  
        $this->start_controls_section(
            'content',
            [
                'label' => esc_html__('Content', 'saaspik-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,               
            ]
        );


		$this->add_control(
			'title_color', [
				'label'		 => esc_html__( 'Title Color', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .newsletter-content .title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .newsletter-content-two .title' => 'color: {{VALUE}};',
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(), [
            'name'		 => 'title_typography',
            'selector' => '
                {{WRAPPER}} .newsletter-content .title,               
                {{WRAPPER}} .newsletter-content-two .title',        
            ]			
        );
        
        $this->add_control(
			'subtitle_color', [
				'label'		 => esc_html__( 'Subtitle Color', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .newsletter-content-two p' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(), [
			'name'		 => 'subtitle_typography',
			'selector'	 => '{{WRAPPER}} .newsletter-content-two p',
			]
        );
        
        $this->add_control(
			'button_color', [
				'label'		 => esc_html__( 'Button Color', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
                    '{{WRAPPER}} .newsletter-form .newsletter-inner .newsletter-submit' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .newsletter-form-two .newsletter-inner .newsletter-submit' => 'color: {{VALUE}};',
                    
                ],
                'separator' => 'before',
			]
        );

        $this->add_control(
			'button_bg_color', [
				'label'		 => esc_html__( 'Button Background Color', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .newsletter-form .newsletter-inner .newsletter-submit' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .newsletter-form-two .newsletter-inner .newsletter-submit' => 'background: {{VALUE}};',
                ],
            
			]
        );
        
        
        $this->add_group_control(
			Group_Control_Typography::get_type(), [
			'name'		 => 'button_typography',
            'selector'	 => '
                {{WRAPPER}} .newsletter-form .newsletter-inner .newsletter-submit,
                {{WRAPPER}} .newsletter-form-two .newsletter-inner .newsletter-submit'
			]
        );
        
        $this->add_control(
			'button_color_hover', [
				'label'		 => esc_html__( 'Button Hove Color', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .newsletter-form .newsletter-inner .newsletter-submit:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .newsletter-form-two .newsletter-inner .newsletter-submit:hover' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
			]
        );

        $this->add_control(
			'button_bg_color_hover', [
				'label'		 => esc_html__( 'Button Bover Background Color', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .newsletter-form .newsletter-inner .newsletter-submit:hover' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .newsletter-form-two .newsletter-inner .newsletter-submit:hover' => 'background: {{VALUE}};',
                ],
            
			]
        );   
        
 
        
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_shape',
            [
                'label' => esc_html__('Baground Shape', 'saaspik-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,               
            ]
        );

        $this->add_control(
			'show_circle_shape',
			[
				'label' => __( 'Show Background', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
            'bg_image_shape', [
                'label' => esc_html__( 'Upload the Background shape image', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/circle12.png', __FILE__)
                ], 
                'condition' => [
                    'newsletter_style' => ['style1']
                ]          
            ]
        );
        $this->add_control(
            'bg_image_shape_two', [
                'label' => esc_html__( 'Upload the Background shape image', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/circle10.png', __FILE__)
                ], 
                'condition' => [
                    'newsletter_style' => ['style2']
                ]                 
            ]
        );

        $this->add_control(
            'bg_image_overlay', [
                'label' => esc_html__( 'Upload the Overlay Background image', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/map.png', __FILE__)
                ], 
                'condition' => [
                    'newsletter_style' => ['style2']
                ]          
            ]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Background', 'plugin-domain' ),
				'types' => [ 'classic', 'gradient' ],
				'default' => [ '#000'],
				'selector' => 
                    '{{WRAPPER}} .newsletter,
                    {{WRAPPER}} .newsletter-two'              
			]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Specing', 'saaspik-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'title_padding',
			[
				'label' => __( 'Padding', 'saaspik-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .newsletter-two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();      

    }

    protected function render( ) {
        $settings = $this->get_settings();
        $style = $settings[ 'newsletter_style' ];
        $title_text = $settings[ 'title_text' ];	
		$description_text = $settings[ 'description_text' ];


 

        $this->add_render_attribute( 'title_text', 'class','title');
        $this->add_inline_editing_attributes( 'title_text', 'none' );
        
        $this->add_render_attribute( 'description_text', 'class','description');
		$this->add_inline_editing_attributes( 'description_text' );

        require __DIR__ . '/style/newsletter/'.$style.'.php';
   
    }

}

