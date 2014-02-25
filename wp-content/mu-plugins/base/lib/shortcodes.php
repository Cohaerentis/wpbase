<?php
/**
 * Custom shortcodes
 */

$prefix = 'base_';

/**
 * [base_follow] shortcode
 *
 * Follow links
 *  - title       : h3 title
 *  - description : p description
 *  - fb          : Facebook
 *  - tt          : Twitter
 *  - gp          : Google+
 *  - in          : Linkedin
 *  - yt          : YouTube
 *  - ss          : SlideShare
 *  - fr          : Flickr
 *  - rss         : RSS
 *
 * Example:
 * [base_follow]
 */
function base_shortcode_follow($atts) {
   extract(shortcode_atts(array(
      'title' => '',
      'description' => '',
      'fb' => '',
      'tt' => '',
      'gp' => '',
      'in' => '',
      'yt' => '',
      'ss' => '',
      'fr' => '',
      'rss' => ''
   ), $atts));

   ob_start();
   include(dirname(dirname(__FILE__)) . '/templates/shortcode-follow.php');
   $html = ob_get_clean();
   return preg_replace('(\n|\r)', ' ', $html);
}
add_shortcode($prefix . 'follow', 'base_shortcode_follow');

/**
 * [base_yt_videos_mosaic] shortcode
 *
 * Mosaic of last YouTube videos
 *  - n       : Number of videos (default 8)
 *  - ytuser  : YouTube username
 *
 * Example:
 * [base_yt_videos_mosaic ytuser="youruserid"]
 */
function base_shortcode_yt_videos_mosaic($atts) {
   extract(shortcode_atts(array(
      'ytuser' => '',
      'n' => 8,
      'title_crop' => 18,
   ), $atts));

   ob_start();
   include(dirname(dirname(__FILE__)) . '/templates/shortcode-yt-videos-mosaic.php');
   $html = ob_get_clean();
   return preg_replace('(\n|\r)', ' ', $html);
}
add_shortcode($prefix . 'yt_videos_mosaic', 'base_shortcode_yt_videos_mosaic');

/**
 * [base_modal] shortcode
 *
 * Example:
 * [base_modal type='hotelchain']
 */
function base_shortcode_modal($atts, $content) {
   extract(shortcode_atts(array(
      'title'        => '',
      'btn_label'    => 'Open Modal',
      'btn_type'     => 'primary',
      'btn_size'     => 'lg',
      'btn_p_class'  => '',
      'css_class'    => '',
      'css_id'       => '',
      'submit_link'  => '',
      'submit_label' => 'Submit',
      'submit_type'  => 'primary',
      'submit_size'  => 'lg',
   ), $atts));

   ob_start();
   include(dirname(dirname(__FILE__)) . '/templates/shortcode-modal.php');
   $html = ob_get_clean();
   return preg_replace('(\n|\r)', ' ', $html);
}
add_shortcode($prefix . 'modal', 'base_shortcode_modal');

/**
 * [base_glyphicon] shortcode
 *
 * Example:
 * [base_glyphicon name='info-circle']
 */
function base_shortcode_glyphicon($atts) {
   extract(shortcode_atts(array(
      'type'         => 'regular', // regular, halflings, social, filetypes
      'name'         => 'info',
      'tag'          => 'i',
      'href'         => '',
      'color'        => '',
      'spin'         => 'no', // yes, no
      'rotate'       => '',   // rotate-90, rotate-180, rotate-270, flip-horizontal, flip-vertical
      'css_id'       => '',
      'css_class'    => '',
   ), $atts));

   ob_start();
   include(dirname(dirname(__FILE__)) . '/templates/shortcode-glyphicon.php');
   $html = ob_get_clean();
   return preg_replace('(\n|\r)', ' ', $html);
}
add_shortcode($prefix . 'glyphicon', 'tn_shortcode_glyphicon');

/**
 * [base_fa_icon] shortcode
 *
 * Example:
 * [base_fa_icon name='info-circle']
 */
function base_shortcode_fa_icon($atts) {
   extract(shortcode_atts(array(
      'name'         => 'info',
      'tag'          => 'i',
      'href'         => '',
      'color'        => '',
      'size'         => '',   // lg, x2, x3, x4, x5
      'border'       => 'no', // yes, no
      'fixed_width'  => 'no', // yes, no
      'spin'         => 'no', // yes, no
      'rotate'       => '',   // rotate-90, rotate-180, rotate-270, flip-horizontal, flip-vertical
      'stack'        => '',   // x1, x2, x3, x4, x5
      'inverse'      => 'no', // yes, no
      'css_id'       => '',
      'css_class'    => '',
   ), $atts));

   ob_start();
   include(dirname(dirname(__FILE__)) . '/templates/shortcode-fa-icon.php');
   $html = ob_get_clean();
   return preg_replace('(\n|\r)', ' ', $html);
}
add_shortcode($prefix . 'fa_icon', 'base_shortcode_fa_icon');

