<?php
/**
 * Enqueue scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/main.min.css
 * 2. /theme/assets/css/custom.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.10.2.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-2.7.0.min.js
 * 3. /theme/assets/js/main.min.js (in footer)
 * 4. /theme/assets/js/custom.js
 */

function roots_scripts() {
  $csbase = get_template_directory_uri() . '/assets/css/';
  $jsbase = get_template_directory_uri() . '/assets/js/';
  $cssmain      = 'main.min.css';
  $csscustom    = 'custom.css';
  $jsmodernizr  = 'vendor/modernizr-2.7.0.min.js';
  $jsjquery     = 'vendor/jquery-1.10.2.min.js';
  $jsroots      = 'scripts.min.js';
  if (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) {
    $cssmain        = 'main.css';
    $csscustom      = 'custom.css';
    $jsmodernizr    = 'vendor/modernizr-2.7.0.js';
    $jsjquery       = 'vendor/jquery-1.10.2.js';
    $jsroots        = 'scripts.js';
  }
  wp_enqueue_style('roots_main', $csbase . $cssmain, false, null);
  // AEA - Custom CSS
  wp_enqueue_style('roots_custom', $csbase . $csscustom, false, null);

  // jQuery is loaded using the same method from HTML5 Boilerplate:
  // Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  // It's kept in the header instead of footer to avoid conflicts with plugins.
  // AEA - Don not use CDN fetaured until goes to production
  // if (!is_admin() && current_theme_supports('jquery-cdn')) {
  //   wp_deregister_script('jquery');
  //   wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/' . $jsjquery, false, null, false);
  //   add_filter('script_loader_src', 'roots_jquery_local_fallback', 10, 2);
  // }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  // AEA - Use our jQuery version
  wp_deregister_script('jquery');

  wp_register_script('modernizr', $jsbase . $jsmodernizr, false, null, false);
  wp_register_script('jquery', $jsbase . $jsjquery, false, null, false);
  wp_register_script('roots_scripts', $jsbase . $jsroots, false, null, false);
  wp_enqueue_script('modernizr');
  wp_enqueue_script('jquery');
  wp_enqueue_script('roots_scripts');
}

add_action('wp_enqueue_scripts', 'roots_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function roots_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/vendor/jquery-1.10.2.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_head', 'roots_jquery_local_fallback');

function roots_google_analytics() { ?>
<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
  e=o.createElement(i);r=o.getElementsByTagName(i)[0];
  e.src='//www.google-analytics.com/analytics.js';
  r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>');ga('send','pageview');
</script>

<?php }
if (GOOGLE_ANALYTICS_ID && !current_user_can('manage_options')) {
  add_action('wp_footer', 'roots_google_analytics', 20);
}
