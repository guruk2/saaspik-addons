<?php
/**
 * Portfolio single.
 *
 * @package Saaspik_addons
 * @since   1.0.0
 */

get_header(); ?>

<section class="portfolio_details_area"> 	
    <div class="portfolio-signle">
        <div class="container">			
            <div class="portfolio-single-wrapper">
                <?php while ( have_posts() ) : the_post(); ?>

                    <div class="port-header">
                        <div class="portfolio-title">
                            <h2 class="title"><?php echo the_title(); ?></h2>
                        </div>
                        

                        <div class="share-link">
                            <span class="share">Share:</span>
                            <?php				
                                
                                $profail_link = saaspik_option( 'saaspik_social_links' );

                                if ( ! empty( $profail_link ) ) :
                                    echo '<ul class="footer-social-link">';
                                    foreach ($profail_link as $item ) :
                                        ?>
                                        <li>
                                            <a href="<?php echo esc_url( $item['url'] ); ?>">
                                                <i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
                                            </a>
                                        </li>
                                        <?php
                                    endforeach;
                                    echo '</ul>';
                                endif;
                            ?>
                        </div>
                    </div>
                    <!-- /.port-header -->

                    <div class="portfolio-content"> 
                        
                        <div class="menu-feature-image">
                            <?php 
                                if ( has_post_thumbnail() ) {						
                                    echo the_post_thumbnail('saaspik-portfolio-single');
                                }
                            ?>
                        </div>			
                                
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="content-inner">
                                    <?php the_content(); ?>
                                </div><!-- /.content-inner -->

                            </div>

                            <div class="col-md-4">
                                <div class="portfolio-info">
                                    <?php 
                                                
                                        $meta = get_post_meta( get_the_ID(), 'portfolio_options', true );
                                        $port = $meta['portfolio_info'];
                                    

                                        if ( ! empty( $port ) ) :
                                            echo '<ul class="info">';
                                            foreach ($port as $item ) : 
                                                if (! empty ($item['opt-text']) || ! empty($item['opt-des']) ) { ?>
                                                    <li>
                                                        <?php echo $item['opt-text']; ?>
                                                        <span><?php echo $item['opt-des']; ?></span>
                                                    </li>
                                                <?php }
                                            endforeach;
                                            echo '</ul>';
                                        endif; ?>                                   
                                
                                </div>
                            </div>
                            <!-- /.col-m4-4 -->				
                        </div><!-- .row -->
                    </div>
                <?php endwhile; ?>      
      
                <ul class="portfolio-nav">
                    <?php
                        $next     = get_adjacent_post();
                        $previous = get_adjacent_post( false, '', false );

                        if ( $next ) {
                            echo '<li class="prev"><a href="' . esc_url( get_permalink( $next->ID ) ) . '" class="prev"><i class="ei ei-arrow_left"></i>Previous</a></li>';
                        }                 

                        if ( $previous ) {
                            echo '<li class="next"><a href="' . esc_url( get_permalink( $previous->ID ) ) . '" class="next">Next<i class="ei ei-arrow_right"></i></a></li>';
                        }
                    ?>
                </ul><!-- .portfolio-navigation -->        

            </div><!-- .container -->

            <?php 
                if(saaspik_option('releted_portfolio') == '1') {
                    if (class_exists('Portfolio')) {
                        Portfolio::related();
                        wp_enqueue_script('jquery-swiper' );
                    }
                }
            ?>
        </div>
    </div><!-- .portfolio-signle -->
</section>
<?php get_footer();