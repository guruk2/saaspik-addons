<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Saaspik_Widget_Button extends Widget_Base {

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
		return 'saaspik-button';
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
		return __( 'Saaspik Button', 'saaspik-addons' );
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
			'section_button',
			[
				'label' => __( 'Button', 'saaspik-addons' ),
			]
		);
		

		$this->add_control(
			'pix_button_type',
			[
				'label' => __( 'Type', 'saaspik-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'pix-btn',
				'options' => [
					'pix-btn'    => [
						'title' => __( 'Simple', 'uael' ),
						'icon'  => 'eicon-button',
					],
					'app-btn' => [
						'title' => __( 'Store', 'uael' ),
						'icon'  => 'fab fa-google-play',
					],
				],
					
			]
		);


		$this->add_control(
			'pix_button_style',
			[
				'label' => __( 'Style', 'saaspik-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'fill',
				'options' => [
					'fill' => __( 'Default', 'saaspik-addons' ),
					'btn-outline' => __( 'Outline', 'saaspik-addons' ),
				],	
				'condition' => [
					'pix_button_type' => 'pix-btn'
				]			
			]
		);

		$this->add_control(
			'pix_button_size',
			[
				'label' => __( 'Size', 'saaspik-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'btn-normal',
				'options' => [
					'btn-small' => __( 'Small', 'saaspik-addons' ),
					'btn-normal' => __( 'Normal', 'saaspik-addons' ),
					'btn-large' => __( 'Large', 'saaspik-addons' ),
				],	
				'condition' => [
					'pix_button_type' => 'pix-btn'
				]				
			]
		);

		$this->add_control(
			'pix_button_shape',
			[
				'label' => __( 'Shape', 'saaspik-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'btn-round',
				'options' => [
					'btn-round' => __( 'Round', 'saaspik-addons' ),
					'btn-square' => __( 'Square', 'saaspik-addons' ),				
				],
				'condition' => [
					'pix_button_type' => 'pix-btn'
				]				
			]
		);

		$this->add_control(
			'text',
			[
				'label' => __( 'Text', 'saaspik-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Click me', 'saaspik-addons' ),
				'placeholder' => __( 'Click me', 'saaspik-addons' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'saaspik-addons' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'saaspik-addons' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'options' => saaspik_elegant_icons(),					
				'include' => saaspik_include_elegant_icons(),				
				'default' => '',
			]
		);

		$this->add_control(
			'icon_align',
			[
				'label' => __( 'Icon Position', 'saaspik-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => __( 'Before', 'saaspik-addons' ),
					'right' => __( 'After', 'saaspik-addons' ),
				],
				'condition' => [
					'icon!' => '',
				],
			]
		);

		$this->add_control(
			'icon_indent',
			[
				'label' => __( 'Icon Spacing', 'saaspik-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .pix-btn .elementor-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .pix-btn .elementor-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
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

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'saaspik-addons' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
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
				'selector' => '{{WRAPPER}} a.pix-btn, {{WRAPPER}} .pix-btn',
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
					'{{WRAPPER}} a.pix-btn, {{WRAPPER}} .pix-btn' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,				
				'selectors' => [
					'{{WRAPPER}} a.pix-btn, {{WRAPPER}} .pix-btn' => 'background: {{VALUE}};',
				],
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
					'{{WRAPPER}} .pix-btn:hover, {{WRAPPER}} .pix-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.pix-btn:hover, {{WRAPPER}} .pix-btn:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} a.pix-btn:hover, {{WRAPPER}} .pix-btn:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Animation', 'saaspik-addons' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
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
				'selector' => '{{WRAPPER}} .pix-btn',
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
					'{{WRAPPER}} a.pix-btn, {{WRAPPER}} .pix-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '
				{{WRAPPER}} .pix-btn',
                'condition' => [
					'pix_button_style' => 'fill',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow_outline',
				'selector' => '{{WRAPPER}} .pix-btn-wrapper .pix-btn.btn-outline:hover',
                'condition' => [
					'pix_button_style' => 'btn-outline',
				],
			]
		);

		$this->add_control(
			'text_padding',
			[
				'label' => __( 'Text Padding', 'saaspik-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} a.pix-btn, {{WRAPPER}} .pix-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
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
		$button_type = $settings['pix_button_size'];

		$this->add_render_attribute( 'wrapper', 'class', 'pix-btn-wrapper' );

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'button', 'href', $settings['link']['url'] );
			$this->add_render_attribute( 'button', 'class', 'pix-btn-link' );

			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'button', 'target', '_blank' );
			}

			if ( $settings['link']['nofollow'] ) {
				$this->add_render_attribute( 'button', 'rel', 'nofollow' );
			}
		}

		if ( ! empty( $settings['pix_button_type'] ) ) {
			$this->add_render_attribute( 'button', 'class', $settings['pix_button_type'] );
		}
		if ( ! empty( $settings['pix_button_shape'] ) ) {
			$this->add_render_attribute( 'button', 'class', $settings['pix_button_shape'] );
		}

		if ( ! empty( $settings['pix_button_size'] ) ) {
			$this->add_render_attribute( 'button', 'class', $settings['pix_button_size'] );
		}
		if ( ! empty( $settings['pix_button_style'] ) ) {
			$this->add_render_attribute( 'button', 'class', $settings['pix_button_style'] );
		}

		if ( $settings['hover_animation'] ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-animation-' . $settings['hover_animation'] );
		}

		?>
		<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
			<a <?php echo $this->get_render_attribute_string( 'button' ); ?>>
				<?php $this->render_text(); ?>
			</a>
		</div>
		<?php
	}

	/**
	 * Render button widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_template() {
		?>
		<#
		view.addRenderAttribute( 'text', 'class', 'pix-btn-text' );

		view.addInlineEditingAttributes( 'text', 'none' );
		#>
		<div class="pix-btn-wrapper">
	
			<a class="pix-btn {{ settings.pix_button_type }} {{ settings.pix_button_shape }} {{ settings.pix_button_size }} {{ settings.pix_button_style }} elementor-animation-{{ settings.hover_animation }}" href="{{ settings.link.url }}">
				<span class="pix-btn-content-wrapper">
					<# if ( settings.icon ) { #>
					<span class="pix-btn-icon elementor-align-icon-{{ settings.icon_align }}">
						<i class="{{ settings.icon }}" aria-hidden="true"></i>
					</span>
					<# } #>
					<span {{{ view.getRenderAttributeString( 'text' ) }}}>{{{ settings.text }}}</span>
				</span>
			</a>
	
		</div>
		<?php
	}

	/**
	 * Render button text.
	 *
	 * Render button widget text.
	 *
	 * @since 1.5.0
	 * @access protected
	 */
	protected function render_text() {
		$settings = $this->get_settings();
		$this->add_render_attribute( 'content-wrapper', 'class', 'pix-btn-content-wrapper' );
		$this->add_render_attribute( 'icon-align', 'class', 'elementor-align-icon-' . $settings['icon_align'] );
		$this->add_render_attribute( 'icon-align', 'class', 'pix-btn-icon' );

		$this->add_render_attribute( 'text', 'class', 'pix-btn-text' );

		// $this->add_inline_editing_attributes( 'text', 'none' );
		?>
		<span <?php echo $this->get_render_attribute_string( 'content-wrapper' ); ?>>
			<?php if ( ! empty( $settings['icon'] ) ) : ?>
				<span <?php echo $this->get_render_attribute_string( 'icon-align' ); ?>>
					<i class="<?php echo esc_attr( $settings['icon'] ); ?>" aria-hidden="true"></i>
				</span>
			<?php endif; ?>
			<span <?php echo $this->get_render_attribute_string( 'text' ); ?>><?php echo $settings['text']; ?></span>
		</span>
		<?php
	}
}