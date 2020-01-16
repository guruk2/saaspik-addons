<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Image Tab
 *
 * Elementor widget for Image Tab.
 *
 * @since 1.7.0
 */
class Saaspik_Image_Tab extends Widget_Base {

    public function get_name() {
        return 'saaspik-image-tab';
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
            'iapp_advance_tab', [
                'label' => __( 'Advance Tab', 'saaspik-addons' ),
            ]
        );

        $this->add_control(
			'title_text', [
				'label'			 => esc_html__( 'Heading Title', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Section Title', 'saaspik-addons' ),
				'default'		 => esc_html__( 'Revolutionize your online business today', 'saaspik-addons' ),
			]
		);
 
		$this->add_control(
			'sub_title', [
				'label'			 => esc_html__( 'Heading Sub Title', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Sub Title', 'saaspik-addons' ),
				'default'		 => 'UPDATED SCREEN',
				'separator' => 'none',
			]
        );
        
        
		$this->add_responsive_control(
			'title_align', [
				'label'			 =>esc_html__( 'Alignment', 'saaspik-addons' ),
				'type'			 => Controls_Manager::CHOOSE,
				'options'		 => [

					'left'		 => [
						'title'	 =>esc_html__( 'Left', 'saaspik-addons' ),
						'icon'	 => 'fa fa-align-left',
					],
					'center'	 => [
						'title'	 =>esc_html__( 'Center', 'saaspik-addons' ),
						'icon'	 => 'fa fa-align-center',
					],
					'right'		 => [
						'title'	 =>esc_html__( 'Right', 'saaspik-addons' ),
						'icon'	 => 'fa fa-align-right',
					],
					'justify'	 => [
						'title'	 =>esc_html__( 'Justified', 'saaspik-addons' ),
						'icon'	 => 'fa fa-align-justify',
					],
				],
				'default'		 => 'center',
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'text-align: {{VALUE}};'
				],
			]
		);

        $this->add_control(
            'advance_tab', [
                'label' => __( 'Tab Items', 'saaspik-addons' ),
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
                        'name' => 'tab_image',
                        'label' => __( 'Tab Image', 'saaspik-addons' ),
                        'type' => Controls_Manager::MEDIA,                      
                        'label_block' => true,
                    ],
                ],

                'default' => [
					[
						'title' => __( 'Optimal Choice', 'saaspik-addons' ),
						'tab_image' => [
                            'url' => plugins_url('images/r1.jpg', __FILE__)
                        ],
					],
					[
						'title' => __( 'Optimal Choice', 'saaspik-addons' ),
						'tab_image' => [
                            'url' => plugins_url('images/r2.jpg', __FILE__)
                        ],
					],
					[
						'title' => __( 'Optimal Choice', 'saaspik-addons' ),
						'tab_image' => [
                            'url' => plugins_url('images/r3.jpg', __FILE__)
                        ],
					],
					[
						'title' => __( 'Optimal Choice', 'saaspik-addons' ),
						'tab_image' => [
                            'url' => plugins_url('images/r4.jpg', __FILE__)
                        ],
					],
				],
            ]
        );
        $this->end_controls_section(); // End Buttons

        $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Bankground Angle Shape', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Change Angle Background', 'saaspik-addons' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .bg-angle',
			]
		);      

        $this->end_controls_section(); // End Background

        $this->start_controls_section(
			'content_section_tabs',
			[
				'label' => __( 'Tabs Links', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'tab_link_color',
			[
				'label' => __( 'Tab Link color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,			
				'selectors' => [
					'{{WRAPPER}} #pix-tabs-nav li a' => 'color: {{VALUE}}',
				],
			]
        );
        
        $this->add_control(
			'tab_link_color_hover',
			[
				'label' => __( 'Tab Link Hover Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,			
				'selectors' => [
					'{{WRAPPER}} #pix-tabs-nav li a:hover,
					{{WRAPPER}} #pix-tabs-nav li.active a' => 'color: {{VALUE}}',
				],
			]
        ); 
        
        $this->add_control(
			'tab_link_background',
			[
				'label' => __( 'Tab Link Hover and Active Background', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,			
				'selectors' => [
					'{{WRAPPER}} #pix-tabs-nav li a:hover,
					{{WRAPPER}} #pix-tabs-nav li.active a' => 'background: {{VALUE}}',
				],
			]
        );         

        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'tab_link_shadow',
				'selector' => '{{WRAPPER}} #pix-tabs-nav li.active a, {{WRAPPER}} #pix-tabs-nav li a:hover',
			]
		);


        $this->end_controls_section(); // End Background


        $this->start_controls_section(
			'image_shadow',
			[
				'label' => __( 'Tab Image', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'tab_image_shadow',
				'selector' => '{{WRAPPER}} #pix-tabs-content .content img, {{WRAPPER}} #pix-tabs-content .content .shape-shadow',
			]
		);  

        $this->end_controls_section(); // End Background


    }

    protected function render() {

        $settings = $this->get_settings();
        $title = $settings[ 'title_text' ];
		$sub_title = $settings[ 'sub_title' ];
        $advance_tab = $settings['advance_tab'];
        $title_align = $settings['title_align'];

        ?>
        <div class="container">
            <div class="bg-angle"></div>
            <!-- /.bg-angle -->

            <?php if ($sub_title || $title ) {?>
                <div class="section-title dark-title wow pixFadeUp  <?php echo esc_attr('text-'.$title_align); ?>">
                    <?php if(!empty($sub_title)): ?>
                        <h3 class="sub-title"><?php echo $sub_title; ?></h3>
                    <?php endif; ?>
                    <?php if(!empty($title)): ?>
                        <h2 class="title"><?php echo $title;?></h2>
                    <?php endif; ?>
                </div>
            <?php }?>


            <div class="pix-tabs wow pixFadeUp" data-wow-delay="0.3s">
                
                <ul id="pix-tabs-nav">
                    <?php 
                    $id_int = 'tabs-id-' . substr($this->get_id_int(), 0, 3);
                    foreach ($advance_tab as $key => $tabitem) :
                        $active = ($key == 0) ? 'active' : ''; ?>
                        <li class="tab-link <?php echo esc_attr($active); ?>">
                            <a href="#<?php echo esc_attr($id_int . '-' . $key); ?>"><?php echo esc_html($tabitem['title']); ?></a>                          
                        </li>
                    <?php endforeach; ?>
                </ul>
            

                <div id="pix-tabs-content">
                    <?php foreach ($advance_tab as $key => $tabitem) : ?>
                        <div class="content" id="<?php echo esc_attr($id_int . '-' . $key); ?>">
                            <?php echo wp_get_attachment_image( $tabitem['tab_image']['id'], 'saaspik-image-tab' ); ?>
                            <div class="shape-shadow"></div>
                        </div>
                    <?php endforeach;  ?>                 
                </div>

            </div><!-- /.saaspik-advance-tabs -->
        </div>
        <!-- /.container -->
        <?php
    }
}