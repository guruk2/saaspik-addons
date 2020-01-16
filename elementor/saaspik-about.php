<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class Saaspik_About_Widget extends Widget_Base {

	public function get_name() { 
		return 'saaspik-about';
	}

	public function get_title() {
		return esc_html__( 'Saaspik About', 'saaspik-addons' );
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
			'title_text', [
				'label'			 => esc_html__( 'Heading Title', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'About Title', 'saaspik-addons' )
			]
		); 

		$this->add_control(
			'description_text', [
				'label'			 => esc_html__( 'Heading Description', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXTAREA,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Description Text', 'saaspik-addons' ),
				'rows' => 10,
			]
		);

		$this->add_control(
			'author_name', [
				'label'			 => esc_html__( 'Author Name', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXT,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Author Name', 'saaspik-addons' ),
				'default'		 => esc_html__( 'Lance Bogrol', 'saaspik-addons' ),
			]
		); 

		$this->add_control(
			'author_desi', [
				'label'			 => esc_html__( 'Author designation', 'saaspik-addons' ),
				'type'			 => Controls_Manager::TEXT,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Author designation', 'saaspik-addons' ),
				'default'		 => esc_html__( 'Designer', 'saaspik-addons' ),
			]
		); 

		$this->add_control(
			'author_image', [
					'label' => __( 'Choose Image', 'plugin-domain' ),
					'type' => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
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
				'type' => Controls_Manager::SLIDER,
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
				'type' => Controls_Manager::SLIDER,
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
		$title = $settings[ 'title_text' ];
		$author_name = $settings[ 'author_name' ];
		$author_desi = $settings[ 'author_desi' ];
		// $title_align = $settings[ 'title_align' ];
		$description_text = $settings[ 'description_text' ];

		$this->add_render_attribute('title_text', [
            'class' => ['title wow pixFadeUp'],
            'data-wow-delay' => '0.3s',
		]);
		
		$this->add_render_attribute('description_text', [
            'class' => ['description wow pixFadeUp'],
            'data-wow-delay' => '0.5s',
        ]);
		$this->add_render_attribute('author_name', [
            'class' => ['name'],
        ]);
		$this->add_render_attribute('author_desi', [
            'class' => ['designation'],
        ]);

	
		$this->add_inline_editing_attributes( 'title_text' );
		$this->add_inline_editing_attributes( 'description_text' );
		$this->add_inline_editing_attributes( 'author_name' );
		$this->add_inline_editing_attributes( 'author_desi' );

		?>


		<div class="about-content-two">
			<div class="section-title">
				<?php if(!empty($title)) : ?>
					<h2 <?php echo $this->get_render_attribute_string( 'title_text' ); ?>>
						<?php echo $title; ?>
					</h2>
				<?php endif; ?>
			</div>
			<!-- /.section-title -->

			<?php if(!empty($description_text)): ?>
				<p <?php echo $this->get_render_attribute_string( 'description_text' ); ?>><?php echo $description_text; ?></p>
			<?php endif; ?>
		
			<div class="about-user wow pixFadeUp" data-wow-delay="0.7s">
				<?php if(! empty($settings['author_image']['url'])) : ?>
					<div class="avatar">
						<img src="<?php echo esc_url($settings['author_image']['url']) ?>" alt="saaspik author">
					</div>
				<?php endif; ?>
				
				<?php if( !empty($author_name) || !empty($author_desi) ) : ?>
					<div class="user-info">
						<?php if(!empty($author_name)) : ?>
							<h3 <?php echo $this->get_render_attribute_string( 'author_name' ); ?>><?php echo esc_html($author_name); ?></h3>
						<?php endif; ?>

						<?php if(!empty($author_desi)) : ?>
							<span <?php echo $this->get_render_attribute_string( 'author_desi' ); ?>><?php echo esc_html($author_desi); ?></>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
			<!-- /.singiture -->
		</div>

	<?php
	}

	protected function _content_template() { ?>
		<#
		view.addInlineEditingAttributes( 'title_text', 'none' );
		view.addInlineEditingAttributes( 'description_text' );
		view.addInlineEditingAttributes( 'author_name' );
		view.addInlineEditingAttributes( 'author_desi' );
		
		view.addRenderAttribute( 'title_text', 'class', 'title' );
		view.addRenderAttribute( 'description_text', 'class', 'description' );
		view.addRenderAttribute( 'author_name', 'class', 'name' );
		view.addRenderAttribute( 'author_desi', 'class', 'designation' );
		#>
		
		<div class="about-content-two">
			<div class="section-title">			
				<# if(settings.title_text) { #>
					<h2 {{{ view.getRenderAttributeString( 'title_text' ) }}}>{{{ settings.title_text }}}</h2>
				<# } #>
			</div>

			<# if( settings.description_text ) { #>
				<p {{{ view.getRenderAttributeString( 'description' ) }}}>{{{ settings.description_text }}}</p>
			<# } #>
			<div class="about-user">

			<# if( settings.author_image.url ) { #>
				<div class="avatar">
					<img src="{{ settings.author_image.url }}" alt="saaspik author">
				</div>
			<# } #>
			
		
				<div class="user-info">
					<# if( settings.author_name ) { #>
						<h3 {{{ view.getRenderAttributeString( 'author_name' ) }}}>{{{ settings.author_name }}}</h3>
					<# } #>

					<# if( settings.author_desi ) { #>
						<span {{{ view.getRenderAttributeString( 'author_desi' ) }}}>{{{ settings.author_desi }}}</>
					<# } #>
				</div>
		
			</div>
		
		</div>
		<?php
	}
}



