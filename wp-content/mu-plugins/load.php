<?php
/*
Plugin Name:  Must Use Plugins Loader
Plugin URI:   http://benword.com/
Description:  Options Framework, CMB, CF Post Formats, and site-specific functionality (custom post types, taxonomies, meta boxes, shortcodes)
Version:      1.0
Author:       Ben Word
Author URI:   http://benword.com/
*/

// Options Framework
// http://wptheming.com/options-framework-plugin
// https://wordpress.org/plugins/options-framework/
// Update from Wordpress site by downloading zip file
// Files modified :
// - includes/class-options-framework.php : Load MU-Plugin text domain
require WPMU_PLUGIN_DIR . '/options-framework/options-framework.php';

// CF Post Formats
// AEA - Disable because is not working in WP 3.8
// require WPMU_PLUGIN_DIR . '/wp-post-formats/cf-post-formats.php';

// Site specific custom post types, taxonomies, meta boxes and shortcodes
require WPMU_PLUGIN_DIR . '/base/base.php';

// Custom Metaboxes and Fields for WordPress
// https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
// Update by pulling github repository
// Files modified :
// - helpers/cmb_Meta_Box_types.php : Spanish date format
// - js/cmb.js                      : Spanish date format
// - js/cmb.min.js                  : Spanish date format
function load_cmb() {
  if (!is_admin()) {
    return;
  }

  require WPMU_PLUGIN_DIR . '/cmb/init.php';
}
add_action('init', 'load_cmb');

// Taxonomy Meta
// https://github.com/rilwis/taxonomy-meta
// Update by pulling github repository
// Files modified :
// - taxonomy-meta.php : Allow to use a callback function to get options
//                       Escape HTML attributes, except for wysiwyg type
require WPMU_PLUGIN_DIR . '/taxonomy-meta/taxonomy-meta.php';

// Polylang
// https://wordpress.org/plugins/polylang/
// Update from Wordpress site by downloading zip file
// Files modified :
// - polylang.php : Workaround to get correct MU-Plugins url
require WPMU_PLUGIN_DIR . '/polylang/polylang.php';

// Contact Form 7
// https://wordpress.org/plugins/contact-form-7/
// Update from Wordpress site by downloading zip file
// Files modified :
// - includes/functions.php : Load MU-Plugin text domain
require WPMU_PLUGIN_DIR . '/contact-form-7/wp-contact-form-7.php';

// Editor improvements and workarounds
// AEA - Use one of this plugins only:
// - Shortcode Ultimate
// - Easy Bootstrap Shortcode (preferrely)

// Shortcodes Ultimate
// http://gndev.info/shortcodes-ultimate/
// http://wordpress.org/plugins/shortcodes-ultimate/
// Update from Wordpress site by downloading zip file
// Files modified :
// - inc/core/load.php : Load MU-Plugin text domain
// - inc/core/shortcodes.php : Adding new params to gmap shortcode
// require WPMU_PLUGIN_DIR . '/shortcodes-ultimate/shortcodes-ultimate.php';

