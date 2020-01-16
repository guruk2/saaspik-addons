<?php

add_image_size('saaspik-recent-post-thumb', 100, 100, true); // Recent Post widget
add_image_size('saaspik-image-tab', 970, 600, true); // Image Tab
add_image_size('saaspik_related_portfolio', 370, 450, true); // Portfolio Related Post Carousel
add_image_size('saaspik_testimonial_three', 440, 385, true); // Testimonial Three
add_image_size('saaspik_blog_grid', 545, 400, true); // Blog Post Grid

// Social Share
function saaspik_social_share() { ?>
    <div class="social_icon">   
        <ul class="share-link">
            <li><a href="https://facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://twitter.com/intent/tweet?text=<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://www.pinterest.com/pin/create/button/?url=<?php the_permalink() ?>"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>"><i class="fa fa-linkedin"></i></a></li>
        </ul>
    </div>
<?php
}

/**
 *
 * Get Catagories/Taxonomies List
 * @since 1.0.0
 *
 */
if ( !function_exists( 'saaspik_category_list' ) ) {

    function saaspik_category_list( $cat ) {
        $query_args = array(
            'orderby'    => 'ID',
            'order'      => 'DESC',
            'hide_empty' => 1,
            'taxonomy'   => $cat
        );

        $categories  = get_categories( $query_args );
        $options     = array( esc_html__( '0', 'saaspik-addons' ) => 'All Category' );
        if ( is_array( $categories ) && count( $categories ) > 0 ) {
            foreach ( $categories as $cat ) {
                $options[ $cat->term_id ] = $cat->name;
            }
            return $options;
        }
    }

}

if ( !function_exists( 'saaspik_get_alt_name' ) ) {

    function saaspik_get_alt_name( $id ) {
        if ( !empty( $id ) ) {
            $alt = get_post_meta( $id, '_wp_attachment_image_alt', true );
            if ( !empty( $alt ) ) {
                $alt = $alt;
            } else {
                $alt = get_the_title( $id );
            }
            return $alt;
        }
    }

}


// simply echos the variable
if ( !function_exists( 'saaspik_return' ) ) {

    function saaspik_return( $s ) {
        return $s;
    }

}


function saaspik_addons_get_contact_form7_forms(){
    $forms = get_posts( 'post_type=wpcf7_contact_form&posts_per_page=-1' );

    $results = array();
    if ( $forms ) {
        $results[] = __( 'Select A Form', 'saaspik-addons' );
        foreach ( $forms as $form ) {
            $results[ $form->ID ] = $form->post_title;
        }
        // array_unshift( $results, __( 'Select A Form', 'saaspik-addons' ) );
        // $results[] = __( 'Select A Form', 'saaspik-addons' );
    } else {
        $results[] =  __( 'No contact forms found', 'saaspik-addons' ) ;
    }

    return $results;
}

