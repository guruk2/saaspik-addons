<?php
namespace Elementor;



class Saaspik_Icon_Box extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve icon box widget name.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'saaspik-icon-box';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve icon box widget title.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Saaspik Icon Box', 'saaspik-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve icon box widget icon.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-icon-box';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the icon box widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'saaspik-elements' ];
	}

	/**
	 * Register icon box widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 2.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_icon',
			[
				'label' => __( 'Icon Box', 'saaspik-addons' ),
			]
		);

		$this->add_control(
            'boxs_style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'saaspik-addons'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'saaspik-addons'),
                    'style2' => esc_html__('Style 2', 'saaspik-addons'),                   
                    'style3' => esc_html__('Style 3', 'saaspik-addons'),                   
                    'style4' => esc_html__('Style 4', 'saaspik-addons'),                   
                    'style5' => esc_html__('Style 5', 'saaspik-addons'),                   
                    'style6' => esc_html__('Style 6', 'saaspik-addons'),                   
                    'style7' => esc_html__('Style 7', 'saaspik-addons'),                   
                ],
            ]
        );

		$this->add_control(
            'style', [
                'label' => __( 'Icon Type', 'saaspik-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'icon_font' => esc_html__('Font Icon)', 'saaspik-addons'),
                    'icon_img' => esc_html__('Image Icon', 'saaspik-addons'),
  
                ],
                'default' => 'icon_img'
            ]
        );

        $this->add_control(
            'icoimg', [
                'label' => esc_html__( 'Upload the image', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    "style" => ['icon_img']
                ],
                'default' => [
                    'url' => plugins_url('images/6.png', __FILE__)
                ]
            ]
        );

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'saaspik-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'saaspik-addons' ),
					'stacked' => __( 'Stacked', 'saaspik-addons' ),
					'framed' => __( 'Framed', 'saaspik-addons' ),
				],
				'default' => 'default',
				'prefix_class' => 'elementor-view-',
				'condition' => [
                    "style" => ['icon_font']
                ]
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Choose Icon', 'saaspik-addons' ),
				'type' => Controls_Manager::ICON,
				'options' => saaspik_simple_line_icons(),
				'include' => saaspik_include_simple_line_icons(),
				'default' => 'icon-user',
				'condition' => [
                    "style" => ['icon_font']
                ]
			]
		);

		$this->add_control(
			'shape',
			[
				'label' => __( 'Shape', 'saaspik-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'circle' => __( 'Circle', 'saaspik-addons' ),
					'square' => __( 'Square', 'saaspik-addons' ),
				],
				'default' => 'circle',
				'condition' => [
					'view!' => 'default',
				],
				'prefix_class' => 'elementor-shape-',
				'condition' => [
                    "style" => ['icon_font']
                ]
			]
		);

		$this->add_control(
			'title_text',
			[
				'label' => __( 'Title & Description', 'saaspik-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'App Development', 'saaspik-addons' ),
				'placeholder' => __( 'Your Title', 'saaspik-addons' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'description_text',
			[
				'label' => '',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'The full monty do one nancy boy say gutted mate cockup Why at	public school.!.', 'saaspik-addons' ),
				'placeholder' => __( 'Your Description', 'saaspik-addons' ),
				'title' => __( 'Input icon text here', 'saaspik-addons' ),
				'rows' => 10,
				'separator' => 'none',
				'show_label' => false,
			]
		);

		
		$this->add_control(
			'link',
			[
				'label' => __( 'Link to', 'saaspik-addons' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'http://your-link.com', 'saaspik-addons' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'more_link_text',
			[
				'label' => __( 'Button Text', 'saaspik-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Read More', 'saaspik-addons' ),
				'placeholder' => __( 'Click me', 'saaspik-addons' ),
				'condition' => [
					"boxs_style" => ['style5','style7']
				]
			]
			
		);

		$this->add_control(
			'link_btn',
			[
				'label' => __( 'Button Link', 'saaspik-addons' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
				'condition' => [
					"boxs_style" => ['style4']
				]
			]
		);

		$this->add_control(
			'position',
			[
				'label' => __( 'Icon Position', 'saaspik-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'top',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'saaspik-addons' ),
						'icon' => 'fa fa-align-left',
					],
					'top' => [
						'title' => __( 'Top', 'saaspik-addons' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'saaspik-addons' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'saaspik-position-',
				'toggle' => false,
			]
		);

		$this->add_control(
			'title_size',
			[
				'label' => __( 'Title HTML Tag', 'saaspik-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => __( 'H1', 'saaspik-addons' ),
					'h2' => __( 'H2', 'saaspik-addons' ),
					'h3' => __( 'H3', 'saaspik-addons' ),
					'h4' => __( 'H4', 'saaspik-addons' ),
					'h5' => __( 'H5', 'saaspik-addons' ),
					'h6' => __( 'H6', 'saaspik-addons' ),
					'div' => __( 'div', 'saaspik-addons' ),
					'span' => __( 'span', 'saaspik-addons' ),
					'p' => __( 'p', 'saaspik-addons' ),
				],
				'default' => 'h3',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'box',
			[
				'label' => __( 'Box', 'saaspik-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'saaspik-addons' ),
				'selector' => '{{WRAPPER}} .saaspik-icon-box-wrapper.style-five',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => __( 'Icon', 'saaspik-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'primary_color',
			[
				'label' => __( 'Primary Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}.elementor-view-stacked .pixsaas' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed .pixsaas, {{WRAPPER}}.elementor-view-default .pixsaas' => 'color: {{VALUE}}; border-color: {{VALUE}};',
				],
				'condition' => [
					'style' => 'icon_font'
				]
			]
		);

		$this->add_responsive_control(
			'icon_space',
			[
				'label' => __( 'Spacing', 'saaspik-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .saaspik-icon-box-wrapper .saaspik-icon-box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.elementor-position-left .saaspik-icon-box-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.elementor-position-top .saaspik-icon-box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .saaspik-icon-box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size', 'saaspik-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pixsaas' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'style' => 'icon_font'
				]
			]
		);

		$this->add_control(
			'icon_padding',
			[
				'label' => __( 'Padding', 'saaspik-addons' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .pixsaas' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'em' => [
						'min' => 0,
						'max' => 5,
					],
				],
				'condition' => [
					'view!' => 'default',
				],
			]
		);


		$this->add_control(
			'border_width',
			[
				'label' => __( 'Border Width', 'saaspik-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .pixsaas' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'view' => 'framed',
				],
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'saaspik-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pixsaas' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'view!' => 'default',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_hover',
			[
				'label' => __( 'Icon Hover', 'saaspik-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'hover_primary_color',
			[
				'label' => __( 'Primary Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}.elementor-view-stacked .pixsaas:hover' => 'background: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed .pixsaas:hover, 
					{{WRAPPER}}.elementor-view-default .pixsaas:hover,
					{{WRAPPER}} .saaspik-icon-box-wrapper.style-five:hover .saaspik-icon-box-icon a,
					{{WRAPPER}} .saaspik-icon-box-wrapper.style-five:hover .saaspik-icon-box-icon span' => 'color: {{VALUE}}; border-color: {{VALUE}};',
				],
				'condition' => [
					'style' => 'icon_font'
				]
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_icon',
				'label' => __( 'Box Shadow', 'saaspik-addons' ),
				'selector' => '{{WRAPPER}} .saaspik-icon-box-wrapper.style-five:hover .saaspik-icon-box-icon',
				'condition' => [
					'boxs_style' => 'style5'
				]
			]
		);

		$this->add_control(
			'overlay_bg',
			[
				'label' => __( 'Overlay Background', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .saaspik-icon-box-wrapper.style-four:hover .layer path' => 'fill: {{VALUE}};',					
				],
				'condition' => [
					'boxs_style' => 'style4'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'saaspik-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'text_align',
			[
				'label' => __( 'Alignment', 'saaspik-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'saaspik-addons' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'saaspik-addons' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'saaspik-addons' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'saaspik-addons' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .saaspik-icon-box-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_vertical_alignment',
			[
				'label' => __( 'Vertical Alignment', 'saaspik-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'top' => __( 'Top', 'saaspik-addons' ),
					'middle' => __( 'Middle', 'saaspik-addons' ),
					'bottom' => __( 'Bottom', 'saaspik-addons' ),
				],
				'default' => 'top',
				'prefix_class' => 'elementor-vertical-align-',
			]
		);

		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'saaspik-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'title_bottom_space',
			[
				'label' => __( 'Spacing', 'saaspik-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .saaspik-icon-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .saaspik-icon-box-content .saaspik-icon-box-title' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .saaspik-icon-box-content .saaspik-icon-box-title',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'heading_description',
			[
				'label' => __( 'Description', 'saaspik-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => __( 'Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .saaspik-icon-box-content .saaspik-icon-box-description' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .saaspik-icon-box-content .saaspik-icon-box-description',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render icon box widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 2.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();
		$icon_type = $settings['style'];
		$boxs_style = $settings['boxs_style'];
		

		$this->add_render_attribute( 'icon', 'class', [ 'pixsaas' ] );
		$has_content = ! empty( $settings['title_text'] ) || ! empty( $settings['description_text'] ) || ! empty($button['link'] );

		$icon_tag = 'span';
		$this->add_render_attribute( 'wrapper', 'class', 'saaspik-icon-box-wrapper' );

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'link', 'href', $settings['link']['url'] );
			$icon_tag = 'a';

			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'link', 'target', '_blank' );
			}

			if ( $settings['link']['nofollow'] ) {
				$this->add_render_attribute( 'link', 'rel', 'nofollow' );
			}
		}

		$this->add_render_attribute( 'i', 'class', $settings['icon'] );

		$icon_attributes = $this->get_render_attribute_string( 'icon' );
		$link_attributes = $this->get_render_attribute_string( 'link' );

		$this->add_render_attribute( 'description_text', 'class', 'saaspik-icon-box-description' );

		$this->add_inline_editing_attributes( 'title_text', 'none' );

		$this->add_inline_editing_attributes( 'description_text' );


		if ( ! empty( $settings['link_btn']['url'] ) ) {
			$this->add_render_attribute( 'button', 'href', $settings['link_btn']['url'] );
			$this->add_render_attribute( 'button', 'class', 'more-btn' );

			if ( $settings['link_btn']['is_external'] ) {
				$this->add_render_attribute( 'button', 'target', '_blank' );
			}

			if ( $settings['link_btn']['nofollow'] ) {
				$this->add_render_attribute( 'button', 'rel', 'nofollow' );
			}
		}
		
		require __DIR__.'/style/service/'.$boxs_style.'.php';
	
	}

}