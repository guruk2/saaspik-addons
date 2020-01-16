<?PHP

namespace Elementor;

class Saaspik_Funfact_Widget extends Widget_Base {

    public function get_name() {
        return 'saaspik-funfact';
    }

    public function get_title() {
        return esc_html__( 'Saaspik Funfact', 'saaspik-addons' );
    }

    public function get_icon() {
        return 'eicon-form-vertical';
    }

    public function get_categories() {
        return ['saaspik-elements'];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Saaspik funfact', 'saaspik-addons'),
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
			'icon',
			[
				'label' => __( 'Choose Icon', 'saaspik-addons' ),
				'type' => Controls_Manager::ICON,
				'options' => saaspik_simple_line_icons(),
				'include' => saaspik_include_simple_line_icons(),
				'default' => 'icon-user',
				'condition' => [
                    "style" => ['style2']
                ]
			]
		);

        $this->add_control(
            'title_text',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Title', 'saaspik-addons'),
                'default'   =>  esc_html__('Happy Clients','saaspik-addons'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'number_percentage',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Number Percentage', 'saaspik-addons'),
                'default'   =>  '560',
                'label_block' => true,
            ]
        );
        $this->add_control(
            'suffix',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Suffix', 'saaspik-addons'),
                'default'   =>  '+',
                'label_block' => true,
                'condition' => [
                    "style" => ['style1']
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style Section', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_Icon_tab',
			[
                'label' => __( 'Icon', 'plugin-name' ),
                'condition' => [
                    "style" => ['style2']
                ]
			]
		);

	    $this->add_control(
			'icon_color', [
				'label'		 => esc_html__( 'Icon Color', 'saaspik-addons' ),
                'type'		 => Controls_Manager::COLOR,
                'default'   => '#7052fb',
				'selectors'	 => [
					'{{WRAPPER}} .fun-fact-two .icon-container i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    "style" => ['style2']
                ]
			]
		);
        $this->add_control(
			'icon_color_bg', [
				'label'		 => esc_html__( 'Icon Background', 'saaspik-addons' ),
                'type'		 => Controls_Manager::COLOR,
                'default'   => 'rgba(112, 82, 251, 0.141)',
				'selectors'	 => [
					'{{WRAPPER}} .fun-fact-two .icon-container' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    "style" => ['style2']
                ]
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_title_tab',
			[
				'label' => __( 'Title', 'plugin-name' ),
			]
		);

        $this->add_control(
			'title_color', [
				'label'		 => esc_html__( 'Title Color', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
                    '{{WRAPPER}} .fun-fact p, 
                    {{WRAPPER}} .fun-fact-two p' => 'color: {{VALUE}};',
					
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
            'label'		 => esc_html__( 'Title Typography', 'saaspik-addons' ),
			'name'		 => 'title_typography',
			'selector'	 => '{{WRAPPER}} .fun-fact p, {{WRAPPER}} .fun-fact-two p',
			]
        );

        $this->end_controls_tab();
        
        $this->start_controls_tab(
			'style_percentage_tab',
			[
				'label' => __( 'Percentage', 'plugin-name' ),
			]
        );
        
        
        $this->add_control(
			'number_percentage_color', [
				'label'		 => esc_html__( 'Color', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
                    '{{WRAPPER}} .fun-fact .count,
                    {{WRAPPER}} .fun-fact span,
                     {{WRAPPER}} .fun-fact-two .count' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
			'name'		 => 'number_percentage_typography',
			'selector'	 => '{{WRAPPER}} .fun-fact .count, {{WRAPPER}} .fun-fact span, {{WRAPPER}} .fun-fact-two .count',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

    }

    protected function render( ) {
        $settings = $this->get_settings();
        
        if($settings['style'] == 'style1') {
        ?>
            <div class="fun-fact">
                <div class="counter">
                    <h4 class="count" data-counter="<?php echo $settings['number_percentage']; ?>"><?php echo $settings['number_percentage']; ?></h4>
                    <?php if($settings['suffix'] != ''): ?>
                        <span><?php echo $settings['suffix']; ?></span>
                    <?php endif ;?>
                </div>    
                                    
                <p><?php echo $settings['title_text']; ?></p>
            </div>
        
 
        <?php
        } elseif($settings['style'] == 'style2') { ?>
            <div class="fun-fact-two">
                <?php if(! empty($settings['icon'])) { ?>               
                    <div class="icon-container">
                        <i class="<?php echo $settings['icon']; ?>"></i>
                    </div>
                    <!-- /.icon-container -->
                <?php } ?>

                <div class="counter">
                    <p><?php echo $settings['title_text']; ?></p>
                    <h4 class="count" data-counter="<?php echo $settings['number_percentage']; ?>"><?php echo $settings['number_percentage']; ?></h4>
                </div>
            </div>
        <?php
        }
    }

    protected function _content_template() { }
}