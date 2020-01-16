<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get Saaspik Accordion.
 *
 * Retrieve accordion Saaspik Accordion.
 *
 * @since 2.0.0
 * @access public
 *
 * @return string Saaspik Accordion.
 */

class Saaspik_Accordion extends Widget_Base {


public function get_name() {
    return 'saaspik-accordion';
}

/**
 * Get widget title.
 *
 * Retrieve accordion widget title.
 *
 * @since 1.0.0
 * @access public
 *
 * @return string Widget title.
 */
public function get_title() {
    return __( 'Saaspik Accordion', 'saaspik-addons' );
}

/**
 * Get widget icon.
 *
 * Retrieve accordion widget icon.
 *
 * @since 1.0.0
 * @access public
 *
 * @return string Widget icon.
 */
public function get_icon() {
    return 'eicon-accordion';
}

/**
 * Get widget categories.
 *
 * Retrieve the list of categories the accordion widget belongs to.
 *
 * Used to determine where to display the widget in the editor.
 *
 * @since 1.0.0
 * @access public
 *
 * @return array Widget categories.
 */
public function get_categories() {
    return [ 'saapik-elements' ];
}

/**
 * Register accordion widget controls.
 *
 * Adds different input fields to allow the user to change and customize the widget settings.
 *
 * @since 1.0.0
 * @access protected
 */
protected function _register_controls() {
    $this->start_controls_section(
        'section_title',
        [
            'label' => __( 'Saaspik Accordion', 'saaspik-addons' ),
        ]
    );

    $this->add_control(
        'tabs',
        [
            'label' => __( 'Accordion Items', 'saaspik-addons' ),
            'type' => Controls_Manager::REPEATER,
            'default' => [
                [
                    'tab_title' => __( 'Accordion #1', 'saaspik-addons' ),
                    'tab_content' => __( 'I am item content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'saaspik-addons' ),
                ],
                [
                    'tab_title' => __( 'Accordion #2', 'saaspik-addons' ),
                    'tab_content' => __( 'I am item content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'saaspik-addons' ),
                ],
            ],
            'fields' => [
                [
                    'name' => 'tab_title',
                    'label' => __( 'Title & Content', 'saaspik-addons' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Accordion Title' , 'saaspik-addons' ),
                    'label_block' => true,
                ],
                [
                    'name' => 'tab_content',
                    'label' => __( 'Content', 'saaspik-addons' ),
                    'type' => Controls_Manager::WYSIWYG,
                    'default' => __( 'Accordion Content', 'saaspik-addons' ),
                    'show_label' => false,
                ],
            ],
            'title_field' => '{{{ tab_title }}}',
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
        'section_title_style',
        [
            'label' => __( 'Accordion', 'saaspik-addons' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'icon_align',
        [
            'label' => __( 'Icon Alignment', 'saaspik-addons' ),
            'type' => Controls_Manager::SELECT,
            'default' => is_rtl() ? 'right' : 'left',
            'options' => [
                'left' => __( 'Left', 'saaspik-addons' ),
                'right' => __( 'Right', 'saaspik-addons' ),
            ],
        ]
    );

    $this->add_control(
        'border_width',
        [
            'label' => __( 'Border Width', 'saaspik-addons' ),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 1,
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 10,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .elementor-accordion .elementor-accordion-item' => 'border-width: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .elementor-accordion .elementor-tab-content' => 'border-width: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .elementor-accordion .elementor-accordion-wrapper .elementor-tab-title.elementor-active > span' => 'border-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'border_color',
        [
            'label' => __( 'Border Color', 'saaspik-addons' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .elementor-accordion .elementor-accordion-item' => 'border-color: {{VALUE}};',
                '{{WRAPPER}} .elementor-accordion .elementor-tab-content' => 'border-top-color: {{VALUE}};',
                '{{WRAPPER}} .elementor-accordion .elementor-accordion-wrapper .elementor-tab-title.elementor-active > span' => 'border-bottom-color: {{VALUE}};',
            ],
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

    $this->add_control(
        'title_background',
        [
            'label' => __( 'Background', 'saaspik-addons' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .elementor-accordion .elementor-tab-title' => 'background-color: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'title_color',
        [
            'label' => __( 'Color', 'saaspik-addons' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .elementor-accordion .elementor-tab-title' => 'color: {{VALUE}};',
            ],
            'scheme' => [
                'type' => Scheme_Color::get_type(),
                'value' => Scheme_Color::COLOR_1,
            ],
        ]
    );

    $this->add_control(
        'tab_active_color',
        [
            'label' => __( 'Active Color', 'saaspik-addons' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .elementor-accordion .elementor-tab-title.elementor-active' => 'color: {{VALUE}};',
            ],
            'scheme' => [
                'type' => Scheme_Color::get_type(),
                'value' => Scheme_Color::COLOR_4,
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'title_typography',
            'selector' => '{{WRAPPER}} .elementor-accordion .elementor-tab-title',
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
        ]
    );

    $this->add_control(
        'heading_content',
        [
            'label' => __( 'Content', 'saaspik-addons' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'content_background_color',
        [
            'label' => __( 'Background', 'saaspik-addons' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .elementor-accordion .elementor-tab-content' => 'background-color: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'content_color',
        [
            'label' => __( 'Color', 'saaspik-addons' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .elementor-accordion .elementor-tab-content' => 'color: {{VALUE}};',
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
            'name' => 'content_typography',
            'selector' => '{{WRAPPER}} .elementor-accordion .elementor-tab-content',
            'scheme' => Scheme_Typography::TYPOGRAPHY_3,
        ]
    );

    $this->end_controls_section();
}

/**
 * Render accordion widget output on the frontend.
 *
 * Written in PHP and used to generate the final HTML.
 *
 * @since 1.0.0
 * @access protected
 */
protected function render() {
    $settings = $this->get_settings();

    $id_int = substr( $this->get_id_int(), 0, 3 );
    $id_int2 = substr( $this->get_id_int(), 0, 3 );
    $id_int3 = substr( $this->get_id_int(), 0, 3 );
    ?>
    <div id="<?php echo $id_int2 ?>" class="faq faq-two" role="tablist">
        <?php foreach ( $settings['tabs'] as $index => $item ) :
            $tab_count = $index + 1;          

            $tab_content_setting_key = $this->get_repeater_setting_key( 'tab_content', 'tabs', $index );
            $show_class = $tab_count = 1 ? 'show' : '';
            
            $this->add_render_attribute( $tab_content_setting_key, [
                'class' => ['collapse', $show_class ],
                'id' => $id_int . $tab_count,
                'data-parent' => $id_int2,
                'aria-labelledby' => $id_int3 . $tab_count
            ] );

            $this->add_inline_editing_attributes( $tab_content_setting_key, 'advanced' );
            ?>
            <div class="card active">
                <div class="card-header" id="<?php echo $id_int3 . $tab_count; ?>">
                <h5>
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#<?php echo $id_int . $tab_count; ?>" aria-expanded="false" aria-controls="<?php echo $id_int . $tab_count; ?>">
                        <span class="elementor-accordion-icon elementor-accordion-icon-<?php echo $settings['icon_align']; ?>">
                            <i class="fa"></i>
                        </span>
                        <?php echo $item['tab_title']; ?>
                    </button>
                </h5>
                </div>
                <div <?php echo $this->get_render_attribute_string( $tab_content_setting_key ); ?>>
                    <div class="card-body">
                        <?php echo $this->parse_text_editor( $item['tab_content'] ); ?>
                    </div>
                </div>
            </div>


        <?php endforeach; ?>
    </div>
    <?php
}

/**
 * Render accordion widget output in the editor.
 *
 * Written as a Backbone JavaScript template and used to generate the live preview.
 *
 * @since 1.0.0
 * @access protected
 */
protected function _content_template() {
    ?>
    <div class="elementor-accordion" role="tablist">
        <#
        if ( settings.tabs ) {
            var tabindex = view.getIDInt().toString().substr( 0, 3 );

            _.each( settings.tabs, function( item, index ) {
                var tabCount = index + 1,
                    tabContentKey = view.getRepeaterSettingKey( 'tab_content', 'tabs', index );

                view.addRenderAttribute( tabContentKey, {
                    'class': [ 'elementor-tab-content', 'elementor-clearfix' ],
                    'data-tab': tabCount,
                    'role': 'tabpanel'
                } );

                view.addInlineEditingAttributes( tabContentKey, 'advanced' );
                #>
                <div class="elementor-accordion-item">
                    <div class="elementor-tab-title" tabindex="{{ tabindex + tabCount }}" data-tab="{{ tabCount }}" role="tab">
                        <span class="elementor-accordion-icon elementor-accordion-icon-{{ settings.icon_align }}">
                            <i class="fa"></i>
                        </span>
                        {{{ item.tab_title }}}
                    </div>
                    <div {{{ view.getRenderAttributeString( tabContentKey ) }}}>{{{ item.tab_content }}}</div>
                </div>
            <#
            } );
        } #>
    </div>
    <?php
}
}