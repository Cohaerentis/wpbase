<?php
/**
 * Register sidebars and widgets
 */
function roots_widgets_init() {
  // AEA - Register widgetized areas
  register_sidebar(array(
    'name'          => __('Home Topbar', 'roots'),
    'id'            => 'home-topbar',
    'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<div class="widget-home-topbar-title">',
    'after_title'   => '</div>',
  ));

  register_sidebar(array(
    'name'          => __('Home Sidebar', 'roots'),
    'id'            => 'home-sidebar',
    'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<div class="widget-home-sidebar-title">',
    'after_title'   => '</div>',
  ));

  register_sidebar(array(
    'name'          => __('Home Bottombar', 'roots'),
    'id'            => 'home-bottombar',
    'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<div class="widget-home-bottombar-title">',
    'after_title'   => '</div>',
  ));

  register_sidebar(array(
    'name'          => __('Page Sidebar', 'roots'),
    'id'            => 'page-sidebar',
    'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<div class="widget-page-sidebar-title">',
    'after_title'   => '</div>',
  ));

  register_sidebar(array(
    'name'          => __('Single Sidebar', 'roots'),
    'id'            => 'single-sidebar',
    'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<div class="widget-single-sidebar-title">',
    'after_title'   => '</div>',
  ));

  register_sidebar(array(
    'name'          => __('Archive Topbar', 'roots'),
    'id'            => 'archive-topbar',
    'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<div class="widget-archive-topbar-title">',
    'after_title'   => '</div>',
  ));

  register_sidebar(array(
    'name'          => __('Archive Sidebar', 'roots'),
    'id'            => 'archive-sidebar',
    'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<div class="widget-archive-sidebar-title">',
    'after_title'   => '</div>',
  ));

  register_sidebar(array(
    'name'          => __('Activity Topbar', 'roots'),
    'id'            => 'activity-topbar',
    'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<div class="widget-activity-topbar-title">',
    'after_title'   => '</div>',
  ));

  register_sidebar(array(
    'name'          => __('Activity Sidebar', 'roots'),
    'id'            => 'activity-sidebar',
    'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<div class="widget-activity-sidebar-title">',
    'after_title'   => '</div>',
  ));

  register_sidebar(array(
    'name'          => __('Country Topbar', 'roots'),
    'id'            => 'country-topbar',
    'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<div class="widget-country-topbar-title">',
    'after_title'   => '</div>',
  ));

  register_sidebar(array(
    'name'          => __('Country Sidebar', 'roots'),
    'id'            => 'tematica-sidebar',
    'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<div class="widget-tematica-sidebar-title">',
    'after_title'   => '</div>',
  ));

  register_sidebar(array(
    'name'          => __('Footer Topbar', 'roots'),
    'id'            => 'footer-topbar',
    'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<div class="widget-footer-topbar-title">',
    'after_title'   => '</div>',
  ));

  register_sidebar(array(
    'name'          => __('Footer Bottombar', 'roots'),
    'id'            => 'footer-bottombar',
    'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<div class="widget-footer-bottombar-title">',
    'after_title'   => '</div>',
  ));

  // Register widgets
  register_widget('Roots_Vcard_Widget');
  register_widget('TN_NGG_Slider_Widget');
  register_widget('TN_Embed_Page_Widget');
  register_widget('TN_Embed_Image_Widget');
}
add_action('widgets_init', 'roots_widgets_init');

require_once locate_template('/lib/widgets-roots-vcard.php');     // Roots Vcard
require_once locate_template('/lib/widgets-tn-ngg-slider.php');   // Teachnova NGG Gallery Slider
require_once locate_template('/lib/widgets-tn-embedpage.php');    // Teachnova Embed Page
require_once locate_template('/lib/widgets-tn-embedimage.php');   // Teachnova Embed Image
