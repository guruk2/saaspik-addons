<?php

namespace Elementor;



// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Text Typing Effect
 *
 * Elementor widget for text typing effect.
 *
 * @since 1.7.0
 */

class Saaspik_Faq_Tab extends Widget_Base {
    public function get_name() {
        return 'saaspik_faq';
    }

    public function get_title() {
        return esc_html__( 'FAQ with Tabs', 'saaspik-addons' );
    }

    public function get_icon() {
        return 'eicon-menu-bar';
    }

    public function get_categories() {
        return [ 'saaspik-elements' ];
    }

    protected function _register_controls() {
        /**
         * Style Tab
         * @ Tab Items
         */
        $this->start_controls_section(
            'style_tab_items',
            [
                'label' => __( 'Tab Items', 'saaspik-addons' ),
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'tab_items_typo',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .nav .nav-item .nav-link',
            ]
        );


        $this->add_control(
            'tab_items_color', [
                'label'     => esc_html__('Color', 'saaspik-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .nav .nav-item .nav-link' => 'color: {{VALUE}};',
                ),
            ]

        );

        $this->end_controls_section();

        /**
         * Style Tab
         * @ FAQ Item
         */
        $this->start_controls_section(
            'style_faq_item',
            [
                'label' => __( 'FAQ Items', 'saaspik-addons' ),
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'faq_item_typo',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .faq .card .card-header .btn-link',
            ]

        );



        $this->add_control(
            'faq_item_color', [
                'label'     => esc_html__('Color', 'saaspik-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .faq .card .card-header .btn-link' => 'color: {{VALUE}} !important;',
                ),
            ]

        );

        $this->end_controls_section();

        /**
         * Style Tab
         * @ FAQ Content
         */

        $this->start_controls_section(
            'style_faq_content',
            [
                'label' => __( 'FAQ Contents', 'saaspik-addons' ),
            ]

        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'faq_content_typo',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .tab-content .tab-pane .card .card-body p',
            ]

        );



        $this->add_control(
            'faq_content_color', [
                'label'     => esc_html__('Color', 'saaspik-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .tab-content .tab-pane .card .card-body p' => 'color: {{VALUE}};',
                ),
            ]

        );

        $this->end_controls_section();

        /**
         * Style Tab
         * @ FAQ Content
         */

        $this->start_controls_section(
            'style_faq_background',
            [
                'label' => __( 'Background Shape', 'saaspik-addons' ),
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
            'circleimg', [
                'label' => esc_html__( 'Upload the Parallax image', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/circle8.png', __FILE__)
                ],  
                'condition' => [
					'show_shape' => 'yes',
                ],
            ]

        );



        $this->add_control(
			'positionx',
			[
				'label' => __( 'Position Left/Right', 'saaspik-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'saaspik-addons' ),
						'icon' => 'fa fa-align-left',
					],				

					'right' => [
						'title' => __( 'Right', 'saaspik-addons' ),
						'icon' => 'fa fa-align-right',
					],

				],
				'default' => 'right',
                'toggle' => true,
                'condition' => [
					'show_shape' => 'yes',
                ],
			]

        );
        
        $this->add_control(
			'positionxy',
			[
				'label' => __( 'Position Up/Down', 'saaspik-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'allowed_dimensions' => ['top'],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .scroll-circle' => 'top: {{TOP}}{{UNIT}};',	

                ],
                'condition' => [
					'show_shape' => 'yes',
                ],

			]

		);

