<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/**
 * Get About.
 *
 * Retrieve saaspik Post.
 *
 * @since 2.0.0
 * @access public
 *
 * @return string Saaspik Saaspik Post.
 */

class Saaspik_Post_Widget extends Widget_Base {

    public $base;

    public function get_name() {
        return 'saaspik-blog';
    }

    public function get_title() {
        return esc_html__( 'Saaspik Posts', 'saaspik-addons' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return [ 'saaspik-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Saaspik Post', 'saaspik-addons'),
            ]
        );

        $this->add_control(

            'blog_style', [
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
            'post_count',
            [
                'label'         => esc_html__( 'Post count', 'saaspik-addons' ),
                'type'          => Controls_Manager::NUMBER,
                'default'       => esc_html__( '3', 'saaspik-addons' ),

            ]
        );

        $this->add_control(
            'count_col',
            [
                'label'     => esc_html__( 'Select Column', 'saaspik-addons' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 4,
                'options'   => [
                    '6'     => esc_html__( '2 Column', 'saaspik-addons' ),
                    '4'     => esc_html__( '3 Column', 'saaspik-addons' ),
                ],
                'condition' => [
                    'blog_style!' => 'style4',
                ]
            ]
        );

        $this->add_control(
            'gp_post_cat',
            [
                'label'    =>esc_html__( 'Select category', 'saaspik-addons' ),
                'type'     => Controls_Manager::SELECT,
                'options'  => saaspik_category_list( 'category' ),
                'default'  => '0'
            ]
        );
        $this->add_control(
        'word-limit',
			[
				'label' => __( 'Word Count', 'saaspik-addons' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 10,
				'max' => 100,
				'step' => 5,
                'default' => 30,
                'condition' => [
                    'blog_style' => 'style2'
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_subtitle_style', [
                'label'	 =>esc_html__( 'Blog Style', 'saaspik-addons' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );     

        $this->add_responsive_control(
            'boder_width',
            [
                'label' =>esc_html__( 'Border Width', 'saaspik-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px'],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0 ,
                    'left' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .gp-news-content' =>  'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'meta_footer',
            [
                'label' => __( 'Post meta', 'saaspik-addons' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'saaspik-addons' ),
                'label_off' => __( 'No', 'saaspik-addons' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'dbtn_box_shadow_hover',
				'label' => __( 'Button Hover Box Shadow ', 'saaspik-addons' ),
				'selector' => '{{WRAPPER}} .blog-post-two .blog-content .read-more:hover',
			]
		);
      
        $this->end_controls_section();

        $this->start_controls_section(
			'background_shape',
			[
				'label' => __( 'Background Shape', 'saaspik-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'circle_shape_bg',
			[
				'label' => __( 'Show Background Shape', 'saaspik-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'saaspik-addons' ),
				'label_off' => __( 'Hide', 'saaspik-addons' ),
				'return_value' => 'yes',
			]
		);

        
        $this->add_control(
			'svg_background',
			[
				'label' => __( 'Shape Background', 'saaspik-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .circle-blog svg path' => 'fill: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
			'position_top',
			[
				'label' => __( 'Position Top/Bottom', 'saaspik-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .circle-blog' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
        );
        
        $this->add_responsive_control(
			'position_left',
			[
				'label' => __( 'Position Left/Right', 'saaspik-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .circle-blog' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();
        $style = $settings['blog_style'];
        $gp_post_cat = $settings['gp_post_cat'];
        $count_col = $settings['count_col'];
        $post_count = $settings['post_count'];
        $meta_pos = $settings['meta_footer'];

        $paged = 1;
        if ( get_query_var('paged') ) $paged = get_query_var('paged');
        if ( get_query_var('page') ) $paged = get_query_var('page');
        $query = array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => $post_count,
            'cat' => $gp_post_cat,
            'paged' => $paged,
        );
        $pix_query = new \WP_Query( $query );

        if($pix_query->have_posts()):
            ?>
            <div class="blog-post-wrapper">
                <div class="container">
                    <div class="row gp-blog-grid <?php echo esc_attr($style == 'style3' ? 'gp-blog-style-3' : ''); ?>">
                        <?php
                        while ($pix_query->have_posts()) :
                            $pix_query->the_post();
                            $terms  = get_the_terms( get_the_ID(), 'category' );
                            if ( $terms && ! is_wp_error( $terms ) ) :
                                $cat_temp = '';
                                foreach ( $terms as $term ) {
                                    $cat_temp .= '<a href="'.get_category_link($term->term_id).'" class="gp-blog-meta-tag green-bg bold color-white gp-border-radius" rel="category tag">'.esc_html($term->name).'</a>';
                                }
                            endif;

                            require __DIR__.'/style/blog/'.$style.'.php';

                        endwhile;
                        ?>
                    </div>
                </div>
                <!-- /.container -->
                
                <?php if($settings['circle_shape_bg']) {
                    ?>
                    <div class="circle-blog">
                        <svg xmlns="http://www.w3.org/2000/svg"  xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px">
                            <path fill-rule="evenodd" fill="rgb(250, 250, 255)" d="M400.000,-0.000 C620.914,-0.000 800.000,179.086 800.000,400.000 C800.000,620.914 620.914,800.000 400.000,800.000 C179.086,800.000 0.000,620.914 0.000,400.000 C0.000,179.086 179.086,-0.000 400.000,-0.000 Z"></path>
                        </svg>
                    </div>
                <!-- /.circle-blog -->
                <?php } ?>
         
           </div>
            <!-- /.blog-post-wrapper -->
        <?php
        endif;
        wp_reset_postdata();
    }
    protected function _content_template() { }
}