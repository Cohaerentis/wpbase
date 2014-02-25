<?php
/**
 * Custom functions
 */
// AEA - Sample of custom post_type order
/* function post_type_activity_order( $query ) {
    if ( $query->is_main_query() &&
         $query->is_archive() && ($query->get('post_type') == 'activity') ) {
        $query->set( 'orderby', 'meta_value' );
        $query->set( 'meta_key', 'activity_date' );
        $query->set( 'meta_value', time() + ONE_DAY_IN_SECONDS);
        $query->set( 'meta_compare', '>=' );
        $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'post_type_activity_order' );
*/
// AEA - Remove the default padding styles from WordPress for the Toolbar
add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );