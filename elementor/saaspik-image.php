<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Saaspik_Image extends Widget_Base {

    /**
    * Get widget name.
    *
    * Retrieve alert widget name.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string Widget name.
    */
    public function get_name() {
        return 'saspik_image';
    }

    // public function get_id() {
    //    	return 'header-search';
    // }

    public function get_title() {
        return __( 'Saaspik Image', 'saaspik-addons' );
    }

    public function get_icon() {
        // Icon name from the Elementor font file, as per http://dtbaker.net/web-development/creating-your-own-custom-elementor-widgets/
        return 'eicon-image';
    }

    /**
    * Get widget categories.
    *
    * Retrieve the widget categories.
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
	 * Retrieve the list of scripts the image widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'jquery-magnific-popup' ];
	}

    

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Content', 'saaspik-addons' ),
            ]
        );
        $this->add_control(
            'image',
                [
                    'label' => __( 'Choose Image', 'saaspik-addons' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
        ); 
	
        $this->add_control(
            'show_btn_video',
            [
                'label' => __( 'Show video button', 'saaspik-addons' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' => __( 'Show', 'saaspik-addons' ),
                'label_off' => __( 'Hide', 'saaspik-addons' ),
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'link_video',
            [
                'label' => __( 'URL Video', 'saaspik-addons' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => '',
                ],
                'condition' => [
                    'show_btn_video' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);
        $this->add_control(
            'show_title_image',
            [
                'label' => __( 'Show Image Title', 'saaspik-addons' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' => __( 'Show', 'saaspik-addons' ),
                'label_off' => __( 'Hide', 'saaspik-addons' ),
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'saaspik-addons' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Demo',
                'condition' => [
                    'show_title_image' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'link',
            [
                'label' => __( 'URL', 'saaspik-addons' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => '',
                ],
                'condition' => [
                    'show_title_image' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'show_title_new',
            [
                'label' => __( 'Used when it is a new product.', 'saaspik-addons' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' => __( 'Show', 'saaspik-addons' ),
                'label_off' => __( 'Hide', 'saaspik-addons' ),
                'return_value' => 'yes',
                'condition' => [
                    'show_title_image' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'title_new',
            [
                'label' => __( 'Title', 'saaspik-addons' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'New',
                'condition' => [
                    'show_title_new' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'is_external',
            [
                'label' => __( 'Is External Links', 'saaspik-addons' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __( 'Show', 'saaspik-addons' ),
                'label_off' => __( 'Hide', 'saaspik-addons' ),
                'return_value' => 'yes',
                'condition' => [
                    'show_title_image' => 'yes',
                ],
            ]
        );


        $this->end_controls_section();

    }

    protected function render( ) {

        $settings = $this->get_settings();
        $image = $settings['image'];
        $title = $settings['title'];
        $link = $settings['link'];
        $link_video = $settings['link_video'];
        $target = $settings['is_external'] == 'yes'? ' target="_blank"':'';

        $css_wrap = "image-wrapper";
        $css_img = "";
        if($settings['show_btn_video'] === 'yes') {
            $css_wrap .= " p-relative img-video";
            $css_img .= "feature-image";
        }
        if($settings['show_title_image'] === 'yes') {
            $css_wrap .= " img-show-title";
            $css_img .= "title-bg";
        }
        if($settings['show_btn_video'] === 'yes' && $settings['show_title_image'] === 'yes') {
            $css_wrap .= " p-relative img-show-title-video";
            $css_img .= "video-image";
        }

        ?>
        <div class="<?php echo $css_wrap; ?>">
            <?php if($settings['show_btn_video'] === 'yes'): ?>
                <img class="<?php echo $css_img; ?>" src="<?php if($image['url']!= '') echo $image['url']; ?>" alt="">
            <?php else: ?>
                <a href="<?php if($link['url']!= '') echo $link['url']; ?>" <?php echo $target; ?>>
                    <img class="<?php echo $css_img; ?>" src="<?php if($image['url']!= '') echo $image['url']; ?>" alt="">
                </a>
            <?php endif; ?>
            
            <?php if($settings['show_btn_video'] === 'yes' || $settings['show_title_image'] === 'yes'): ?>
                <div class="content-inner">
                    <?php if($settings['show_btn_video'] === 'yes'): ?>
                        <a class="popup-play-btn popup-video" href="<?php if($link_video['url']!= '') echo $link_video['url']; ?>" <?php echo $target; ?> data-lity=""><i class="ei ei-arrow_triangle-right"></i></a>
                    <?php endif ?>
                    <?php if($settings['show_title_image'] === 'yes'): ?>
                        <h6 class="image-title" href="<?php if($link['url']!= '') echo $link['url']; ?>" <?php echo $target; ?>>
                            <h6><?php echo $title; ?>
                                <?php if($settings['show_title_new'] === 'yes'): ?>
                                    <span class="title"><?php echo $settings['title_new']; ?></span>
                                <?php endif; ?>
                            </h6>
                        </h6>
                    <?php endif; ?>
                </div>
            <?php endif; ?>           
        </div>
        <?php

    }

    // protected function _content_template() {
    //     
    //     <div class="section-title">
    //         <# if(settings.title){ #><h2>{{{settings.title}}}</h2><# } #>
    //         <# if(settings.over_title){ #><div class="section-subtitle">{{{settings.over_title}}}</div><# } #>
    //         <# if(settings.show_sep == 'yes'){ #><span class="section-separator"></span><# } #>
    //         {{{settings.sub_title}}}
    //     </div>
    //     <?php

    // }

   
   

}
