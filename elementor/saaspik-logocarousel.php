<?PHP

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Saaspik_Logo_Carousel_Widget extends Widget_Base {

    public function get_name() {
        return 'saaspik-partner';
    }

    public function get_title() {
        return esc_html__( 'Saaspik Logo Carousel', 'saaspik-addons' );
    }

    public function get_icon() {
        return ' eicon-carousel';
    }

    public function get_categories() {
        return [ 'saaspik-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Saaspik Logo Carousel', 'saaspik-addons'),
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
            'logo',
            [
                'label' => esc_html__('Slider', 'saaspik-addons'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [ 'link' => esc_url('#') ],
                    [ 'link' => esc_url('#') ],
                ],
                'fields' => [

                    [
                        'name' => 'image',
                        'label' => esc_html__('Image', 'saaspik-addons'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                    ],

                    [
                        'name' => 'link',
                        'label' => esc_html__('Link', 'saaspik-addons'),
                        'type' => Controls_Manager::URL,
                    ],

                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style', [
                'label'	 =>esc_html__( 'Style', 'saaspik-addons' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'opacity',
            [
                'label' => esc_html__('Opacity', 'saaspik-addons'),
                'type' => Controls_Manager::TEXT,
				'selectors' => [
					'{{WRAPPER}} .client-slider-style2 .item img' => 'opacity: {{VALUE}};',
				],
            ]
        );
        $this->end_controls_section();

    }

    protected function render( ) {
        $settings = $this->get_settings();
        $style = $settings['style'];
        $logo = $settings['logo']; 
        $wrapper_class = ($style == 'style2') ? 'client-slider-style2' : '';
        ?>
        <div class="swiper-container logo-carousel <?php echo esc_attr($wrapper_class); ?>" id="logo-carousel" data-perpage="6" data-space="20" data-breakpoints='{"1024": {"slidesPerView": 4}, "768": {"slidesPerView": 4}, "640": {"slidesPerView": 3}}'>
            <div class="swiper-wrapper">

         
            <?php if(is_array($logo)): ?>
                <?php foreach($logo as $logos): ?>
                    <?php $btn_link = (! empty( $logos['link']['url'])) ? $logos['link']['url'] : ''; ?>
                    <?php $btn_target = ( $logos['link']['is_external']) ? '_blank' : '_self'; ?>
                    <?php if(!empty($logos['image']['url'])): ?>
                        <?php
                        if(!empty($logos['image']['id'])){
                            $alt = get_post_meta($logos['image']['id'], '_wp_attachment_image_alt', true);
                            if(!empty($alt)) {
                                $alt = $alt;
                            }else{
                                $alt = get_the_title($logos['image']['id']);
                            }
                        }
                        ?>
                        <div class="swiper-slide">
                            <a href="<?php echo esc_url( $btn_link ); ?>" class="brand-logo" target="<?php echo esc_html( $btn_target ); ?>"> 
                                <img src="<?php echo esc_url($logos['image']['url'])?>" alt="<?php echo esc_attr($alt); ?>">
                            </a>
                        </div>
                       
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        </div>
            <!-- /.swiper-wrapper -->
        <?php
    }

    protected function _content_template() { }
}