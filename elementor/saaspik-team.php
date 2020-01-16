<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Saaspik_Team extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'saaspik-team';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Saaspik Team', 'saaspik-addons' );
	}

	/**
	 * Get widget icon.
	 * 
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-person';
	}

	/**
	 * Get widget categories.
	 *
	 * @since 1.0.0
	 */
	public function get_categories() {
		return [ 'saaspik-elements' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 1.0.0
	 */
	public function get_keywords() {
		return [ 'saaspik team', 'saaspik member' ];
	}

	/**
	 * Get widget styles.
	 *
	 * Retrieve the list of styles the widget belongs to.
	 *
	 * @since 1.0.0
	 */
	// public function get_style_depends() {
	//     return [
	//         'saaspik-widgets',
	//     ];
	// }

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
	
		//============================================
		// START TEAME CONTENT
		//============================================
		$this->start_controls_section(
			'team_content',
			[
				'label' => __( 'Saaspik Team Member', 'saaspik-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
            'team_style', [
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
			'name',
			[
				'label' => __( 'Name', 'saaspik-addons' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Name', 'saaspik-addons' ),
				'default' => 'Jhon Doe',
			]
		);
		$this->add_control(
			'position',
			[
				'label' => __( 'Position', 'saaspik-addons' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Position', 'saaspik-addons' ),
				'default' => 'CEO',
			]
		);
		$this->add_control(
			'desc',
			[
				'label' => __( 'Description', 'saaspik-addons' ),
				'lable_block' => true,
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter Description', 'saaspik-addons' ),			
			]
		);
		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'saaspik-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [				
					'url' => plugins_url('images/team1.jpg', __FILE__)
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'saaspik-addons' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-facebook',
			]
		);
		$repeater->add_control(
			'link',
			[
				'label' => __( 'Link', 'saaspik-addons' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'saaspik-addons' ),
			]
		);
		$repeater->add_control(
			'social_name',
			[
				'label' => __( 'Name', 'saaspik-addons' ),
				'description' => __( 'This name will be show in the item header', 'saaspik-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Facebook',
			]
		);

		$repeater->start_controls_tabs( 'icon_tabs' );

		$repeater->start_controls_tab(
			'icon_normal',
			[
				'label' => __( 'Normal', 'saaspik-addons' ),
			]
		);

		$repeater->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sina-team-social {{CURRENT_ITEM}} i' => 'color: {{VALUE}};',
				],
			]
		);
		$repeater->add_control(
			'icon_bg',
			[
				'label' => __( 'Background', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sina-team-social {{CURRENT_ITEM}} i' => 'background: {{VALUE}};',
				],
			]
		);
		$repeater->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'selector' => '{{WRAPPER}} .sina-team-social {{CURRENT_ITEM}} i',
			]
		);
		$repeater->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_shadow',
				'selector' => '{{WRAPPER}} .sina-team-social {{CURRENT_ITEM}} i',
			]
		);

		$repeater->end_controls_tab();

		$repeater->start_controls_tab(
			'icon_hover',
			[
				'label' => __( 'Hover', 'saaspik-addons' ),
			]
		);

		$repeater->add_control(
			'icon_hover_color',
			[
				'label' => __( 'Icon Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sina-team-social {{CURRENT_ITEM}} i:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$repeater->add_control(
			'icon_hover_bg',
			[
				'label' => __( 'Background', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sina-team-social {{CURRENT_ITEM}} i:hover' => 'background: {{VALUE}}'
				],
			]
		);
		$repeater->add_control(
			'icon_hover_border',
			[
				'label' => __( 'Border Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sina-team-social {{CURRENT_ITEM}} i:hover' => 'border-color: {{VALUE}}'
				],
			]
		);
		$repeater->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_hover_shadow',
				'selector' => '{{WRAPPER}} .sina-team-social {{CURRENT_ITEM}} i:hover',
			]
		);

		$repeater->end_controls_tab();

		$repeater->end_controls_tabs();

		$this->add_control(
			'social_icons',
			[
				'label' => __( 'Add Social Icon', 'saaspik-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'icon' => 'fa fa-facebook',
						'link' => [
							'url' => 'https://facebook.com',
						],
						'social_name' => 'Facebook',
					],
					[
						'icon' => 'fa fa-twitter',
						'link' => [
							'url' => 'https://twitter.com',
						],
						'social_name' => 'Twitter',
					],
					[
						'icon' => 'fa fa-linkedin',
						'link' => [
							'url' => 'https://linkedin.com',
						],
						'social_name' => 'Linkedin',
					],
				],
				'title_field' => '{{{ social_name }}}',
			]
		);

		$this->end_controls_section();
		// End Team Content
		// =====================


		//============================================
		// START TEAME STYLE
		//============================================

		// Start Overlay Style
		// =====================
		$this->start_controls_section(
			'overlay_svg',
			[
				'label' => __( 'Hover Overlay', 'saaspik-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'svg_color',
			[
				'label' => __( 'Background Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .member-avater svg path' => 'fill: {{VALUE}};',
				],
				'condition' => array(
					'team_style' => 'style1'
				)
			]
		);
		$this->add_control(
			'bg_overlay_color',
			[
				'label' => __( 'Background Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-member-two:before' => 'background: {{VALUE}};',
				],
				'condition' => array(
					'team_style' => 'style2'
				)
			]
		);

		$this->end_controls_section();
		// End Overlay Style
		// =====================


		// Start Name Style
		// =====================
		$this->start_controls_section(
			'name_style',
			[
				'label' => __( 'Name', 'saaspik-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'name_color',
			[
				'label' => __( 'Text Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#111',
				'selectors' => [
					'{{WRAPPER}} .team-member .team-info .name' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_weight' => [
						'default' => '600',
					],
					'font_size'   => [
						'default' => [
							'size' => '24',
						],
					],
				],
				'selector' => '{{WRAPPER}} .team-member .team-info .name',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'name_shadow',
				'selector' => '{{WRAPPER}} .team-member .team-info .name',
			]
		);

		$this->end_controls_section();
		// End Name Style
		// =====================


		// Start Position Style
		// =====================
		$this->start_controls_section(
			'position_style',
			[
				'label' => __( 'Designation', 'saaspik-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'position_color',
			[
				'label' => __( 'Text Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#111',
				'selectors' => [
					'{{WRAPPER}} .team-member .team-info .job' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'position_typography',
				'fields_options' => [
					'typography' => [ 
						'default' =>'custom', 
					],
					'font_weight' => [
						'default' => '600',
					],
					'font_size'   => [
						'default' => [
							'size' => '14',
						],
					],
				],
				'selector' => '{{WRAPPER}} .team-member .team-info .job',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'position_shadow',
				'selector' => '{{WRAPPER}} .team-member .team-info .job',
			]
		);

		$this->end_controls_section();
		// End Position Style
		// =====================


		// Start Description Style
		// =========================
		$this->start_controls_section(
			'desc_style',
			[
				'label' => __( 'Description', 'saaspik-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Text Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#111',
				'selectors' => [
					'{{WRAPPER}} .saspik-team-desc' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .saspik-team-desc',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_shadow',
				'selector' => '{{WRAPPER}} .saspik-team-desc',
			]
		);

		$this->end_controls_section();
		// End Description Style
		// =====================


		// Start Icon Style
		// =====================
		$this->start_controls_section(
			'icon_style',
			[
				'label' => __( 'Social Icon', 'saaspik-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'font_size',
			[
				'label' => __( 'Font Size', 'saaspik-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'default' => [
					'unit' => 'px',
					'size' => '16',
				],
				'selectors' => [
					'{{WRAPPER}} .member-avater .member-social li a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Icon Size', 'saaspik-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'default' => [
					'unit' => 'px',
					'size' => '46',
				],
				'selectors' => [
					'{{WRAPPER}} .member-avater .member-social li a' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'font_line_height',
			[
				'label' => __( 'Line Height', 'saaspik-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'default' => [
					'unit' => 'px',
					'size' => '46',
				],
				'selectors' => [
					'{{WRAPPER}} .member-avater .member-social li a' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'team_icon_tabs' );

		$this->start_controls_tab(
			'team_icon_normal',
			[
				'label' => __( 'Normal', 'saaspik-addons' ),
			]
		);

		$this->add_control(
			'team_icon_color',
			[
				'label' => __( 'Icon Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,	
				'selectors' => [
					'{{WRAPPER}} .member-avater .member-social li a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'team_icon_border',
				'selector' => '{{WRAPPER}} .member-avater .member-social li a',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'team_icon_shadow',
				'selector' => '{{WRAPPER}} .member-avater .member-social li a',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'team_icon_hover',
			[
				'label' => __( 'Hover', 'saaspik-addons' ),
			]
		);

		$this->add_control(
			'team_icon_hover_color',
			[
				'label' => __( 'Icon Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .member-avater .member-social li a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'team_icon_hover_bg',
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'background' => [ 
						'default' =>'classic', 
					],	
				],
				'selector' => '{{WRAPPER}} .member-avater .member-social li a:hover',
			]
		);
		$this->add_control(
			'team_icon_hover_border',
			[
				'label' => __( 'Border Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .member-avater .member-social li a:hover' => 'border-color: {{VALUE}}'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'team_icon_hover_shadow',
				'selector' => '{{WRAPPER}} .member-avater .member-social li a:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'icon_radius',
			[
				'label' => __( 'Radius', 'saaspik-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'unit' => '%',
					'top' => '50',
					'right' => '50',
					'bottom' => '50',
					'left' => '50',
					'isLinked' => true,
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .member-avater .member-social li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Icon Style
		// =====================
	}


	protected function render() {
		$settings = $this->get_settings_for_display();
		$style = $settings['team_style'];

		if($style == 'style1') {
			if ( $settings['image']['url'] ):
				?>
				<div class="team-member">
					<div class="member-avater">
						<img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['name'] ); ?>">

						<ul class="member-social">
							<?php
								foreach ($settings['social_icons'] as $index => $icon):
								?>
								<li class="elementor-repeater-item-<?php echo esc_attr( $icon[ '_id' ] ); ?>">
									<a href="<?php echo esc_url( $icon['link']['url'] ); ?>"
										<?php if ( 'on' == $icon['link']['is_external'] ): ?> target="_blank" 
										<?php endif; ?>
										<?php if ( 'on' == $icon['link']['nofollow'] ): ?> rel="nofollow" 
										<?php endif; ?>>
										<i class="<?php echo esc_attr( $icon['icon'] ); ?>"></i>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
						
						<svg class="layer-one" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="370px" height="210px">
							<path fill-rule="evenodd" opacity="0.302" fill="rgb(250, 112, 112)" d="M-0.000,79.999 C-0.000,79.999 85.262,-11.383 187.324,50.502 C297.703,117.429 370.000,-0.001 370.000,-0.001 L370.000,203.999 C370.000,207.313 367.314,209.999 364.000,209.999 L6.000,209.999 C2.686,209.999 -0.000,207.313 -0.000,203.999 L-0.000,79.999 Z" />
						</svg>

						<svg class="layer-two" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="370px" height="218px">
							<path fill-rule="evenodd" opacity="0.8" fill="rgb(250, 112, 112)" d="M-0.000,27.999 C-0.000,27.999 95.694,-46.224 188.615,48.781 C278.036,140.208 370.000,57.999 370.000,57.999 L370.000,211.999 C370.000,215.313 367.314,217.999 364.000,217.999 L6.000,217.999 C2.686,217.999 -0.000,215.313 -0.000,211.999 L-0.000,27.999 Z" />
						</svg>
					</div>
					<!-- /.member-avater -->

					<div class="team-info">
						<?php if ( $settings['name'] ): ?>
							<h5 class="name">
								<?php printf( '%s', $settings['name'] ); ?>
							</h5>
						<?php endif; ?>
						<?php if ( $settings['position'] ): ?>
							<h6 class="job">
								<?php printf( '%s', $settings['position'] ); ?>
							</h6>
						<?php endif; ?>

						<?php if ( $settings['desc'] ): ?>
							<div class="saspik-team-desc">
								<?php printf( '%s', $settings['desc'] ); ?>
							</div>
						<?php endif; ?>
					</div>			
				
				</div><!-- .saaspik-team -->
			<?php
			endif;
		} elseif ($style == 'style2') {

			if ( $settings['image']['url'] ):
				?>
				<div class="team-member-two">
					<div class="member-avater">
						<img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['name'] ); ?>">

						<div class="team-info">
						<?php if ( $settings['name'] ): ?>
							<h5 class="name">
								<?php printf( '%s', $settings['name'] ); ?>
							</h5>
						<?php endif; ?>
						<?php if ( $settings['position'] ): ?>
							<h6 class="job">
								<?php printf( '%s', $settings['position'] ); ?>
							</h6>
						<?php endif; ?>
					</div>
						<ul class="member-social">
							<?php
								foreach ($settings['social_icons'] as $index => $icon):
								?>
								<li class="elementor-repeater-item-<?php echo esc_attr( $icon[ '_id' ] ); ?>">
									<a href="<?php echo esc_url( $icon['link']['url'] ); ?>"
										<?php if ( 'on' == $icon['link']['is_external'] ): ?> target="_blank" 
										<?php endif; ?>
										<?php if ( 'on' == $icon['link']['nofollow'] ): ?> rel="nofollow" 
										<?php endif; ?>>
										<i class="<?php echo esc_attr( $icon['icon'] ); ?>"></i>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>					
				
					</div>
					<!-- /.member-avater -->							
				
				</div><!-- .saaspik-team -->
			<?php
			endif;
		}
	}


	protected function _content_template() {

	}
}