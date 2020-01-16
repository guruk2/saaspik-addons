<?PHP

namespace Elementor;



class Saaspik_Contact_Info_Widget extends Widget_Base {

    public function get_name() {
        return 'saaspik-contact';
    }

    public function get_title() {
        return esc_html__( 'Saaspik Contact Info', 'saaspik-addons' );
    }

    public function get_icon() {
        return 'eicon-tabs';
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
            'lists',
            [
                'label' => esc_html__('Contact Info', 'saaspik-addons'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'title'   =>  esc_html__('Our Location', 'saaspik-addons'),
                        'description' => esc_html__('Washington Fulton Street, Suite 640 New York, NY 10010', 'saaspik-addons'),
                        'icon' => 'ei ei-phone',
                        'info' => 'support@your-domain.com',
                    ]
                ],
                'fields' => [
                    [
                        'name' => 'title',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Title', 'saaspik-addons'),
                        'default'   =>  esc_html__('Our Locations','saaspik-addons'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'description',
                        'type' => Controls_Manager::TEXTAREA,
                        'label' => esc_html__('Description', 'saaspik-addons'),
                        'default'   =>  'Washington Fulton Street, Suite 640 New York, NY 10010',
                        'label_block' => true,
                    ],           
                    [
                        'name' => 'icon',
                        'label' => __( 'Choose Icon', 'saaspik-addons' ),
                        'type' => Controls_Manager::ICON,
                        'options' => saaspik_elegant_icons(),
                        'include' => saaspik_include_elegant_icons(),
                        'default' => 'ei ei-phone',
                      
                    ],

                    [
                        'name' => 'info',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Info', 'saaspik-addons'),
                        'default'   =>  '',
                        'label_block' => true,
                    ],
                    [
                        'name' => 'link',
                        'label' => __( 'Link', 'saaspik-addons' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => __( 'https://your-link.com', 'saaspik-addons' ),
                        'show_external' => true,
                        'default' => [
                            'url' => '',
                            'is_external' => true,
                            'nofollow' => true,
                        ],
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style', [
                'label'	 =>esc_html__( 'Title Style', 'saaspik-addons' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
			'title_color', [
				'label'		 => esc_html__( 'Color', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .fun-fact p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
			'name'		 => 'title_typography',
			'selector'	 => '{{WRAPPER}} .fun-fact p',
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
            'section_number_percentage_style', [
                'label'	 => esc_html__( 'Title Style', 'saaspik-addons' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
			'number_percentage_color', [
				'label'		 => esc_html__( 'Color', 'saaspik-addons' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .fun-fact .count' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
			'name'		 => 'number_percentage_typography',
			'selector'	 => '{{WRAPPER}} .single-funfact .count',
			]
		);
        $this->end_controls_section();

    }

    protected function render( ) {
        $settings = $this->get_settings();
        $lists = $settings['lists'];

        ?>
      
        <div class="contact-infos">
            <?php if(is_array($lists)): ?>
                <?php foreach($lists as $list): ?>
                   
                        <div class="contact-info" data-wow-duration="1s">                        
                            <h3 class="title"><?php echo $list['title']; ?></h3>

                            <?php if(! empty($list['description'])) : ?>
                                <p class="description">
                                    <?php echo $list['description']; ?>
                                </p>
                            <?php endif ;?>                    
                            
                            <?php if( ! empty( $list['info']) || ! empty($list['icon'])) : ?>
                                <div class="info phone">
                                    <?php if(! empty($list['icon'])) : ?>
                                        <i class="<?php echo $list['icon'] ?>"></i>
                                    <?php endif;


                                    $target = $list['link']['is_external'] ? ' target="_blank"' : '';
		                            $nofollow = $list['link']['nofollow'] ? ' rel="nofollow"' : '';

                                    if(! empty($list['link']['url'] )) {
	                                    echo '<a href="' . $list['link']['url'] . '"' . $target . $nofollow . '>' . $list['info'] . ' </a>';
                                    } else {
                                        if(! empty($list['info'])) : ?>
                                            <span><?php echo $list['info']; ?></span>
                                        <?php endif;
                                    }

                                    ?>


                                </div>
                            <?php endif ;?>    
                        </div>
                   
                <?php endforeach; ?>
            <?php endif; ?>
            </div>
        <?php
    }

    protected function _content_template() {}
}