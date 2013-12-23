<?php
/**
 * Custom post types & taxonomies
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

/**
 * Activity custom post type
 */
function base_register_activity_post_type() {
   $labels = array(
      'name'               => __('Activities'),
      'singular_name'      => __('Activity'),
      'add_new'            => __('Add new'),
      'add_new_item'       => __('Add an activity'),
      'edit_item'          => __('Edit an activity'),
      'new_item'           => __('New activity'),
      'view_item'          => __('View activity'),
      'search_items'       => __('Search activities'),
      'not_found'          => __('No activities found'),
      'not_found_in_trash' => __('No activities found in trash'),
      'parent_item'        => '',
      'parent_item_colon'  => '',
      'menu_name'          => __('Activity')
   );

   $args = array(
      'label'               => 'activity',
      'description'         => __('Activity'),
      'labels'              => $labels,
      'taxonomies'          => array('country'),
      'public'              => true,
      'exclude_from_search' => false,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'publicly_queryable'  => true,
      'query_var'           => true,
      'rewrite'             => array('slug' => 'activity'),
      'capability_type'     => 'page',
      'has_archive'         => true,
      'can_export'          => true,
      'hierarchical'        => false,
      'menu_position'       => null,
      'supports'            => array('title', 'editor', 'excerpt',
                                     'thumbnail', 'revisions',
                                     'custom-fields', 'page-attributes',
                                     'post-formats')
   );

   register_post_type('activity', $args);
}
add_action('init', 'base_register_activity_post_type');


/**
 * Country taxonomy
 */
function base_register_country_taxonomy() {
   $labels = array(
      'name'               => __('Countries'),
      'singular_name'      => __('Country'),
      'search_items'       => __('Search countries'),
      'all_items'          => __('All countries'),
      'parent_item'        => '',
      'parent_item_colon'  => '',
      'edit_item'          => __('Edit country'),
      'update_item'        => __('Update country'),
      'add_new_item'       => __('Add new country'),
      'new_item_name'      => __('Country name'),
      'menu_name'          => __('Country')
   );

   $args = array(
      'hierarchical'       => false,
      'labels'             => $labels,
      'public'             => true,
      'show_ui'            => true,
      'show_admin_column'  => true,
      'show_in_nav_menus'  => true,
      'show_tagcloud'      => true,
      'query_var'          => true,
      'rewrite'            => array('slug' => 'country'),
   );
   register_taxonomy('country', array('activity'), $args);
}
add_action('init', 'base_register_country_taxonomy');
