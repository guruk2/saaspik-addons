<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}



/**
 * Accordian Tab
 *
 * Sasspik widget for Accordian Tab.
 *
 * @since 2.0.0
 */
class Saaspik_Accordian_Tab_Widget extends Widget_Base {

    public function get_name() {
        return 'saaspik-accordian-tab';
    }

    public function get_title() {
        return __( 'Saaspik Accordian Tab', 'saaspik-addons' );
    }

    public function get_icon() {
        return 'eicon-tabs';
    }

    public function get_categories() {
        return [ 'saaspik-elements' ];
    }

    protected function _register_controls() {

        // ------------------------------ Feature list ------------------------------
        $this->start_controls_section(
            'section_tab', [
                'label' => __( 'Accordian Tab', 'saaspik-addons' ),
            ]
        );

        $this->add_control(
            'advance_tab', [
                'label' => __( 'Logos', 'saaspik-addons' ),
                'type' => Controls_Manager::REPEATER,
                'prevent_empty' => false,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => __( 'Tab title', 'saaspik-addons' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Website Design'
                    ],
                    [
                        'name' => 'description',
                        'label' => __( 'Description', 'saaspik-addons' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'label_block' => true,                        
                    ],  
                    [
                        'name' => 'btn_text',
                        'label' => __( 'Button Text', 'saaspik-addons' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __('Read More', 'saaspik-addons')                        
                    ], 
                    [
                        'name' => 'btn_link',
                        'label' => __( 'Link', 'saaspik-addons' ),
                        'type' => Controls_Manager::URL,
                        'placeholder' => __( 'https://your-link.com', 'saaspik-addons' ),
                        'show_external' => true,
                        'default' => [
                            'url' => '',
                            'is_external' => true,
                            'nofollow' => true,
                        ],
                    ],                    
                    [
                        'name' => 'content_layout',
                        'label' => __( 'Border Style', 'saaspik-addons' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => 'layout1',
                        'options' => [
                            'layout1'  => __( 'Layout One', 'saaspik-addons' ),
                            'layout2' => __( 'Layout Two', 'saaspik-addons' ),
                            'layout3' => __( 'Layout Three', 'saaspik-addons' ),                      
                        ],
                    ],
                  
                    [
                        'name' => 'tab_image_top',
                        'label' => __( 'Tab Image Top', 'saaspik-addons' ),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                    ],
                    [
                        'name' => 'tab_image_bottom',
                        'label' => __( 'Tab Image Bottom', 'saaspik-addons' ),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                        'condition' => [
                            'content_layout' => ['layout1', 'layout3']
                        ]
                    ],
                    [
                        'name' => 'tab_image_left',
                        'label' => __( 'Tab Image Left', 'saaspik-addons' ),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                        'condition' => [
                            'content_layout' => ['layout1', 'layout3' ]
                        ]
                    ],
                ],
            ]
        );
        $this->end_controls_section(); // End Buttons

        $this->start_controls_section(
            'style_sec', [
                'label' => __( 'Section Style Options', 'saaspik-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'padding', [
                'label' => esc_html__('Padding', 'saaspik-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .logo-center .partner_logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'unit' => 'px', // The selected CSS Unit. 'px', '%', 'em',
                    'isLinked' => false,
                ],
            ]
        );

        $this->add_control(
            'margin', [
                'label' => esc_html__('Margin', 'saaspik-addons'),
                'description' => esc_html__('Margin around single image item', 'saaspik-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .partner_logo .p_logo_item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'unit' => 'px', // The selected CSS Unit. 'px', '%', 'em',
                    'isLinked' => false,
                ],
            ]
        );

        $this->add_control(
            'align',
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
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );

        $this->add_control(
            'image_contrast',
            [
                'label' => __( 'Image Contrast', 'saaspik-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} .partner_logo .p_logo_item img' => 'filter: contrast({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->add_control(
            'image_contrast_hover',
            [
                'label' => __( 'Image Contrast on Hover', 'saaspik-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 500,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} .partner_logo .p_logo_item:hover img' => 'filter: brightness({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->end_controls_section(); // End Buttons

    }

    protected function render() {

        $settings = $this->get_settings();
        $advance_tab = isset($settings['advance_tab']) ? $settings['advance_tab'] : '';
        // $advance_tab = $settings['advance_tab'];

        ?>

        <div class="gp-tabs wow fadeInUp">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <nav class="pix-tab-navs">
                        <ul class="gp-tabs-navigation">       
                            
                            <?php 
                            $id_int = 'tabs-id-' . substr($this->get_id_int(), 0, 3);
                            foreach ($advance_tab as $key => $tabitem) :
                                $active = ($key == 0) ? 'active-tab active' : ''; ?>

                                <li data-content="<?php echo esc_attr($id_int . '-' . $key); ?>" class="tab-nav-item <?php echo esc_attr($active); ?>">
                                    <h4 class="acc-btn"><?php echo esc_html($tabitem['title']); ?></h4>
                                    <?php  if($tabitem['description']) : ?>
                                    <div class="content">
                                        <p><?php echo esc_html($tabitem['description']) ?></p>
                                    <?php 
                                        $target = $tabitem['btn_link']['is_external'] ? ' target="_blank"' : '';
                                        $nofollow = $tabitem['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
                                       
                                    if( ! empty($tabitem['btn_link']['url'] ) && !empty(esc_html($tabitem['btn_text'])) ) { ?>
                                        <a href="<?php echo esc_attr($tabitem['btn_link']['url']); ?>" class="more-btn" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>> <?php echo esc_html($tabitem['btn_text']);  ?><i class="ei ei-arrow_right"></i></a>
                                    <?php } ?>
                                    </div><!-- /.tab-header -->
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>




                        </ul>
                        <!-- gp-tabs-navigation -->
                    </nav>
                </div>
                <!-- /.col-lg-5 -->
                <div class="col-lg-7">
                    <div class="tab-content-inner">
                        <div class="gp-tabs-content">

                        <?php foreach ($advance_tab as $key => $tabitem) :
                            $active = ($key == 0) ? 'active-tab' : ''; ?>

                            <div data-content="<?php echo esc_attr($id_int . '-' . $key); ?>" class="pix-tab-item <?php echo esc_attr( $active); ?>">
                                <div class="inspect-tab-image">
                                
                                <?php if($tabitem['content_layout'] == 'layout1') { ?>

                                    <?php if(! empty($tabitem['tab_image_top']['url'])) { ?>
                                        <div class="image-top">
                                            <img src="<?php echo esc_url($tabitem['tab_image_top']['url']) ?>" alt="<?php echo esc_attr(saaspik_get_alt_name($tabitem['title'])) ?>">
                                        </div>
                                    <?php } ?>
                                    
                                    <?php if(! empty($tabitem['tab_image_bottom']['url'])) { ?>
                                        <div class="image-bottom">
                                            <img src="<?php echo esc_url($tabitem['tab_image_bottom']['url']) ?>" alt="<?php echo esc_attr(saaspik_get_alt_name($tabitem['title'])) ?>">
                                        </div>
                                    <?php } ?>    
                                        
                                    <?php if(! empty($tabitem['tab_image_left']['url'])) { ?>
                                        <div class="image-left">
                                            <img src="<?php echo esc_url($tabitem['tab_image_left']['url']) ?>" alt="<?php echo esc_attr(saaspik_get_alt_name($tabitem['title'])) ?>">
                                        </div>
                                    <?php } ?>   
                                
                                    <?php } elseif ($tabitem['content_layout'] == 'layout2') { ?>

                                        <?php if(! empty($tabitem['tab_image_top']['url'])) { ?>
                                        <div class="image-single">
                                            <img src="<?php echo esc_url($tabitem['tab_image_top']['url']) ?>" alt="<?php echo esc_attr(saaspik_get_alt_name($tabitem['title'])) ?>">
                                        </div>

                                    <?php } ?>                                    
                                   

                                    <?php } elseif ($tabitem['content_layout'] == 'layout3') { ?>                                       
                                      
                                            <?php if(! empty($tabitem['tab_image_top']['url'])) { ?>
                                                <div class="image-top">
                                                    <img src="<?php echo esc_url($tabitem['tab_image_top']['url']) ?>" alt="<?php echo esc_attr(saaspik_get_alt_name($tabitem['title'])) ?>">
                                                </div>
                                            <?php } ?>
                                            
                                            <?php if(! empty($tabitem['tab_image_bottom']['url'])) { ?>
                                                <div class="image-right">
                                                    <img src="<?php echo esc_url($tabitem['tab_image_bottom']['url']) ?>" alt="<?php echo esc_attr(saaspik_get_alt_name($tabitem['title'])) ?>">
                                                </div>
                                            <?php } ?>    
                                                
                                            <?php if(! empty($tabitem['tab_image_left']['url'])) { ?>
                                                <div class="image-left index-top">
                                                    <img src="<?php echo esc_url($tabitem['tab_image_left']['url']) ?>" alt="<?php echo esc_attr(saaspik_get_alt_name($tabitem['title'])) ?>">
                                                </div>
                                            <?php } ?> 
                                 

                                    <?php } ?>

                                </div>
                            </div>
                            
                        <?php  endforeach;  ?>   

                        </div>
                        <!-- gp-tabs-content -->
                    </div>
                    <!-- /.tab-content-inner -->

                </div>
                <!-- /.col-lg-7 -->
            </div>
            <!-- /.row -->
        </div>









        <?php
    }
}