        $this->end_controls_section();
    }



    protected function render() {
        $settings = $this->get_settings();
        $cats = get_terms(array(
            'taxonomy' => 'faq_cat',
            'hide_empty' => true
        ));

        ?>

        <div class="faq-tabs">
            <div class="tabs-wrapper wow pixFadeUp">
                <div class="container">
                    <ul class="nav faq-tabs" role="tablist">
                        <?php

                        foreach ( $cats as $index => $cat ) :
                            $tab_title_setting_key = $this->get_repeater_setting_key( 'tab_li', '', $index ); 
                            $active = ($index == 0) ? 'active' : '';
                            $this->add_render_attribute( $tab_title_setting_key, [
                                'class' => [ 'nav-link', $active ],
                                'id' => $cat->slug.'-tab',
                                'data-toggle' => 'tab',
                                'role' => 'tab',
                                'aria-controls' => $cat->slug,
                                'href' => '#'.$cat->slug,
                            ]);
                            ?>

                            <li class="nav-item">
                                <a <?php echo $this->get_render_attribute_string( $tab_title_setting_key ); ?>>
                                    <?php echo $cat->name; ?>
                                </a>
                            </li>
                            <?php 
                        endforeach;
                        ?>

                    </ul>  
                    <div class="tab-content">
                        <?php
                        foreach ( $cats as $index => $cat ) :
                            $tab_count = $index + 1;
                            $active = ($index == 0) ? 'active show' : '';
                            $tab_content_setting_key = $this->get_repeater_setting_key( 'tab_content', '', $index );
                                            

                            $this->add_render_attribute( $tab_content_setting_key, [
                                'class' => [ 'tab-pane fade', $active ],
                                'id' => $cat->slug,
                                'aria-labelledby' => $cat->slug.'-tab',
                                'role' => 'tabpanel',
                            ]);

                            ?>

                            <div <?php echo $this->get_render_attribute_string( $tab_content_setting_key ); ?>> 
                                <div id="accordion-<?php echo esc_attr($tab_count); ?>" class="faq faq-two pixFade">
                                    <?php
                                    $faqs = new \WP_Query( array(
                                        'post_type'     => 'faq',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'faq_cat',
                                                'field'    => 'slug',
                                                'terms'    => $cat->slug,
                                            ),
                                        ),
                                    ));

                                    $faq_i = 0;
                                    while ($faqs->have_posts()) : $faqs->the_post();

                                        $tab_btn_setting_key = $this->get_repeater_setting_key( 'faq_btn', '', $cat->slug.$faq_i );
                                        $this->add_render_attribute( $tab_btn_setting_key, [
                                            'class' => [ $faq_i == 0 ? 'btn btn-link' : 'btn btn-link collapsed' ],
                                            'data-toggle' => 'collapse',
                                            'data-target' => '#'.$cat->slug.'-collapse-'.$faq_i,
                                            'aria-expanded' => $faq_i == 0 ? 'true' : 'false',
                                            'aria-controls' => esc_attr($cat->slug).'-collapse-'.$faq_i,
                                        ]);

                                        $tab_body_setting_key = $this->get_repeater_setting_key( 'faq_body', '', $cat->slug.$faq_i );
                                        $this->add_render_attribute( $tab_body_setting_key, [
                                            'id' => $cat->slug.'-collapse-'.$faq_i,
                                            'class' => [ $faq_i == 0 ? 'collapse show' : 'collapse' ],
                                            'aria-labelledby' => $cat->slug . $faq_i,
                                            'data-parent' => "#accordion-$tab_count"
                                        ]);

                                        ?>

                                        <div class="card <?php echo $faq_i == 0 ? 'active' : ''; ?>">
                                            <div class="card-header" id="<?php echo esc_attr($cat->slug) . $faq_i; ?>">
                                                <h5 class="mb-0">
                                                    <button <?php echo $this->get_render_attribute_string( $tab_btn_setting_key ); ?>>
                                                        <?php the_title(); ?>   
                                                    </button>
                                                </h5>
                                            </div>
                                            <div <?php echo $this->get_render_attribute_string( $tab_body_setting_key ); ?>>
                                                <div class="card-body">
                                                    <?php echo the_content() ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        ++$faq_i;
                                        endwhile;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.tabs-wrapper -->
            <?php if ( 'yes' === $settings['show_shape'] ) { ?>
                <?php if(! empty ($settings['circleimg']['url'])) : ?>
                    <div class="scroll-circle wow pixFadeUp <?php echo $settings['positionx'] ?>">
                        <img src="<?php echo $settings['circleimg']['url'] ?>" data-parallax='{"y" : -230}' alt="circle6">
                    </div>
                <?php endif; ?>
            <?php } ?>
        </div>
        <!-- /.faq-tabs -->
        <?php
    }
}