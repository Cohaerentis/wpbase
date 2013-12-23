<?php
/*
Plugin Name:  Must Use Plugins Loader
Plugin URI:   http://benword.com/
Description:  Options Framework, CMB, CF Post Formats, and site-specific functionality (custom post types, taxonomies, meta boxes, shortcodes)
Version:      1.0
Author:       Ben Word
Author URI:   http://benword.com/
*/

require WPMU_PLUGIN_DIR . '/options-framework/options-framework.php';
require WPMU_PLUGIN_DIR . '/wp-post-formats/cf-post-formats.php';

// Site specific custom post types, taxonomies, meta boxes and shortcodes
require WPMU_PLUGIN_DIR . '/base/base.php';

// Load CMB
function load_cmb() {
  if (!is_admin()) {
    return;
  }

  require WPMU_PLUGIN_DIR . '/cmb/init.php';
}
add_action('init', 'load_cmb');

require WPMU_PLUGIN_DIR . '/taxonomy-meta/taxonomy-meta.php';

require WPMU_PLUGIN_DIR . '/polylang/polylang.php';

require WPMU_PLUGIN_DIR . '/contact-form-7/wp-contact-form-7.php';

require WPMU_PLUGIN_DIR . '/shortcodes-ultimate/shortcodes-ultimate.php';

require WPMU_PLUGIN_DIR . '/easy-bootstrap-shortcodes/osc_bootstrap_shortcode.php';

require WPMU_PLUGIN_DIR . '/tinymce-advanced/tinymce-advanced.php';

// AEA - Conflict with Wordpress fullscreen, enable only in development phase
require WPMU_PLUGIN_DIR . '/html-editor-syntax-highlighter/html-editor-syntax-highlighter.php';

require WPMU_PLUGIN_DIR . '/page-list/page-list.php';

require WPMU_PLUGIN_DIR . '/wp-visual-icon-fonts/wp-visual-icon-fonts.php';
