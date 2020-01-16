<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class Saaspik_Call_Action extends Widget_Base {

	public function get_name() { 
		return 'saaspik-call-to-action';
	}

	public function get_title() {
		return esc_html__( 'Saaspik Call To Action', 'saaspik-addons' );
	}
 
	public function get_icon() {
		return 'eicon-type-tool';
	}

	public function get_categories() {
		return [ 'saaspik-elements' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_tab', [
				'label' =>esc_html__( 'Saaspik Call To Action', 'saaspik-addons' ),
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
                    'style3' => esc_html__('Style 3', 'saaspik-addons'),                 
                ],
            ]
        );

		$this->add_control(
			'title_text', [
				'label'			 => esc_html__( 'Heading Title', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Why you choose Saaspik', 'saaspik-addons' ),
				'default'		 => esc_html__( 'Why you choose Saaspik', 'saaspik-addons' ),
			]
		);

		$this->add_control(
			'description_text', [
				'label'			 => esc_html__( 'Heading Description', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Description Text', 'saaspik-addons' ),
				'default'		 => '',
				'rows' => 10,
				'condition' => [
					'style' => ['style1', 'style3'],
				],
			]
		);

		$this->add_control(
			'link', [
				'label'			 => esc_html__( 'Button Url', 'saaspik-addons' ),
				'type'			 => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],					
			]
		);

		$this->add_control(
			'link_text', [
				'label'			 => esc_html__( 'Button Text', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXT,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Button Text', 'saaspik-addons' ),
				'default'		 => 'Free Consultation',		
			
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


		$this->add_responsive_control(
			'space_between',
			[
				'label' => __( 'Spacing', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 70,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 50,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 50,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .section-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();

		//Title Style Section
		$this->start_controls_section(
			'section_title_style', [
				'label'	 => esc_html__( 'Title', 'saaspik-addons' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color_one', [
				'label'		 =>esc_html__( 'Title color', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .call-to-action .action-content .title' => 'color: {{VALUE}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
			'name'		 => 'title_typography',
			'selector'	 => '{{WRAPPER}} .call-to-action .action-content .title',
			]
		);

		$this->end_controls_section();

		//Subtitle Style Section
		$this->start_controls_section(
			'section_subtitle_style', [
				'label'	 => esc_html__( 'Sub Title', 'saaspik-addons' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color', [
				'label'		 => esc_html__( 'color', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .section-title .sub-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
			'name'		 => 'subtitle_typography',
			'selector'	 => '{{WRAPPER}} .section-title .sub-title',
			]
		);      

		$this->end_controls_section();

		//Button Style Section
	
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => __( 'Button', 'saaspik-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'action_typography',
				'label' => __( 'Typography', 'saaspik-addons' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} a.pix-btn, {{WRAPPER}} .pix-btn',
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_one_button_normal',
			[
				'label' => __( 'Normal', 'saaspik-addons' ),
			]
		);

		$this->add_control(
			'action_btn_text_color',
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
			'action_btn_background_color',
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
			'action_btn_hover',
			[
				'label' => __( 'Hover', 'saaspik-addons' ),
			]
		);

		$this->add_control(
			'action_btn_hover_color',
			[
				'label' => __( 'Text Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pix-btn:hover, {{WRAPPER}} .pix-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'action_btn__background_hover_color',
			[
				'label' => __( 'Background Color', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.pix-btn:hover, {{WRAPPER}} .pix-btn:hover' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'action_btn__hover_border_color',
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
			'action_btn_hover_animation',
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
				'selector' => '{{WRAPPER}} .pix-btn',              
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
		//Style Section
		$this->start_controls_section(
			'section_background_style', [
				'label'	 => esc_html__( 'Background', 'saaspik-addons' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
		);

		
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Background Color', 'saaspick-addons' ),
				'types' => [ 'classic', 'gradient' ],		
				'selector' =>  '{{WRAPPER}} .call-to-action' 
			]
		);

		$this->add_control(
            'fimage', [
                'label' => esc_html__( 'Upload the Overlay background image', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/ellipse.png', __FILE__)
				],
				'condition' => [
					'style' => ['style1', 'style2']
				]                
            ]
		);
		
		$this->add_control(
            'circleimg', [
                'label' => esc_html__( 'Upload the Parallax image', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/circle13.png', __FILE__)
				],
				'condition' => [
					'style' => ['style1', 'style2']
				]                      
            ]
        );
		$this->add_control(
            'leftshape', [
                'label' => esc_html__( 'Upload the Parallax image', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/left-shape.png', __FILE__)
				], 
				'condition' => [
					'style' => 'style3'
				]               
            ]
        );
		$this->add_control(
            'rightshape', [
                'label' => esc_html__( 'Upload the Parallax image', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/right_shape.png', __FILE__)
				],
				'condition' => [
					'style' => 'style3'
				]                
            ]
        );


		$this->end_controls_section();



        $this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();
		$style = $settings[ 'style' ];
		$title = $settings[ 'title_text' ];
		$description_text = $settings[ 'description_text' ];
		$btn_target = ( $settings['link']['is_external']) ? '_blank' : '_self';

		$this->add_render_attribute( 'title_text', 'class','title');
		$this->add_inline_editing_attributes( 'title_text' );

		$this->add_render_attribute( 'description_text', 'class','title');
		$this->add_inline_editing_attributes( 'description_text' );



		$this->add_render_attribute( 'link', [ 
			'class' => ['pix-btn', 'btn-light','btn-big', 'scroll-btn','wow ','pixFadeUp'],
			'href' => $settings['link']['url'],
			'target' => $btn_target,
		]);

		$this->add_inline_editing_attributes( 'link_text' );

		require __DIR__ . '/style/calltoaction/'.$style.'.php';
	}

	protected function _content_template() {
		
		?>
		<#
			var section_class = settings.style == "style3" ? "signup-section" : "call-to-action action-padding";

			view.addInlineEditingAttributes( 'section', 'none' );
			view.addRenderAttribute( 'section', 'class', section_class );

			view.addInlineEditingAttributes( 'title_text', 'none' );
			view.addRenderAttribute( 'title_text', 'class', 'title' );
			

			view.addRenderAttribute( 'description_text', 'class', 'description'  );
			view.addInlineEditingAttributes( 'description_text' );	
			
			view.addRenderAttribute( 'link_text', 'class', 'pix-btn btn-light btn-big scroll-btn' );
			view.addInlineEditingAttributes( 'link_text', 'none' );			

		

		
	
		#>
		<section {{{ view.getRenderAttributeString( 'section' ) }}}>
			<# if(settings.style == 'style1' || settings.style == 'style2') { #>
				<# if ( settings.fimage.url ) { #>
					<div class="overlay-bg">
						<img src="{{{ settings.fimage.url }}}" alt="bg">
					</div>
				<# } #>
			<# } #>
			
			<# if(settings.style == 'style3') { #>
				<# if( settings.leftshape.url || settings.rightshape.url ) { #>
					<div class="bg-shape">
						<img src="{{{ settings.leftshape.url }}}" data-parallax='{"x": -130}' alt="shape" class="shape-left">
						<img src="{{{ settings.rightshape.url }}}" data-parallax='{"x": 130}' alt="shape" class="shape-right">
					</div>
				<# } #>
			<# } #>
			


			<div class="container">
				<# if(settings.style == 'style1') { #>		

					<div class="action-content text-center">							
						<# if(settings.title_text) { #>
							<h2 {{{ view.getRenderAttributeString( 'title_text' ) }}}>{{{ settings.title_text }}}</h2>
						<# } #>

						<# if(settings.description_text) { #>
							<p {{{ view.getRenderAttributeString( 'description_text' ) }}}>{{{ settings.description_text }}}</p>
						<# } #>

						<# if(settings.link_text) { #>
							<a href="{{ settings.link.url }}" {{{ view.getRenderAttributeString( 'link_text' ) }}}>{{{ settings.link_text }}}</a>
						<# } #>
					</div>
					<!-- /.action-content -->
				<# } else if(settings.style == 'style2') { #>					
					<div class="row align-items-center justify-content-between">				
						<div class="col-lg-7">				
							<div class="action-content style-two">								
								<# if(settings.title_text) { #>
									<h2 {{{ view.getRenderAttributeString( 'title_text' ) }}}>{{{ settings.title_text }}}</h2>
								<# } #>				
							</div>
							<!-- /.action-content -->				
						</div>
						<!-- /.col-lg-7 -->
							
						<div class="col-lg-5 text-right">
							<# if(settings.link_text) { #>
								<a href="{{ settings.link.url }}" {{{ view.getRenderAttributeString( 'link_text' ) }}}>{{{ settings.link_text }}}</a>
							<# } #>
						</div>			
					</div>
				<# } else if(settings.style == 'style3'){ #>
					<div class="row align-items-center justify-content-between">
						<div class="col-lg-8">				
							<div class="signup-heading">						
								<# if(settings.title_text) { #>
									<h2 {{{ view.getRenderAttributeString( 'title_text' ) }}}>{{{ settings.title_text }}}</h2>
								<# } #>	
								
								<# if(settings.description_text) { #>
									<p {{{ view.getRenderAttributeString( 'description_text' ) }}}>{{{ settings.description_text }}}</p>
								<# } #>
							</div>
							<!-- /.signup-heading -->				
						</div>
						<!-- /.col-lg-7 -->
							
						<div class="col-lg-4 text-right">
							<div class="button-container text-right">
								<# if(settings.link_text) { #>
									<a href="{{ settings.link.url }}" {{{ view.getRenderAttributeString( 'link_text' ) }}}>{{{ settings.link_text }}}</a>
								<# } #>
							</div>	
						</div>	
						<!-- /.col-lg-4 -->
					</div>	
					<!-- /.row -->

				<# } #>
			</div>
			
			<# if(settings.style == 'style1' || settings.style == 'style2') { #>
				<# if(settings.circleimg.url) { #>
					<div class="scroll-circle">
						<img src="{{{ settings.circleimg.url }}}" data-parallax='{"y" : -130}' alt="circle">
					</div>
					<!-- /.scroll-circle -->
				<# } #>
			<# } #>
		</section>
		<!-- /.call-to-action -->
		<?php
	}
}
