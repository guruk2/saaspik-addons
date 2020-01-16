<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Saaspik_Portfolio extends Widget_Base {

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
        return 'our_work';
    }

    // public function get_id() {
    //    	return 'header-search';
    // }

    public function get_title() {
        return __( 'Saaspik Portfolio', 'saaspik-addons' );
    }

    public function get_icon() {
        // Icon name from the Elementor font file, as per http://dtbaker.net/web-development/creating-your-own-custom-elementor-widgets/
        return 'eicon-photo-library';
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

    protected function _register_controls() {

        $this->start_controls_section(
            'section_query',
            [
                'label' => __( 'Portfolio', 'saaspik-addons' ),
            ]
        );

        
        $this->add_control(
            'style',
            [
                'label' => __( 'Style', 'saaspik-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [             
                    'one'   => __( 'Style 1', 'saaspik-addons' ),
                    'two'   => __( 'Style 2', 'saaspik-addons' ),
                    'three'   => __( 'Style 3', 'saaspik-addons' ),
                ],
                'default' => 'three',
            ]
        );

        $this->add_control(
            'columns_work',
            [
                'label' => __( 'Columns Work', 'saaspik-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'column-3 '   => __( 'Three Column', 'saaspik-addons' ),
                    'column-4 '  => __( 'Four Column', 'saaspik-addons' ),
                    'column-2 '   => __( 'Six Column', 'saaspik-addons' ),
               
                ],
                'default' => 'column-3 ',
            ]
        );

        $this->add_control(
            'ids',
            [
                'label' => __( 'Enter Work IDs', 'saaspik-addons' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'label_block' => true,
                'description' => __("Enter Work ids to show, separated by a comma. Leave empty to show all.", 'saaspik-addons')
                
            ]
        );
        $this->add_control(
            'ids_not',
            [
                'label' => __( 'Or Work IDs to Exclude', 'saaspik-addons' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'label_block' => true,
                'description' => __("Enter Work ids to exclude, separated by a comma (,). Use if the field above is empty.", 'saaspik-addons')
                
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label' => __( 'Order by', 'saaspik-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'date' => esc_html__('Date', 'saaspik-addons'), 
                    'ID' => esc_html__('ID', 'saaspik-addons'), 
                    'author' => esc_html__('Author', 'saaspik-addons'), 
                    'title' => esc_html__('Title', 'saaspik-addons'), 
                    'modified' => esc_html__('Modified', 'saaspik-addons'),
                    'rand' => esc_html__('Random', 'saaspik-addons'),
                    'comment_count' => esc_html__('Comment Count', 'saaspik-addons'),
                    'menu_order' => esc_html__('Menu Order', 'saaspik-addons'),
                ],
                'default' => 'date',
                'separator' => 'before',
                'description' => esc_html__("Select how to sort retrieved posts. More at ", 'saaspik-addons').'<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>.', 
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __( 'Sort Order', 'saaspik-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => esc_html__('Ascending', 'saaspik-addons'), 
                    'DESC' => esc_html__('Descending', 'saaspik-addons'), 
                ],
                'default' => 'DESC',
                'separator' => 'before',
                'description' => esc_html__("Select Ascending or Descending order. More at", 'saaspik-addons').'<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>.', 
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => __( 'Work to show', 'saaspik-addons' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '6',
                'description' => esc_html__("Number of work to show (-1 for all).", 'saaspik-addons'),
                'min' => 1,
            ]
        );

        

        $this->end_controls_section();

    }

    protected function render( ) {

        $settings = $this->get_settings();

        $more_text = saaspik_option('moretext');

        $args = array( 
            'hide_empty' => true,
            'taxonomy' => 'portfolio_cat',
        ); 
        $terms = get_terms( $args );

        if($settings['style'] !== '') {
            $style = ' portfolio-'.$settings['style'];
        }else {
            $style = '';
        }
        ?>
        
        <div class="pixsass-filter">
            <ul class="pixsass-isotope-filter" role="tablist" id="gallerytab">
                <li class="current"><a href="javascript:void(0)" data-filter="*" ><?php esc_html_e( 'All Works', 'saaspik-addons' ) ?></a></li>
                <?php foreach ($terms as $term) { ?>
                    <li><a href="javascript:void(0)" data-filter="<?php echo '.portfolio_cat-'.$term->slug; ?>"><?php echo $term->name;?></a></li>
                <?php } ?>
            </ul>
        </div>
  

        <div class="pixsass-isotope ajax-content wow fadeIn" data-wow-delay="0.3s">
            <div class="pixsass-portfolio-items <?php echo $style; ?> <?php echo $settings['columns_work']; ?>">
                <!-- <div class="grid-sizer"></div> -->
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'saaspik_portfolio',
                    'paged' => $paged,
                    'order' => $settings['order'],
                    'orderby' => $settings['order_by'],
                    'post_per_page' => 6,
                    'showposts' => $settings['posts_per_page'],
                );
                $portfolio = new \WP_Query($args);


                if ($portfolio -> have_posts()) :
                    while ($portfolio -> have_posts()) : $portfolio -> the_post();
               
                    if($settings['style'] == 'one') { ?>
                        <div <?php post_class('pixsass-portfolio-item'); ?>>
                            <div class="pixsass-isotope-grid__img">
                             <?php
                                the_post_thumbnail('saaspik-portfolio-column-2');
                                ?>
                
                                <div class="portfolio-info">	
                                    <h3 class="portfolio-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>  
                                    <div class="portfolio-cat">
                                        <?php
                                        $terms = get_the_terms( get_the_ID(), 'portfolio_cat' );
                                        if ( $terms && ! is_wp_error( $terms ) ) : 
                                            foreach ( $terms as $term ) { ?>
                                            <span class="cat"><?php echo $term->name; ?></span>
                                            <?php } ?>
                                        <?php endif; ?>      
                                    </div>
                                                           
                                </div>                 
                            </div>                 
                        <?php } elseif ($settings['style'] == 'two') { ?>
                            <div <?php post_class('pixsass-portfolio-item'); ?>>
                                <div class="pixsass-isotope-grid__img">
                                    <?php the_post_thumbnail('saaspik-portfolio-colmn-3'); ?>
                                </div> 
                    
                                <div class="portfolio-info">	
                                    <h3 class="portfolio-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="portfolio-cat">
                                        <?php
                                        $terms = get_the_terms( get_the_ID(), 'portfolio_cat' );
                                        if ( $terms && ! is_wp_error( $terms ) ) : 
                                            foreach ( $terms as $term ) { ?>
                                            <span class="cat"><?php echo $term->name; ?></span>
                                            <?php } ?>
                                        <?php endif; ?>      
                                    </div>
                                </div> 
                            
                        <?php } elseif ($settings['style'] == 'three') { ?>
                            <div <?php post_class('pixsass-portfolio-item'); ?>>
                                <div class="pixsass-isotope-grid__img">
                                    <?php the_post_thumbnail('saaspik-portfolio-colmn-3'); ?>
                        
                                    <div class="portfolio-info">	
                                        <h3 class="portfolio-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        
                                        <div class="portfolio-cat">
                                            <?php
                                            $terms = get_the_terms( get_the_ID(), 'portfolio_cat' );
                                            if ( $terms && ! is_wp_error( $terms ) ) :
                                                foreach ( $terms as $term ) { ?>
                                                <span class="cat"><?php echo $term->name; ?></span>
                                                <?php } ?>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>
                        <?php } ?>
                    </div>
            <?php  
                endwhile;
            endif; ?>
        </div>
        </div>
    <?php

    }

    protected function _content_template() {}

}


