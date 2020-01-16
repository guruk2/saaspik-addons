<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class Saaspik_Heading_Widget extends Widget_Base {

	public function get_name() { 
		return 'saaspik-heading';
	}

	public function get_title() {
		return esc_html__( 'Saaspik Heading', 'saaspik-addons' );
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
				'label' =>esc_html__( 'Saaspik Heading', 'saaspik-addons' ),
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
			'title_text', [
				'label'			 => esc_html__( 'Heading Title', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Why you choose Saaspik', 'saaspik-addons' ),
				'default'		 => esc_html__( 'Section Title', 'saaspik-addons' ),
			]
		);
 
		$this->add_control(
			'sub_title', [
				'label'			 => esc_html__( 'Heading Sub Title', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Sub Title', 'saaspik-addons' ),
				'default'		 => '',
				'separator' => 'none',
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
				'label' => __( 'Spacing', 'saaspik-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 46,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 30,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 30,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .section-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'space_between_title',
			[
				'label' => __( 'Spacing Title', 'saaspik-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 0,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 0,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 0,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .section-title .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .section-title .title' => 'color: {{VALUE}};'
				],
			]
		);

        $this->add_control(
            'title_color_two', [
                'label'		 => esc_html__( 'Color Two', 'saaspik-addons' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .section-title .title span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .section-title .line' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .section-title .line:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
			'name'		 => 'title_typography',
			'selector'	 => '{{WRAPPER}} .section-title .title',
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

		//Border Style Section
		$this->start_controls_section(
			'section_border_style', [
				'label'	 => esc_html__( 'Border', 'saaspik-addons' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
				'condition' => [
					'style' => 'style2',
				],
			]
		);

		$this->add_control(
			'border_color', [
				'label'		 => esc_html__( 'Color', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .section-title .line::after' => 'background-color: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();
		$style = $settings[ 'style' ];
		$title = $settings[ 'title_text' ];
		$sub_title = $settings[ 'sub_title' ];
		$title_align = $settings[ 'title_align' ];
		$description_text = $settings[ 'description_text' ];

		$this->add_render_attribute( 'title_text', 'class','title');
		$this->add_inline_editing_attributes( 'title_text' );

		require __DIR__ . '/style/heading/'.$style.'.php';
	}

	protected function _content_template() { ?>
		<#
		view.addInlineEditingAttributes( 'title_text', 'none' );
		view.addInlineEditingAttributes( 'sub_title' );
		
		view.addRenderAttribute( 'title_text', 'class', 'title' );
		#>
		<div class="section-title">
			<# if(settings.sub_title) { #>
				<h3 class="sub-title">{{{ settings.sub_title }}}</h3>
			<# } #>
			<# if(settings.title_text) { #>
				<h2 {{{ view.getRenderAttributeString( 'title_text' ) }}}>{{{ settings.title_text }}}</h2>
			<# } #>
			<# if(settings.description_text) { #>
				<p class="description">{{{ settings.description_text }}}</p>
			<# } #>
		</div>
		<?php
	}
}



