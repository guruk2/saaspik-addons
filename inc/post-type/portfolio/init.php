<?php
/**
 * Portfolio custom post type.
 *
 * @package Saaspik_Addones
 * @since   1.0.0
 */

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

class Portfolio {
	/**
	 * Construct function.
	 *
	 * @return  void
	 */
	function __construct() {
		add_action( 'init', array( __CLASS__, 'portfolio_init' ) );
		add_filter( 'single_template', array( $this, 'portfolio_single' ) );	
	}

	/**
	 * Register a Portfolio post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	public static function portfolio_init() {
		register_post_type( 'saaspik_portfolio',
			array(
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'portfolio' ),
				'capability_type'    => 'post',
				'has_archive'        => false,
				'hierarchical'       => false,
				'menu_position'      => 20,
				'menu_icon'          => 'dashicons-images-alt2',
				'supports'           => array( 'title', 'editor', 'thumbnail', 'comments'),
				'labels'             => array(
					'name'               => _x( 'Portfolio', 'saaspik-addones' ),
					'singular_name'      => _x( 'Portfolio', 'saaspik-addones' ),
					'menu_name'          => _x( 'Portfolio', 'saaspik-addones' ),
					'name_admin_bar'     => _x( 'Portfolio', 'saaspik-addones' ),
					'add_new'            => _x( 'Add New', 'saaspik-addones' ),
					'add_new_item'       => __( 'Add New Portfolio', 'saaspik-addones' ),
					'new_item'           => __( 'New Portfolio', 'saaspik-addones' ),
					'edit_item'          => __( 'Edit Portfolio', 'saaspik-addones' ),
					'view_item'          => __( 'View Portfolio', 'saaspik-addones' ),
					'all_items'          => __( 'All Portfolios', 'saaspik-addones' ),
					'search_items'       => __( 'Search Portfolios', 'saaspik-addones' ),
					'parent_item_colon'  => __( 'Parent Portfolios:', 'saaspik-addones' ),
					'not_found'          => __( 'No Portfolio found.', 'saaspik-addones' ),
					'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'saaspik-addones' )
				),
			)
		);

		// Register portfolio category
		register_taxonomy( 'portfolio_cat',
			array( 'saaspik_portfolio' ),
			array(
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'portfolio_cat' ),
				'labels'            => array(
					'name'              => _x( 'Categories', 'saaspik-addones' ),
					'singular_name'     => _x( 'Category', 'saaspik-addones' ),
					'search_items'      => __( 'Search Categories', 'saaspik-addones' ),
					'all_items'         => __( 'All Categories', 'saaspik-addones' ),
					'parent_item'       => __( 'Parent Category', 'saaspik-addones' ),
					'parent_item_colon' => __( 'Parent Category:', 'saaspik-addones' ),
					'edit_item'         => __( 'Edit Category', 'saaspik-addones' ),
					'update_item'       => __( 'Update Category', 'saaspik-addones' ),
					'add_new_item'      => __( 'Add New Category', 'saaspik-addones' ),
					'new_item_name'     => __( 'New Category Name', 'saaspik-addones' ),
					'menu_name'         => __( 'Categories', 'saaspik-addones' ),
				),
			)
		);
	

		//Register portfolio tag
		register_taxonomy( 'portfolio_tag',
			'saaspik_portfolio',
			array(
				'hierarchical'          => true,
				'show_ui'               => true,
				'show_admin_column'     => true,
				'update_count_callback' => '_update_post_term_count',
				'query_var'             => true,
				'rewrite'               => array( 'slug' => 'portfolio_tag' ),
				'labels'                => array(
					'name'                       => _x( 'Tags', 'saaspik-addones' ),
					'singular_name'              => _x( 'Tag', 'saaspik-addones' ),
					'search_items'               => __( 'Search Tags', 'saaspik-addones' ),
					'popular_items'              => __( 'Popular Tags', 'saaspik-addones' ),
					'all_items'                  => __( 'All Tags', 'saaspik-addones' ),
					'parent_item'                => null,
					'parent_item_colon'          => null,
					'edit_item'                  => __( 'Edit Tag', 'saaspik-addones' ),
					'update_item'                => __( 'Update Tag', 'saaspik-addones' ),
					'add_new_item'               => __( 'Add New Tag', 'saaspik-addones' ),
					'new_item_name'              => __( 'New Tag Name', 'saaspik-addones' ),
					'separate_items_with_commas' => __( 'Separate tag with commas', 'saaspik-addones' ),
					'add_or_remove_items'        => __( 'Add or remove tag', 'saaspik-addones' ),
					'choose_from_most_used'      => __( 'Choose from the most used tag', 'saaspik-addones' ),
					'not_found'                  => __( 'No tag found.', 'saaspik-addones' ),
					'menu_name'                  => __( 'Tags', 'saaspik-addones' ),
				),
			)
		);
	}

	/**
	 * Load single item template file for the portfolio custom post type.
	 *
	 * @param   string  $template  Current template file.
	 *
	 * @return  string
	 */
	function portfolio_single( $template ) {
		global $post;

		if ( $post->post_type == 'saaspik_portfolio' ) {
			$template = SAASPIK_ADDONCE_DIR . 'inc/post-type/portfolio/views/single.php';
		}
		return $template;
	}


