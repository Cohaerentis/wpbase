<?php
/**
 * Custom meta boxes with the CMB plugin
 *
 * @link https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 * @link https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress/wiki/Basic-Usage
 * @link https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress/wiki/Field-Types
 * @link https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress/wiki/Display-Options
 */

function base_meta_boxes($meta_boxes) {

   /**
    * Activity meta box
    */
   $prefix = 'activity_';
   $meta_boxes[] = array(
      'id'         => 'activity',
      'title'      => __('Activity options'),
      'pages'      => array('activity'),
      'context'    => 'normal',
      'priority'   => 'high',
      'show_names' => true,
      'fields'     => array(
         array(
            'name' => __('Place'),
            'desc' => __('Place where this activity will occur'),
            'id' => $prefix . 'place',
            'type' => 'text'
         ),
         array(
            'name' => __('Date'),
            'desc' => __('Activity date'),
            'id' => $prefix . 'date',
            'type' => 'text_date_timestamp'
         ),
         array(
            'name' => __('Contact'),
            'desc' => __('Email contact for people interested in this activity'),
            'id' => $prefix . 'contact',
            'type' => 'text'
         ),
         array(
            'name' => __('Landing page'),
            'desc' => __('Activity landing page'),
            'id' => $prefix . 'landingpage',
            'type' => 'text'
         ),
         array(
            'name' => __('Infographic'),
            'desc' => __('Image that describe activity without words.'),
            'id' => $prefix . 'infographic',
            'type' => 'file',
            'save_id' => false,                       // save ID using true
            'allow' => array( 'url', 'attachment' )   // limit to just attachments with array( 'attachment' )
         ),
      ),
   );

   return $meta_boxes;
}
add_filter('cmb_meta_boxes', 'base_meta_boxes');

/**
 * Custom meta boxes with the Taxonomy Meta plugin
 *
 * @link http://www.deluxeblogtips.com/taxonomy-meta-script-for-wordpress
 */

function base_register_taxonomy_meta_boxes()
{
   // Make sure there's no errors when the plugin is deactivated or during upgrade
   if ( !class_exists( 'RW_Taxonomy_Meta' ) )
      return;

   $meta_sections = array();

   // first meta section
   $prefix = 'country_';
   $meta_sections[] = array(
      'title' => __('Country options'),         // section title
      'taxonomies' => array('country'),         // list of taxonomies. Default is array('category', 'post_tag'). Optional
      'id' => $prefix . 'section',              // ID of each section, will be the option name

      'fields' => array(                        // list of meta fields
         array(
            'name' => __('Flag'),               // field name
            'desc' => __('Country flag'),       // field description, optional
            'id' => $prefix . 'flag',           // field id, i.e. the meta key
            'type' => 'image'                   // image upload
         ),
         array(
            'name' => __('Summary'),
            'desc' => __('Brief introduction to this country'),
            'id' => $prefix . 'summary',
            'type' => 'wysiwyg',                // WYSIWYG editor
            'std' => ''                         // default value, optional
         ),
         array(
            'name' => __('GoogleMap'),
            'desc' => __('Address for Google Map'),
            'id' => $prefix . 'gmap',
            'type' => 'text',                   // text box
            'std' => ''                         // default value, optional
         ),
      )
   );

   foreach ( $meta_sections as $meta_section ) {
      new RW_Taxonomy_Meta( $meta_section );
   }
}
add_action( 'admin_init', 'base_register_taxonomy_meta_boxes' );
