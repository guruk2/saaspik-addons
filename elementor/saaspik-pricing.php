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
class Saaspik_Pricing_Table extends Widget_Base {

    public function get_name() {
        return 'saaspik_pricing_table';
    }

    public function get_title() {
        return __( 'Pricing table Section', 'saaspik-addons' );
    }

    public function get_icon() {
        return 'eicon-price-table';
    }

    public function get_categories() {
        return [ 'saaspik-elements' ];
    }


    protected function _register_controls() {

        // ------------------------------ Feature list ------------------------------
        $this->start_controls_section(
            'pricing_table', [
                'label' => __( 'Pricing Table', 'saaspik-addons' ),
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
                ],
            ]
        );

        $this->add_control(
            'show_tab',
            [
                'type' => Controls_Manager::SWITCHER,
                'label' => esc_html__('Show tab', 'saaspik-addons'),
                'label_block'       => false,
                'default' => 'label_on',
                'label_on' => esc_html__( 'Yes', 'saaspik-addons' ),
                'label_off' => esc_html__( 'No', 'saaspik-addons' ),
            ]
        );

        $this->add_control(
			'more_options',
			[
				'label' => __( 'Pricing Tab Text', 'saaspik-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => ['show_tab' => 'yes']
            ]
            
            
        );
        
        $this->add_control(
			'monthly_title',
			[
				'label' => __( 'Title Month', 'saaspik-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Monthly', 'saaspik-addons' ),
                'placeholder' => __( 'Type your title here', 'saaspik-addons' ),
                 'condition' => ['show_tab' => 'yes']
			]
        );
        
        $this->add_control(
			'anual_title',
			[
				'label' => __( 'Title Annual', 'saaspik-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Annual', 'saaspik-addons' ),
                'placeholder' => __( 'Type your title here', 'saaspik-addons' ),
                'condition' => ['show_tab' => 'yes']
			]
		);

        $this->add_control(
            'tables', [
                'label' => __( 'Pricing Tables', 'saaspik-addons' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => __( 'Table name', 'saaspik-addons' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Basic Account'
                    ], 
                    [
                        'name'      => 'select_color',
                        'label'     => esc_html__('Select Price Color', 'saaspik-addons'),
                        'type'      => Controls_Manager::SELECT,
                        'default' => 'color-one',
                        'options'   => [
                            'color-one'     => esc_html__('Color One', 'saaspik-addons'),
                            'color-two'    => esc_html__('Color Two', 'saaspik-addons'),
                            'color-three'    => esc_html__('Color Three', 'saaspik-addons'),
                        ],
                      
                    ],                 
                    [
                        'name' => 'popular',
                        'label' => __( 'Featured', 'plugin-domain' ),
                        'type' => Controls_Manager::SWITCHER,
                        'label_on' => __( 'Show', 'your-plugin' ),
                        'label_off' => __( 'Hide', 'your-plugin' ),
                        'return_value' => 'yes',
                        'default' => 'no',                 
                    ],
                    [
                        'name' => 'popular_text',
                        'label' => __( 'Featured Text', 'saaspik-addons' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => 'Popular',
                        'condition' => [
                            'popular' => 'yes'
                        ]
                    ],
                    [
                        'name' => 'duration',
                        'label' => __( 'Duration Month', 'saaspik-addons' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => 'Only for first month',
                    ],
                    [
                        'name' => 'duration_year',
                        'label' => __( 'Duration Anual', 'saaspik-addons' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => 'Only for one year',                          
                    ],          
                    [
                        'name' => 'currency',
                        'label' => __( 'Currency', 'saaspik-addons' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => '$',
                    ],
                    [
                        'name' => 'monthly_price',
                        'label' => __( 'Monthly Price', 'saaspik-addons' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => '0',
                    ],
                    [
                        'name' => 'annual_price',
                        'label' => __( 'Annual Price', 'saaspik-addons' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => '0',
                    ],                   
                    [
                        'name' => 'list_items',
                        'label' => __( 'List items', 'saaspik-addons' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                        'default' => '<li class="have">Limited Acess Library</li>
                                      <li class="have">Single User</li>
                                      <li class="not">Hotline Support 24/7</li>
                                      <li class="not">No Updates</li>',
                    ],               
                    [
                        'name' => 'purchase_btn_label',
                        'label' => __( 'Purchase button label', 'saaspik-addons' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => 'Purchase',
                        'label_block' => true
                    ],
                    [
                        'name' => 'purchase_btn_url',
                        'label' => __( 'Purchase button URL', 'saaspik-addons' ),
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#',
                            'is_external' => '',
                        ],
                        'show_external' => true,
                    ],                 
                    
                ],
            ]
        );
        $this->end_controls_section(); // End Buttons

        $this->start_controls_section(
			'tab_switcher_button',
			[
				'label' => __( 'Switcher Tab Style', 'saaspik-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_control(
            'color_btn_text', [
                'label' => __( 'Text Color', 'saaspik-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-tab.seleceted .monthly_tab_title' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->add_control(
            'switcher_background', [
                'label' => __( 'Text Hover and Active Color', 'saaspik-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-tab .monthly_tab_title, 
                    {{WRAPPER}} .pricing-tab.seleceted .annual_tab_title' => 'color: {{VALUE}};',
                ]

            ]
        );

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'switcher_shadow',
				'selector' => '{{WRAPPER}} .pricing-tab .pricing-tab-switcher:before',
			]
        ); 
        
        $this->end_controls_section(); // End Buttons

        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         *
         */
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Title', 'saaspik-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_prefix', [
                'label' => __( 'Text Color', 'saaspik-addons' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .title-four h2' => 'color: {{VALUE}};',
                ],
            
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_prefix',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .title-four h2',
            ]
        );
        $this->end_controls_section();


        //------------------------------ Style subtitle ------------------------------
        $this->start_controls_section(
            'style_subtitle', [
                'label' => __( 'Subtitle', 'saaspik-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_subtitle', [
                'label' => __( 'Text Color', 'saaspik-addons' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .title-four p' => 'color: {{VALUE}};',
                ],
             
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_subtitle',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .title-four p',
            ]
        );
        $this->end_controls_section();

        //------------------------------ Style subtitle ------------------------------
        $this->start_controls_section(
            'button_style', [
                'label' => __( 'Button', 'saaspik-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => __( 'Normal', 'saaspik-addons' ),
			]
		);

        $this->add_control(
            'text-color', [
                'label' => __( 'Text Color', 'saaspik-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-table .pix-btn, {{WRAPPER}} .pricing-table .pix-btn.btn-outline' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'button_background', [
                'label' => __( 'Background', 'saaspik-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-table .pix-btn, {{WRAPPER}} .pricing-table .pix-btn.btn-outline' => 'background: {{VALUE}};',
                ]	          
            ]
        );


		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'label' => __( 'Box Shadow', 'saaspik-addons' ),
				'selector' => '{{WRAPPER}} .pricing-table .pix-btn.btn-outline',        
                
			]
		);

		 $this->add_control(
            'border-color', [
                'label' => __( 'Border Color', 'saaspik-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-table .pix-btn, {{WRAPPER}} .pricing-table .pix-btn.btn-outline' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'button_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .pricing-table .pix-btn.btn-outline',
            ]
        );

        $this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => __( 'Hover', 'saaspik-addons' ),
			]
        );
        
        $this->add_control(
            'text-color_hover', [
                'label' => __( 'Text Color', 'saaspik-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-table .pix-btn:hover,
                     {{WRAPPER}} .pricing-table  .pix-btn.btn-outline:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_background_hover', [
                'label' => __( 'Background', 'saaspik-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-table .pix-btn:hover, 
                    {{WRAPPER}} .pricing-table .pix-btn.btn-outline:hover' => 'background: {{VALUE}};',
                ]
            ]
        );


		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_hover',
				'label' => __( 'Box Shadow', 'saaspik-addons' ),
				'selector' => '{{WRAPPER}} .pricing-table .pix-btn.btn-outline:hover',			
			]
		);

		 $this->add_control(
            'border-color_hover', [
                'label' => __( 'Border Color', 'saaspik-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-table .pix-btn:hover, 
                    {{WRAPPER}} .pricing-table .pix-btn.btn-outline:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );



        $this->end_controls_tab();

		$this->end_controls_tabs();


        $this->end_controls_section();


        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'More Option', 'saaspik-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
       
        $this->add_control(
            'table_bg', [
                'label' => __( 'Pricing Table Background', 'saaspik-addons' ),
                'type' => Controls_Manager::COLOR,                
                'selectors' => [
                    '{{WRAPPER}} .pricing-table'  => 'background: {{VALUE}};',                    
                ],            
            ]
        );
        $this->add_control(
            'table_bg_hover', [
                'label' => __( 'Pricing Table Background Hover', 'saaspik-addons' ),
                'type' => Controls_Manager::COLOR,                
                'selectors' => [
                    '{{WRAPPER}} .pricing-table:hover'  => 'background: {{VALUE}};',                    
                ],  
                     
            ]
        );

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'table_box_shadow',
				'label' => __( 'Pricing Table Box Shadow', 'saaspik-addons' ),
				'selector' => '{{WRAPPER}} .pricing-table',			
			]
        );
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'table_box_shadow_hover',
				'label' => __( 'Pricing Table Box Shadow Hover', 'saaspik-addons' ),
                'selector' => '{{WRAPPER}} .pricing-table:hover',		
             
            ]
            
        );
        $this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        );
        
        
        $this->add_control(
            'trend_bg', [
                'label' => __( 'Trending Background', 'saaspik-addons' ),
                'type' => Controls_Manager::COLOR,                
                'selectors' => [
                    '{{WRAPPER}} .advanced-pricing-table .pricing-table.featured .trend:before'  => 'border-right-color: {{VALUE}};',                    
                ],    
                'separator' => 'after'        
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
            'circleimg', [
                'label' => esc_html__( 'Upload the Parallax image', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/circle8.png', __FILE__)
                ], 
                'condition' => [
                    'show_shape' => 'yes'
                ],               
            ]
        );

        $this->add_control(
			'positionx',
			[
				'label' => __( 'Position Left/Right', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'plugin-domain' ),
						'icon' => 'fa fa-align-left',
					],				
					'right' => [
						'title' => __( 'Right', 'plugin-domain' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
                'toggle' => true,
                'condition' => [
                    'show_shape' => 'yes'
                ],
			]
		);

        $this->add_control(
			'positionxy',
			[
				'label' => __( 'Position Up/Down', 'plugin-domain' ),
                'type' => Controls_Manager::DIMENSIONS,
                'allowed_dimensions' => ['top'],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .scroll-circle' => 'top: {{TOP}}{{UNIT}};',				
                ],
                'condition' => [
                    'show_shape' => 'yes'
                ],
			]
		);

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings();
        $style = $settings['style'];
        // $color = $settings['select_color'];
        $id_int = 'pric-' . substr($this->get_id_int(), 0, 3);

        $tables = isset($settings['tables']) ? $settings['tables'] : '';
        
        require __DIR__.'/style/pricing/'.$style.'.php';

    }

    protected function _content_template() {
    }

}