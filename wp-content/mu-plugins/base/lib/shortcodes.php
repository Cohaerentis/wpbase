<?php
/**
 * Custom shortcodes
 */

$prefix = 'base_';

/**
 * [follow] shortcode
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
 * [follow]
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
 * [yt_videos_mosaic] shortcode
 *
 * Mosaic of last YouTube videos
 *  - n       : Number of videos (default 8)
 *  - ytuser  : YouTube username
 *
 * Example:
 * [yt_videos_mosaic ytuser="youruserid"]
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
 * [tn_modal] shortcode
 *
 * Example:
 * [tn_modal type='hotelchain']
 */
function base_shortcode_tn_modal($atts, $content) {
   extract(shortcode_atts(array(
      'title'        => '',
      'btn_label'    => 'Open Modal',
      'btn_type'     => 'primary',
      'btn_size'     => 'lg',
      'btn_p_class'  => '',
      'class'        => '',
      'id'           => '',
      'submit_link'  => '',
      'submit_label' => 'Submit',
      'submit_type'  => 'primary',
      'submit_size'  => 'lg',
   ), $atts));

   ob_start();
   include(dirname(dirname(__FILE__)) . '/templates/shortcode-tn-modal.php');
   $html = ob_get_clean();
   return preg_replace('(\n|\r)', ' ', $html);
}
add_shortcode($prefix . 'tn_modal', 'base_shortcode_tn_modal');

/**
 * [tn_fa_icon] shortcode
 *
 * Example:
 * [tn_fa_icon name='info-circle']
 */
function base_shortcode_tn_fa_icon($atts) {
   extract(shortcode_atts(array(
      'name'         => 'info',
      'size'         => '',   // lg, x2, x3, x4, x5
      'border'       => 'no', // yes, no
      'fixed_width'  => 'no', // yes, no
      'spin'         => 'no', // yes, no
      'rotate'       => '',   // rotate-90, rotate-180, rotate-270, flip-horizontal, flip-vertical
      'stack'        => '',   // x1, x2, x3, x4, x5
      'inverse'      => 'no', // yes, no
      'id'           => '',
      'class'        => '',
   ), $atts));

   ob_start();
   include(dirname(dirname(__FILE__)) . '/templates/shortcode-tn-fa-icon.php');
   $html = ob_get_clean();
   return preg_replace('(\n|\r)', ' ', $html);
}
add_shortcode($prefix . 'tn_fa_icon', 'base_shortcode_tn_fa_icon');

/**
 * [tn_fa_stack] shortcode
 *
 * Example:
 * [tn_fa_stack]
 */
function base_shortcode_tn_fa_stack($atts, $content) {
   extract(shortcode_atts(array(
      'size'         => '', // lg, x2, x3, x4, x5
      'id'           => '',
      'class'        => '',
   ), $atts));

   ob_start();
   include(dirname(dirname(__FILE__)) . '/templates/shortcode-tn-fa-stack.php');
   $html = ob_get_clean();
   return preg_replace('(\n|\r)', ' ', $html);
}
add_shortcode($prefix . 'tn_fa_stack', 'base_shortcode_tn_fa_stack');
