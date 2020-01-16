<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;



/**
 * Text Typing Effect
 *
 * Elementor widget for text typing effect.
 *
 * @since 1.7.0
 */
class Saaspik_Parallax_Images_Two extends Widget_Base {

    public function get_name() {
        return 'saaspik_parallax_images_two';
    }

    public function get_title() {
        return __( 'Saaspik Images With Content Two', 'saaspik-addons' );
    }

    public function get_icon() {
        return 'eicon-featured-image';
    }

    public function get_categories() {
        return [ 'saaspik-elements' ];
    }

	protected function _register_controls() {

		//============================================
		// CONTENT TOP SECTION
		//============================================
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Content Top', 'saaspik-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,				
			]
		);

		//-----------------------------------------------------
		// Content Tab
		//-----------------------------------------------------
		$this->start_controls_tabs(
			'content_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => __( 'Content', 'saaspik-addons' ),
			]
		);


		$this->add_control(
			'content_heading',
			[
				'label' => __( 'Content', 'saaspik-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        
		$this->add_control(
			'title_text', [
				'label'			 => esc_html__( 'Heading Title', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Heading Title', 'saaspik-addons' ),
				'default'		 => esc_html__( 'Genera informes  completos con un solo', 'saaspik-addons' ),
			]
		);
 
		$this->add_control(
			'sub_title', [
				'label'			 => esc_html__( 'Heading Sub Title', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Sub Title', 'saaspik-addons' ),
				'default'		 => 'Burke blow off arse gutted mate what a plonker cup of tea fantastic get stuffed mate.!',
				'separator' => 'none',
			]
		);


		$this->add_control(
			'description_text', [
				'label'			 => esc_html__( 'Heading Description', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Description Text', 'saaspik-addons' ),
				'default'		 => 'The bees knees off his nut cack its all gone to pot tinkety tonk old fruit blow off, tosser codswallop I chinwag. Brilliant bobby haggle James Bond tickety-boo horse play is spend a penny gutted mate absolutely.!',
                'rows'           => 10,
                'condition' => [
                    'content_style' => ['style1']
                ]
			]
        );
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'Title', 'saaspik-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'saaspik-addons' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_color',
			[
				'label' => __( 'Color', 'saaspik-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
				],
			]
		);

		$repeater->add_control(
			'icon',
			[
				'label' => __( 'Choose Icon', 'saaspik-addons' ),
				'type' => Controls_Manager::ICON,
				'options' => saaspik_elegant_icons(),
				'include' => saaspik_include_elegant_icons(),
				'default' => 'ti-panel',			
			]
		);

		$this->add_control(
			'list_items',
			[
				'label' => __( 'Repeater List', 'saaspik-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Title #1', 'saaspik-addons' ),
						// 'list_content' => __( 'Item content. Click the edit button to change this text.', 'saaspik-addons' ),
					],
					[
						'list_title' => __( 'Title #2', 'saaspik-addons' ),
						// 'list_content' => __( 'Item content. Click the edit button to change this text.', 'saaspik-addons' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

        $this->add_control(
			'link',
			[
				'label' => __( 'Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
				'separator' => 'before',
			]
        );
        
        $this->add_control(
			'link_title',
			[
				'label' => __( 'Button Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => 'http://your-link.com',
                'default'      => 'Learn More',
				'separator' => 'before',
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
				'default'		 => 'left',
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'text-align: {{VALUE}};'
				],
			]
		);

		$this->end_controls_tab();

		//-----------------------------------------------------
		// Image Tab
		//-----------------------------------------------------
		$this->start_controls_tab(
			'image_tab',
			[
				'label' => __( 'Image', 'saaspik-addons' ),
			]
		);

		$this->add_control(

            'image_type', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Image Type', 'saaspik-addons'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Static Parallax Image', 'saaspik-addons'),
                    'style2' => esc_html__('Fixed Animate Image', 'saaspik-addons'),                 
                ],
            ]
		);

		$this->add_control(
			'left_image',
			[
				'label' => __( 'Left Image', 'saaspik-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],			
			]
		);

		$this->add_control(
			'right_image',
			[
				'label' => __( 'Right Image Image', 'saaspik-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],			
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		//======================================================================
		// CONTENT BOTTOM SECTION
		//======================================================================
		
		$this->start_controls_section(
			'bottom_section',
			[
				'label' => __( 'Content Bottom', 'saaspik-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
				
			]
		);

		//-----------------------------------------------------
		// Bottom Content
		//-----------------------------------------------------

		$this->start_controls_tabs(
			'content_tabs_two'
		);

		$this->start_controls_tab(
			'style_normal_tab_two',
			[
				'label' => __( 'Content', 'saaspik-addons' ),
			]
		);


		$this->add_control(
			'content_heading_two',
			[
				'label' => __( 'Content', 'saaspik-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        
		$this->add_control(
			'title_text_two', [
				'label'			 => esc_html__( 'Heading Title', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Heading Title', 'saaspik-addons' ),
				'default'		 => esc_html__( 'Super clean user interface for easier use.', 'saaspik-addons' ),
			]
		);
 
		$this->add_control(
			'sub_title_two', [
				'label'			 => esc_html__( 'Heading Sub Title', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Sub Title', 'saaspik-addons' ),
				'default'		 => 'Burke blow off arse gutted mate what a plonker cup of tea fantastic get stuffed mate.!',
				'separator' => 'none',
			]
		);


		$this->add_control(
			'description_text_two', [
				'label'			 => esc_html__( 'Heading Description', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Description Text', 'saaspik-addons' ),
				'default'		 => 'The bees knees off his nut cack its all gone to pot tinkety tonk old fruit blow off, tosser codswallop I chinwag. Brilliant bobby haggle James Bond tickety-boo horse play is spend a penny gutted mate absolutely.!',
                'rows'           => 10,
                'condition' => [
                    'content_style' => ['style1']
                ]
			]
        );
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title_two', [
				'label' => __( 'Title', 'saaspik-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'saaspik-addons' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'icon_two',
			[
				'label' => __( 'Choose Icon', 'saaspik-addons' ),
				'type' => Controls_Manager::ICON,
				'options' => saaspik_elegant_icons(),
				'include' => saaspik_include_elegant_icons(),
				'default' => 'ti-panel',			
			]
		);

		$this->add_control(
			'list_items_two',
			[
				'label' => __( 'Repeater List', 'saaspik-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title_two' => __( 'Title #1', 'saaspik-addons' ),
						// 'list_content' => __( 'Item content. Click the edit button to change this text.', 'saaspik-addons' ),
					],
					[
						'list_title_two' => __( 'Title #2', 'saaspik-addons' ),
						// 'list_content' => __( 'Item content. Click the edit button to change this text.', 'saaspik-addons' ),
					],
				],
				'title_field' => '{{{ list_title_two }}}',
			]
		);

        $this->add_control(
			'link_two',
			[
				'label' => __( 'Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
				'separator' => 'before',
			]
        );
        
        $this->add_control(
			'link_title_two',
			[
				'label' => __( 'Button Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => 'http://your-link.com',
                'default'      => 'Discover More',
				'separator' => 'before',
			]
		);

        $this->add_responsive_control(
			'title_align_two', [
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
				'default'		 => 'left',
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'text-align: {{VALUE}};'
				],
			]
		);

		$this->end_controls_tab();

		//-----------------------------------------------------
		// Bottom Image
		//-----------------------------------------------------
		$this->start_controls_tab(
			'image_tab_two',
			[
				'label' => __( 'Image', 'saaspik-addons' ),
			]
		);

		$this->add_control(

            'image_type_two', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Image Type', 'saaspik-addons'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Static Parallax Image', 'saaspik-addons'),
                    'style2' => esc_html__('Fixed Animate Image', 'saaspik-addons'),                 
                ],
            ]
		);

		$this->add_control(
			'left_image_two',
			[
				'label' => __( 'Left Image', 'saaspik-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],			
			]
		);

		$this->add_control(
			'right_image_two',
			[
				'label' => __( 'Right Image Image', 'saaspik-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],			
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	
		//======================================================================
		// SEPARATED ANIMATE BORDER
		//======================================================================
	
		$this->start_controls_section(
			'separator_section',
			[
				'label' => __( 'Separator', 'saaspik-aadons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_separator',
			[
				'label' => __( 'Show Separator', 'saaspik-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'saaspik-addons' ),
				'label_off' => __( 'Hide', 'saaspik-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'saaspik-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Default title', 'saaspik-addons' ),
			]
		);	

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();


		//======================================================================
		// Style Tabs
		//======================================================================

		//-----------------------------------------------------
		// Content Top
		//-----------------------------------------------------
		$this->start_controls_section(
			'style_content',
			[
				'label' => __( 'Content Top', 'saaspik-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_heading',
			[
				'label' => __( 'Title', 'plugin-name' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .interface-content .title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Typography', 'saaspik-addons' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .interface-content .title',
			]
		);

		$this->add_control(
			'des_heading',
			[
				'label' => __( 'Description', 'saaspik-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'des_color',
			[
				'label' => __( 'Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .interface-content .interface-title p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'des_typography',
				'label' => __( 'Typography', 'saaspik-addons' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .interface-content .interface-title p',
			]
		);

		$this->add_control(
			'feature_heading',
			[
				'label' => __( 'Feature', 'saaspik-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'fea_color',
			[
				'label' => __( 'Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .interface-content .list-items li' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'fea_typography',
				'label' => __( 'Typography', 'saaspik-addons' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .interface-content .list-items li',
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .interface-content .list-items li i' => 'color: {{VALUE}}',
				],
			]
		);

		/**
		 * Button Style
		 */
		$this->add_control(
			'button_heading',
			[
				'label' => __( 'Button', 'saaspik-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		/**
		 * Button Tab Start
		 */

		$this->start_controls_tabs(
			'btn_tabs'
		);

		$this->start_controls_tab(
			'btn_normal_tab',
			[
				'label' => __( 'Normal', 'plugin-name' ),
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => __( 'Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .pix-btn.btn-outline' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_background',
			[
				'label' => __( 'Background', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .pix-btn.btn-outline' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_border',
				'label' => __( 'Border', 'saaspik-addons' ),
				'selector' => '{{WRAPPER}} .pix-btn.btn-outline',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_box_shadow',
				'label' => __( 'Box Shadow', 'saaspik-addons' ),
				'selector' => '{{WRAPPER}} .pix-btn.btn-outline',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'label' => __( 'Typography', 'saaspik-addons' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .pix-btn.btn-outline',
			]
		);

		$this->end_controls_tab();

		/**
		 * Button Hover Tab Start
		 */
		$this->start_controls_tab(
			'btn_hover_tab',
			[
				'label' => __( 'Hover', 'plugin-name' ),
			]
		);

		$this->add_control(
			'button_color_hover',
			[
				'label' => __( 'Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .pix-btn.btn-outline:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_background_hover',
			[
				'label' => __( 'Background', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .pix-btn.btn-outline:hover' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_border_hover',
				'label' => __( 'Border', 'saaspik-addons' ),
				'selector' => '{{WRAPPER}} .pix-btn.btn-outline:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_box_shadow_hover',
				'label' => __( 'Box Shadow', 'saaspik-addons' ),
				'selector' => '{{WRAPPER}} .pix-btn.btn-outline:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography_hover',
				'label' => __( 'Typography', 'saaspik-addons' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .pix-btn.btn-outline:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();

		//======================================================================
		// BOTTOM CONTENT TABS
		//======================================================================

		//-----------------------------------------------------
		// Content Bottom
		//-----------------------------------------------------
		$this->start_controls_section(
			'style_content_two_two',
			[
				'label' => __( 'Content Bottom', 'saaspik-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_heading_two',
			[
				'label' => __( 'Title', 'plugin-name' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_color_two',
			[
				'label' => __( 'Title Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .interface-content .title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography_two',
				'label' => __( 'Typography', 'saaspik-addons' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .interface-content .title',
			]
		);

		$this->add_control(
			'des_heading_two',
			[
				'label' => __( 'Description', 'saaspik-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'des_color_two',
			[
				'label' => __( 'Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .interface-content .interface-title p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'des_typography_two',
				'label' => __( 'Typography', 'saaspik-addons' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .interface-content .interface-title p',
			]
		);

		$this->add_control(
			'feature_heading_two',
			[
				'label' => __( 'Feature', 'saaspik-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'fea_color_two',
			[
				'label' => __( 'Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .interface-content .list-items li' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'fea_typography_two',
				'label' => __( 'Typography', 'saaspik-addons' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .interface-content .list-items li',
			]
		);

		$this->add_control(
			'icon_color_two',
			[
				'label' => __( 'Icon Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .interface-content .list-items li i' => 'color: {{VALUE}}',
				],
			]
		);

		/**
		 * Button Style
		 */
		$this->add_control(
			'button_heading_two',
			[
				'label' => __( 'Button', 'saaspik-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		/**
		 * Button Tab Start
		 */

		$this->start_controls_tabs(
			'btn_tabs_two'
		);

		$this->start_controls_tab(
			'btn_normal_tab_two',
			[
				'label' => __( 'Normal', 'plugin-name' ),
			]
		);

		$this->add_control(
			'button_color_two',
			[
				'label' => __( 'Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .pix-btn.btn-outline' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_background_two',
			[
				'label' => __( 'Background', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .pix-btn.btn-outline' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_border_two',
				'label' => __( 'Border', 'saaspik-addons' ),
				'selector' => '{{WRAPPER}} .pix-btn.btn-outline',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_box_shadow_two',
				'label' => __( 'Box Shadow', 'saaspik-addons' ),
				'selector' => '{{WRAPPER}} .pix-btn.btn-outline',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography_two',
				'label' => __( 'Typography', 'saaspik-addons' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .pix-btn.btn-outline',
			]
		);

		$this->end_controls_tab();

		/**
		 * Button Hover Tab Start
		 */
		$this->start_controls_tab(
			'btn_hover_tab_two',
			[
				'label' => __( 'Hover', 'plugin-name' ),
			]
		);

		$this->add_control(
			'button_color_two_hover',
			[
				'label' => __( 'Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .pix-btn.btn-outline:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_background_two_hover',
			[
				'label' => __( 'Background', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,		
				'selectors' => [
					'{{WRAPPER}} .pix-btn.btn-outline:hover' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_border_two_hover',
				'label' => __( 'Border', 'saaspik-addons' ),
				'selector' => '{{WRAPPER}} .pix-btn.btn-outline:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_box_shadow_two_hover',
				'label' => __( 'Box Shadow', 'saaspik-addons' ),
				'selector' => '{{WRAPPER}} .pix-btn.btn-outline:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography_two_hover',
				'label' => __( 'Typography', 'saaspik-addons' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .pix-btn.btn-outline:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_section();

	}

    protected function render()  {
        $settings = $this->get_settings(); 
        $title = $settings[ 'title_text' ];
        $title_two = $settings[ 'title_text_two' ];
        $title_btn = $settings[ 'link_title' ];
        $title_btn_two = $settings[ 'link_title_two' ];
		$sub_title = $settings[ 'sub_title' ];
		$sub_title_two = $settings[ 'sub_title_two' ];
		$title_align = $settings[ 'title_align' ];
		$title_align_two = $settings[ 'title_align_two' ];
        $description_text = $settings[ 'description_text' ];
        $description_text_two = $settings[ 'description_text_two' ];
 
			

        $this->add_render_attribute('title_text', 'class',  'title wow pixFadeUp');
		$this->add_inline_editing_attributes( 'title_text', 'none' );
		
		$this->add_render_attribute('title_text_two', 'class',  'title wow pixFadeUp');
        $this->add_inline_editing_attributes( 'title_text_two', 'none' );

        
        $this->add_render_attribute('sub_title', 'class',  'subtitle wow pixFadeUp');
		$this->add_inline_editing_attributes( 'sub_title', 'none' );
		
		$this->add_render_attribute('sub_title_two', 'class',  'wow pixFadeUp md-brn');
        $this->add_inline_editing_attributes( 'sub_title_two', 'none' );

        $this->add_render_attribute('description_text', 'class',  'description');
		$this->add_inline_editing_attributes( 'description_text', 'none' ); 
		
        $this->add_render_attribute('description_text_two', 'class',  'description');
        $this->add_inline_editing_attributes( 'description_text_two', 'none' ); 

		require __DIR__.'/style/parallax-content/style3.php';
       
    }

}