/**
 * [tn_fa_stack] shortcode
 *
 * Example:
 * [tn_fa_stack]
 */
function base_shortcode_fa_stack($atts, $content) {
   extract(shortcode_atts(array(
      'size'         => '', // lg, x2, x3, x4, x5
      'css_id'       => '',
      'css_class'    => '',
   ), $atts));

   ob_start();
   include(dirname(dirname(__FILE__)) . '/templates/shortcode-fa-stack.php');
   $html = ob_get_clean();
   return preg_replace('(\n|\r)', ' ', $html);
}
add_shortcode($prefix . 'fa_stack', 'base_shortcode_fa_stack');

/**
 * [base_icon_box] shortcode
 *
 * Example:
 * [base_icon_box]
 */
function base_shortcode_icon_box($atts, $content) {
   extract(shortcode_atts(array(
      'label'        => '',
      'href'         => '',
      'href_option'  => '',
      'css_id'       => '',
      'css_class'    => '',
   ), $atts));

   ob_start();
   include(dirname(dirname(__FILE__)) . '/templates/shortcode-icon-box.php');
   $html = ob_get_clean();
   return preg_replace('(\n|\r)', ' ', $html);
}
add_shortcode($prefix . 'icon_box', 'base_shortcode_icon_box');

/**
 * [base_p] shortcode
 *
 * Example:
 * [base_p css_class="featured"]
 */
function base_shortcode_p($atts, $content) {
   extract(shortcode_atts(array(
      'css_id'       => '',
      'css_class'    => '',
   ), $atts));

   ob_start();
   include(dirname(dirname(__FILE__)) . '/templates/shortcode-p.php');
   $html = ob_get_clean();
   return preg_replace('(\n|\r)', ' ', $html);
}
add_shortcode($prefix . 'p', 'base_shortcode_p');

/**
 * [base_br] shortcode
 *
 * Example:
 * [base_br]
 */
function base_shortcode_br($atts, $content) {
   extract(shortcode_atts(array(
   ), $atts));

   ob_start();
   include(dirname(dirname(__FILE__)) . '/templates/shortcode-br.php');
   $html = ob_get_clean();
   return preg_replace('(\n|\r)', ' ', $html);
}
add_shortcode($prefix . 'br', 'base_shortcode_br');

/**
 * [base_featured] shortcode
 *
 * Example:
 * [base_featured]
 */
function base_shortcode_featured($atts, $content) {
   extract(shortcode_atts(array(
      'tag'          => 'div',
      'css_id'       => '',
      'css_class'    => 'tn-featured',
   ), $atts));

   ob_start();
   include(dirname(dirname(__FILE__)) . '/templates/shortcode-featured.php');
   $html = ob_get_clean();
   return preg_replace('(\n|\r)', ' ', $html);
}
add_shortcode($prefix . 'featured', 'base_shortcode_featured');

/**
 * [base_theme_option] shortcode
 *
 * Example:
 * [base_theme_option name='email']
 */
function base_shortcode_theme_option($atts, $content) {
   extract(shortcode_atts(array(
      'name'         => '',
   ), $atts));

   ob_start();
   include(dirname(dirname(__FILE__)) . '/templates/shortcode-theme-option.php');
   $html = ob_get_clean();
   return preg_replace('(\n|\r)', ' ', $html);
}
add_shortcode($prefix . 'theme_option', 'base_shortcode_theme_option');

/**
 * [base_gmap] shortcode
 *
 * Example:
 * base_gmap address="Laredo, Cantabria, Spain"]
 */
function base_shortcode_gmap( $atts = null, $content = null ) {
   extract(shortcode_atts(array(
      'width'        => 600,
      'height'       => 400,
      'responsive'   => 'yes',
      'address'      => 'New York',
      'display'      => 'l',  // q (standard layout), d (for directions) or l (for local)
      'zoom'         => '12', // Zoom from 0 to 23, samples:
                        // 12 for big city
                        // 15 for street
      'type'         => 'm', // m – normal  map, k – satellite, h – hybrid, p – terrain
      'layer'        => '', // t for traffic or c for street view, or tc for both at the same time.
      'view'         => 'map', // Controls the view type. Set to text for text, or map for map.
      'info'         => 'near', // A-J – opens the info window over a business marker
                        // near – puts it over the green arrow (when shown)
                        // addr – places it over a set address (the default value)
                        // start, end and pausex – for use in driving directions, where x is the number of the point in question
      'expinfo'      => '1', // Sets the info window to expanded view when set to 1.
      'lang'         => 'es', // Language
      'print'        => '', // Print mode
      'css_class'    => '',
      'css_id'       => '',
   ), $atts));
   ob_start();
   include(dirname(dirname(__FILE__)) . '/templates/shortcode-gmap.php');
   $html = ob_get_clean();
   return preg_replace('(\n|\r)', ' ', $html);
}
add_shortcode($prefix . 'gmap', 'base_shortcode_gmap');