	/**
	 * Define helper function to print related portfolio.
	 *
	 * @return  array
	 */
	public static function related() {

		global $post;
		// Get the good menu tags.
		$cats = get_the_terms( $post, 'portfolio_cat' );

		if ( $cats ) {
			$cat_ids = array();

			foreach ( $cats as $cat ) {
				$cat_ids[] = $cat->term_id;
			}

			$args = array(
				'post_type'      => 'saaspik_portfolio',
				'post__not_in'   => array( $post->ID ),
				'posts_per_page' => -1,
				'tax_query'      => array(
					array(
						'taxonomy' => 'portfolio_cat',
						'field'    => 'id',
						'terms'    => $cat_ids,
					),
				)
			);
		
			$the_query = new WP_Query( $args );

			?>
			
			<div class="container related-portfolio">			
				<?php if(saaspik_option('port_title') !== '' || saaspik_option('port_sub_title') !== '') { ?>
					<div class="section-title text-center">
					<?php if(saaspik_option('port_sub_title') !== "") : ?>
						<h3 class="sub-title wow fadeInUp" ><?php echo esc_html( saaspik_option('port_sub_title')) ?></h3>
					<?php endif; ?>
						<?php if(saaspik_option('port_title') !== "") : ?>
							<h2 class="title wow fadeInUp" data-wow-delay="0.3s"><?php echo esc_html(saaspik_option('port_title')) ?> </h2>
						</div>
					<?php endif; ?>
				<?php } ?>
                
                <div class="swiper-container" id="related-portfolio" data-speed="1000" data-perpage="3" data-autoply="5000" data-space="30" data-breakpoints='{"1024": {"slidesPerView": 2}, "768": {"slidesPerView": 1}}'>
        
                    <div class="swiper-wrapper">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div class="swiper-slide">
								<div class="portfolio-item">
									<div class="feature-image">
										<a href="<?php the_permalink(); ?>">
											<?php
											if ( has_post_thumbnail() ) :
												the_post_thumbnail('saaspik_related_portfolio');
											endif;
											?>
										</a>
									</div>

									<div class="port-info">
										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                                    

										<div class="portfolio-categories">
											<?php $terms = get_the_terms( get_the_ID(), 'portfolio_cat' );
										
											if ( $terms && ! is_wp_error( $terms ) ) : 
												foreach ( $terms as $term ) { ?>
													<span><?php echo $term->name; ?></span>
												<?php } ?>
											<?php endif; ?>
										</div>
									</div>
								</div>
								<!-- /.portfolio-item -->
							</div>
							<!-- /.swiper-slide -->	
						<?php endwhile; ?>							
                    </div>
                    <!-- /.swiper-wrapper -->

                    <div class="swiper-pagination"></div>
                </div>
                <!-- /.swiper-container -->
					
			</div>
			<!-- /.container -->		
		<?php }
		wp_reset_postdata();
	}

	/**
	 * fix paginate not work from page 3
	 *
	 */
	public static function pre_get_posts($query) {
		if ( !is_admin() && $query->is_main_query() ) {
			if ($query->is_tax('portfolio_cat') || $query->is_tax('portfolio_tag')) {
				$query->set( 'posts_per_page', cs_get_option( 'portfolio-number-per-page' ) );
			}
		}
	}
}

$portfolio = new Portfolio;