<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Saaspik_Testimonial_Widget extends Widget_Base {

    public function get_name() {
        return 'saaspik-testimonial';
    }

    public function get_title() {
        return esc_html__( 'Saaspik Testimonial', 'saaspik-addons' );
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return [ 'saaspik-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab_style',
            [
                'label' => esc_html__('Saaspik Testimonial', 'saaspik-addons'),
            ]
        );
        $this->add_control(

            'testimonial_style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'saaspik-addons'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'saaspik-addons'),
                    'style2' => esc_html__('Style 2', 'saaspik-addons'),
                    'style3' => esc_html__('Style 3', 'saaspik-addons'),                  
                    'style4' => esc_html__('Style 4', 'saaspik-addons'),                  
                ],
            ]
        );

        $this->add_control(
            'saaspik_hide_navigation',
            [
                'label' => esc_html__( 'Navigation', 'saaspik-addons' ),
                'type' =>  Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'saaspik-addons' ),
                'label_off' => esc_html__( 'Hide', 'saaspik-addons' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_watermark',
            [
                'type' => Controls_Manager::SWITCHER,
                'label' => esc_html__('Show Watermark', 'saaspik-addons'),
                'default' => 'label_on',
                'label_on' => esc_html__( 'Yes', 'saaspik-addons' ),
                'label_off' => esc_html__( 'No', 'saaspik-addons' ),
                'condition' => array( 
                    'testimonial_style' => ['style2','style3', 'style4']
                )
            ]
        );
        $this->add_control(
			'watermark_image',
			[
				'label' => __( 'Choose Watermark Image', 'saaspik-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [				
					'url' => plugins_url('images/quote.png', __FILE__)
                ],
                'condition' => [
                    'show_watermark' => 'yes',
                    'testimonial_style' => ['style2','style3', 'style4']
                ],
			]
		);


        $this->add_control(
            'testimonial',
            [
                'label' => esc_html__('Testimonial', 'saaspik-addons'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'client_name' => esc_html__('Testimonial #1', 'saaspik-addons'),
                        'review' => esc_html__('Our best-in-class WordPress solution with additio nal optiz ation to make an running a ', 'saaspik-addons'),
                        'designation' => esc_html__('CEO, Pranklin Agency', 'saaspik-addons'),
                        'image' => Utils::get_placeholder_image_src(),
                    ],

                    [
                        'client_name' => esc_html__('Testimonial #2', 'saaspik-addons'),
                        'review' => esc_html__('Our best-in-class WordPress solution with additio nal optiz ation to make an running a ', 'saaspik-addons'),
                        'designation' => esc_html__('CEO, Pranklin Agency', 'saaspik-addons'),
                        'image' => Utils::get_placeholder_image_src(),
                    ],

                    [
                        'client_name' => esc_html__('Testimonial #3', 'saaspik-addons'),
                        'review' => esc_html__('Our best-in-class WordPress solution with additio nal optiz ation to make an running a ', 'saaspik-addons'),
                        'designation' => esc_html__('CEO, Pranklin Agency', 'saaspik-addons'),
                        'image' => Utils::get_placeholder_image_src(),
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'star_rating',
                        'label' => __( 'Star Rating', 'saaspik-addons' ),
                        'type' => Controls_Manager::SWITCHER,
                        'label_on' => __( 'Yes', 'saaspik-addons' ),
                        'label_off' => __( 'No', 'saaspik-addons' ),
                        'return_value' => 'yes',
                    ],

                  
                    [   'name' => 'rating',
                        'label' => __( 'Star', 'saaspik-addons' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => 'solid',
                        'options' => [
                            '10'  => __( '1 Star', 'saaspik-addons' ),
                            '15' => __( '1.5 Star', 'saaspik-addons' ),
                            '20' => __( '2 Star', 'saaspik-addons' ),
                            '25' => __( '2.5 Star', 'saaspik-addons' ),
                            '30' => __( '3 Star', 'saaspik-addons' ),
                            '35' => __( '3.5 Star', 'saaspik-addons' ),
                            '40' => __( '4 Star', 'saaspik-addons' ),
                            '45' => __( '4.5 Star', 'saaspik-addons' ),
                            '50' => __( '5 Star', 'saaspik-addons' ),
                        ],
                    ],
                    [
                        'name' => 'client_name',
                        'label' => esc_html__('Client Name', 'saaspik-addons'),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('Testimonial #1', 'saaspik-addons'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'review',
                        'label' => esc_html__('Testimonial', 'saaspik-addons'),
                        'type' => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                    ],

                    [
                        'name' => 'designation',
                        'label' => esc_html__('Designation', 'saaspik-addons'),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                    ],

                    [
                        'name' => 'image',
                        'label' => esc_html__('Image', 'saaspik-addons'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src('saaspik_testimonial_three'),
                        ],
                        'label_block' => true,
                    ],

                ],

                'title_field' => '{{{ client_name }}}',
            ]
        );

        $this->end_controls_section();

        /**
         *
         * Client Name
         *
         */

        $this->start_controls_section(
            'section_name_style',
            [
                'label' => esc_html__('Name', 'saaspik-addons'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => esc_html__( 'Color', 'saaspik-addons' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .client-name ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .name ' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'label' => esc_html__( 'Typography', 'saaspik-addons' ),
                'selector' => ' {{WRAPPER}} .single-bio-thumb h4, {{WRAPPER}} .name ',
            ]
        );

        $this->end_controls_section();


        /**
         *
         * Designnation Name
         *
         */

        $this->start_controls_section(
            'section_deg_style',
            [
                'label' => esc_html__('Designation', 'saaspik-addons'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'deg_color',
            [
                'label' => esc_html__( 'Center Color', 'saaspik-addons' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .review-content' => 'color: {{VALUE}};',                   
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'deg_typography',
                'label' => esc_html__( 'Typography', 'saaspik-addons' ),
                'selector' => ' {{WRAPPER}} .review-content',
            ]
        );

        $this->end_controls_section();

        /**
         *
         * Testimonial
         *
         */


        $this->start_controls_section(
            'section_testimonial_style',
            [
                'label' => esc_html__('Testimonial', 'saaspik-addons'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'tetimonial_color',
            [
                'label' => esc_html__( 'Text Color', 'saaspik-addons' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial-preview p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .single-testimonial-preview .border-line::before' => 'border-'.(is_rtl()) ? 'left' : 'right' .'-color: {{VALUE}} !important;',
                    '{{WRAPPER}} .single-testimonial-preview .border-line::after' => 'border-'.(is_rtl()) ? 'left' : 'right' .'-color: {{VALUE}} !important;',
                    '{{WRAPPER}} .single-testimonial-preview .border-line' => 'background-color: {{VALUE}}; box-shadow: 10px 0px 0px 0px rgba(0, 0, 0, 0), 138px 0px 0px {{VALUE}};',
                   
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'testimonial_typography',
                'label' => esc_html__( 'Typography', 'saaspik-addons' ),
                'selector' => '{{WRAPPER}} .single-testimonial-preview p',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_review_style',
            [
                'label' => esc_html__('Extra', 'saaspik-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'testimonial_style' => ['style3', 'style4']
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_shape',
            [
                'label' => esc_html__('Baground Shape', 'saaspik-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,             
            ]
        );

        $this->add_control(
			'show_circle_shape',
			[
				'label' => __( 'Show Background', 'saaspik-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'saaspik-addons' ),
				'label_off' => __( 'Hide', 'saaspik-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
            'bg_image_shape', [
                'label' => esc_html__( 'Upload the featured image', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/circle9.png', __FILE__)
                ], 
                'condition' => [
                    'testimonial_style' => ['style1']
                ]             
            ]
        );

        $this->add_control(
            'bg_image_shape_two', [
                'label' => esc_html__( 'Upload the featured image', 'saaspik-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('images/ellipse2.png', __FILE__)
                ],  
                'condition' => [
                    'testimonial_style' => ['style2']
                ]            
            ]
        );

        $this->add_control(
			'positionxy',
			[
				'label' => __( 'Position Up/Down', 'saaspik-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'allowed_dimensions' => ['top'],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .testimonials-two .animate-shape' => 'top: {{TOP}}{{UNIT}};',					
                ],
                'condition' => [
					'show_circle_shape' => 'yes',					
                ],
			]
		);

        $this->end_controls_section();


    }

    protected function render( ) {

        $settings = $this->get_settings();
        $testimonials = $settings['testimonial'];
        $style = $settings['testimonial_style'];

        $uniqid = uniqid('slider-');
        $pagi = uniqid('pagi-');

        $data_attr = " ";
        $data_attr3 = " ";
        $data_attr4 = " ";

        $data = array(     
            '991' => array(
                "slidesPerView" => 1,              
            ),           
        );

        $data3 = array(     
            '768' => array(
                'spaceBetween' => 50,              
            ),

            '640' => array(
                'spaceBetween' => 30,              
            ),           
        );



        if($settings['testimonial_style'] == "style4" ) {
            $data_attr4 .= ' data-effect="fade"';      
        }
      

        if($settings['testimonial_style'] == "style2" ) {
            $data_attr .= ' data-perpage="2"';
            $data_attr .= ' data-space="50"';
            $data_attr .= ' data-speed= 1000';
            $data_attr .= ' data-autoplay= 5000';      
        }
      

        if($settings['testimonial_style'] == "style3" ) {
            $data_attr3 .= ' data-perpage= 1';
            $data_attr3 .= ' data-space= 90';
            $data_attr3 .= ' data-speed= 1000';
            $data_attr3 .= ' data-autoplay= 50000';
            $data_attr3 .= " data-breakpoints= ". json_encode($data3) ." ";
        }

        // }

        require __DIR__.'/style/testimonial/'.$style.'.php';

    }

    protected function _content_template() { }
}