// Easy Bootstrap Shortcode
// http://oscitasthemes.com/freestuff/easy-bootstrap-shortcodes/
// http://wordpress.org/plugins/easy-bootstrap-shortcodes/
// Update from Wordpress site by downloading zip file
// Files modified :
// - btngrp/btngrp_plugin.js : Rename 'class' parameter by 'css_class'
// - btngrp/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - btngrptool/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - buttons/buttons_plugin.js : Rename 'class' parameter by 'css_class'
// - buttons/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - deslist/deslist_plugin.js : Rename 'class' parameter by 'css_class'
// - deslist/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - dropdown/dropdown_plugin.js : Rename 'class' parameter by 'css_class'
// - dropdown/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - icon/icon_plugin.js : Rename 'class' parameter by 'css_class'
// - icon/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - iconhead/iconhead_plugin.js : Rename 'class' parameter by 'css_class'
// - iconhead/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - image/image_plugin.js : Rename 'class' parameter by 'css_class'
// - image/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - labels/labels_plugin.js : Rename 'class' parameter by 'css_class'
// - labels/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - lists/lists_plugin.js : Rename 'class' parameter by 'css_class'
// - lists/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - notifications/notifications_plugin.js : Rename 'class' parameter by 'css_class'
// - notifications/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - oscpopover/oscpopover_plugin.js : Rename 'class' parameter by 'css_class'
// - oscpopover/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - panel/panel_plugin.js : Rename 'class' parameter by 'css_class'
// - panel/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - progressbar/progressbar_plugin.js : Rename 'class' parameter by 'css_class'
// - progressbar/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - rule/rule_plugin.js : Rename 'class' parameter by 'css_class'
// - rule/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - servicebox/servicebox_plugin.js : Rename 'class' parameter by 'css_class'
// - servicebox/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - tables/tables_plugin.js : Rename 'class' parameter by 'css_class'
// - tables/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - tabs/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - thumbnail/thumbnail_plugin.js : Rename 'class' parameter by 'css_class'
// - thumbnail/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - toggles/toggles_plugin.js : Rename 'class' parameter by 'css_class'
// - toggles/plugin_shortcode.php : User can add a caret, at left of title
//                                : User can open this toggle in initial page load
// - tooltip/tooltip_plugin.js : Rename 'class' parameter by 'css_class'
// - tooltip/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - well/well_plugin.js : Rename 'class' parameter by 'css_class'
// - well/plugin_shortcode.php : Rename 'class' parameter by 'css_class'
// - wpcolumns/wpcolumns_plugin.js : Rename 'class' parameter by 'css_class'
// - wpcolumns/plugin_shortcode.php : Horizontal Small Devices
//                                  : Allow user to set custom HTML tag
//                                  : Add alias to nesting shortcodes
//                                  : Applying DRY Principle
//                                  : Rename 'class' parameter by 'css_class'
require WPMU_PLUGIN_DIR . '/easy-bootstrap-shortcodes/osc_bootstrap_shortcode.php';

// TinyMCE Advanced
// http://www.laptoptips.ca/projects/tinymce-advanced/
// http://wordpress.org/plugins/tinymce-advanced/
// Update from Wordpress site by downloading zip file
// Files modified : none
require WPMU_PLUGIN_DIR . '/tinymce-advanced/tinymce-advanced.php';

// AEA - Conflict with Wordpress fullscreen, enable only in development phase
// AEA - Not working with visual editor in taxonomy editing
// Waiting for support answer at:
// - http://wordpress.org/support/topic/not-working-with-visual-editor-in-taxonomy-editing
// - http://wordpress.org/support/topic/bug-fullscreen-in-visual-mode-no-longer-works
// require WPMU_PLUGIN_DIR . '/html-editor-syntax-highlighter/html-editor-syntax-highlighter.php';

// Page-list
// http://wordpress.org/plugins/page-list/
// Update from Wordpress site by downloading zip file
// Files modified : none
require WPMU_PLUGIN_DIR . '/page-list/page-list.php';

// WordPress Visual Icon Fonts
// https://github.com/wp-plugins/wp-visual-icon-fonts/
// Update by pulling github repository
// Files modified :
// - wp_visual_icon_fonts.php : Do not change Editor More button, TinyMCE Advanced do it better
// AEA - Disable because is not working on WP 3.8
// AEA - We do not use FontAwesome icons in this project
// require WPMU_PLUGIN_DIR . '/wp-visual-icon-fonts/wp-visual-icon-fonts.php';

// Roots rewrites
require WPMU_PLUGIN_DIR . '/roots-rewrites/roots-rewrites.php';

// wpautop disable
// Un-comment this if you want to disable wpautop feature
// Notice : Remember to use [tn_p] and [tn_br] shortcodes to create paragraphs
//          and breaking-lines in visual editor
require WPMU_PLUGIN_DIR . '/wpautop-disable.php';

