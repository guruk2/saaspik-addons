<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;



/**
 * Text Typing Effect
 *
 * Elementor widget for text typing effect.
 *
 * @since 1.7.0
 */
class Saaspik_Parallax_Images extends Widget_Base {

    public function get_name() {
        return 'saaspik_parallax_images';
    }

    public function get_title() {
        return __( 'Saaspik Images With Content', 'saaspik-addons' );
    }

    public function get_icon() {
        return 'eicon-featured-image';
    }

    public function get_categories() {
        return [ 'saaspik-elements' ];
    }

    protected function _register_controls() {


        /**
         * Style Tab
         */
        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'contents', [
                'label' => __( 'Saaspik Images With Content', 'saaspik-addons' ),
            ]
        );

        $this->add_control(

            'content_style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'saaspik-addons'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'saaspik-addons'),
                    'style2' => esc_html__('Style 2', 'saaspik-addons'),                 
                ],
            ]
		);
		
		$this->add_control(
			'more_options',
			[
				'label' => __( 'Additional Options', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(

            'image_type', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Image Type', 'saaspik-addons'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Static Parallax Image', 'saaspik-addons'),
                    'style2' => esc_html__('Fixed Animate Image', 'saaspik-addons'),                 
                ],
            ]
		);
	

		$this->add_control(
			'left_image',
			[
				'label' => __( 'Left Image', 'plugin-domain' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'image_type' => 'style1'
				]
			]
		);

		$this->add_control(
			'right_image',
			[
				'label' => __( 'Right Image Image', 'plugin-domain' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'image_type' => 'style1'
				]
			]
		);


		$this->add_control(
			'content_heading',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        
		$this->add_control(
			'title_text', [
				'label'			 => esc_html__( 'Heading Title', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Heading Title', 'saaspik-addons' ),
				'default'		 => esc_html__( 'Genera informes  completos con un solo', 'saaspik-addons' ),
			]
		);
 
		$this->add_control(
			'sub_title', [
				'label'			 => esc_html__( 'Heading Sub Title', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Sub Title', 'saaspik-addons' ),
				'default'		 => 'Burke blow off arse gutted mate what a plonker cup of tea fantastic get stuffed mate.!',
				'separator' => 'none',
			]
		);


		$this->add_control(
			'description_text', [
				'label'			 => esc_html__( 'Heading Description', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Description Text', 'saaspik-addons' ),
				'default'		 => 'The bees knees off his nut cack its all gone to pot tinkety tonk old fruit blow off, tosser codswallop I chinwag. Brilliant bobby haggle James Bond tickety-boo horse play is spend a penny gutted mate absolutely.!',
                'rows'           => 10,
                'condition' => [
                    'content_style' => ['style1']
                ]
			]
        );
		$this->add_control(
			'list_items', [
				'label' => __( 'List items', 'saaspik-addons' ),
                'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				// 'default' => 'Quick Access',
                'condition' => [
                    'content_style' => ['style2']
                ]               
            ]           

        );

        $this->add_control(
			'link',
			[
				'label' => __( 'Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
				'separator' => 'before',
			]
        );
        
        $this->add_control(
			'link_title',
			[
				'label' => __( 'Button Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => 'http://your-link.com',
                'default'      => 'Learn More',
				'separator' => 'before',
			]
		);

        $this->add_responsive_control(
			'title_align', [
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
                    '{{WRAPPER}} .section-title' => 'text-align: {{VALUE}};'
				],
			]
		);
        
        $this->end_controls_section();

        //------------------------------ Style Section ------------------------------
        //Title Style Section
		$this->start_controls_section(
			'section_title_style', [
				'label'	 => esc_html__( 'Title', 'saaspik-addons' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color_one', [
				'label'		 =>esc_html__( 'Title color', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .section-title.style-two .title' => 'color: {{VALUE}};'
				],
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(), [
			'name'		 => 'title_typography',
			'selector'	 => '{{WRAPPER}} .section-title.style-two .title',
			]
		);

		$this->add_responsive_control(
		
			'margin',
			[
				'label' => __( 'Margin', 'plugin-domain' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .genera-informes .section-title.style-two' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		//Subtitle Style Section
		$this->start_controls_section(
			'section_subtitle_style', [
				'label'	 => esc_html__( 'Sub Title', 'saaspik-addons' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'content_style' => ['style1']
                ],
			]
		);

		$this->add_control(
			'subtitle_color', [
				'label'		 => esc_html__( 'Color', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
			'name'		 => 'subtitle_typography',
			'selector'	 => '{{WRAPPER}} .section-title  p',
			]
        );
        
        $this->end_controls_section();

		//Button Style
		$this->start_controls_section(
			'section_button_outline', [
				'label'	 => esc_html__( 'Button', 'saaspik-addons' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
				'condition' => [
                    'content_style' => ['style1']
                ],
			]
		);

		$this->add_control(
			'button_color_line', [
				'label'		 => esc_html__( 'Color', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .description-content .pix-btn' => 'color: {{VALUE}};',
				],
			]
        );
        
        
		$this->add_control(
			'button_background_line', [
				'label'		 => esc_html__( 'Background', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .description-content .pix-btn' => 'background: {{VALUE}};',
				],
			]
        );


        
        // $this->add_control(
		// 	'button_border_line', [
		// 		'label'		 => esc_html__( 'Border', 'saaspik-addons' ),
		// 		'type'		 => Controls_Manager::COLOR,
		// 		'selectors'	 => [
		// 			'{{WRAPPER}} .description-content .pix-btn' => 'border-volor: {{VALUE}};',
		// 		],
		// 	]
		// );

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_shadow',
				'selector' => '{{WRAPPER}} .description-content .pix-btn',
			]
        ); 

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
			'name'		 => 'button_typography',
			'selector'	 => '{{WRAPPER}} .description-content .pix-btn',
			]
        );
        
        $this->end_controls_section();

		//Button Style Outline
		$this->start_controls_section(
			'section_button_style', [
				'label'	 => esc_html__( 'Button', 'saaspik-addons' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'content_style' => ['style2']
                ],
			]
		);

		$this->add_control(
			'button_color', [
				'label'		 => esc_html__( 'Color', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .pix-btn' => 'color: {{VALUE}};',
				],
			]
        );
        
        
		$this->add_control(
			'button_background', [
				'label'		 => esc_html__( 'Background', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .pix-btn' => 'background: {{VALUE}};',
				],
			]
        );
        
        $this->add_control(
			'button_border', [
				'label'		 => esc_html__( 'Border', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .pix-btn' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
			'name'		 => 'button_typography_line',
			'selector'	 => '{{WRAPPER}} .genera-informes .pix-btn',
			]
        );

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'saaspik-addons' ),
				'selector' => '{{WRAPPER}} .genera-informes .pix-btn.btn-outline:hover',
			]
		);
        
        $this->end_controls_section();

        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Background', 'saaspik-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
		);
		
		
        $this->add_control(
            'show_shape',
            [
                'type' => Controls_Manager::SWITCHER,
                'label' => esc_html__('Show Background Shape', 'saaspik-addons'),
                'label_block'       => false,
                'default' => 'label_off',
                'label_on' => esc_html__( 'Yes', 'saaspik-addons' ),
                'label_off' => esc_html__( 'No', 'saaspik-addons' ),
            ]
        );

        $this->add_control(
            'bg_image_shape', [
                'label' => esc_html__( 'Background Bottom Shape Image', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape_bg.png', __FILE__)
				], 
				'condition' => [
					'show_shape' => 'yes',
					'content_style' => 'style1'
                ],            
            
            ]
        );

        $this->add_control(
            'bg_image_shape_two', [
                'label' => esc_html__( 'Background Bottom Shape Image', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/shape.png', __FILE__)
				],  
				'condition' => [
                    'show_shape' => 'yes',
                    'content_style' => 'style2'
                ],              
            
            ]
		); 
		
		$this->end_controls_section();	


    }

    protected function render()  {
        $settings = $this->get_settings(); 
        $title = $settings[ 'title_text' ];
        $title_btn = $settings[ 'link_title' ];
		$sub_title = $settings[ 'sub_title' ];
		$title_align = $settings[ 'title_align' ];
        $description_text = $settings[ 'description_text' ];
        $style = $settings['content_style'];
        $item = $settings[ 'list_items' ];
        $listitem = explode("\n", $item);

        $item_list = '';

        foreach($listitem as $item) {
            $item = esc_html($item);
            $item_list .= "<li>{$item}</li>";
        }
        

        $this->add_render_attribute('title_text', 'class',  'title wow pixFadeUp');
        $this->add_inline_editing_attributes( 'title_text', 'none' );

        
        $this->add_render_attribute('sub_title', 'class',  'subtitle wow pixFadeUp');
        $this->add_inline_editing_attributes( 'sub_title', 'none' );

        $this->add_render_attribute('description_text', 'class',  'description');
        $this->add_inline_editing_attributes( 'description_text', 'none' );

        require __DIR__.'/style/parallax-content/'.$style.'.php';
       
    }

}