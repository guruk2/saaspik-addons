<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Saaspik_Widget_Download_Button extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve button widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'saaspik-download-button';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve button widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Saaspik Download Button', 'saaspik-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve button widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-button';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the icon box widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
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
	 * Get button sizes.
	 *
	 * Retrieve an array of button sizes for the button widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @return array An array containing button sizes.
	 */
	public static function get_button_sizes() {
		return [
			'xs' => __( 'Extra Small', 'saaspik-addons' ),
			'sm' => __( 'Small', 'saaspik-addons' ),
			'md' => __( 'Medium', 'saaspik-addons' ),
			'lg' => __( 'Large', 'saaspik-addons' ),
			'xl' => __( 'Extra Large', 'saaspik-addons' ),
		];
	}


	/**
	 * Register button widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
        $this->start_controls_section(
            'buttons_sec',
            [
                'label' => __( 'Buttons', 'saaspik-addons' ),
            ]
		);
		




		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'btn_text', [
				'label' => __( 'Create buttons', 'saaspik-addons' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Get app now'
			]
		);

		$repeater->add_control(
			'btn_link', [
				'label' => __( 'Button URL', 'saaspik-addons' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => '#'
				]
			]
		);
		$repeater->add_control(
			'icon', [
				'label' => __( 'Icon', 'saaspik-addons' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'options' => saaspik_elegant_icons(),					
				'include' => saaspik_include_elegant_icons(),				
				'default' => '',
			]
		);

		$repeater->add_control(
			'list_color',
			[
				'label' => __( 'Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
				],
			]
		);
		$repeater->add_control(
			'pix_button_shape',
			[
				'label' => __( 'Shape', 'saaspik-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'btn-round',
				'options' => [
					'btn-round' => __( 'Round', 'saaspik-addons' ),
					'btn-square' => __( 'Square', 'saaspik-addons' ),				
				],
			]
		);
		$repeater->add_control(
			'pix_button_style',
			[
				'label' => __( 'Style', 'saaspik-addons' ),
			'type' => Controls_Manager::SELECT,
			'default' => 'btn-active',
			'options' => [
				'btn-active' => __( 'Default', 'saaspik-addons' ),
				'btn-outline' => __( 'Outline', 'saaspik-addons' ),
			],
			]
		);
	
		$this->add_control(
			'buttons',
			[
				'label' => __( 'Repeater List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'btn_text' => __( 'Get app now', 'plugin-domain' ),
						
					],
				
				],
				'title_field' => '{{{ btn_text }}}',
			]
		);


        $this->end_controls_section(); // End Buttons
		

		$this->start_controls_section(
			'section_button',
			[
				'label' => __( 'Button', 'saaspik-addons' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'saaspik-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
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
				'prefix_class' => 'elementor%s-align-',
				'default' => '',
			]
		);



		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Button', 'saaspik-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'label' => __( 'Typography', 'saaspik-addons' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} a.app-btn, {{WRAPPER}} .app-btn',
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'saaspik-addons' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} a.app-btn, {{WRAPPER}} .app-btn i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,				
				'selectors' => [
					'{{WRAPPER}} a.app-btn, {{WRAPPER}} .app-btn' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'dbtn_box_shadow',
				'label' => __( 'Box Shadow', 'saaspik-addons' ),
				'selector' => '{{WRAPPER}} .app-btn',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'saaspik-addons' ),
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .app-btn:hover, {{WRAPPER}} .app-btn:hover i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.app-btn:hover, {{WRAPPER}} .app-btn:hover' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} a.app-btn:hover, {{WRAPPER}} .app-btn:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'dbtn_box_shadow_hover',
				'label' => __( 'Box Shadow', 'saaspik-addons' ),
				'selector' => '{{WRAPPER}} .app-btn:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'saaspik-addons' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .app-btn',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'saaspik-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} a.app-btn, {{WRAPPER}} .app-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .app-btn',
                'condition' => [
					'pix_button_style' => 'btn-active',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'label' => __( 'Active Btn Box Shadow', 'saaspik-addons' ),
				'name' => 'button_box_shadow_outline',
				'selector' => '{{WRAPPER}} .app-btn.btn-active',            
			]
		);

		$this->add_control(
			'text_padding',
			[
				'label' => __( 'Text Padding', 'saaspik-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} a.app-btn, {{WRAPPER}} .app-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'dbtn_margin',
			[
				'label' => __( 'Margin', 'plugin-domain' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .app-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}
  
	/**
	 * Render button widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();	
		$buttons = $settings['buttons'];
		$this->add_render_attribute( 'wrapper', 'class', 'button-wrapper' );

		if(! empty($settings['align'])) {
			$this->add_render_attribute( 'wrapper', 'class', 'text-' .$settings['align'] );
		}

		?>

		<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>		
			<?php
			if (!empty($buttons)) {
				$keys = array();
				foreach ($buttons as $key => $button) {

					
					
					$this->add_render_attribute( 'button', 'class', 'app-btn' );				
				
		
					if ( ! empty( $button['pix_button_shape'] ) ) {
						$this->add_render_attribute( 'button', 'class', $button['pix_button_shape'] );
					}
			
					if ( ! empty( $button['pix_button_style'] ) ) {
						$this->add_render_attribute( 'button', 'class', $button['pix_button_style'] );
					}					
					?>

					<a class="app-btn wow fadeInUp <?php echo $button['pix_button_shape']; ?> <?php echo $button['pix_button_style']; ?>" href="<?php echo esc_url($button['btn_link']['url']); ?>" data-wow-delay="0.3s">			
						<i class="<?php echo esc_attr( $button['icon'] ); ?>" aria-hidden="true"></i>					
						<span><?php echo esc_html($button['btn_text']); ?></span>
					</a>
				<?php
				}	
				//print_r($keys);		
				
			} ?>
		</div>
		<?PHP 
	}

	/**
	 * Render button widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_template() {}

}