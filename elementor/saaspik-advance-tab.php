<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/**
 * Get About.
 *
 * Retrieve saaspik advance Tab.
 *
 * @since 2.0.0
 * @access public
 *
 * @return string Saaspik Advance Tab.
 */

class Saaspik_Advance_Tab_Widget extends Widget_Base {

    public function get_name() {
        return 'saaspik-tab';
    }

    public function get_title() {
        return __( 'Saaspik Advance Tab', 'saaspik-addons' );
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
                'label' => __( 'Advance Tab', 'saaspik-addons' ),
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
                        'default' => 'Optimal Choice'
                    ],
                    [
                        'name' => 'description',
                        'label' => __( 'Description', 'saaspik-addons' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'label_block' => true,                        
                    ],  
                    [
                        'name' => 'ficon',
                        'label' => __( 'Choose Icon', 'saaspik-addons' ),
                        'type' => Controls_Manager::ICON,
                        'options' => saaspik_themify_icons(),
                        'include' => saaspik_include_themify_icons(),
                        'default' => 'ti-panel',
                    ],
                    [
                        'name' => 'tab_image',
                        'label' => __( 'Tab Image', 'saaspik-addons' ),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
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
                    'unit' => 'px',
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
                    'unit' => 'px',
                    'isLinked' => false,
                ],
            ]
        );

        $this->add_control(
            'align',
            [
                'label' => __( 'Alignment', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'plugin-domain' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'plugin-domain' ),
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
                'label' => __( 'Image Contrast', 'plugin-domain' ),
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
                'label' => __( 'Image Contrast on Hover', 'plugin-domain' ),
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
        <div class="iapp-advance-tabs">
            <div class="row">
                <div class="col-md-7">
                    <ul class="tabs-menu">
                        <?php 
                        $id_int = 'tabs-id-' . substr($this->get_id_int(), 0, 3);
                        foreach ($advance_tab as $key => $tabitem) :
                            $active = ($key == 0) ? 'active show' : ''; ?>
                            <li class="tab-link">
                                <?php  if($tabitem['ficon']) : ?>
                                    <div class="icon-left">
                                        <i class="<?php echo esc_attr($tabitem['ficon']) ?>"></i>
                                    </div><!-- /.icon-left -->
                                <?php endif; ?>

                                <div class="tab-header">
                                    <h4 class="tab-title">
                                        <a href="#<?php echo esc_attr($id_int . '-' . $key); ?>"><?php echo esc_html($tabitem['title']); ?></a>
                                    </h4>

                                    <?php  if($tabitem['description']) : ?>
                                        <p><?php echo esc_html($tabitem['description']) ?></p>
                                    <?php endif; ?>
                                </div><!-- /.tab-header -->
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div><!-- /.col-md-7 -->

                <div class="col-md-5">
                    <div class="tabs-content">
                        <?php foreach ($advance_tab as $key => $tabitem) : ?>
                            <div class="tab-items" id="<?php echo esc_attr($id_int . '-' . $key); ?>">
                                <img src="<?php echo esc_url($tabitem['tab_image']['url']) ?>" alt="<?php echo esc_attr(saaspik_get_alt_name($item['title_image']['id'])) ?>">
                            </div>
                        <?php  endforeach;  ?>                 
                    </div>
                </div><!-- /.col-md-5 -->

            </div><!-- /.row -->
        </div><!-- /.iapp-advance-tabs -->
        <?php
    }
}