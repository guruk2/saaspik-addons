<?php

namespace Elementor;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


/**
 * Text Typing Effect
 *
 * Elementor widget for text typing effect.
 *
 * @since 1.7.0
 */
class Saaspik_Hero_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'saaspik-hero';
    }

    public function get_title()
    {
        return __('Hero Section', 'saaspik-addons');
    }

    public function get_icon()
    {
        return 'ei ei-icon_desktop';
    }

    public function get_categories()
    {
        return ['saaspik-elements'];
    }

    /**
     * Retrieve the list of scripts the image widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @return array Widget scripts dependencies.
     * @since 1.3.0
     * @access public
     *
     */
    public function get_script_depends()
    {
        return ['jquery-magnific-popup'];
    }


    protected function _register_controls()
    {

        // ----------------------------------------  Hero content ------------------------------
        $this->start_controls_section(
            'hero_content',
            [
                'label' => __('Hero content', 'saaspik-addons'),
            ]
        );

        $this->add_control(
            'style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'saaspik-addons'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'saaspik-addons'),
                    'style2' => esc_html__('Style 2', 'saaspik-addons'),
                    'style3' => esc_html__('Style 3', 'saaspik-addons'),
                    'style4' => esc_html__('Style 4', 'saaspik-addons'),
                    'style5' => esc_html__('Style 5', 'saaspik-addons'),
                ],
            ]
        );

        $this->add_control(
            'title_text',
            [
                'label' => esc_html__('Title text', 'saaspik-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Saas Software Landing is the Best Ever'
            ]
        );

        $this->add_control(
            'top_title_text',
            [
                'label' => esc_html__('Subtitle Top', 'saaspik-addons'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => "Welcome To Saspik",
                'condition' => array (
                    'style' => 'style5',
                )
            ]
        );
        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Description text', 'saaspik-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => "Why I say old chap that is spiffing bits and bobs chimney pot cracking goal bamboozled.!",
            ]
        );

        $this->add_control(

            'btn_style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'saaspik-addons'),
                'default' => 'pix-default',
                'options' => [
                    'btn-outline' => esc_html__('Outline', 'saaspik-addons'),
                    'btn-fill' => esc_html__('Btn Fill', 'saaspik-addons'),
                ],
                'default' => 'btn-fill',
               'condition' => [
                   'style' => ['style1', 'style2', 'style3', 'style5']
               ]
            ]
        );

        $this->add_control(
            'button_class',
            [
                'label' => esc_html__('Class', 'saaspik-btn'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__('Custom Class', 'saaspik-btn'),
                'condition' => [
                   'style' => ['style1', 'style2', 'style3', 'style5']
               ]
            ]

        );
        $this->add_control(
            'link_text',
            [
                'label' => esc_html__('Button Text', 'saaspik-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Get Started ', 'saaspik-addons'),
                'placeholder' => esc_html__('Get Started ', 'saaspik-addons'),
                'condition' => [
                    'style' => ['style1', 'style2', 'style3', 'style5']
                ]

            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'saaspik-addons'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('http://your-link.com', 'saaspik-addons'),
                'default' => [
                    'url' => '#',
                ],
               'condition' => [
                   'style' => ['style1', 'style2', 'style3', 'style5']
               ]
            ]
        );


        $this->add_control(
            'is_play_btn',
            [
                'label' => __('Play Button', 'saaspik-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'saaspik-addons'),
                'label_off' => __('No', 'saaspik-addons'),
                'return_value' => 'yes',
                'condition' => [
                    'style' => ['style3', 'style4']
                ]
            ]
        );

        $this->add_control(
            'play_btn_title', [
                'label' => __('Play Button Title', 'saaspik-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Watch Video',
                'condition' => [
                    'is_play_btn' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'play_url', [
                'label' => __('Video URL', 'saaspik-addons'),
                'description' => __('Enter here a YouTube video URL', 'saaspik-addons'),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'is_play_btn' => 'yes'
                ]
            ]
        );

        $this->add_responsive_control(
			'banner_content_align', [
				'label'			 =>esc_html__( 'Alignment', 'saaspik-addons' ),
				'type'			 => Controls_Manager::CHOOSE,
				'options'		 => [

					'left'		 => [
						'title'	 =>esc_html__( 'Left', 'saaspik-addons' ),
						'icon'	 => 'fa fa-align-left',
					],
					'center'	 => [
						'title'	 =>esc_html__( 'Center', 'saaspik-addons' ),
						'icon'	 => 'fa fa-align-center',
					],
					'right'		 => [
						'title'	 =>esc_html__( 'Right', 'saaspik-addons' ),
						'icon'	 => 'fa fa-align-right',
					],
					'justify'	 => [
						'title'	 =>esc_html__( 'Justified', 'saaspik-addons' ),
						'icon'	 => 'fa fa-align-justify',
					],
				],
				'default'		 => 'left',
                'selectors' => [
                    '{{WRAPPER}} .banner .banner-content' => 'text-align: {{VALUE}};'
				],
			]
        );

        $this->add_responsive_control(
			'banner_five_padding',
			[
				'label' => __( 'Padding', 'saaspik-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
                    ' {{WRAPPER}} .banner.banner-three .banner-content-wrap-two,
                    {{WRAPPER}} .banner.banner-four,
                    {{WRAPPER}} .banner.banner-five' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);        

        
        

        $this->add_responsive_control(
            'position_top_one',
            [
                'label' => __( 'Content Position Top/Bottom', 'saaspik-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 35,
                ],
                'selectors' => [
                    '{{WRAPPER}} .banner .banner-content-wrap,
                    {{WRAPPER}} .banner.banner-two .banner-content-wrap' => 'transform: translateY({{SIZE}}{{UNIT}});',
                ],
                'condition' => [
                    'style' => ['style1', 'style2']
                ]
            ]
        );


        $this->end_controls_section(); // End Hero content


        //-----------------------------------------------------
		// Featured Image
		//-----------------------------------------------------
        $this->start_controls_section(
            'fimage_sec', [
                'label' => __('Featured image', 'saaspik-addons'),
            ]
        );

        $this->add_control(
            'fimage', [
                'label' => esc_html__('Upload the featured image', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/macbook.png', __FILE__)
                ],
                'condition' => [
                    'style' => ['style1', 'style3']
                ]
            ]
        );

        $this->add_control(
            'fimagefour', [
                'label' => esc_html__('Upload the featured image', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/macbook.png', __FILE__)
                ],
                'condition' => [
                    'style' => ['style4']
                ]
            ]
        );

        $this->add_control(
            'feature_type', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Feature Image Type', 'saaspik-addons'),
                'default' => 'animate_mockup',
                'options' => [
                    'image_type' => esc_html__('Featured Image', 'saaspik-addons'),
                    'animate_mockup' => esc_html__('Animated Promo', 'saaspik-addons'),
                ],
                'condition' => [
                    'style' => ['style2', 'style5']
                ]
            ]
        );

        $this->add_control(
            'fimagetwo', [
                'label' => esc_html__('Upload the featured image', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/vector.png', __FILE__)
                ],
                'condition' => [
                    'feature_type' => ['image_type'],
                    'style' => ['style2', 'style5']
                ]
            ]
        );

        /**
         * Banner Two Animation Element Images
         */

        $this->add_control(
            'animeone', [
                'label' => esc_html__('Upload Image One', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/banner/01.png', __FILE__)
                ],
                'condition' => [
                    'feature_type' => ['animate_mockup'],
                    'style' => ['style2']
                ]
            ]
        );

        $this->add_control(
            'animetwo', [
                'label' => esc_html__('Upload Image Two', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/banner/02.png', __FILE__)
                ],
                'condition' => [
                    'feature_type' => ['animate_mockup'],
                    'style' => ['style2']
                ]
            ]
        );

        $this->add_control(
            'animethree', [
                'label' => esc_html__('Upload Image Three', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/banner/03.png', __FILE__)
                ],
                'condition' => [
                    'feature_type' => ['animate_mockup'],
                    'style' => ['style2']
                ]
            ]
        );

        $this->add_control(
            'animefour', [
                'label' => esc_html__('Upload Image Four', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/banner/04.png', __FILE__)
                ],
                'condition' => [
                    'feature_type' => ['animate_mockup'],
                    'style' => ['style2']
                ]
            ]
        );

        $this->add_control(
            'animefive', [
                'label' => esc_html__('Upload Image Five', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/banner/05.png', __FILE__)
                ],
                'condition' => [
                    'feature_type' => ['animate_mockup'],
                    'style' => ['style2']
                ]
            ]
        );

        $this->add_control(
            'animesix', [
                'label' => esc_html__('Upload Image Six', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/banner/06.png', __FILE__)
                ],
                'condition' => [
                    'feature_type' => ['animate_mockup'],
                    'style' => ['style2']
                ]
            ]
        );

        
        $this->add_control(
            'animeseven', [
                'label' => esc_html__('Upload Image Seven', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/banner/07.png', __FILE__)
                ],
                'condition' => [
                    'feature_type' => ['animate_mockup'],
                    'style' => ['style2']
                ]
            ]
        );





        /**
         * Banner Five Animation Element Images
         */

        $this->add_control(
            'bfive_animeone', [
                'label' => esc_html__('Upload Image One', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/banner5/1.png', __FILE__)
                ],
                'condition' => [
                    'feature_type' => ['animate_mockup'],
                    'style' => ['style5']
                ]
            ]
        );

        $this->add_control(
            'bfive_animetwo', [
                'label' => esc_html__('Upload Image Two', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/banner5/2.png', __FILE__)
                ],
                'condition' => [
                    'feature_type' => ['animate_mockup'],
                    'style' => ['style5']
                ]
            ]
        );

        $this->add_control(
            'bfive_animethree', [
                'label' => esc_html__('Upload Image Three', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/banner5/3.png', __FILE__)
                ],
                'condition' => [
                    'feature_type' => ['animate_mockup'],
                    'style' => ['style5']
                ]
            ]
        );

        $this->add_control(
            'bfive_animefour', [
                'label' => esc_html__('Upload Image Four', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/banner5/4.png', __FILE__)
                ],
                'condition' => [
                    'feature_type' => ['animate_mockup'],
                    'style' => ['style5']
                ]
            ]
        );

        $this->add_control(
            'bfive_animefive', [
                'label' => esc_html__('Upload Image Five', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/banner5/5.png', __FILE__)
                ],
                'condition' => [
                    'feature_type' => ['animate_mockup'],
                    'style' => ['style5']
                ]
            ]
        );

        $this->add_control(
            'bfive_animesix', [
                'label' => esc_html__('Upload Image Six', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/banner5/6.png', __FILE__)
                ],
                'condition' => [
                    'feature_type' => ['animate_mockup'],
                    'style' => ['style5']
                ]
            ]
        );

        
        $this->add_control(
            'bfive_animeseven', [
                'label' => esc_html__('Upload Image Seven', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/banner5/7.png', __FILE__)
                ],
                'condition' => [
                    'feature_type' => ['animate_mockup'],
                    'style' => ['style5']
                ]
            ]
        );
        $this->add_control(
            'bfive_animeeight', [
                'label' => esc_html__('Upload Image Eight', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/banner5/8.png', __FILE__)
                ],
                'condition' => [
                    'feature_type' => ['animate_mockup'],
                    'style' => ['style5']
                ]
            ]
        );
        $this->add_control(
            'bfive_animenine', [
                'label' => esc_html__('Upload Image Nine', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/banner5/9.png', __FILE__)
                ],
                'condition' => [
                    'feature_type' => ['animate_mockup'],
                    'style' => ['style5']
                ]
            ]
        ); 

        $this->end_controls_section(); // End Featured image

        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         */
        $this->start_controls_section(
            'style_title', [
                'label' => __('Title', 'saaspik-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_prefix', [
                'label' => __('Text Color', 'saaspik-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .banner h2' => 'color: {{VALUE}};'                 
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_prefix',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner h2'
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_prefix',
                'selector' => '{{WRAPPER}} .banner h2',
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style Subtitle ------------------------------
        $this->start_controls_section(
            'style_subtitle_top', [
                'label' => __('Subtitle Top', 'saaspik-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => array (
                    'style' => 'style5'
                )
            ]
        );

        $this->add_control(
            'color_subtitle_top', [
                'label' => __('Text Color', 'saaspik-addons'),
                'type' => Controls_Manager::COLOR,            
                'selectors' => [
                    '{{WRAPPER}} .banner.banner-five .banner-content-wrap-five .banner-content .sub-title' => 'color: {{VALUE}};'                 
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_subtitle_top',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '
                    {{WRAPPER}} .banner.banner-five .banner-content-wrap-five .banner-content .sub-title',
            ]
        );

        $this->end_controls_section();


        //------------------------------ Style Subtitle ------------------------------
        $this->start_controls_section(
            'style_subtitle', [
                'label' => __('Subtitle', 'saaspik-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_subtitle', [
                'label' => __('Text Color', 'saaspik-addons'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .banner .banner-content p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .banner.banner-four .banner-content .description' => 'color: {{VALUE}};',    
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_subtitle',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .banner p',
            ]
        );

        $this->end_controls_section();

        // Style Button
        // =====================

        $this->start_controls_section(
            'style_button', [
                'label' => __('Button', 'saaspik-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
			'style_tabs_button'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => __( 'Normal', 'saaspik-addons' ),
			]
		);

        $this->add_control(
            'button_text_color', [
                'label' => __('Text Color', 'saaspik-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner .banner-content .banner-btn, 
                    {{WRAPPER}} .newsletter-form-banner .newsletter-inner button' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'button_bg_color', [
                'label' => __('Background Color', 'saaspik-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner .banner-content .banner-btn,
                    {{WRAPPER}} .newsletter-form-banner .newsletter-inner button,
                    {{WRAPPER}} .banner.banner-five .banner-content-wrap-five .banner-content .banner-btn' => 'background: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'label' => __( 'Border', 'saaspik-addons' ),
                'selectors' => [
                    '{{WRAPPER}} .banner .banner-content .banner-btn,
                    {{WRAPPER}} .newsletter-form-banner .newsletter-inner button',
                ]
			]
        );
        
        $this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspik-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
                    '{{WRAPPER}} .banner .banner-content .banner-btn,
                    {{WRAPPER}} .newsletter-form-banner .newsletter-inner button,
                    {{WRAPPER}} .banner.banner-five .banner-content-wrap-five .banner-content .banner-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
        );
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
                'label' => __( 'Box Shadow', 'saaspik-addons' ),
                'selectors' => [
                    '{{WRAPPER}} .banner .banner-content .banner-btn,
                    {{WRAPPER}} .newsletter-form-banner .newsletter-inner button'
                ]				
                
			]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_button',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selectors' => [
                    '{{WRAPPER}} .banner .banner-content .banner-btn,
                    {{WRAPPER}} .newsletter-form-banner .newsletter-inner button'
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
			'style_button_hover_tab',
			[
				'label' => __( 'Hover', 'saaspik-addons' ),
			]
		);

        $this->add_control(
            'button_hover_text_color', [
                'label' => __('Hover Text Color', 'saaspik-addons'),
                'type' => Controls_Manager::COLOR,

                'selectors' => [
                    '{{WRAPPER}} .banner .banner-content .banner-btn:hover,
                    {{WRAPPER}} .newsletter-form-banner .newsletter-inner button:hover' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color', [
                'label' => __('Hover Background Color', 'saaspik-addons'),
                'type' => Controls_Manager::COLOR,

                'selectors' => [
                    '{{WRAPPER}} .banner .banner-content .banner-btn:hover,
                    {{WRAPPER}} .newsletter-form-banner .newsletter-inner button:hover' => 'background-color: {{VALUE}};'
                ],
            ]
        ); 

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_hover_border',
				'label' => __( 'Border', 'saaspik-addons' ),
                'selectors' => [
                    '{{WRAPPER}} .banner .banner-content .banner-btn:hover,
                    {{WRAPPER}} .newsletter-form-banner .newsletter-inner button:hover'
                ]
			]
        );
        
        $this->add_control(
			'button_hover_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspik-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
                    '{{WRAPPER}} .banner .banner-content .banner-btn:hover,
                    {{WRAPPER}} .newsletter-form-banner .newsletter-inner button:hover,
                    {{WRAPPER}} .banner.banner-five .banner-content-wrap-five .banner-content .banner-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_hover_box_shadow',
                'label' => __( 'Box Shadow', 'saaspik-addons' ),
                'selector' => '{{WRAPPER}} .banner .banner-content .banner-btn:hover'
				
                
			]
		);


        $this->end_controls_tabs();


        $this->end_controls_section();


        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __('Background', 'saaspik-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        
        /**
         * Banner One Background Shape
         */
        $this->add_control(
            'bg_image_shape', [
                'label' => esc_html__('Background Bottom Shape Image', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape-bg.png', __FILE__)
                ],
                'condition' => [
                    'style' => ['style1']
                ]

            ]
        ); 
        
        
        $this->add_control(
            'circle_more_options',
            [
                'label' => __( 'Animated Circle Shape', 'saaspik-addons' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'bg_shape_circle', [
                'label' => esc_html__('Background Circle Shape', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/circle-shape.png', __FILE__)
                ], 
                'condition' => [
                    'style' => 'style1'
                ]               

            ]
        );

        $this->add_control(
            'bg_shape_circle_three', [
                'label' => esc_html__('Background Shape Left', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/circle4.png', __FILE__)
                ], 
                'condition' => [
                    'style' => 'style3'
                ]               

            ]
        );

        $this->add_control(
            'bg_shape_circle_three2', [
                'label' => esc_html__('Background Shape Right', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape2.png', __FILE__)
                ], 
                'condition' => [
                    'style' => 'style3'
                ]               

            ]
        );

        $this->add_control(
            'bg_shape_four_bottom', [
                'label' => esc_html__('Background Shape Bottom', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/banner-three-shape.png', __FILE__)
                ], 
                'condition' => [
                    'style' => 'style4'
                ]               

            ]
        );


        $this->add_responsive_control(
            'position_top',
            [
                'label' => __( 'Position Top/Bottom', 'saaspik-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => -20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .banner.banner-one .circle-shape' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'style' => 'style1'
                ]
            ]
        );
        
        $this->add_responsive_control(
            'position_left',
            [
                'label' => __( 'Position Left/Right', 'saaspik-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => -13,
                ],
                'selectors' => [
                    '{{WRAPPER}} .banner.banner-one .circle-shape' => 'left: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'style' => 'style1'
                ]
            ]
        );

        /**
         * Banner Two Background Shape
         */
        $this->add_control(
            'bg_image_shape_two', [
                'label' => esc_html__('Background Bottom Shape Image', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/top_shape.png', __FILE__)
                ],
                'condition' => [
                    'style' => ['style2']
                ]

            ]
        );

        /**
         * Banner Five Background Shape
         */
        $this->add_control(
            'bg_image_shape_five', [
                'label' => esc_html__('Background Bottom Shape Image', 'saaspik-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape_bg2.png', __FILE__)
                ],
                'condition' => [
                    'style' => ['style5']
                ]

            ]
        );

        $this->add_control(
			'show_pertical',
			[
				'label' => __( 'Show Pertical Animation', 'saaspik-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'saaspik-addons' ),
				'label_off' => __( 'Hide', 'saaspik-addons' ),
				'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'style' => ['style5']
                ]

			]
        );     

        $this->add_control(
			'show_left_circle',
			[
				'label' => __( 'Show Left Circle', 'saaspik-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'saaspik-addons' ),
				'label_off' => __( 'Hide', 'saaspik-addons' ),
				'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'style' => ['style5']
                ]

			]
        );     
    

        $this->add_control(
            'section_color_left', [
                'label' => esc_html__('Background Color', 'saaspik-addons'),
                'type' => Controls_Manager::COLOR,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __('Background', 'saaspik-addons'),
                'types' => ['classic', 'gradient'],              
                'selector' =>
                    '{{WRAPPER}} .banner.banner-one,
                    {{WRAPPER}} .banner.banner-two,
                    {{WRAPPER}} .banner.banner-three,
                    {{WRAPPER}} .banner.banner-five,
                    {{WRAPPER}} .banner.banner-four'
            ]
        );

        $this->add_control(
			'bg_more_options',
			[
				'label' => __( 'Circle Shape', 'saaspik-addons' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'style' => ['style5'],
                    'show_left_circle' => 'yes'
                ]
			]
        );


        $this->add_responsive_control(
            'position_top_five',
            [
                'label' => __( 'Position Top/Bottom', 'saaspik-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 35,
                ],
                'selectors' => [
                    '{{WRAPPER}} .left-circle-shape' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'style' => 'style5',
                    'show_left_circle' => 'yes'
                ]
            ]
        );

        $this->add_responsive_control(
            'position_left_five',
            [
                'label' => __( 'Position Left/Right', 'saaspik-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .left-circle-shape' => 'left: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'style' => 'style5',
                    'show_left_circle' => 'yes'
                ]
            ]
        );
        
        $this->add_control(
			'bg_circle_color',
			[
				'label' => __( 'Circle Background', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .left-circle-shape .circle-fill' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'style' => ['style5'],
                    'show_left_circle' => 'yes'
                ]
			]
		);
        $this->add_control(
			'bg_circle_border_color',
			[
				'label' => __( 'Circle Border Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .left-circle-shape .circle-border' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'style' => ['style5'],
                    'show_left_circle' => 'yes'
                ]
			]
        );
      
        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings();
        $style = $settings['style'];
        $btn_class = $settings['button_class'];
        $btn_style = ($btn_class != '') ? $settings['btn_style'] . ' ' . $btn_class : $settings['btn_style'];
        // $link_text = $settings['link_text'];
        $btn_target = ($settings['link']['is_external']) ? '_blank' : '_self';
        $link = $settings['link'];
        $button = $settings['play_url'];
        $button_play = $settings['is_play_btn'];
        $feature_type = $settings['feature_type'];


        $this->add_render_attribute('title_text', [
            'class' => ['banner-title wow pixFadeUp'],
            'data-wow-delay' => '0.1s',
        ]);
        $this->add_inline_editing_attributes('title_text');

        $this->add_render_attribute('top_title_text', [
            'class' => ['sub-title wow fadeInUp'],
            'data-wow-delay' => '0.1s',
        ]);
        $this->add_inline_editing_attributes('top_title_text');


        $this->add_render_attribute('subtitle', [
            'class' => ['description', 'wow', 'pixFadeUp'],
            'data-wow-delay' => '0.3s',
        ]);
        $this->add_inline_editing_attributes('subtitle');


        $this->add_render_attribute('link', [
            'class' => ['pix-btn', 'banner-btn', 'wow', 'pixFadeUp', $btn_style],
            'href' => $settings['link']['url'],
            'target' => $btn_target,

        ]);


        $this->add_render_attribute('link_two', [
            'class' => ['pix-btn', 'banner-btn', 'color-two', 'wow', 'pixFadeUp', $btn_style],
            'href' => $link,
            'target' => $btn_target,
            'data-wow-delay' => '0.5s',
        ]);

        $this->add_inline_editing_attributes('link_text');


        require __DIR__ . '/style/banner/' . $style . '.php';
    }


}